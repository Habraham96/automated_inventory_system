<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Management - SalesPilot</title>
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
      
      .search-filter-section {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .users-table-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        overflow: hidden;
      }
      
      .users-table {
        width: 100%;
        margin: 0;
      }
      
      .users-table thead {
        background: #f8f9fa;
      }
      
      .users-table th {
        padding: 1rem;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      .users-table td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #e9ecef;
      }
      
      .users-table tbody tr {
        cursor: pointer;
        transition: background-color 0.2s ease;
      }
      
      .users-table tbody tr:hover {
        background-color: #f8f9fa;
      }
      
      .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        color: white;
        font-size: 0.9rem;
      }
      
      .status-badge {
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
      }
      
      .status-active { background: rgba(25, 135, 84, 0.1); color: #198754; }
      .status-inactive { background: rgba(108, 117, 125, 0.12); color: #6c757d; }
      .status-suspended { background: rgba(255, 193, 7, 0.12); color: #856404; }
      
      .role-badge {
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
      }
      
      .action-btn {
        padding: 0.4rem 0.6rem;
        border: none;
        background: transparent;
        cursor: pointer;
        transition: all 0.2s ease;
        border-radius: 5px;
        font-size: 1.1rem;
      }
      
      .action-btn:hover {
        background: #f8f9fa;
      }
      
      .side-panel {
        position: fixed;
        top: 0;
        right: -500px;
        width: 500px;
        height: 100%;
        background: white;
        box-shadow: -4px 0 20px rgba(0,0,0,0.15);
        transition: right 0.3s ease;
        z-index: 1060;
        overflow-y: auto;
      }
      
      .side-panel.active { right: 0; }
      
      .side-panel-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1055;
      }
      
      .side-panel-overlay.active {
        opacity: 1;
        visibility: visible;
      }
      
      .side-panel-header {
        padding: 1.5rem;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8f9fa;
      }
      
      .side-panel-body {
        padding: 1.5rem;
      }
      
      .user-detail-section {
        margin-bottom: 2rem;
      }
      
      .user-detail-section h6 {
        font-weight: 600;
        margin-bottom: 1rem;
        color: #495057;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
      }
      
      .detail-row {
        display: flex;
        padding: 0.75rem 0;
        border-bottom: 1px solid #e9ecef;
      }
      
      .detail-row:last-child { border-bottom: none; }
      
      .detail-label {
        font-weight: 600;
        color: #6c757d;
        width: 140px;
        flex-shrink: 0;
      }
      
      .detail-value {
        color: #212529;
        flex: 1;
      }
      
      .large-user-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: white;
        font-size: 2rem;
        margin: 0 auto 1rem;
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
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="mb-2"><i class="bi bi-people-fill me-2"></i>User Management</h3>
                  <p class="mb-0">Manage system users, roles, and permissions</p>
                </div>
              </div>
            </div>
            
            <!-- Search & Filter Section -->
            <div class="search-filter-section">
              <div class="row g-3">
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search by name, email, or phone...">
                  </div>
                </div>
                <div class="col-md-3">
                  <select class="form-select" id="roleFilter">
                    <option value="">All Roles</option>
                    <option value="Manager">Manager</option>
                    <option value="Staff">Staff</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <select class="form-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Suspended">Suspended</option>
                    <option value="Locked">Locked</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <button class="btn btn-outline-primary w-100" onclick="exportUsers()">
                    <i class="bi bi-download me-2"></i>Export CSV
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Users Table -->
            <div class="users-table-container">
              <table class="users-table">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Last Login</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="usersTableBody">
                  <tr onclick="showUserDetails(1)" data-user-id="1" data-status="Active" data-locked="false">
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                          JD
                        </div>
                        <div class="ms-3">
                          <div class="fw-bold">John Doe</div>
                          <small class="text-muted">ID: U001</small>
                        </div>
                      </div>
                    </td>
                    <td>john.doe@example.com</td>
                    <td>+234 801 234 5678</td>
                    <td><span class="role-badge">Admin</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>2 hours ago</td>
                    <td>
                      <button class="action-btn text-primary" onclick="event.stopPropagation(); editUser(1)" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <button class="action-btn text-warning" onclick="event.stopPropagation(); toggleLockUser(1, this)" title="Lock/Unlock">
                        <i class="bi bi-lock-open-fill"></i>
                      </button>
                      <button class="action-btn text-secondary" onclick="event.stopPropagation(); toggleSuspendUser(1, this)" title="Suspend/Unsuspend">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(2)" data-user-id="2" data-status="Active" data-locked="false">
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                          JS
                        </div>
                        <div class="ms-3">
                          <div class="fw-bold">Jane Smith</div>
                          <small class="text-muted">ID: U002</small>
                        </div>
                      </div>
                    </td>
                    <td>jane.smith@example.com</td>
                    <td>+234 802 345 6789</td>
                    <td><span class="role-badge">Manager</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>5 hours ago</td>
                    <td>
                      <button class="action-btn text-primary" onclick="event.stopPropagation(); editUser(2)" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <button class="action-btn text-warning" onclick="event.stopPropagation(); toggleLockUser(2, this)" title="Lock/Unlock">
                        <i class="bi bi-lock-open-fill"></i>
                      </button>
                      <button class="action-btn text-secondary" onclick="event.stopPropagation(); toggleSuspendUser(2, this)" title="Suspend/Unsuspend">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(3)" data-user-id="3" data-status="Active" data-locked="false">
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                          MB
                        </div>
                        <div class="ms-3">
                          <div class="fw-bold">Mike Brown</div>
                          <small class="text-muted">ID: U003</small>
                        </div>
                      </div>
                    </td>
                    <td>mike.brown@example.com</td>
                    <td>+234 803 456 7890</td>
                    <td><span class="role-badge">Staff</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>1 day ago</td>
                    <td>
                      <button class="action-btn text-primary" onclick="event.stopPropagation(); editUser(3)" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <button class="action-btn text-warning" onclick="event.stopPropagation(); toggleLockUser(3, this)" title="Lock/Unlock">
                        <i class="bi bi-lock-open-fill"></i>
                      </button>
                      <button class="action-btn text-secondary" onclick="event.stopPropagation(); toggleSuspendUser(3, this)" title="Suspend/Unsuspend">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(4)" data-user-id="4" data-status="Inactive" data-locked="true">
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                          SD
                        </div>
                        <div class="ms-3">
                          <div class="fw-bold">Sarah Davis</div>
                          <small class="text-muted">ID: U004</small>
                        </div>
                      </div>
                    </td>
                    <td>sarah.davis@example.com</td>
                    <td>+234 804 567 8901</td>
                    <td><span class="role-badge">Cashier</span></td>
                    <td><span class="status-badge status-inactive">Inactive</span></td>
                    <td>3 days ago</td>
                    <td>
                      <button class="action-btn text-primary" onclick="event.stopPropagation(); editUser(4)" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <button class="action-btn text-warning" onclick="event.stopPropagation(); toggleLockUser(4, this)" title="Lock/Unlock">
                        <i class="bi bi-lock-fill"></i>
                      </button>
                      <button class="action-btn text-secondary" onclick="event.stopPropagation(); toggleSuspendUser(4, this)" title="Suspend/Unsuspend">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(5)" data-user-id="5" data-status="Suspended" data-locked="false">
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                          TW
                        </div>
                        <div class="ms-3">
                          <div class="fw-bold">Tom Wilson</div>
                          <small class="text-muted">ID: U005</small>
                        </div>
                      </div>
                    </td>
                    <td>tom.wilson@example.com</td>
                    <td>+234 805 678 9012</td>
                    <td><span class="role-badge">Staff</span></td>
                    <td><span class="status-badge status-suspended">Suspended</span></td>
                    <td>1 week ago</td>
                    <td>
                      <button class="action-btn text-primary" onclick="event.stopPropagation(); editUser(5)" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <button class="action-btn text-warning" onclick="event.stopPropagation(); toggleLockUser(5, this)" title="Lock/Unlock">
                        <i class="bi bi-lock-open-fill"></i>
                      </button>
                      <button class="action-btn text-secondary" onclick="event.stopPropagation(); toggleSuspendUser(5, this)" title="Suspend/Unsuspend">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
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
    
    <!-- Side Panel Overlay -->
    <div class="side-panel-overlay" id="sidePanelOverlay" onclick="closeSidePanel()"></div>
    
    <!-- Side Panel -->
    <div class="side-panel" id="userDetailsPanel">
      <div class="side-panel-header">
        <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i>User Details</h5>
        <button type="button" class="btn-close" onclick="closeSidePanel()"></button>
      </div>
      <div class="side-panel-body">
        <div class="text-center mb-4">
          <div class="large-user-avatar" id="detailAvatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            JD
          </div>
          <h5 id="detailName">John Doe</h5>
          <p class="text-muted mb-1" id="detailEmail">john.doe@example.com</p>
          <span class="status-badge status-active" id="detailStatus">Active</span>
        </div>
        
        <div class="user-detail-section">
          <h6><i class="bi bi-person-badge me-2"></i>Personal Information</h6>
          <div class="detail-row">
            <span class="detail-label">User ID:</span>
            <span class="detail-value" id="detailUserId">U001</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Phone:</span>
            <span class="detail-value" id="detailPhone">+234 801 234 5678</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Role:</span>
            <span class="detail-value" id="detailRole">Admin</span>
          </div>
        </div>
        
        <div class="user-detail-section">
          <h6><i class="bi bi-clock-history me-2"></i>Activity Information</h6>
          <div class="detail-row">
            <span class="detail-label">Last Login:</span>
            <span class="detail-value" id="detailLastLogin">2 hours ago</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Account Created:</span>
            <span class="detail-value">Jan 15, 2025</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Total Transactions:</span>
            <span class="detail-value">1,245</span>
          </div>
        </div>
        
        <div class="user-detail-section">
          <h6><i class="bi bi-shield-check me-2"></i>Permissions</h6>
          <div class="detail-row">
            <span class="detail-label">Can Sell:</span>
            <span class="detail-value"><i class="bi bi-check-circle-fill text-success"></i> Yes</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Can Manage Inventory:</span>
            <span class="detail-value"><i class="bi bi-check-circle-fill text-success"></i> Yes</span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Can View Reports:</span>
            <span class="detail-value"><i class="bi bi-check-circle-fill text-success"></i> Yes</span>
          </div>
        </div>
        
        <div class="d-grid gap-2">
          <button class="btn btn-primary" onclick="editUser()">
            <i class="bi bi-pencil-fill me-2"></i>Edit User
          </button>
          <button class="btn btn-outline-danger" onclick="deleteUser()">
            <i class="bi bi-trash-fill me-2"></i>Delete User
          </button>
        </div>
      </div>
    </div>
    
    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="bi bi-person-plus-fill me-2"></i>Add New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form id="addUserForm">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">First Name *</label>
                  <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Last Name *</label>
                  <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Email *</label>
                  <input type="email" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Phone *</label>
                  <input type="tel" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Role *</label>
                  <select class="form-select" required>
                    <option value="">Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Staff">Staff</option>
                    <option value="Cashier">Cashier</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Status *</label>
                  <select class="form-select" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Password *</label>
                  <input type="password" class="form-control" required>
                  <small class="text-muted">Minimum 8 characters</small>
                </div>
                <div class="col-12">
                  <h6 class="mt-3 mb-2">Permissions</h6>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permSell">
                    <label class="form-check-label" for="permSell">Can Sell</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permInventory">
                    <label class="form-check-label" for="permInventory">Can Manage Inventory</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permReports">
                    <label class="form-check-label" for="permReports">Can View Reports</label>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="saveUser()">
              <i class="bi bi-check-circle-fill me-2"></i>Create User
            </button>
          </div>
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
      
      // Search functionality
      document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('#usersTableBody tr');
        rows.forEach(row => {
          const text = row.textContent.toLowerCase();
          row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
      });
      
      // Filter functionality
      document.getElementById('roleFilter').addEventListener('change', filterUsers);
      document.getElementById('statusFilter').addEventListener('change', filterUsers);
    });
    
    function filterUsers() {
      const roleFilter = document.getElementById('roleFilter').value;
      const statusFilter = document.getElementById('statusFilter').value;
      const rows = document.querySelectorAll('#usersTableBody tr');
      
      rows.forEach(row => {
        const role = row.querySelector('.role-badge').textContent;
        const status = row.querySelector('.status-badge').textContent;
        
        const roleMatch = !roleFilter || role === roleFilter;
        const statusMatch = !statusFilter || status === statusFilter;
        
        row.style.display = (roleMatch && statusMatch) ? '' : 'none';
      });
    }
    
    function showUserDetails(userId) {
      const panel = document.getElementById('userDetailsPanel');
      const overlay = document.getElementById('sidePanelOverlay');
      
      panel.classList.add('active');
      overlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
    
    function closeSidePanel() {
      const panel = document.getElementById('userDetailsPanel');
      const overlay = document.getElementById('sidePanelOverlay');
      
      panel.classList.remove('active');
      overlay.classList.remove('active');
      document.body.style.overflow = '';
    }
    
    function editUser(userId) {
      console.log('Edit user:', userId);
      // Implementation for edit functionality
    }
    
    function deleteUser(userId) {
      if (confirm('Are you sure you want to delete this user?')) {
        console.log('Delete user:', userId);
        // Implementation for delete functionality
      }
    }
    
    function toggleLockUser(userId, button) {
      const row = document.querySelector(`#usersTableBody tr[data-user-id="${userId}"]`);
      if (!row) return;
      const currentlyLocked = row.getAttribute('data-locked') === 'true';
      const statusBadge = row.querySelector('.status-badge');
      const icon = button.querySelector('i');
      
      if (currentlyLocked) {
        // Unlock user
        row.setAttribute('data-locked', 'false');
        if (row.getAttribute('data-status') === 'Active') {
          statusBadge.className = 'status-badge status-active';
          statusBadge.textContent = 'Active';
        }
        icon.className = 'bi bi-lock-open-fill';
        button.title = 'Lock User';
        console.log('User unlocked:', userId);
      } else {
        // Lock user
        row.setAttribute('data-locked', 'true');
        statusBadge.className = 'status-badge status-inactive';
        statusBadge.textContent = 'Locked';
        icon.className = 'bi bi-lock-fill';
        button.title = 'Unlock User';
        console.log('User locked:', userId);
      }
    }
    
    function toggleSuspendUser(userId, button) {
      const row = document.querySelector(`#usersTableBody tr[data-user-id="${userId}"]`);
      if (!row) return;
      const statusBadge = row.querySelector('.status-badge');
      const currentText = statusBadge.textContent.trim();
      const icon = button.querySelector('i');
      
      if (currentText === 'Suspended') {
        // Unsuspend back to Active
        row.setAttribute('data-status', 'Active');
        statusBadge.className = 'status-badge status-active';
        statusBadge.textContent = 'Active';
        icon.className = 'bi bi-slash-circle';
        button.title = 'Suspend User';
        console.log('User unsuspended:', userId);
      } else {
        // Suspend user
        row.setAttribute('data-status', 'Suspended');
        statusBadge.className = 'status-badge status-suspended';
        statusBadge.textContent = 'Suspended';
        icon.className = 'bi bi-check-circle-fill';
        button.title = 'Unsuspend User';
        console.log('User suspended:', userId);
      }
    }
    
    function saveUser() {
      const form = document.getElementById('addUserForm');
      if (form.checkValidity()) {
        console.log('Save new user');
        // Implementation for save functionality
        bootstrap.Modal.getInstance(document.getElementById('addUserModal')).hide();
      } else {
        form.reportValidity();
      }
    }
    
    function exportUsers() {
      console.log('Export users to CSV');
      // Implementation for CSV export
    }
    </script>
  </body>
</html>
