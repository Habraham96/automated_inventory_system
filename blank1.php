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
    <link rel="stylesheet" href="asset/css/blank1.css" />
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