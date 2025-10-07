<style>
/* Using system Comic Sans family — no external import needed */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Comic Sans MS', 'Comic Sans', cursive;
}
a {
  text-decoration: none;
}
.header {
  position: fixed;
  height: 80px;
  width: 100%;
  z-index: 100;
  padding: 0 20px;
  background: #fff;
  border-bottom: 2px solid #e0e0e0;
}
.nav {
  max-width: 1100px;
  width: 100%;
  margin: 0 auto;
}
.nav,
.nav_item {
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: space-between;
}
.nav_logo,
.nav_link,
.button {
  color: #fff;
}

.nav_logo.active {
  color: red !important;
}

#form-open.button {
  color: red !important;
  border-color: red !important;
}
.nav_logo {
  font-size: 25px;
}
.nav_item {
  column-gap: 25px;
}
.nav_link:hover {
  color: #007bff;
}
.nav_link.active {
  color: #007bff;
  font-weight: bold;
  border-bottom: 3px solid #007bff;
}
.button {
  padding: 6px 24px;
  border: 2px solid #fff;
  background: transparent;
  border-radius: 6px;
  cursor: pointer;
}
.button:active {
  transform: scale(0.98);
}
/* Home */
.home {
  position: relative;
  height: 100vh;
  width: 100%;
  background-image: url("website-forms-bg.jpg");
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  padding-top: 100px;
}
/* .home::before and .home.show::before removed to prevent overlay hiding form */
/* From */
.form_container {
    max-width: 500px;
  min-width: 400px;
  width: 100%;
  min-height: 60vh;
  background: rgba(255,255,255,0.98);
  padding: 40px 32px;
  border-radius: 24px;
  box-shadow: 0 8px 48px 0 rgba(0,0,0,0.25), 0 1.5px 8px 0 rgba(0,0,0,0.10);
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease-out;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  z-index: 10;
}
/* .home.show .form_container not needed */
.signup_form {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: #fff;
  opacity: 0;
  pointer-events: none;
  transform: translateY(100%);
  transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.4s;
  z-index: 2;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.form_container.active .signup_form {
  opacity: 1;
  pointer-events: auto;
  transform: translateY(0);
}
.login_form {
  position: relative;
  z-index: 1;
  transition: opacity 0.4s;
  opacity: 1;
}
.form_container.active .login_form {
  opacity: 1;
}
.form_close {
  position: absolute;
  top: 10px;
  right: 20px;
  color: #0b0217;
  font-size: 22px;
  opacity: 0.7;
  cursor: pointer;
}
.form_container h2 {
  font-size: 2.5rem;
  color: #0b0217;
  text-align: center;
  font-weight: bold;
  margin-bottom: 32px;
}
.input_box {
  position: relative;
  margin-top: 30px;
  width: 100%;
  height: 40px;
}
.input_box input {
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  padding: 0 30px;
  color: #222;
  font-size: 1.25rem;
  font-weight: 500;
  transition: all 0.2s ease;
  border-bottom: 2.5px solid #7d2ae8;
  background: #fff;
  border: 1.5px solid #ececf6;
  border-radius: 10px;
  outline: none;
  padding: 0 54px 0 64px; /* Increase right padding for icon spacing */
  color: #222;
  font-size: 1.25rem;
  font-weight: 500;
  transition: all 0.2s ease;
}
.input_box input:focus {
  border-color: #7d2ae8;
  box-shadow: 0 0 8px 2px #a084e8, 0 0 0 4px rgba(125,42,232,0.10);
  outline: none;
  transition: box-shadow 0.3s, border-color 0.3s;
}
.input_box i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 20px;
  color: #707070;
}
.input_box i.email,
.input_box i.password {
  left: 18px;
}
.input_box input:focus ~ i.email,
.input_box input:focus ~ i.password {
  color: #7d2ae8;
}
.input_box i.pw_hide {
  right: 14px; /* Add space from right border */
  font-size: 18px;
  cursor: pointer;
}
.option_field {
  margin-top: 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form_container a {
  color: #7d2ae8;
  font-size: 12px;
}
.form_container a:hover {
  text-decoration: underline;
}
.checkbox {
  display: flex;
  column-gap: 8px;
  white-space: nowrap;
}
.checkbox input {
  accent-color: #7d2ae8;
}
.checkbox label {
  font-size: 12px;
  cursor: pointer;
  user-select: none;
  color: #0b0217;
}
.form_container .button {
  background: #7d2ae8;
  margin-top: 40px;
  width: 60%;
  padding: 10px 0;
  border-radius: 10px;
  font-size: 1rem;
  display: block;
  margin-left: auto;
  margin-right: auto;
  font-weight: bold;
  letter-spacing: 1px;
  box-shadow: 0 2px 12px 0 rgba(125,42,232,0.15);
}
.login_signup {
  font-size: 12px;
  text-align: center;
  margin-top: 15px;
}
</style>
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
        <form action="#" style="width:100%;">
          <h2>Create New Password</h2>
          <div class="input_box">
            <input type="password" placeholder="New Password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <div class="input_box">
            <input type="password" placeholder="Confirm Password" required />
            <i class="uil uil-lock password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <button class="button" id="setPasswordBtn">Set Password</button>
          <!-- Modal Flash Message -->
          <div id="flashModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);z-index:9999;align-items:center;justify-content:center;">
            <div style="background:#fff;border-radius:12px;max-width:340px;width:90vw;padding:32px 18px;box-shadow:0 8px 32px 0 rgba(0,0,0,0.18);position:relative;display:flex;flex-direction:column;align-items:center;">
              <span style="font-size:2.5rem;color:#198754;margin-bottom:8px;">&#10003;</span>
              <span style="font-size:1.2rem;color:#198754;font-weight:600;text-align:center;">Password Reset Succesfull<br>Login with new password</br></span>
              <button id="flashOkBtn" style="margin-top:18px;padding:8px 28px;font-size:1rem;background:#7d2ae8;color:#fff;border:none;border-radius:8px;cursor:pointer;">OK</button>
            </div>
          </div>
          <div class="login_signup">Return to <a href="index.php">Login</a></div>
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
