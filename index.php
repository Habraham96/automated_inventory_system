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
        <a href="#" class="nav_logo active">LOGO</a>
        <ul class="nav_items" style="width:100%;display:flex;justify-content:center;align-items:center;">
          <h2 style="margin:0 auto;text-align:center;font-size:1.7rem;font-weight:600;color:#7d2ae8;">Inventory And Sales Management Made Easy</h2>
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
        <form action="#" style="width:100%;">
          <h2>Login</h2>
          <div class="input_box">
            <input type="email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>
          <div class="input_box">
            <input type="password" placeholder="Enter your password" required />
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
          <button class="button">Login Now</button>
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
