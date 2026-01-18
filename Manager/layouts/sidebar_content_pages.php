<!-- Fixed Logo Container -->
<div class="fixed-logo-container">
  <div class="logo-hamburger-wrapper">
    <button id="sidebarToggle" class="navbar-toggler navbar-toggler align-self-center" type="button" aria-label="Toggle sidebar" title="Toggle sidebar">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand brand-logo" href="../index.php">
      <img src="../../asset/images/salespilot logo2.png" alt="logo" />
    </a>
  </div>
</div>

<!-- Sidebar Navigation -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="../home.php">
        <i class="menu-icon bi bi-house-door-fill"></i>
        <span class="menu-title">Home</span>
      </a>
    </li>
    <li class="nav-item nav-category">Menu</li>


    <li class="nav-item">
      <a class="nav-link" href="sell.php">
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
          <li class="nav-item"> <a class="nav-link" href="completed_sales.php">Completed Sales</a></li>
          <li class="nav-item"> <a class="nav-link" href="pending_sales.php">Pending Sales</a></li>
          <li class="nav-item"> <a class="nav-link" href="returns.php">Returns</a></li>
          <li class="nav-item"> <a class="nav-link" href="saved_carts.php">Saved Carts</a></li>
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
          <li class="nav-item"><a class="nav-link" href="sales_summary.php">Sales Summary</a></li>
          <li class="nav-item"><a class="nav-link" href="sales_by_staff.php">Sales by Staff</a></li>
          <li class="nav-item"><a class="nav-link" href="sales_by_item.php">Sales by Item</a></li>
          <li class="nav-item"><a class="nav-link" href="sales_by_category.php">Sales by Category</a></li>
          <li class="nav-item"><a class="nav-link" href="inventory_valuation.php">Inventory Valuation</a></li>
          <li class="nav-item"><a class="nav-link" href="taxes.php">Taxes</a></li>
          <li class="nav-item"><a class="nav-link" href="discount_report.php">Discount Report</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#crm-menu" aria-expanded="false" aria-controls="crm-menu">
        <i class="menu-icon bi bi-people-fill"></i>
        <span class="menu-title">C R M</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="crm-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="customers.php">Customers</a></li>
          <li class="nav-item"> <a class="nav-link" href="discount.php">Discount</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="staffs.php">
        <i class="menu-icon bi bi-person-workspace"></i>
        <span class="menu-title">Staffs</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="activity_logs.php">
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
          <li class="nav-item"> <a class="nav-link" href="all_items.php">All items</a></li>
          <li class="nav-item"> <a class="nav-link" href="categories.php">Categories</a></li>
          <li class="nav-item"> <a class="nav-link" href="stock_history.php">Stock History</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="suppliers.php">
        <i class="menu-icon bi bi-truck"></i>
        <span class="menu-title">Suppliers</span>
      </a>
    </li>
    
    

    <li class="nav-item dropdown user-dropdown">
      <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false" role="button" style="cursor: pointer; display: flex; align-items: center; padding: 15px 20px;">
        <img class="img-xs rounded-circle" src="../assets/images/faces/face8.jpg" alt="Profile image" style="width: 40px; height: 40px; object-fit: cover;"> 
      </a>
      <div class="dropdown-menu dropdown-menu-end navbar-dropdown" aria-labelledby="UserDropdown" style="min-width: 250px;">
        <div class="dropdown-header text-center" style="padding: 20px;">
          <img class="img-md rounded-circle" src="../assets/images/faces/face8.jpg" alt="Profile image" style="width: 80px; height: 80px; object-fit: cover;">
          <p class="mb-1 mt-3 fw-semibold">Allen Moreno</p>
          <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
        </div>
        <a class="dropdown-item" href="profile.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
        <a class="dropdown-item" href="settings.php" style="padding: 10px 20px;"><i class="dropdown-item-icon bi bi-gear-wide text-primary me-2"></i> System Preference</a>

        <a class="dropdown-item" href="#" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
        <a class="dropdown-item" href="activity_logs.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
        <a class="dropdown-item" href="#" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
        <a class="dropdown-item" href="../../index.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
      </div>
    </li>
  </ul>
</nav>