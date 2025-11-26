<!-- Fixed Logo Container -->
<div class="fixed-logo-container">
  <div class="logo-hamburger-wrapper">
    <button id="sidebarToggle" class="navbar-toggler navbar-toggler align-self-center" type="button" aria-label="Toggle sidebar" title="Toggle sidebar">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand brand-logo" href="index.php">
      <img src="../asset/images/salespilot logo2.png" alt="logo" />
    </a>
  </div>
</div>

<!-- Sidebar Navigation -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="menu-icon bi bi-house-door-fill"></i>
        <span class="menu-title">Home</span>
      </a>
    </li>
    <li class="nav-item nav-category">Menu</li>
    <li class="nav-item">
      <a class="nav-link" href="views/sell.php">
        <i class="menu-icon bi bi-cart-fill"></i>
        <span class="menu-title">Sell</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon bi bi-wallet-fill"></i>
        <span class="menu-title">Sales</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="views/completed_sales.php">Completed Sales</a></li>
          <li class="nav-item"> <a class="nav-link" href="views/pending_sales.php">Pending Sales</a></li>
          <li class="nav-item"> <a class="nav-link" href="views/returns.php">Returns</a></li>
          <li class="nav-item"> <a class="nav-link" href="views/saved_carts.php">Saved Carts</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="menu-icon mdi mdi-card-text-outline"></i>
        <span class="menu-title">Reports</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="views/sales_summary.php">Sales Summary</a></li>
          <li class="nav-item"><a class="nav-link" href="views/sales_by_staff.php">Sales by Staff</a></li>
          <li class="nav-item"><a class="nav-link" href="views/sales_by_item.php">Sales by Item</a></li>
          <li class="nav-item"><a class="nav-link" href="views/sales_by_category.php">Sales by Category</a></li>
          <li class="nav-item"><a class="nav-link" href="views/inventory_valuation.php">Inventory Valuation</a></li>
          <li class="nav-item"><a class="nav-link" href="views/taxes.php">Taxes</a></li>
          <li class="nav-item"><a class="nav-link" href="views/discount_report.php">Discount Report</a></li>
        </ul>
      </div>
     <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#crm-menu" aria-expanded="false" aria-controls="crm-menu">
        <i class="menu-icon bi bi-people-fill"></i>
        <span class="menu-title">C R M</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="crm-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="views/customers.php">Customers</a></li>
          <li class="nav-item"> <a class="nav-link" href="views/discount.php">Discount</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="views/staffs.php">
        <i class="menu-icon bi bi-person-workspace"></i>
        <span class="menu-title">Staffs</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="views/activity_logs.php">
        <i class="menu-icon bi bi-activity"></i>
        <span class="menu-title">Activity Logs</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
       <i class="menu-icon bi bi-shop-window"></i>
        <span class="menu-title">Inventory</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="views/all_items.php">All items</a></li>
          <li class="nav-item"> <a class="nav-link" href="views/categories.php">Categories</a></li>
          <li class="nav-item"> <a class="nav-link" href="views/stock_history.php">Stock History</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="views/suppliers.php">
        <i class="menu-icon bi bi-truck"></i>
        <span class="menu-title">Suppliers</span>
      </a>
    </li>
    
    <!-- <li class="nav-item">
      <a class="nav-link" href="views/settings.php">
       <i class="menu-icon bi bi-gear-wide"></i>
        <span class="menu-title">Settings</span>
      </a>
    </li> -->

    <li class="nav-item dropdown user-dropdown">
      <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false" role="button" style="cursor: pointer; display: flex; align-items: center; padding: 15px 20px;">
        <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image" style="width: 40px; height: 40px; object-fit: cover;"> 
      </a>
      <div class="dropdown-menu dropdown-menu-end navbar-dropdown" aria-labelledby="UserDropdown" style="min-width: 250px;">
        <div class="dropdown-header text-center" style="padding: 20px;">
          <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image" style="width: 80px; height: 80px; object-fit: cover;">
          <p class="mb-1 mt-3 fw-semibold">Allen Moreno</p>
          <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
        </div>
        <a class="dropdown-item" href="views/profile.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
        <a class="dropdown-item" href="views/settings.php" style="padding: 10px 20px;"><i class="dropdown-item-icon bi bi-gear-wide text-primary me-2"></i> System Preference</a>
        <a class="dropdown-item" href="#" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
        <a class="dropdown-item" href="views/activity_logs.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
        <a class="dropdown-item" href="#" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
        <a class="dropdown-item" href="../index.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
      </div>
    </li>
  </ul>
</nav>
<script>
// Robust sidebar expand/collapse: only one parent open at a time, single click toggles
document.addEventListener('DOMContentLoaded', function () {
  var sidebar = document.getElementById('sidebar');
  if (sidebar) {
    sidebar.querySelectorAll('a.nav-link[data-bs-toggle="collapse"]').forEach(function (toggle) {
      toggle.addEventListener('click', function (e) {
        e.preventDefault();
        
        var targetSelector = this.getAttribute('href');
        if (!targetSelector || !targetSelector.startsWith('#')) return;
        
        var target = document.querySelector(targetSelector);
        if (!target) return;
        
        // Close all other open submenus (not including the clicked one)
        sidebar.querySelectorAll('div.collapse.show').forEach(function (openMenu) {
          if (openMenu !== target) {
            var collapseInstance = bootstrap.Collapse.getOrCreateInstance(openMenu);
            collapseInstance.hide();
          }
        });
        
        // Toggle the clicked menu
        var targetCollapse = bootstrap.Collapse.getOrCreateInstance(target);
        targetCollapse.toggle();
      });
    });
  }

  // Profile dropdown close on click out or ESC
  var userDropdown = document.getElementById('UserDropdown');
  var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
  function closeProfileDropdown() {
    if (dropdownMenu && dropdownMenu.classList.contains('show')) {
      var dropdownInstance = bootstrap.Dropdown.getInstance(userDropdown);
      if (dropdownInstance) {
        dropdownInstance.hide();
      }
    }
  }
  document.addEventListener('click', function(e) {
    if (dropdownMenu && dropdownMenu.classList.contains('show')) {
      if (!e.target.closest('.user-dropdown')) {
        closeProfileDropdown();
      }
    }
  });
  document.addEventListener('keydown', function(e) {
    if ((e.key === 'Escape' || e.keyCode === 27) && dropdownMenu && dropdownMenu.classList.contains('show')) {
      closeProfileDropdown();
    }
  });
});
</script>