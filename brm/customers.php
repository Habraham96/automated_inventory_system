<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Customers - SalesPilot</title>
    <?php include '../include/responsive.php'; ?>
    
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
      
      /* Customer Stats Cards */
      .customer-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }
      
      .stat-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
      }
      
      .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
      }
      
      .stat-card.total { border-left-color: #667eea; }
      .stat-card.active { border-left-color: #198754; }
      .stat-card.new { border-left-color: #17a2b8; }
      .stat-card.revenue { border-left-color: #ffc107; }
      
      .stat-card .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
      }
      
      .stat-card.total .stat-icon {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
      }
      
      .stat-card.active .stat-icon {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .stat-card.new .stat-icon {
        background: rgba(23, 162, 184, 0.1);
        color: #17a2b8;
      }
      
      .stat-card.revenue .stat-icon {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .stat-card h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: #2c3e50;
      }
      
      .stat-card p {
        color: #6c757d;
        margin-bottom: 0;
        font-size: 0.9rem;
      }
      
      /* Search and Filter Section */
      .search-filter-section {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      }
      
      .search-bar {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 1rem;
      }
      
      .search-input-group {
        flex: 1;
        min-width: 250px;
        position: relative;
      }
      
      .search-input-group input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        font-size: 0.9rem;
      }
      
      .search-input-group i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
      }
      
      .filter-group {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
      }
      
      .filter-group select {
        padding: 0.75rem 1rem;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        font-size: 0.9rem;
        background: white;
      }
      
      /* Customers Grid */
      .customers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }
      
      .customer-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        border-left: 4px solid transparent;
      }
      
      .customer-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        border-left-color: #667eea;
      }
      
      .customer-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
      }
      
      .customer-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.5rem;
        color: white;
        flex-shrink: 0;
      }
      
      .customer-info h5 {
        margin-bottom: 0.25rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .customer-info p {
        margin-bottom: 0;
        color: #6c757d;
        font-size: 0.85rem;
      }
      
      .customer-details {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
      }
      
      .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
      }
      
      .detail-row:last-child {
        margin-bottom: 0;
      }
      
      .detail-label {
        color: #6c757d;
      }
      
      .detail-value {
        color: #2c3e50;
        font-weight: 600;
      }
      
      .status-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
      }
      
      .status-badge.active {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .status-badge.inactive {
        background: rgba(108, 117, 125, 0.1);
        color: #6c757d;
      }
      
      .status-badge.trial {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .plan-badge {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
      }
      
      .customer-actions {
        margin-top: 1rem;
        display: flex;
        gap: 0.5rem;
      }
      
      .action-btn {
        flex: 1;
        padding: 0.5rem 1rem;
        border: 1px solid #667eea;
        background: transparent;
        color: #667eea;
        border-radius: 6px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
      }
      
      .action-btn:hover {
        background: #667eea;
        color: white;
      }
      
      .action-btn.primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
      }
      
      .action-btn.primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
      }
      
      /* View Toggle */
      .view-toggle {
        display: flex;
        gap: 0.5rem;
        background: #f8f9fa;
        padding: 0.25rem;
        border-radius: 8px;
      }
      
      .view-toggle button {
        padding: 0.5rem 1rem;
        border: none;
        background: transparent;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        color: #6c757d;
      }
      
      .view-toggle button.active {
        background: white;
        color: #667eea;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      
      /* Table View */
      .customers-table-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        overflow: hidden;
        display: none;
      }
      
      .customers-table-container.active {
        display: block;
      }
      
      .customers-table {
        width: 100%;
        border-collapse: collapse;
      }
      
      .customers-table thead {
        background: #f8f9fa;
      }
      
      .customers-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #dee2e6;
        font-size: 0.9rem;
      }
      
      .customers-table td {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        color: #495057;
        vertical-align: middle;
      }
      
      .customers-table tbody tr {
        cursor: pointer;
        transition: background 0.2s ease;
      }
      
      .customers-table tbody tr:hover {
        background: #f8f9fa;
      }
      
      .table-avatar {
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
      
      /* Empty State */
      .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #6c757d;
      }
      
      .empty-state i {
        font-size: 5rem;
        margin-bottom: 1rem;
        opacity: 0.3;
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
            <h1><i class="bi bi-people-fill"></i> My Customers</h1>
            <p>Manage and track your customer relationships</p>
          </div>
          
          <!-- Customer Stats -->
          <div class="customer-stats">
            <div class="stat-card total">
              <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
              </div>
              <h3>145</h3>
              <p>Total Customers</p>
            </div>
            
            <div class="stat-card active">
              <div class="stat-icon">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <h3>132</h3>
              <p>Active Subscriptions</p>
            </div>
            
            <div class="stat-card new">
              <div class="stat-icon">
                <i class="bi bi-star-fill"></i>
              </div>
              <h3>13</h3>
              <p>New This Month</p>
            </div>
            
            <div class="stat-card revenue">
              <div class="stat-icon">
                <i class="bi bi-person-x-fill"></i>
              </div>
              <h3>13</h3>
              <p>Inactive Customers</p>
            </div>
          </div>
          
          <!-- Search and Filter -->
          <div class="search-filter-section">
            <div class="search-bar">
              <div class="search-input-group">
                <i class="bi bi-search"></i>
                <input type="text" id="searchInput" placeholder="Search customers by name, company, or email...">
              </div>
              
              <div class="filter-group">
                <select id="statusFilter">
                  <option value="all">All Status</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                  <option value="trial">Trial</option>
                </select>
                
                <select id="planFilter">
                  <option value="all">All Plans</option>
                  <option value="enterprise">Enterprise</option>
                  <option value="professional">Professional</option>
                  <option value="business">Business</option>
                  <option value="basic">Basic</option>
                </select>
                
                <div class="view-toggle">
                  <button id="gridViewBtn" class="active">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                  </button>
                  <button id="tableViewBtn">
                    <i class="bi bi-table"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Customers Grid View -->
          <div class="customers-grid" id="customersGrid">
            <!-- Customer Card 1 -->
            <div class="customer-card" data-status="active" data-plan="enterprise">
              <div class="customer-header">
                <div class="customer-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                  TS
                </div>
                <div class="customer-info">
                  <h5>Tech Solutions Ltd</h5>
                  <p>tech@solutions.com</p>
                </div>
              </div>
              <div class="customer-details">
                <div class="detail-row">
                  <span class="detail-label">Status:</span>
                  <span class="status-badge active">Active</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Plan:</span>
                  <span class="plan-badge">Enterprise</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Monthly Value:</span>
                  <span class="detail-value">₦300,000</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Join Date:</span>
                  <span class="detail-value">Oct 10, 2025</span>
                </div>
              </div>
              <div class="customer-actions">
                <button class="action-btn primary">
                  <i class="bi bi-eye"></i> View Details
                </button>
                <button class="action-btn">
                  <i class="bi bi-telephone"></i>
                </button>
              </div>
            </div>
            
            <!-- Customer Card 2 -->
            <div class="customer-card" data-status="active" data-plan="professional">
              <div class="customer-header">
                <div class="customer-avatar" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                  RE
                </div>
                <div class="customer-info">
                  <h5>Retail Express</h5>
                  <p>contact@retailexpress.ng</p>
                </div>
              </div>
              <div class="customer-details">
                <div class="detail-row">
                  <span class="detail-label">Status:</span>
                  <span class="status-badge active">Active</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Plan:</span>
                  <span class="plan-badge">Professional</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Monthly Value:</span>
                  <span class="detail-value">₦200,000</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Join Date:</span>
                  <span class="detail-value">Nov 15, 2025</span>
                </div>
              </div>
              <div class="customer-actions">
                <button class="action-btn primary">
                  <i class="bi bi-eye"></i> View Details
                </button>
                <button class="action-btn">
                  <i class="bi bi-telephone"></i>
                </button>
              </div>
            </div>
            
            <!-- Customer Card 3 -->
            <div class="customer-card" data-status="active" data-plan="business">
              <div class="customer-header">
                <div class="customer-avatar" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                  FH
                </div>
                <div class="customer-info">
                  <h5>Fashion Hub Nigeria</h5>
                  <p>info@fashionhub.ng</p>
                </div>
              </div>
              <div class="customer-details">
                <div class="detail-row">
                  <span class="detail-label">Status:</span>
                  <span class="status-badge active">Active</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Plan:</span>
                  <span class="plan-badge">Business</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Monthly Value:</span>
                  <span class="detail-value">₦150,000</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Join Date:</span>
                  <span class="detail-value">Dec 5, 2025</span>
                </div>
              </div>
              <div class="customer-actions">
                <button class="action-btn primary">
                  <i class="bi bi-eye"></i> View Details
                </button>
                <button class="action-btn">
                  <i class="bi bi-telephone"></i>
                </button>
              </div>
            </div>
            
            <!-- Customer Card 4 -->
            <div class="customer-card" data-status="trial" data-plan="business">
              <div class="customer-header">
                <div class="customer-avatar" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                  AP
                </div>
                <div class="customer-info">
                  <h5>Auto Parts Co</h5>
                  <p>sales@autoparts.ng</p>
                </div>
              </div>
              <div class="customer-details">
                <div class="detail-row">
                  <span class="detail-label">Status:</span>
                  <span class="status-badge trial">Trial</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Plan:</span>
                  <span class="plan-badge">Business</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Monthly Value:</span>
                  <span class="detail-value">₦150,000</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Join Date:</span>
                  <span class="detail-value">Jan 5, 2026</span>
                </div>
              </div>
              <div class="customer-actions">
                <button class="action-btn primary">
                  <i class="bi bi-eye"></i> View Details
                </button>
                <button class="action-btn">
                  <i class="bi bi-telephone"></i>
                </button>
              </div>
            </div>
            
            <!-- Customer Card 5 -->
            <div class="customer-card" data-status="active" data-plan="enterprise">
              <div class="customer-header">
                <div class="customer-avatar" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                  LT
                </div>
                <div class="customer-info">
                  <h5>Lagos Tech Hub</h5>
                  <p>hello@lagostech.ng</p>
                </div>
              </div>
              <div class="customer-details">
                <div class="detail-row">
                  <span class="detail-label">Status:</span>
                  <span class="status-badge active">Active</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Plan:</span>
                  <span class="plan-badge">Enterprise</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Monthly Value:</span>
                  <span class="detail-value">₦500,000</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Join Date:</span>
                  <span class="detail-value">Sep 20, 2025</span>
                </div>
              </div>
              <div class="customer-actions">
                <button class="action-btn primary">
                  <i class="bi bi-eye"></i> View Details
                </button>
                <button class="action-btn">
                  <i class="bi bi-telephone"></i>
                </button>
              </div>
            </div>
            
            <!-- Customer Card 6 -->
            <div class="customer-card" data-status="inactive" data-plan="professional">
              <div class="customer-header">
                <div class="customer-avatar" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                  GS
                </div>
                <div class="customer-info">
                  <h5>Global Supplies Inc</h5>
                  <p>admin@globalsupplies.com</p>
                </div>
              </div>
              <div class="customer-details">
                <div class="detail-row">
                  <span class="detail-label">Status:</span>
                  <span class="status-badge inactive">Inactive</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Plan:</span>
                  <span class="plan-badge">Professional</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Monthly Value:</span>
                  <span class="detail-value">₦200,000</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Join Date:</span>
                  <span class="detail-value">Aug 10, 2025</span>
                </div>
              </div>
              <div class="customer-actions">
                <button class="action-btn primary">
                  <i class="bi bi-eye"></i> View Details
                </button>
                <button class="action-btn">
                  <i class="bi bi-telephone"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Table View (Initially Hidden) -->
          <div class="customers-table-container" id="customersTable">
            <table class="customers-table">
              <thead>
                <tr>
                  <th>Customer</th>
                  <th>Contact</th>
                  <th>Plan</th>
                  <th>Status</th>
                  <th>Monthly Value</th>
                  <th>Join Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr data-status="active" data-plan="enterprise">
                  <td>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                      <div class="table-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">TS</div>
                      <strong>Tech Solutions Ltd</strong>
                    </div>
                  </td>
                  <td>tech@solutions.com</td>
                  <td><span class="plan-badge">Enterprise</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><strong>₦300,000</strong></td>
                  <td>Oct 10, 2025</td>
                  <td>
                    <button class="action-btn" title="View Details"><i class="bi bi-eye"></i></button>
                    <button class="action-btn" title="Call"><i class="bi bi-telephone"></i></button>
                  </td>
                </tr>
                <tr data-status="active" data-plan="professional">
                  <td>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                      <div class="table-avatar" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">RE</div>
                      <strong>Retail Express</strong>
                    </div>
                  </td>
                  <td>contact@retailexpress.ng</td>
                  <td><span class="plan-badge">Professional</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><strong>₦200,000</strong></td>
                  <td>Nov 15, 2025</td>
                  <td>
                    <button class="action-btn" title="View Details"><i class="bi bi-eye"></i></button>
                    <button class="action-btn" title="Call"><i class="bi bi-telephone"></i></button>
                  </td>
                </tr>
                <tr data-status="active" data-plan="business">
                  <td>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                      <div class="table-avatar" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">FH</div>
                      <strong>Fashion Hub Nigeria</strong>
                    </div>
                  </td>
                  <td>info@fashionhub.ng</td>
                  <td><span class="plan-badge">Business</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><strong>₦150,000</strong></td>
                  <td>Dec 5, 2025</td>
                  <td>
                    <button class="action-btn" title="View Details"><i class="bi bi-eye"></i></button>
                    <button class="action-btn" title="Call"><i class="bi bi-telephone"></i></button>
                  </td>
                </tr>
                <tr data-status="trial" data-plan="business">
                  <td>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                      <div class="table-avatar" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">AP</div>
                      <strong>Auto Parts Co</strong>
                    </div>
                  </td>
                  <td>sales@autoparts.ng</td>
                  <td><span class="plan-badge">Business</span></td>
                  <td><span class="status-badge trial">Trial</span></td>
                  <td><strong>₦150,000</strong></td>
                  <td>Jan 5, 2026</td>
                  <td>
                    <button class="action-btn" title="View Details"><i class="bi bi-eye"></i></button>
                    <button class="action-btn" title="Call"><i class="bi bi-telephone"></i></button>
                  </td>
                </tr>
                <tr data-status="active" data-plan="enterprise">
                  <td>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                      <div class="table-avatar" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">LT</div>
                      <strong>Lagos Tech Hub</strong>
                    </div>
                  </td>
                  <td>hello@lagostech.ng</td>
                  <td><span class="plan-badge">Enterprise</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><strong>₦500,000</strong></td>
                  <td>Sep 20, 2025</td>
                  <td>
                    <button class="action-btn" title="View Details"><i class="bi bi-eye"></i></button>
                    <button class="action-btn" title="Call"><i class="bi bi-telephone"></i></button>
                  </td>
                </tr>
                <tr data-status="inactive" data-plan="professional">
                  <td>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                      <div class="table-avatar" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">GS</div>
                      <strong>Global Supplies Inc</strong>
                    </div>
                  </td>
                  <td>admin@globalsupplies.com</td>
                  <td><span class="plan-badge">Professional</span></td>
                  <td><span class="status-badge inactive">Inactive</span></td>
                  <td><strong>₦200,000</strong></td>
                  <td>Aug 10, 2025</td>
                  <td>
                    <button class="action-btn" title="View Details"><i class="bi bi-eye"></i></button>
                    <button class="action-btn" title="Call"><i class="bi bi-telephone"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
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
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const planFilter = document.getElementById('planFilter');
        const gridViewBtn = document.getElementById('gridViewBtn');
        const tableViewBtn = document.getElementById('tableViewBtn');
        const customersGrid = document.getElementById('customersGrid');
        const customersTable = document.getElementById('customersTable');
        
        // View Toggle
        gridViewBtn.addEventListener('click', function() {
          gridViewBtn.classList.add('active');
          tableViewBtn.classList.remove('active');
          customersGrid.style.display = 'grid';
          customersTable.classList.remove('active');
        });
        
        tableViewBtn.addEventListener('click', function() {
          tableViewBtn.classList.add('active');
          gridViewBtn.classList.remove('active');
          customersGrid.style.display = 'none';
          customersTable.classList.add('active');
        });
        
        // Filter Function
        function filterCustomers() {
          const searchTerm = searchInput.value.toLowerCase();
          const statusValue = statusFilter.value;
          const planValue = planFilter.value;
          
          // Filter Grid View
          const gridCards = customersGrid.querySelectorAll('.customer-card');
          gridCards.forEach(function(card) {
            const text = card.textContent.toLowerCase();
            const status = card.dataset.status;
            const plan = card.dataset.plan;
            
            const matchSearch = searchTerm === '' || text.includes(searchTerm);
            const matchStatus = statusValue === 'all' || status === statusValue;
            const matchPlan = planValue === 'all' || plan === planValue;
            
            card.style.display = (matchSearch && matchStatus && matchPlan) ? '' : 'none';
          });
          
          // Filter Table View
          const tableRows = customersTable.querySelectorAll('tbody tr');
          tableRows.forEach(function(row) {
            const text = row.textContent.toLowerCase();
            const status = row.dataset.status;
            const plan = row.dataset.plan;
            
            const matchSearch = searchTerm === '' || text.includes(searchTerm);
            const matchStatus = statusValue === 'all' || status === statusValue;
            const matchPlan = planValue === 'all' || plan === planValue;
            
            row.style.display = (matchSearch && matchStatus && matchPlan) ? '' : 'none';
          });
        }
        
        // Event Listeners for Filters
        searchInput.addEventListener('input', filterCustomers);
        statusFilter.addEventListener('change', filterCustomers);
        planFilter.addEventListener('change', filterCustomers);
        
        // Click to View Customer Details
        document.querySelectorAll('.customer-card, .customers-table tbody tr').forEach(function(element) {
          element.addEventListener('click', function(e) {
            // Prevent default if clicking on action buttons
            if (e.target.closest('.action-btn') || e.target.closest('button')) {
              return;
            }
            
            // Here you can add navigation to customer details page
            console.log('View customer details');
            // window.location.href = 'customer-details.php?id=...';
          });
        });
      });
    </script>
  </body>
</html>
