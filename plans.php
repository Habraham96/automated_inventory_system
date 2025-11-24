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

// Fetch plan amounts
// Fetch all plan amounts (assuming plans_amount table has columns for Basic, Standard, Premium)
$plan_amount = "SELECT * FROM plans_amount";
// Fetch plan amounts
$stmt = $pdo->prepare($plan_amount);
$stmt->execute();
$plan_amounts = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Create plans table if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS plans (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  plan_name VARCHAR(50) NOT NULL,
  selected_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");


$redirect_map = [
  'trial' => 'payment_options.php',
  'basic' => 'payment_options.php',
  'standard' => 'payment_options.php',
  'premium' => 'payment_options.php',
  'basic-monthly' => 'payment_options.php',
  'standard-monthly' => 'payment_options.php',
  'premium-monthly' => 'payment_options.php',
  'basic-3months' => 'payment_options.php',
  'standard-3months' => 'payment_options.php',
  'premium-3months' => 'payment_options.php',
  'basic-6months' => 'payment_options.php',
  'standard-6months' => 'payment_options.php',
  'premium-6months' => 'payment_options.php',
  'basic-annual' => 'payment_options.php',
  'standard-annual' => 'payment_options.php',
  'premium-annual' => 'payment_options.php'
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
    <?php include 'include/head_fonts.php'; ?>
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="asset/css/plan.css" />
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
      <div style="width:100%;max-width:1400px;margin:0 auto;padding:0 20px;">
        <h2 style="margin-bottom:32px;text-align:center;">Choose the best plan for your business</h2>
        <p style="text-align:center;font-size:0.95rem;color:#555;max-width:680px;margin:0 auto 24px auto;">Thank you for choosing our Inventory and Sales Management System. To get started, please select a subscription plan that best suits your business needs.</p>
        <?php if (!empty($error)): ?>
          <div style="color:red; margin:16px 0; text-align:center; font-weight:500; font-size:1.1rem;">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>
        
        <!-- Tabs Navigation -->
        <div class="tabs-container" style="margin-top: 40px;">
          <div class="tabs-nav" style="display: flex; justify-content: center; gap: 16px; margin-bottom: 32px; flex-wrap: wrap;">
            <button class="tab-btn active" data-tab="monthly" type="button">Monthly</button>
            <button class="tab-btn" data-tab="3months" type="button">3 Months</button>
            <button class="tab-btn" data-tab="6months" type="button">6 Months</button>
            <button class="tab-btn" data-tab="annual" type="button">Annual</button>
          </div>
          
          <form action="" method="post">
            <input type="hidden" name="plan" id="selectedPlan" value="" required>
            <!-- Monthly Tab -->
            <div class="tab-content active" id="monthly">
              <div class="plan-table" style="display: flex; gap: 24px; justify-content: center; align-items: stretch; margin-bottom: 32px; flex-wrap: wrap;">
                
                <!-- Free Trial -->
                <div class="plan-card trial" tabindex="0" data-plan-value="trial" data-plan-name="Free Trial" data-plan-price="Free">
                  <div class="trial-badge">Try It Free</div>
                  <h3>Free Trial</h3>
                  <div class="plan-duration">14 Days</div>
                  <div class="plan-price">₦0</div>
                  <div class="plan-desc">Test all features risk-free</div>
                  <button class="plan-detail-btn" type="button" data-plan="trial">View Details</button>
                </div>
                
                <!-- Basic Monthly -->
                <div class="plan-card" tabindex="0" data-plan-value="basic-monthly" data-plan-name="Basic (Monthly)" data-plan-price="₦5,000">
                  <h3>Basic</h3>
                  <div class="plan-duration">Monthly</div>
                  <div class="plan-price">₦5,000</div>
                  <div class="plan-desc">Ideal for small businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="basic-monthly">View Details</button>
                </div>
                
                <!-- Standard Monthly -->
                <div class="plan-card" tabindex="0" data-plan-value="standard-monthly" data-plan-name="Standard (Monthly)" data-plan-price="₦10,000">
                  <h3>Standard</h3>
                  <div class="plan-duration">Monthly</div>
                  <div class="plan-price">₦10,000</div>
                  <div class="plan-desc">Perfect for growing businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="standard-monthly">View Details</button>
                </div>
                
                <!-- Premium Monthly -->
                <div class="plan-card" tabindex="0" data-plan-value="premium-monthly" data-plan-name="Premium (Monthly)" data-plan-price="₦20,000">
                  <h3>Premium</h3>
                  <div class="plan-duration">Monthly</div>
                  <div class="plan-price">₦20,000</div>
                  <div class="plan-desc">Best for established businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="premium-monthly">View Details</button>
                </div>
                
              </div>
            </div>
            
            <!-- 3 Months Tab -->
            <div class="tab-content" id="3months">
              <div class="plan-table" style="display: flex; gap: 24px; justify-content: center; align-items: stretch; margin-bottom: 32px; flex-wrap: wrap;">
                
                <!-- Basic 3 Months -->
                <div class="plan-card" tabindex="0" data-plan-value="basic-3months" data-plan-name="Basic (3 Months)" data-plan-price="₦13,500">
                  <h3>Basic</h3>
                  <div class="plan-duration">3 Months</div>
                  <div class="plan-price">₦13,500</div>
                  <div class="plan-original-price">₦15,000</div>
                  <div class="plan-savings">Save 10%</div>
                  <div class="plan-desc">Ideal for small businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="basic-3months">View Details</button>
                </div>
                
                <!-- Standard 3 Months -->
                <div class="plan-card" tabindex="0" data-plan-value="standard-3months" data-plan-name="Standard (3 Months)" data-plan-price="₦27,000">
                  <h3>Standard</h3>
                  <div class="plan-duration">3 Months</div>
                  <div class="plan-price">₦27,000</div>
                  <div class="plan-original-price">₦30,000</div>
                  <div class="plan-savings">Save 10%</div>
                  <div class="plan-desc">Perfect for growing businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="standard-3months">View Details</button>
                </div>
                
                <!-- Premium 3 Months -->
                <div class="plan-card" tabindex="0" data-plan-value="premium-3months" data-plan-name="Premium (3 Months)" data-plan-price="₦54,000">
                  <h3>Premium</h3>
                  <div class="plan-duration">3 Months</div>
                  <div class="plan-price">₦54,000</div>
                  <div class="plan-original-price">₦60,000</div>
                  <div class="plan-savings">Save 10%</div>
                  <div class="plan-desc">Best for established businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="premium-3months">View Details</button>
                </div>
                
              </div>
            </div>
            
            <!-- 6 Months Tab -->
            <div class="tab-content" id="6months">
              <div class="plan-table" style="display: flex; gap: 24px; justify-content: center; align-items: stretch; margin-bottom: 32px; flex-wrap: wrap;">
                
                <!-- Basic 6 Months -->
                <div class="plan-card" tabindex="0" data-plan-value="basic-6months" data-plan-name="Basic (6 Months)" data-plan-price="₦25,500">
                  <h3>Basic</h3>
                  <div class="plan-duration">6 Months</div>
                  <div class="plan-price">₦25,500</div>
                  <div class="plan-original-price">₦30,000</div>
                  <div class="plan-savings">Save 15%</div>
                  <div class="plan-desc">Ideal for small businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="basic-6months">View Details</button>
                </div>
                
                <!-- Standard 6 Months -->
                <div class="plan-card" tabindex="0" data-plan-value="standard-6months" data-plan-name="Standard (6 Months)" data-plan-price="₦51,000">
                  <h3>Standard</h3>
                  <div class="plan-duration">6 Months</div>
                  <div class="plan-price">₦51,000</div>
                  <div class="plan-original-price">₦60,000</div>
                  <div class="plan-savings">Save 15%</div>
                  <div class="plan-desc">Perfect for growing businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="standard-6months">View Details</button>
                </div>
                
                <!-- Premium 6 Months -->
                <div class="plan-card" tabindex="0" data-plan-value="premium-6months" data-plan-name="Premium (6 Months)" data-plan-price="₦102,000">
                  <h3>Premium</h3>
                  <div class="plan-duration">6 Months</div>
                  <div class="plan-price">₦102,000</div>
                  <div class="plan-original-price">₦120,000</div>
                  <div class="plan-savings">Save 15%</div>
                  <div class="plan-desc">Best for established businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="premium-6months">View Details</button>
                </div>
                
              </div>
            </div>
            
            <!-- Annual Tab -->
            <div class="tab-content" id="annual">
              <div class="plan-table" style="display: flex; gap: 24px; justify-content: center; align-items: stretch; margin-bottom: 32px; flex-wrap: wrap;">
                
                <!-- Basic Annual -->
                <div class="plan-card popular" tabindex="0" data-plan-value="basic-annual" data-plan-name="Basic (Annual)" data-plan-price="₦48,000">
                  <div class="popular-badge">Most Popular</div>
                  <h3>Basic</h3>
                  <div class="plan-duration">Annual</div>
                  <div class="plan-price">₦48,000</div>
                  <div class="plan-original-price">₦60,000</div>
                  <div class="plan-savings">Save 20%</div>
                  <div class="plan-desc">Ideal for small businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="basic-annual">View Details</button>
                </div>
                
                <!-- Standard Annual -->
                <div class="plan-card popular" tabindex="0" data-plan-value="standard-annual" data-plan-name="Standard (Annual)" data-plan-price="₦96,000">
                  <div class="popular-badge">Most Popular</div>
                  <h3>Standard</h3>
                  <div class="plan-duration">Annual</div>
                  <div class="plan-price">₦96,000</div>
                  <div class="plan-original-price">₦120,000</div>
                  <div class="plan-savings">Save 20%</div>
                  <div class="plan-desc">Perfect for growing businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="standard-annual">View Details</button>
                </div>
                
                <!-- Premium Annual -->
                <div class="plan-card popular" tabindex="0" data-plan-value="premium-annual" data-plan-name="Premium (Annual)" data-plan-price="₦192,000">
                  <div class="popular-badge">Most Popular</div>
                  <h3>Premium</h3>
                  <div class="plan-duration">Annual</div>
                  <div class="plan-price">₦192,000</div>
                  <div class="plan-original-price">₦240,000</div>
                  <div class="plan-savings">Save 20%</div>
                  <div class="plan-desc">Best for established businesses</div>
                  <button class="plan-detail-btn" type="button" data-plan="premium-annual">View Details</button>
                </div>
                
              </div>
            </div>
            
            <button class="button" type="submit" style="display:block;margin:0 auto;background:#7d2ae8;color:#fff;border:none;border-radius:24px;padding:16px 36px;font-size:1.2rem;font-weight:bold;box-shadow:0 4px 24px 0 rgba(125,42,232,0.18);">Proceed</button>
          </form>
        </div>
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
      /* Tab Navigation Styles */
      .tabs-nav {
        border-bottom: 2px solid #ececf6;
        padding-bottom: 8px;
      }
      
      .tab-btn {
        background: transparent;
        border: 2px solid #ececf6;
        border-radius: 24px;
        padding: 12px 32px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #555;
        cursor: pointer;
        transition: all 0.3s ease;
        outline: none;
      }
      
      .tab-btn:hover {
        border-color: #7d2ae8;
        color: #7d2ae8;
        background: #f7f3ff;
      }
      
      .tab-btn.active {
        background: #7d2ae8;
        color: #fff;
        border-color: #7d2ae8;
        box-shadow: 0 4px 16px 0 rgba(125,42,232,0.24);
      }
      
      /* Tab Content Styles */
      .tab-content {
        display: none;
        animation: fadeIn 0.4s ease-in;
      }
      
      .tab-content.active {
        display: block;
      }
      
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(10px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      
      /* Plan Card Styles */
      .plan-card {
        flex: 1 1 280px;
        min-width: 280px;
        max-width: 320px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 12px 0 rgba(125,42,232,0.10);
        padding: 32px 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 2px solid #ececf6;
        transition: all 0.3s ease;
        cursor: pointer;
        outline: none;
        position: relative;
      }
      
      .plan-card.popular {
        border-color: #ffc107;
        box-shadow: 0 4px 20px 0 rgba(255,193,7,0.25);
      }
      
      .plan-card.trial {
        border-color: #28a745;
        box-shadow: 0 4px 20px 0 rgba(40,167,69,0.25);
      }
      
      .popular-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        color: #fff;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: bold;
        box-shadow: 0 4px 12px 0 rgba(255,193,7,0.35);
      }
      
      .trial-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: #fff;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: bold;
        box-shadow: 0 4px 12px 0 rgba(40,167,69,0.35);
      }
      
      .plan-card h3 {
        margin-bottom: 8px;
        color: #7d2ae8;
        font-size: 1.5rem;
        font-weight: 700;
      }
      
      .plan-duration {
        font-size: 0.9rem;
        color: #888;
        margin-bottom: 12px;
        font-weight: 500;
      }
      
      .plan-price {
        font-size: 2rem;
        margin-bottom: 4px;
        font-weight: bold;
        color: #333;
      }
      
      .plan-original-price {
        font-size: 1rem;
        color: #999;
        text-decoration: line-through;
        margin-bottom: 6px;
      }
      
      .plan-savings {
        font-size: 0.95rem;
        color: #28a745;
        font-weight: 600;
        margin-bottom: 12px;
        background: #d4edda;
        padding: 4px 12px;
        border-radius: 12px;
      }
      
      .plan-desc {
        font-size: 1rem;
        color: #555;
        text-align: center;
        margin-bottom: 20px;
      }
      
      .plan-detail-btn {
        background: #7d2ae8;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 24px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .plan-detail-btn:hover {
        background: #6a23c9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px 0 rgba(125,42,232,0.35);
      }
      
      .plan-card:hover {
        border-color: #7d2ae8;
        box-shadow: 0 6px 28px 0 rgba(125,42,232,0.20);
        background: #f7f3ff;
        transform: translateY(-4px);
      }
      
      .plan-card.selected, .plan-card:focus {
        border-color: #007bff;
        box-shadow: 0 8px 32px 0 rgba(0,123,255,0.25);
        background: #eaf1ff;
        transform: translateY(-4px);
      }
      
      .plan-card.popular:hover {
        box-shadow: 0 8px 32px 0 rgba(255,193,7,0.35);
      }
      
      .plan-card.trial:hover {
        box-shadow: 0 8px 32px 0 rgba(40,167,69,0.35);
      }
    </style>
    <script>
      // Root preloader handled via include 'include/preloader.php'
    </script>
      // Highlight plan card on click
      document.addEventListener('DOMContentLoaded', function() {
        // Add plan_name getter for AJAX verification
        window.getSelectedPlanName = function() {
          var selectedCard = document.querySelector('.plan-card.selected');
          return selectedCard ? selectedCard.getAttribute('data-plan-name') : '';
        };
        
        // Tab switching functionality
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabBtns.forEach(btn => {
          btn.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Remove active class from all tabs and contents
            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(tabId).classList.add('active');
            
            // Clear any previously selected plan cards and hidden input
            document.querySelectorAll('.plan-card').forEach(card => {
              card.classList.remove('selected');
            });
            if (hiddenInput) {
              hiddenInput.value = '';
            }
          });
        });
        const hiddenInput = document.getElementById('selectedPlan');
        
        // Function to select a plan card
        function selectPlanCard(card) {
          // Remove selected class from all cards
          document.querySelectorAll('.plan-card').forEach(c => c.classList.remove('selected'));
          
          // Add selected class to clicked card
          card.classList.add('selected');
          
          // Update hidden input with selected plan value
          const planValue = card.getAttribute('data-plan-value');
          if (hiddenInput && planValue) {
            hiddenInput.value = planValue;
          }
        }
        
        // Add click event to all plan cards
        document.addEventListener('click', function(e) {
          const card = e.target.closest('.plan-card');
          if (card && !e.target.classList.contains('plan-detail-btn')) {
            selectPlanCard(card);
          }
        });
        
        // Add keyboard navigation
        document.querySelectorAll('.plan-card').forEach(card => {
          card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              selectPlanCard(this);
            }
          });
        });

        // Modal logic
        const planDetails = {
          'trial': {
            title: 'Free Trial',
            price: 'Free for 7 days',
            desc: 'Test all features risk-free',
            features: [
              '7 days full access',
              'Single Manager Account',
              'Up to 2 agent/employer accounts',
              'All basic features included',
              'Email support',
              'Mobile app access',
              'No credit card required',
              'Upgrade anytime'
            ]
          },
          'basic-monthly': {
            title: 'Basic Plan - Monthly',
            price: '₦5,000/month',
            desc: 'Ideal for small businesses',
            features: [
              'Single Manager Account',
              'Allows Only 1 agent/employer account',
              'Basic inventory management',
              'Email support',
              'Mobile app access',
              'Flexible monthly billing',
              'Cancel anytime'
            ]
          },
          'standard-monthly': {
            title: 'Standard Plan - Monthly',
            price: '₦10,000/month',
            desc: 'Perfect for growing businesses',
            features: [
              'Allows Two(2) Managers Account',
              'Up to Three(3) agent/employer accounts',
              'Advanced inventory management',
              'Customizable reports',
              'Email & phone support',
              'Mobile app access',
              'Flexible monthly billing',
              'Cancel anytime'
            ]
          },
          'premium-monthly': {
            title: 'Premium Plan - Monthly',
            price: '₦20,000/month',
            desc: 'Best for established businesses',
            features: [
              'Up to Three(3) Managers Account',
              'Up to Ten(10) agent/employer accounts',
              'All inventory features',
              'Advanced analytics & reporting',
              'Dedicated account manager',
              'Priority support 24/7',
              'Mobile app access',
              'Custom integrations',
              'Flexible monthly billing',
              'Cancel anytime'
            ]
          },
          'basic-3months': {
            title: 'Basic Plan - 3 Months',
            price: '₦13,500',
            desc: 'Ideal for small businesses',
            features: [
              'Single Manager Account',
              'Allows Only 1 agent/employer account',
              'Basic inventory management',
              'Email support',
              'Mobile app access',
              'Save 10% compared to monthly billing'
            ]
          },
          'basic-6months': {
            title: 'Basic Plan - 6 Months',
            price: '₦25,500',
            desc: 'Ideal for small businesses',
            features: [
              'Single Manager Account',
              'Allows Only 1 agent/employer account',
              'Basic inventory management',
              'Priority email support',
              'Mobile app access',
              'Save 15% compared to monthly billing'
            ]
          },
          'basic-annual': {
            title: 'Basic Plan - Annual',
            price: '₦48,000',
            desc: 'Ideal for small businesses',
            features: [
              'Single Manager Account',
              'Allows Only 1 agent/employer account',
              'Basic inventory management',
              'Priority support',
              'Mobile app access',
              'Save 20% compared to monthly billing',
              'Best value for money'
            ]
          },
          'standard-3months': {
            title: 'Standard Plan - 3 Months',
            price: '₦27,000',
            desc: 'Perfect for growing businesses',
            features: [
              'Allows Two(2) Managers Account',
              'Up to Three(3) agent/employer accounts',
              'Advanced inventory management',
              'Customizable reports',
              'Email & phone support',
              'Mobile app access',
              'Save 10% compared to monthly billing'
            ]
          },
          'standard-6months': {
            title: 'Standard Plan - 6 Months',
            price: '₦51,000',
            desc: 'Perfect for growing businesses',
            features: [
              'Allows Two(2) Managers Account',
              'Up to Three(3) agent/employer accounts',
              'Advanced inventory management',
              'Customizable reports',
              'Priority support',
              'Mobile app access',
              'Save 15% compared to monthly billing'
            ]
          },
          'standard-annual': {
            title: 'Standard Plan - Annual',
            price: '₦96,000',
            desc: 'Perfect for growing businesses',
            features: [
              'Allows Two(2) Managers Account',
              'Up to Three(3) agent/employer accounts',
              'Advanced inventory management',
              'Customizable reports',
              'Priority support 24/7',
              'Mobile app access',
              'Advanced analytics',
              'Save 20% compared to monthly billing',
              'Best value for growing teams'
            ]
          },
          'premium-3months': {
            title: 'Premium Plan - 3 Months',
            price: '₦54,000',
            desc: 'Best for established businesses',
            features: [
              'Up to Three(3) Managers Account',
              'Up to Ten(10) agent/employer accounts',
              'All inventory features',
              'Advanced analytics & reporting',
              'Dedicated account manager',
              'Priority support 24/7',
              'Mobile app access',
              'Custom integrations',
              'Save 10% compared to monthly billing'
            ]
          },
          'premium-6months': {
            title: 'Premium Plan - 6 Months',
            price: '₦102,000',
            desc: 'Best for established businesses',
            features: [
              'Up to Three(3) Managers Account',
              'Up to Ten(10) agent/employer accounts',
              'All inventory features',
              'Advanced analytics & reporting',
              'Dedicated account manager',
              'Priority support 24/7',
              'Mobile app access',
              'Custom integrations',
              'API access',
              'Save 15% compared to monthly billing'
            ]
          },
          'premium-annual': {
            title: 'Premium Plan - Annual',
            price: '₦192,000',
            desc: 'Best for established businesses',
            features: [
              'Up to Three(3) Managers Account',
              'Up to Ten(10) agent/employer accounts',
              'All inventory features',
              'Advanced analytics & reporting',
              'Dedicated account manager',
              'Priority support 24/7',
              'Mobile app access',
              'Custom integrations',
              'API access',
              'White-label options',
              'Save 20% compared to monthly billing',
              'Best value for enterprise teams'
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
      });
    </script>
  </body>
</html>