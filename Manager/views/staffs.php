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
      margin-top: 15px;
      width: 100%;
    }
    
    #photoPreview .card {
      max-width: 200px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease;
    }
    
    #photoPreview .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    #previewImage {
      width: 100%;
      height: 150px;
      object-fit: cover;
      display: block;
    }
    
    #photoPreview .card-body {
      padding: 10px;
      background: #f8f9fa;
    }
    
    /* Photo drop zone styling */
    .photo-drop-zone {
      border: 2px dashed #d1d3e0;
      border-radius: 8px;
      background: #f8f9fc;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
    }
    
    .photo-drop-zone:hover {
      border-color: #4e73df;
      background: #eef2ff;
    }
    
    .photo-drop-zone.drag-over {
      border-color: #4e73df;
      background: #e0e9ff;
      transform: scale(1.02);
    }
    
    .drop-zone-content i {
      display: block;
      font-size: 2.5rem;
    }
    
    /* Mobile responsive adjustments */
    @media (max-width: 576px) {
      #photoPreview .card {
        max-width: 100%;
      }
      
      #previewImage {
        height: 180px;
      }
      
      /* Modal adjustments for mobile */
      #addStaffModal .modal-dialog {
        margin: 0.5rem;
        max-width: calc(100% - 1rem) !important;
      }
      
      #addStaffModal .modal-body {
        padding: 20px 15px !important;
      }
      
      #addStaffModal .modal-header,
      #addStaffModal .modal-footer {
        padding: 15px;
      }
      
      #addStaffModal .modal-title {
        font-size: 1.1rem;
      }
      
      /* Stack form fields on mobile */
      #addStaffModal .row > div {
        margin-bottom: 0.75rem;
      }
    }
    
    /* Tablet adjustments */
    @media (min-width: 577px) and (max-width: 768px) {
      #addStaffModal .modal-dialog {
        max-width: 90% !important;
        margin: 1rem auto;
      }
    }
    
    /* Ensure proper image rendering */
    img[alt*="Profile"], img[alt*="profile"] {
      image-rendering: -webkit-optimize-contrast;
      image-rendering: crisp-edges;
    }
    </style>
    <!-- endinject -->
    
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        
        <!-- Include Sidebar Content -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        
        <!-- partial -->
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
                      <button type="button" class="btn btn-primary" style="min-width: 150px;" id="openAddStaffBtn"><strong>+ Add Staff</strong></button>
                    </div>

                    <!-- Search and Filter Options -->
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search staff..." id="searchInput">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Role Filter -->
                        <select class="form-select" id="roleFilter" style="max-width: 140px;">
                          <option value="">All Roles</option>
                          <option value="Manager">Manager</option>
                          <option value="Sales Staff">Sales Staff</option>
                        </select>
                        
                        <!-- Status Filter -->
                        <select class="form-select" id="statusFilter" style="max-width: 140px;">
                          <option value="">All Status</option>
                          <option value="Active">Active</option>
                          <option value="Inactive">Inactive</option>
                          <option value="Suspended">Suspended</option>
                        </select>
                        
                        
                      </div>
                    </div><br>

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
                                <button class="btn btn-sm btn-info text-white me-1 view-staff-btn" title="View Details">
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
                              
                                
                              <button class="btn btn-sm btn-info text-white me-1 view-staff-btn" title="View Details">
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
                              <button class="btn btn-sm btn-info text-white me-1 view-staff-btn" title="View Details">
                                <i class="bi bi-eye"></i>
                              </button>
                             
                              <button class="btn btn-sm btn-danger text-white" title="Delete">
                                <i class="bi bi-trash"></i>
                              </button>
                            </td>
                          </tr>
                                <i class="bi bi-eye"></i>
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

                    <!-- Enhanced Modal for Adding Staff (moved outside content wrapper below) -->
                    <!-- End Enhanced Modal -->
                  </div>
                </div>
              </div>
            </div>
            <!-- End row -->
          </div>
          <!-- content-wrapper ends -->
          
          <!-- Footer -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
          <!-- End Footer -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- Enhanced Modal for Adding Staff -->
    <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true" style="z-index: 1055;">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 650px;">
        <div class="modal-content border-0 shadow-lg">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="addStaffModalLabel">
              <i class="bi bi-person-plus me-2"></i>Add New Staff Member
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body p-4" style="background-color: #fff;">
            <form id="addStaffForm" action="../components/add_staff.php" method="POST" enctype="multipart/form-data">
              
              <div class="row mb-3">
                <div class="col-md-6 mb-2">
                  <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name" required>
                  <div class="invalid-feedback">Please provide a valid full name.</div>
                </div>
                <div class="col-md-6 mb-2">
                  <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                  <div class="invalid-feedback">Username is required and must be unique.</div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6 mb-2">
                  <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                  <div class="invalid-feedback">Please provide a valid email address.</div>
                </div>
                <div class="col-md-6 mb-2">
                  <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                  <div class="invalid-feedback">Please provide a valid phone number.</div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6 mb-2">
                  <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                  <select class="form-select" id="role" name="role" required>
                    <option value="" selected disabled>Select a role</option>
                    <option value="Manager">Manager</option>
                    <option value="Sales Staff">Sales Staff</option>
                  </select>
                  <div class="invalid-feedback">Please select a role.</div>
                </div>
                <div class="col-md-6 mb-2">
                  <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                  <select class="form-select" id="status" name="status" required>
                    <option value="Active" selected>Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="On Leave">On Leave</option>
                  </select>
                  <div class="invalid-feedback">Please select a status.</div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6 mb-2">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                      <i class="bi bi-eye"></i>
                    </button>
                  </div>
                  <small class="text-muted">Min 8 characters, mix of letters & numbers</small>
                  <div class="invalid-feedback">Password must be at least 8 characters long.</div>
                </div>
                <div class="col-md-6 mb-2">
                  <label for="confirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Re-enter password" required>
                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                      <i class="bi bi-eye"></i>
                    </button>
                  </div>
                  <div class="invalid-feedback">Passwords do not match.</div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-12 mb-2">
                  <label for="address" class="form-label">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter address (optional)"></textarea>
                </div>
              </div>

              
              </div>

              <div class="mb-3">
                <label for="photo" class="form-label">Profile Photo</label>
                <div class="d-flex align-items-center">
                  <div class="flex-grow-1">
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg,image/png,image/gif,image/webp">
                    <small class="text-muted">JPG, PNG, GIF, WebP (Max 2MB)</small>
                  </div>
                </div>
                <small id="photoHelp" class="form-text text-muted d-block mt-1">
                  <i class="bi bi-info-circle me-1"></i>Accepted: JPG, PNG, GIF, WebP. Max: 2MB
                </small>
                
                <!-- Photo Preview -->
                <div id="photoPreview" class="mt-3" style="display: none;">
                  <div class="card border-0 shadow-sm">
                    <img id="previewImage" src="" alt="Photo Preview" class="card-img-top">
                    <div class="card-body text-center">
                      <button type="button" class="btn btn-sm btn-outline-danger" id="removePhoto">
                        <i class="bi bi-trash me-1"></i>Remove Photo
                      </button>
                    </div>
                  </div>
                </div>
              
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_add_staff']) ?>">
              </div>
            </form>
          </div>
          
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="bi bi-x-circle me-1"></i>Cancel
            </button>
            <button type="submit" form="addStaffForm" id="addStaffBtn" class="btn btn-primary">
              <i class="bi bi-person-plus me-1"></i>Add Staff Member
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Enhanced Modal -->
    
    <!-- Staff Settings Modal -->
    <!-- Staff Settings Side Panel -->
    <!-- End Staff Settings Side Panel -->
    <style>
      /* Modal Backdrop Fix */
      .modal-backdrop {
        z-index: 1050 !important;
        background-color: rgba(0, 0, 0, 0.5);
      }
      
      /* Ensure modal appears above backdrop */
      #addStaffModal {
        z-index: 1055 !important;
      }
      
      #addStaffModal .modal-dialog {
        z-index: 1055;
      }
      
      #addStaffModal .modal-content {
        background-color: #fff;
        position: relative;
        z-index: 1055;
      }
      
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
    
    <!-- Bootstrap JS Bundle (required for modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/template.js"></script>
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
      // Simple and direct modal control
      (function() {
        'use strict';
        
        let modal = null;
        let modalElement = null;
        let backdrop = null;

        function showModal() {
          modalElement = document.getElementById('addStaffModal');
          if (!modalElement) return;

          console.log('Showing modal...');

          // Set initial position above viewport
          modalElement.style.display = 'block';
          modalElement.style.opacity = '0';
          modalElement.style.transform = 'translateY(-100px)';
          modalElement.style.transition = 'opacity 0.3s ease, transform 0.3s ease';

          // Trigger reflow
          modalElement.offsetHeight;

          // Animate to final position
          setTimeout(function() {
            modalElement.classList.add('show');
            modalElement.style.opacity = '1';
            modalElement.style.transform = 'translateY(0)';
            modalElement.setAttribute('aria-modal', 'true');
            modalElement.setAttribute('aria-hidden', 'false');
            modalElement.removeAttribute('aria-hidden');
          }, 10);

          // Create and show backdrop
          backdrop = document.createElement('div');
          backdrop.className = 'modal-backdrop fade show';
          document.body.appendChild(backdrop);
          document.body.classList.add('modal-open');
          
          // Set padding to prevent scroll jump
          const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
          document.body.style.paddingRight = scrollbarWidth + 'px';
        }

        function hideModal() {
          if (!modalElement) return;

          console.log('Hiding modal...');

          // Animate modal sliding up
          modalElement.style.opacity = '0';
          modalElement.style.transform = 'translateY(-100px)';

          // Wait for animation to complete before hiding
          setTimeout(function() {
            modalElement.style.display = 'none';
            modalElement.classList.remove('show');
            modalElement.setAttribute('aria-hidden', 'true');
            modalElement.removeAttribute('aria-modal');
            modalElement.style.transform = '';
            modalElement.style.opacity = '';
            modalElement.style.transition = '';

            // Remove backdrop
            if (backdrop && backdrop.parentNode) {
              backdrop.parentNode.removeChild(backdrop);
              backdrop = null;
            }

            // Clean up body
            document.body.classList.remove('modal-open');
            document.body.style.paddingRight = '';
            document.body.style.overflow = '';
          }, 300);
        }

        function init() {
          // Open button
          const openBtn = document.getElementById('openAddStaffBtn');
          if (openBtn) {
            openBtn.addEventListener('click', function(e) {
              e.preventDefault();
              showModal();
            });
          }

          // Close buttons
          const closeButtons = document.querySelectorAll('#addStaffModal [data-bs-dismiss="modal"], #addStaffModal .btn-close');
          closeButtons.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
              e.preventDefault();
              e.stopPropagation();
              hideModal();
            });
          });

          // ESC key
          document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' || e.keyCode === 27) {
              const modalEl = document.getElementById('addStaffModal');
              if (modalEl && modalEl.classList.contains('show')) {
                hideModal();
              }
            }
          });

          // Backdrop click
          document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('modal-backdrop')) {
              hideModal();
            }
          });

          // Click outside modal content
          const modalEl = document.getElementById('addStaffModal');
          if (modalEl) {
            modalEl.addEventListener('click', function(e) {
              if (e.target === modalEl) {
                hideModal();
              }
            });
          }

          // Password toggle (password + confirm password)
          const togglePasswordBtn = document.getElementById('togglePassword');
          const passwordInput = document.getElementById('password');
          const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPassword');
          const confirmPasswordInput = document.getElementById('confirmPassword');

          if (togglePasswordBtn && passwordInput) {
            togglePasswordBtn.addEventListener('click', function(e) {
              e.preventDefault();
              const type = passwordInput.type === 'password' ? 'text' : 'password';
              passwordInput.type = type;
              const icon = this.querySelector('i');
              icon.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
            });
          }

          if (toggleConfirmPasswordBtn && confirmPasswordInput) {
            toggleConfirmPasswordBtn.addEventListener('click', function(e) {
              e.preventDefault();
              const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
              confirmPasswordInput.type = type;
              const icon = this.querySelector('i');
              icon.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
            });
          }

          console.log('Modal initialized');
        }

        // Initialize when ready
        if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', init);
        } else {
          init();
        }
      })();
    </script>

    <script>
      // AJAX submit for Add Staff modal
      (function(){
        var form = document.getElementById('addStaffForm');
        if (!form) return;
        var addBtn = document.getElementById('addStaffBtn');
        
        // Photo preview functionality with enhanced error handling
        var photoInput = document.getElementById('passport_photo');
        var photoPreview = document.getElementById('photoPreview');
        var previewImage = document.getElementById('previewImage');
        var removePhotoBtn = document.getElementById('removePhoto');
        var photoDropZone = document.getElementById('photoDropZone');
        
        // Helper function to reset photo preview
        function resetPhotoPreview() {
          if (photoInput) photoInput.value = '';
          if (photoPreview) {
            photoPreview.style.display = 'none';
            photoPreview.style.opacity = '1';
            photoPreview.style.transition = '';
          }
          if (previewImage) previewImage.src = '';
        }
        
        // Helper function to process file
        function processFile(file) {
          if (!file) return;
          
          // Validate file size (2MB max)
          var maxSize = 2 * 1024 * 1024; // 2MB in bytes
          if (file.size > maxSize) {
            showToast('File size must be less than 2MB. Current size: ' + (file.size / (1024 * 1024)).toFixed(2) + 'MB', false);
            resetPhotoPreview();
            return;
          }
          
          // Validate file type
          var validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
          if (!validTypes.includes(file.type.toLowerCase())) {
            showToast('Please select a valid image file (JPG, PNG, GIF, or WebP)', false);
            resetPhotoPreview();
            return;
          }

          // Show preview with smooth animation
          var reader = new FileReader();
          reader.onload = function(e) {
            previewImage.src = e.target.result;
            photoPreview.style.display = 'block';
            
            // Smooth fade-in animation
            photoPreview.style.opacity = '0';
            setTimeout(function() {
              photoPreview.style.transition = 'opacity 0.3s ease';
              photoPreview.style.opacity = '1';
            }, 10);
            
            // Hide drop zone when preview is shown
            if (photoDropZone) {
              photoDropZone.style.display = 'none';
            }
          };
          
          reader.onerror = function() {
            showToast('Error reading file. Please try again.', false);
            resetPhotoPreview();
          };
          
          reader.readAsDataURL(file);
        }
        
        // Click to upload functionality
        if (photoDropZone && photoInput) {
          photoDropZone.addEventListener('click', function() {
            photoInput.click();
          });
        }

        if (photoInput) {
          photoInput.addEventListener('change', function(e) {
            var file = e.target.files[0];
            processFile(file);
          });
        }
        
        // Drag and drop functionality
        if (photoDropZone) {
          ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            photoDropZone.addEventListener(eventName, preventDefaults, false);
          });
          
          function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
          }
          
          ['dragenter', 'dragover'].forEach(eventName => {
            photoDropZone.addEventListener(eventName, function() {
              photoDropZone.classList.add('drag-over');
            }, false);
          });
          
          ['dragleave', 'drop'].forEach(eventName => {
            photoDropZone.addEventListener(eventName, function() {
              photoDropZone.classList.remove('drag-over');
            }, false);
          });
          
          photoDropZone.addEventListener('drop', function(e) {
            var dt = e.dataTransfer;
            var files = dt.files;
            
            if (files.length > 0) {
              var file = files[0];
              // Update the file input
              var dataTransfer = new DataTransfer();
              dataTransfer.items.add(file);
              photoInput.files = dataTransfer.files;
              
              processFile(file);
            }
          }, false);
        }

        if (removePhotoBtn) {
          removePhotoBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Smooth fade-out animation
            photoPreview.style.transition = 'opacity 0.2s ease';
            photoPreview.style.opacity = '0';
            
            setTimeout(function() {
              photoInput.value = '';
              photoPreview.style.display = 'none';
              previewImage.src = '';
              photoPreview.style.opacity = '1';
              photoPreview.style.transition = '';
              
              // Show drop zone again
              if (photoDropZone) {
                photoDropZone.style.display = 'block';
              }
            }, 200);
          });
        }
        
        // Also reset preview when modal is closed
        var modalEl = document.getElementById('addStaffModal');
        if (modalEl) {
          modalEl.addEventListener('hidden.bs.modal', function() {
            resetPhotoPreview();
            if (photoDropZone) {
              photoDropZone.style.display = 'block';
            }
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
              resetPhotoPreview();
              
              // Show drop zone again
              if (photoDropZone) {
                photoDropZone.style.display = 'block';
              }
              
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
        const statusFilter = document.getElementById('statusFilter');
        const exportStaff = document.getElementById('exportStaff');
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
          searchInput.addEventListener('input', function() {
            filterTable();
          });
        }

        // Role filter functionality
        if (roleFilter) {
          roleFilter.addEventListener('change', function() {
            filterTable();
          });
        }

        // Status filter functionality
        if (statusFilter) {
          statusFilter.addEventListener('change', function() {
            filterTable();
          });
        }

        // Export functionality
        if (exportStaff) {
          exportStaff.addEventListener('click', function() {
            const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
            let csvContent = 'Staff Member,Role,Contact,Date Added\n';
            
            visibleRows.forEach(row => {
              const cells = row.querySelectorAll('td');
              if (cells.length > 1) {
                // Extract text content, excluding checkboxes and action buttons
                const name = cells[1].querySelector('h6')?.textContent || '';
                const role = cells[2].textContent.trim();
                const email = cells[3].querySelector('p')?.textContent || '';
                const date = cells[4].textContent.trim();
                
                csvContent += `"${name}","${role}","${email}","${date}"\n`;
              }
            });

            // Download CSV
            const blob = new Blob([csvContent], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `staff_export_${new Date().toISOString().split('T')[0]}.csv`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            window.URL.revokeObjectURL(url);
          });
        }

        function filterTable() {
          const searchFilter = searchInput.value.toLowerCase();
          const roleFilterValue = roleFilter.value.toLowerCase();
          const statusFilterValue = statusFilter.value.toLowerCase();

          for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let searchFound = true;
            let roleFound = true;
            let statusFound = true;

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

            // Status filter - check for badges or status indicators
            if (statusFilterValue) {
              // Look for status badges in the row
              const badges = row.querySelectorAll('.badge');
              statusFound = false;
              badges.forEach(badge => {
                if (badge.textContent.toLowerCase().includes(statusFilterValue)) {
                  statusFound = true;
                }
              });
              
              // If no status badges found, assume Active for display purposes
              if (badges.length === 0 && statusFilterValue === 'active') {
                statusFound = true;
              }
            }

            row.style.display = (searchFound && roleFound && statusFound) ? '' : 'none';
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

    <!-- View Staff Modal -->
    <div class="modal fade" id="viewStaffModal" tabindex="-1" aria-labelledby="viewStaffModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewStaffModalLabel">Staff Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex align-items-center mb-3">
              <img id="viewStaffProfile" src="" alt="Profile" style="width:64px;height:64px;border-radius:8px;object-fit:cover;margin-right:12px;">
              <div>
                <h5 id="viewStaffName" class="mb-0"></h5>
                <p id="viewStaffUsername" class="text-muted mb-0"></p>
              </div>
            </div>
            <div class="mb-2"><strong>Role:</strong> <span id="viewStaffRole"></span></div>
            <div class="mb-2"><strong>Email:</strong> <div id="viewStaffEmail"></div></div>
            <div class="mb-2"><strong>Phone:</strong> <div id="viewStaffPhone"></div></div>
            <div class="mb-2"><strong>Date Added:</strong> <div id="viewStaffDate"></div></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Wire table 'View' buttons to the View Staff modal
      document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.view-staff-btn').forEach(function(btn) {
          btn.addEventListener('click', function() {
            var row = btn.closest('tr');
            if (!row) return;

            var imgEl = row.querySelector('td:nth-child(2) img');
            var name = row.querySelector('td:nth-child(2) h6')?.textContent.trim() || '';
            var username = row.querySelector('td:nth-child(2) p')?.textContent.trim() || '';
            var roleEl = row.querySelector('td:nth-child(3) .badge');
            var role = roleEl ? roleEl.textContent.trim() : (row.querySelector('td:nth-child(3)')?.textContent.trim() || '');
            var email = row.querySelector('td:nth-child(4) p')?.textContent.trim() || '';
            var phoneNodes = row.querySelectorAll('td:nth-child(4) p');
            var phone = '';
            if (phoneNodes.length > 1) phone = phoneNodes[1].textContent.trim();
            else if (phoneNodes.length === 1) phone = phoneNodes[0].textContent.trim();
            var date = row.querySelector('td:nth-child(5) p')?.textContent.trim() || '';

            var profile = document.getElementById('viewStaffProfile');
            var nameEl = document.getElementById('viewStaffName');
            var usernameEl = document.getElementById('viewStaffUsername');
            var roleElOut = document.getElementById('viewStaffRole');
            var emailEl = document.getElementById('viewStaffEmail');
            var phoneEl = document.getElementById('viewStaffPhone');
            var dateEl = document.getElementById('viewStaffDate');

            if (profile) profile.src = imgEl ? imgEl.src : '';
            if (nameEl) nameEl.textContent = name;
            if (usernameEl) usernameEl.textContent = username;
            if (roleElOut) roleElOut.textContent = role;
            if (emailEl) emailEl.textContent = email;
            if (phoneEl) phoneEl.textContent = phone;
            if (dateEl) dateEl.textContent = date;

            var modalEl = document.getElementById('viewStaffModal');
            if (modalEl) {
              var bsModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
              bsModal.show();
            }
          });
        });
      });
    </script>
  </body>
</html>
