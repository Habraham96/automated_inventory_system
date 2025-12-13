<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>System Configuration - SalesPilot</title>
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
      
      .config-section {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .config-section h5 {
        font-weight: 600;
        color: #495057;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e9ecef;
      }
      
      .config-item {
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #0d6efd;
      }
      
      .config-item label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        display: block;
      }
      
      .config-item small {
        color: #6c757d;
        display: block;
        margin-top: 0.25rem;
      }
      
      .config-tabs {
        background: white;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .config-tabs .nav-link {
        color: #6c757d;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        transition: all 0.3s ease;
      }
      
      .config-tabs .nav-link:hover {
        background: #f8f9fa;
        color: #0d6efd;
      }
      
      .config-tabs .nav-link.active {
        background: #0d6efd;
        color: white;
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
                <h3 class="mb-2"><i class="bi bi-gear-fill me-2"></i>System Configuration</h3>
                <p class="mb-0">Manage system settings and configurations</p>
              </div>
            </div>
            
            <!-- Configuration Tabs -->
            <div class="config-tabs">
              <ul class="nav nav-pills" id="configTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" type="button">
                    <i class="bi bi-gear me-2"></i>General
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button">
                    <i class="bi bi-shield-lock me-2"></i>Security
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="email-tab" data-bs-toggle="pill" data-bs-target="#email" type="button">
                    <i class="bi bi-envelope me-2"></i>Email
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="backup-tab" data-bs-toggle="pill" data-bs-target="#backup" type="button">
                    <i class="bi bi-database me-2"></i>Backup
                  </button>
                </li>
              </ul>
            </div>
            
            <!-- Tab Content -->
            <div class="tab-content" id="configTabsContent">
              <!-- General Settings -->
              <div class="tab-pane fade show active" id="general" role="tabpanel">
                <div class="config-section">
                  <h5><i class="bi bi-building me-2"></i>Business Information</h5>
                  <div class="config-item">
                    <label for="businessName">Business Name</label>
                    <input type="text" class="form-control" id="businessName" value="SalesPilot">
                    <small>Your company or business name</small>
                  </div>
                  <div class="config-item">
                    <label for="businessEmail">Business Email</label>
                    <input type="email" class="form-control" id="businessEmail" value="admin@salespilot.com">
                    <small>Primary contact email for your business</small>
                  </div>
                  <div class="config-item">
                    <label for="businessPhone">Business Phone</label>
                    <input type="tel" class="form-control" id="businessPhone" value="+234 800 000 0000">
                    <small>Primary contact phone number</small>
                  </div>
                  <div class="config-item">
                    <label for="businessAddress">Business Address</label>
                    <textarea class="form-control" id="businessAddress" rows="3">123 Business Street, Lagos, Nigeria</textarea>
                    <small>Full business address</small>
                  </div>
                </div>
                
                <div class="config-section">
                  <h5><i class="bi bi-sliders me-2"></i>System Preferences</h5>
                  <div class="config-item">
                    <label for="currency">Default Currency</label>
                    <select class="form-select" id="currency">
                      <option value="NGN" selected>Nigerian Naira (₦)</option>
                      <option value="USD">US Dollar ($)</option>
                      <option value="GBP">British Pound (£)</option>
                      <option value="EUR">Euro (€)</option>
                    </select>
                    <small>Currency used for all transactions</small>
                  </div>
                  <div class="config-item">
                    <label for="timezone">Timezone</label>
                    <select class="form-select" id="timezone">
                      <option value="Africa/Lagos" selected>Africa/Lagos (WAT)</option>
                      <option value="UTC">UTC</option>
                      <option value="America/New_York">America/New York (EST)</option>
                      <option value="Europe/London">Europe/London (GMT)</option>
                    </select>
                    <small>System timezone for all operations</small>
                  </div>
                  <div class="config-item">
                    <label for="dateFormat">Date Format</label>
                    <select class="form-select" id="dateFormat">
                      <option value="DD/MM/YYYY" selected>DD/MM/YYYY</option>
                      <option value="MM/DD/YYYY">MM/DD/YYYY</option>
                      <option value="YYYY-MM-DD">YYYY-MM-DD</option>
                    </select>
                    <small>Date display format across the system</small>
                  </div>
                </div>
                
                <div class="text-end">
                  <button class="btn btn-primary" onclick="saveGeneralSettings()">
                    <i class="bi bi-check-circle me-2"></i>Save Changes
                  </button>
                </div>
              </div>
              
              <!-- Security Settings -->
              <div class="tab-pane fade" id="security" role="tabpanel">
                <div class="config-section">
                  <h5><i class="bi bi-shield-check me-2"></i>Authentication</h5>
                  <div class="config-item">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <label>Two-Factor Authentication</label>
                        <small>Require 2FA for all user logins</small>
                      </div>
                      <label class="toggle-switch">
                        <input type="checkbox" id="enable2FA">
                        <span class="toggle-slider"></span>
                      </label>
                    </div>
                  </div>
                  <div class="config-item">
                    <label for="sessionTimeout">Session Timeout (minutes)</label>
                    <input type="number" class="form-control" id="sessionTimeout" value="30" min="5" max="120">
                    <small>Auto-logout users after this period of inactivity</small>
                  </div>
                  <div class="config-item">
                    <label for="passwordExpiry">Password Expiry (days)</label>
                    <input type="number" class="form-control" id="passwordExpiry" value="90" min="0" max="365">
                    <small>Require password change after this many days (0 = never)</small>
                  </div>
                </div>
                
                <div class="config-section">
                  <h5><i class="bi bi-key me-2"></i>Password Policy</h5>
                  <div class="config-item">
                    <label for="minPasswordLength">Minimum Password Length</label>
                    <input type="number" class="form-control" id="minPasswordLength" value="8" min="6" max="20">
                    <small>Minimum number of characters required</small>
                  </div>
                  <div class="config-item">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <label>Require Special Characters</label>
                        <small>Passwords must include special characters (@, #, $, etc.)</small>
                      </div>
                      <label class="toggle-switch">
                        <input type="checkbox" id="requireSpecialChars" checked>
                        <span class="toggle-slider"></span>
                      </label>
                    </div>
                  </div>
                  <div class="config-item">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <label>Require Numbers</label>
                        <small>Passwords must include at least one number</small>
                      </div>
                      <label class="toggle-switch">
                        <input type="checkbox" id="requireNumbers" checked>
                        <span class="toggle-slider"></span>
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="text-end">
                  <button class="btn btn-primary" onclick="saveSecuritySettings()">
                    <i class="bi bi-check-circle me-2"></i>Save Changes
                  </button>
                </div>
              </div>
              
              <!-- Email Settings -->
              <div class="tab-pane fade" id="email" role="tabpanel">
                <div class="config-section">
                  <h5><i class="bi bi-envelope-at me-2"></i>SMTP Configuration</h5>
                  <div class="config-item">
                    <label for="smtpHost">SMTP Host</label>
                    <input type="text" class="form-control" id="smtpHost" placeholder="smtp.example.com">
                    <small>Your SMTP server address</small>
                  </div>
                  <div class="config-item">
                    <label for="smtpPort">SMTP Port</label>
                    <input type="number" class="form-control" id="smtpPort" value="587">
                    <small>SMTP port (usually 587 for TLS or 465 for SSL)</small>
                  </div>
                  <div class="config-item">
                    <label for="smtpUsername">SMTP Username</label>
                    <input type="text" class="form-control" id="smtpUsername" placeholder="your-email@example.com">
                    <small>SMTP authentication username</small>
                  </div>
                  <div class="config-item">
                    <label for="smtpPassword">SMTP Password</label>
                    <input type="password" class="form-control" id="smtpPassword" placeholder="••••••••">
                    <small>SMTP authentication password</small>
                  </div>
                  <div class="config-item">
                    <label for="smtpEncryption">Encryption</label>
                    <select class="form-select" id="smtpEncryption">
                      <option value="TLS" selected>TLS</option>
                      <option value="SSL">SSL</option>
                      <option value="NONE">None</option>
                    </select>
                    <small>Email encryption method</small>
                  </div>
                </div>
                
                <div class="config-section">
                  <h5><i class="bi bi-bell me-2"></i>Email Notifications</h5>
                  <div class="config-item">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <label>New User Registration</label>
                        <small>Send email when new users register</small>
                      </div>
                      <label class="toggle-switch">
                        <input type="checkbox" id="notifyNewUser" checked>
                        <span class="toggle-slider"></span>
                      </label>
                    </div>
                  </div>
                  <div class="config-item">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <label>Low Stock Alerts</label>
                        <small>Send email for low stock items</small>
                      </div>
                      <label class="toggle-switch">
                        <input type="checkbox" id="notifyLowStock" checked>
                        <span class="toggle-slider"></span>
                      </label>
                    </div>
                  </div>
                  <div class="config-item">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <label>Payment Confirmations</label>
                        <small>Send email for successful payments</small>
                      </div>
                      <label class="toggle-switch">
                        <input type="checkbox" id="notifyPayment" checked>
                        <span class="toggle-slider"></span>
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="text-end">
                  <button class="btn btn-secondary me-2" onclick="testEmailSettings()">
                    <i class="bi bi-send me-2"></i>Send Test Email
                  </button>
                  <button class="btn btn-primary" onclick="saveEmailSettings()">
                    <i class="bi bi-check-circle me-2"></i>Save Changes
                  </button>
                </div>
              </div>
              
              <!-- Backup Settings -->
              <div class="tab-pane fade" id="backup" role="tabpanel">
                <div class="config-section">
                  <h5><i class="bi bi-cloud-arrow-up me-2"></i>Backup Configuration</h5>
                  <div class="config-item">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <label>Automatic Backups</label>
                        <small>Enable scheduled automatic backups</small>
                      </div>
                      <label class="toggle-switch">
                        <input type="checkbox" id="autoBackup" checked>
                        <span class="toggle-slider"></span>
                      </label>
                    </div>
                  </div>
                  <div class="config-item">
                    <label for="backupFrequency">Backup Frequency</label>
                    <select class="form-select" id="backupFrequency">
                      <option value="daily" selected>Daily</option>
                      <option value="weekly">Weekly</option>
                      <option value="monthly">Monthly</option>
                    </select>
                    <small>How often to perform automatic backups</small>
                  </div>
                  <div class="config-item">
                    <label for="backupTime">Backup Time</label>
                    <input type="time" class="form-control" id="backupTime" value="02:00">
                    <small>Time of day to perform backups</small>
                  </div>
                  <div class="config-item">
                    <label for="backupRetention">Backup Retention (days)</label>
                    <input type="number" class="form-control" id="backupRetention" value="30" min="7" max="365">
                    <small>How long to keep backup files before deletion</small>
                  </div>
                </div>
                
                <div class="config-section">
                  <h5><i class="bi bi-archive me-2"></i>Manual Backup</h5>
                  <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Create a manual backup of your database and files. This will generate a downloadable backup file.
                  </div>
                  <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary" onclick="createDatabaseBackup()">
                      <i class="bi bi-database me-2"></i>Backup Database Only
                    </button>
                    <button class="btn btn-primary" onclick="createFullBackup()">
                      <i class="bi bi-archive me-2"></i>Full System Backup
                    </button>
                  </div>
                </div>
                
                <div class="config-section">
                  <h5><i class="bi bi-clock-history me-2"></i>Recent Backups</h5>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Type</th>
                          <th>Size</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Dec 6, 2025 02:00 AM</td>
                          <td>Automatic</td>
                          <td>45.2 MB</td>
                          <td><span class="badge bg-success">Success</span></td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" onclick="downloadBackup('backup-20251206')">
                              <i class="bi bi-download"></i> Download
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>Dec 5, 2025 02:00 AM</td>
                          <td>Automatic</td>
                          <td>44.8 MB</td>
                          <td><span class="badge bg-success">Success</span></td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" onclick="downloadBackup('backup-20251205')">
                              <i class="bi bi-download"></i> Download
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>Dec 4, 2025 02:00 AM</td>
                          <td>Automatic</td>
                          <td>44.5 MB</td>
                          <td><span class="badge bg-success">Success</span></td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" onclick="downloadBackup('backup-20251204')">
                              <i class="bi bi-download"></i> Download
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <div class="text-end">
                  <button class="btn btn-primary" onclick="saveBackupSettings()">
                    <i class="bi bi-check-circle me-2"></i>Save Changes
                  </button>
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
    
    function saveGeneralSettings() {
      console.log('Saving general settings...');
      alert('General settings saved successfully!');
    }
    
    function saveSecuritySettings() {
      console.log('Saving security settings...');
      alert('Security settings saved successfully!');
    }
    
    function saveEmailSettings() {
      console.log('Saving email settings...');
      alert('Email settings saved successfully!');
    }
    
    function testEmailSettings() {
      console.log('Sending test email...');
      alert('Test email sent! Please check your inbox.');
    }
    
    function saveBackupSettings() {
      console.log('Saving backup settings...');
      alert('Backup settings saved successfully!');
    }
    
    function createDatabaseBackup() {
      console.log('Creating database backup...');
      alert('Database backup created successfully!');
    }
    
    function createFullBackup() {
      console.log('Creating full system backup...');
      alert('Full system backup created successfully!');
    }
    
    function downloadBackup(backupId) {
      console.log('Downloading backup:', backupId);
      alert('Backup download started: ' + backupId);
    }
    </script>
  </body>
</html>
