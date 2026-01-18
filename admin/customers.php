<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Management - SalesPilot</title>
    <?php include '../include/responsive.php'; ?>
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
      
      .brm-badge {
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        background: rgba(13, 110, 253, 0.06);
        color: #0d6efd;
      }
      .plan-badge {
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        background: rgba(40, 167, 69, 0.06);
        color: #28a745;
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
            
            <!-- Summary card (total customers) -->
            <div class="mb-3">
              <div class="row">
                <div class="col-md-3">
                  <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <div class="text-muted small">Total Customers</div>
                        <div class="h4 mb-0" id="totalCustomers">0</div>
                      </div>
                      <div class="text-muted"><i class="bi bi-people" style="font-size:28px"></i></div>
                    </div>
                  </div>
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
                <div class="col-md-2">
                  <select class="form-select" id="brmFilter">
                    <option value="">All BRMs</option>
                    <option value="Alice Martinez">Alice Martinez</option>
                    <option value="Benjamin Clark">Benjamin Clark</option>
                    <option value="Chidi Okonkwo">Chidi Okonkwo</option>
                    <option value="Denise Amar">Denise Amar</option>
                    <option value="Emeka Nwosu">Emeka Nwosu</option>
                    <option value="Fatima Yusuf">Fatima Yusuf</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <select class="form-select" id="planTypeFilter">
                    <option value="">All Plans</option>
                    <option value="Basic">Basic</option>
                    <option value="Standard">Standard</option>
                    <option value="Premium">Premium</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <select class="form-select" id="planDurationFilter">
                    <option value="">All Durations</option>
                    <!-- options will be populated dynamically -->
                  </select>
                </div>
                
                <div class="col-md-2">
                  <select class="form-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Suspended">Suspended</option>
                     <!--<option value="Locked">Locked</option> -->
                  </select>
                </div>
                <div class="col-md-12 col-xxl-12 mt-0 d-none"></div>
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
                    <th>#</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>BRM</th>
                    <th>Status</th>
                    <th>Last Login</th>
                    <th>Current Plan</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="usersTableBody">
                  <tr onclick="showUserDetails(1)" data-user-id="1" data-status="Active" data-locked="false" data-plan-type="Basic" data-plan-duration="Monthly">
                    <td>1</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">JD</div>
                        <div class="ms-3"><div class="fw-bold">John Doe</div><small class="text-muted">ID: U001</small></div>
                      </div>
                    </td>
                    <td>john.doe@example.com</td>
                    <td>+234 801 234 5678</td>
                    <td><span class="brm-badge">Alice Martinez</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>2 hours ago</td>
                    <td><span class="plan-badge">Basic (Monthly)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(1, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(2)" data-user-id="2" data-status="Active" data-locked="false" data-plan-type="Standard" data-plan-duration="Annual">
                    <td>2</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">JS</div>
                        <div class="ms-3"><div class="fw-bold">Jane Smith</div><small class="text-muted">ID: U002</small></div>
                      </div>
                    </td>
                    <td>jane.smith@example.com</td>
                    <td>+234 802 345 6789</td>
                    <td><span class="brm-badge">Benjamin Clark</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>5 hours ago</td>
                    <td><span class="plan-badge">Standard (Annual)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(2, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(3)" data-user-id="3" data-status="Active" data-locked="false" data-plan-type="Basic" data-plan-duration="3 Months">
                    <td>3</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">MB</div>
                        <div class="ms-3"><div class="fw-bold">Mike Brown</div><small class="text-muted">ID: U003</small></div>
                      </div>
                    </td>
                    <td>mike.brown@example.com</td>
                    <td>+234 803 456 7890</td>
                    <td><span class="brm-badge">Chidi Okonkwo</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>1 day ago</td>
                    <td><span class="plan-badge">Basic (3 Months)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(3, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(4)" data-user-id="4" data-status="Inactive" data-locked="true" data-plan-type="" data-plan-duration="">
                    <td>4</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">SD</div>
                        <div class="ms-3"><div class="fw-bold">Sarah Davis</div><small class="text-muted">ID: U004</small></div>
                      </div>
                    </td>
                    <td>sarah.davis@example.com</td>
                    <td>+234 804 567 8901</td>
                    <td><span class="brm-badge">Denise Amar</span></td>
                    <td><span class="status-badge status-inactive">Inactive</span></td>
                    <td>3 days ago</td>
                    <td><span class="plan-badge">None</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(4, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(5)" data-user-id="5" data-status="Suspended" data-locked="false" data-plan-type="Premium" data-plan-duration="Annual">
                    <td>5</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">TW</div>
                        <div class="ms-3"><div class="fw-bold">Tom Wilson</div><small class="text-muted">ID: U005</small></div>
                      </div>
                    </td>
                    <td>tom.wilson@example.com</td>
                    <td>+234 805 678 9012</td>
                    <td><span class="brm-badge">Emeka Nwosu</span></td>
                    <td><span class="status-badge status-inactive">Inactive</span></td>
                    <td>1 week ago</td>
                    <td><span class="plan-badge">Premium (Annual)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(5, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(6)" data-user-id="6" data-status="Active" data-locked="false" data-plan-type="Standard" data-plan-duration="6 Months">
                    <td>6</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">AK</div>
                        <div class="ms-3"><div class="fw-bold">Aisha Kalu</div><small class="text-muted">ID: U006</small></div>
                      </div>
                    </td>
                    <td>aisha.kalu@example.com</td>
                    <td>+234 806 789 0123</td>
                    <td><span class="brm-badge">Alice Martinez</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>3 hours ago</td>
                    <td><span class="plan-badge">Standard (6 Months)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(6, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(7)" data-user-id="7" data-status="Active" data-locked="false" data-plan-type="Standard" data-plan-duration="Monthly">
                    <td>7</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);">OB</div>
                        <div class="ms-3"><div class="fw-bold">Olufunke Bello</div><small class="text-muted">ID: U007</small></div>
                      </div>
                    </td>
                    <td>olufunke.bello@example.com</td>
                    <td>+234 807 890 1234</td>
                    <td><span class="brm-badge">Benjamin Clark</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>Today</td>
                    <td><span class="plan-badge">Standard (Monthly)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(7, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(8)" data-user-id="8" data-status="Inactive" data-locked="false" data-plan-type="Basic" data-plan-duration="3 Months">
                    <td>8</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #ffd3a5 0%, #fd6585 100%);">PC</div>
                        <div class="ms-3"><div class="fw-bold">Peter Cole</div><small class="text-muted">ID: U008</small></div>
                      </div>
                    </td>
                    <td>peter.cole@example.com</td>
                    <td>+234 808 901 2345</td>
                    <td><span class="brm-badge">Chidi Okonkwo</span></td>
                    <td><span class="status-badge status-inactive">Inactive</span></td>
                    <td>2 weeks ago</td>
                    <td><span class="plan-badge">Basic (3 Months)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(8, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(9)" data-user-id="9" data-status="Active" data-locked="false" data-plan-type="Premium" data-plan-duration="Annual">
                    <td>9</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #cfd9df 0%, #e2ebf0 100%);">RL</div>
                        <div class="ms-3"><div class="fw-bold">Rachel Lee</div><small class="text-muted">ID: U009</small></div>
                      </div>
                    </td>
                    <td>rachel.lee@example.com</td>
                    <td>+234 809 012 3456</td>
                    <td><span class="brm-badge">Denise Amar</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>4 days ago</td>
                    <td><span class="plan-badge">Premium (Annual)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(9, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(10)" data-user-id="10" data-status="Active" data-locked="false" data-plan-type="Standard" data-plan-duration="3 Months">
                    <td>10</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);">SM</div>
                        <div class="ms-3"><div class="fw-bold">Samuel Morris</div><small class="text-muted">ID: U010</small></div>
                      </div>
                    </td>
                    <td>samuel.morris@example.com</td>
                    <td>+234 810 123 4567</td>
                    <td><span class="brm-badge">Emeka Nwosu</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>Yesterday</td>
                    <td><span class="plan-badge">Standard (3 Months)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(10, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(11)" data-user-id="11" data-status="Active" data-locked="false" data-plan-type="Basic" data-plan-duration="Monthly">
                    <td>11</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);">KG</div>
                        <div class="ms-3"><div class="fw-bold">Kingsley Green</div><small class="text-muted">ID: U011</small></div>
                      </div>
                    </td>
                    <td>kingsley.green@example.com</td>
                    <td>+234 811 234 5678</td>
                    <td><span class="brm-badge">Fatima Yusuf</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>6 hours ago</td>
                    <td><span class="plan-badge">Basic (Monthly)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(11, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(12)" data-user-id="12" data-status="Inactive" data-locked="false" data-plan-type="Basic" data-plan-duration="6 Months">
                    <td>12</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);">HT</div>
                        <div class="ms-3"><div class="fw-bold">Helen Taiwo</div><small class="text-muted">ID: U012</small></div>
                      </div>
                    </td>
                    <td>helen.taiwo@example.com</td>
                    <td>+234 812 345 6789</td>
                    <td><span class="brm-badge">Alice Martinez</span></td>
                    <td><span class="status-badge status-inactive">Inactive</span></td>
                    <td>1 month ago</td>
                    <td><span class="plan-badge">Basic (6 Months)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(12, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(13)" data-user-id="13" data-status="Active" data-locked="false" data-plan-type="Standard" data-plan-duration="Annual">
                    <td>13</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);">LN</div>
                        <div class="ms-3"><div class="fw-bold">Lydia Nwachukwu</div><small class="text-muted">ID: U013</small></div>
                      </div>
                    </td>
                    <td>lydia.n@example.com</td>
                    <td>+234 813 456 7890</td>
                    <td><span class="brm-badge">Denise Amar</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>2 days ago</td>
                    <td><span class="plan-badge">Standard (Annual)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(13, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(14)" data-user-id="14" data-status="Active" data-locked="false" data-plan-type="Premium" data-plan-duration="6 Months">
                    <td>14</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #cfd9df 0%, #e2ebf0 100%);">BV</div>
                        <div class="ms-3"><div class="fw-bold">Bayo Victor</div><small class="text-muted">ID: U014</small></div>
                      </div>
                    </td>
                    <td>bayo.victor@example.com</td>
                    <td>+234 814 567 8901</td>
                    <td><span class="brm-badge">Emeka Nwosu</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>Today</td>
                    <td><span class="plan-badge">Premium (6 Months)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(14, this)" title="Suspend User">
                        <i class="bi bi-slash-circle"></i>
                      </button>
                    </td>
                  </tr>
                  <tr onclick="showUserDetails(15)" data-user-id="15" data-status="Active" data-locked="false" data-plan-type="Standard" data-plan-duration="Monthly">
                    <td>15</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">ZR</div>
                        <div class="ms-3"><div class="fw-bold">Zainab Rahman</div><small class="text-muted">ID: U015</small></div>
                      </div>
                    </td>
                    <td>zainab.rahman@example.com</td>
                    <td>+234 815 678 9012</td>
                    <td><span class="brm-badge">Fatima Yusuf</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>30 mins ago</td>
                    <td><span class="plan-badge">Standard (Monthly)</span></td>
                    <td>
                      <button class="action-btn" type="button" onclick="event.stopPropagation(); toggleSuspendUser(15, this)" title="Suspend User">
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
          <button class="btn btn-gradient-primary" onclick="adminControlUser()" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;">
            <i class="bi bi-shield-lock-fill me-2"></i>Admin Control
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
      // Populate total customers card
      if (typeof updateTotalCustomers === 'function') updateTotalCustomers();
      // Populate plan filter options dynamically from table data
      if (typeof populatePlanFilters === 'function') populatePlanFilters();
      
      // Search functionality - use unified filterUsers so search combines with other filters
      const searchInput = document.getElementById('searchInput');
      if (searchInput) searchInput.addEventListener('input', filterUsers);

      // Filter functionality - guard bindings in case elements are missing
      const brmFilterEl = document.getElementById('brmFilter');
      const planTypeEl = document.getElementById('planTypeFilter');
      const planDurEl = document.getElementById('planDurationFilter');
      const statusEl = document.getElementById('statusFilter');
      if (brmFilterEl) brmFilterEl.addEventListener('change', filterUsers);
      if (planTypeEl) planTypeEl.addEventListener('change', filterUsers);
      if (planDurEl) planDurEl.addEventListener('change', filterUsers);
      if (statusEl) statusEl.addEventListener('change', filterUsers);
    });
    
    function filterUsers() {
      const brmFilter = (document.getElementById('brmFilter') && document.getElementById('brmFilter').value) || '';
      const planTypeFilter = (document.getElementById('planTypeFilter') && document.getElementById('planTypeFilter').value) || '';
      const planDurationFilter = (document.getElementById('planDurationFilter') && document.getElementById('planDurationFilter').value) || '';
      const statusFilter = (document.getElementById('statusFilter') && document.getElementById('statusFilter').value) || '';
      const searchTerm = ((document.getElementById('searchInput') && document.getElementById('searchInput').value) || '').toLowerCase().trim();
      const rows = document.querySelectorAll('#usersTableBody tr');

      rows.forEach(row => {
        const brm = ((row.querySelector('.brm-badge') && row.querySelector('.brm-badge').textContent) || '').trim();
        const rowPlanType = (row.dataset.planType || '').trim();
        const rowPlanDuration = (row.dataset.planDuration || '').trim();
        const statusEl = row.querySelector('.status-badge');
        const status = (statusEl && statusEl.textContent || '').trim();

        // search matching (only name, email and phone are relevant)
        const name = (row.querySelector('td:nth-child(2) .fw-bold') && row.querySelector('td:nth-child(2) .fw-bold').textContent) || '';
        const email = (row.querySelector('td:nth-child(3)') && row.querySelector('td:nth-child(3)').textContent) || '';
        const phone = (row.querySelector('td:nth-child(4)') && row.querySelector('td:nth-child(4)').textContent) || '';
        const rowText = (name + ' ' + email + ' ' + phone).toLowerCase();
        const searchMatch = !searchTerm || rowText.indexOf(searchTerm) !== -1;

        const brmMatch = !brmFilter || brm === brmFilter;
        const planTypeMatch = !planTypeFilter || rowPlanType === planTypeFilter;
        const planDurationMatch = !planDurationFilter || rowPlanDuration === planDurationFilter;

        // Status: treat 'Locked' as part of Inactive for filtering convenience
        let statusMatch = true;
        if (statusFilter) {
          if (statusFilter.toLowerCase() === 'inactive') {
            statusMatch = ['inactive', 'locked'].includes(status.toLowerCase());
          } else {
            statusMatch = status.toLowerCase() === statusFilter.toLowerCase();
          }
        }

        row.style.display = (brmMatch && planTypeMatch && planDurationMatch && statusMatch && searchMatch) ? '' : 'none';
      });
      // keep total customers number up-to-date if rows change
      if (typeof updateTotalCustomers === 'function') updateTotalCustomers();
    }

    // Update total customers displayed in the card
    function updateTotalCustomers() {
      const rows = Array.from(document.querySelectorAll('#usersTableBody tr'));
      const visible = rows.filter(r => r.style.display !== 'none').length;
      const el = document.getElementById('totalCustomers');
      if (el) el.textContent = visible;
    }

    // Populate plan filter selects based on data-plan-type and data-plan-duration attributes
    function populatePlanFilters() {
      const typeSet = new Set();
      const durSet = new Set();
      document.querySelectorAll('#usersTableBody tr').forEach(function(r) {
        const t = (r.dataset.planType || '').trim();
        const d = (r.dataset.planDuration || '').trim();
        if (t) typeSet.add(t);
        if (d) durSet.add(d);
      });

      const typeSelect = document.getElementById('planTypeFilter');
      const durSelect = document.getElementById('planDurationFilter');
      if (!typeSelect || !durSelect) return;

      let typeHtml = '<option value="">All Plans</option>';
      Array.from(typeSet).sort().forEach(function(t) { typeHtml += `<option value="${t}">${t}</option>`; });
      typeSelect.innerHTML = typeHtml;

      const order = { 'Monthly': 0, '3 Months': 1, '6 Months': 2, 'Annual': 3 };
      const durs = Array.from(durSet).sort(function(a,b){
        const ia = order.hasOwnProperty(a) ? order[a] : 99;
        const ib = order.hasOwnProperty(b) ? order[b] : 99;
        return ia - ib || a.localeCompare(b);
      });
      let durHtml = '<option value="">All Durations</option>';
      durs.forEach(function(d){ durHtml += `<option value="${d}">${d}</option>`; });
      durSelect.innerHTML = durHtml;
    }
    
    function showUserDetails(userId) {
      const panel = document.getElementById('userDetailsPanel');
      const overlay = document.getElementById('sidePanelOverlay');
      
      // Find the clicked row and extract data
      const row = document.querySelector(`#usersTableBody tr[data-user-id="${userId}"]`);
      if (!row) return;
      
      // Extract data from the row
      const nameElement = row.querySelector('.fw-bold');
      const userIdElement = row.querySelector('small.text-muted');
      const emailCell = row.querySelectorAll('td')[2];
      const phoneCell = row.querySelectorAll('td')[3];
      const brmCell = row.querySelectorAll('td')[4];
      const statusBadge = row.querySelector('.status-badge');
      const lastLoginCell = row.querySelectorAll('td')[6];
      const planCell = row.querySelectorAll('td')[7];
      const avatarDiv = row.querySelector('.user-avatar');
      
      // Get data attributes
      const status = row.getAttribute('data-status');
      const planType = row.getAttribute('data-plan-type');
      const planDuration = row.getAttribute('data-plan-duration');
      
      // Populate side panel with data
      if (nameElement) {
        document.getElementById('detailName').textContent = nameElement.textContent;
      }
      
      if (userIdElement) {
        document.getElementById('detailUserId').textContent = userIdElement.textContent.replace('ID: ', '');
      }
      
      if (emailCell) {
        document.getElementById('detailEmail').textContent = emailCell.textContent.trim();
      }
      
      if (phoneCell) {
        document.getElementById('detailPhone').textContent = phoneCell.textContent.trim();
      }
      
      if (lastLoginCell) {
        document.getElementById('detailLastLogin').textContent = lastLoginCell.textContent.trim();
      }
      
      // Update avatar
      if (avatarDiv) {
        const detailAvatar = document.getElementById('detailAvatar');
        detailAvatar.textContent = avatarDiv.textContent;
        detailAvatar.style.background = avatarDiv.style.background;
      }
      
      // Update status badge
      if (statusBadge) {
        const detailStatus = document.getElementById('detailStatus');
        detailStatus.textContent = statusBadge.textContent;
        detailStatus.className = statusBadge.className;
      }
      
      // Update role (for now, default to "Customer" - can be enhanced with data attribute)
      document.getElementById('detailRole').textContent = 'Customer';
      
      // Show the panel
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
    
    function adminControlUser() {
      // Get the current user details from the side panel
      const userId = document.getElementById('detailUserId')?.textContent || '';
      const name = document.getElementById('detailName')?.textContent || '';
      const email = document.getElementById('detailEmail')?.textContent || '';
      const phone = document.getElementById('detailPhone')?.textContent || '';
      const role = document.getElementById('detailRole')?.textContent || '';
      const status = document.getElementById('detailStatus')?.textContent || '';
      
      // Build query parameters for admin control page
      const params = new URLSearchParams();
      params.set('user_id', userId);
      params.set('name', name);
      params.set('email', email);
      params.set('phone', phone);
      params.set('role', role);
      params.set('status', status);
      
      // Navigate to admin control page
      const url = 'admin_ctm_control.php?' + params.toString();
      window.location.href = url;
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
        // Set status back to Active when unlocking
        row.setAttribute('data-status', 'Active');
        statusBadge.className = 'status-badge status-active';
        statusBadge.textContent = 'Active';
        icon.className = 'bi bi-lock-open-fill';
        button.title = 'Lock User';
        console.log('User unlocked:', userId);
      } else {
        // Lock user
        row.setAttribute('data-locked', 'true');
        // mark row status as Locked as well so filters pick it up
        row.setAttribute('data-status', 'Locked');
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
