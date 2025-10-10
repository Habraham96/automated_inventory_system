<?php
session_start();
require 'include/config.php';
require 'vendor/autoload.php'; // Add PHPMailer autoload
require 'include/email_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create signup_requests table if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS signup_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(150) NOT NULL UNIQUE,
  token VARCHAR(255) NOT NULL,
  requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  verified TINYINT(1) DEFAULT 0
)");

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Generate token
    $token = bin2hex(random_bytes(32));
    // Save request
    try {
      $stmt = $pdo->prepare('INSERT INTO signup_requests (email, token) VALUES (?, ?)');
      $stmt->execute([$email, $token]);
      // Build verification link
      $link = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['REQUEST_URI']), '/\\') . "/sign_up_form.php?token=$token";
      // Send email using PHPMailer
      $mail = new PHPMailer(true);
      try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change to your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'tobestic53@gmail.com'; // Your email
        $mail->Password = 'rfiilpgolskxqgjs'; // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('tobestic53@gmail.com', 'SalesPilot');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Complete Your Registration';
        $mail->Body = "<h2>Complete Your Registration</h2><p>Hello,</p><p>Click the link below to complete your registration:</p><a href='$link' style='background-color: #7d2ae8; color: white; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block;'>Complete Registration</a><p>If you didn't request this, please ignore this email.</p><hr><p><small>Link: $link</small></p>";
        $mail->AltBody = "Hello,\n\nClick the link below to complete your registration:\n$link\n\nIf you didn't request this, please ignore this email.";
        $mail->send();
        $success = "A registration link has been sent to your email.";
      } catch (Exception $e) {
        $error = "Failed to send email. Please try again later. Error: " . $mail->ErrorInfo;
      }
    } catch (PDOException $e) {
      $error = "This email is already registered or pending verification.";
    }
  } else {
    $error = "Please enter a valid email address.";
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
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="asset/css/signup.css" />
</head>
  <body>
    <!-- Preloader -->
    <div id="preloader" style="position:fixed;inset:0;display:flex;align-items:center;justify-content:center;background:#fff;z-index:99999;transition:opacity 0.35s ease;">
      <div class="spinner" style="width:72px;height:72px;border-radius:50%;border:8px solid rgba(125,42,232,0.12);border-top-color:#7d2ae8;animation:spin 1s linear infinite;"></div>
    </div>

    <header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo active">LOGO</a>
        <ul class="nav_items" style="width:100%;display:flex;justify-content:center;align-items:center;">
          <h2 style="margin:0 auto;text-align:center;font-size:1.7rem;font-weight:600;color:#7d2ae8;">Inventory And Sales Management Made Easy</h2>
        </ul>
        <!-- <button class="button" id="form-open">Login</button> -->
      </nav>
    </header>
    <section class="home">
  <div class="main_content_wrapper" style="width:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;">
    <div class="form_container" style="position:relative;overflow:hidden;">
      <!-- Login Form -->
      <div class="form login_form">
    <?php if (!empty($success)): ?>
      <div style="color:#34c759;font-weight:500;text-align:center;margin-bottom:16px;">
        <?= $success ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
      <div style="color:red;font-weight:500;text-align:center;margin-bottom:16px;">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>
    <form action="" method="post" style="width:100%;">
      <h3 style="text-align:center;margin-bottom:18px;">Input a valid E-mail</h3>
      <div class="input_box">
      <input type="email" name="email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>
          <button class="button" id="proceedEmailBtn">Proceed</button>
          <!-- Modal Flash Message -->
          <div id="flashModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);z-index:9999;align-items:center;justify-content:center;">
            <div style="background:#fff;border-radius:12px;max-width:340px;width:90vw;padding:32px 18px;box-shadow:0 8px 32px 0 rgba(0,0,0,0.18);position:relative;display:flex;flex-direction:column;align-items:center;">
              <span style="font-size:2.5rem;color:#198754;margin-bottom:8px;">&#10003;</span>
              <span style="font-size:1.2rem;color:#198754;font-weight:600;text-align:center;">Sent, Click the link in your E-mail</span>
              <button id="flashOkBtn" style="margin-top:18px;padding:8px 28px;font-size:1rem;background:#7d2ae8;color:#fff;border:none;border-radius:8px;cursor:pointer;">OK</button>
            </div>
          </div>
          <div class="login_signup">A verification link will be sent to your E-mail, click the link and continue the sign up process</div>
        </form>
      </div>
    </div>
  </div>
    </section>
    <script>
      // Inject spinner keyframes and hide preloader on load
      (function(){
        var css = '@keyframes spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}';
        var s = document.createElement('style'); s.appendChild(document.createTextNode(css)); document.head.appendChild(s);
        function hidePreloader(){
          var p = document.getElementById('preloader');
          if(!p) return;
          p.style.opacity = '0';
          setTimeout(function(){ if(p && p.parentNode) p.parentNode.removeChild(p); }, 420);
        }
        if (document.readyState === 'complete') hidePreloader(); else { window.addEventListener('load', hidePreloader); setTimeout(hidePreloader, 5000); }
      })();

      document.addEventListener('DOMContentLoaded', function() {
        var proceedBtn = document.getElementById('proceedEmailBtn');
        var flashModal = document.getElementById('flashModal');
        var flashOkBtn = document.getElementById('flashOkBtn');
        if (proceedBtn && flashModal) {
          proceedBtn.addEventListener('click', function(e) {
            e.preventDefault();
            flashModal.style.display = 'flex';
          });
        }
        if (flashOkBtn && flashModal) {
          flashOkBtn.addEventListener('click', function() {
            flashModal.style.display = 'none';
            setTimeout(function() {
              window.location.href = 'sign_up.php';
            }, 150);
          });
        }
      });
    </script>
  </body>
</html>