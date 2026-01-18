<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BRM Dashboard - SalesPilot</title>
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
      /* Dashboard Header */
      .dashboard-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      }
      
      .dashboard-header h1 {
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: white;
      }
      
      .dashboard-header p {
        margin-bottom: 0;
        opacity: 0.9;
      }
      
      /* Stats Cards */
      .stats-grid {
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
      
      .stat-card.primary { border-left-color: #667eea; }
      .stat-card.success { border-left-color: #198754; }
      .stat-card.warning { border-left-color: #ffc107; }
      .stat-card.info { border-left-color: #17a2b8; }
      
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
      
      .stat-card.primary .stat-icon {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
      }
      
      .stat-card.success .stat-icon {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .stat-card.warning .stat-icon {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .stat-card.info .stat-icon {
        background: rgba(23, 162, 184, 0.1);
        color: #17a2b8;
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
      
      /* Quick Actions */
      .quick-actions {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      }
      
      .quick-actions h4 {
        margin-bottom: 1.25rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .action-buttons {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
      }
      
      .action-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1rem 1.25rem;
        border-radius: 8px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
      }
      
      .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        color: white;
      }
      
      .action-btn i {
        font-size: 1.25rem;
      }
      
      /* Recent Activity */
      .activity-section {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      }
      
      .activity-section h4 {
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .activity-list {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      
      .activity-item {
        display: flex;
        align-items: start;
        gap: 1rem;
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        transition: background 0.2s ease;
      }
      
      .activity-item:last-child {
        border-bottom: none;
      }
      
      .activity-item:hover {
        background: #f8f9fa;
      }
      
      .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
      }
      
      .activity-icon.new {
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
      }
      
      .activity-icon.success {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .activity-icon.warning {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .activity-content {
        flex: 1;
      }
      
      .activity-content h6 {
        margin-bottom: 0.25rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .activity-content p {
        margin-bottom: 0;
        color: #6c757d;
        font-size: 0.85rem;
      }
      
      .activity-time {
        color: #6c757d;
        font-size: 0.8rem;
        white-space: nowrap;
      }
      
      /* Performance Chart */
      .chart-section {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      }
      
      .chart-section h4 {
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .chart-placeholder {
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        border-radius: 8px;
        color: #6c757d;
      }
      
      /* Leads Table */
      .leads-section {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      }
      
      .leads-section h4 {
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .leads-table {
        width: 100%;
        border-collapse: collapse;
      }
      
      .leads-table thead {
        background: #f8f9fa;
      }
      
      .leads-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #e9ecef;
      }
      
      .leads-table td {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        color: #495057;
      }
      
      .leads-table tbody tr:hover {
        background: #f8f9fa;
      }
      
      .status-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
      }
      
      .status-badge.new {
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
      }
      
      .status-badge.contacted {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .status-badge.qualified {
        background: rgba(23, 162, 184, 0.1);
        color: #17a2b8;
      }
      
      .status-badge.converted {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
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
          
          <!-- Dashboard Header -->
          <div class="dashboard-header">
            <h1><i class="bi bi-speedometer2"></i> BRM Dashboard</h1>
            <p>Welcome back! Here's your performance overview</p>
          </div>
          
          <!-- Stats Grid -->
          <div class="stats-grid">
            <div style="background: rgba(13, 110, 253, 0.1); border-left: 4px solid #0d6efd; border-radius: 10px; padding: 1.5rem; display: flex; align-items: center; gap: 1rem;">
              <div style="width: 50px; height: 50px; border-radius: 10px; background: rgba(13, 110, 253, 0.15); color: #0d6efd; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="bi bi-bell-fill"></i>
              </div>
              <p style="margin: 0; color: #0d6efd; font-size: 1.1rem; font-weight: 500;">You have 10 customers registered this month</p>
            </div>
          </div>
          
          <!-- Quick Actions -->
          <div class="quick-actions">
            <h4><i class="bi bi-lightning-fill"></i> Quick Actions</h4>
            <div class="action-buttons">
              <a href="customers.php" class="action-btn">
                <i class="bi bi-people-fill"></i>
                <span>View Customers</span>
              </a>
              <a href="commissions.php" class="action-btn">
                <i class="bi bi-cash-stack"></i>
                <span>Commission Report</span>
              </a>
              <a href="performance.php" class="action-btn">
                <i class="bi bi-graph-up"></i>
                <span>View Performance</span>
              </a>
            </div>
          </div>
          
          <div class="row">
            <!-- Recent Activity -->
            <div class="col-lg-6 mb-4">
              <div class="activity-section">
                <h4><i class="bi bi-clock-history"></i> Recent Activity</h4>
                <ul class="activity-list">
                  <li class="activity-item">
                    <div class="activity-icon success">
                      <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="activity-content">
                      <h6>Subscribed</h6>
                      <p>John Doe accepted subscription plan</p>
                    </div>
                    <div class="activity-time">2 hours ago</div>
                  </li>
                  
                  <li class="activity-item">
                    <div class="activity-icon new">
                      <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div class="activity-content">
                      <h6>New Customer Added</h6>
                      <p>Sarah Johnson - Tech Solutions Ltd</p>
                    </div>
                    <div class="activity-time">5 hours ago</div>
                  </li>
                  
                  <li class="activity-item">
                    <div class="activity-icon warning">
                      <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="activity-content">
                      <h6>Follow-up Required</h6>
                      <p>Contact Michael Brown regarding proposal</p>
                    </div>
                    <div class="activity-time">1 day ago</div>
                  </li>
                  
                  <li class="activity-item">
                    <div class="activity-icon success">
                      <i class="bi bi-cash"></i>
                    </div>
                    <div class="activity-content">
                      <h6>Commission Earned</h6>
                      <p>₦5,000 commission from new subscription</p>
                    </div>
                    <div class="activity-time">2 days ago</div>
                  </li>
                </ul>
              </div>
            </div>
            
            <!-- Performance Chart -->
            <div class="col-lg-6 mb-4">
              <div class="chart-section">
                <h4><i class="bi bi-graph-up"></i> Monthly Performance</h4>
                <div class="chart-placeholder">
                  <p><i class="bi bi-bar-chart" style="font-size: 3rem;"></i><br>Chart visualization coming soon</p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Recent Leads -->
          <div class="leads-section">
            <h4><i class="bi bi-star-fill"></i> Recent Leads</h4>
            <div class="table-responsive">
              <table class="leads-table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Sarah Johnson</td>
                    <td>Tech Solutions Ltd</td>
                    <td>sarah@techsol.com</td>
                    <td><span class="status-badge new">New</span></td>
                    <td>Jan 11, 2026</td>
                    <td><button class="btn btn-sm btn-primary">View</button></td>
                  </tr>
                  <tr>
                    <td>Michael Brown</td>
                    <td>Retail Express</td>
                    <td>michael@retail.com</td>
                    <td><span class="status-badge contacted">Contacted</span></td>
                    <td>Jan 10, 2026</td>
                    <td><button class="btn btn-sm btn-primary">View</button></td>
                  </tr>
                  <tr>
                    <td>Emily Davis</td>
                    <td>Fashion Hub</td>
                    <td>emily@fashion.com</td>
                    <td><span class="status-badge qualified">Qualified</span></td>
                    <td>Jan 9, 2026</td>
                    <td><button class="btn btn-sm btn-primary">View</button></td>
                  </tr>
                  <tr>
                    <td>James Wilson</td>
                    <td>Auto Parts Co</td>
                    <td>james@autoparts.com</td>
                    <td><span class="status-badge converted">Converted</span></td>
                    <td>Jan 8, 2026</td>
                    <td><button class="btn btn-sm btn-success">Details</button></td>
                  </tr>
                </tbody>
              </table>
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
  </body>
</html>
