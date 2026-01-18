<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile - SalesPilot</title>
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
      .content-container { padding: 25px; background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
      .dropdown-menu { position: absolute !important; z-index: 10000 !important; display: none; background: white !important; border: 1px solid rgba(0,0,0,.15) !important; border-radius: 0.25rem !important; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175) !important; }
      .dropdown-menu.show { display: block !important; }
      .dropdown-menu-end { right: 0 !important; left: auto !important; }
      .user-dropdown { position: relative !important; }
      
      .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2rem;
        border-radius: 10px;
        color: white;
        margin-bottom: 2rem;
      }
      
      .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        object-fit: cover;
      }
      
      .profile-info-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        margin-bottom: 1.5rem;
      }
      
      .info-row {
        display: flex;
        justify-content: space-between;
        padding: 1rem 0;
        border-bottom: 1px solid #e9ecef;
      }
      
      .info-row:last-child {
        border-bottom: none;
      }
      
      .info-label {
        font-weight: 600;
        color: #6c757d;
        font-size: 0.9rem;
      }
      
      .info-value {
        color: #212529;
        font-size: 0.95rem;
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include 'layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- Sidebar include -->
        <?php include 'layouts/sidebar_content.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Profile content starts here -->
            <div class="row">
              <div class="col-12">
                <div class="profile-header text-center">
                  <img src="../Manager/assets/images/faces/face8.jpg" alt="Profile" class="profile-avatar mb-3">
                  <h3 class="mb-1">Staff User</h3>
                  <p class="mb-0">staff@salespilot.com</p>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="profile-info-card">
                  <h5 class="mb-3"><i class="bi bi-person-circle me-2"></i>Personal Information</h5>
                  <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">Staff User</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">staff@salespilot.com</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Phone</span>
                    <span class="info-value">+234 800 000 0000</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Role</span>
                    <span class="info-value"><span class="badge bg-primary">Staff</span></span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Status</span>
                    <span class="info-value"><span class="badge bg-success">Active</span></span>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="profile-info-card">
                  <h5 class="mb-3"><i class="bi bi-building me-2"></i>Work Information</h5>
                  <div class="info-row">
                    <span class="info-label">Department</span>
                    <span class="info-value">Sales</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Employee ID</span>
                    <span class="info-value">EMP-001</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Join Date</span>
                    <span class="info-value">January 15, 2024</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Last Login</span>
                    <span class="info-value">December 2, 2025 10:30 AM</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Total Sales</span>
                    <span class="info-value text-success">₦1,250,000</span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-12">
                <div class="profile-info-card">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Account Settings</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                      <i class="bi bi-key me-1"></i>Change Password
                    </button>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Two-Factor Authentication</span>
                    <span class="info-value">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="twoFactorSwitch">
                        <label class="form-check-label" for="twoFactorSwitch">Disabled</label>
                      </div>
                    </span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Email Notifications</span>
                    <span class="info-value">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                        <label class="form-check-label" for="emailNotifications">Enabled</label>
                      </div>
                    </span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Account Created</span>
                    <span class="info-value">January 15, 2024</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Profile content ends here -->
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="changePasswordForm">
            <div class="modal-body">
              <div class="mb-3">
                <label for="currentPassword" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="currentPassword" required>
              </div>
              <div class="mb-3">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPassword" required>
              </div>
              <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmPassword" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
          </form>
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
      // Change password form handler
      const changePasswordForm = document.getElementById('changePasswordForm');
      if (changePasswordForm) {
        changePasswordForm.addEventListener('submit', function(e) {
          e.preventDefault();
          
          const currentPassword = document.getElementById('currentPassword').value;
          const newPassword = document.getElementById('newPassword').value;
          const confirmPassword = document.getElementById('confirmPassword').value;
          
          if (newPassword !== confirmPassword) {
            alert('New passwords do not match!');
            return;
          }
          
          if (newPassword.length < 6) {
            alert('Password must be at least 6 characters long!');
            return;
          }
          
          // Simulate password update
          alert('Password updated successfully!');
          
          // Close modal and reset form
          const modal = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
          modal.hide();
          changePasswordForm.reset();
        });
      }
      
      // Two-factor authentication toggle
      const twoFactorSwitch = document.getElementById('twoFactorSwitch');
      if (twoFactorSwitch) {
        twoFactorSwitch.addEventListener('change', function() {
          const label = this.nextElementSibling;
          if (this.checked) {
            label.textContent = 'Enabled';
            alert('Two-factor authentication has been enabled.');
          } else {
            label.textContent = 'Disabled';
            alert('Two-factor authentication has been disabled.');
          }
        });
      }
      
      // Email notifications toggle
      const emailNotifications = document.getElementById('emailNotifications');
      if (emailNotifications) {
        emailNotifications.addEventListener('change', function() {
          const label = this.nextElementSibling;
          if (this.checked) {
            label.textContent = 'Enabled';
          } else {
            label.textContent = 'Disabled';
          }
        });
      }
      
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
