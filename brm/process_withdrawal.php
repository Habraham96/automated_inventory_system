<?php
session_start();
require_once('../include/config.php');

// Set JSON response header
header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);
$amount = isset($data['amount']) ? floatval($data['amount']) : 0;
$bankAccount = isset($data['bankAccount']) ? $data['bankAccount'] : '';
$reason = isset($data['reason']) ? trim($data['reason']) : '';
$otp = isset($data['otp']) ? trim($data['otp']) : '';

// Validate inputs
if ($amount <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid withdrawal amount']);
    exit;
}

if (empty($bankAccount)) {
    echo json_encode(['success' => false, 'message' => 'Please select a bank account']);
    exit;
}

if (empty($otp) || strlen($otp) !== 6) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid 6-digit OTP']);
    exit;
}

// Verify OTP
if (!isset($_SESSION['withdrawal_otp']) || !isset($_SESSION['withdrawal_otp_time'])) {
    echo json_encode(['success' => false, 'message' => 'No OTP found. Please request a new OTP']);
    exit;
}

// Check if OTP has expired (5 minutes = 300 seconds)
$otpAge = time() - $_SESSION['withdrawal_otp_time'];
if ($otpAge > 300) {
    // Clear expired OTP
    unset($_SESSION['withdrawal_otp']);
    unset($_SESSION['withdrawal_otp_time']);
    unset($_SESSION['withdrawal_amount']);
    unset($_SESSION['withdrawal_bank_account']);
    
    echo json_encode(['success' => false, 'message' => 'OTP has expired. Please request a new OTP']);
    exit;
}

// Verify OTP matches
if ($otp !== $_SESSION['withdrawal_otp']) {
    echo json_encode(['success' => false, 'message' => 'Invalid OTP. Please check and try again']);
    exit;
}

// Verify withdrawal details match
if ($amount != $_SESSION['withdrawal_amount'] || $bankAccount !== $_SESSION['withdrawal_bank_account']) {
    echo json_encode(['success' => false, 'message' => 'Withdrawal details mismatch. Please start over']);
    exit;
}

// Clear OTP session data
unset($_SESSION['withdrawal_otp']);
unset($_SESSION['withdrawal_otp_time']);
unset($_SESSION['withdrawal_amount']);
unset($_SESSION['withdrawal_bank_account']);

try {
    // Get user ID
    $user_id = $_SESSION['user_id'];
    
    // Begin transaction
    $conn->begin_transaction();
    
    // Check wallet balance
    $stmt = $conn->prepare("SELECT wallet_balance FROM brm_users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    
    if (!$user) {
        throw new Exception('User not found');
    }
    
    $currentBalance = floatval($user['wallet_balance']);
    
    if ($amount > $currentBalance) {
        throw new Exception('Insufficient wallet balance');
    }
    
    // Deduct amount from wallet
    $newBalance = $currentBalance - $amount;
    $stmt = $conn->prepare("UPDATE brm_users SET wallet_balance = ? WHERE id = ?");
    $stmt->bind_param("di", $newBalance, $user_id);
    $stmt->execute();
    $stmt->close();
    
    // Insert withdrawal record
    $status = 'pending'; // Status: pending, processing, completed, failed
    $stmt = $conn->prepare("INSERT INTO withdrawals (user_id, amount, bank_account, reason, status, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("idsss", $user_id, $amount, $bankAccount, $reason, $status);
    $stmt->execute();
    $withdrawal_id = $stmt->insert_id;
    $stmt->close();
    
    // Log the transaction
    $description = "Withdrawal of ₦" . number_format($amount, 2) . " to " . $bankAccount;
    $stmt = $conn->prepare("INSERT INTO transaction_logs (user_id, type, amount, description, created_at) VALUES (?, 'withdrawal', ?, ?, NOW())");
    $stmt->bind_param("ids", $user_id, $amount, $description);
    $stmt->execute();
    $stmt->close();
    
    // Commit transaction
    $conn->commit();
    
    // Send confirmation email (optional)
    // You can add email notification here using PHPMailer
    
    echo json_encode([
        'success' => true, 
        'message' => 'Withdrawal request submitted successfully',
        'withdrawal_id' => $withdrawal_id,
        'new_balance' => $newBalance
    ]);
    
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    
    error_log("Withdrawal error: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => $e->getMessage()
    ]);
}
?>
