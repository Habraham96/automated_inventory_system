<?php
session_start();
require 'include/config.php';
header('Content-Type: application/json');


// Get POST data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$amount = isset($_POST['amount']) ? trim($_POST['amount']) : '';
$plan_name = isset($_POST['plan_name']) ? trim($_POST['plan_name']) : '';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id || !$name || !$amount || !$plan_name) {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    exit;
}

try {
    // Fetch user info
    $stmt = $pdo->prepare('SELECT first_name, surname, other_names FROM users WHERE id = ?');
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
        exit;
    }
    // Build full name from DB
    $db_fullname = trim($user['first_name'] . ' ' . $user['other_names'] . ' ' . $user['surname']);
    // Compare input name to DB full name (case-insensitive)
    if (strtolower($name) !== strtolower($db_fullname)) {
        echo json_encode(['success' => false, 'message' => 'Name does not match registration.']);
        exit;
    }
    // Fetch plan amount from plans_amount table
    $stmt = $pdo->prepare('SELECT amount FROM plans_amount WHERE LOWER(name) = LOWER(?)');
    $stmt->execute([$plan_name]);
    $plan = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$plan) {
        echo json_encode(['success' => false, 'message' => 'Plan not found.']);
        exit;
    }
    $db_amount = preg_replace('/[^0-9.]/', '', $plan['amount']); // Remove currency symbols
    $input_amount = preg_replace('/[^0-9.]/', '', $amount);
    if ($db_amount != $input_amount) {
        echo json_encode(['success' => false, 'message' => 'Amount does not match selected plan.']);
        exit;
    }
    // Update plans table for this user and plan
    $stmt = $pdo->prepare('UPDATE plans SET fullname = ?, amount_paid = ?, selected_at = NOW(), status = 1 WHERE user_id = ? AND plan_name = ?');
    $stmt->execute([$db_fullname, $amount, $user_id, $plan_name]);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Server error.']);
}
