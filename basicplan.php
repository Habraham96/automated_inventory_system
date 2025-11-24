<?php
session_start();
require 'include/config.php';

// Session timeout logic
$timeout_duration = 1200;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
  $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
  session_unset();
  session_destroy();
  header("Location: index.php?timeout=1");
  exit;
}
$_SESSION['LAST_ACTIVITY'] = time();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
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
    <link rel="stylesheet" href="asset/css/welcome_page.css" />
  </head>
  <body>
    <?php include 'include/preloader.php'; ?>

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
    <section class="home">
  <div style="width:100%;max-width:600px;margin:40px 50px auto;">
    <h2 style="margin-bottom:32px;text-align:center;">Welcome ABRAHAM</h2>
    <p style="text-align:center;font-size:1.1rem;color:#555;max-width:600px;margin:0 auto 24px auto;">Please select the account type you want to continue with:</p>
    <div class="account-type-list-container expanded">
      <!-- <div class="account-user-name" style="text-align:center;font-size:1.18rem;font-weight:bold;color:#7d2ae8;margin-bottom:18px;">DARAMOLA ABRAHAM DAMILOLA</div> -->
      <ul class="account-type-list">
        <li class="account-type-list-item" data-type="manager" style="flex-direction:column;align-items:flex-start;gap:2px;">
          <div style="display:flex;align-items:center;gap:16px;width:100%;">
            <span class="account-type-label">DARAMOLA ABRAHAM DAMILOLA</span>
          </div>
          <span class="account-type-user" style="display:block;font-size:1.01rem;color:#444;margin-left:0;margin-top:0;">Manager Account</span>
        </li>
        <li class="account-type-list-item" data-type="staff" style="flex-direction:column;align-items:flex-start;gap:2px;">
          <div style="display:flex;align-items:center;gap:16px;width:100%;">
            <span class="account-type-label">DARAMOLA ABRAHAM DAMILOLA</span>
          </div>
          <span class="account-type-user" style="display:block;font-size:1.01rem;color:#444;margin-left:0;margin-top:0;">Staff Account</span>
        </li>
      </ul>
    </div>
  
    <div id="accountTypeMsg" style="text-align:center;font-size:1.05rem;color:#7d2ae8;margin-bottom:18px;display:none;"></div>
    <div style="text-align:center;">
      <button id="proceedAccountTypeBtn" class="button" style="background:#7d2ae8;color:#fff;border:none;border-radius:10px;padding:12px 38px;font-size:1.1rem;font-weight:bold;box-shadow:0 2px 12px 0 rgba(125,42,232,0.12);cursor:pointer;opacity:0.6;pointer-events:none;transition:opacity 0.2s;">Proceed</button>
    </div>
  </section>


    <style>
  .account-type-list-container {
    width: 100%;
    max-width: 600px;
    margin: 32px auto 32px auto;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 24px 0 rgba(125,42,232,0.13);
    padding: 36px 0 24px 0;
    border: 2.5px solid #ececf6;
  }
  .account-type-list-container.expanded {
    max-width: 700px;
    padding: 44px 0 32px 0;
  }
  .account-user-name {
    font-size: 1.18rem;
    font-weight: bold;
    color: #7d2ae8;
    margin-bottom: 18px;
    letter-spacing: 0.5px;
  }
  .account-type-list {
    list-style: none;
    margin: 0;
    padding: 0 24px;
    display: flex;
    flex-direction: column;
    gap: 18px;
  }
  .account-type-list-item {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 2px;
    padding: 16px 24px;
    border-radius: 12px;
    cursor: pointer;
    transition: background 0.18s, box-shadow 0.18s, border-color 0.18s, color 0.18s;
    font-size: 1.08rem;
    font-weight: 500;
    color: #7d2ae8;
    border: 2px solid transparent;
    background: #fff;
    width: 100%;
    box-sizing: border-box;
  }
  .account-type-list-item:hover {
    background: #f7f3ff;
    box-shadow: 0 2px 8px 0 rgba(125,42,232,0.10);
    border-color: #d1c4e9;
    color: #5a1bbf;
  }
  .account-type-list-item.selected {
    background: #f7f3ff;
    border-color: #7d2ae8;
    color: #5a1bbf;
    box-shadow: 0 2px 8px 0 rgba(125,42,232,0.10);
    width: 100%;
  }
  .account-type-label {
    font-size: 1.08rem;
    color: inherit;
    font-weight: 500;
  }
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
        // Root preloader handled via include 'include/preloader.php'
      })();

      // Account type selection logic (vertical list)
      document.addEventListener('DOMContentLoaded', function() {
        var accountTypeItems = document.querySelectorAll('.account-type-list-item');
        var proceedBtn = document.getElementById('proceedAccountTypeBtn');
        var msg = document.getElementById('accountTypeMsg');
        var selectedType = null;
        accountTypeItems.forEach(function(item) {
          item.addEventListener('click', function() {
            accountTypeItems.forEach(function(i) { i.classList.remove('selected'); });
            item.classList.add('selected');
            selectedType = item.getAttribute('data-type');
            proceedBtn.style.opacity = '1';
            proceedBtn.style.pointerEvents = 'auto';
            msg.style.display = 'block';
            // msg.textContent = (selectedType === 'manager') ? 'You have selected Manager Account.' : 'You have selected Staff Account.';
          });
        });
        proceedBtn.addEventListener('click', function() {
          if (!selectedType) return;
          msg.textContent = 'Proceeding with ' + (selectedType === 'manager' ? 'Manager' : 'Staff') + ' Account...';
          // Example: window.location.href = selectedType + '_dashboard.php';
        });
      });
    </script>
  </body>
</html>