<?php
/**
 * Manager components helper functions
 *
 * This file centralizes server-side logic used by manager views. Keep
 * small, focused functions here (validation, DB operations, helpers).
 *
 * Usage:
 *   require_once __DIR__ . '/function.php';
 *   $result = add_staff($pdo, $data);
 *   // $result is ['success' => bool, 'message' => string]
 */

/**
 * Add a staff member into the staff_table.
 *
 * Responsibilities:
 *  - Validate required fields and email format
 *  - Ensure the `staff_table` exists (creates if missing)
 *  - Enforce uniqueness for username and email
 *  - Hash the plaintext password securely using password_hash()
 *  - Insert the new staff row and return a result array
 *
 * Inputs (in $data):
 *  - fullname, username, email, phone, password, role
 *
 * Output:
 *  - ['success' => true, 'message' => '...'] on success
 *  - ['success' => false, 'message' => '...'] on failure
 *
 * Note: This function expects a working PDO connection in $pdo. It
 * currently returns SQL error text in the message when insertion fails —
 * consider hiding raw SQL errors in production.
 *
 * @param PDO $pdo
 * @param array $data
 * @return array
 */
function add_staff(PDO $pdo, array $data) {
    // Normalize and validate incoming data
    $fullname = trim($data['fullname'] ?? '');
    $username = trim($data['username'] ?? '');
    $email = trim($data['email'] ?? '');
    $phone = trim($data['phone'] ?? '');
    $password = $data['password'] ?? '';
    $role = trim($data['role'] ?? '');

    // Required fields check
    if ($fullname === '' || $username === '' || $email === '' || $password === '' ) {
        return ['success' => false, 'message' => 'Full name, username, email and password are required.'];
    }

    // Basic email format validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Invalid email address.'];
    }

    // Create the staff table if it does not exist. This makes the
    // function resilient on fresh installs/dev environments. In a more
    // controlled production environment you may prefer to manage schema
    // with migrations instead.
            $pdo->exec("CREATE TABLE IF NOT EXISTS staff_table (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        fullname VARCHAR(255) NOT NULL,
                        username VARCHAR(100) NOT NULL UNIQUE,
                        email VARCHAR(150) NOT NULL UNIQUE,
                        phone VARCHAR(50),
                        password_hash VARCHAR(255) NOT NULL,
                        role VARCHAR(100),
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        date_created DATE NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Uniqueness check: avoid duplicate username or email
    $stmt = $pdo->prepare('SELECT id FROM staff_table WHERE username = ? OR email = ? LIMIT 1');
    $stmt->execute([$username, $email]);
    if ($stmt->fetch()) {
        return ['success' => false, 'message' => 'Username or email already exists.'];
    }

    // Hash the password securely. Use PASSWORD_DEFAULT so PHP can
    // upgrade the algorithm over time; store the hash, never plaintext.
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new staff row using a prepared statement to avoid SQL injection
    // Insert layouts date_created (current date) in addition to timestamp created_at
    // Note: table columns are fullname and password_hash — use correct names here
    $insert = $pdo->prepare('INSERT INTO staff_table (fullname, username, email, phone, password_hash, role, date_created) VALUES (?, ?, ?, ?, ?, ?, ?)');
    try {
        $insert->execute([$fullname, $username, $email, $phone, $password_hash, $role, date('Y-m-d')]);
        // Send notification email to the new staff (non-fatal)
        $emailStatus = '';
        try {
            // Use PHPMailer if available
            if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
                require_once __DIR__ . '/../../vendor/autoload.php';
            }
            // Basic mail config
            $sent = false;
            if (class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
                // prefer project email config if present
                if (file_exists(__DIR__ . '/../../include/email_config.php')) {
                    require_once __DIR__ . '/../../include/email_config.php';
                }
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = defined('SMTP_HOST') ? SMTP_HOST : 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = defined('SMTP_USER') ? SMTP_USER : '';
                    $mail->Password = defined('SMTP_PASS') ? SMTP_PASS : '';
                    $mail->Port = defined('SMTP_PORT') ? SMTP_PORT : 587;
                    $secure = defined('SMTP_SECURE') ? SMTP_SECURE : 'tls';
                    if (strtolower($secure) === 'ssl') {
                        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
                    } else {
                        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                    }
                    if (defined('SMTP_ALLOW_SELF_SIGNED') && SMTP_ALLOW_SELF_SIGNED) {
                        $mail->SMTPOptions = [
                            'ssl' => [
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            ]
                        ];
                    }
                    $mail->setFrom(defined('SMTP_FROM_EMAIL') ? SMTP_FROM_EMAIL : ($mail->Username ?: 'no-reply@example.com'), defined('SMTP_FROM_NAME') ? SMTP_FROM_NAME : 'NoReply');
                    $mail->addAddress($email, $fullname);
                    $mail->isHTML(true);
                    $mail->Subject = 'Welcome to SalesPilot';
                    $mail->Body = "<p>Hi " . htmlspecialchars($fullname) . ",</p><p>Your account has been created on SalesPilot. You can now log in with your username: <strong>" . htmlspecialchars($username) . "</strong>.</p><p>Please change your password after logging in for the first time.</p><p>Regards,<br/>SalesPilot Team</p>";
                    $mail->AltBody = "Hi $fullname\n\nYour account has been created on SalesPilot. Username: $username\n\nRegards, SalesPilot Team";
                    if ($mail->send()) { $sent = true; }
                } catch (Exception $e) {
                    // preserve error but do not fail the creation
                    $emailStatus = 'Email send failed: ' . $e->getMessage();
                }
            } else {
                // fallback to mail() if PHPMailer absent
                $subject = 'Welcome to SalesPilot';
                $message = "Hi $fullname\n\nYour account has been created on SalesPilot. Username: $username\n\nRegards, SalesPilot Team";
                $headers = 'From: no-reply@' . ($_SERVER['HTTP_HOST'] ?? 'example.com') . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                if (@mail($email, $subject, $message, $headers)) { $sent = true; }
                else { $emailStatus = 'mail() failed to send'; }
            }
            if ($sent) { $emailStatus = 'Notification email sent.'; }
        } catch (Throwable $e) {
            $emailStatus = 'Email exception: ' . $e->getMessage();
        }
        return [
            'success' => true,
            'message' => 'Staff added successfully.',
            'email_sent' => !empty($sent) ? true : false,
            'email_message' => $emailStatus
        ];
    } catch (PDOException $e) {
        // In development it's helpful to see the SQL error. In production,
        // consider logging $e->getMessage() to a file and returning a
        // generic message here.
        return ['success' => false, 'message' => 'Failed to add staff: ' . $e->getMessage()];
    }
}
