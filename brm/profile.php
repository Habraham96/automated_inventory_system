<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile - SalesPilot</title>    <?php include '../include/responsive.php'; ?>    
    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Include Sidebar Styles -->
    <?php include 'layouts/sidebar_styles.php'; ?>
    
    <style>
      /* Page Header */
      .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      }
      
      .page-header h1 {
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: white;
      }
      
      .page-header p {
        margin-bottom: 0;
        opacity: 0.9;
      }
      
      /* Profile Header Card */
      .profile-header-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 2rem;
      }
      
      .profile-photo-wrapper {
        position: relative;
      }
      
      .profile-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
      }
      
      .profile-photo img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
      }
      
      .photo-upload-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #667eea;
        color: white;
        border: 3px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .photo-upload-btn:hover {
        background: #764ba2;
        transform: scale(1.1);
      }
      
      .profile-header-info h2 {
        margin-bottom: 0.5rem;
        color: #2c3e50;
        font-weight: 700;
      }
      
      .profile-header-info p {
        margin-bottom: 0.25rem;
        color: #6c757d;
      }
      
      .profile-header-info .profile-badge {
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        margin-top: 0.5rem;
      }
      
      /* Form Sections */
      .form-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
      }
      
      .form-section h4 {
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }
      
      .form-section h4 i {
        color: #667eea;
      }
      
      .form-group {
        margin-bottom: 1.5rem;
      }
      
      .form-group label {
        font-weight: 500;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: block;
      }
      
      .form-control {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
      }
      
      .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.1);
      }
      
      .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
      }
      
      .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.1);
      }
      
      /* Buttons */
      .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
      }
      
      .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
      }
      
      .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
      }
      
      .btn-secondary:hover {
        background: #5a6268;
      }
      
      /* Stats Grid */
      .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }
      
      .stat-box {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        text-align: center;
      }
      
      .stat-box .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: #667eea;
        margin-bottom: 0.5rem;
      }
      
      .stat-box .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
      }
      
      /* Password Strength */
      .password-strength {
        height: 4px;
        border-radius: 2px;
        background: #e9ecef;
        margin-top: 0.5rem;
        overflow: hidden;
      }
      
      .password-strength-bar {
        height: 100%;
        width: 0%;
        transition: all 0.3s ease;
      }
      
      .password-strength-bar.weak {
        width: 33%;
        background: #dc3545;
      }
      
      .password-strength-bar.medium {
        width: 66%;
        background: #ffc107;
      }
      
      .password-strength-bar.strong {
        width: 100%;
        background: #198754;
      }
    </style>
  </head>
  
  <body class="with-welcome-text">
    <div class="container-scroller">
      
      <!-- Include Preloader -->
      <?php include 'layouts/preloader.php'; ?>
      
      <!-- Include Sidebar Content -->
      <?php include 'layouts/sidebar_content.php'; ?>
      
      <!-- Main Panel -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <!-- Page Header -->
          <div class="page-header">
            <h1><i class="bi bi-person-circle"></i> My Profile</h1>
            <p>Manage your account settings and preferences</p>
          </div>
          
          <!-- Profile Header Card -->
          <div class="profile-header-card">
            <div class="profile-photo-wrapper">
              <div class="profile-photo" id="profilePhoto">
                <img src="" alt="Profile" id="profileImage" style="display: none;">
                <span id="profileInitial">A</span>
              </div>
              <label for="photoUpload" class="photo-upload-btn">
                <i class="bi bi-camera-fill"></i>
              </label>
              <input type="file" id="photoUpload" accept="image/*" style="display: none;">
            </div>
            
            <div class="profile-header-info">
              <h2 id="displayName">Adewale Ogunleye</h2>
              <p><i class="bi bi-envelope"></i> adewale.ogunleye@salespilot.com</p>
              <p><i class="bi bi-telephone"></i> +234 801 234 5678</p>
              <span class="profile-badge"><i class="bi bi-star-fill"></i> Business Relationship Manager</span>
            </div>
          </div>
          
          <!-- Quick Stats -->
          <div class="stats-grid">
            <div class="stat-box">
              <div class="stat-value">145</div>
              <div class="stat-label">Total Customers</div>
            </div>
            <div class="stat-box">
              <div class="stat-value">23</div>
              <div class="stat-label">Conversions This Month</div>
            </div>
            <div class="stat-box">
              <div class="stat-value">₦450K</div>
              <div class="stat-label">Total Commission</div>
            </div>
            <div class="stat-box">
              <div class="stat-value">68%</div>
              <div class="stat-label">Conversion Rate</div>
            </div>
          </div>
          
          <div class="row">
            <!-- Personal Information -->
            <div class="col-lg-6">
              <div class="form-section">
                <h4><i class="bi bi-person-fill"></i> Personal Information</h4>
                <form id="personalInfoForm">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" value="Adewale">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" value="Ogunleye">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" value="adewale.ogunleye@salespilot.com">
                  </div>
                  
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" value="+234 801 234 5678">
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-select" id="gender">
                          <option value="">Select Gender</option>
                          <option value="male" selected>Male</option>
                          <option value="female">Female</option>
                          <option value="other">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" value="1990-05-15">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" rows="3">123 Victoria Island, Lagos, Nigeria</textarea>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Save Changes
                  </button>
                </form>
              </div>
            </div>
            
            <!-- Security Settings -->
            <div class="col-lg-6">
              <div class="form-section">
                <h4><i class="bi bi-shield-lock-fill"></i> Security Settings</h4>
                <form id="passwordForm">
                  <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                  </div>
                  
                  <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                    <div class="password-strength">
                      <div class="password-strength-bar" id="strengthBar"></div>
                    </div>
                    <small class="text-muted" id="strengthText"></small>
                  </div>
                  
                  <div class="form-group">
                    <label for="confirmPassword">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                  </div>
                  
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-key-fill"></i> Update Password
                  </button>
                </form>
              </div>
              
              <!-- Notification Preferences -->
              <div class="form-section">
                <h4><i class="bi bi-bell-fill"></i> Notification Preferences</h4>
                <form id="notificationsForm">
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                    <label class="form-check-label" for="emailNotifications">
                      Email Notifications
                    </label>
                  </div>
                  
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="smsNotifications" checked>
                    <label class="form-check-label" for="smsNotifications">
                      SMS Notifications
                    </label>
                  </div>
                  
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="commissionAlerts" checked>
                    <label class="form-check-label" for="commissionAlerts">
                      Commission Payment Alerts
                    </label>
                  </div>
                  
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="leadAlerts" checked>
                    <label class="form-check-label" for="leadAlerts">
                      New Lead Alerts
                    </label>
                  </div>
                  
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="performanceReports">
                    <label class="form-check-label" for="performanceReports">
                      Weekly Performance Reports
                    </label>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Save Preferences
                  </button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
        <!-- Footer -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
              © 2026 SalesPilot. All rights reserved.
            </span>
          </div>
        </footer>
      </div>
    </div>
    
    <!-- JavaScript Dependencies -->
    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    
    <!-- Include Sidebar Scripts -->
    <?php include 'layouts/sidebar_script.php'; ?>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        
        // Photo Upload
        document.getElementById('photoUpload').addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
              const img = document.getElementById('profileImage');
              const initial = document.getElementById('profileInitial');
              img.src = event.target.result;
              img.style.display = 'block';
              initial.style.display = 'none';
            };
            reader.readAsDataURL(file);
          }
        });
        
        // Personal Info Form
        document.getElementById('personalInfoForm').addEventListener('submit', function(e) {
          e.preventDefault();
          const firstName = document.getElementById('firstName').value;
          const lastName = document.getElementById('lastName').value;
          document.getElementById('displayName').textContent = firstName + ' ' + lastName;
          alert('Profile updated successfully!');
        });
        
        // Password Strength Checker
        document.getElementById('newPassword').addEventListener('input', function() {
          const password = this.value;
          const strengthBar = document.getElementById('strengthBar');
          const strengthText = document.getElementById('strengthText');
          
          if (password.length === 0) {
            strengthBar.className = 'password-strength-bar';
            strengthText.textContent = '';
            return;
          }
          
          let strength = 0;
          
          // Check length
          if (password.length >= 8) strength++;
          
          // Check for lowercase and uppercase
          if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
          
          // Check for numbers
          if (/\d/.test(password)) strength++;
          
          // Check for special characters
          if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;
          
          if (strength <= 2) {
            strengthBar.className = 'password-strength-bar weak';
            strengthText.textContent = 'Weak password';
            strengthText.style.color = '#dc3545';
          } else if (strength === 3) {
            strengthBar.className = 'password-strength-bar medium';
            strengthText.textContent = 'Medium password';
            strengthText.style.color = '#ffc107';
          } else {
            strengthBar.className = 'password-strength-bar strong';
            strengthText.textContent = 'Strong password';
            strengthText.style.color = '#198754';
          }
        });
        
        // Password Form
        document.getElementById('passwordForm').addEventListener('submit', function(e) {
          e.preventDefault();
          const currentPassword = document.getElementById('currentPassword').value;
          const newPassword = document.getElementById('newPassword').value;
          const confirmPassword = document.getElementById('confirmPassword').value;
          
          if (!currentPassword || !newPassword || !confirmPassword) {
            alert('Please fill in all password fields');
            return;
          }
          
          if (newPassword !== confirmPassword) {
            alert('New password and confirmation do not match');
            return;
          }
          
          if (newPassword.length < 8) {
            alert('Password must be at least 8 characters long');
            return;
          }
          
          alert('Password updated successfully!');
          this.reset();
          document.getElementById('strengthBar').className = 'password-strength-bar';
          document.getElementById('strengthText').textContent = '';
        });
        
        // Notifications Form
        document.getElementById('notificationsForm').addEventListener('submit', function(e) {
          e.preventDefault();
          alert('Notification preferences saved successfully!');
        });
        
      });
    </script>
  </body>
</html>
