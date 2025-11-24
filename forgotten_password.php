<?php
require 'include/config.php';
require 'vendor/autoload.php'; // Add PHPMailer autoload
require 'include/email_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$success = '';
$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    
    if ($email) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
            
            // Update user with reset token
            $pdo->prepare('UPDATE users SET reset_token = ?, reset_expires = ? WHERE id = ?')->execute([$token, $expires, $user['id']]);
            
           $reset_link = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['REQUEST_URI']), '/\\') . "/create_new_password.php?token=$token";
            
            // Send email using PHPMailer
            $mail = new PHPMailer(true);
            
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Change to your SMTP server
                $mail->SMTPAuth = true;
                // Use credentials from include/email_config.php
                $mail->Username = SMTP_USER;
                $mail->Password = SMTP_PASS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                
                // Recipients
                $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
                $mail->addAddress($email);
                
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                
                $mail->Body = "
                    <h2>Password Reset Request</h2>
                    <p>Hello,</p>
                    <p>Click the link below to reset your password:</p>
                    <a href='$reset_link' style='background-color: #7d2ae8; color: white; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block;'>Reset Password</a>
                    <p>This link will expire in 1 hour.</p>
                    <p>If you didn't request this, please ignore this email.</p>
                    <hr>
                    <p><small>Link: $reset_link</small></p>
                ";
                
                $mail->AltBody = "Hello,\n\nClick the link below to reset your password:\n$reset_link\n\nThis link expires in 1 hour.\n\nIf you didn't request this, please ignore this email.";
                
                $mail->send();
                $success = "A reset link has been sent to your email.";
            } catch (Exception $e) {
                $error = "Failed to send email. Please try again later. Error: " . $mail->ErrorInfo;
            }
        } else {
            $error = "No account found with that email.";
        }
    } else {
        $error = "Please enter your registered email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory | Sales</title>
    <link rel="stylesheet" href="style.css" />
    <?php include 'include/head_fonts.php'; ?>
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="asset/css/forgot.css" />
</head>
<body>
        <?php include 'include/preloader.php'; ?>

    <header class="header">
        <nav class="nav">
            <a href="#" class="nav_logo active"><img src="asset/images/salespilot%20logo2.png" alt="SalesPilot Logo" style="height:36px;display:block;object-fit:contain;"></a>
            <ul class="nav_items" style="width:100%;display:flex;justify-content:center;align-items:center;">
                <h2 style="margin:0 auto;text-align:center;font-size:1.7rem;font-weight:600;color:#7d2ae8;">Sales Pilot</h2>
            </ul>
        </nav>
    </header>

    <section class="home">
        <div class="main_content_wrapper" style="width:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;">
            <div class="form_container" style="position:relative;overflow:hidden;">
                <!-- Forgot Password Form -->
                <div class="form login_form">
                    <form action="" method="post" style="width:100%;">
                        <h2>Forgot Password</h2>
                        <?php if (!empty($success)): ?>
                            <div style="color:#34c759; margin-bottom:16px; font-weight:500; font-size:1.1rem; text-align:center;">
                                <?= htmlspecialchars($success) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($error)): ?>
                            <div style="color:red; margin-bottom:16px; font-weight:500; font-size:1.1rem; text-align:center;">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>
                        <div class="input_box">
                            <input type="email" name="email" placeholder="Enter your email" required />
                            <i class="uil uil-envelope-alt email"></i>
                        </div>
                        <button class="button" type="submit">Send Reset Link</button>
                        <div class="login_signup">Remembered your password? <a href="index.php">Login</a></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Root preloader handled via include 'include/preloader.php'
    </script>
</body>
</html>