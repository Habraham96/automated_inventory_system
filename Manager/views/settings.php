<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Settings - SalesPilot</title>
		<link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
		<style>
      /* Modal z-index and backdrop fixes */
      .modal-backdrop {
        z-index: 1060 !important;
        background-color: rgba(0, 0, 0, 0.7) !important;
      }
      
      #addBranchModal {
        z-index: 1065 !important;
      }
      
      #addBranchModal .modal-dialog {
        z-index: 1065 !important;
      }
      
      #addBranchModal .modal-content {
        background: white !important;
        z-index: 1065 !important;
      }
      
      #addBranchModal .modal-body {
        padding: 1.5rem;
      }
      
      /* Edit Branch Modal z-index and visibility */
      #editBranchModal {
        z-index: 1070 !important;
      }
      
      #editBranchModal .modal-dialog {
        z-index: 1070 !important;
      }
      
      #editBranchModal .modal-content {
        background: white !important;
        z-index: 1070 !important;
      }
      
      #editBranchModal .modal-body {
        padding: 1.5rem;
      }
      
      /* Switch Branch Modal z-index and visibility */
      #switchBranchModal {
        z-index: 1070 !important;
      }
      
      #switchBranchModal .modal-dialog {
        z-index: 1070 !important;
      }
      
      #switchBranchModal .modal-content {
        background: white !important;
        z-index: 1070 !important;
      }
      
      #switchBranchModal .modal-body {
        padding: 1.5rem;
      }
      
      #switchBranchModal .list-group-item {
        border-left: 3px solid transparent;
        transition: all 0.2s ease;
      }
      
      #switchBranchModal .list-group-item:hover:not(.disabled) {
        border-left-color: #007bff;
        background-color: #f8f9fa;
      }
      
      #switchBranchModal .list-group-item.disabled {
        cursor: not-allowed;
      }
      
      /* Edit Staff Modal z-index and visibility */
      #editStaffModal {
        z-index: 1070 !important;
      }
      
      #editStaffModal .modal-dialog {
        z-index: 1070 !important;
      }
      
      #editStaffModal .modal-content {
        background: white !important;
        z-index: 1070 !important;
      }
      
      #editStaffModal .modal-body {
        padding: 2rem;
      }

      /* Add Unit Modal z-index and visibility */
      #addUnitModal {
        z-index: 1075 !important;
      }
      
      #addUnitModal .modal-dialog {
        z-index: 1075 !important;
      }
      
      #addUnitModal .modal-content {
        background: white !important;
        z-index: 1075 !important;
      }
      
      #addUnitModal .modal-body {
        padding: 1.5rem;
      }

      /* Edit Unit Modal z-index and visibility */
      #editUnitModal {
        z-index: 1075 !important;
      }
      
      #editUnitModal .modal-dialog {
        z-index: 1075 !important;
      }
      
      #editUnitModal .modal-content {
        background: white !important;
        z-index: 1075 !important;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
      }
      
      #editUnitModal .modal-body {
        padding: 1.5rem;
      }

      #editUnitModal .modal-backdrop {
        z-index: 1070 !important;
      }
      
      /* Responsive modal sizing */
      @media (max-width: 576px) {
        #addBranchModal .modal-dialog,
        #editBranchModal .modal-dialog,
        #addUnitModal .modal-dialog,
        #editUnitModal .modal-dialog {
          margin: 0.5rem;
          max-width: calc(100% - 1rem) !important;
        }
        
        #addBranchModal .modal-body,
        #editBranchModal .modal-body,
        #addUnitModal .modal-body,
        #editUnitModal .modal-body {
          padding: 1rem;
        }
        
        #editStaffModal .modal-dialog {
          margin: 0.5rem;
          max-width: calc(100% - 1rem) !important;
        }
        
        #editStaffModal .modal-body {
          padding: 1rem;
        }
      }
      
      @media (max-width: 992px) {
        #editStaffModal .modal-lg {
          max-width: 90%;
        }
      }
      
      .tab-section-fixed {
        position: sticky;
        top: 8px; /* reduced offset so the tab column starts higher */
        z-index: 0;
        background: #fff;
        padding-right: 18px;
        border-right: 2px solid #e9ecef;
        flex: 0 0 220px;
        max-width: 220px;
      }
      .settings-row {
        display: flex;
        flex-wrap: nowrap;
        align-items: flex-start;
      }

      .business-info-section {
        flex: 1 1 auto;
        min-width: 0;
      }
      .nav-tabs-line {
        border-bottom: 2px solid #e9ecef;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        padding: 8px;
        border-radius: 10px 10px 0 0;
        margin-bottom: 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        min-width: 180px;
      }
      /* removed separate .tab-section-separator element - using border on .tab-section-fixed */
			.nav-tabs-line .nav-link {
				border: none;
				border-bottom: 3px solid transparent;
				color: #6c757d;
				font-weight: 500;
				padding: 14px 24px;
				margin: 0 4px;
				border-radius: 8px 8px 0 0;
				transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
				background: transparent;
			}
			.nav-tabs-line .nav-link.active {
				color: #007bff;
				border-bottom: 3px solid #007bff;
				background: #f8f9fa;
			}
      .tab-pane {
        padding: 32px 24px;
        background: #fff;
        border-radius: 0 10px 10px 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        min-height: 300px;
      }
      /* Ensure tab panes render inside the main content container and are not overlapped */
      /* Make the outer tab-content neutral and let inner .card elements render the white panels */
      #settingsTabsContent {
        display: block;
        overflow: visible;
        position: relative;
        background: transparent;
        padding-top: 8px; /* match the tab column top offset */
      }
      #settingsTabsContent > .tab-pane { display: none; }
      #settingsTabsContent > .tab-pane.show,
      #settingsTabsContent > .tab-pane.active { display: block; }
      #settingsTabsContent .tab-pane { position: relative; z-index: 3; background: transparent; padding: 0; box-shadow: none; border-radius: 0; min-height: auto; }
      .settings-heading {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 24px;
        color: #343a40;
      }
      .tab-pane h4 {
        margin-top: 24px;
      }
      @media (max-width: 992px) {
        .settings-row {
          flex-wrap: wrap;
        }
        .tab-section-fixed {
          position: relative;
          top: auto;
          border-right: none;
          padding-right: 0;
          flex: 0 0 100%;
          max-width: 100%;
          margin-bottom: 12px;
        }
        .business-info-section {
          padding-left: 0 !important;
          flex: 0 0 100%;
          max-width: 100%;
        }
      }

      /* Alignment tweaks: ensure tab panes align with the left tab column */
      .tab-section-fixed { padding-top: 0; }
      #settingsTabs { margin-top: 0; }
      #settingsTabsContent { margin-top: 0; padding-top: 0; }
      #settingsTabsContent > .tab-pane { margin-top: 0; padding-top: 0; }
      /* Let inner cards supply the white panel look and sit at the same vertical start */
      #settingsTabsContent .card { margin-top: 0; }
		</style>

    <!-- Small animations for receipt preview elements -->
    <style>
      /* Apply transition to immediate children of the inner preview so toggles animate */
      #receiptPreviewInner > * {
        transition: opacity 180ms ease, transform 180ms ease;
        will-change: opacity, transform;
      }
      /* Used to animate hiding/showing */
      .hidden-temp { opacity: 0 !important; transform: translateY(-4px) !important; }
    </style>
	</head>
  <body>
    <?php include '../layouts/preloader.php'; ?>
	<div class="container py-5"style="padding-left: 50px; padding-right:0px; max-width:100%;">
			<h2 class="settings-heading">System Preferences</h2>
      <div class="row g-0 settings-row">
        <div class="col-md-3 d-flex flex-column align-items-stretch tab-section-fixed">
          <div class="nav flex-column nav-pills nav-tabs-line" id="settingsTabs" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="business-tab" data-bs-toggle="pill" data-bs-target="#business" type="button" role="tab" aria-controls="business" aria-selected="true">Business Information</button>
            <button class="nav-link" id="subscriptions-tab" data-bs-toggle="pill" data-bs-target="#subscriptions" type="button" role="tab" aria-controls="subscriptions" aria-selected="false">Subscriptions</button>
            <button class="nav-link" id="branches-tab" data-bs-toggle="pill" data-bs-target="#branches" type="button" role="tab" aria-controls="branches" aria-selected="false">Branches</button>
            <button class="nav-link" id="staffs-tab" data-bs-toggle="pill" data-bs-target="#staffs" type="button" role="tab" aria-controls="staffs" aria-selected="false">Staffs</button>
            <button class="nav-link" id="receipt-tab" data-bs-toggle="pill" data-bs-target="#receipt" type="button" role="tab" aria-controls="receipt" aria-selected="false">Receipt Settings</button>
            <button class="nav-link" id="measurement-tab" data-bs-toggle="pill" data-bs-target="#measurement" type="button" role="tab" aria-controls="measurement" aria-selected="false">Measurement Units</button>
          </div>
        </div>


        <div class="col-md-9 d-flex flex-column justify-content-start align-items-stretch" style="padding-left:15px;">
          <div class="tab-content w-100 business-info-section" id="settingsTabsContent" style="min-width:0;flex:1 1 0;display:block;">
      <!-- Personal & Business Information -->
          <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">

            <div class="card mb-4 p-3">
                  <h5 class="mb-3" style="color:#007bff;font-weight:600;">Business Information</h5>
                <div class="row">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group mb-3">
                          <label class="form-label">Business Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter business name" value="SalesPilot">
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-3 pe-md-3">
                            <label class="form-label">Business Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="Enter business email" value="info@salespilot.com">
                          </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3 ps-md-3">
                            <label class="form-label">Business Phone</label>
                            <input type="tel" class="form-control" placeholder="Enter phone number" value="+1 234 567 8900">
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group mb-3">
                          <label class="form-label">Business Address</label>
                          <textarea class="form-control" rows="3" placeholder="Enter business address">123 Business Street, City, State 12345</textarea>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label class="form-label">Business Registration Number (CAC)</label>
                            <input type="text" class="form-control" placeholder="Enter CAC number">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label class="form-label">Tax Identification Number (TIN)</label>
                            <input type="text" class="form-control" placeholder="Enter TIN number">
                          </div>
                        </div>
                    </div>


                </div>
            </div>

              <div class="mt-3">
                <button type="button" class="btn btn-primary me-2">Save Changes</button>
                <button type="button" class="btn btn-light">Reset</button>
              </div>
          </div>

            <!-- Subscriptions -->
            <div class="tab-pane fade" id="subscriptions" role="tabpanel" aria-labelledby="subscriptions-tab">
              <div class="tab-pane-content card mb-4 p-3">
                <h4 class="mb-3" style="color:#007bff;font-weight:600;">Subscriptions</h4>
                  <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info d-flex align-items-center mb-4">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        <div>
                        <strong>Current Plan:</strong> Premium Plan - Valid until December 31, 2025
                    </div>
                  </div>
                  </div>
                  </div>
                
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead class="table-light">
                      <tr>
                        <th>Plan</th>
                        <th>Monthly</th>
                        <th>3 Months</th>
                        <th>6 Months</th>
                        <th>Annual</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="plan-details" style="display:none"><td colspan="5"></td></tr>
                      <tr class="plan-row" data-plan="basic-monthly|basic-3months|basic-6months|basic-annual">
                        <td><button class="btn btn-link plan-toggle" type="button">Basic</button></td>
                        <td>₦5,000</td>
                        <td>₦13,500 <span class="text-success">(Save 10%)</span></td>
                        <td>₦25,500 <span class="text-success">(Save 15%)</span></td>
                        <td>₦48,000 <span class="text-success">(Save 20%)</span></td>
                      </tr>
                      <tr class="plan-details" style="display:none"><td colspan="5"></td></tr>
                      <tr class="plan-row" data-plan="standard-monthly|standard-3months|standard-6months|standard-annual">
                        <td><button class="btn btn-link plan-toggle" type="button">Standard</button></td>
                        <td>₦10,000</td>
                        <td>₦27,000 <span class="text-success">(Save 10%)</span></td>
                        <td>₦51,000 <span class="text-success">(Save 15%)</span></td>
                        <td>₦96,000 <span class="text-success">(Save 20%)</span></td>
                      </tr>
                      <tr class="plan-details" style="display:none"><td colspan="5"></td></tr>
                      <tr class="plan-row" data-plan="premium-monthly|premium-3months|premium-6months|premium-annual">
                        <td><button class="btn btn-link plan-toggle" type="button">Premium</button></td>
                        <td>₦20,000</td>
                        <td>₦54,000 <span class="text-success">(Save 10%)</span></td>
                        <td>₦102,000 <span class="text-success">(Save 15%)</span></td>
                        <td>₦192,000 <span class="text-success">(Save 20%)</span></td>
                      </tr>
                      <tr class="plan-details" style="display:none"><td colspan="5"></td></tr>
                    </tbody>
                  </table>
                </div>

              </div>

            </div>
      
  <!-- Branches -->
  <div class="tab-pane fade" id="branches" role="tabpanel" aria-labelledby="branches-tab">
    <div class="card mb-4 p-3">
      <h4 class="mb-3" style="color:#007bff;font-weight:600;">Branches</h4>
      <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="mb-0">Branch Locations</h5>
      <div>
        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#switchBranchModal">
          <i class="bi bi-arrow-left-right"></i> Switch Branch
        </button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBranchModal">
          <i class="bi bi-plus"></i> Add Branch
        </button>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Branch Name</th>
            <th>Address</th>
            <th>Manager</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr data-branch-id="1" data-branch-name="Main Branch" data-branch-address="123 Business Street, City Center" data-branch-manager="Allen Moreno" data-branch-state="Lagos" data-branch-lga="Ikeja" data-branch-status="Active" data-is-current="true">
            <td>
              <strong>Main Branch</strong>
              <span class="badge bg-warning ms-2">CURRENT OFFICE</span>
            </td>
            <td>123 Business Street, City Center</td>
            <td>Allen Moreno</td>
            <td><span class="badge bg-success">Active</span></td>
            <td>
              <button class="btn btn-sm btn-outline-primary me-1 edit-branch-btn" title="Edit Branch"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-sm btn-outline-info view-branch-btn" title="View Details"><i class="bi bi-eye"></i></button>
            </td>
          </tr>
          <tr data-branch-id="2" data-branch-name="Downtown Branch" data-branch-address="456 Downtown Ave, Business District" data-branch-manager="Sarah Johnson" data-branch-state="Lagos" data-branch-lga="Victoria Island" data-branch-status="Active" data-is-current="false">
            <td><strong>Downtown Branch</strong></td>
            <td>456 Downtown Ave, Business District</td>
            <td>Sarah Johnson</td>
            <td><span class="badge bg-success">Active</span></td>
            <td>
              <button class="btn btn-sm btn-outline-primary me-1 edit-branch-btn" title="Edit Branch"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-sm btn-outline-info me-1 view-branch-btn" title="View Details"><i class="bi bi-eye"></i></button>
              <button class="btn btn-sm btn-outline-danger delete-branch-btn" title="Delete Branch"><i class="bi bi-trash"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
      </div>

      <!-- Edit Unit Modal -->
      <div class="modal fade" id="editUnitModal" tabindex="-1" aria-labelledby="editUnitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:520px;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUnitModalLabel">
                <i class="bi bi-pencil-square"></i> Edit Measurement Unit
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUnitForm">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="editUnitName" class="form-label required-field">Unit Name</label>
                  <input type="text" class="form-control" id="editUnitName" name="edit_unit_name" required>
                </div>
                <div class="mb-3">
                  <label for="editUnitAbbr" class="form-label required-field">Abbreviation</label>
                  <input type="text" class="form-control" id="editUnitAbbr" name="edit_unit_abbr" maxlength="10" required>
                </div>
                <div class="mb-3">
                  <label for="editUnitPrecision" class="form-label required-field">Precision</label>
                  <select class="form-select" id="editUnitPrecision" name="edit_unit_precision" required>
                    <option value="1">1 (Whole numbers)</option>
                    <option value="0.1">0.1 (One decimal place)</option>
                    <option value="0.01" selected>0.01 (Two decimal places)</option>
                    <option value="0.001">0.001 (Three decimal places)</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
 

  <!-- Staffs -->
  <div class="tab-pane fade" id="staffs" role="tabpanel" aria-labelledby="staffs-tab">
    <div class="card mb-4 p-3">
      <h4 class="mb-3" style="color:#007bff;font-weight:600;">Staff Management</h4>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">All Staff Members</h5>
        <!-- <button class="btn btn-primary" onclick="window.location.href='staffs.php'">
          <i class="bi bi-person-plus"></i> Add Staff
        </button> -->
      </div>
      
      <!-- Staff Statistics -->
      <div class="row mb-4">
        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h4 class="text-primary" id="totalStaffCount">3</h4>
              <p class="mb-0">Total Staff</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h4 class="text-success" id="activeStaffCount">3</h4>
              <p class="mb-0">Active</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h4 class="text-info" id="managerCount">1</h4>
              <p class="mb-0">Managers</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center">
            <div class="card-body">
              <h4 class="text-secondary" id="salesStaffCount">2</h4>
              <p class="mb-0">Sales Staff</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Staff List Table -->
      <div class="table-responsive">
        <table class="table table-hover" id="staffListTable">
          <thead>
            <tr>
              <th>Staff Member</th>
              <th>Username</th>
              <th>Role</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample Data - Replace with actual staff data -->
            <tr class="staff-row" data-staff-id="1" data-staff-name="Alice Johnson" data-staff-username="@ajohnson" data-staff-role="Manager" data-staff-email="alice.johnson@salespilot.com" data-staff-phone="+234 800 123 4567">
              <td>
                <div class="d-flex align-items-center">
                  <img src="../assets/images/faces/face1.jpg" alt="Profile" class="me-2" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                  <div>
                    <h6 class="mb-0">Alice Johnson</h6>
                  </div>
                </div>
              </td>
              <td><span class="text-muted">@ajohnson</span></td>
              <td><span class="badge bg-primary">Manager</span></td>
              <td>alice.johnson@salespilot.com</td>
              <td>+234 800 123 4567</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>
                <button class="btn btn-sm btn-outline-primary edit-staff-btn" title="Edit Settings & Permissions">
                  <i class="bi bi-pencil"></i> Edit
                </button>
              </td>
            </tr>
            <tr class="staff-row" data-staff-id="2" data-staff-name="Bob Smith" data-staff-username="@bsmith" data-staff-role="Sales Staff" data-staff-email="bob.smith@salespilot.com" data-staff-phone="+234 800 234 5678">
              <td>
                <div class="d-flex align-items-center">
                  <img src="../assets/images/faces/face2.jpg" alt="Profile" class="me-2" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                  <div>
                    <h6 class="mb-0">Bob Smith</h6>
                  </div>
                </div>
              </td>
              <td><span class="text-muted">@bsmith</span></td>
              <td><span class="badge bg-secondary">Sales Staff</span></td>
              <td>bob.smith@salespilot.com</td>
              <td>+234 800 234 5678</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>
                <button class="btn btn-sm btn-outline-primary edit-staff-btn" title="Edit Settings & Permissions">
                  <i class="bi bi-pencil"></i> Edit
                </button>
              </td>
            </tr>
            <tr class="staff-row" data-staff-id="3" data-staff-name="Carol Williams" data-staff-username="@cwilliams" data-staff-role="Sales Staff" data-staff-email="carol.williams@salespilot.com" data-staff-phone="+234 800 345 6789">
              <td>
                <div class="d-flex align-items-center">
                  <img src="../assets/images/faces/face3.jpg" alt="Profile" class="me-2" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                  <div>
                    <h6 class="mb-0">Carol Williams</h6>
                  </div>
                </div>
              </td>
              <td><span class="text-muted">@cwilliams</span></td>
              <td><span class="badge bg-secondary">Sales Staff</span></td>
              <td>carol.williams@salespilot.com</td>
              <td>+234 800 345 6789</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>
                <button class="btn btn-sm btn-outline-primary edit-staff-btn" title="Edit Settings & Permissions">
                  <i class="bi bi-pencil"></i> Edit
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
    
 
  

  <!-- Receipt Settings -->
  <div class="tab-pane fade" id="receipt" role="tabpanel" aria-labelledby="receipt-tab">
    <div class="card mb-4 p-3">
      <h4 class="mb-3" style="color:#007bff;font-weight:600;">Receipt Settings</h4>
      <div class="row">
        <!-- Left: Settings Form Container -->
        <div class="col-md-6" id="receiptSettingsContainer">
          <h5 class="mb-3">Receipt Header</h5>
          <div class="form-group mb-3">
            <label class="form-label">Receipt Title</label>
            <input type="text" class="form-control" id="receiptTitleInput" value="SALES RECEIPT" placeholder="Enter receipt title">
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Header Text</label>
            <textarea class="form-control" id="headerTextInput" rows="3" placeholder="Additional header information">Thank you for shopping with us!</textarea>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Footer Text</label>
            <textarea class="form-control" id="footerTextInput" rows="3" placeholder="Footer message">Visit us again soon!</textarea>
          </div>

          <h5 class="mb-3 mt-4">Receipt Format</h5>
          <div class="form-group mb-3">
            <label class="form-label">Paper Size</label>
            <select class="form-control" id="paperSizeSelect">
              <option value="80mm Thermal" selected>80mm Thermal</option>
              <option value="58mm Thermal">58mm Thermal</option>
              <option value="A4 Paper">A4 Paper</option>
              <option value="Letter Size">Letter Size</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Font Size</label>
            <select class="form-control" id="fontSizeSelect">
              <option>Small</option>
              <option selected>Medium</option>
              <option>Large</option>
            </select>
          </div>
          
          <h5 class="mb-3 mt-4">Receipt Information</h5>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="showInvoiceNumber" data-preview="receiptInvoiceNumberPreview" data-display="flex" checked>
            <label class="form-check-label" for="showInvoiceNumber">Show invoice number</label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="showDate" data-preview="receiptDatePreview" data-display="flex" checked>
            <label class="form-check-label" for="showDate">Show date</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="showCashier" data-preview="receiptCashierPreview" data-display="flex" checked>
            <label class="form-check-label" for="showCashier">Show cashier name</label>
          </div>
          
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="showLogo" data-preview="receiptLogoPreview" data-display="block" checked>
            <label class="form-check-label" for="showLogo">Show business logo on receipt</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="showBarcode" data-preview="receiptBarcodePreview,receiptBarcodeSeparator" data-display="block" checked>
            <label class="form-check-label" for="showBarcode">Include receipt barcode</label>
          </div>
          
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="showTaxDetails" data-preview="receiptTaxPreview" data-display="flex" checked>
            <label class="form-check-label" for="showTaxDetails">Show tax breakdown</label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="showItemCodes" data-preview="receiptSkuPreview" data-display="block" checked>
            <label class="form-check-label" for="showItemCodes">Show item codes/SKUs</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="showDiscounts" data-preview="receiptDiscountPreview" data-display="flex" checked>
            <label class="form-check-label" for="showDiscounts">Show discount details</label>
          </div>
          <button type="button" class="btn btn-primary mt-2">Save Receipt Settings</button>
          <span id="receiptSaveStatus" class="ms-3 text-success" style="display:none;font-weight:600;">Saved</span>
        </div>

        <!-- Right: Live Preview Container -->
        <div class="col-md-6" id="receiptPreviewContainer">
          <h5 class="mb-3 text-center">Live Receipt Preview</h5>
          <div id="receiptPreview" style="max-height: 550px; overflow:auto; display:flex; justify-content:center; align-items:flex-start; padding:12px;">
            <div id="receiptPreviewInner" class="border rounded p-3 bg-light" style="width:300px; max-width:100%; box-sizing:border-box;">
              <div class="text-center mb-2" id="receiptLogoPreview" style="display:block;">
              <small class="text-muted">[Business Logo]</small>
            </div>
            <h6 class="text-center mb-1" id="receiptTitlePreview">SALES RECEIPT</h6>
            <p class="text-center mb-2" id="headerTextPreview" style="white-space:pre-line;">Thank you for shopping with us!</p>
            <hr class="my-2">
            
            <!-- Invoice Information -->
            <div class="mb-2 small">
              <div class="d-flex justify-content-between" id="receiptInvoiceNumberPreview" style="display: flex;">
                <span class="fw-bold">Invoice #:</span>
                <span>INV-2025-001</span>
              </div>
              <div class="d-flex justify-content-between" id="receiptDatePreview" style="display: flex;">
                <span class="fw-bold">Date:</span>
                <span>Nov 22, 2025 10:30 AM</span>
              </div>
              <div class="d-flex justify-content-between" id="receiptCashierPreview" style="display: flex;">
                <span class="fw-bold">Cashier:</span>
                <span>John Doe</span>
              </div>
            </div>
            <hr class="my-2">
            
            <!-- Items -->
            <div class="mb-2">
              <div class="d-flex justify-content-between">
                <span>Item A</span>
                <span>₦5,000</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Item B</span>
                <span>₦3,000</span>
              </div>
              <div class="d-flex justify-content-between" id="receiptDiscountPreview" style="display: flex;">
                <span class="text-muted">Discount</span>
                <span class="text-muted">-₦500</span>
              </div>
              <div class="d-flex justify-content-between" id="receiptTaxPreview" style="display: flex;">
                <span class="text-muted">Tax (7.5%)</span>
                <span class="text-muted">₦562.50</span>
              </div>
              <hr class="my-2">
              <div class="d-flex justify-content-between fw-bold">
                <span>Total</span>
                <span>₦7,562.50</span>
              </div>
              <div id="receiptSkuPreview" class="mt-2 small text-muted" style="display: block;">
                <div>SKU-001, SKU-002</div>
              </div>
            </div>
            <hr class="my-2" id="receiptBarcodeSeparator">
            <div class="text-center" id="receiptBarcodePreview" style="display:block;">
              <small class="text-muted">[Barcode]</small>
            </div>
            <p class="text-center mt-3 mb-0" id="footerTextPreview" style="white-space:pre-line;">Visit us again soon!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Measurement Units -->
  <div class="tab-pane fade" id="measurement" role="tabpanel" aria-labelledby="measurement-tab">
    <div class="card mb-4 p-3">
      <h4 class="mb-3" style="color:#007bff;font-weight:600;">Measurement Units</h4>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Manage Units of Measurement</h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUnitModal">
          <i class="bi bi-plus"></i> Add Unit
        </button>
      </div>
      
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead class="table-light">
            <tr>
              <th style="width: 30%;">Unit Name</th>
              <th style="width: 15%;">Abbreviation</th>
              <th style="width: 15%;">Precision</th>
              <th style="width: 25%;">Type</th>
              <th style="width: 15%;" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr data-unit-type="Default">
              <td>Piece</td>
              <td><span class="badge bg-secondary">pcs</span></td>
              <td>1</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Carton</td>
              <td><span class="badge bg-secondary">ct</span></td>
              <td>1</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Per item</td>
              <td><span class="badge bg-secondary">pi</span></td>
              <td>1</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Kilogram</td>
              <td><span class="badge bg-secondary">kg</span></td>
              <td>0.01</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Gram</td>
              <td><span class="badge bg-secondary">g</span></td>
              <td>0.1</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Litre</td>
              <td><span class="badge bg-secondary">L</span></td>
              <td>0.01</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Metre</td>
              <td><span class="badge bg-secondary">m</span></td>
              <td>0.01</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Centimeter</td>
              <td><span class="badge bg-secondary">cm</span></td>
              <td>0.1</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Millimetre</td>
              <td><span class="badge bg-secondary">mm</span></td>
              <td>1</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr data-unit-type="Default">
              <td>Yard</td>
              <td><span class="badge bg-secondary">yd</span></td>
              <td>0.01</td>
              <td><span class="badge bg-primary">Default</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be edited" disabled><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary" title="Default units cannot be deleted" disabled><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div class="alert alert-info mt-3">
        <i class="bi bi-info-circle"></i> <strong>Note:</strong> Precision indicates the decimal places for quantity measurements. <strong>Default</strong> units are system-defined, while <strong>Custom</strong> units are user-created and can be modified or deleted.
      </div>
    </div>
  </div>

    </div> <!-- /.tab-content -->
    </div> <!-- /.col-md-9 -->
  </div> <!-- /.settings-row -->
