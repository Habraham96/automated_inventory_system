<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Performance - SalesPilot</title>
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
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
      
      /* Performance Stats */
      .performance-stats {
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
      
      .stat-card.customers { border-left-color: #667eea; }
      .stat-card.conversions { border-left-color: #198754; }
      .stat-card.revenue { border-left-color: #ffc107; }
      .stat-card.rate { border-left-color: #17a2b8; }
      
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
      
      .stat-card.customers .stat-icon {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
      }
      
      .stat-card.conversions .stat-icon {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .stat-card.revenue .stat-icon {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .stat-card.rate .stat-icon {
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
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
      }
      
      .stat-trend {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        margin-top: 0.5rem;
      }
      
      .stat-trend.positive {
        color: #198754;
      }
      
      .stat-trend.negative {
        color: #dc3545;
      }
      
      /* Charts Section */
      .charts-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }
      
      .chart-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      }
      
      .chart-card h4 {
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
        flex-direction: column;
      }
      
      .chart-placeholder i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.3;
      }
      
      /* Leaderboard */
      .leaderboard-section {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
      }
      
      .leaderboard-section h4 {
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .leaderboard-list {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      
      .leaderboard-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        transition: background 0.2s ease;
      }
      
      .leaderboard-item:last-child {
        border-bottom: none;
      }
      
      .leaderboard-item:hover {
        background: #f8f9fa;
      }
      
      .leaderboard-rank {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
      }
      
      .leaderboard-rank.gold {
        background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        color: white;
      }
      
      .leaderboard-rank.silver {
        background: linear-gradient(135deg, #e0e0e0 0%, #c0c0c0 100%);
        color: #333;
      }
      
      .leaderboard-rank.bronze {
        background: linear-gradient(135deg, #cd7f32 0%, #b87333 100%);
        color: white;
      }
      
      .leaderboard-rank.regular {
        background: #f8f9fa;
        color: #6c757d;
      }
      
      .leaderboard-info {
        flex: 1;
      }
      
      .leaderboard-info h6 {
        margin-bottom: 0.25rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .leaderboard-info p {
        margin-bottom: 0;
        color: #6c757d;
        font-size: 0.85rem;
      }
      
      .leaderboard-value {
        font-weight: 700;
        font-size: 1.1rem;
        color: #667eea;
      }
      
      /* Achievements */
      .achievements-section {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      }
      
      .achievements-section h4 {
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .achievements-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1rem;
      }
      
      .achievement-badge {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 10px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
      }
      
      .achievement-badge:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(102, 126, 234, 0.3);
      }
      
      .achievement-badge i {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
        display: block;
      }
      
      .achievement-badge h6 {
        margin-bottom: 0.25rem;
        font-weight: 600;
      }
      
      .achievement-badge p {
        margin-bottom: 0;
        font-size: 0.85rem;
        opacity: 0.9;
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
            <h1><i class="bi bi-graph-up"></i> Performance Dashboard</h1>
            <p>Track your sales performance and achievements</p>
          </div>
          
          <!-- Performance Stats -->
          <div class="performance-stats">
            <div class="stat-card customers">
              <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
              </div>
              <h3>145</h3>
              <p>Total Customers</p>
              <div class="stat-trend positive">
                <i class="bi bi-arrow-up"></i> +12% from last month
              </div>
            </div>
            
            <div class="stat-card conversions">
              <div class="stat-icon">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <h3>23</h3>
              <p>This Month Conversions</p>
              <div class="stat-trend positive">
                <i class="bi bi-arrow-up"></i> +18% from last month
              </div>
            </div>
            
            <div class="stat-card revenue">
              <div class="stat-icon">
                <i class="bi bi-cash-stack"></i>
              </div>
              <h3>₦4.5M</h3>
              <p>Total Revenue Generated</p>
              <div class="stat-trend positive">
                <i class="bi bi-arrow-up"></i> +25% from last month
              </div>
            </div>
            
            <div class="stat-card rate">
              <div class="stat-icon">
                <i class="bi bi-percent"></i>
              </div>
              <h3>68%</h3>
              <p>Conversion Rate</p>
              <div class="stat-trend positive">
                <i class="bi bi-arrow-up"></i> +5% from last month
              </div>
            </div>
          </div>
          
          <!-- Charts -->
          <div class="charts-row">
            <div class="chart-card">
              <h4><i class="bi bi-graph-up"></i> Monthly Performance</h4>
              <div class="chart-placeholder">
                <i class="bi bi-bar-chart"></i>
                <p>Sales performance chart visualization</p>
              </div>
            </div>
            
            <div class="chart-card">
              <h4><i class="bi bi-pie-chart"></i> Customer Distribution</h4>
              <div class="chart-placeholder">
                <i class="bi bi-pie-chart-fill"></i>
                <p>Customer plan distribution chart</p>
              </div>
            </div>
          </div>
          
          <div class="row">
            <!-- Leaderboard -->
            <div class="col-lg-6 mb-4">
              <div class="leaderboard-section">
                <h4><i class="bi bi-trophy-fill"></i> BRM Leaderboard</h4>
                <ul class="leaderboard-list">
                  <li class="leaderboard-item">
                    <div class="leaderboard-rank gold">1</div>
                    <div class="leaderboard-info">
                      <h6>You</h6>
                      <p>145 customers • 68% conversion</p>
                    </div>
                    <div class="leaderboard-value">₦450K</div>
                  </li>
                  
                  <li class="leaderboard-item">
                    <div class="leaderboard-rank silver">2</div>
                    <div class="leaderboard-info">
                      <h6>Sarah Johnson</h6>
                      <p>132 customers • 65% conversion</p>
                    </div>
                    <div class="leaderboard-value">₦420K</div>
                  </li>
                  
                  <li class="leaderboard-item">
                    <div class="leaderboard-rank bronze">3</div>
                    <div class="leaderboard-info">
                      <h6>Michael Chen</h6>
                      <p>118 customers • 62% conversion</p>
                    </div>
                    <div class="leaderboard-value">₦385K</div>
                  </li>
                  
                  <li class="leaderboard-item">
                    <div class="leaderboard-rank regular">4</div>
                    <div class="leaderboard-info">
                      <h6>Emily Davis</h6>
                      <p>105 customers • 58% conversion</p>
                    </div>
                    <div class="leaderboard-value">₦340K</div>
                  </li>
                  
                  <li class="leaderboard-item">
                    <div class="leaderboard-rank regular">5</div>
                    <div class="leaderboard-info">
                      <h6>James Wilson</h6>
                      <p>98 customers • 55% conversion</p>
                    </div>
                    <div class="leaderboard-value">₦320K</div>
                  </li>
                </ul>
              </div>
            </div>
            
            <!-- Achievements -->
            <div class="col-lg-6 mb-4">
              <div class="achievements-section">
                <h4><i class="bi bi-award-fill"></i> Achievements & Badges</h4>
                <div class="achievements-grid">
                  <div class="achievement-badge">
                    <i class="bi bi-trophy-fill"></i>
                    <h6>Top Performer</h6>
                    <p>Rank #1 This Month</p>
                  </div>
                  
                  <div class="achievement-badge" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="bi bi-star-fill"></i>
                    <h6>100 Customers</h6>
                    <p>Century Club</p>
                  </div>
                  
                  <div class="achievement-badge" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="bi bi-lightning-fill"></i>
                    <h6>Fast Closer</h6>
                    <p>20 Deals in a Month</p>
                  </div>
                  
                  <div class="achievement-badge" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="bi bi-graph-up-arrow"></i>
                    <h6>Growth Leader</h6>
                    <p>+25% Month Growth</p>
                  </div>
                  
                  <div class="achievement-badge" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <i class="bi bi-gem"></i>
                    <h6>Premium Seller</h6>
                    <p>10 Enterprise Deals</p>
                  </div>
                  
                  <div class="achievement-badge" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                    <i class="bi bi-fire"></i>
                    <h6>Hot Streak</h6>
                    <p>7 Days Consecutive</p>
                  </div>
                </div>
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
        // Achievement badges click interaction
        document.querySelectorAll('.achievement-badge').forEach(function(badge) {
          badge.addEventListener('click', function() {
            const title = this.querySelector('h6').textContent;
            const description = this.querySelector('p').textContent;
            alert('Achievement: ' + title + '\n' + description);
          });
        });
      });
    </script>
  </body>
</html>
