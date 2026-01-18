<!-- Fixed Logo Container -->
 <head>
<link rel="stylesheet" href="layouts/sidebar_styles.php">
</head>
<div class="fixed-logo-container">
  <div class="logo-hamburger-wrapper">
    <button id="sidebarToggle" class="navbar-toggler navbar-toggler align-self-center" type="button" aria-label="Toggle sidebar" title="Toggle sidebar">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand brand-logo" href="sell.php">
      <img src="../asset/images/salespilot logo2.png" alt="logo" />
    </a>
  </div>
</div>

<!-- Sidebar Navigation -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="menu-icon bi bi-speedometer2"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    
    <li class="nav-item nav-category">Menu</li>
    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#brmSubmenu" aria-expanded="false" aria-controls="brmSubmenu">
        <i class="menu-icon bi bi-people-fill"></i>
        <span class="menu-title">BRM</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="brmSubmenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="brm.php">All BRM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="brm_performance.php">BRM Performance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="brm_commissions.php">BRM Commissions</a>
          </li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="customers.php">
        <i class="menu-icon bi bi-person-badge-fill"></i>
        <span class="menu-title">Customers</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#billingSubmenu" aria-expanded="false" aria-controls="billingSubmenu">
        <i class="menu-icon bi bi-credit-card-fill"></i>
        <span class="menu-title">Billing & Subscription</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="billingSubmenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="plans_pricing.php">Plans and Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payment_methods.php">Payment Methods</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="auto_renewal.php">Auto-Renewal Settings</a>
          </li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="system_config.php">
        <i class="menu-icon bi bi-gear-fill"></i>
        <span class="menu-title">System Configuration</span>
      </a>
    </li>
    
    <li class="nav-item dropdown user-dropdown">
      <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false" role="button" style="cursor: pointer; display: flex; align-items: center; padding: 15px 20px;">
        <img class="img-xs rounded-circle" src="../Manager/assets/images/faces/face8.jpg" alt="Profile image" style="width: 40px; height: 40px; object-fit: cover;"> 
      </a>
      <div class="dropdown-menu dropdown-menu-end navbar-dropdown" aria-labelledby="UserDropdown" style="min-width: 250px;">
        <div class="dropdown-header text-center" style="padding: 20px;">
          <img class="img-md rounded-circle" src="../Manager/assets/images/faces/face8.jpg" alt="Profile image" style="width: 80px; height: 80px; object-fit: cover;">
          <p class="mb-1 mt-3 fw-semibold">Staff User</p>
          <p class="fw-light text-muted mb-0">staff@salespilot.com</p>
        </div>
        <a class="dropdown-item" href="profile.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
        <a class="dropdown-item" href="../index.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
      </div>
    </li>
  </ul>
</nav>

<script>
// Immediate dropdown initialization - runs as soon as this file loads
(function() {
  function initUserDropdown() {
    var userDropdown = document.getElementById('UserDropdown');
    var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
    
    if (userDropdown && dropdownMenu) {
      // Remove any existing click handlers
      var newDropdown = userDropdown.cloneNode(true);
      userDropdown.parentNode.replaceChild(newDropdown, userDropdown);
      userDropdown = newDropdown;
      
      // Manual toggle functionality
      userDropdown.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var isOpen = dropdownMenu.classList.contains('show');
        
        // Close all other dropdowns first
        document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
          menu.classList.remove('show');
        });
        
        if (!isOpen) {
          dropdownMenu.classList.add('show');
          userDropdown.setAttribute('aria-expanded', 'true');
        } else {
          dropdownMenu.classList.remove('show');
          userDropdown.setAttribute('aria-expanded', 'false');
        }
      });
      
      // Close dropdown when clicking outside
      document.addEventListener('click', function(e) {
        if (!userDropdown.contains(e.target) && !dropdownMenu.contains(e.target)) {
          dropdownMenu.classList.remove('show');
          userDropdown.setAttribute('aria-expanded', 'false');
        }
      });
      
      // Close dropdown when clicking on dropdown items
      dropdownMenu.querySelectorAll('.dropdown-item').forEach(function(item) {
        item.addEventListener('click', function() {
          dropdownMenu.classList.remove('show');
          userDropdown.setAttribute('aria-expanded', 'false');
        });
      });
      
      console.log('User dropdown initialized successfully');
    } else {
      console.warn('User dropdown elements not found');
    }
  }
  
  // Try to initialize immediately
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initUserDropdown);
  } else {
    initUserDropdown();
  }
})();
</script>