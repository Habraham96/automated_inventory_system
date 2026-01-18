<?php
// admin/admin_ctm_control.php
// Administrative control panel for managing customers
// Provides comprehensive tools for account management, monitoring, and administrative actions

function g($k) {
    return isset($_GET[$k]) ? trim($_GET[$k]) : '';
}
$user_id = htmlspecialchars(g('user_id')) ?: '-';
$name = htmlspecialchars(g('name')) ?: '-';
$email = htmlspecialchars(g('email')) ?: '-';
$phone = htmlspecialchars(g('phone')) ?: '-';
$role = htmlspecialchars(g('role')) ?: '-';
$status = htmlspecialchars(g('status')) ?: '-';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customer Admin Control - SalesPilot</title>    <?php include '../include/responsive.php'; ?>    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php if (file_exists('layouts/sidebar_styles.php')) include 'layouts/sidebar_styles.php'; ?>
    <style>
      :root {
        --primary-color: #6c63ff;
        --secondary-color: #4834df;
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --info-color: #17a2b8;
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 24px rgba(34, 41, 47, 0.08);
        --card-shadow-hover: 0 8px 40px rgba(34, 41, 47, 0.15);
      }
      
      body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
        min-height: 100vh;
      }
      
      .control-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1rem;
      }
      
      /* Modern Card Styles */
      .modern-card {
        border: none;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        background: #fff;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        overflow: hidden;
      }
      
      .modern-card:hover {
        box-shadow: var(--card-shadow-hover);
        transform: translateY(-2px);
      }
      
      .modern-card .card-body {
        padding: 2rem;
      }
      
      .modern-card .card-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: #fff;
        padding: 1.5rem 2rem;
        border: none;
        font-weight: 600;
        font-size: 1.1rem;
      }
      
      /* Status Badge */
      .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
        gap: 0.5rem;
      }
      
      .status-badge.active {
        background: #d4edda;
        color: #155724;
      }
      
      .status-badge.inactive {
        background: #f8d7da;
        color: #721c24;
      }
      
      .status-badge.suspended {
        background: #fff3cd;
        color: #856404;
      }
      
      .status-badge.locked {
        background: #f8d7da;
        color: #721c24;
      }
      
      /* Info Grid */
      .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }
      
      .info-item {
        background: var(--light-bg);
        padding: 1.5rem;
        border-radius: 12px;
        border-left: 4px solid var(--primary-color);
        transition: all 0.3s ease;
      }
      
      .info-item:hover {
        background: #e9ecef;
        transform: translateX(5px);
      }
      
      .info-item .label {
        font-size: 0.875rem;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }
      
      .info-item .value {
        font-size: 1.1rem;
        color: #212529;
        font-weight: 600;
      }
      
      /* Action Cards */
      .action-card {
        background: #fff;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 1.5rem;
      }
      
      .action-card:hover {
        border-color: var(--primary-color);
        box-shadow: 0 4px 12px rgba(108, 99, 255, 0.1);
      }
      
      .action-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        flex-shrink: 0;
      }
      
      .action-icon.warning { background: #fff3cd; color: var(--warning-color); }
      .action-icon.danger { background: #f8d7da; color: var(--danger-color); }
      .action-icon.info { background: #d1ecf1; color: var(--info-color); }
      .action-icon.secondary { background: #e2e3e5; color: #6c757d; }
      .action-icon.success { background: #d4edda; color: var(--success-color); }
      
      .action-content {
        flex: 1;
      }
      
      .action-title {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
        color: #212529;
      }
      
      .action-desc {
        font-size: 0.9rem;
        color: #6c757d;
        margin: 0;
      }
      
      .action-controls {
        flex-shrink: 0;
      }
      
      /* Modern Buttons */
      .btn-modern {
        border-radius: 8px;
        padding: 0.6rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
      }
      
      .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      }
      
      .btn-gradient-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: #fff;
      }
      
      .btn-gradient-success {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: #fff;
      }
      
      .btn-gradient-warning {
        background: linear-gradient(135deg, #ffc107, #ff9800);
        color: #212529;
      }
      
      .btn-gradient-danger {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: #fff;
      }
      
      /* Stats Cards */
      .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }
      
      .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        border-top: 4px solid var(--primary-color);
      }
      
      .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-shadow-hover);
      }
      
      .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
      }
      
      .stat-label {
        font-size: 0.9rem;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
      }
      
      /* Notes Section */
      .notes-container {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 1.5rem;
      }
      
      .notes-container textarea {
        border-radius: 8px;
        border: 2px solid #dee2e6;
        transition: border-color 0.3s;
      }
      
      .notes-container textarea:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.15);
      }
      
      /* Page Header */
      .page-header-modern {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 2rem;
        border-radius: 16px;
        margin-bottom: 2rem;
        box-shadow: var(--card-shadow);
      }
      
      .page-header-modern h3 {
        margin: 0;
        font-weight: 700;
        font-size: 1.75rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
      }
      
      .page-header-modern p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
      }
      
      /* Section Titles */
      .section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding-bottom: 0.75rem;
        border-bottom: 3px solid var(--primary-color);
      }
      
      /* Responsive */
      @media (max-width: 991.98px) {
        .modern-card .card-body {
          padding: 1.5rem;
        }
        
        .action-card {
          flex-direction: column;
          text-align: center;
        }
        
        .action-controls {
          width: 100%;
        }
        
        .info-grid {
          grid-template-columns: 1fr;
        }
      }
      
      @media (max-width: 575.98px) {
        .page-header-modern {
          padding: 1.5rem 1rem;
        }
        
        .page-header-modern h3 {
          font-size: 1.4rem;
        }
        
        .action-card {
          padding: 1rem;
        }
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php if (file_exists('layouts/preloader.php')) include 'layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php if (file_exists('layouts/sidebar_content.php')) include 'layouts/sidebar_content.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            
            <!-- Page Header -->
            <div class="page-header-modern">
              <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                  <h3><i class="bi bi-shield-lock-fill"></i>Customer Administrative Control</h3>
                  <p>Comprehensive management and oversight for customer account</p>
                </div>
                <div class="mt-2 mt-md-0">
                  <a class="btn btn-light btn-modern" href="customers.php">
                    <i class="bi bi-arrow-left-circle"></i>Back to Customers
                  </a>
                </div>
              </div>
            </div>

            <div class="control-wrapper">
              
              <!-- Customer Profile Card -->
              <div class="modern-card">
                <div class="card-header">
                  <i class="mdi mdi-account-circle me-2"></i>Customer Profile Information
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">
                    <div>
                      <h2 class="fw-bold mb-2"><?php echo $name; ?></h2>
                      <p class="text-muted mb-0">
                        <i class="mdi mdi-identifier me-1"></i>Customer ID: <strong><?php echo $user_id; ?></strong>
                      </p>
                    </div>
                    <div class="mt-2 mt-md-0">
                      <span class="status-badge <?php echo strtolower($status); ?>" id="displayStatus">
                        <i class="mdi mdi-circle-small"></i><?php echo ucfirst($status); ?>
                      </span>
                    </div>
                  </div>

                  <!-- Info Grid -->
                  <div class="info-grid">
                    <div class="info-item">
                      <div class="label">
                        <i class="mdi mdi-email"></i>Email Address
                      </div>
                      <div class="value"><?php echo $email; ?></div>
                    </div>
                    <div class="info-item">
                      <div class="label">
                        <i class="mdi mdi-phone"></i>Phone Number
                      </div>
                      <div class="value"><?php echo $phone; ?></div>
                    </div>
                    <div class="info-item">
                      <div class="label">
                        <i class="mdi mdi-account-badge"></i>User Role
                      </div>
                      <div class="value"><?php echo $role; ?></div>
                    </div>
                    <div class="info-item">
                      <div class="label">
                        <i class="mdi mdi-calendar-clock"></i>Account Created
                      </div>
                      <div class="value">Jan 15, 2025</div>
                    </div>
                    <div class="info-item">
                      <div class="label">
                        <i class="mdi mdi-clock-outline"></i>Last Login
                      </div>
                      <div class="value" id="displayLastLogin">2 hours ago</div>
                    </div>
                    <div class="info-item">
                      <div class="label">
                        <i class="mdi mdi-cart"></i>Total Orders
                      </div>
                      <div class="value" id="displayOrders">47</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Administrative Actions -->
                <div class="col-lg-8">
                  <div class="modern-card">
                    <div class="card-header">
                      <i class="mdi mdi-cog-outline me-2"></i>Administrative Actions
                    </div>
                    <div class="card-body">
                      
                      <!-- Suspend/Unsuspend Action -->
                      <div class="action-card">
                        <div class="action-icon warning">
                          <i class="mdi mdi-account-cancel"></i>
                        </div>
                        <div class="action-content">
                          <div class="action-title">Suspend / Unsuspend Account</div>
                          <p class="action-desc">Temporarily restrict or restore customer access to the platform</p>
                        </div>
                        <div class="action-controls">
                          <button class="btn btn-gradient-warning btn-modern me-2" id="btnSuspend">
                            <i class="mdi mdi-pause-circle"></i>Suspend
                          </button>
                          <button class="btn btn-gradient-success btn-modern" id="btnUnsuspend">
                            <i class="mdi mdi-play-circle"></i>Unsuspend
                          </button>
                        </div>
                      </div>

                      <!-- Lock/Unlock Account -->
                      <div class="action-card">
                        <div class="action-icon info">
                          <i class="mdi mdi-lock"></i>
                        </div>
                        <div class="action-content">
                          <div class="action-title">Lock / Unlock Account</div>
                          <p class="action-desc">Lock account for security or unlock for customer access</p>
                        </div>
                        <div class="action-controls">
                          <button class="btn btn-secondary btn-modern me-2" id="btnLock">
                            <i class="mdi mdi-lock"></i>Lock
                          </button>
                          <button class="btn btn-gradient-success btn-modern" id="btnUnlock">
                            <i class="mdi mdi-lock-open"></i>Unlock
                          </button>
                        </div>
                      </div>

                      <!-- Disable/Enable Action -->
                      <div class="action-card">
                        <div class="action-icon danger" id="disableIcon">
                          <i class="mdi mdi-account-off"></i>
                        </div>
                        <div class="action-content">
                          <div class="action-title" id="disableTitle">Disable Customer Account</div>
                          <p class="action-desc" id="disableDesc">Disable this customer account and revoke platform access</p>
                        </div>
                        <div class="action-controls">
                          <button class="btn btn-gradient-danger btn-modern" id="btnToggleDisable">
                            <i class="mdi mdi-close-circle"></i>Disable
                          </button>
                        </div>
                      </div>

                      <!-- Reset Password Action -->
                      <div class="action-card">
                        <div class="action-icon secondary">
                          <i class="mdi mdi-lock-reset"></i>
                        </div>
                        <div class="action-content">
                          <div class="action-title">Reset Login Password</div>
                          <p class="action-desc">Set a temporary password for customer account access</p>
                          <div class="mt-3">
                            <label class="form-label fw-semibold mb-2">
                              <i class="mdi mdi-key-variant me-1"></i>Temporary Password
                            </label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="tempPasswordInput" placeholder="Enter temporary password" style="border-radius: 8px 0 0 8px;">
                              <button class="btn btn-outline-secondary" type="button" id="btnGeneratePassword" title="Auto-generate password" style="border-radius: 0 8px 8px 0;">
                                <i class="mdi mdi-auto-fix"></i>
                              </button>
                            </div>
                            <small class="text-muted">
                              <i class="mdi mdi-information-outline"></i> Min. 8 characters recommended
                            </small>
                          </div>
                        </div>
                        <div class="action-controls">
                          <button class="btn btn-secondary btn-modern" id="btnResetPassword">
                            <i class="mdi mdi-refresh"></i>Reset Password
                          </button>
                        </div>
                      </div>

                      <!-- Clear Cart -->
                      <div class="action-card">
                        <div class="action-icon success">
                          <i class="mdi mdi-cart-remove"></i>
                        </div>
                        <div class="action-content">
                          <div class="action-title">Clear Customer Cart</div>
                          <p class="action-desc">Remove all items from customer's shopping cart</p>
                        </div>
                        <div class="action-controls">
                          <button class="btn btn-outline-secondary btn-modern" id="btnClearCart">
                            <i class="mdi mdi-delete-sweep"></i>Clear Cart
                          </button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <!-- Quick Stats & Notes -->
                <div class="col-lg-4">
                  <!-- Quick Stats -->
                  <div class="modern-card">
                    <div class="card-header">
                      <i class="mdi mdi-chart-bar me-2"></i>Quick Statistics
                    </div>
                    <div class="card-body">
                      <div class="stat-card mb-3">
                        <div class="stat-value">47</div>
                        <div class="stat-label">Total Orders</div>
                      </div>
                      <div class="stat-card mb-3">
                        <div class="stat-value">₦425,000</div>
                        <div class="stat-label">Total Spent</div>
                      </div>
                      <div class="stat-card">
                        <div class="stat-value">
                          <i class="mdi mdi-circle-small" style="font-size: 1.5rem;"></i>
                        </div>
                        <div class="stat-label"><?php echo ucfirst($status); ?></div>
                      </div>
                    </div>
                  </div>

                  <!-- Admin Notes -->
                  <div class="modern-card">
                    <div class="card-header">
                      <i class="mdi mdi-note-text me-2"></i>Administrative Notes
                    </div>
                    <div class="card-body">
                      <div class="notes-container">
                        <textarea id="adminNotes" class="form-control mb-3" rows="8" placeholder="Add administrative notes, observations, or important information about this customer..."></textarea>
                        <button class="btn btn-gradient-primary btn-modern w-100" id="btnSaveNotes">
                          <i class="mdi mdi-content-save"></i>Save Notes
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <?php if (file_exists('layouts/footer.php')) include 'layouts/footer.php'; ?>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <?php if (file_exists('layouts/sidebar_scripts.php')) include 'layouts/sidebar_scripts.php'; ?>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Get button elements
        const btnSuspend = document.getElementById('btnSuspend');
        const btnUnsuspend = document.getElementById('btnUnsuspend');
        const btnLock = document.getElementById('btnLock');
        const btnUnlock = document.getElementById('btnUnlock');
        const btnToggleDisable = document.getElementById('btnToggleDisable');
        const btnResetPassword = document.getElementById('btnResetPassword');
        const btnClearCart = document.getElementById('btnClearCart');
        const btnSaveNotes = document.getElementById('btnSaveNotes');
        
        // Status display element
        const displayStatus = document.getElementById('displayStatus');
        
        // Suspend Customer Account
        if (btnSuspend) {
          btnSuspend.addEventListener('click', function() {
            if (!confirm('Are you sure you want to suspend this customer account? They will lose access to the platform.')) return;
            
            // Update status display
            if (displayStatus) {
              displayStatus.className = 'status-badge suspended';
              displayStatus.innerHTML = '<i class="mdi mdi-circle-small"></i>Suspended';
            }
            
            // Show success message
            showNotification('Success', 'Customer account has been suspended successfully.', 'warning');
          });
        }
        
        // Unsuspend Customer Account
        if (btnUnsuspend) {
          btnUnsuspend.addEventListener('click', function() {
            if (!confirm('Restore access for this customer account?')) return;
            
            // Update status display
            if (displayStatus) {
              displayStatus.className = 'status-badge active';
              displayStatus.innerHTML = '<i class="mdi mdi-circle-small"></i>Active';
            }
            
            // Show success message
            showNotification('Success', 'Customer account has been activated successfully.', 'success');
          });
        }
        
        // Lock Customer Account
        if (btnLock) {
          btnLock.addEventListener('click', function() {
            if (!confirm('Lock this customer account for security purposes?')) return;
            
            // Update status display
            if (displayStatus) {
              displayStatus.className = 'status-badge locked';
              displayStatus.innerHTML = '<i class="mdi mdi-circle-small"></i>Locked';
            }
            
            // Show notification
            showNotification('Account Locked', 'Customer account has been locked for security.', 'secondary');
          });
        }
        
        // Unlock Customer Account
        if (btnUnlock) {
          btnUnlock.addEventListener('click', function() {
            if (!confirm('Unlock this customer account?')) return;
            
            // Update status display
            if (displayStatus) {
              displayStatus.className = 'status-badge active';
              displayStatus.innerHTML = '<i class="mdi mdi-circle-small"></i>Active';
            }
            
            // Show notification
            showNotification('Account Unlocked', 'Customer account has been unlocked successfully.', 'success');
          });
        }
        
        // Toggle Disable/Enable Customer Account
        let isAccountDisabled = false;
        
        if (btnToggleDisable) {
          btnToggleDisable.addEventListener('click', function() {
            if (!isAccountDisabled) {
              // Disable action
              const confirmText = 'DISABLE';
              const userInput = prompt(`WARNING: This will disable the customer account.\n\nType "${confirmText}" to confirm:`);
              
              if (userInput !== confirmText) {
                if (userInput !== null) {
                  alert('Action cancelled. Confirmation text did not match.');
                }
                return;
              }
              
              // Update status display
              if (displayStatus) {
                displayStatus.className = 'status-badge inactive';
                displayStatus.innerHTML = '<i class="mdi mdi-circle-small"></i>Disabled';
              }
              
              // Update button to Enable
              btnToggleDisable.className = 'btn btn-gradient-success btn-modern';
              btnToggleDisable.innerHTML = '<i class="mdi mdi-check-circle"></i>Enable';
              
              // Update action card content
              const disableIcon = document.getElementById('disableIcon');
              const disableTitle = document.getElementById('disableTitle');
              const disableDesc = document.getElementById('disableDesc');
              
              if (disableIcon) {
                disableIcon.className = 'action-icon success';
                disableIcon.innerHTML = '<i class="mdi mdi-account-check"></i>';
              }
              if (disableTitle) disableTitle.textContent = 'Enable Customer Account';
              if (disableDesc) disableDesc.textContent = 'Restore account access and re-enable platform features';
              
              isAccountDisabled = true;
              showNotification('Account Disabled', 'Customer account has been disabled successfully.', 'danger');
            } else {
              // Enable action
              if (!confirm('Enable this customer account and restore access?')) return;
              
              // Update status display
              if (displayStatus) {
                displayStatus.className = 'status-badge active';
                displayStatus.innerHTML = '<i class="mdi mdi-circle-small"></i>Active';
              }
              
              // Update button back to Disable
              btnToggleDisable.className = 'btn btn-gradient-danger btn-modern';
              btnToggleDisable.innerHTML = '<i class="mdi mdi-close-circle"></i>Disable';
              
              // Update action card content
              const disableIcon = document.getElementById('disableIcon');
              const disableTitle = document.getElementById('disableTitle');
              const disableDesc = document.getElementById('disableDesc');
              
              if (disableIcon) {
                disableIcon.className = 'action-icon danger';
                disableIcon.innerHTML = '<i class="mdi mdi-account-off"></i>';
              }
              if (disableTitle) disableTitle.textContent = 'Disable Customer Account';
              if (disableDesc) disableDesc.textContent = 'Disable this customer account and revoke platform access';
              
              isAccountDisabled = false;
              showNotification('Account Enabled', 'Customer account has been enabled successfully.', 'success');
            }
          });
        }
        
        // Auto-generate Password Button
        const btnGeneratePassword = document.getElementById('btnGeneratePassword');
        if (btnGeneratePassword) {
          btnGeneratePassword.addEventListener('click', function() {
            const tempPasswordInput = document.getElementById('tempPasswordInput');
            if (!tempPasswordInput) return;
            
            // Generate random temporary password
            const chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
            let tempPassword = '';
            for (let i = 0; i < 12; i++) {
              tempPassword += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            
            tempPasswordInput.value = tempPassword;
            tempPasswordInput.focus();
          });
        }
        
        // Reset Password
        if (btnResetPassword) {
          btnResetPassword.addEventListener('click', function() {
            const tempPasswordInput = document.getElementById('tempPasswordInput');
            const tempPassword = tempPasswordInput ? tempPasswordInput.value.trim() : '';
            
            if (!tempPassword) {
              alert('Please enter a temporary password or use the auto-generate button.');
              if (tempPasswordInput) tempPasswordInput.focus();
              return;
            }
            
            if (tempPassword.length < 8) {
              alert('Password should be at least 8 characters long for security.');
              if (tempPasswordInput) tempPasswordInput.focus();
              return;
            }
            
            if (!confirm('Reset customer password with the entered temporary password?')) return;
            
            // Show password in a modal-style alert
            const message = `TEMPORARY PASSWORD SET\n\n` +
                          `Password: ${tempPassword}\n\n` +
                          `Please share this with the customer securely and require them to change it on next login.\n\n` +
                          `This password will not be shown again.`;
            
            alert(message);
            
            // Clear the input field
            if (tempPasswordInput) tempPasswordInput.value = '';
            
            // Show notification
            showNotification('Password Reset', 'Temporary password has been set successfully. Please share it securely with the customer.', 'secondary');
          });
        }
        
        // Clear Cart
        if (btnClearCart) {
          btnClearCart.addEventListener('click', function() {
            if (!confirm('Clear all items from this customer\'s shopping cart?')) return;
            
            // Show notification
            showNotification('Cart Cleared', 'All items have been removed from the customer\'s cart.', 'info');
          });
        }
        
        // Save Notes
        if (btnSaveNotes) {
          btnSaveNotes.addEventListener('click', function() {
            const notesTextarea = document.getElementById('adminNotes');
            const notesValue = notesTextarea ? notesTextarea.value.trim() : '';
            
            if (!notesValue) {
              alert('Please enter some notes before saving.');
              if (notesTextarea) notesTextarea.focus();
              return;
            }
            
            // In a real application, this would save to a database
            // For now, we'll store in localStorage
            const customerId = '<?php echo $user_id; ?>';
            localStorage.setItem(`admin_notes_customer_${customerId}`, notesValue);
            
            // Show success message
            showNotification('Notes Saved', 'Administrative notes have been saved successfully.', 'success');
          });
        }
        
        // Load saved notes on page load
        const customerId = '<?php echo $user_id; ?>';
        const savedNotes = localStorage.getItem(`admin_notes_customer_${customerId}`);
        if (savedNotes) {
          const notesTextarea = document.getElementById('adminNotes');
          if (notesTextarea) {
            notesTextarea.value = savedNotes;
          }
        }
        
        // Notification function
        function showNotification(title, message, type) {
          const alertClass = type === 'success' ? 'alert-success' : 
                           type === 'danger' ? 'alert-danger' :
                           type === 'warning' ? 'alert-warning' :
                           type === 'info' ? 'alert-info' :
                           type === 'secondary' ? 'alert-secondary' : 'alert-primary';
          
          const icon = type === 'success' ? 'mdi-check-circle' : 
                      type === 'danger' ? 'mdi-alert-circle' :
                      type === 'warning' ? 'mdi-alert' :
                      type === 'info' ? 'mdi-information' : 'mdi-bell';
          
          // Create notification element
          const notification = document.createElement('div');
          notification.className = `alert ${alertClass} alert-dismissible fade show`;
          notification.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px; box-shadow: 0 4px 24px rgba(0,0,0,0.15);';
          notification.innerHTML = `
            <div class="d-flex align-items-center">
              <i class="mdi ${icon} me-2" style="font-size: 1.5rem;"></i>
              <div class="flex-grow-1">
                <strong>${title}</strong><br>
                <small>${message}</small>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          `;
          
          document.body.appendChild(notification);
          
          // Auto-dismiss after 5 seconds
          setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 150);
          }, 5000);
        }
      });
    </script>
  </body>
</html>
