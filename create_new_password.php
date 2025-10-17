<?php
require 'include/config.php';

// Set session timeout to 20 minutes
$timeout_duration = 1200; // 20 minutes in seconds

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // If the session has been inactive for too long, destroy it
    session_unset();
    session_destroy();
    header("Location: index.php"); // Redirect to login page
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity timestamp

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

$success = '';
$error = '';
$show_form = true;
$token = $_GET['token'] ?? '';
if ($token) {
  $stmt = $pdo->prepare('SELECT * FROM users WHERE reset_token = ? AND reset_expires > NOW()');
  $stmt->execute([$token]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$user) {
    $error = 'Invalid or expired reset link.';
    $show_form = false;
  } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    if (!$password || !$confirm) {
      $error = 'Please enter and confirm your new password.';
    } elseif ($password !== $confirm) {
      $error = 'Passwords do not match.';
    } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $pdo->prepare('UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?')->execute([$hash, $user['id']]);
      $success = 'Password reset successful! You can now log in.';
      $show_form = false;
    }
  }
} else {
  $error = 'No reset token provided.';
  $show_form = false;
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
    <link rel="stylesheet" href="asset/css/create_new_pass.css" />
  </head>
  <body>
    <!-- Preloader -->
    <div id="preloader" style="position:fixed;inset:0;display:flex;align-items:center;justify-content:center;background:#fff;z-index:99999;transition:opacity 0.35s ease;">
      <div class="spinner" style="width:72px;height:72px;border-radius:50%;border:8px solid rgba(125,42,232,0.12);border-top-color:#7d2ae8;animation:spin 1s linear infinite;"></div>
    </div>

    <header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo active"><img src="asset/images/salespilot%20logo2.png" alt="SalesPilot Logo" style="height:36px;display:block;object-fit:contain;"></a>
        <ul class="nav_items" style="width:100%;display:flex;justify-content:center;align-items:center;">
          <h2 style="margin:0 auto;text-align:center;font-size:1.7rem;font-weight:600;color:#7d2ae8;">Sales Pilot</h2>
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
          <div id="successMessage" style="position:fixed;top:0;left:0;width:100vw;height:100vh;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.25);z-index:99999;">
              <div style="background:#fff;padding:40px 32px;border-radius:16px;box-shadow:0 4px 32px rgba(125,42,232,0.12);text-align:center;max-width:350px;width:90%;">
                  <svg width="48" height="48" viewBox="0 0 24 24" fill="none" style="margin-bottom:16px;"><circle cx="12" cy="12" r="12" fill="#e9fbe7"/><path d="M7 13l3 3 7-7" stroke="#34c759" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <h2 style="color:#34c759;font-size:1.5rem;margin-bottom:8px;">Password Reset Successful!</h2>
                  <p style="color:#222;font-size:1.1rem;margin-bottom:16px;">You can now log in with your new password.</p>
                  <a href="index.php" style="display:inline-block;margin-top:12px;padding:10px 28px;background:#7d2ae8;color:#fff;border-radius:8px;text-decoration:none;font-weight:500;">Go to Login</a>
              </div>
          </div>
        <?php elseif ($show_form): ?>
        <form action="?token=<?= htmlspecialchars($token) ?>" method="post" style="width:100%;">
          <h2>Create New Password</h2>
          <?php if (!empty($error)): ?>
            <div style="color:red; margin-bottom:16px; font-weight:500; font-size:1.1rem; text-align:center;">
                <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>
          <div class="input_box">
            <input type="password" name="password" placeholder="New Password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <div class="input_box">
            <input type="password" name="confirm_password" placeholder="Confirm Password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <button class="button" type="submit">Set Password</button>
          <div class="login_signup">Return to <a href="index.php">Login</a></div>
        </form>
        <?php else: ?>
          <div style="color:red; margin-bottom:16px; font-weight:500; font-size:1.1rem; text-align:center;">
            <?= htmlspecialchars($error) ?>
          </div>
          <div class="login_signup">Return to <a href="index.php">Login</a></div>
        <?php endif; ?>
         
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
        // Password show/hide functionality for all password fields
        document.querySelectorAll('.input_box').forEach(function(box) {
          const pwInput = box.querySelector('input[type="password"], input[type="text"]');
          const pwToggle = box.querySelector('.pw_hide');
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
        });

        var setPasswordBtn = document.getElementById('setPasswordBtn');
        var flashModal = document.getElementById('flashModal');
        var flashOkBtn = document.getElementById('flashOkBtn');
        if (setPasswordBtn && flashModal) {
          setPasswordBtn.addEventListener('click', function(e) {
            e.preventDefault();
            // Here you would add password validation logic
            flashModal.style.display = 'flex';
          });
        }
        if (flashOkBtn && flashModal) {
          flashOkBtn.addEventListener('click', function() {
            // hide modal then redirect to login page
            flashModal.style.display = 'none';
            // give a tiny delay to ensure modal hide is rendered, then redirect
            setTimeout(function(){
              window.location.href = 'index.php';
            }, 150);
          });
        }
      });
    </script>
  </body>
</html>
