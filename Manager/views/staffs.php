<?php
// Start session early so CSRF token can be created and persisted reliably.
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Ensure CSRF token exists in session and cookie early
if (empty($_SESSION['csrf_add_staff'])) {
  $_SESSION['csrf_add_staff'] = bin2hex(random_bytes(24));
}

// Set cookie for the token
if (empty($_COOKIE['csrf_add_staff']) || $_COOKIE['csrf_add_staff'] !== $_SESSION['csrf_add_staff']) {
  @setcookie('csrf_add_staff', $_SESSION['csrf_add_staff'], 0, '/');
}

// Load DB config and fetch roles for the modal's role select.
try {
  require_once __DIR__ . '/../../include/config.php';
  $roles = [];
  $stmt = $pdo->query('SELECT id, name FROM role_table ORDER BY name');
  $f = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if ($f) $roles = $f;
} catch (Throwable $e) {
  // Fallback roles when DB/table is not available
  $roles = [
    ['id' => 'manager', 'name' => 'Manager'],
    ['id' => 'staff', 'name' => 'Sales Staff']
  ];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Staffs - SalesPilot</title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Include Sidebar Styles -->
    <?php include '../layouts/sidebar_styles.php'; ?>
    
    <style>
      /* Staff settings tabs row alignment */
      #staffSettingsTab {
        flex-wrap: nowrap;
        overflow-x: auto;
        border-bottom: 1px solid #e0e0e0;
        margin-bottom: 0;
      }
      #staffSettingsTab .nav-link {
        white-space: nowrap;
        min-width: 160px;
        text-align: center;
        border: none;
        border-bottom: 2px solid transparent;
        color: #555;
        font-weight: 500;
        background: none;
        transition: border-color 0.2s, color 0.2s;
      }
      #staffSettingsTab .nav-link.active {
        color: #0d6efd;
        border-bottom: 2.5px solid #0d6efd;
        background: none;
      }
      #staffSettingsTab::-webkit-scrollbar {
        height: 4px;
      }
      #staffSettingsTab::-webkit-scrollbar-thumb {
        background: #e0e0e0;
        border-radius: 2px;
      }
      @media (max-width: 600px) {
        #staffSettingsTab .nav-link {
          min-width: 120px;
          font-size: 0.95rem;
        }
      }
    /* Main panel positioning to avoid sidebar overlap */
    .main-panel {
      margin-left: 280px !important;
      transition: margin-left 0.2s ease !important;
      min-height: calc(100vh - 70px);
      background-color: #f5f7fa;
    }
    
    /* Adjust main panel when sidebar is collapsed */
    body.sidebar-collapsed .main-panel {
      margin-left: 70px !important;
    }
    
    /* Content wrapper styling */
    .content-wrapper {
      padding: 15px 25px;
      width: 100%;
    }
    
    /* Card styling */
    .card-rounded {
      border-radius: 10px;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .card-title {
      color: #2c3e50;
      font-weight: 600;
    }
    
    .card-description {
      color: #6c757d;
      font-size: 0.9rem;
    }
    
    /* Table styling */
    .table-responsive {
      border-radius: 8px;
      overflow: hidden;
    }
    
    /* Badge styling */
    .badge {
      padding: 6px 12px;
      font-size: 0.75rem;
      font-weight: 500;
      border-radius: 20px;
      display: inline-block;
      min-width: 80px;
    }
    
    /* Action buttons */
    .btn-sm {
      padding: 6px 10px;
      font-size: 0.875rem;
      border-radius: 4px;
      margin: 0 2px;
      transition: all 0.3s ease;
    }
    
    .btn-sm:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
      .main-panel {
        margin-left: 0 !important;
      }
      
      body.sidebar-collapsed .main-panel {
        margin-left: 0 !important;
      }
      
      .content-wrapper {
        padding: 15px;
      }
    }
    
    /* Photo preview styling */
    #photoPreview {
      margin-top: 10px;
    }
    
    #previewImage {
      max-width: 150px;
      max-height: 150px;
      border-radius: 8px;
      border: 2px solid #ddd;
    }
    </style>
    <!-- endinject -->
    
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        
        <!-- Include Sidebar Content -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        
        <!-- Main Panel -->
        <div class="main-panel">
          <div class="content-wrapper d-flex" id="staffContentWrapper">
            <!-- Staff Management Content -->
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Staff Management</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <div>
                        <h4 class="card-title mb-2">
                          <i class="bi bi-person-workspace me-2"></i>Staff Members
                        </h4>
                        <p class="card-description mb-0">Manage your staff members and their roles</p>
                      </div>
                      <button type="button" class="btn btn-primary" style="min-width: 150px;" data-bs-toggle="modal" data-bs-target="#addStaffModal"><strong>+ Add Staff</strong></button>
                    </div>

                    <!-- Search and Filter Section -->
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="input-group">
                          <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search"></i>
                          </span>
                          <input type="text" class="form-control border-start-0" placeholder="Search by name, email, or ID..." id="searchInput">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <select class="form-select" id="roleFilter">
                          <option value="">All Roles</option>
                          <option value="Manager">Manager</option>
                          <option value="Sales Staff">Sales Staff</option>
                        </select>
                      </div>
                    </div>

                    <div class="table-responsive mt-1">
                      <table class="table select-table" id="staffsTable">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" aria-checked="false" id="check-all">
                                  <i class="input-helper"></i>
                                </label>
                              </div>
                            </th>
                            <th>Staff Member</th>
                            <th>Role</th>
                            <th>Contact</th>
                            <th>Date Added</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Sample Data -->
                          <tr>
                            <td>
                              <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" aria-checked="false">
                                  <i class="input-helper"></i>
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="../assets/images/faces/face1.jpg" alt="Profile" class="me-2" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                <div>
                                  <h6 class="mb-0">Alice Johnson</h6>
                                  <p class="text-muted mb-0">@ajohnson</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <span class="badge bg-primary">Manager</span>
                            </td>
                            <td>
                              <div>
                                <p class="mb-1">alice.johnson@salespilot.com</p>
                                <p class="text-muted mb-0">+234 800 123 4567</p>
                              </div>
                            </td>
                            <td>
                              <p class="mb-0">Oct 14, 2025</p>
                            </td>
                            <td>
                            
                                <a class="btn btn-sm btn-secondary text-white me-1 staff-settings-btn" title="Settings"
                                  href="staff_settings.php?name=Alice%20Johnson&username=@ajohnson&role=Manager&email=alice.johnson@salespilot.com&phone=%2B234%20800%20123%204567">
                                  <i class="mdi mdi-cog"></i>
                                </a>
                              <button class="btn btn-sm btn-info text-white me-1" title="View Details">
                                <i class="bi bi-eye"></i>
                              </button>
                              
                              <button class="btn btn-sm btn-danger text-white" title="Delete">
                                <i class="bi bi-trash"></i>
                              </button>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" aria-checked="false">
                                  <i class="input-helper"></i>
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="../assets/images/faces/face2.jpg" alt="Profile" class="me-2" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                <div>
                                  <h6 class="mb-0">Bob Smith</h6>
                                  <p class="text-muted mb-0">@bsmith</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <span class="badge bg-secondary">Sales Staff</span>
                            </td>
                            <td>
                              <div>
                                <p class="mb-1">bob.smith@salespilot.com</p>
                                <p class="text-muted mb-0">+234 800 234 5678</p>
                              </div>
                            </td>
                            <td>
                              <p class="mb-0">Oct 18, 2025</p>
                            </td>
                            <td>
                              
                                <a class="btn btn-sm btn-secondary text-white me-1 staff-settings-btn" title="Settings"
                                  href="staff_settings.php?name=Bob%20Smith&username=@bsmith&role=Sales%20Staff&email=bob.smith@salespilot.com&phone=%2B234%20800%20234%205678">
                                  <i class="mdi mdi-cog"></i>
                                </a>
                              <button class="btn btn-sm btn-info text-white me-1" title="View Details">
                                <i class="bi bi-eye"></i>
                              </button>
                              
                              <button class="btn btn-sm btn-danger text-white" title="Delete">
                                <i class="bi bi-trash"></i>
                              </button>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" aria-checked="false">
                                  <i class="input-helper"></i>
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="../assets/images/faces/face3.jpg" alt="Profile" class="me-2" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                <div>
                                  <h6 class="mb-0">Carol Williams</h6>
                                  <p class="text-muted mb-0">@cwilliams</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <span class="badge bg-secondary">Sales Staff</span>
                            </td>
                            <td>
                              <div>
                                <p class="mb-1">carol.williams@salespilot.com</p>
                                <p class="text-muted mb-0">+234 800 345 6789</p>
                              </div>
                            </td>
                            <td>
                              <p class="mb-0">Oct 19, 2025</p>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-secondary text-white me-1 staff-settings-btn" title="Settings"
                                  href="staff_settings.php?name=Carol%20Williams&username=@cwilliams&role=Sales%20Staff&email=carol.williams@salespilot.com&phone=%2B234%20800%20345%206789">
                                  <i class="mdi mdi-cog"></i>
                                </a>
                              <button class="btn btn-sm btn-info text-white me-1" title="View Details">
                                <i class="bi bi-eye"></i>
                              </button>
                             
                              <button class="btn btn-sm btn-danger text-white" title="Delete">
                                <i class="bi bi-trash"></i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!-- Pagination and Info -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div class="text-muted small">
                        Showing <strong>1-3</strong> of <strong>3</strong> entries
                      </div>
                      <nav aria-label="Table pagination">
                        <ul class="pagination pagination-sm mb-0">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          
          <!-- Footer -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- End Footer -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Modal for Adding Staff -->
    <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStaffModalLabel">
              <i class="bi bi-person-plus me-2"></i>Add New Staff Member
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <form id="addStaffForm" action="../components/add_staff.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                  <select class="form-select" id="role" name="role" required>
                    <option value="">Select Role</option>
                    <?php foreach ($roles as $r): ?>
                      <option value="<?= htmlspecialchars($r['id']) ?>"><?= htmlspecialchars($r['name']) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="passport_photo" class="form-label">Profile Photo <span class="text-muted">(Optional)</span></label>
                  <input type="file" class="form-control" id="passport_photo" name="passport_photo" accept="image/*">
                  <small class="form-text text-muted">Accepted formats: JPG, PNG, GIF. Max size: 2MB</small>
                  <div id="photoPreview" class="mt-2" style="display: none;">
                    <img id="previewImage" src="" alt="Preview">
                    <button type="button" class="btn btn-sm btn-outline-danger ms-2" id="removePhoto">
                      <i class="bi bi-x-circle"></i> Remove
                    </button>
                  </div>
                </div>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_add_staff']) ?>">
              </div>
            </form>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" form="addStaffForm" id="addStaffBtn" class="btn btn-primary">
              <i class="bi bi-person-plus me-1"></i>Add Staff Member
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <!-- Staff Settings Modal -->
    <!-- Staff Settings Side Panel -->
    <!-- End Staff Settings Side Panel -->
    <style>
      .staff-settings-panel {
        position: fixed;
        top: 0;
        right: -480px;
        width: 420px;
        height: 100vh;
        background: #fff;
        box-shadow: -2px 0 16px rgba(0,0,0,0.08);
        z-index: 1050;
        padding: 32px 28px 24px 28px;
        transition: right 0.35s cubic-bezier(.4,0,.2,1);
        overflow-y: auto;
      }
      .staff-settings-panel.open {
        right: 0;
      }
      .staff-settings-header {
        border-bottom: 1px solid #eee;
        padding-bottom: 12px;
      }
      @media (max-width: 600px) {
        .staff-settings-panel {
          width: 100vw;
          padding: 18px 10px 12px 10px;
        }
      }
      .content-wrapper.collapse-for-panel {
        margin-right: 420px !important;
        transition: margin-right 0.35s cubic-bezier(.4,0,.2,1);
      }
      @media (max-width: 600px) {
        .content-wrapper.collapse-for-panel {
          margin-right: 0 !important;
        }
      }
    </style>

    <!-- Toast container for notifications -->
    <div aria-live="polite" aria-atomic="true" class="position-relative">
      <div id="globalToast" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 99999;"></div>
    </div>

    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    
    <!-- inject:js -->
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    
    <!-- Include Sidebar Scripts -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    <!-- Custom js for this page -->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script>
      // Staff Settings Side Panel logic
      const staffPanel = document.getElementById('staffSettingsPanel');
      const staffContentWrapper = document.getElementById('staffContentWrapper');
      function openStaffPanel(data) {
        document.getElementById('settingsStaffName').value = data.name;
        document.getElementById('settingsStaffUsername').value = data.username;
        document.getElementById('settingsStaffRole').value = data.role;
        document.getElementById('settingsStaffEmail').value = data.email;
        document.getElementById('settingsStaffPhone').value = data.phone;
        document.getElementById('settingsStaffPassword').value = '';
        document.getElementById('settingsStaffStatus').value = 'active';
        staffPanel.classList.add('open');
        staffContentWrapper.classList.add('collapse-for-panel');
      }
      function closeStaffPanel() {
        staffPanel.classList.remove('open');
        staffContentWrapper.classList.remove('collapse-for-panel');
      }
      document.querySelectorAll('.staff-settings-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          openStaffPanel({
            name: btn.getAttribute('data-name'),
            username: btn.getAttribute('data-username'),
            role: btn.getAttribute('data-role'),
            email: btn.getAttribute('data-email'),
            phone: btn.getAttribute('data-phone')
          });
        });
      });
      document.getElementById('closeStaffSettingsPanel').addEventListener('click', closeStaffPanel);
      document.getElementById('cancelStaffSettingsBtn').addEventListener('click', closeStaffPanel);
      document.getElementById('saveStaffSettingsBtn').addEventListener('click', function() {
        // Example: collect data and show a toast (implement actual save logic as needed)
        const name = document.getElementById('settingsStaffName').value;
        showToast('Settings saved for ' + name, true);
        closeStaffPanel();
      });
    </script>

    <script>
      // Populate staff settings modal with data from button
      document.querySelectorAll('.staff-settings-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          document.getElementById('settingsStaffName').value = btn.getAttribute('data-name');
          document.getElementById('settingsStaffUsername').value = btn.getAttribute('data-username');
          document.getElementById('settingsStaffRole').value = btn.getAttribute('data-role');
          document.getElementById('settingsStaffEmail').value = btn.getAttribute('data-email');
          document.getElementById('settingsStaffPhone').value = btn.getAttribute('data-phone');
          document.getElementById('settingsStaffPassword').value = '';
          document.getElementById('settingsStaffStatus').value = 'active';
        });
      });
      // Save button handler (AJAX or form submit can be added here)
      document.getElementById('saveStaffSettingsBtn').addEventListener('click', function() {
        // Example: collect data and show a toast (implement actual save logic as needed)
        const name = document.getElementById('settingsStaffName').value;
        const role = document.getElementById('settingsStaffRole').value;
        const email = document.getElementById('settingsStaffEmail').value;
        const phone = document.getElementById('settingsStaffPhone').value;
        const status = document.getElementById('settingsStaffStatus').value;
        // TODO: AJAX save logic here
        showToast('Settings saved for ' + name, true);
        var modal = bootstrap.Modal.getInstance(document.getElementById('staffSettingsModal'));
        modal.hide();
      });
    </script>

    <script>
      // AJAX submit for Add Staff modal
      (function(){
        var form = document.getElementById('addStaffForm');
        if (!form) return;
        var addBtn = document.getElementById('addStaffBtn');
        
        // Photo preview functionality
        var photoInput = document.getElementById('passport_photo');
        var photoPreview = document.getElementById('photoPreview');
        var previewImage = document.getElementById('previewImage');
        var removePhotoBtn = document.getElementById('removePhoto');

        if (photoInput) {
          photoInput.addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file) {
              // Validate file size (2MB max)
              if (file.size > 2 * 1024 * 1024) {
                showToast('File size must be less than 2MB', false);
                photoInput.value = '';
                return;
              }
              
              // Validate file type
              if (!file.type.match('image.*')) {
                showToast('Please select a valid image file', false);
                photoInput.value = '';
                return;
              }

              // Show preview
              var reader = new FileReader();
              reader.onload = function(e) {
                previewImage.src = e.target.result;
                photoPreview.style.display = 'block';
              };
              reader.readAsDataURL(file);
            }
          });
        }

        if (removePhotoBtn) {
          removePhotoBtn.addEventListener('click', function() {
            photoInput.value = '';
            photoPreview.style.display = 'none';
            previewImage.src = '';
          });
        }

        form.addEventListener('submit', function(e){
          e.preventDefault();
          if (addBtn) { 
            addBtn.disabled = true; 
            addBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Adding...'; 
          }
          
          var data = new FormData(form);
          var csrfVal = data.get('csrf_token');
          
          fetch(form.action, {
            method: 'POST',
            credentials: 'same-origin',
            headers: { 
              'Accept': 'application/json', 
              'X-CSRF-Token': csrfVal 
            },
            body: data
          })
          .then(function(resp){ 
            return resp.json(); 
          })
          .then(function(json){
            showToast(json.message || (json.success ? 'Staff member added successfully!' : 'Error occurred'), json.success);
            
            // If server provided email status, show it as an informational toast
            if (json.email_message) {
              setTimeout(function(){ 
                showToast(json.email_message, !!json.email_sent); 
              }, 250);
            }
            
            if (json.success) {
              // Close modal
              var modalEl = document.getElementById('addStaffModal');
              if (modalEl) {
                var bsModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                bsModal.hide();
              }
              
              // Reset form and preview
              form.reset();
              photoPreview.style.display = 'none';
              previewImage.src = '';
              
              // Optionally reload page to show new staff
              setTimeout(function(){ 
                location.reload(); 
              }, 1500);
            }
          })
          .catch(function(err){
            showToast('Server error. Please try again.', false);
            console.error(err);
          })
          .finally(function(){ 
            if (addBtn) { 
              addBtn.disabled = false; 
              addBtn.innerHTML = '<i class="bi bi-person-plus me-1"></i>Add Staff Member'; 
            } 
          });
        });

        // Toast notification function
        function showToast(message, success) {
          var container = document.getElementById('globalToast');
          if (!container) return;
          
          var toast = document.createElement('div');
          toast.className = 'toast';
          toast.role = 'alert';
          toast.ariaLive = 'assertive';
          toast.ariaAtomic = 'true';
          
          toast.innerHTML = `
            <div class="toast-header ${success ? 'text-success' : 'text-danger'}">
              <i class="bi ${success ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'} me-2"></i>
              <strong class="me-auto">${success ? 'Success' : 'Error'}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">${message}</div>
          `;
          
          container.appendChild(toast);
          var bs = new bootstrap.Toast(toast, { delay: 5000 });
          bs.show();
          
          // Remove after hidden
          toast.addEventListener('hidden.bs.toast', function(){ 
            toast.remove(); 
          });
        }
      })();

      // Table Search and Filter Functionality
      document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const roleFilter = document.getElementById('roleFilter');
        const table = document.getElementById('staffsTable');
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        const checkAll = document.getElementById('check-all');

        // Check All functionality
        if (checkAll) {
          checkAll.addEventListener('change', function() {
            const checkboxes = table.querySelectorAll('tbody input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
              checkbox.checked = checkAll.checked;
            });
          });
        }

        // Search functionality
        if (searchInput) {
          searchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            filterTable();
          });
        }

        // Role filter functionality
        if (roleFilter) {
          roleFilter.addEventListener('change', function() {
            filterTable();
          });
        }

        function filterTable() {
          const searchFilter = searchInput.value.toLowerCase();
          const roleFilterValue = roleFilter.value.toLowerCase();

          for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let searchFound = true;
            let roleFound = true;

            // Search through Staff Member name, Role, and Contact columns
            if (searchFilter) {
              searchFound = false;
              for (let j = 1; j < Math.min(cells.length, 5); j++) {
                const cellText = cells[j].textContent || cells[j].innerText;
                if (cellText.toLowerCase().indexOf(searchFilter) > -1) {
                  searchFound = true;
                  break;
                }
              }
            }

            // Role filter
            if (roleFilterValue) {
              const roleCell = cells[2]; // Role column
              const roleText = roleCell.textContent || roleCell.innerText;
              roleFound = roleText.toLowerCase().indexOf(roleFilterValue) > -1;
            }

            row.style.display = (searchFound && roleFound) ? '' : 'none';
          }

          // Update showing entries count
          updateEntriesCount();
        }

        // Update entries count
        function updateEntriesCount() {
          const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
          const totalRows = rows.length;
          const showingText = document.querySelector('.text-muted.small');
          if (showingText) {
            showingText.innerHTML = `Showing <strong>1-${visibleRows.length}</strong> of <strong>${totalRows}</strong> entries`;
          }
        }
      });
    </script>
  </body>
</html>