</div> <!-- /.container -->

    <!-- Add Unit Modal -->
    <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:520px;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addUnitModalLabel">
              <i class="bi bi-plus-circle"></i> Add Measurement Unit
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="addUnitForm">
            <div class="modal-body">
              <div class="mb-3">
                <label for="unitName" class="form-label required-field">Unit Name</label>
                <input type="text" class="form-control" id="unitName" name="unit_name" placeholder="e.g., Ton, Box, Dozen" required>
                <small class="form-text text-muted">Full name of the measurement unit</small>
              </div>
              
              <div class="mb-3">
                <label for="unitAbbreviation" class="form-label required-field">Abbreviation</label>
                <input type="text" class="form-control" id="unitAbbreviation" name="unit_abbreviation" placeholder="e.g., t, bx, dz" maxlength="10" required>
                <small class="form-text text-muted">Short code for the unit (max 10 characters)</small>
              </div>
              
              <div class="mb-3">
                <label for="unitPrecision" class="form-label required-field">Precision</label>
                <select class="form-select" id="unitPrecision" name="unit_precision" required>
                  <option value="">Select precision</option>
                  <option value="1">1 (Whole numbers)</option>
                  <option value="0.1">0.1 (One decimal place)</option>
                  <option value="0.01" selected>0.01 (Two decimal places)</option>
                  <option value="0.001">0.001 (Three decimal places)</option>
                </select>
                <small class="form-text text-muted">Decimal places for quantity measurements</small>
              </div>
              
              <div class="mb-3">
                <label for="unitType" class="form-label">Type</label>
                <input type="text" class="form-control" id="unitType" name="unit_type" value="Custom" readonly>
                <small class="form-text text-muted">User-created units are marked as Custom</small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Cancel
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Add Unit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    

    <!-- Add Branch Modal - placed at end for proper z-index -->
    <div class="modal fade" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="max-width: 520px;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addBranchModalLabel">Add Branch</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="addBranchForm">
            <div class="modal-body">
              <div class="mb-3">
                <label for="branchName" class="form-label">Branch Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="branchName" name="branchName" placeholder="e.g. Main Branch" required>
              </div>
              <div class="mb-3">
                <label for="branchAddress" class="form-label">Address <span class="text-danger">*</span></label>
                <textarea class="form-control" id="branchAddress" name="branchAddress" rows="2" placeholder="Enter branch address" required></textarea>
              </div>
              <div class="mb-3">
                <label for="branchState" class="form-label">State <span class="text-danger">*</span></label>
                <select class="form-select" id="branchState" name="branchState" required>
                  <option value="">Select State</option>
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="Akwa Ibom">Akwa Ibom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="FCT">Federal Capital Territory</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nasarawa">Nasarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamfara</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="branchLGA" class="form-label">Local Government <span class="text-danger">*</span></label>
                <select class="form-select" id="branchLGA" name="branchLGA" required>
                  <option value="">Select State First</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save Branch</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      // Measurement units: add / edit / delete handling. Default units are protected.
      document.addEventListener('DOMContentLoaded', function() {
        const addUnitForm = document.getElementById('addUnitForm');
        const unitsTableBody = document.querySelector('#measurement table tbody');
        const editUnitModalEl = document.getElementById('editUnitModal');
        const editUnitModal = editUnitModalEl ? new bootstrap.Modal(editUnitModalEl) : null;
        let editingRow = null;

        function escapeHtml(str) {
          if (!str) return '';
          return String(str).replace(/[&<>"']/g, function(m) { return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]; });
        }

        if (addUnitForm && unitsTableBody) {
          addUnitForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('unitName').value.trim();
            const abbr = document.getElementById('unitAbbreviation').value.trim();
            const precision = document.getElementById('unitPrecision').value;
            if (!name || !abbr) { alert('Please fill Unit Name and Abbreviation'); return; }

            const tr = document.createElement('tr');
            tr.setAttribute('data-unit-type', 'Custom');
            tr.innerHTML = `
              <td>${escapeHtml(name)}</td>
              <td><span class="badge bg-secondary">${escapeHtml(abbr)}</span></td>
              <td>${escapeHtml(precision)}</td>
              <td><span class="badge bg-success">Custom</span></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-outline-primary edit-unit-btn" title="Edit Unit"><i class="bi bi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-outline-danger delete-unit-btn" title="Delete Unit"><i class="bi bi-trash"></i></button>
              </td>
            `;
            unitsTableBody.appendChild(tr);

            // Reset and close
            addUnitForm.reset();
            try { bootstrap.Modal.getInstance(document.getElementById('addUnitModal')).hide(); } catch(e){ }
          });
        }

        // Delegated handlers for edit/delete buttons in the units table
        if (unitsTableBody) {
          unitsTableBody.addEventListener('click', function(e) {
            const editBtn = e.target.closest('.edit-unit-btn');
            const delBtn = e.target.closest('.delete-unit-btn');
            if (editBtn) {
              const tr = editBtn.closest('tr');
              if (!tr) return;
              if (tr.getAttribute('data-unit-type') !== 'Custom') { alert('Default units cannot be edited.'); return; }
              editingRow = tr;
              // populate edit modal
              const name = tr.cells[0].innerText.trim();
              const abbrEl = tr.cells[1].querySelector('span');
              const abbr = abbrEl ? abbrEl.innerText.trim() : tr.cells[1].innerText.trim();
              const precision = tr.cells[2].innerText.trim();
              document.getElementById('editUnitName').value = name;
              document.getElementById('editUnitAbbr').value = abbr;
              document.getElementById('editUnitPrecision').value = precision;
              if (editUnitModal) editUnitModal.show();
            } else if (delBtn) {
              const tr = delBtn.closest('tr');
              if (!tr) return;
              if (tr.getAttribute('data-unit-type') !== 'Custom') { alert('Default units cannot be deleted.'); return; }
              if (confirm('Delete this custom unit?')) tr.remove();
            }
          });
        }

        // Edit unit form submit
        const editUnitForm = document.getElementById('editUnitForm');
        if (editUnitForm) {
          editUnitForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (!editingRow) return;
            const name = document.getElementById('editUnitName').value.trim();
            const abbr = document.getElementById('editUnitAbbr').value.trim();
            const precision = document.getElementById('editUnitPrecision').value;
            if (!name || !abbr) { alert('Please fill Unit Name and Abbreviation'); return; }
            editingRow.cells[0].innerText = name;
            editingRow.cells[1].innerHTML = '<span class="badge bg-secondary">'+ escapeHtml(abbr) +'</span>';
            editingRow.cells[2].innerText = precision;
            if (editUnitModal) editUnitModal.hide();
            editingRow = null;
          });
        }
      });
    </script>

    <!-- Edit Branch Modal -->
    <div class="modal fade" id="editBranchModal" tabindex="-1" aria-labelledby="editBranchModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="max-width: 520px;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editBranchModalLabel">Edit Branch</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editBranchForm">
            <input type="hidden" id="editBranchId" name="branchId">
            <div class="modal-body">
              <div class="mb-3">
                <label for="editBranchName" class="form-label">Branch Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="editBranchName" name="branchName" placeholder="e.g. Main Branch" required>
              </div>
              <div class="mb-3">
                <label for="editBranchAddress" class="form-label">Address <span class="text-danger">*</span></label>
                <textarea class="form-control" id="editBranchAddress" name="branchAddress" rows="2" placeholder="Enter branch address" required></textarea>
              </div>
              <div class="mb-3">
                <label for="editBranchState" class="form-label">State <span class="text-danger">*</span></label>
                <select class="form-select" id="editBranchState" name="branchState" required>
                  <option value="">Select State</option>
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="Akwa Ibom">Akwa Ibom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="FCT">Federal Capital Territory</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nasarawa">Nasarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamfara</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="editBranchLGA" class="form-label">Local Government <span class="text-danger">*</span></label>
                <select class="form-select" id="editBranchLGA" name="branchLGA" required>
                  <option value="">Select State First</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="editBranchManager" class="form-label">Branch Manager</label>
                <input type="text" class="form-control" id="editBranchManager" name="branchManager" placeholder="Manager name">
              </div>
              <div class="mb-3">
                <label for="editBranchStatus" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select" id="editBranchStatus" name="branchStatus" required>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Update Branch</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Switch Branch Modal -->
    <div class="modal fade" id="switchBranchModal" tabindex="-1" aria-labelledby="switchBranchModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="switchBranchModalLabel">
              <i class="bi bi-arrow-left-right me-2"></i>Switch Branch
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="text-muted mb-3">Select the branch you want to switch to:</p>
            <div class="list-group" id="branchListContainer">
              <!-- Branch items will be dynamically inserted here -->
              <button type="button" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-branch-id="1">
                <div>
                  <h6 class="mb-1">Main Branch</h6>
                  <small class="text-muted">123 Business Street, City Center</small>
                </div>
                <span class="badge bg-warning">CURRENT</span>
              </button>
              <button type="button" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-branch-id="2">
                <div>
                  <h6 class="mb-1">Downtown Branch</h6>
                  <small class="text-muted">456 Downtown Ave, Business District</small>
                </div>
                <i class="bi bi-chevron-right text-muted"></i>
              </button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Staff Settings Modal -->
    <div class="modal fade" id="editStaffModal" tabindex="-1" aria-labelledby="editStaffModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 600px; max-height: 90vh;">
        <div class="modal-content" style="max-height: 90vh;">
          <div class="modal-header bg-gradient text-white py-2" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <h6 class="modal-title mb-0" id="editStaffModalLabel">
              <i class="bi bi-person-gear me-2"></i>Edit Staff
            </h6>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editStaffForm" enctype="multipart/form-data">
            <div class="modal-body p-3" style="overflow-y: auto; max-height: calc(80vh - 110px);">
              <input type="hidden" id="editStaffId" name="staffId">
              
              <!-- Tabs Navigation -->
              <ul class="nav nav-pills nav-fill mb-3" id="staffEditTabs" role="tablist" style="font-size: 0.875rem;">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active py-2" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">
                    <i class="bi bi-person-vcard me-1"></i>Details
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link py-2" id="permissions-tab" data-bs-toggle="tab" data-bs-target="#permissions" type="button" role="tab">
                    <i class="bi bi-shield-check me-1"></i>Permissions
                  </button>
                </li>
              </ul>

              <!-- Tab Content -->
              <div class="tab-content" id="staffEditTabsContent">
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="details" role="tabpanel">
                  <!-- Profile Picture -->
                  <div class="text-center mb-3">
                    <div class="position-relative d-inline-block">
                      <img id="staffProfilePreview" src="../assets/images/faces/face1.jpg" alt="Staff Photo" 
                           class="rounded-circle border border-2 border-primary" style="width: 90px; height: 90px; object-fit: cover;">
                      <label for="staffProfilePicture" class="position-absolute bottom-0 end-0 btn btn-sm btn-primary rounded-circle p-0" 
                             style="width: 28px; height: 28px; cursor: pointer;">
                        <i class="bi bi-camera" style="font-size: 0.75rem;"></i>
                      </label>
                    </div>
                    <input type="file" id="staffProfilePicture" name="profilePicture" accept="image/*" class="d-none">
                    <p class="text-muted small mt-1 mb-0" style="font-size: 0.75rem;">Click to change photo</p>
                  </div>

                  <!-- Staff Name -->
                  <div class="row mb-2">
                    <div class="col-6">
                      <label for="staffFirstName" class="form-label small mb-1">
                        <i class="bi bi-person me-1"></i>First Name <span class="text-danger">*</span>
                      </label>
                      <input type="text" class="form-control form-control-sm" id="staffFirstName" name="firstName" required>
                    </div>
                    <div class="col-6">
                      <label for="staffLastName" class="form-label small mb-1">
                        Last Name <span class="text-danger">*</span>
                      </label>
                      <input type="text" class="form-control form-control-sm" id="staffLastName" name="lastName" required>
                    </div>
                  </div>

                  <!-- Username -->
                  <div class="row mb-2">
                    <div class="col-12">
                      <label for="staffUsername" class="form-label small mb-1">
                        <i class="bi bi-at me-1"></i>Username
                      </label>
                      <input type="text" class="form-control form-control-sm" id="staffUsername" name="username" placeholder="@username">
                    </div>
                  </div>

                  <!-- Email & Phone -->
                  <div class="row mb-2">
                    <div class="col-12">
                      <label for="staffEmail" class="form-label small mb-1">
                        <i class="bi bi-envelope me-1"></i>Email <span class="text-danger">*</span>
                      </label>
                      <input type="email" class="form-control form-control-sm" id="staffEmail" name="email" required>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <div class="col-12">
                      <label for="staffPhone" class="form-label small mb-1">
                        <i class="bi bi-telephone me-1"></i>Phone <span class="text-danger">*</span>
                      </label>
                      <input type="tel" class="form-control form-control-sm" id="staffPhone" name="phone" required>
                    </div>
                  </div>

                  <!-- Password Section -->
                  <div class="border rounded p-2 bg-light">
                    <h6 class="small fw-semibold mb-2">
                      <i class="bi bi-lock me-1"></i>Change Password
                    </h6>
                    <p class="text-muted mb-2" style="font-size: 0.75rem;">Leave blank to keep current</p>
                    
                    <div class="mb-2">
                      <label for="staffNewPassword" class="form-label small mb-1">New Password</label>
                      <div class="input-group input-group-sm">
                        <input type="password" class="form-control" id="staffNewPassword" name="newPassword" minlength="6">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                          <i class="bi bi-eye" style="font-size: 0.875rem;"></i>
                        </button>
                      </div>
                    </div>
                    <div class="mb-0">
                      <label for="staffConfirmPassword" class="form-label small mb-1">Confirm</label>
                      <div class="input-group input-group-sm">
                        <input type="password" class="form-control form-control-sm" id="staffConfirmPassword" name="confirmPassword" minlength="6">
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                          <i class="bi bi-eye" style="font-size: 0.875rem;"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Permissions & Role Tab -->
                <div class="tab-pane fade" id="permissions" role="tabpanel">
                  <!-- Staff Info Card -->
                  <div class="card mb-3" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); border: none;">
                    <div class="card-body p-2">
                      <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-white p-1 me-2">
                          <i class="bi bi-person-circle text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                          <h6 class="mb-0 small fw-bold" id="modalStaffName">Staff Name</h6>
                          <span class="badge bg-primary" style="font-size: 0.7rem;" id="modalStaffRole">Role</span>
                          <div class="text-muted" style="font-size: 0.7rem;" id="modalStaffContact">email@example.com</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Role Selection -->
                  <div class="mb-2">
                    <label for="staffRole" class="form-label small mb-1">
                      <i class="bi bi-person-badge me-1"></i>Role
                    </label>
                    <select class="form-select form-select-sm" id="staffRole" name="staffRole">
                      <option value="Manager">Manager</option>
                      <option value="Sales Staff">Sales Staff</option>
                    </select>
                  </div>

                  <!-- Permissions Section -->
                  <div class="mb-2">
                    <label class="form-label small mb-2">
                      <i class="bi bi-shield-check me-1"></i>Permissions
                    </label>
                    
                    <div class="row g-2">
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="permSales" name="permissions[]" value="sales" checked>
                          <label class="form-check-label" style="font-size: 0.8rem;" for="permSales">
                            <i class="bi bi-cart-check text-primary"></i> Sales
                          </label>
                        </div>
                      </div>
                      
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="permDiscount" name="permissions[]" value="discount">
                          <label class="form-check-label" style="font-size: 0.8rem;" for="permDiscount">
                            <i class="bi bi-percent text-success"></i> Discounts
                          </label>
                        </div>
                      </div>
                      
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="permRefunds" name="permissions[]" value="refunds">
                          <label class="form-check-label" style="font-size: 0.8rem;" for="permRefunds">
                            <i class="bi bi-arrow-return-left text-warning"></i> Refunds
                          </label>
                        </div>
                      </div>
                      
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="permInventory" name="permissions[]" value="inventory">
                          <label class="form-check-label" style="font-size: 0.8rem;" for="permInventory">
                            <i class="bi bi-box-seam text-info"></i> Inventory
                          </label>
                        </div>
                      </div>
                      
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="permReports" name="permissions[]" value="reports">
                          <label class="form-check-label" style="font-size: 0.8rem;" for="permReports">
                            <i class="bi bi-graph-up text-secondary"></i> Reports
                          </label>
                        </div>
                      </div>
                      
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="permSettings" name="permissions[]" value="settings">
                          <label class="form-check-label" style="font-size: 0.8rem;" for="permSettings">
                            <i class="bi bi-gear text-danger"></i> Settings
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Account Status -->
                  <div class="mb-0">
                    <label for="staffStatus" class="form-label small mb-1">
                      <i class="bi bi-toggle-on me-1"></i>Status
                    </label>
                    <select class="form-select form-select-sm" id="staffStatus" name="staffStatus">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                      <option value="Suspended">Suspended</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer bg-light py-1" style="border-top: 1px solid #e9ecef;">
              <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">
                <i class="bi bi-x-circle me-1"></i>Cancel
              </button>
              <button type="submit" class="btn btn-sm btn-primary">
                <i class="bi bi-check-circle me-1"></i>Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      // State and LGA mapping for Nigeria (36 states + FCT)
      const stateLGAs = {
        'Abia': ['Aba North', 'Aba South', 'Arochukwu', 'Bende', 'Ikwuano', 'Isiala Ngwa North', 'Isiala Ngwa South', 'Isuikwuato', 'Obi Ngwa', 'Ohafia', 'Osisioma', 'Ugwunagbo', 'Ukwa East', 'Ukwa West', 'Umuahia North', 'Umuahia South', 'Umu Nneochi'],
        'Adamawa': ['Demsa', 'Fufore', 'Ganye', 'Gayuk', 'Gombi', 'Grie', 'Hong', 'Jada', 'Lamurde', 'Madagali', 'Maiha', 'Mayo Belwa', 'Michika', 'Mubi North', 'Mubi South', 'Numan', 'Shelleng', 'Song', 'Toungo', 'Yola North', 'Yola South'],
        'Akwa Ibom': ['Abak', 'Eastern Obolo', 'Eket', 'Esit Eket', 'Essien Udim', 'Etim Ekpo', 'Etinan', 'Ibeno', 'Ibesikpo Asutan', 'Ibiono Ibom', 'Ikot Abasi', 'Ikot Ekpene', 'Ini', 'Itu', 'Mbo', 'Mkpat Enin', 'Nsit Atai', 'Nsit Ibom', 'Nsit Ubium', 'Obot Akara', 'Okobo', 'Onna', 'Oron', 'Oruk Anam', 'Ukanafun', 'Udung Uko', 'Uruan', 'Urue-Offong/Oruko', 'Uyo'],
        'Anambra': ['Aguata', 'Anambra East', 'Anambra West', 'Anaocha', 'Awka North', 'Awka South', 'Ayamelum', 'Dunukofia', 'Ekwusigo', 'Idemili North', 'Idemili South', 'Ihiala', 'Njikoka', 'Nnewi North', 'Nnewi South', 'Ogbaru', 'Onitsha North', 'Onitsha South', 'Orumba North', 'Orumba South', 'Oyi'],
        'Bauchi': ['Alkaleri', 'Bauchi', 'Bogoro', 'Damban', 'Darazo', 'Dass', 'Gamawa', 'Ganjuwa', 'Giade', 'Itas/Gadau', 'Jama\'are', 'Katagum', 'Kirfi', 'Misau', 'Ningi', 'Shira', 'Tafawa Balewa', 'Toro', 'Warji', 'Zaki'],
        'Bayelsa': ['Brass', 'Ekeremor', 'Kolokuma/Opokuma', 'Nembe', 'Ogbia', 'Sagbama', 'Southern Ijaw', 'Yenagoa'],
        'Benue': ['Ado', 'Agatu', 'Apa', 'Buruku', 'Gboko', 'Guma', 'Gwer East', 'Gwer West', 'Katsina-Ala', 'Konshisha', 'Kwande', 'Logo', 'Makurdi', 'Obi', 'Ogbadibo', 'Oju', 'Okpokwu', 'Ohimini', 'Oturkpo', 'Tarka', 'Ukum', 'Ushongo', 'Vandeikya'],
        'Borno': ['Abadam', 'Askira/Uba', 'Bama', 'Bayo', 'Biu', 'Chibok', 'Damboa', 'Dikwa', 'Gubio', 'Guzamala', 'Gwoza', 'Hawul', 'Jere', 'Kaga', 'Kala/Balge', 'Konduga', 'Kukawa', 'Kwaya Kusar', 'Mafa', 'Magumeri', 'Maiduguri', 'Marte', 'Mobbar', 'Monguno', 'Ngala', 'Nganzai', 'Shani'],
        'Cross River': ['Abi', 'Akamkpa', 'Akpabuyo', 'Bakassi', 'Bekwarra', 'Biase', 'Boki', 'Calabar Municipal', 'Calabar South', 'Etung', 'Ikom', 'Obanliku', 'Obubra', 'Obudu', 'Odukpani', 'Ogoja', 'Yakurr', 'Yala'],
        'Delta': ['Aniocha North', 'Aniocha South', 'Bomadi', 'Burutu', 'Ethiope East', 'Ethiope West', 'Ika North East', 'Ika South', 'Isoko North', 'Isoko South', 'Ndokwa East', 'Ndokwa West', 'Okpe', 'Oshimili North', 'Oshimili South', 'Patani', 'Sapele', 'Udu', 'Ughelli North', 'Ughelli South', 'Ukwuani', 'Uvwie', 'Warri North', 'Warri South', 'Warri South West'],
        'Ebonyi': ['Abakaliki', 'Afikpo North', 'Afikpo South', 'Ebonyi', 'Ezza North', 'Ezza South', 'Ikwo', 'Ishielu', 'Ivo', 'Izzi', 'Ohaozara', 'Ohaukwu', 'Onicha'],
        'Edo': ['Akoko-Edo', 'Egor', 'Esan Central', 'Esan North-East', 'Esan South-East', 'Esan West', 'Etsako Central', 'Etsako East', 'Etsako West', 'Igueben', 'Ikpoba-Okha', 'Orhionmwon', 'Oredo', 'Ovia North-East', 'Ovia South-West', 'Owan East', 'Owan West', 'Uhunmwonde'],
        'Ekiti': ['Ado Ekiti', 'Efon', 'Ekiti East', 'Ekiti South-West', 'Ekiti West', 'Emure', 'Gbonyin', 'Ido Osi', 'Ijero', 'Ikere', 'Ikole', 'Ilejemeje', 'Irepodun/Ifelodun', 'Ise/Orun', 'Moba', 'Oye'],
        'Enugu': ['Aninri', 'Awgu', 'Enugu East', 'Enugu North', 'Enugu South', 'Ezeagu', 'Igbo Etiti', 'Igbo Eze North', 'Igbo Eze South', 'Isi Uzo', 'Nkanu East', 'Nkanu West', 'Nsukka', 'Oji River', 'Udenu', 'Udi', 'Uzo Uwani'],
        'FCT': ['Abaji', 'Bwari', 'Gwagwalada', 'Kuje', 'Kwali', 'Municipal Area Council'],
        'Gombe': ['Akko', 'Balanga', 'Billiri', 'Dukku', 'Funakaye', 'Gombe', 'Kaltungo', 'Kwami', 'Nafada', 'Shongom', 'Yamaltu/Deba'],
        'Imo': ['Aboh Mbaise', 'Ahiazu Mbaise', 'Ehime Mbano', 'Ezinihitte', 'Ideato North', 'Ideato South', 'Ihitte/Uboma', 'Ikeduru', 'Isiala Mbano', 'Isu', 'Mbaitoli', 'Ngor Okpala', 'Njaba', 'Nkwerre', 'Nwangele', 'Obowo', 'Oguta', 'Ohaji/Egbema', 'Okigwe', 'Onuimo', 'Orlu', 'Orsu', 'Oru East', 'Oru West', 'Owerri Municipal', 'Owerri North', 'Owerri West'],
        'Jigawa': ['Auyo', 'Babura', 'Biriniwa', 'Birnin Kudu', 'Buji', 'Dutse', 'Gagarawa', 'Garki', 'Gumel', 'Guri', 'Gwaram', 'Gwiwa', 'Hadejia', 'Jahun', 'Kafin Hausa', 'Kaugama', 'Kazaure', 'Kiri Kasama', 'Kiyawa', 'Maigatari', 'Malam Madori', 'Miga', 'Ringim', 'Roni', 'Sule Tankarkar', 'Taura', 'Yankwashi'],
        'Kaduna': ['Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara', 'Jaba', 'Jema\'a', 'Kachia', 'Kaduna North', 'Kaduna South', 'Kagarko', 'Kajuru', 'Kaura', 'Kauru', 'Kubau', 'Kudan', 'Lere', 'Makarfi', 'Sabon Gari', 'Sanga', 'Soba', 'Zangon Kataf', 'Zaria'],
        'Kano': ['Ajingi', 'Albasu', 'Bagwai', 'Bebeji', 'Bichi', 'Bunkure', 'Dala', 'Dambatta', 'Dawakin Kudu', 'Dawakin Tofa', 'Doguwa', 'Fagge', 'Gabasawa', 'Garko', 'Garun Mallam', 'Gaya', 'Gezawa', 'Gwale', 'Gwarzo', 'Kabo', 'Kano Municipal', 'Karaye', 'Kibiya', 'Kiru', 'Kumbotso', 'Kunchi', 'Kura', 'Madobi', 'Makoda', 'Minjibir', 'Nasarawa', 'Rano', 'Rimin Gado', 'Rogo', 'Shanono', 'Sumaila', 'Takai', 'Tarauni', 'Tofa', 'Tsanyawa', 'Tudun Wada', 'Ungogo', 'Warawa', 'Wudil'],
        'Katsina': ['Bakori', 'Batagarawa', 'Batsari', 'Baure', 'Bindawa', 'Charanchi', 'Dandume', 'Danja', 'Dan Musa', 'Daura', 'Dutsi', 'Dutsin Ma', 'Faskari', 'Funtua', 'Ingawa', 'Jibia', 'Kafur', 'Kaita', 'Kankara', 'Kankia', 'Katsina', 'Kurfi', 'Kusada', 'Mai Adua', 'Malumfashi', 'Mani', 'Mashi', 'Matazu', 'Musawa', 'Rimi', 'Sabuwa', 'Safana', 'Sandamu', 'Zango'],
        'Kebbi': ['Aleiro', 'Arewa Dandi', 'Argungu', 'Augie', 'Bagudo', 'Birnin Kebbi', 'Bunza', 'Dandi', 'Fakai', 'Gwandu', 'Jega', 'Kalgo', 'Koko/Besse', 'Maiyama', 'Ngaski', 'Sakaba', 'Shanga', 'Suru', 'Wasagu/Danko', 'Yauri', 'Zuru'],
        'Kogi': ['Adavi', 'Ajaokuta', 'Ankpa', 'Bassa', 'Dekina', 'Ibaji', 'Idah', 'Igalamela Odolu', 'Ijumu', 'Kabba/Bunu', 'Kogi', 'Lokoja', 'Mopa Muro', 'Ofu', 'Ogori/Magongo', 'Okehi', 'Okene', 'Olamaboro', 'Omala', 'Yagba East', 'Yagba West'],
        'Kwara': ['Asa', 'Baruten', 'Edu', 'Ekiti', 'Ifelodun', 'Ilorin East', 'Ilorin South', 'Ilorin West', 'Irepodun', 'Isin', 'Kaiama', 'Moro', 'Offa', 'Oke Ero', 'Oyun', 'Pategi'],
        'Lagos': ['Agege', 'Ajeromi-Ifelodun', 'Alimosho', 'Amuwo-Odofin', 'Apapa', 'Badagry', 'Epe', 'Eti Osa', 'Ibeju-Lekki', 'Ifako-Ijaiye', 'Ikeja', 'Ikorodu', 'Kosofe', 'Lagos Island', 'Lagos Mainland', 'Mushin', 'Ojo', 'Oshodi-Isolo', 'Shomolu', 'Surulere'],
        'Nasarawa': ['Akwanga', 'Awe', 'Doma', 'Karu', 'Keana', 'Keffi', 'Kokona', 'Lafia', 'Nasarawa', 'Nasarawa Egon', 'Obi', 'Toto', 'Wamba'],
        'Niger': ['Agaie', 'Agwara', 'Bida', 'Borgu', 'Bosso', 'Chanchaga', 'Edati', 'Gbako', 'Gurara', 'Katcha', 'Kontagora', 'Lapai', 'Lavun', 'Magama', 'Mariga', 'Mashegu', 'Mokwa', 'Muya', 'Paikoro', 'Rafi', 'Rijau', 'Shiroro', 'Suleja', 'Tafa', 'Wushishi'],
        'Ogun': ['Abeokuta North', 'Abeokuta South', 'Ado-Odo/Ota', 'Egbado North', 'Egbado South', 'Ewekoro', 'Ifo', 'Ijebu East', 'Ijebu North', 'Ijebu North East', 'Ijebu Ode', 'Ikenne', 'Imeko Afon', 'Ipokia', 'Obafemi Owode', 'Odeda', 'Odogbolu', 'Ogun Waterside', 'Remo North', 'Shagamu'],
        'Ondo': ['Akoko North-East', 'Akoko North-West', 'Akoko South-West', 'Akoko South-East', 'Akure North', 'Akure South', 'Ese Odo', 'Idanre', 'Ifedore', 'Ilaje', 'Ile Oluji/Okeigbo', 'Irele', 'Odigbo', 'Okitipupa', 'Ondo East', 'Ondo West', 'Ose', 'Owo'],
        'Osun': ['Atakunmosa East', 'Atakunmosa West', 'Aiyedaade', 'Aiyedire', 'Boluwaduro', 'Boripe', 'Ede North', 'Ede South', 'Ife Central', 'Ife East', 'Ife North', 'Ife South', 'Egbedore', 'Ejigbo', 'Ifedayo', 'Ifelodun', 'Ila', 'Ilesa East', 'Ilesa West', 'Irepodun', 'Irewole', 'Isokan', 'Iwo', 'Obokun', 'Odo Otin', 'Ola Oluwa', 'Olorunda', 'Oriade', 'Orolu', 'Osogbo'],
        'Oyo': ['Afijio', 'Akinyele', 'Atiba', 'Atisbo', 'Egbeda', 'Ibadan North', 'Ibadan North-East', 'Ibadan North-West', 'Ibadan South-East', 'Ibadan South-West', 'Ibarapa Central', 'Ibarapa East', 'Ibarapa North', 'Ido', 'Irepo', 'Iseyin', 'Itesiwaju', 'Iwajowa', 'Kajola', 'Lagelu', 'Ogbomosho North', 'Ogbomosho South', 'Ogo Oluwa', 'Olorunsogo', 'Oluyole', 'Ona Ara', 'Orelope', 'Ori Ire', 'Oyo East', 'Oyo West', 'Saki East', 'Saki West', 'Surulere'],
        'Plateau': ['Bokkos', 'Barkin Ladi', 'Bassa', 'Jos East', 'Jos North', 'Jos South', 'Kanam', 'Kanke', 'Langtang North', 'Langtang South', 'Mangu', 'Mikang', 'Pankshin', 'Qua\'an Pan', 'Riyom', 'Shendam', 'Wase'],
        'Rivers': ['Abua/Odual', 'Ahoada East', 'Ahoada West', 'Akuku-Toru', 'Andoni', 'Asari-Toru', 'Bonny', 'Degema', 'Eleme', 'Emohua', 'Etche', 'Gokana', 'Ikwerre', 'Khana', 'Obio/Akpor', 'Ogba/Egbema/Ndoni', 'Ogu/Bolo', 'Okrika', 'Omuma', 'Opobo/Nkoro', 'Oyigbo', 'Port Harcourt', 'Tai'],
        'Sokoto': ['Binji', 'Bodinga', 'Dange Shuni', 'Gada', 'Goronyo', 'Gudu', 'Gwadabawa', 'Illela', 'Isa', 'Kebbe', 'Kware', 'Rabah', 'Sabon Birni', 'Shagari', 'Silame', 'Sokoto North', 'Sokoto South', 'Tambuwal', 'Tangaza', 'Tureta', 'Wamako', 'Wurno', 'Yabo'],
        'Taraba': ['Ardo Kola', 'Bali', 'Donga', 'Gashaka', 'Gassol', 'Ibi', 'Jalingo', 'Karim Lamido', 'Kumi', 'Lau', 'Sardauna', 'Takum', 'Ussa', 'Wukari', 'Yorro', 'Zing'],
        'Yobe': ['Bade', 'Bursari', 'Damaturu', 'Fika', 'Fune', 'Geidam', 'Gujba', 'Gulani', 'Jakusko', 'Karasuwa', 'Machina', 'Nangere', 'Nguru', 'Potiskum', 'Tarmuwa', 'Yunusari', 'Yusufari'],
        'Zamfara': ['Anka', 'Bakura', 'Bukkuyum', 'Bungudu', 'Gummi', 'Gusau', 'Kaura Namoda', 'Maradun', 'Maru', 'Shinkafi', 'Talata Mafara', 'Chafe', 'Zurmi']
      };

      // Populate LGA dropdown based on selected state
      document.addEventListener('DOMContentLoaded', function () {
        const stateSelect = document.getElementById('branchState');
        const lgaSelect = document.getElementById('branchLGA');
        
        if (stateSelect && lgaSelect) {
          stateSelect.addEventListener('change', function() {
            const selectedState = this.value;
            lgaSelect.innerHTML = '<option value="">Select Local Government</option>';
            
            if (selectedState && stateLGAs[selectedState]) {
              stateLGAs[selectedState].forEach(function(lga) {
                const option = document.createElement('option');
                option.value = lga;
                option.textContent = lga;
                lgaSelect.appendChild(option);
              });
              lgaSelect.disabled = false;
            } else {
              lgaSelect.innerHTML = '<option value="">Select State First</option>';
              lgaSelect.disabled = true;
            }
          });
        }

        // Populate LGA dropdown for Edit Branch modal
        const editStateSelect = document.getElementById('editBranchState');
        const editLgaSelect = document.getElementById('editBranchLGA');
        
        if (editStateSelect && editLgaSelect) {
          editStateSelect.addEventListener('change', function() {
            const selectedState = this.value;
            editLgaSelect.innerHTML = '<option value="">Select Local Government</option>';
            
            if (selectedState && stateLGAs[selectedState]) {
              stateLGAs[selectedState].forEach(function(lga) {
                const option = document.createElement('option');
                option.value = lga;
                option.textContent = lga;
                editLgaSelect.appendChild(option);
              });
              editLgaSelect.disabled = false;
            } else {
              editLgaSelect.innerHTML = '<option value="">Select State First</option>';
              editLgaSelect.disabled = true;
            }
          });
        }

        // Add Branch form submission
        var addBranchForm = document.getElementById('addBranchForm');
        if (addBranchForm) {
          addBranchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            
            // Get form data
            var formData = new FormData(addBranchForm);
            
            // Placeholder: replace with real save logic / AJAX
            // Example AJAX call:
            // fetch('../components/add_branch.php', {
            //   method: 'POST',
            //   body: formData
            // }).then(response => response.json())
            //   .then(data => {
            //     if (data.success) {
            //       alert('Branch saved successfully.');
            //       bootstrap.Modal.getInstance(document.getElementById('addBranchModal')).hide();
            //       addBranchForm.reset();
            //       // Optionally reload or update the branch table
            //     }
            //   });
            
            // For now, just show success message
            var modal = bootstrap.Modal.getInstance(document.getElementById('addBranchModal'));
            if (modal) modal.hide();
            alert('Branch saved successfully.');
            addBranchForm.reset();
          });
        }

        // Edit Branch - Handle Edit Button Clicks
        const editBranchButtons = document.querySelectorAll('.edit-branch-btn');
        const editBranchModal = new bootstrap.Modal(document.getElementById('editBranchModal'));
        
        editBranchButtons.forEach(function(button) {
          button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Get branch data from the row
            const row = this.closest('tr');
            const branchId = row.getAttribute('data-branch-id');
            const branchName = row.getAttribute('data-branch-name');
            const branchAddress = row.getAttribute('data-branch-address');
            const branchManager = row.getAttribute('data-branch-manager');
            const branchState = row.getAttribute('data-branch-state');
            const branchLGA = row.getAttribute('data-branch-lga');
            const branchStatus = row.getAttribute('data-branch-status');
            
            // Populate the edit form
            document.getElementById('editBranchId').value = branchId;
            document.getElementById('editBranchName').value = branchName;
            document.getElementById('editBranchAddress').value = branchAddress;
            document.getElementById('editBranchManager').value = branchManager;
            document.getElementById('editBranchState').value = branchState;
            document.getElementById('editBranchStatus').value = branchStatus;
            
            // Trigger LGA population if state is selected
            if (branchState) {
              const stateChangeEvent = new Event('change');
              document.getElementById('editBranchState').dispatchEvent(stateChangeEvent);
              
              // Wait for LGAs to populate, then set the value
              setTimeout(function() {
                document.getElementById('editBranchLGA').value = branchLGA;
              }, 100);
            }
            
            // Show the modal
            editBranchModal.show();
          });
        });

        // Edit Branch form submission
        const editBranchForm = document.getElementById('editBranchForm');
        if (editBranchForm) {
          editBranchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(editBranchForm);
            const branchId = document.getElementById('editBranchId').value;
            
            // Placeholder: replace with real update logic / AJAX
            // Example AJAX call:
            // fetch('../components/update_branch.php', {
            //   method: 'POST',
            //   body: formData
            // }).then(response => response.json())
            //   .then(data => {
            //     if (data.success) {
            //       alert('Branch updated successfully.');
            //       editBranchModal.hide();
            //       // Optionally reload or update the branch table
            //       location.reload();
            //     }
            //   });
            
            // For now, just show success message
            alert('Branch updated successfully.');
            editBranchModal.hide();
            // In production, you would reload the page or update the table row
            // location.reload();
          });
        }

        // Delete Branch - Handle Delete Button Clicks
        const deleteBranchButtons = document.querySelectorAll('.delete-branch-btn');
        
        deleteBranchButtons.forEach(function(button) {
          button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Get branch data from the row
            const row = this.closest('tr');
            const branchId = row.getAttribute('data-branch-id');
            const branchName = row.getAttribute('data-branch-name');
            const isCurrent = row.getAttribute('data-is-current') === 'true';
            
            // Prevent deletion of current branch
            if (isCurrent) {
              alert('Cannot delete the current office branch.');
              return;
            }
            
            // Confirm deletion
            if (confirm('Are you sure you want to delete "' + branchName + '"? This action cannot be undone.')) {
              // Placeholder: replace with real delete logic / AJAX
              // Example AJAX call:
              // fetch('../components/delete_branch.php', {
              //   method: 'POST',
              //   headers: { 'Content-Type': 'application/json' },
              //   body: JSON.stringify({ branchId: branchId })
              // }).then(response => response.json())
              //   .then(data => {
              //     if (data.success) {
              //       alert('Branch deleted successfully.');
              //       row.remove();
              //     }
              //   });
              
              // For now, just show success message and remove row
              alert('Branch deleted successfully.');
              row.remove();
            }
          });
        });

        // View Branch - Handle View Button Clicks
        const viewBranchButtons = document.querySelectorAll('.view-branch-btn');
        
        viewBranchButtons.forEach(function(button) {
          button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Get branch data from the row
            const row = this.closest('tr');
            const branchName = row.getAttribute('data-branch-name');
            const branchAddress = row.getAttribute('data-branch-address');
            const branchManager = row.getAttribute('data-branch-manager');
            const branchState = row.getAttribute('data-branch-state');
            const branchLGA = row.getAttribute('data-branch-lga');
            const branchStatus = row.getAttribute('data-branch-status');
            
            // Display branch details
            const details = `Branch Details:\n\nName: ${branchName}\nAddress: ${branchAddress}\nState: ${branchState}\nLGA: ${branchLGA}\nManager: ${branchManager}\nStatus: ${branchStatus}`;
            alert(details);
            
            // In production, you might want to show this in a modal instead
          });
        });

        // Switch Branch - Handle Branch Selection
        const branchListItems = document.querySelectorAll('#branchListContainer .list-group-item');
        
        branchListItems.forEach(function(item) {
          item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Check if this is the current branch
            const badge = this.querySelector('.badge');
            if (badge && badge.textContent === 'CURRENT') {
              return; // Already on this branch
            }
            
            const branchId = this.getAttribute('data-branch-id');
            const branchName = this.querySelector('h6').textContent;
            
            // Confirm branch switch
            if (confirm('Switch to "' + branchName + '"?\n\nYou will be redirected to this branch and all operations will be performed under this branch context.')) {
              // Placeholder: replace with real switch logic / AJAX
              // Example AJAX call:
              // fetch('../components/switch_branch.php', {
              //   method: 'POST',
              //   headers: { 'Content-Type': 'application/json' },
              //   body: JSON.stringify({ branchId: branchId })
              // }).then(response => response.json())
              //   .then(data => {
              //     if (data.success) {
              //       alert('Branch switched successfully.');
              //       location.reload();
              //     }
              //   });
              
              // For now, just show success message and reload
              alert('Branch switched to "' + branchName + '" successfully.');
              location.reload();
            }
          });
        });

        // Staff Settings - Handle Edit Button Clicks
        const editStaffButtons = document.querySelectorAll('.edit-staff-btn');
        const editStaffModal = new bootstrap.Modal(document.getElementById('editStaffModal'));
        
        editStaffButtons.forEach(function(button) {
          button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Get staff data from the row
            const row = this.closest('tr');
            const staffId = row.getAttribute('data-staff-id');
            const staffName = row.getAttribute('data-staff-name');
            const staffUsername = row.getAttribute('data-staff-username');
            const staffRole = row.getAttribute('data-staff-role');
            const staffEmail = row.getAttribute('data-staff-email');
            const staffPhone = row.getAttribute('data-staff-phone');
            
            // Split name into first and last name
            const nameParts = staffName.split(' ');
            const firstName = nameParts[0] || '';
            const lastName = nameParts.slice(1).join(' ') || '';
            
            // Populate modal with staff data - Personal Details Tab
            document.getElementById('editStaffId').value = staffId;
            document.getElementById('staffFirstName').value = firstName;
            document.getElementById('staffLastName').value = lastName;
            // Populate username field
            var usernameInput = document.getElementById('staffUsername');
            if (usernameInput) usernameInput.value = staffUsername || '';
            document.getElementById('staffEmail').value = staffEmail;
            document.getElementById('staffPhone').value = staffPhone;
            
            // Clear password fields
            document.getElementById('staffNewPassword').value = '';
            document.getElementById('staffConfirmPassword').value = '';
            
            // Populate Permissions Tab Info
            document.getElementById('modalStaffName').textContent = staffName + ' (' + staffUsername + ')';
            document.getElementById('modalStaffRole').textContent = staffRole;
            document.getElementById('modalStaffContact').textContent = staffEmail + ' | ' + staffPhone;
            document.getElementById('staffRole').value = staffRole;
            
            // Set permissions based on role (example logic)
            if (staffRole === 'Manager') {
              document.getElementById('permSales').checked = true;
              document.getElementById('permDiscount').checked = true;
              document.getElementById('permRefunds').checked = true;
              document.getElementById('permInventory').checked = true;
              document.getElementById('permReports').checked = true;
              document.getElementById('permSettings').checked = true;
            } else {
              document.getElementById('permSales').checked = true;
              document.getElementById('permDiscount').checked = false;
              document.getElementById('permRefunds').checked = false;
              document.getElementById('permInventory').checked = false;
              document.getElementById('permReports').checked = false;
              document.getElementById('permSettings').checked = false;
            }
            
            // Reset to first tab
            const firstTab = document.getElementById('details-tab');
            const firstTabTrigger = new bootstrap.Tab(firstTab);
            firstTabTrigger.show();
            
            // Show the modal
            editStaffModal.show();
          });
        });

        // Profile Picture Preview
        const staffProfileInput = document.getElementById('staffProfilePicture');
        const staffProfilePreview = document.getElementById('staffProfilePreview');
        
        if (staffProfileInput) {
          staffProfileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
              const reader = new FileReader();
              reader.onload = function(event) {
                staffProfilePreview.src = event.target.result;
              };
              reader.readAsDataURL(file);
            }
          });
        }

        // Toggle Password Visibility (New and Confirm fields)
        const togglePasswordBtn = document.getElementById('togglePassword');
        const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPassword');
        const staffNewPasswordInput = document.getElementById('staffNewPassword');
        const staffConfirmPasswordInput = document.getElementById('staffConfirmPassword');

        if (togglePasswordBtn && staffNewPasswordInput) {
          togglePasswordBtn.addEventListener('click', function() {
            const currentType = staffNewPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            staffNewPasswordInput.setAttribute('type', currentType);
            const icon = this.querySelector('i');
            if (icon) {
              icon.classList.toggle('bi-eye');
              icon.classList.toggle('bi-eye-slash');
            }
          });
        }

        if (toggleConfirmPasswordBtn && staffConfirmPasswordInput) {
          toggleConfirmPasswordBtn.addEventListener('click', function() {
            const currentType = staffConfirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            staffConfirmPasswordInput.setAttribute('type', currentType);
            const icon = this.querySelector('i');
            if (icon) {
              icon.classList.toggle('bi-eye');
              icon.classList.toggle('bi-eye-slash');
            }
          });
        }

        // Handle staff settings form submission
        const editStaffForm = document.getElementById('editStaffForm');
        if (editStaffForm) {
          editStaffForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate password match
            const newPassword = document.getElementById('staffNewPassword').value;
            const confirmPassword = document.getElementById('staffConfirmPassword').value;
            
            if (newPassword && newPassword !== confirmPassword) {
              alert('Passwords do not match!');
              return;
            }
            
            // Get form data
            const formData = new FormData(editStaffForm);
            const staffId = document.getElementById('editStaffId').value;
            
            // Placeholder: replace with real save logic / AJAX
            // Example AJAX call:
            // fetch('../components/update_staff_details.php', {
            //   method: 'POST',
            //   body: formData
            // }).then(response => response.json())
            //   .then(data => {
            //     if (data.success) {
            //       alert('Staff details updated successfully.');
            //       editStaffModal.hide();
            //       // Reload the page or update the staff table
            //       location.reload();
            //     } else {
            //       alert('Error: ' + data.message);
            //     }
            //   })
            //   .catch(error => {
            //     alert('An error occurred while updating staff details.');
            //     console.error('Error:', error);
            //   });
            
            // For now, just show success message
            editStaffModal.hide();
            alert('Staff details updated successfully for ID: ' + staffId);
          });
        }

        
      });

      // Delete Unit Function
      function deleteUnit(button) {
        if (confirm('Are you sure you want to delete this unit?')) {
          const row = button.closest('tr');
          row.remove();
          alert('Unit deleted successfully!');
          
          // TODO: Send delete request to server
        }
      }

      
      // Plan details from plans.php
      const planDetails = {
        'trial': {
          title: 'Free Trial',
          price: '₦0 (14 days)',
          desc: 'Test all features risk-free',
          features: [
            '14 days full access',
            'Single Manager Account',
            'Up to 2 agent/employer accounts',
            'All basic features included',
            'Email support',
            'Mobile app access',
            'No credit card required',
            'Upgrade anytime'
          ]
        },
        'basic-monthly': {
          title: 'Basic Plan - Monthly',
          price: '₦5,000/month',
          desc: 'Ideal for small businesses',
          features: [
            'Single Manager Account',
            'Allows Only 1 agent/employer account',
            'Basic inventory management',
            'Email support',
            'Mobile app access',
            'Flexible monthly billing',
            'Cancel anytime'
          ]
        },
        'basic-3months': {
          title: 'Basic Plan - 3 Months',
          price: '₦13,500',
          desc: 'Ideal for small businesses',
          features: [
            'Single Manager Account',
            'Allows Only 1 agent/employer account',
            'Basic inventory management',
            'Email support',
            'Mobile app access',
            'Save 10% compared to monthly billing'
          ]
        },
        'basic-6months': {
          title: 'Basic Plan - 6 Months',
          price: '₦25,500',
          desc: 'Ideal for small businesses',
          features: [
            'Single Manager Account',
            'Allows Only 1 agent/employer account',
            'Basic inventory management',
            'Priority email support',
            'Mobile app access',
            'Save 15% compared to monthly billing'
          ]
        },
        'basic-annual': {
          title: 'Basic Plan - Annual',
          price: '₦48,000',
          desc: 'Ideal for small businesses',
          features: [
            'Single Manager Account',
            'Allows Only 1 agent/employer account',
            'Basic inventory management',
            'Priority support',
            'Mobile app access',
            'Save 20% compared to monthly billing',
            'Best value for money'
          ]
        },
        'standard-monthly': {
          title: 'Standard Plan - Monthly',
          price: '₦10,000/month',
          desc: 'Perfect for growing businesses',
          features: [
            'Allows Two(2) Managers Account',
            'Up to Three(3) agent/employer accounts',
            'Advanced inventory management',
            'Customizable reports',
            'Email & phone support',
            'Mobile app access',
            'Flexible monthly billing',
            'Cancel anytime'
          ]
        },
        'standard-3months': {
          title: 'Standard Plan - 3 Months',
          price: '₦27,000',
          desc: 'Perfect for growing businesses',
          features: [
            'Allows Two(2) Managers Account',
            'Up to Three(3) agent/employer accounts',
            'Advanced inventory management',
            'Customizable reports',
            'Email & phone support',
            'Mobile app access',
            'Save 10% compared to monthly billing'
          ]
        },
        'standard-6months': {
          title: 'Standard Plan - 6 Months',
          price: '₦51,000',
          desc: 'Perfect for growing businesses',
          features: [
            'Allows Two(2) Managers Account',
            'Up to Three(3) agent/employer accounts',
            'Advanced inventory management',
            'Customizable reports',
            'Priority support',
            'Mobile app access',
            'Save 15% compared to monthly billing'
          ]
        },
        'standard-annual': {
          title: 'Standard Plan - Annual',
          price: '₦96,000',
          desc: 'Perfect for growing businesses',
          features: [
            'Allows Two(2) Managers Account',
            'Up to Three(3) agent/employer accounts',
            'Advanced inventory management',
            'Customizable reports',
            'Priority support 24/7',
            'Mobile app access',
            'Advanced analytics',
            'Save 20% compared to monthly billing',
            'Best value for growing teams'
          ]
        },
        'premium-monthly': {
          title: 'Premium Plan - Monthly',
          price: '₦20,000/month',
          desc: 'Best for established businesses',
          features: [
            'Up to Three(3) Managers Account',
            'Up to Ten(10) agent/employer accounts',
            'All inventory features',
            'Advanced analytics & reporting',
            'Dedicated account manager',
            'Priority support 24/7',
            'Mobile app access',
            'Custom integrations',
            'Flexible monthly billing',
            'Cancel anytime'
          ]
        },
        'premium-3months': {
          title: 'Premium Plan - 3 Months',
          price: '₦54,000',
          desc: 'Best for established businesses',
          features: [
            'Up to Three(3) Managers Account',
            'Up to Ten(10) agent/employer accounts',
            'All inventory features',
            'Advanced analytics & reporting',
            'Dedicated account manager',
            'Priority support 24/7',
            'Mobile app access',
            'Custom integrations',
            'Save 10% compared to monthly billing'
          ]
        },
        'premium-6months': {
          title: 'Premium Plan - 6 Months',
          price: '₦102,000',
          desc: 'Best for established businesses',
          features: [
            'Up to Three(3) Managers Account',
            'Up to Ten(10) agent/employer accounts',
            'All inventory features',
            'Advanced analytics & reporting',
            'Dedicated account manager',
            'Priority support 24/7',
            'Mobile app access',
            'Custom integrations',
            'API access',
            'Save 15% compared to monthly billing'
          ]
        },
        'premium-annual': {
          title: 'Premium Plan - Annual',
          price: '₦192,000',
          desc: 'Best for established businesses',
          features: [
            'Up to Three(3) Managers Account',
            'Up to Ten(10) agent/employer accounts',
            'All inventory features',
            'Advanced analytics & reporting',
            'Dedicated account manager',
            'Priority support 24/7',
            'Mobile app access',
            'Custom integrations',
            'API access',
            'White-label options',
            'Save 20% compared to monthly billing',
            'Best value for enterprise teams'
          ]
        }
      };
      function getPlanDetailHtml(keys) {
        if (!keys) return '';
        const keyArr = keys.split('|');
        let html = '<div class="row">';
        keyArr.forEach(function(key) {
          const d = planDetails[key];
          if (d) {
            html += `<div class="col-md-6 mb-3"><div class="card"><div class="card-body"><h5>${d.title}</h5><div class="text-primary fw-bold mb-1">${d.price}</div><div class="mb-2">${d.desc}</div><ul>`;
            d.features.forEach(f => html += `<li>${f}</li>`);
            html += '</ul>';
            html += `<a href=\"../../plans.php\" class=\"btn btn-primary mt-3 upgrade-btn\" role=\"button\">Upgrade</a>`;
            html += '</div></div></div>';
          }
        });
        html += '</div>';
        return html;
      }
      document.querySelectorAll('.plan-toggle').forEach(function(btn, idx) {
        btn.addEventListener('click', function() {
          const tr = btn.closest('tr.plan-row');
          const next = tr.nextElementSibling;
          if (!next || !next.classList.contains('plan-details')) return;
          // Toggle only this dropdown
          if (next.style.display === '' || next.style.display === 'table-row') {
            next.style.display = 'none';
            next.firstElementChild.innerHTML = '';
          } else {
            // Close all others
            document.querySelectorAll('.plan-details').forEach(d => { d.style.display = 'none'; d.firstElementChild.innerHTML = ''; });
            const keys = tr.getAttribute('data-plan');
            next.firstElementChild.innerHTML = getPlanDetailHtml(keys);
            next.style.display = '';
          }
        });
      });
    

   
      // Live Receipt Preview logic (robust, data-attribute driven)
      function initReceiptPreview() {
        const receiptPreview = document.getElementById('receiptPreview');
        if (!receiptPreview) return;

        // text inputs
        const titleInput = document.getElementById('receiptTitleInput');
        const headerInput = document.getElementById('headerTextInput');
        const footerInput = document.getElementById('footerTextInput');
        const fontSizeSelect = document.getElementById('fontSizeSelect');
        const paperSizeSelect = document.getElementById('paperSizeSelect');
        const previewInner = document.getElementById('receiptPreviewInner');

        const titlePreview = document.getElementById('receiptTitlePreview');
        const headerPreview = document.getElementById('headerTextPreview');
        const footerPreview = document.getElementById('footerTextPreview');

        function updateText() {
          if (titleInput && titlePreview) titlePreview.textContent = titleInput.value || 'SALES RECEIPT';
          if (headerInput && headerPreview) headerPreview.textContent = headerInput.value || '';
          if (footerInput && footerPreview) footerPreview.textContent = footerInput.value || '';
        }

        function updateFontSize() {
          if (!fontSizeSelect || !receiptPreview) return;
          const size = fontSizeSelect.value;
          let fontSize = '0.9rem';
          if (size === 'Small') fontSize = '0.8rem';
          if (size === 'Medium') fontSize = '0.9rem';
          if (size === 'Large') fontSize = '1rem';
          receiptPreview.style.fontSize = fontSize;
        }

        function updatePaperSize() {
          if (!paperSizeSelect || !previewInner || !receiptPreview) return;
          const val = paperSizeSelect.value || '';
          // map label to approximate width in pixels
          const map = {
            '80mm Thermal': 300,
            '58mm Thermal': 220,
            'A4 Paper': 794,
            'Letter Size': 816
          };
          const width = map[val] || 300;
          previewInner.style.width = width + 'px';

          // scale down if inner width exceeds available preview width
          const available = Math.max(160, receiptPreview.clientWidth - 24); // leave padding
          let scale = 1;
          if (width > available) scale = available / width;
          previewInner.style.transformOrigin = 'top center';
          previewInner.style.transition = 'transform 180ms ease';
          previewInner.style.transform = 'scale(' + scale + ')';
        }

        // Generic checkbox -> preview mapping
        // We look for inputs inside receipt settings that have a data-preview attribute
        const checkboxes = Array.from(document.querySelectorAll('#receiptSettingsContainer input[type=checkbox][data-preview]'));
        function animateShowHide(el, show, displayMode) {
          if (!el) return;
          displayMode = displayMode || 'block';
          // If showing, set display first then remove hidden class to trigger transition
          if (show) {
            el.style.display = displayMode;
            // ensure element has starting opacity 0 for transition consistency
            el.classList.add('hidden-temp');
            // Force reflow then remove class to animate in
            requestAnimationFrame(function() {
              el.classList.remove('hidden-temp');
            });
          } else {
            // add hidden class to animate out, then remove from layout
            el.classList.add('hidden-temp');
            setTimeout(function() {
              // only hide after transition
              if (el.classList.contains('hidden-temp')) el.style.display = 'none';
            }, 200);
          }
        }

        function updateCheckboxToggle(checkbox) {
          const previewAttr = checkbox.getAttribute('data-preview');
          const displayMode = checkbox.getAttribute('data-display') || 'block';
          if (!previewAttr) return;
          const ids = previewAttr.split(',').map(s => s.trim()).filter(Boolean);
          ids.forEach(function(pid) {
            const el = document.getElementById(pid);
            if (!el) return;
            animateShowHide(el, checkbox.checked, displayMode);
          });
        }

        // Auto-save (debounced) to server
        const saveStatusEl = document.getElementById('receiptSaveStatus');
        let saveTimer = null;
        function collectReceiptSettings() {
          const data = {
            title: titleInput ? titleInput.value : '',
            header: headerInput ? headerInput.value : '',
            footer: footerInput ? footerInput.value : '',
            paperSize: (document.getElementById('paperSizeSelect') || {}).value || '',
            fontSize: fontSizeSelect ? fontSizeSelect.value : '',
            options: {}
          };
          checkboxes.forEach(function(cb) {
            const key = cb.id || cb.name || null;
            if (key) data.options[key] = !!cb.checked;
          });
          return data;
        }

        async function saveReceiptSettings(payload) {
          if (!payload) return;
          if (saveStatusEl) { saveStatusEl.style.display = 'inline-block'; saveStatusEl.textContent = 'Saving...'; }
          try {
            const resp = await fetch('../save_receipt_settings.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify(payload)
            });
            const json = await resp.json();
            if (json && json.success) {
              if (saveStatusEl) { saveStatusEl.textContent = 'Saved'; setTimeout(()=>{ if (saveStatusEl) saveStatusEl.style.display='none'; }, 1200); }
            } else {
              if (saveStatusEl) { saveStatusEl.textContent = 'Save failed'; setTimeout(()=>{ if (saveStatusEl) saveStatusEl.style.display='none'; }, 1800); }
            }
          } catch (err) {
            if (saveStatusEl) { saveStatusEl.textContent = 'Error'; setTimeout(()=>{ if (saveStatusEl) saveStatusEl.style.display='none'; }, 1800); }
            console.error('Save receipt settings failed', err);
          }
        }

        function scheduleSave() {
          if (saveTimer) clearTimeout(saveTimer);
          saveTimer = setTimeout(function() {
            const payload = collectReceiptSettings();
            saveReceiptSettings(payload);
          }, 700);
        }

        // Attach listeners
        checkboxes.forEach(function(cb) {
          // make sure initial state is applied
          updateCheckboxToggle(cb);
          cb.addEventListener('change', function() { updateCheckboxToggle(cb); scheduleSave(); });
        });

        // wire text inputs and font select
        if (titleInput) titleInput.addEventListener('input', updateText);
        if (headerInput) headerInput.addEventListener('input', updateText);
        if (footerInput) footerInput.addEventListener('input', updateText);
        if (fontSizeSelect) fontSizeSelect.addEventListener('change', updateFontSize);
        if (paperSizeSelect) paperSizeSelect.addEventListener('change', function() { updatePaperSize(); scheduleSave(); });

        // initial sync
        updateText();
        updateFontSize();
        updatePaperSize();
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initReceiptPreview);
      } else {
        initReceiptPreview();
      }
    
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>