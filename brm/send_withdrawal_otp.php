<?php
session_start();
require_once('../include/config.php');
require_once('../include/email_config.php');

// Set JSON response header
header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);
$amount = isset($data['amount']) ? floatval($data['amount']) : 0;
$bankAccount = isset($data['bankAccount']) ? $data['bankAccount'] : '';

// Validate inputs
if ($amount <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid withdrawal amount']);
    exit;
}

if (empty($bankAccount)) {
    echo json_encode(['success' => false, 'message' => 'Please select a bank account']);
    exit;
}

// Generate 6-digit OTP
$otp = sprintf('%06d', mt_rand(0, 999999));

// Store OTP in session with timestamp
$_SESSION['withdrawal_otp'] = $otp;
$_SESSION['withdrawal_otp_time'] = time();
$_SESSION['withdrawal_amount'] = $amount;
$_SESSION['withdrawal_bank_account'] = $bankAccount;

// Get user details
$user_email = $_SESSION['email'];
$user_name = isset($_SESSION['name']) ? $_SESSION['name'] : 'User';

// Send email using PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;

    // Recipients
    $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
    $mail->addAddress($user_email, $user_name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Withdrawal OTP Verification - SalesPilot';
    
    // HTML Email Template
    $mail->Body = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                line-height: 1.6;
                color: #333;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background: white;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }
            .header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                padding: 30px 20px;
                text-align: center;
                color: white;
            }
            .header h1 {
                margin: 0;
                font-size: 28px;
                font-weight: 600;
            }
            .content {
                padding: 30px 25px;
            }
            .otp-box {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                text-align: center;
                padding: 25px;
                border-radius: 8px;
                margin: 25px 0;
            }
            .otp-code {
                font-size: 42px;
                font-weight: 700;
                letter-spacing: 8px;
                margin: 10px 0;
            }
            .info-box {
                background: #f8f9fa;
                border-left: 4px solid #667eea;
                padding: 15px 20px;
                margin: 20px 0;
                border-radius: 4px;
            }
            .info-box p {
                margin: 5px 0;
                font-size: 14px;
            }
            .warning {
                background: #fff3cd;
                border-left: 4px solid #ffc107;
                padding: 15px 20px;
                margin: 20px 0;
                border-radius: 4px;
                color: #856404;
            }
            .footer {
                background: #f8f9fa;
                padding: 20px;
                text-align: center;
                font-size: 13px;
                color: #6c757d;
                border-top: 1px solid #dee2e6;
            }
            .footer a {
                color: #667eea;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>🔒 Withdrawal Verification</h1>
            </div>
            <div class="content">
                <p>Hello <strong>' . htmlspecialchars($user_name) . '</strong>,</p>
                <p>You have requested to withdraw funds from your SalesPilot wallet. Please use the OTP code below to complete your withdrawal:</p>
                
                <div class="otp-box">
                    <p style="margin: 0; font-size: 14px; opacity: 0.9;">Your OTP Code</p>
                    <div class="otp-code">' . $otp . '</div>
                    <p style="margin: 0; font-size: 13px; opacity: 0.8;">Valid for 5 minutes</p>
                </div>
                
                <div class="info-box">
                    <p><strong>Withdrawal Details:</strong></p>
                    <p>📊 Amount: <strong>₦' . number_format($amount, 2) . '</strong></p>
                    <p>🏦 Bank Account: <strong>' . htmlspecialchars($bankAccount) . '</strong></p>
                    <p>⏰ Time: <strong>' . date('F j, Y g:i A') . '</strong></p>
                </div>
                
                <div class="warning">
                    <p><strong>⚠️ Security Notice:</strong></p>
                    <p style="margin: 5px 0; font-size: 13px;">
                        • This OTP will expire in <strong>5 minutes</strong><br>
                        • Never share this code with anyone<br>
                        • If you did not request this withdrawal, please contact support immediately
                    </p>
                </div>
                
                <p style="margin-top: 25px; font-size: 14px; color: #6c757d;">
                    If you have any questions or concerns, please contact our support team.
                </p>
            </div>
            <div class="footer">
                <p>© ' . date('Y') . ' SalesPilot. All rights reserved.</p>
                <p>This is an automated message, please do not reply to this email.</p>
            </div>
        </div>
    </body>
    </html>
    ';

    // Plain text alternative
    $mail->AltBody = "Hello {$user_name},\n\n"
                    . "Your withdrawal OTP code is: {$otp}\n\n"
                    . "Withdrawal Amount: ₦" . number_format($amount, 2) . "\n"
                    . "Bank Account: {$bankAccount}\n\n"
                    . "This code will expire in 5 minutes.\n\n"
                    . "If you did not request this withdrawal, please contact support immediately.\n\n"
                    . "Thank you,\nSalesPilot Team";

    $mail->send();
    
    echo json_encode([
        'success' => true, 
        'message' => 'OTP sent successfully',
        'email' => substr($user_email, 0, 3) . '***' . substr($user_email, strpos($user_email, '@')) // Masked email
    ]);
    
} catch (Exception $e) {
    error_log("Email sending failed: {$mail->ErrorInfo}");
    echo json_encode([
        'success' => false, 
        'message' => 'Failed to send OTP. Please try again.'
    ]);
}
?>
