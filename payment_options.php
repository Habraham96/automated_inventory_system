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
    <section class="home">
  <div style="width:100%;max-width:600px;margin:40px 50px auto;">
    <h2 style="margin-bottom:32px;text-align:center;">Payment Options</h2>
    <div class="payment-options" style="display: flex; gap: 32px; justify-content: center; align-items: flex-start; margin-top: 30px; margin-bottom: 32px; flex-wrap: wrap;">
  <button id="bankTransferBtn" class="button" style="background:#7d2ae8;color:#fff;border:none;border-radius:10px;padding:10px 28px;font-size:1rem;font-weight:bold;box-shadow:0 2px 12px 0 rgba(125,42,232,0.12);cursor:pointer;transition:background 0.2s;">Bank Transfer</button>
    <button id="atmBtn" class="button" style="background:#fff;color:#7d2ae8;border:2px solid #7d2ae8;border-radius:10px;padding:10px 28px;font-size:1rem;font-weight:bold;box-shadow:0 2px 12px 0 rgba(125,42,232,0.08);cursor:pointer;transition:background 0.2s;">Debit Card</button>
    </div>
      <!-- Debit Card Draft and Input Fields -->
      <div id="atmCardBox" style="display:none;margin:0 auto 32px auto;max-width:420px;background:#fff;border:2px solid #ececf6;border-radius:16px;padding:32px 24px;box-shadow:0 2px 12px 0 rgba(125,42,232,0.10);text-align:center;">
        <div style="margin-bottom:18px;display:flex;justify-content:center;">
          <!-- Simple SVG Debit card draft -->
          <svg width="320" height="200" viewBox="0 0 320 200" style="max-width:100%;border-radius:16px;box-shadow:0 2px 8px 0 rgba(125,42,232,0.10);">
            <rect x="0" y="0" width="320" height="200" rx="20" fill="#7d2ae8"/>
            <rect x="20" y="40" width="280" height="40" rx="8" fill="#fff" opacity="0.7"/>
            <rect x="20" y="140" width="180" height="20" rx="6" fill="#fff" opacity="0.5"/>
            <circle cx="270" cy="160" r="18" fill="#fff" opacity="0.7"/>
            <circle cx="300" cy="160" r="18" fill="#fff" opacity="0.4"/>
            <text x="32" y="70" font-size="18" fill="#7d2ae8" font-family="'Comic Sans MS', cursive">DEBIT</text>
            <text x="32" y="165" font-size="16" fill="#fff" font-family="'Comic Sans MS', cursive">**** **** **** 1234</text>
          </svg>
        </div>
        <form style="display:flex;flex-direction:column;gap:16px;align-items:center;width:100%;max-width:320px;margin:0 auto;">
          <input type="text" maxlength="19" placeholder="Card Number" style="width:100%;padding:10px 14px;border-radius:8px;border:1.5px solid #ececf6;font-size:1rem;box-sizing:border-box;" required />
          <div style="display:flex;gap:12px;width:100%;">
            <input type="text" maxlength="5" placeholder="MM/YY" style="flex:1 1 0;padding:10px 14px;border-radius:8px;border:1.5px solid #ececf6;font-size:1rem;box-sizing:border-box;" required />
            <input type="text" maxlength="3" placeholder="CVV" style="flex:1 1 0;padding:10px 14px;border-radius:8px;border:1.5px solid #ececf6;font-size:1rem;box-sizing:border-box;" required />
          </div>
          <input type="text" maxlength="32" placeholder="Cardholder Name" style="width:100%;padding:10px 14px;border-radius:8px;border:1.5px solid #ececf6;font-size:1rem;box-sizing:border-box;" required />
          <button type="submit" class="button" style="background:#7d2ae8;color:#fff;border:none;border-radius:8px;padding:10px 0;font-size:1rem;width:100%;font-weight:bold;">Pay Now</button>
        </form>
      </div>
  <div id="paystackAccountBox" style="display:block;margin:0 auto 32px auto;max-width:420px;background:#f7f3ff;border:2px solid #7d2ae8;border-radius:16px;padding:32px 24px;box-shadow:0 2px 12px 0 rgba(125,42,232,0.10);text-align:center;">
      <h3 style="color:#7d2ae8;margin-bottom:12px;">Bank Transfer (Virtual Account)</h3>
      <div style="font-size:1.1rem;margin-bottom:8px;font-weight:bold;">Bank: <span style="color:#0b0217;">Wema Bank</span></div>
      <div style="font-size:1.1rem;margin-bottom:8px;font-weight:bold;">Account Name: <span style="color:#0b0217;">Paystack Technologies</span></div>
      <div style="font-size:1.1rem;margin-bottom:16px;font-weight:bold;">Account Number: <span id="accountNumber" style="color:#0b0217;letter-spacing:2px;">1234567890</span></div>
      <button id="copyAccountBtn" style="margin-top:8px;padding:8px 28px;font-size:1rem;background:#7d2ae8;color:#fff;border:none;border-radius:8px;cursor:pointer;">Copy Account Number</button>
      <div id="copyMsg" style="display:none;color:#198754;font-size:0.95rem;margin-top:8px;">Copied!</div>
    </div>
      <!-- <div class="login_signup">Remembered your password? <a href="index.php">Login</a></div> -->
  <!-- Payment option actions can go here if needed -->
    </div>
  </section>
    <style>
      .plan-card {
        flex: 1 1 200px;
        min-width: 200px;
        max-width: 260px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 12px 0 rgba(125,42,232,0.10);
        padding: 32px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 2px solid #ececf6;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        cursor: pointer;
        outline: none;
      }
      .plan-card h3 {
        margin-bottom: 12px;
        color: #7d2ae8;
        font-size: 1.3rem;
      }
      .plan-price {
        font-size: 1.1rem;
        margin-bottom: 8px;
        font-weight: bold;
      }
      .plan-desc {
        font-size: 1rem;
        color: #555;
        text-align: center;
        margin-bottom: 16px;
      }
      .plan-detail-btn {
        background: #7d2ae8;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 8px 18px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s;
      }
      .plan-card:hover {
        border-color: #7d2ae8;
        box-shadow: 0 4px 24px 0 rgba(125,42,232,0.18);
        background: #f7f3ff;
      }
      .plan-card.selected, .plan-card:focus {
        border-color: #007bff;
        box-shadow: 0 6px 32px 0 rgba(0,123,255,0.18);
        background: #eaf1ff;
      } 
    </style>
    <script>
      // Inject spinner keyframes for inline usage
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

      // Payment option logic
      document.addEventListener('DOMContentLoaded', function() {
        var bankBtn = document.getElementById('bankTransferBtn');
        var atmBtn = document.getElementById('atmBtn');
        var paystackBox = document.getElementById('paystackAccountBox');
        var copyBtn = document.getElementById('copyAccountBtn');
        var copyMsg = document.getElementById('copyMsg');
        var accountNumber = document.getElementById('accountNumber');
          var atmCardBox = document.getElementById('atmCardBox');
          // Show bank transfer info, hide ATM card by default
          if (bankBtn && paystackBox && atmCardBox) {
            bankBtn.addEventListener('click', function() {
              paystackBox.style.display = 'block';
              atmCardBox.style.display = 'none';
              bankBtn.style.background = '#5a1bbf';
              bankBtn.style.color = '#fff';
              atmBtn.style.background = '#fff';
              atmBtn.style.color = '#7d2ae8';
            });
          }
          if (atmBtn && paystackBox && atmCardBox) {
            atmBtn.addEventListener('click', function() {
              paystackBox.style.display = 'none';
              atmCardBox.style.display = 'block';
              atmBtn.style.background = '#5a1bbf';
              atmBtn.style.color = '#fff';
              bankBtn.style.background = '#fff';
              bankBtn.style.color = '#7d2ae8';
            });
          }
        if (copyBtn && accountNumber) {
          copyBtn.addEventListener('click', function() {
            navigator.clipboard.writeText(accountNumber.textContent.trim());
            copyMsg.style.display = 'block';
            setTimeout(function(){ copyMsg.style.display = 'none'; }, 1200);
          });
        }
      });
    </script>
  </body>
</html>