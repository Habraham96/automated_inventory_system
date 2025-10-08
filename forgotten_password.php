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
    <link rel="stylesheet" href="asset/css/forgot.css" />
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
    <!-- Header -->
    <!-- <header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo active">LOGO</a>
        <ul class="nav_items" style="width:100%;display:flex;justify-content:center;align-items:center;">
          <li class="nav_item" style="display:flex;gap:25px;">
            <a href="#" class="nav_link active">Home</a>
            <a href="#" class="nav_link active">Product</a>
            <a href="#" class="nav_link active">Services</a>
            <a href="#" class="nav_link active">Contact</a>
          </li>
        </ul> -->
        <!-- <button class="button" id="form-open">Login</button> -->
      <!-- </nav>
    </header> -->
    <!-- Home -->
    <section class="home">
  <div class="main_content_wrapper" style="width:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;">
    <div class="form_container" style="position:relative;overflow:hidden;">
      <!-- Login Form -->
      <div class="form login_form">
        <form action="#" style="width:100%;">
          <h2>Forgot Password</h2>
          <div class="input_box">
            <input type="email" placeholder="Enter your email" required />
            <i class="uil uil-envelope-alt email"></i>
          </div>
          <button class="button" id="sendResetBtn">Send Reset Link</button>
          <!-- Modal Flash Message -->
          <div id="flashModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);z-index:9999;align-items:center;justify-content:center;">
            <div style="background:#fff;border-radius:12px;max-width:340px;width:90vw;padding:32px 18px;box-shadow:0 8px 32px 0 rgba(0,0,0,0.18);position:relative;display:flex;flex-direction:column;align-items:center;">
              <span style="font-size:2.5rem;color:#198754;margin-bottom:8px;">&#10003;</span>
              <span style="font-size:1.2rem;color:#198754;font-weight:600;text-align:center;">Sent, Click the link in your E-mail</span>
              <button id="flashOkBtn" style="margin-top:18px;padding:8px 28px;font-size:1rem;background:#7d2ae8;color:#fff;border:none;border-radius:8px;cursor:pointer;">OK</button>
            </div>
          </div>
          <div class="login_signup">Remembered your password? <a href="index.php">Login</a></div>
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
        var sendResetBtn = document.getElementById('sendResetBtn');
        var flashModal = document.getElementById('flashModal');
        var flashOkBtn = document.getElementById('flashOkBtn');
        if (sendResetBtn && flashModal) {
          sendResetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            flashModal.style.display = 'flex';
          });
        }
        if (flashOkBtn && flashModal) {
          flashOkBtn.addEventListener('click', function() {
            flashModal.style.display = 'none';
            setTimeout(function(){
              window.location.href = 'create_new_password.php';
            }, 150);
          });
        }
      });
    </script>
  </body>
</html>
