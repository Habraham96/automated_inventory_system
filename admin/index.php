<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard - SalesPilot</title>
    <?php include '../include/responsive.php'; ?>
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php include 'layouts/sidebar_styles.php'; ?>
    <style>
      .main-panel { margin-left: 280px !important; transition: margin-left 0.2s ease !important; }
      body.sidebar-collapsed .main-panel { margin-left: 70px !important; }
      
      .stats-card {
        background: white;
        border-radius: 8px;
        padding: 0.9rem;
        box-shadow: 0 1px 6px rgba(0,0,0,0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        height: 100%;
      }
      
      .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
      }
      
      .stats-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-bottom: 0.6rem;
      }
      
      .stats-value {
        font-size: 1.25rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.25rem;
      }
      
      .stats-label {
        color: #6c757d;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.6px;
      }
      
      .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
      }
      
      .quick-actions {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .quick-action-btn {
        display: flex;
        align-items: center;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        text-decoration: none;
        color: #212529;
        transition: all 0.3s ease;
        margin-bottom: 0.75rem;
      }
      
      .quick-action-btn:hover {
        background: #e9ecef;
        transform: translateX(5px);
        color: #0d6efd;
      }
      
      .quick-action-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.2rem;
      }
      
      .recent-activity {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .activity-item {
        display: flex;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #e9ecef;
      }
      
      .activity-item:last-child {
        border-bottom: none;
      }
      
      .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1rem;
      }
      
      .activity-content {
        flex: 1;
      }
      
      .activity-title {
        font-weight: 600;
        color: #212529;
        margin-bottom: 0.25rem;
      }
      
      .activity-time {
        font-size: 0.85rem;
        color: #6c757d;
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include 'layouts/preloader.php'; ?>
    <?php
    // Include DB config (safe relative path from admin folder)
    if (file_exists(__DIR__ . '/../include/config.php')) {
      include __DIR__ . '/../include/config.php';
    }

    // Determine Total BRM count from likely table names (graceful fallback)
    $total_brm = 0;
    if (isset($pdo)) {
      try {
        $possible = ['brm','brm_contacts','brms','leads','lead','contacts'];
        foreach ($possible as $t) {
          $exists = $pdo->query("SHOW TABLES LIKE '" . $t . "'")->fetchColumn();
          if ($exists) {
            $total_brm = (int) $pdo->query("SELECT COUNT(*) FROM `" . $t . "`")->fetchColumn();
            break;
          }
        }
      } catch (Exception $e) {
        // On error, leave $total_brm as 0
        $total_brm = 0;
      }
    }
    ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php include 'layouts/sidebar_content.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Welcome Section -->
            <div class="welcome-card">
              <h2 class="mb-2">Welcome back, Admin!</h2>
              <p class="mb-0">Here's what's happening with your business today.</p>
            </div>
            
            <!-- Stats Cards (responsive: 2 per row on xs, 3 on sm, 4 on md, 6 on lg+) -->
            <style>
              .stats-link { display:block; color:inherit; text-decoration:none; }
              .stats-link:focus, .stats-link:hover { text-decoration:none; }
            </style>
            <div class="row mb-4">
              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <div class="stats-card">
                  <div class="stats-icon" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="stats-value">245</div>
                  <div class="stats-label">Total Users</div>
                </div>
              </div>

              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <a href="brm.php" class="stats-link" aria-label="Total BRM">
                  <div class="stats-card">
                    <div class="stats-icon" style="background: rgba(13,202,240,0.1); color: #0dcaf0;">
                      <i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div class="stats-value"><?php echo number_format($total_brm); ?></div>
                    <div class="stats-label">Total BRM</div>
                  </div>
                </a>
              </div>

              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <div class="stats-card">
                  <div class="stats-icon" style="background: rgba(25, 135, 84, 0.1); color: #198754;">
                    <i class="bi bi-cash-stack"></i>
                  </div>
                  <div class="stats-value">₦5.2M</div>
                  <div class="stats-label">Total Revenue</div>
                </div>
              </div>

              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <div class="stats-card">
                  <div class="stats-icon" style="background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                    <i class="bi bi-person-check-fill"></i>
                  </div>
                  <div class="stats-value">198</div>
                  <div class="stats-label">Active Subscribers</div>
                </div>
              </div>

              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                <div class="stats-card">
                  <div class="stats-icon" style="background: rgba(220, 53, 69, 0.1); color: #dc3545;">
                    <i class="bi bi-graph-up-arrow"></i>
                  </div>
                  <div class="stats-value">+12%</div>
                  <div class="stats-label">Growth Rate</div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <!-- Quick Actions -->
              <div class="col-md-4 mb-4">
                <div class="quick-actions">
                  <h5 class="mb-3"><i class="bi bi-lightning-charge-fill me-2"></i>Quick Actions</h5>
                  <a href="customers.php" class="quick-action-btn">
                    <div class="quick-action-icon" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                      <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <span>View Customers</span>
                  </a>
                  <a href="brm.php" class="quick-action-btn">
                    <div class="quick-action-icon" style="background: rgba(25, 135, 84, 0.1); color: #198754;">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <span>Manage brm</span>
                  </a>
                  <a href="dashboard.php" class="quick-action-btn">
                    <div class="quick-action-icon" style="background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                      <i class="bi bi-bar-chart-fill"></i>
                    </div>
                    <span>View Analytics</span>
                  </a>
                  <a href="system_config.php" class="quick-action-btn">
                    <div class="quick-action-icon" style="background: rgba(220, 53, 69, 0.1); color: #dc3545;">
                      <i class="bi bi-gear-fill"></i>
                    </div>
                    <span>System Settings</span>
                  </a>
                </div>
              </div>
              
              <!-- Recent Activity -->
              <div class="col-md-8 mb-4">
                <div class="recent-activity">
                  <h5 class="mb-3"><i class="bi bi-clock-history me-2"></i>Recent Activity</h5>
                  
                  <div class="activity-item">
                    <div class="activity-icon" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                      <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">New user registered</div>
                      <div class="activity-time">John Doe joined the system - 5 minutes ago</div>
                    </div>
                  </div>
                  
                  <div class="activity-item">
                    <div class="activity-icon" style="background: rgba(25, 135, 84, 0.1); color: #198754;">
                      <i class="bi bi-cart-check-fill"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">Order completed</div>
                      <div class="activity-time">Order #1523 was successfully processed - 15 minutes ago</div>
                    </div>
                  </div>
                  
                  <div class="activity-item">
                    <div class="activity-icon" style="background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                      <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">System alert</div>
                      <div class="activity-time">Low stock warning for 3 items - 1 hour ago</div>
                    </div>
                  </div>
                  
                  <div class="activity-item">
                    <div class="activity-icon" style="background: rgba(13, 202, 240, 0.1); color: #0dcaf0;">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">brm update</div>
                      <div class="activity-time">5 new leads added to brm - 2 hours ago</div>
                    </div>
                  </div>
                  
                  <div class="activity-item">
                    <div class="activity-icon" style="background: rgba(220, 53, 69, 0.1); color: #dc3545;">
                      <i class="bi bi-shield-fill-check"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">Security update</div>
                      <div class="activity-time">System security patches applied - 3 hours ago</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    
    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Manager/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../Manager/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    <?php include 'layouts/sidebar_scripts.php'; ?>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize Bootstrap dropdown for user avatar
      setTimeout(function() {
        var userDropdown = document.getElementById('UserDropdown');
        var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
        if (userDropdown && dropdownMenu && typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
          try { 
            new bootstrap.Dropdown(userDropdown, { autoClose: true, boundary: 'viewport' }); 
          } catch (error) { 
            console.error('Dropdown initialization error:', error); 
          }
        }
        
        // Initialize sidebar collapse behavior
        var sidebar = document.getElementById('sidebar');
        if (sidebar) {
          sidebar.querySelectorAll('a.nav-link[data-bs-toggle="collapse"]').forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
              e.preventDefault();
              var target = document.querySelector(this.getAttribute('href'));
              if (target && typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                sidebar.querySelectorAll('div.collapse.show').forEach(function (m) { 
                  if (m !== target) bootstrap.Collapse.getOrCreateInstance(m).hide(); 
                });
                bootstrap.Collapse.getOrCreateInstance(target).toggle();
              }
            });
          });
        }
      }, 500);
    });
    </script>
  </body>
</html>
