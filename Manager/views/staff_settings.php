<?php
// staff_settings.php: Standalone page for staff settings side panel
session_start();
// Optionally, include config and authentication checks here
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Settings - SalesPilot</title>
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    .settings-nav-col {
      min-height: 520px;
      max-height: 80vh;
      overflow-y: auto;
      background: #f8f9fa;
      border-radius: 8px 0 0 8px;
      border-right: 1px solid #e0e0e0;
    }
    @media (max-width: 767px) {
      .settings-nav-col {
        border-radius: 8px 8px 0 0;
        border-right: none;
        border-bottom: 1px solid #e0e0e0;
        min-height: unset;
        max-height: unset;
      }
    }
    body { background: #f5f7fa; }
    .staff-settings-panel {
      position: relative;
      width: 100%;
      max-width: 1200px;
      min-height: 92vh;
      background: #fff;
      box-shadow: 0 0 40px rgba(0,0,0,0.12);
      padding: 48px 56px 40px 56px;
      margin: 0 auto;
      overflow-y: auto;
    }
    .staff-settings-header {
      border-bottom: 1px solid #eee;
      padding-bottom: 12px;
    }
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
      .staff-settings-panel {
        padding: 18px 6px 12px 6px;
      }
      #staffSettingsTab .nav-link {
        min-width: 120px;
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid d-flex justify-content-center align-items-start" style="min-height:100vh;max-width:1500px;">
    <div id="staffSettingsPanel" class="staff-settings-panel mt-4 mb-4">
      <div class="staff-settings-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Staff Settings</h5>
        <a href="staffs.php" class="btn-close" aria-label="Close"></a>
      </div>
      <div class="row mt-3 g-0">
        <div class="col-12 col-md-4 col-lg-3 pe-md-3 settings-nav-col">
          <ul class="nav nav-pills flex-md-column flex-row mb-3 mb-md-0 w-100" id="staffSettingsTab" role="tablist" style="position:sticky;top:0;z-index:1;">
            <li class="nav-item" role="presentation">
              <button class="nav-link active w-100 text-start" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profileTabPane" type="button" role="tab" aria-controls="profileTabPane" aria-selected="true">
                <i class="mdi mdi-account-circle-outline me-2"></i>Profile
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start" id="account-tab" data-bs-toggle="tab" data-bs-target="#accountTabPane" type="button" role="tab" aria-controls="accountTabPane" aria-selected="false">
                <i class="mdi mdi-lock-outline me-2"></i>Account & Security
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start" id="roles-tab" data-bs-toggle="tab" data-bs-target="#rolesTabPane" type="button" role="tab" aria-controls="rolesTabPane" aria-selected="false">
                <i class="mdi mdi-account-key-outline me-2"></i>Roles & Permission
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start" id="work-tab" data-bs-toggle="tab" data-bs-target="#workTabPane" type="button" role="tab" aria-controls="workTabPane" aria-selected="false">
                <i class="mdi mdi-briefcase-outline me-2"></i>Work & Activity
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notificationsTabPane" type="button" role="tab" aria-controls="notificationsTabPane" aria-selected="false">
                <i class="mdi mdi-bell-outline me-2"></i>Notifications & Communication
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start" id="store-tab" data-bs-toggle="tab" data-bs-target="#storeTabPane" type="button" role="tab" aria-controls="storeTabPane" aria-selected="false">
                <i class="mdi mdi-store-outline me-2"></i>Store/Branch Settings
              </button>
            </li>
          </ul>
        </div>
        <div class="col-12 col-md-8 col-lg-9 ps-md-4">
          <div class="tab-content mt-0" id="staffSettingsTabContent">
        <div class="tab-pane fade show active" id="profileTabPane" role="tabpanel" aria-labelledby="profile-tab">
          <form id="staffSettingsFormProfile">
            <div class="mb-3 text-center">
              <img src="../assets/images/faces/face1.jpg" alt="Profile Photo" class="rounded-circle mb-2" style="width: 90px; height: 90px; object-fit: cover;">
              <div>
                <input type="file" class="form-control form-control-sm d-inline-block w-auto" id="settingsStaffPhoto" accept="image/*">
                <small class="text-muted d-block">Upload new profile photo</small>
              </div>
            </div>
            <div class="row g-2">
              <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" id="settingsStaffName" placeholder="Full name" required>
              </div>
              <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" id="settingsStaffUsername" placeholder="Username" required>
              </div>
            </div>
            <div class="row g-2">
              <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="settingsStaffEmail" placeholder="Email address" required>
              </div>
              <div class="col-12 col-md-6 mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" id="settingsStaffPhone" placeholder="Phone number">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Bio</label>
              <textarea class="form-control" id="settingsStaffBio" rows="2" placeholder="Short bio or notes"></textarea>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="accountTabPane" role="tabpanel" aria-labelledby="account-tab">
          <form id="staffSettingsFormAccount">
            <div class="mb-3">
              <label class="form-label">Change Password</label>
              <input type="password" class="form-control" id="settingsStaffPassword" placeholder="Leave blank to keep unchanged">
            </div>
            <div class="mb-3">
              <label class="form-label">Enable Two-Factor Authentication (2FA)</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="settingsStaff2FA">
                <label class="form-check-label" for="settingsStaff2FA">Require 2FA for login</label>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Account Status</label>
              <select class="form-select" id="settingsStaffStatus">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="suspended">Suspended</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Last Login</label>
              <input type="text" class="form-control" id="settingsStaffLastLogin" value="2025-10-28 09:15" readonly>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="rolesTabPane" role="tabpanel" aria-labelledby="roles-tab">
          <form id="staffSettingsFormRoles">
            <div class="mb-3">
              <label class="form-label">Role</label>
              <select class="form-select" id="settingsStaffRole">
                <option value="Manager">Manager</option>
                <option value="Sales Staff">Sales Staff</option>
                <option value="Cashier">Cashier</option>
                <option value="Inventory">Inventory</option>
                <option value="Custom">Custom</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Permissions</label>
              <div class="row g-2">
                <div class="col-6 col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permSales">
                    <label class="form-check-label" for="permSales">Sales</label>
                  </div>
                </div>
                <div class="col-6 col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permInventory">
                    <label class="form-check-label" for="permInventory">Inventory</label>
                  </div>
                </div>
                <div class="col-6 col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permReports">
                    <label class="form-check-label" for="permReports">Reports</label>
                  </div>
                </div>
                <div class="col-6 col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permSettings">
                    <label class="form-check-label" for="permSettings">Settings</label>
                  </div>
                </div>
                <div class="col-6 col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permDiscounts">
                    <label class="form-check-label" for="permDiscounts">Discounts</label>
                  </div>
                </div>
                <div class="col-6 col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permCustomers">
                    <label class="form-check-label" for="permCustomers">Customers</label>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="workTabPane" role="tabpanel" aria-labelledby="work-tab">
          <form id="staffSettingsFormWork">
            <div class="mb-3">
              <label class="form-label">Work Schedule</label>
              <input type="text" class="form-control" id="settingsStaffWorkSchedule" placeholder="e.g. Mon-Fri, 9am-5pm">
              <small class="text-muted">Set the regular working hours for this staff member.</small>
            </div>
            <div class="mb-3">
              <label class="form-label">Assigned Tasks</label>
              <input type="text" class="form-control" id="settingsStaffTasks" placeholder="e.g. Stock check, POS, etc.">
            </div>
            <div class="mb-3">
              <label class="form-label">Recent Activity</label>
              <textarea class="form-control" id="settingsStaffActivity" rows="3" readonly placeholder="Recent staff activity log..."></textarea>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="notificationsTabPane" role="tabpanel" aria-labelledby="notifications-tab">
          <form id="staffSettingsFormNotifications">
            <div class="mb-3">
              <label class="form-label">Email Notifications</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="settingsStaffEmailNotifications">
                <label class="form-check-label" for="settingsStaffEmailNotifications">Enable email notifications</label>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">SMS Notifications</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="settingsStaffSMSNotifications">
                <label class="form-check-label" for="settingsStaffSMSNotifications">Enable SMS notifications</label>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Preferred Communication</label>
              <select class="form-select" id="settingsStaffPreferredComm">
                <option value="email">Email</option>
                <option value="sms">SMS</option>
                <option value="both">Both</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Push Notifications</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="settingsStaffPushNotifications">
                <label class="form-check-label" for="settingsStaffPushNotifications">Enable push notifications</label>
              </div>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="storeTabPane" role="tabpanel" aria-labelledby="store-tab">
          <form id="staffSettingsFormStore">
            <div class="mb-3">
              <label class="form-label">Store/Branch</label>
              <select class="form-select" id="settingsStaffStore">
                <option value="">Select branch</option>
                <option value="Main">Main</option>
                <option value="Annex">Annex</option>
                <option value="Warehouse">Warehouse</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Branch Role</label>
              <input type="text" class="form-control" id="settingsStaffBranchRole" placeholder="Branch role">
            </div>
            <div class="mb-3">
              <label class="form-label">Branch Permissions</label>
              <div class="row g-2">
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="branchPermSales">
                    <label class="form-check-label" for="branchPermSales">Sales</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="branchPermInventory">
                    <label class="form-check-label" for="branchPermInventory">Inventory</label>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="d-flex justify-content-end gap-2 mt-3">
        <a href="staffs.php" class="btn btn-secondary">Cancel</a>
        <button type="button" class="btn btn-primary" id="saveStaffSettingsBtn">Save Changes</button>
      </div>
    </div>
  </div>
  <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    // Optionally, add JS to populate fields from query params or AJAX
    document.getElementById('saveStaffSettingsBtn').addEventListener('click', function() {
      alert('Settings saved! (Implement backend logic)');
    });

    // Make staff settings tab respond instantly to click (no fade delay)
    document.addEventListener('DOMContentLoaded', function() {
      const tabButtons = document.querySelectorAll('#staffSettingsTab .nav-link');
      const tabPanes = document.querySelectorAll('#staffSettingsTabContent .tab-pane');
      tabButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          // Remove active from all buttons and panes
          tabButtons.forEach(b => b.classList.remove('active'));
          tabPanes.forEach(p => {
            p.classList.remove('show', 'active');
          });
          // Activate clicked button and corresponding pane
          btn.classList.add('active');
          const target = btn.getAttribute('data-bs-target');
          const pane = document.querySelector(target);
          if (pane) {
            pane.classList.add('active', 'show');
          }
        });
      });
    });
  </script>
</body>
</html>
