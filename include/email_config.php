<?php
define('SMTP_HOST', 'smtp.gmail.com');
// NOTE: move credentials to environment variables or a secure config in production
define('SMTP_USER', 'tobestic53@gmail.com');
define('SMTP_PASS', 'rfiilpgolskxqgjs');
define('SMTP_FROM_EMAIL', 'tobestic53@gmail.com');
define('SMTP_FROM_NAME', 'SalesPilot');
// Optional: customize port and encryption
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls'); // 'tls' or 'ssl'
// If running on local dev with self-signed certs, set to true to allow
define('SMTP_ALLOW_SELF_SIGNED', true);
?>