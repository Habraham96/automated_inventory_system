<?php
// Minimal endpoint to persist receipt settings as JSON.
// Security: In production, validate authentication/authorization.

header('Content-Type: application/json');

// Read the raw input
$raw = file_get_contents('php://input');
if (!$raw) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit;
}

$data = json_decode($raw, true);
if ($data === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
    exit;
}

// Basic sanitization (trim strings)
function sanitize($v) {
    if (is_string($v)) return trim($v);
    if (is_bool($v) || is_numeric($v)) return $v;
    if (is_array($v)) {
        $out = [];
        foreach ($v as $k => $val) $out[$k] = sanitize($val);
        return $out;
    }
    return $v;
}

$sanitized = sanitize($data);

$dir = __DIR__ . DIRECTORY_SEPARATOR . 'data';
if (!is_dir($dir)) mkdir($dir, 0755, true);
$target = $dir . DIRECTORY_SEPARATOR . 'receipt_settings.json';

// Save atomically
$tmp = $target . '.tmp';
if (file_put_contents($tmp, json_encode($sanitized, JSON_PRETTY_PRINT)) !== false) {
    rename($tmp, $target);
    echo json_encode(['success' => true]);
    exit;
} else {
    echo json_encode(['success' => false, 'message' => 'Unable to write file']);
    exit;
}

?>