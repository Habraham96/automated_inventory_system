<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Auto-Renewal Settings - SalesPilot</title>
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
      
      .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      }
      
      .settings-card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .settings-card h5 {
        font-weight: 600;
        color: #495057;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e9ecef;
      }
      
      .setting-item {
        margin-bottom: 1.5rem;
        padding: 1.25rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #0d6efd;
      }
      
      .setting-item label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        display: block;
      }
      
      .setting-item small {
        color: #6c757d;
        display: block;
        margin-top: 0.25rem;
      }
      
      .toggle-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 30px;
      }
      
      .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }
      
      .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 30px;
      }
      
      .toggle-slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
      }
      
      input:checked + .toggle-slider {
        background-color: #198754;
      }
      
      input:checked + .toggle-slider:before {
        transform: translateX(30px);
      }
      
      .subscription-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
      }
      
      .subscription-card:hover {
        border-color: #0d6efd;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      }
      
      .subscription-card .plan-name {
        font-size: 1.25rem;
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
      }
      
      .subscription-card .plan-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0d6efd;
        margin-bottom: 0.5rem;
      }
      
      .subscription-card .renewal-date {
        color: #6c757d;
        font-size: 0.9rem;
      }
      
      .renewal-status {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
      }
      
      .renewal-status.active {
        background: #d1e7dd;
        color: #0a3622;
      }
      
      .renewal-status.inactive {
        background: #f8d7da;
        color: #58151c;
      }
      
      .alert-custom {
        border-left: 4px solid;
        border-radius: 8px;
      }
      
      .alert-custom.alert-warning {
        border-left-color: #ffc107;
        background: #fff3cd;
      }
      
      .alert-custom.alert-info {
        border-left-color: #0dcaf0;
        background: #cff4fc;
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include 'layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php include 'layouts/sidebar_content.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header">
              <div>
                <h3 class="mb-2"><i class="bi bi-arrow-repeat me-2"></i>Auto-Renewal Settings</h3>
                <p class="mb-0">Manage subscription auto-renewal preferences and settings</p>
              </div>
            </div>
            
            <!-- Global Auto-Renewal Settings -->
            <div class="settings-card">
              <h5><i class="bi bi-gear-fill me-2"></i>Global Auto-Renewal Settings</h5>
              
              <div class="setting-item">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <label>Enable Auto-Renewal System</label>
                    <small>Allow subscriptions to automatically renew when they expire</small>
                  </div>
                  <label class="toggle-switch">
                    <input type="checkbox" id="enableAutoRenewal" checked>
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
              
              <div class="setting-item">
                <label for="renewalReminderDays">Renewal Reminder Days</label>
                <input type="number" class="form-control" id="renewalReminderDays" value="7" min="1" max="30">
                <small>Send renewal reminder this many days before expiration</small>
              </div>
              
              <div class="setting-item">
                <label for="gracePeriodDays">Grace Period (days)</label>
                <input type="number" class="form-control" id="gracePeriodDays" value="3" min="0" max="14">
                <small>Days to allow access after payment failure before suspending account</small>
              </div>
              
              <div class="setting-item">
                <label for="maxRetryAttempts">Max Payment Retry Attempts</label>
                <input type="number" class="form-control" id="maxRetryAttempts" value="3" min="1" max="5">
                <small>Number of times to retry failed payment before canceling renewal</small>
              </div>
              
              <div class="setting-item">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <label>Send Renewal Notifications</label>
                    <small>Email users about upcoming renewals and payment status</small>
                  </div>
                  <label class="toggle-switch">
                    <input type="checkbox" id="sendNotifications" checked>
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
              
              <div class="setting-item">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <label>Auto-Upgrade to Annual</label>
                    <small>Allow users to automatically upgrade from monthly to annual plans</small>
                  </div>
                  <label class="toggle-switch">
                    <input type="checkbox" id="autoUpgrade">
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
              
              <div class="text-end">
                <button class="btn btn-primary" onclick="saveGlobalSettings()">
                  <i class="bi bi-check-circle me-2"></i>Save Global Settings
                </button>
              </div>
            </div>
            
            <!-- Active Subscriptions with Auto-Renewal -->
            <div class="settings-card">
              <h5><i class="bi bi-people-fill me-2"></i>User Subscriptions Overview</h5>
              
              <div class="alert alert-custom alert-info">
                <i class="bi bi-info-circle me-2"></i>
                <strong>245 total users</strong> - 187 with auto-renewal enabled, 58 with auto-renewal disabled
              </div>
              
              <div class="row mb-4">
                <div class="col-md-3">
                  <div class="card text-center border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    <div class="card-body">
                      <h2 class="mb-0">187</h2>
                      <small>Auto-Renewal Enabled</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-center border-0" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                    <div class="card-body">
                      <h2 class="mb-0">58</h2>
                      <small>Auto-Renewal Disabled</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-center border-0" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                    <div class="card-body">
                      <h2 class="mb-0">12</h2>
                      <small>Expiring This Week</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-center border-0" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white;">
                    <div class="card-body">
                      <h2 class="mb-0">5</h2>
                      <small>Payment Failed</small>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="mb-3">
                <div class="row g-2">
                  <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search users..." id="searchUsers">
                  </div>
                  <div class="col-md-3">
                    <select class="form-select" id="filterPlan">
                      <option value="">All Plans</option>
                      <option value="trial">Trial</option>
                      <option value="basic">Basic</option>
                      <option value="standard">Standard</option>
                      <option value="premium">Premium</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select class="form-select" id="filterRenewal">
                      <option value="">All Statuses</option>
                      <option value="enabled">Auto-Renewal ON</option>
                      <option value="disabled">Auto-Renewal OFF</option>
                      <option value="expiring">Expiring Soon</option>
                      <option value="failed">Payment Failed</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-outline-primary w-100">
                      <i class="bi bi-search"></i> Search
                    </button>
                  </div>
                </div>
              </div>
              
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Plan</th>
                      <th>Status</th>
                      <th>Next Renewal</th>
                      <th>Amount</th>
                      <th>Auto-Renewal</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="avatar-circle bg-primary text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                            JD
                          </div>
                          <div>
                            <div class="fw-semibold">John Doe</div>
                            <small class="text-muted">john@example.com</small>
                          </div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">Premium</span></td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td>Dec 13, 2025</td>
                      <td class="fw-semibold">₦15,000</td>
                      <td>
                        <label class="toggle-switch">
                          <input type="checkbox" checked onchange="toggleUserRenewal(this, 'john@example.com')">
                          <span class="toggle-slider"></span>
                        </label>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="viewUserDetails('john@example.com')">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="avatar-circle bg-success text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                            SA
                          </div>
                          <div>
                            <div class="fw-semibold">Sarah Adams</div>
                            <small class="text-muted">sarah@example.com</small>
                          </div>
                        </div>
                      </td>
                      <td><span class="badge bg-info">Standard</span></td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td>Dec 20, 2025</td>
                      <td class="fw-semibold">₦10,000</td>
                      <td>
                        <label class="toggle-switch">
                          <input type="checkbox" checked onchange="toggleUserRenewal(this, 'sarah@example.com')">
                          <span class="toggle-slider"></span>
                        </label>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="viewUserDetails('sarah@example.com')">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="avatar-circle bg-warning text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                            MB
                          </div>
                          <div>
                            <div class="fw-semibold">Michael Brown</div>
                            <small class="text-muted">michael@example.com</small>
                          </div>
                        </div>
                      </td>
                      <td><span class="badge bg-secondary">Basic</span></td>
                      <td><span class="badge bg-warning">Expiring Soon</span></td>
                      <td>Dec 8, 2025</td>
                      <td class="fw-semibold">₦5,000</td>
                      <td>
                        <label class="toggle-switch">
                          <input type="checkbox" onchange="toggleUserRenewal(this, 'michael@example.com')">
                          <span class="toggle-slider"></span>
                        </label>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="viewUserDetails('michael@example.com')">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="avatar-circle bg-danger text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                            EW
                          </div>
                          <div>
                            <div class="fw-semibold">Emily White</div>
                            <small class="text-muted">emily@example.com</small>
                          </div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">Premium</span></td>
                      <td><span class="badge bg-danger">Payment Failed</span></td>
                      <td>Dec 5, 2025</td>
                      <td class="fw-semibold">₦15,000</td>
                      <td>
                        <label class="toggle-switch">
                          <input type="checkbox" checked onchange="toggleUserRenewal(this, 'emily@example.com')">
                          <span class="toggle-slider"></span>
                        </label>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="viewUserDetails('emily@example.com')">
                          <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="retryPayment('emily@example.com')">
                          <i class="bi bi-arrow-repeat"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="avatar-circle bg-info text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                            DJ
                          </div>
                          <div>
                            <div class="fw-semibold">David Johnson</div>
                            <small class="text-muted">david@example.com</small>
                          </div>
                        </div>
                      </td>
                      <td><span class="badge bg-info">Standard</span></td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td>Dec 25, 2025</td>
                      <td class="fw-semibold">₦10,000</td>
                      <td>
                        <label class="toggle-switch">
                          <input type="checkbox" checked onchange="toggleUserRenewal(this, 'david@example.com')">
                          <span class="toggle-slider"></span>
                        </label>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="viewUserDetails('david@example.com')">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="avatar-circle bg-secondary text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                            LM
                          </div>
                          <div>
                            <div class="fw-semibold">Lisa Martinez</div>
                            <small class="text-muted">lisa@example.com</small>
                          </div>
                        </div>
                      </td>
                      <td><span class="badge bg-secondary">Basic</span></td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td>Jan 3, 2026</td>
                      <td class="fw-semibold">₦5,000</td>
                      <td>
                        <label class="toggle-switch">
                          <input type="checkbox" checked onchange="toggleUserRenewal(this, 'lisa@example.com')">
                          <span class="toggle-slider"></span>
                        </label>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="viewUserDetails('lisa@example.com')">
                          <i class="bi bi-eye"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">Showing 1-6 of 245 users</div>
                <nav>
                  <ul class="pagination mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
                </nav>
              </div>
            </div>
            
            <!-- Renewal Notifications -->
            <div class="settings-card">
              <h5><i class="bi bi-bell-fill me-2"></i>Renewal Notifications</h5>
              
              <div class="setting-item">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <label>Upcoming Renewal Reminder</label>
                    <small>Notify users about upcoming subscription renewals</small>
                  </div>
                  <label class="toggle-switch">
                    <input type="checkbox" id="notifyUpcoming" checked>
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
              
              <div class="setting-item">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <label>Successful Renewal Confirmation</label>
                    <small>Send confirmation email after successful payment</small>
                  </div>
                  <label class="toggle-switch">
                    <input type="checkbox" id="notifySuccess" checked>
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
              
              <div class="setting-item">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <label>Payment Failure Alert</label>
                    <small>Alert users immediately when payment fails</small>
                  </div>
                  <label class="toggle-switch">
                    <input type="checkbox" id="notifyFailure" checked>
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
              
              <div class="setting-item">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <label>Cancellation Confirmation</label>
                    <small>Confirm when user cancels auto-renewal</small>
                  </div>
                  <label class="toggle-switch">
                    <input type="checkbox" id="notifyCancellation" checked>
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
              
              <div class="text-end">
                <button class="btn btn-primary" onclick="saveNotificationSettings()">
                  <i class="bi bi-check-circle me-2"></i>Save Notification Settings
                </button>
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
    
    function saveGlobalSettings() {
      console.log('Saving global auto-renewal settings...');
      alert('Global auto-renewal settings saved successfully!');
    }
    
    function saveNotificationSettings() {
      console.log('Saving notification settings...');
      alert('Notification settings saved successfully!');
    }
    
    function toggleUserRenewal(checkbox, userEmail) {
      const status = checkbox.checked ? 'enabled' : 'disabled';
      console.log('Auto-renewal ' + status + ' for user:', userEmail);
      alert('Auto-renewal ' + status + ' for ' + userEmail);
    }
    
    function viewUserDetails(userEmail) {
      console.log('Viewing details for:', userEmail);
      alert('Opening details for ' + userEmail);
    }
    
    function retryPayment(userEmail) {
      console.log('Retrying payment for:', userEmail);
      alert('Payment retry initiated for ' + userEmail);
    }
    </script>
  </body>
</html>
