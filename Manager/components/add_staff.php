<?php
/**
 * add_staff.php
 * Secure AJAX-enabled endpoint for adding staff.
 * Features:
 *  - CSRF protection using a session token
 *  - Basic input sanitization and validation
 *  - Simple session-based rate-limiting
 *  - Server-side logging (no plaintext passwords)
 *  - JSON response when request looks like AJAX, otherwise falls back to redirect
 */
session_start();
require_once __DIR__ . '/../../include/config.php';
require_once __DIR__ . '/function.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

function is_ajax_request() {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') return true;
    if (!empty($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) return true;
    return false;
}

// CSRF validation (try multiple sources: POST field, X-CSRF-Token header)
$posted_csrf = $_POST['csrf_token'] ?? '';
if (empty($posted_csrf) && !empty($_SERVER['HTTP_X_CSRF_TOKEN'])) {
    $posted_csrf = $_SERVER['HTTP_X_CSRF_TOKEN'];
}

// Accept either: (A) session-stored token matches posted token (usual flow),
// or (B) double-submit cookie 'csrf_add_staff' matches the posted token.
$cookie_csrf = $_COOKIE['csrf_add_staff'] ?? '';
$session_tok = $_SESSION['csrf_add_staff'] ?? '';
$ok = false;
if (!empty($session_tok) && !empty($posted_csrf) && hash_equals($session_tok, $posted_csrf)) {
    $ok = true;
} elseif (!empty($cookie_csrf) && !empty($posted_csrf) && hash_equals($cookie_csrf, $posted_csrf)) {
    // double-submit cookie matches posted token — accept this as valid
    $ok = true;
}

if (!$ok) {
    // Log CSRF mismatch to help debugging (do not expose full tokens to users).
    $dbg = date('Y-m-d H:i:s')
        . " CSRF_MISMATCH | ip=" . ($_SERVER['REMOTE_ADDR'] ?? 'unknown')
        . " | posted=" . substr($posted_csrf,0,20)
        . " | session=" . substr($session_tok,0,20)
        . " | cookie=" . substr($cookie_csrf,0,20)
        . "\n";
    @file_put_contents(__DIR__ . '/logs/csrf_debug.log', $dbg, FILE_APPEND | LOCK_EX);
    $resp = ['success' => false, 'message' => 'Invalid CSRF token. Please refresh and try again.'];
    if (is_ajax_request()) { header('Content-Type: application/json'); echo json_encode($resp); exit; }
    header('Location: ../index.php?' . http_build_query(['msg' => $resp['message'], 'ok' => '0'])); exit;
}

// Simple rate limiting per session: keep timestamps of recent attempts
$now = time(); $window = 60; $maxAttempts = 8;
if (!isset($_SESSION['add_staff_attempts'])) $_SESSION['add_staff_attempts'] = [];
$_SESSION['add_staff_attempts'] = array_filter($_SESSION['add_staff_attempts'], function($t) use ($now, $window){ return ($t > $now - $window); });
if (count($_SESSION['add_staff_attempts']) >= $maxAttempts) {
    $resp = ['success' => false, 'message' => 'Too many requests. Please wait a moment and try again.'];
    if (is_ajax_request()) { header('Content-Type: application/json'); echo json_encode($resp); exit; }
    header('Location: ../index.php?' . http_build_query(['msg' => $resp['message'], 'ok' => '0'])); exit;
}
$_SESSION['add_staff_attempts'][] = $now;

// Sanitization
$data = [
    'fullname' => mb_substr(strip_tags(trim($_POST['fullname'] ?? '')), 0, 255),
    'username' => mb_substr(strip_tags(trim($_POST['username'] ?? '')), 0, 100),
    'email' => filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL),
    'phone' => mb_substr(strip_tags(trim($_POST['phone'] ?? '')), 0, 50),
    'password' => $_POST['password'] ?? '',
    'role' => mb_substr(strip_tags(trim($_POST['role'] ?? '')), 0, 100)
];

// Basic validation
if ($data['fullname'] === '' || $data['username'] === '' || $data['email'] === '' || $data['password'] === '') {
    $resp = ['success' => false, 'message' => 'Full name, username, email and password are required.'];
    if (is_ajax_request()) { header('Content-Type: application/json'); echo json_encode($resp); exit; }
    header('Location: ../index.php?' . http_build_query(['msg' => $resp['message'], 'ok' => '0'])); exit;
}
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $resp = ['success' => false, 'message' => 'Invalid email address.'];
    if (is_ajax_request()) { header('Content-Type: application/json'); echo json_encode($resp); exit; }
    header('Location: ../index.php?' . http_build_query(['msg' => $resp['message'], 'ok' => '0'])); exit;
}
if (strlen($data['password']) < 6) {
    $resp = ['success' => false, 'message' => 'Password must be at least 6 characters.'];
    if (is_ajax_request()) { header('Content-Type: application/json'); echo json_encode($resp); exit; }
    header('Location: ../index.php?' . http_build_query(['msg' => $resp['message'], 'ok' => '0'])); exit;
}

// Delegate to core add_staff function
$result = add_staff($pdo, $data);

// Server-side logging (avoid logging plaintext passwords)
$logDir = __DIR__ . '/logs'; if (!is_dir($logDir)) @mkdir($logDir, 0755, true);
$logFile = $logDir . '/staff_actions.log';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$logEntry = date('Y-m-d H:i:s') . " | " . ($result['success'] ? 'SUCCESS' : 'FAIL') . " | ip={$ip} | user={$data['username']} | email={$data['email']} | role={$data['role']} | msg=" . str_replace("\n", ' ', $result['message']) . " | ua=" . substr($ua,0,200) . "\n";
@file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);

// Return JSON for AJAX clients
if (is_ajax_request()) {
    header('Content-Type: application/json');
    echo json_encode($result);
    exit;
}

// Fallback for non-AJAX: redirect back with message
$query = http_build_query(['msg' => $result['message'], 'ok' => $result['success'] ? '1' : '0']);
header('Location: ../index.php?' . $query);
exit;
