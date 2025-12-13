<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Profile - SalesPilot</title>
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
      
      .profile-header-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        text-align: center;
      }
      
      .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: white;
        font-weight: 700;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        position: relative;
      }
      
      .avatar-upload {
        position: absolute;
        bottom: 5px;
        right: 5px;
        width: 40px;
        height: 40px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
      }
      
      .avatar-upload:hover {
        background: #0d6efd;
        color: white;
        transform: scale(1.1);
      }
      
      .avatar-upload input[type="file"] {
        display: none;
      }
      
      .profile-name {
        font-size: 2rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.5rem;
      }
      
      .profile-role {
        color: #6c757d;
        font-size: 1.1rem;
        margin-bottom: 1rem;
      }
      
      .profile-stats {
        display: flex;
        justify-content: center;
        gap: 3rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e9ecef;
      }
      
      .stat-item {
        text-align: center;
      }
      
      .stat-value {
        font-size: 1.75rem;
        font-weight: 700;
        color: #0d6efd;
        display: block;
      }
      
      .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 0.25rem;
      }
      
      .profile-section {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .profile-section h5 {
        font-weight: 600;
        color: #495057;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e9ecef;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }
      
      .form-group-custom {
        margin-bottom: 1.5rem;
      }
      
      .form-group-custom label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        display: block;
      }
      
      .form-group-custom .form-control,
      .form-group-custom .form-select {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
      }
      
      .form-group-custom .form-control:focus,
      .form-group-custom .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
      }
      
      .activity-item {
        display: flex;
        align-items: start;
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 1rem;
        border-left: 4px solid #0d6efd;
      }
      
      .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
      }
      
      .activity-content {
        flex: 1;
      }
      
      .activity-title {
        font-weight: 600;
        color: #212529;
        margin-bottom: 0.25rem;
      }
      
      .activity-description {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
      }
      
      .activity-time {
        color: #adb5bd;
        font-size: 0.85rem;
      }
      
      .security-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.25rem;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 1rem;
        border-left: 4px solid #0d6efd;
      }
      
      .security-item .info {
        flex: 1;
      }
      
      .security-item .title {
        font-weight: 600;
        color: #212529;
        margin-bottom: 0.25rem;
      }
      
      .security-item .description {
        color: #6c757d;
        font-size: 0.9rem;
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
      
      .session-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 1rem;
      }
      
      .session-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex: 1;
      }
      
      .session-icon {
        width: 45px;
        height: 45px;
        border-radius: 8px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
      }
      
      .session-details {
        flex: 1;
      }
      
      .session-device {
        font-weight: 600;
        color: #212529;
        margin-bottom: 0.25rem;
      }
      
      .session-location {
        color: #6c757d;
        font-size: 0.9rem;
      }
      
      .session-current {
        background: #d1e7dd;
        color: #0a3622;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
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
                <h3 class="mb-2"><i class="bi bi-person-circle me-2"></i>Admin Profile</h3>
                <p class="mb-0">Manage your account settings and preferences</p>
              </div>
            </div>
            
            <!-- Profile Header Card -->
            <div class="profile-header-card">
              <div class="profile-avatar">
                <span>AS</span>
                <label class="avatar-upload">
                  <i class="bi bi-camera-fill"></i>
                  <input type="file" accept="image/*" onchange="handleAvatarChange(event)">
                </label>
              </div>
              <div class="profile-name">Admin Super</div>
              <div class="profile-role">
                <i class="bi bi-shield-check me-1"></i>System Administrator
              </div>
              <div class="d-flex justify-content-center gap-2">
                <span class="badge bg-success">Active</span>
                <span class="badge bg-primary">Verified</span>
              </div>
              
              <div class="profile-stats">
                <div class="stat-item">
                  <span class="stat-value">245</span>
                  <span class="stat-label">Total Users</span>
                </div>
                <div class="stat-item">
                  <span class="stat-value">1,847</span>
                  <span class="stat-label">Actions Today</span>
                </div>
                <div class="stat-item">
                  <span class="stat-value">98.5%</span>
                  <span class="stat-label">System Uptime</span>
                </div>
              </div>
            </div>
            
            <div class="row">
              <!-- Personal Information -->
              <div class="col-lg-8">
                <div class="profile-section">
                  <h5>
                    <i class="bi bi-person-fill"></i>
                    Personal Information
                  </h5>
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group-custom">
                          <label for="firstName">First Name</label>
                          <input type="text" class="form-control" id="firstName" value="Admin">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group-custom">
                          <label for="lastName">Last Name</label>
                          <input type="text" class="form-control" id="lastName" value="Super">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group-custom">
                          <label for="email">Email Address</label>
                          <input type="email" class="form-control" id="email" value="admin@salespilot.com">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group-custom">
                          <label for="phone">Phone Number</label>
                          <input type="tel" class="form-control" id="phone" value="+234 800 000 0000">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group-custom">
                          <label for="role">Role</label>
                          <input type="text" class="form-control" id="role" value="System Administrator" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group-custom">
                          <label for="department">Department</label>
                          <select class="form-select" id="department">
                            <option selected>Administration</option>
                            <option>Technical</option>
                            <option>Operations</option>
                            <option>Support</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group-custom">
                          <label for="bio">Bio</label>
                          <textarea class="form-control" id="bio" rows="3">Experienced system administrator with expertise in inventory management and business operations.</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="text-end">
                      <button type="button" class="btn btn-primary" onclick="savePersonalInfo()">
                        <i class="bi bi-check-circle me-1"></i>Save Changes
                      </button>
                    </div>
                  </form>
                </div>
                
                <!-- Change Password -->
                <div class="profile-section">
                  <h5>
                    <i class="bi bi-lock-fill"></i>
                    Change Password
                  </h5>
                  <form>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group-custom">
                          <label for="currentPassword">Current Password</label>
                          <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group-custom">
                          <label for="newPassword">New Password</label>
                          <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group-custom">
                          <label for="confirmPassword">Confirm Password</label>
                          <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                        </div>
                      </div>
                    </div>
                    <div class="alert alert-info">
                      <i class="bi bi-info-circle me-2"></i>
                      Password must be at least 8 characters with uppercase, lowercase, numbers, and special characters.
                    </div>
                    <div class="text-end">
                      <button type="button" class="btn btn-primary" onclick="changePassword()">
                        <i class="bi bi-key me-1"></i>Update Password
                      </button>
                    </div>
                  </form>
                </div>
                
                <!-- Security Settings -->
                <div class="profile-section">
                  <h5>
                    <i class="bi bi-shield-lock-fill"></i>
                    Security Settings
                  </h5>
                  
                  <div class="security-item">
                    <div class="info">
                      <div class="title">Two-Factor Authentication</div>
                      <div class="description">Add an extra layer of security to your account</div>
                    </div>
                    <label class="toggle-switch">
                      <input type="checkbox" id="enable2FA" onchange="toggle2FA(this)">
                      <span class="toggle-slider"></span>
                    </label>
                  </div>
                  
                  <div class="security-item">
                    <div class="info">
                      <div class="title">Email Notifications</div>
                      <div class="description">Receive security alerts via email</div>
                    </div>
                    <label class="toggle-switch">
                      <input type="checkbox" id="emailNotifications" checked onchange="toggleEmailNotifications(this)">
                      <span class="toggle-slider"></span>
                    </label>
                  </div>
                  
                  <div class="security-item">
                    <div class="info">
                      <div class="title">Login Alerts</div>
                      <div class="description">Get notified of new device logins</div>
                    </div>
                    <label class="toggle-switch">
                      <input type="checkbox" id="loginAlerts" checked onchange="toggleLoginAlerts(this)">
                      <span class="toggle-slider"></span>
                    </label>
                  </div>
                </div>
                
                <!-- Active Sessions -->
                <div class="profile-section">
                  <h5>
                    <i class="bi bi-pc-display-horizontal"></i>
                    Active Sessions
                  </h5>
                  
                  <div class="session-item">
                    <div class="session-info">
                      <div class="session-icon">
                        <i class="bi bi-laptop"></i>
                      </div>
                      <div class="session-details">
                        <div class="session-device">Windows 11 - Chrome</div>
                        <div class="session-location">Lagos, Nigeria • Dec 6, 2025 at 10:30 AM</div>
                      </div>
                    </div>
                    <span class="session-current">Current Session</span>
                  </div>
                  
                  <div class="session-item">
                    <div class="session-info">
                      <div class="session-icon">
                        <i class="bi bi-phone"></i>
                      </div>
                      <div class="session-details">
                        <div class="session-device">iPhone 14 - Safari</div>
                        <div class="session-location">Lagos, Nigeria • Dec 5, 2025 at 8:15 PM</div>
                      </div>
                    </div>
                    <button class="btn btn-sm btn-outline-danger" onclick="revokeSession('iphone')">
                      <i class="bi bi-x-circle"></i> Revoke
                    </button>
                  </div>
                  
                  <div class="session-item">
                    <div class="session-info">
                      <div class="session-icon">
                        <i class="bi bi-tablet"></i>
                      </div>
                      <div class="session-details">
                        <div class="session-device">iPad Pro - Safari</div>
                        <div class="session-location">Abuja, Nigeria • Dec 4, 2025 at 2:45 PM</div>
                      </div>
                    </div>
                    <button class="btn btn-sm btn-outline-danger" onclick="revokeSession('ipad')">
                      <i class="bi bi-x-circle"></i> Revoke
                    </button>
                  </div>
                  
                  <div class="text-center mt-3">
                    <button class="btn btn-outline-danger" onclick="revokeAllSessions()">
                      <i class="bi bi-x-octagon me-1"></i>Revoke All Other Sessions
                    </button>
                  </div>
                </div>
              </div>
              
              <!-- Recent Activity -->
              <div class="col-lg-4">
                <div class="profile-section">
                  <h5>
                    <i class="bi bi-clock-history"></i>
                    Recent Activity
                  </h5>
                  
                  <div class="activity-item">
                    <div class="activity-icon">
                      <i class="bi bi-person-plus"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">User Created</div>
                      <div class="activity-description">Added new user: John Doe</div>
                      <div class="activity-time">2 hours ago</div>
                    </div>
                  </div>
                  
                  <div class="activity-item">
                    <div class="activity-icon">
                      <i class="bi bi-gear"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">Settings Updated</div>
                      <div class="activity-description">Modified system configuration</div>
                      <div class="activity-time">5 hours ago</div>
                    </div>
                  </div>
                  
                  <div class="activity-item">
                    <div class="activity-icon">
                      <i class="bi bi-lock"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">User Suspended</div>
                      <div class="activity-description">Suspended user: Sarah Adams</div>
                      <div class="activity-time">8 hours ago</div>
                    </div>
                  </div>
                  
                  <div class="activity-item">
                    <div class="activity-icon">
                      <i class="bi bi-credit-card"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">Payment Verified</div>
                      <div class="activity-description">Approved payment for Premium plan</div>
                      <div class="activity-time">Yesterday</div>
                    </div>
                  </div>
                  
                  <div class="activity-item">
                    <div class="activity-icon">
                      <i class="bi bi-database"></i>
                    </div>
                    <div class="activity-content">
                      <div class="activity-title">Backup Created</div>
                      <div class="activity-description">Manual database backup completed</div>
                      <div class="activity-time">2 days ago</div>
                    </div>
                  </div>
                  
                  <div class="text-center mt-3">
                    <button class="btn btn-outline-primary btn-sm" onclick="viewAllActivity()">
                      View All Activity
                    </button>
                  </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="profile-section">
                  <h5>
                    <i class="bi bi-lightning-fill"></i>
                    Quick Actions
                  </h5>
                  
                  <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="location.href='users.php'">
                      <i class="bi bi-people me-2"></i>Manage Users
                    </button>
                    <button class="btn btn-outline-primary" onclick="location.href='system_config.php'">
                      <i class="bi bi-gear me-2"></i>System Settings
                    </button>
                    <button class="btn btn-outline-primary" onclick="location.href='plans_pricing.php'">
                      <i class="bi bi-tag me-2"></i>Manage Plans
                    </button>
                    <button class="btn btn-outline-primary" onclick="viewReports()">
                      <i class="bi bi-file-earmark-bar-graph me-2"></i>View Reports
                    </button>
                    <button class="btn btn-outline-danger" onclick="logoutConfirm()">
                      <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
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
    
    function handleAvatarChange(event) {
      const file = event.target.files[0];
      if (file) {
        console.log('Avatar file selected:', file.name);
        alert('Avatar updated successfully!');
        // Here you would typically upload the file to the server
      }
    }
    
    function savePersonalInfo() {
      console.log('Saving personal information...');
      alert('Personal information saved successfully!');
    }
    
    function changePassword() {
      const currentPassword = document.getElementById('currentPassword').value;
      const newPassword = document.getElementById('newPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      
      if (!currentPassword || !newPassword || !confirmPassword) {
        alert('Please fill in all password fields');
        return;
      }
      
      if (newPassword !== confirmPassword) {
        alert('New passwords do not match');
        return;
      }
      
      console.log('Changing password...');
      alert('Password changed successfully!');
      
      // Clear fields
      document.getElementById('currentPassword').value = '';
      document.getElementById('newPassword').value = '';
      document.getElementById('confirmPassword').value = '';
    }
    
    function toggle2FA(checkbox) {
      const status = checkbox.checked ? 'enabled' : 'disabled';
      console.log('2FA ' + status);
      alert('Two-factor authentication has been ' + status);
    }
    
    function toggleEmailNotifications(checkbox) {
      const status = checkbox.checked ? 'enabled' : 'disabled';
      console.log('Email notifications ' + status);
      alert('Email notifications ' + status);
    }
    
    function toggleLoginAlerts(checkbox) {
      const status = checkbox.checked ? 'enabled' : 'disabled';
      console.log('Login alerts ' + status);
      alert('Login alerts ' + status);
    }
    
    function revokeSession(device) {
      console.log('Revoking session for:', device);
      if (confirm('Are you sure you want to revoke this session?')) {
        alert('Session revoked successfully');
        // Remove the session item from DOM
      }
    }
    
    function revokeAllSessions() {
      console.log('Revoking all sessions');
      if (confirm('Are you sure you want to revoke all other sessions? You will remain logged in on this device.')) {
        alert('All other sessions have been revoked');
      }
    }
    
    function viewAllActivity() {
      console.log('Viewing all activity');
      alert('Opening full activity log...');
    }
    
    function viewReports() {
      console.log('Viewing reports');
      alert('Opening reports dashboard...');
    }
    
    function logoutConfirm() {
      if (confirm('Are you sure you want to logout?')) {
        console.log('Logging out...');
        alert('Logging out...');
        // Redirect to login page
        // window.location.href = '../index.php';
      }
    }
    </script>
  </body>
</html>
