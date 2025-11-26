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
      <a class="nav-link" href="sell.php">
        <i class="menu-icon bi bi-cart-fill"></i>
        <span class="menu-title">Sell</span>
      </a>
    </li>
    
    <li class="nav-item nav-category">Menu</li>
    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#sales-menu" aria-expanded="false" aria-controls="sales-menu">
        <i class="menu-icon bi bi-wallet-fill"></i>
        <span class="menu-title">Sales</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="sales-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="completed_sales.php">Completed Sales</a></li>
          <li class="nav-item"> <a class="nav-link" href="pending_sales.php">Pending Sales</a></li>
          <li class="nav-item"> <a class="nav-link" href="returns.php">Returns</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="saved_carts.php">
        <i class="menu-icon bi bi-bookmark-fill"></i>
        <span class="menu-title">Saved Carts</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="customers.php">
        <i class="menu-icon bi bi-people-fill"></i>
        <span class="menu-title">Customers</span>
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