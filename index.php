<?php
session_start();
// Session timeout logic
$timeout_duration = 1200;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
  $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
  session_unset();
  session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
require 'include/config.php';
$login_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  if ($email && $password) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['first_name'];
      $redirect = $_SESSION['redirect_after_login'] ?? 'plans.php';
      unset($_SESSION['redirect_after_login']);
      echo '<div id="successMessage" style="position:fixed;top:0;left:0;width:100vw;height:100vh;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.25);z-index:99999;">
        <div style="background:#fff;padding:40px 32px;border-radius:16px;box-shadow:0 4px 32px rgba(125,42,232,0.12);text-align:center;max-width:350px;width:90%;">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" style="margin-bottom:16px;"><circle cx="12" cy="12" r="12" fill="#e9fbe7"/><path d="M7 13l3 3 7-7" stroke="#34c759" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <h2 style="color:#34c759;font-size:1.5rem;margin-bottom:8px;">Login Successful!</h2>
          <p style="color:#222;font-size:1.1rem;margin-bottom:16px;">Redirecting...</p>
        </div>
      </div>';
      echo '<script>setTimeout(function(){ window.location.href = "' . $redirect . '"; }, 2000);</script>';
      exit;
    } else {
      $login_error = 'Invalid email or password.';
    }
  } else {
    $login_error = 'Please enter both email and password.';
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
    <link rel="stylesheet" href="asset/css/style.css" />
  </head>
  <body>
    <!-- Preloader -->
    <div id="preloader" style="position:fixed;inset:0;display:flex;align-items:center;justify-content:center;background:#fff;z-index:99999;transition:opacity 0.35s ease;">
      <div class="spinner" style="width:72px;height:72px;border-radius:50%;border:8px solid rgba(125,42,232,0.12);border-top-color:#7d2ae8;animation:spin 1s linear infinite;"></div>
    </div>

    <!-- Header -->
    <header class="header">
      <nav class="nav">
  <a href="#" class="nav_logo active"><img src="asset/images/salespilot%20logo2.png" alt="SalesPilot Logo" style="height:36px;display:block;object-fit:contain;"></a>
        <ul class="nav_items" style="width:100%;display:flex;justify-content:center;align-items:center;">
          <h2 style="margin:0 auto;text-align:center;font-size:1.7rem;font-weight:600;color:#7d2ae8;">Sales Pilot</h2>
        </ul>
        <!-- <button class="button" id="form-open">Login</button> -->
      </nav>
    </header>
    <!-- Home -->
    <section class="home">
  <div class="main_content_wrapper" style="width:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;">
    <div class="form_container" style="position:relative;overflow:hidden;">
      <!-- Login Form -->
      <div class="form login_form">
  <form action="" method="post" style="width:100%;">
          <h2>Login</h2>
          <?php if (!empty($login_error)): ?>
            <div style="color:red; margin-bottom:16px; font-weight:500; font-size:1.1rem; text-align:center;">
                <?= htmlspecialchars($login_error) ?>
            </div>
          <?php endif; ?>
          <div class="input_box">
            <input type="email" name="email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>
          <div class="input_box">
            <input type="password" name="password" placeholder="Enter your password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <div class="option_field">
            <span class="checkbox">
              <input type="checkbox" id="check" />
              <label for="check">Remember me</label>
            </span>
            <a href="forgotten_password.php" class="forgot_pw">Forgot password?</a>
          </div>
          <button class="button" type="submit">Login Now</button>
    <div class="login_signup">Don't have an account? <a href="sign_up.php">Signup</a></div>
        </form>
      </div>
    </div>
  </div>
    </section>

  <script>
    // Preloader: hide when page finishes loading
    (function(){
      function hidePreloader(){
        var p = document.getElementById('preloader');
        if(!p) return;
        p.style.opacity = '0';
        setTimeout(function(){ if(p && p.parentNode) p.parentNode.removeChild(p); }, 420);
      }
      if (document.readyState === 'complete') {
        // already loaded
        hidePreloader();
      } else {
        window.addEventListener('load', hidePreloader);
        // Also hide after a maximum timeout to avoid stuck preloader
        setTimeout(hidePreloader, 5000);
      }
    })();

    // spinner keyframes injected dynamically for compatibility with inline styles
    (function(){
      var css = '@keyframes spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}';
      var s = document.createElement('style'); s.appendChild(document.createTextNode(css)); document.head.appendChild(s);
    })();

    // Password show/hide functionality
    document.addEventListener('DOMContentLoaded', function() {
      const pwInput = document.querySelector('.input_box input[type="password"]');
      const pwToggle = document.querySelector('.input_box .pw_hide');
      if (pwInput && pwToggle) {
        pwToggle.addEventListener('click', function() {
          if (pwInput.type === 'password') {
            pwInput.type = 'text';
            pwToggle.classList.remove('uil-eye-slash');
            pwToggle.classList.add('uil-eye');
          } else {
            pwInput.type = 'password';
            pwToggle.classList.remove('uil-eye');
            pwToggle.classList.add('uil-eye-slash');
          }
        });
      }

      // Email validation: only show messages after user interaction
      const form = document.querySelector('.login_form form');
      const emailInput = form ? form.querySelector('input[type="email"]') : null;
      let emailTouched = false;
      if (emailInput && form) {
        emailInput.addEventListener('blur', function() {
          emailTouched = true;
        });
        form.addEventListener('submit', function(e) {
          if (!emailInput.value) {
            if (!emailTouched) {
              emailInput.focus();
              e.preventDefault();
              return;
            }
          }
        });
      }
    });
  </script>
  </body>
</html>
