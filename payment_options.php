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
    <link rel="stylesheet" href="asset/css/payment.css" />
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