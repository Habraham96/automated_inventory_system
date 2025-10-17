<?php
// Start session early so CSRF token can be created and persisted reliably.
// This must happen before any HTML output.
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// Ensure CSRF token exists in session and cookie early so headers can be sent
if (empty($_SESSION['csrf_add_staff'])) {
  $_SESSION['csrf_add_staff'] = bin2hex(random_bytes(24));
}
// Set cookie for the token; do this early before any HTML output to ensure
// the Set-Cookie header is actually sent. Cookie is non-HttpOnly by design
// to support double-submit verification from JS/AJAX.
if (empty($_COOKIE['csrf_add_staff']) || $_COOKIE['csrf_add_staff'] !== $_SESSION['csrf_add_staff']) {
  @setcookie('csrf_add_staff', $_SESSION['csrf_add_staff'], 0, '/');
}
// Debug: record that we initialized/ensured CSRF token and whether cookie is present
$dbgFile = __DIR__ . '/components/logs/csrf_debug.log';
try {
  $hdrs = @headers_list();
  $hdrsStr = is_array($hdrs) ? json_encode(array_slice($hdrs,0,10)) : '';
  $logLine = date('Y-m-d H:i:s') . " TOKEN_INIT | ip=" . ($_SERVER['REMOTE_ADDR'] ?? 'unknown')
    . " | session=" . substr($_SESSION['csrf_add_staff'] ?? '',0,20)
    . " | have_cookie=" . (isset($_COOKIE['csrf_add_staff']) ? '1' : '0')
    . " | headers=" . substr($hdrsStr,0,200) . "\n";
  @file_put_contents($dbgFile, $logLine, FILE_APPEND | LOCK_EX);
} catch (Throwable $e) { /* ignore logging errors */ }
?><!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SalesPilot </title>
    <!-- plugins:css -->
    <img src="/assets/icons/bootstrap.svg" alt="Bootstrap" width="32" height="32">
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    /* Sidebar collapse/expand toggle styles (minimal, local overrides) */
    .sidebar{transition:width .2s ease;}
    .main-panel, .page-body-wrapper{transition:margin-left .2s ease;}
    body.sidebar-collapsed .sidebar{
      width:70px !important;
      overflow:hidden;
    }
    body.sidebar-collapsed .sidebar .menu-title,
    body.sidebar-collapsed .sidebar .menu-arrow{
      display:none !important;
    }
    body.sidebar-collapsed .sidebar .menu-icon{
      margin-right:0 !important;
      text-align:center;
      width:100%;
    }
    body.sidebar-collapsed .main-panel{margin-left:70px !important}
    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <!-- Hamburger: clicking this will toggle the sidebar collapsed state -->
            <button id="sidebarToggle" class="navbar-toggler navbar-toggler align-self-center" type="button" aria-label="Toggle sidebar" title="Toggle sidebar">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
        <script>
          (function(){
            var toggle = document.getElementById('sidebarToggle');
            var body = document.body;
            var storageKey = 'sidebarCollapsed';

            function setCollapsed(collapsed, save){
              if(collapsed) body.classList.add('sidebar-collapsed');
              else body.classList.remove('sidebar-collapsed');
              if(save) localStorage.setItem(storageKey, collapsed ? '1' : '0');
            }

            // restore state on load
            try{
              var saved = localStorage.getItem(storageKey);
              if(saved === '1') setCollapsed(true, false);
            }catch(e){/* ignore storage errors */}

            if(toggle){
              toggle.addEventListener('click', function(e){
                e.preventDefault();
                var collapsed = body.classList.contains('sidebar-collapsed');
                setCollapsed(!collapsed, true);
              });
              // make keyboard accessible
              toggle.addEventListener('keydown', function(e){
                if(e.key === 'Enter' || e.key === ' '){
                  e.preventDefault();
                  toggle.click();
                }
              });
            }
          })();
        </script>
            <a href="#" class="nav_logo active"><img src="../asset/images/salespilot%20logo2.png" alt="SalesPilot Logo" style="height:36px;display:block;object-fit:contain;"></a>
        <!-- <script src="assets/vendors/js/vendor.bundle.base.js"></script>
              <img src="assets/images/logo-mini.svg" alt="logo" />
            </a> -->
          </div>
        </div>
        
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <!-- <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
              <h3 class="welcome-sub-text">Your performance summary this week </h3> -->
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block">
              <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 fw-medium float-start">Select category</p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">Bootstrap Bundle </p>
                    <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">Angular Bundle</p>
                    <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular projects</p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">VUE Bundle</p>
                    <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">React Bundle</p>
                    <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block">
              <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
                </span>
                <input type="text" class="form-control">
              </div>
            </li>
            <li class="nav-item">
              <form class="search-form" action="#">
                <i class="icon-search"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
              </form>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="icon-bell"></i>
                <span class="count"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3 border-bottom">
                  <p class="mb-0 fw-medium float-start">You have 4 new notifications </p>
                  <span class="badge badge-pill badge-primary float-end">View all</span>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-alert m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                    <p class="fw-light small-text mb-0"> Just now </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-lock-outline m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                    <p class="fw-light small-text mb-0"> Private message </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                    <p class="fw-light small-text mb-0"> 2 days ago </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="icon-mail icon-lg"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 fw-medium float-start">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-end">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">Marian Garner </p>
                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">David Grey </p>
                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">Travis Jenkins </p>
                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                  </div>
                </a>
              </div>
            </li>
           
          </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="menu-icon bi bi-house-door-fill"></i>
                <span class="menu-title">Home</span>
              </a>
            </li>
            <li class="nav-item nav-category">Dropdown</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <!-- <i class="menu-icon mdi mdi-floor-plan"></i> -->
                <i class="menu-icon bi bi-wallet-fill"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/completed_sales.html">Completed Sales</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/saved_carts.html">Saved Carts</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> -->
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
                  <li class="nav-item"><a class="nav-link" href="pages/sales_summary.html">Sales Summary</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/sales_by_staff.html">Sales by Staff</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/sales_by_item.html">Sales by Item</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/sales_by_category.html">Sales by Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/inventory_valuation.html">Inventory Valuation</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/taxes.html">Taxes</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/discount.html">Discount</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/customers.html">
                <i class="menu-icon bi bi-people-fill"></i>
                <span class="menu-title">Customers</span>
              </a>
              
             <li class="nav-item">
              <a class="nav-link" href="pages/staffs.html">
                <i class="menu-icon bi bi-person-workspace"></i>
                <span class="menu-title">Staffs</span>
              </a>

              <li class="nav-item">
              <a class="nav-link" href="pages/activity_logs.html">
                <i class="menu-icon bi bi-activity"></i>
                <span class="menu-title">Activity Logs</span>
              </a>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
               <i class="menu-icon bi bi-shop-window"></i>
                <span class="menu-title">Inventory</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/all_items.html">All items</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/categories.html">Categories</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/stock_history.html">Stock History</a></li>
                </ul>
              </div>
            
            <li class="nav-item">
              <a class="nav-link" href="pages/suppliers.html">
                <i class="menu-icon bi bi-truck"></i>
                <span class="menu-title">Suppliers</span>
              </a>
              <li class="nav-item">
              <a class="nav-link" href="pages/settings.html">
               <i class="menu-icon bi bi-gear-wide"></i>
                <span class="menu-title">Settings</span>
              </a>
            </li>
              <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3 fw-semibold">Allen Moreno</p>
                  <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
              </div>
            </li>
            
                <!-- <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span> -->
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
      <?php
      // Load DB config and fetch roles for the modal's role select.
      // If the role_table is missing or the query fails we fall back to
      // a small set of sensible defaults so the UI still works.
      try {
        require_once __DIR__ . '/../include/config.php';
        $roles = [];
        $stmt = $pdo->query('SELECT id, name FROM role_table ORDER BY name');
        $f = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($f) $roles = $f;
      } catch (Throwable $e) {
        // Fallback roles when DB/table is not available
        $roles = [
          ['id' => 'admin', 'name' => 'Admin'],
          ['id' => 'manager', 'name' => 'Manager'],
          ['id' => 'staff', 'name' => 'Staff']
        ];
      }

      // Generate a CSRF token for the add-staff form. Store it in session
      // and also set a cookie with the same token (double-submit cookie
      // pattern). The cookie is not httponly so client-side JS can read it
      // if needed; this helps AJAX submissions when session cookie isn't
      // preserved by the client's environment.
      if (empty($_SESSION['csrf_add_staff'])) {
        $_SESSION['csrf_add_staff'] = bin2hex(random_bytes(24));
        // Set cookie for the token; expires at end of session, path=/.
        // Note: in production consider setting 'Secure' => true and
        // proper SameSite attributes via setcookie options when available.
        @setcookie('csrf_add_staff', $_SESSION['csrf_add_staff'], 0, '/');
      } else {
        // Ensure cookie exists for existing session token as well.
        if (empty($_COOKIE['csrf_add_staff'])) {
          @setcookie('csrf_add_staff', $_SESSION['csrf_add_staff'], 0, '/');
        }
      }
        // CSRF token is initialized at the top of the file. It is included
        // below as a hidden input inside the add-staff modal form.

      // Show flash message from add_staff redirect (non-AJAX fallback).
      if (isset($_GET['msg'])) {
        $ok = isset($_GET['ok']) && $_GET['ok'] === '1';
        $msg = htmlspecialchars($_GET['msg']);
        echo '<div class="alert ' . ($ok ? 'alert-success' : 'alert-danger') . ' text-center m-3">' . $msg . '</div>';
      }
      ?>
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                      </li>
                    </ul>
                    <div>
                      <div class="btn-wrapper">
                        <a href="pages/sales_summary.html" class="btn btn-otline-dark align-items-center"><i class="bi bi-file-earmark-text"></i> View all reports</a>
                        <button type="button" class="btn btn-primary text-white me-0 bi bi-person-fill-add" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"> Add staff</button>
                        <button type="button" class="btn btn-primary text-white me-0 bi bi-person-fill-add" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"> Add item</button>
                      </div>
                    </div>
                  </div>


        <!--Modal for adding staff-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Staff</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          
                          <div class="modal-body">
                            <form id="addStaffForm" action="components/add_staff.php" method="POST">
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label for="fullname" class="col-form-label">Full Name:</label>
                                  <input type="text" class="form-control" id="fullname" placeholder="Enter Fullname" name="fullname">
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="username" class="col-form-label">Username:</label>
                                  <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label for="email" class="col-form-label">Email:</label>
                                  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="phone" class="col-form-label">Phone:</label>
                                  <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label for="password" class="col-form-label">Password:</label>
                                  <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="role" class="col-form-label">Role:</label>
                                  <select class="form-control" id="role" name="role">
                                    <?php foreach ($roles as $r): ?>
                                      <option value="<?= htmlspecialchars($r['id']) ?>"><?= htmlspecialchars($r['name']) ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_add_staff']) ?>">
                              </div>
                 <button type="submit" id="addStaffBtn" class="btn btn-primary text-white">Add Staff</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                           
                          </div>
                        </div>
                      </div>
                    </div>

        <!-- end of adding modal for staff-->

                  <div class="tab-content tab-content-basic">
                    <!-- overview tab -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title">Bounce Rate</p>
                              <h3 class="rate-percentage">32.53%</h3>
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                            </div>
                            <div>
                              <p class="statistics-title">Page Views</p>
                              <h3 class="rate-percentage">7,682</h3>
                              <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                            </div>
                            <div>
                              <p class="statistics-title">New Sessions</p>
                              <h3 class="rate-percentage">68.8</h3>
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Avg. Time on Site</p>
                              <h3 class="rate-percentage">2m:35s</h3>
                              <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">New Sessions</p>
                              <h3 class="rate-percentage">68.8</h3>
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Avg. Time on Site</p>
                              <h3 class="rate-percentage">2m:35s</h3>
                              <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                   
                          <div class="row flex-grow"><!-- pending requests table -->
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                      <h4 class="card-title card-title-dash">Pending Requests</h4>
                                      <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                                    </div>
                                    <div>
                                      <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                    </div>
                                  </div>
                                  <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                      <thead>
                                        <tr>
                                          <th>
                                            <div class="form-check form-check-flat mt-0">
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-checked="false" id="check-all"><i class="input-helper"></i></label>
                                            </div>
                                          </th>
                                          <th>Customer</th>
                                          <th>Company</th>
                                          <th>Progress</th>
                                          <th>Status</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-flat mt-0">
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="d-flex ">
                                              <img src="assets/images/faces/face1.jpg" alt="">
                                              <div>
                                                <h6>Brandon Washington</h6>
                                                <p>Head admin</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <h6>Company name 1</h6>
                                            <p>company type</p>
                                          </td>
                                          <td>
                                            <div>
                                              <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                <p class="text-success">79%</p>
                                                <p>85/162</p>
                                              </div>
                                              <div class="progress progress-md">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="badge badge-opacity-warning">In progress</div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-flat mt-0">
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="d-flex">
                                              <img src="assets/images/faces/face2.jpg" alt="">
                                              <div>
                                                <h6>Laura Brooks</h6>
                                                <p>Head admin</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <h6>Company name 1</h6>
                                            <p>company type</p>
                                          </td>
                                          <td>
                                            <div>
                                              <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                <p class="text-success">65%</p>
                                                <p>85/162</p>
                                              </div>
                                              <div class="progress progress-md">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="badge badge-opacity-warning">In progress</div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-flat mt-0">
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="d-flex">
                                              <img src="assets/images/faces/face3.jpg" alt="">
                                              <div>
                                                <h6>Wayne Murphy</h6>
                                                <p>Head admin</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <h6>Company name 1</h6>
                                            <p>company type</p>
                                          </td>
                                          <td>
                                            <div>
                                              <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                <p class="text-success">65%</p>
                                                <p>85/162</p>
                                              </div>
                                              <div class="progress progress-md">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="badge badge-opacity-warning">In progress</div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-flat mt-0">
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="d-flex">
                                              <img src="assets/images/faces/face4.jpg" alt="">
                                              <div>
                                                <h6>Matthew Bailey</h6>
                                                <p>Head admin</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <h6>Company name 1</h6>
                                            <p>company type</p>
                                          </td>
                                          <td>
                                            <div>
                                              <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                <p class="text-success">65%</p>
                                                <p>85/162</p>
                                              </div>
                                              <div class="progress progress-md">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="badge badge-opacity-danger">Pending</div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-check form-check-flat mt-0">
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="d-flex">
                                              <img src="assets/images/faces/face5.jpg" alt="">
                                              <div>
                                                <h6>Katherine Butler</h6>
                                                <p>Head admin</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <h6>Company name 1</h6>
                                            <p>company type</p>
                                          </td>
                                          <td>
                                            <div>
                                              <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                <p class="text-success">65%</p>
                                                <p>85/162</p>
                                              </div>
                                              <div class="progress progress-md">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="badge badge-opacity-success">Completed</div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> <!-- end of pending requests table -->
                        </div>
                      
                        <!-- end of overview tab -->
                        <div class="col-lg-4 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title card-title-dash">Todo list</h4>
                                        <div class="add-items d-flex mb-0">
                                          <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                          <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                        </div>
                                      </div>
                                      <div class="list-wrapper">
                                        <ul class="todo-list todo-list-rounded">
                                          <li class="d-block">
                                            <div class="form-check w-100">
                                              <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                                <i class="mdi mdi-flag ms-2 flag-color"></i>
                                              </div>
                                            </div>
                                          </li>
                                          <li class="d-block">
                                            <div class="form-check w-100">
                                              <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">23 June 2020</div>
                                                <div class="badge badge-opacity-success me-3">Done</div>
                                              </div>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="form-check w-100">
                                              <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-success me-3">Done</div>
                                              </div>
                                            </div>
                                          </li>
                                          <li class="border-bottom-0">
                                            <div class="form-check w-100">
                                              <label class="form-check-label">
                                                <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3">24 June 2020</div>
                                                <div class="badge badge-opacity-danger me-3">Expired</div>
                                              </div>
                                            </div>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title card-title-dash">Type By Amount</h4>
                                      </div>
                                      <div>
                                        <canvas class="my-auto" id="doughnutChart"></canvas>
                                      </div>
                                      <div id="doughnutChart-legend" class="mt-5 text-center"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                          <h4 class="card-title card-title-dash">Leave Report</h4>
                                        </div>
                                        <div>
                                          <div class="dropdown">
                                            <button class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                              <h6 class="dropdown-header">week Wise</h6>
                                              <a class="dropdown-item" href="#">Year Wise</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="mt-3">
                                        <canvas id="leaveReport"></canvas>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row flex-grow">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <!-- Small script to keep sidebar static on large screens -->
    <script>
      (function () {
        function applyFixedSidebar() {
          var mq = window.matchMedia('(min-width: 992px)');
          var sidebar = document.getElementById('sidebar');
          var mainPanel = document.querySelector('.main-panel');
          if (!sidebar || !mainPanel) return;

          if (mq.matches) {
            // compute top offset from navbar height
            var navbar = document.querySelector('.navbar');
            var topOffset = navbar ? navbar.getBoundingClientRect().height : 70;
            // compute computed width of sidebar so we can shift main panel
            var sidebarWidth = sidebar.getBoundingClientRect().width || 220;

            sidebar.classList.add('fixed-static');
            sidebar.style.top = topOffset + 'px';
            sidebar.style.height = 'calc(100vh - ' + topOffset + 'px)';

            mainPanel.classList.add('fixed-with-sidebar');
            mainPanel.style.marginLeft = sidebarWidth + 'px';
          } else {
            sidebar.classList.remove('fixed-static');
            sidebar.style.top = '';
            sidebar.style.height = '';

            mainPanel.classList.remove('fixed-with-sidebar');
            mainPanel.style.marginLeft = '';
          }
        }

        document.addEventListener('DOMContentLoaded', applyFixedSidebar);
        window.addEventListener('resize', function () {
          // debounce resize a little
          clearTimeout(window._applyFixedSidebarTimer);
          window._applyFixedSidebarTimer = setTimeout(applyFixedSidebar, 120);
        });
      })();
    </script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
    <!-- Toast container for AJAX responses -->
    <div aria-live="polite" aria-atomic="true" class="position-relative">
      <div id="globalToast" class="toast-container position-fixed top-0 end-0 p-3" style="z-index:99999;"></div>
    </div>
    <script>
      // AJAX submit for Add Staff modal
      (function(){
        var form = document.getElementById('addStaffForm');
        if (!form) return;
        var addBtn = document.getElementById('addStaffBtn');
        form.addEventListener('submit', function(e){
          e.preventDefault();
          if (addBtn) { addBtn.disabled = true; addBtn.textContent = 'Saving...'; }
          var data = new FormData(form);
          // include credentials and CSRF header explicitly to ensure session cookie
          var csrfVal = data.get('csrf_token');
          fetch(form.action, {
            method: 'POST',
            credentials: 'same-origin',
            headers: { 'Accept': 'application/json', 'X-CSRF-Token': csrfVal },
            body: data
          }).then(function(resp){ return resp.json(); }).then(function(json){
            showToast(json.message || (json.success ? 'Saved' : 'Error'), json.success);
            // If server provided email status, show it as an informational toast
            if (json.email_message) {
              setTimeout(function(){ showToast(json.email_message, !!json.email_sent); }, 250);
            }
            if (json.success) {
              // close modal
              var modalEl = document.getElementById('exampleModal');
              if (modalEl) {
                var bsModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                bsModal.hide();
              }
              // reset form
              form.reset();
            }
          }).catch(function(err){
            showToast('Server error. See console.', false);
            console.error(err);
          }).finally(function(){ if (addBtn) { addBtn.disabled = false; addBtn.textContent = 'Add Staff'; } });
        });

        function showToast(message, success) {
          var container = document.getElementById('globalToast');
          if (!container) return;
          var toast = document.createElement('div');
          toast.className = 'toast';
          toast.role = 'alert';
          toast.ariaLive = 'assertive';
          toast.ariaAtomic = 'true';
          toast.innerHTML = '<div class="toast-header ' + (success ? 'text-success' : 'text-danger') + '"><strong class="me-auto">' + (success ? 'Success' : 'Error') + '</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body">' + message + '</div>';
          container.appendChild(toast);
          var bs = new bootstrap.Toast(toast, { delay: 5000 });
          bs.show();
          // remove after hidden
          toast.addEventListener('hidden.bs.toast', function(){ toast.remove(); });
        }
      })();
    </script>
  </body>
</html>