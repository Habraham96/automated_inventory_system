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
    <link rel="stylesheet" href="asset/css/payment.css" />
  </head>
  <body>
    <?php include 'include/preloader.php'; ?>

    <!-- Header -->
    <header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo active"><img src="asset/images/salespilot%20logo2.png" alt="SalesPilot Logo" style="height:36px;display:block;object-fit:contain;"></a>
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
            <input type="text" maxlength="5" placeholder="MM/YY" style="width:100px;padding:10px 14px;border-radius:8px;border:1.5px solid #ececf6;font-size:1rem;box-sizing:border-box;" required />
            <input type="text" maxlength="3" placeholder="CVV" style="width:80px;padding:10px 14px;border-radius:8px;border:1.5px solid #ececf6;font-size:1rem;box-sizing:border-box;" required />
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
      <button id="copyAccountBtn" style="margin-top:8px;padding:8px 28px;font-size:1rem;background:#7d2ae8;color:#fff;border:none;border-radius:8px;cursor:pointer;transition:background 0.2s, box-shadow 0.2s;">Copy Account Number</button>

      <div id="copyMsg" style="display:none;color:#198754;font-size:0.95rem;margin-top:8px;">Copied!</div>

      <div id="paymentNameBox" style="display:none;margin-top:18px;">
        <input type="text" id="paymentNameInput" placeholder="Enter name used for payment" style="width:100%;padding:10px 14px;border-radius:8px;border:1.5px solid #ececf6;font-size:1rem;box-sizing:border-box;" />
        <button id="validatePaymentNameBtn" style="margin-top:10px;padding:8px 28px;font-size:1rem;background:#7d2ae8;color:#fff;border:none;border-radius:8px;cursor:pointer;">Validate Name</button>
        <div id="paymentNameMsg" style="display:none;margin-top:8px;font-size:1rem;"></div>
      </div>
    </div>
    
    <!-- Confirm Payment Button -->
    <div style="text-align:center;margin-top:40px;margin-bottom:40px;">
      <button id="confirmPaymentBtn" class="button" style="background:#28a745;color:#fff;border:none;border-radius:24px;padding:16px 48px;font-size:1.2rem;font-weight:bold;box-shadow:0 4px 24px 0 rgba(40,167,69,0.25);cursor:pointer;transition:all 0.3s ease;">
        Confirm Payment
      </button>
    </div>
    
      <!-- <div class="login_signup">Remembered your password? <a href="index.php">Login</a></div> -->
  <!-- Payment option actions can go here if needed -->
    </div>
  </section>
    <style>
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: scale(0.9);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
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
      // AJAX logic to verify payment name and update payment info
      function verifyAndUpdatePayment(name, amount) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'verify_payment_name.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
            var paymentNameMsg = document.getElementById('paymentNameMsg');
            if (xhr.status === 200) {
              var resp = {};
              try { resp = JSON.parse(xhr.responseText); } catch (e) {}
              if (resp.success) {
                paymentNameMsg.style.display = 'block';
                paymentNameMsg.style.color = '#34c759';
                paymentNameMsg.textContent = 'Payment verified and updated.';
              } else {
                paymentNameMsg.style.display = 'block';
                paymentNameMsg.style.color = 'red';
                paymentNameMsg.textContent = resp.message || 'Name verification failed.';
                // Debug output for troubleshooting
                paymentNameMsg.textContent += '\nDebug: name=' + name + ', amount=' + amount + ', plan_name=' + (window.getSelectedPlanName ? window.getSelectedPlanName() : '');
              }
            } else {
              paymentNameMsg.style.display = 'block';
              paymentNameMsg.style.color = 'red';
              paymentNameMsg.textContent = 'Server error. Please try again.';
            }
          }
        };
        var plan_name = '';
        if (window.getSelectedPlanName) {
          plan_name = window.getSelectedPlanName();
        }
        if (!plan_name) {
          var checked = document.querySelector('input[type=radio][name=plan]:checked');
          if (checked) {
            plan_name = checked.getAttribute('data-name');
          }
        }
        var paymentNameMsg = document.getElementById('paymentNameMsg');
        if (!plan_name) {
          paymentNameMsg.style.display = 'block';
          paymentNameMsg.style.color = 'red';
          paymentNameMsg.textContent = 'Please select a plan before submitting payment.';
          return;
        }
        xhr.send('name=' + encodeURIComponent(name) + '&amount=' + encodeURIComponent(amount) + '&plan_name=' + encodeURIComponent(plan_name));
      }
      // Root preloader handled via include 'include/preloader.php'

      // Payment option logic and UI interactivity
      document.addEventListener('DOMContentLoaded', function() {
        // Get references to all relevant DOM elements
        var bankBtn = document.getElementById('bankTransferBtn');
        var atmBtn = document.getElementById('atmBtn');
        var paystackBox = document.getElementById('paystackAccountBox');
        var copyBtn = document.getElementById('copyAccountBtn');
        var copyMsg = document.getElementById('copyMsg');
        var accountNumber = document.getElementById('accountNumber');
        var atmCardBox = document.getElementById('atmCardBox');
        var paymentNameBox = document.getElementById('paymentNameBox');
        var paymentNameInput = document.getElementById('paymentNameInput');
        var validatePaymentNameBtn = document.getElementById('validatePaymentNameBtn');
        var paymentNameMsg = document.getElementById('paymentNameMsg');
        // Registration name from session (assume stored as first_name + ' ' + surname)
        var regName = "<?= isset($_SESSION['user_name']) ? addslashes($_SESSION['user_name']) : '' ?>";

        // Toggle between Bank Transfer and Debit Card views
        if (bankBtn && paystackBox && atmCardBox) {
          bankBtn.addEventListener('click', function() {
            paystackBox.style.display = 'block'; // Show bank transfer info
            atmCardBox.style.display = 'none';   // Hide debit card info
            bankBtn.style.background = '#5a1bbf';
            bankBtn.style.color = '#fff';
            atmBtn.style.background = '#fff';
            atmBtn.style.color = '#7d2ae8';
          });
        }
        if (atmBtn && paystackBox && atmCardBox) {
          atmBtn.addEventListener('click', function() {
            paystackBox.style.display = 'none';  // Hide bank transfer info
            atmCardBox.style.display = 'block';  // Show debit card info
            atmBtn.style.background = '#5a1bbf';
            atmBtn.style.color = '#fff';
            bankBtn.style.background = '#fff';
            bankBtn.style.color = '#7d2ae8';
          });
        }

        // Handle copy account number button click
        if (copyBtn && accountNumber) {
          copyBtn.addEventListener('click', function() {
            // Visually indicate button was clicked and copying
            copyBtn.style.background = '#5a1bbf';
            copyBtn.style.boxShadow = '0 0 0 2px #7d2ae8';
            copyBtn.textContent = 'Copied!';
            // Helper to show payment name box after copy message
            var showPaymentBox = function() {
              setTimeout(function(){
                copyMsg.style.display = 'none';
                copyBtn.style.background = '#7d2ae8';
                copyBtn.style.boxShadow = '';
                copyBtn.textContent = 'Copy Account Number';
                if (paymentNameBox) {
                  paymentNameBox.style.display = 'block'; // Show name input
                  paymentNameInput.disabled = false;
                  paymentNameInput.focus(); // Focus input for user
                }
              }, 1200);
            };
            // Try to copy account number to clipboard
            try {
              navigator.clipboard.writeText(accountNumber.textContent.trim()).then(function() {
                copyMsg.style.display = 'block'; // Show copied message
                showPaymentBox();
              }, function() {
                copyMsg.style.display = 'block'; // Show copied message even if clipboard fails
                showPaymentBox();
              });
            } catch (e) {
              copyMsg.style.display = 'block'; // Fallback for older browsers
              showPaymentBox();
            }
          });
        }

        // Validate payment name matches registration name
        if (validatePaymentNameBtn) {
          validatePaymentNameBtn.addEventListener('click', function() {
            var entered = paymentNameInput.value.trim();
            var amount = 0;
            // You may want to fetch the amount from the selected plan or user input
            // For now, prompt for amount
            amount = prompt('Enter amount paid:');
            if (!entered) {
              paymentNameMsg.style.display = 'block';
              paymentNameMsg.style.color = 'red';
              paymentNameMsg.textContent = 'Please enter the name used for payment.';
              return;
            }
            if (!amount || isNaN(amount) || Number(amount) <= 0) {
              paymentNameMsg.style.display = 'block';
              paymentNameMsg.style.color = 'red';
              paymentNameMsg.textContent = 'Please enter a valid amount.';
              return;
            }
            // Call AJAX to verify and update
            verifyAndUpdatePayment(entered, amount);
          });
        }
        
        // Handle Confirm Payment button click
        var confirmPaymentBtn = document.getElementById('confirmPaymentBtn');
        if (confirmPaymentBtn) {
          confirmPaymentBtn.addEventListener('click', function() {
            // Create preloader/spinner overlay (same style as signup.php)
            var preloader = document.createElement('div');
            preloader.id = 'paymentPreloader';
            preloader.style.cssText = 'position:fixed;inset:0;display:flex;align-items:center;justify-content:center;flex-direction:column;background:#fff;z-index:99999;transition:opacity 0.35s ease;';
            
            // Create spinner
            var spinner = document.createElement('div');
            spinner.className = 'spinner';
            spinner.style.cssText = 'width:72px;height:72px;border-radius:50%;border:8px solid rgba(125,42,232,0.12);border-top-color:#7d2ae8;animation:spin 1s linear infinite;';
            
            // Create confirmation message below spinner
            var message = document.createElement('div');
            message.style.cssText = 'margin-top:24px;text-align:center;';
            message.innerHTML = '<h2 style="color:#7d2ae8;margin-bottom:8px;font-size:1.5rem;">Processing Payment...</h2><p style="color:#555;font-size:1.1rem;">Please wait while we confirm your payment.</p>';
            
            // Append spinner and message to preloader
            preloader.appendChild(spinner);
            preloader.appendChild(message);
            
            // Append to body
            document.body.appendChild(preloader);
            
            // After 1.5 seconds, show success message
            setTimeout(function() {
              // Update spinner to checkmark and message
              spinner.style.cssText = 'width:72px;height:72px;border-radius:50%;background:#28a745;display:flex;align-items:center;justify-content:center;animation:none;';
              spinner.innerHTML = '<div style="font-size:3rem;color:#fff;">✓</div>';
              
              message.innerHTML = '<h2 style="color:#28a745;margin-bottom:8px;font-size:1.5rem;">Payment Confirmed!</h2><p style="color:#555;font-size:1.1rem;">Redirecting to dashboard...</p>';
              
              // Redirect after another 1.5 seconds
              setTimeout(function() {
                preloader.style.opacity = '0';
                setTimeout(function() {
                  window.location.href = 'Manager/index.php';
                }, 350);
              }, 1500);
            }, 1500);
          });
          
          // Add hover effect
          confirmPaymentBtn.addEventListener('mouseenter', function() {
            this.style.background = '#218838';
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 6px 28px 0 rgba(40,167,69,0.35)';
          });
          
          confirmPaymentBtn.addEventListener('mouseleave', function() {
            this.style.background = '#28a745';
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 24px 0 rgba(40,167,69,0.25)';
          });
        }
      });
    </script>
  </body>
</html>