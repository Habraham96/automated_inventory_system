<!-- Fixed Logo Container -->
<head>
  <link rel="stylesheet" href="layouts/sidebar_styles.php">
</head>
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
        <i class="menu-icon bi bi-speedometer2"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    
    <li class="nav-item nav-category">Menu</li>
    
    <li class="nav-item">
      <a class="nav-link" href="customers.php">
        <i class="menu-icon bi bi-people-fill"></i>
        <span class="menu-title">My Customers</span>
      </a>
    </li>
    
    <!-- <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#leads-menu" aria-expanded="false" aria-controls="leads-menu">
        <i class="menu-icon bi bi-star-fill"></i>
        <span class="menu-title">Leads</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="leads-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="leads.php">All Leads</a></li>
          <li class="nav-item"> <a class="nav-link" href="add-lead.php">Add New Lead</a></li>
          <li class="nav-item"> <a class="nav-link" href="converted-leads.php">Converted Leads</a></li>
        </ul>
      </div>
    </li> -->
    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#commissions-menu" aria-expanded="false" aria-controls="commissions-menu" role="button">
        <i class="menu-icon bi bi-cash-stack"></i>
        <span class="menu-title">Commissions</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="commissions-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="commissions.php">My Commissions</a></li>
          <li class="nav-item"> <a class="nav-link" href="commission-history.php">History</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="performance.php">
        <i class="menu-icon bi bi-graph-up"></i>
        <span class="menu-title">Performance</span>
      </a>
    </li>
    
    <li class="nav-item nav-category">Account</li>
    
    <li class="nav-item">
      <a class="nav-link" href="profile.php">
        <i class="menu-icon bi bi-person-circle"></i>
        <span class="menu-title">My Profile</span>
      </a>
    </li>
    
    <li class="nav-item dropdown user-dropdown">
      <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false" role="button" style="cursor: pointer; display: flex; align-items: center; padding: 15px 20px;">
        <img class="img-xs rounded-circle" src="../Manager/assets/images/faces/face1.jpg" alt="Profile image" style="width: 40px; height: 40px; object-fit: cover;"> 
      </a>
      <div class="dropdown-menu dropdown-menu-end navbar-dropdown" aria-labelledby="UserDropdown" style="min-width: 250px;">
        <div class="dropdown-header text-center" style="padding: 20px;">
          <img class="img-md rounded-circle" src="../Manager/assets/images/faces/face1.jpg" alt="Profile image" style="width: 80px; height: 80px; object-fit: cover;">
          <p class="mb-1 mt-3 fw-semibold">BRM User</p>
          <p class="fw-light text-muted mb-0">brm@salespilot.com</p>
        </div>
        <a class="dropdown-item" href="profile.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
        <a class="dropdown-item" href="../log_in.php" style="padding: 10px 20px;"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
      </div>
    </li>
  </ul>
</nav>
