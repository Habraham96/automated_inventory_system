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

// Create plans table if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS plans (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  plan_name VARCHAR(50) NOT NULL,
  selected_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$redirect_map = [
  'trial' => 'trialplan.php',
  'basic' => 'basicplan.php',
  'standard' => 'standardplan.php',
  'premium' => 'premiumplan.php'
];

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['plan'])) {
  $plan = $_POST['plan'];
  $user_id = $_SESSION['user_id'] ?? null;
  if ($user_id && isset($redirect_map[$plan])) {
    // Save selected plan
    $stmt = $pdo->prepare('INSERT INTO plans (user_id, plan_name) VALUES (?, ?)');
    $stmt->execute([$user_id, $plan]);
    header('Location: ' . $redirect_map[$plan]);
    exit;
  } else {
    $error = 'Invalid plan selection or user not logged in.';
  }
}
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory | Sales</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="asset/css/plan.css" />
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
        <h2 style="margin-bottom:32px;text-align:center;">Choose the best plan for your business</h2>
        <p style="text-align:center;font-size:0.95rem;color:#555;max-width:480px;margin:0 auto 24px auto;">Thank you for choosing our Inventory and Sales Management System. To get started, please select a subscription plan that best suits your business needs.</p>
        <?php if (!empty($error)): ?>
          <div style="color:red; margin:16px 0; text-align:center; font-weight:500; font-size:1.1rem;">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>
        <form action="" method="post">
          <div class="plan-table" style="display: flex; gap: 24px; justify-content: flex-start; align-items: flex-end; margin-top: 30px; margin-bottom: 32px; flex-wrap: wrap;">
            <div class="plan-card" tabindex="0">
              <h3>Free Trial</h3>
              <div class="plan-price">Free / 14 days</div>
              <div class="plan-desc">Try all features at no cost</div>
              <button class="plan-detail-btn" type="button" data-plan="trial">View Detail</button>
              <input type="radio" name="plan" value="trial" style="margin-top:12px;" required>
            </div>
            <div class="plan-card" tabindex="0">
              <h3>Basic Plan</h3>
              <div class="plan-price">N5,000/month</div>
              <div class="plan-desc">Ideal for small businesses</div>
              <button class="plan-detail-btn" type="button" data-plan="basic">View Detail</button>
              <input type="radio" name="plan" value="basic" style="margin-top:12px;">
            </div>
            <div class="plan-card" tabindex="0">
              <h3>Standard Plan</h3>
              <div class="plan-price">N10,000/month</div>
              <div class="plan-desc">Perfect for growing businesses</div>
              <button class="plan-detail-btn" type="button" data-plan="standard">View Detail</button>
              <input type="radio" name="plan" value="standard" style="margin-top:12px;">
            </div>
            <div class="plan-card" tabindex="0" style="width:260px;min-width:260px;max-width:260px;">
              <h3>Premium Plan</h3>
              <div class="plan-price">N20,000/month</div>
              <div class="plan-desc">Best for established businesses</div>
              <button class="plan-detail-btn" type="button" data-plan="premium">View Detail</button>
              <input type="radio" name="plan" value="premium" style="margin-top:12px;">
            </div>
          </div>
          <button class="button" type="submit" style="align-self:flex-end;margin-left:auto;background:#7d2ae8;color:#fff;border:none;border-radius:24px;padding:16px 36px;font-size:1.2rem;font-weight:bold;box-shadow:0 4px 24px 0 rgba(125,42,232,0.18);">Proceed</button>
        </form>
        <!-- Modal for plan details -->
        <div id="planModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.35);z-index:9999;align-items:center;justify-content:center;">
          <div id="planModalContent" style="background:#fff;border-radius:16px;max-width:400px;width:90vw;padding:32px 24px;box-shadow:0 8px 32px 0 rgba(0,0,0,0.18);position:relative;">
            <button id="closePlanModal" style="position:absolute;top:12px;right:16px;background:none;border:none;font-size:1.5rem;cursor:pointer;color:#7d2ae8;">&times;</button>
            <h3 id="modalPlanTitle" style="margin-bottom:12px;color:#7d2ae8;font-size:1.3rem;"></h3>
            <div id="modalPlanPrice" style="font-size:1.1rem;margin-bottom:8px;font-weight:bold;"></div>
            <div id="modalPlanDesc" style="font-size:1rem;color:#555;margin-bottom:16px;"></div>
            <ul id="modalPlanFeatures" style="font-size:1rem;color:#333;padding-left:18px;margin-bottom:0;"></ul>
          </div>
        </div>
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

      // Highlight plan card on click
      document.addEventListener('DOMContentLoaded', function() {
        const planCards = document.querySelectorAll('.plan-card');
        planCards.forEach(card => {
          card.addEventListener('click', function(e) {
            // Only select if not clicking the button
            if (!e.target.classList.contains('plan-detail-btn')) {
              planCards.forEach(c => c.classList.remove('selected'));
              this.classList.add('selected');
            }
          });
          card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              planCards.forEach(c => c.classList.remove('selected'));
              this.classList.add('selected');
            }
          });
        });

        // Modal logic
        const planDetails = {
          trial: {
            title: 'Free Trial',
            price: 'Free / 14 days',
            desc: 'Try all features at no cost',
            features: [
              'All basic features for 14 days',
              'No credit card required',
              'Full support',
              'Easy upgrade to paid plans'
            ]
          },
          basic: {
            title: 'Basic Plan',
            price: 'N5,000/month',
            desc: 'Ideal for small businesses',
            features: [
              'Single Manager Account',
              'Allows Only 1 agent/employer account',
              'Basic inventory management',
            ]
          },
          standard: {
            title: 'Standard Plan',
            price: 'N10,000/month',
            desc: 'Perfect for growing businesses',
            features: [
              'Allows Two(2) Managers Account',
              'Up to Three(3) agent/employer accounts',
              'Advanced inventory management',
              'Customizable reports'
            ]
          },
          premium: {
            title: 'Premium Plan',
            price: 'N20,000/month',
            desc: 'Best for established businesses',
            features: [
              'Up to Three(3) Managers Account',
              'Up to Ten(10) agent/employer accounts',
              'All inventory features',
              'Advanced analytics',
            ]
          }
        };
        const modal = document.getElementById('planModal');
        const modalTitle = document.getElementById('modalPlanTitle');
        const modalPrice = document.getElementById('modalPlanPrice');
        const modalDesc = document.getElementById('modalPlanDesc');
        const modalFeatures = document.getElementById('modalPlanFeatures');
        const closeModalBtn = document.getElementById('closePlanModal');
        document.querySelectorAll('.plan-detail-btn').forEach(btn => {
          btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const plan = this.getAttribute('data-plan');
            const details = planDetails[plan];
            if (details) {
              modalTitle.textContent = details.title;
              modalPrice.textContent = details.price;
              modalDesc.textContent = details.desc;
              modalFeatures.innerHTML = '';
              details.features.forEach(f => {
                const li = document.createElement('li');
                li.textContent = f;
                modalFeatures.appendChild(li);
              });
              modal.style.display = 'flex';
            }
          });
        });
        closeModalBtn.addEventListener('click', function() {
          modal.style.display = 'none';
        });
        modal.addEventListener('click', function(e) {
          if (e.target === modal) {
            modal.style.display = 'none';
          }
        });
        // Proceed button logic
        const proceedBtn = document.getElementById('proceedBtn');
        function updateProceedBtn() {
          const selected = document.querySelector('.plan-card.selected');
          if (selected) {
            proceedBtn.disabled = false;
            proceedBtn.style.opacity = '1';
            proceedBtn.style.cursor = 'pointer';
          } else {
            proceedBtn.disabled = true;
            proceedBtn.style.opacity = '0.6';
            proceedBtn.style.cursor = 'not-allowed';
          }
        }
        document.querySelectorAll('.plan-card').forEach(card => {
          card.addEventListener('click', updateProceedBtn);
          card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') updateProceedBtn();
          });
        });
        // Optionally, handle proceed click
        proceedBtn.addEventListener('click', function() {
          if (!this.disabled) {
            window.location.href = 'payment_options.php';
          }
        });
        // Initial state
        updateProceedBtn();
      });
    </script>
  </body>
</html>