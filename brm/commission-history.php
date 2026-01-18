<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Payment History - SalesPilot</title>
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
        background: linear-gradient(135deg, #20c997 0%, #167a5c 100%);
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
      
      /* Payment Stats */
      .payment-stats {
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
      .stat-card.success { border-left-color: #198754; }
      .stat-card.pending { border-left-color: #ffc107; }
      .stat-card.recent { border-left-color: #17a2b8; }
      
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
      
      .stat-card.success .stat-icon {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .stat-card.pending .stat-icon {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .stat-card.recent .stat-icon {
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
      
      /* Payment History Table */
      .payment-history-section {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
      }
      
      .payment-history-section h4 {
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .filter-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
      }
      
      .filter-group {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
      }
      
      .filter-group select {
        padding: 0.5rem 1rem;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        font-size: 0.9rem;
      }
      
      .export-btn {
        background: linear-gradient(135deg, #20c997 0%, #167a5c 100%);
        color: white;
        border: none;
        padding: 0.5rem 1.25rem;
        border-radius: 6px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .export-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(32, 201, 151, 0.3);
      }
      
      .payment-table {
        width: 100%;
        border-collapse: collapse;
      }
      
      .payment-table thead {
        background: #f8f9fa;
      }
      
      .payment-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #dee2e6;
        font-size: 0.9rem;
      }
      
      .payment-table td {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        color: #495057;
        vertical-align: middle;
      }
      
      .payment-table tbody tr:hover {
        background: #f8f9fa;
      }
      
      .status-badge {
        display: inline-block;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
      }
      
      .status-badge.completed {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .status-badge.pending {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .status-badge.failed {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
      }
      
      .method-badge {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
      }
      
      .view-receipt-btn {
        background: transparent;
        border: 1px solid #667eea;
        color: #667eea;
        padding: 0.4rem 1rem;
        border-radius: 6px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .view-receipt-btn:hover {
        background: #667eea;
        color: white;
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
            <h1><i class="bi bi-receipt"></i> Payment History</h1>
            <p>View your commission payment history and transaction records</p>
          </div>
          
          <!-- Payment Stats -->
          <div class="payment-stats">


          <div class="stat-card total">
              <div class="stat-icon">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <h3>₦450,000</h3>
              <p>Total Earned</p>
            </div>

            <div class="stat-card total">
              <div class="stat-icon">
                <i class="bi bi-cash-coin"></i>
              </div>
              <h3>₦300,000</h3>
              <p>Total Paid Out</p>
            </div>
            
            <div class="stat-card success">
              <div class="stat-icon">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <h3>12</h3>
              <p>Completed Payments</p>
            </div>
            
            <!-- <div class="stat-card pending">
              <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
              </div>
              <h3>₦150,000</h3>
              <p>Pending Payout</p>
            </div> 
            
            <div class="stat-card recent">
              <div class="stat-icon">
                <i class="bi bi-calendar-check"></i>
              </div>
              <h3>Jan 5, 2026</h3>
              <p>Last Payment</p>
            </div> -->
          </div>
          
          <!-- Payment History Table -->
          <div class="payment-history-section">
            <h4><i class="bi bi-list-ul"></i> Transaction History</h4>
            
            <!-- Filter Bar -->
            <div class="filter-bar">
              <div class="filter-group">
                <select id="statusFilter">
                  <option value="all">All Status</option>
                  <option value="completed">Completed</option>
                  <option value="pending">Pending</option>
                  <option value="failed">Failed</option>
                </select>
                
                <select id="monthFilter">
                  <option value="all">All Months</option>
                  <option value="2026-01">January 2026</option>
                  <option value="2025-12">December 2025</option>
                  <option value="2025-11">November 2025</option>
                  <option value="2025-10">October 2025</option>
                </select>
              </div>
              
              <button id="exportPayments" class="export-btn">
                <i class="bi bi-download"></i> Export CSV
              </button>
            </div>
            
            <!-- Payment Table -->
            <div class="table-responsive">
              <table class="payment-table" id="paymentTable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="paymentTableBody">
                  <tr data-status="completed" data-month="2026-01">
                    <td>1</td>
                    <td>Jan 5, 2026</td>
                    <td><code>TXN-2026-001</code></td>
                    <td><strong>₦75,000</strong></td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td><button class="view-receipt-btn"><i class="bi bi-file-text"></i> Receipt</button></td>
                  </tr>
                  
                  <tr data-status="completed" data-month="2025-12">
                    <td>2</td>
                    <td>Dec 5, 2025</td>
                    <td><code>TXN-2025-012</code></td>
                    <td><strong>₦60,000</strong></td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td><button class="view-receipt-btn"><i class="bi bi-file-text"></i> Receipt</button></td>
                  </tr>
                  
                  <tr data-status="completed" data-month="2025-11">
                    <td>3</td>
                    <td>Nov 5, 2025</td>
                    <td><code>TXN-2025-011</code></td>
                    <td><strong>₦50,000</strong></td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td><button class="view-receipt-btn"><i class="bi bi-file-text"></i> Receipt</button></td>
                  </tr>
                  
                  <tr data-status="completed" data-month="2025-10">
                    <td>4</td>
                    <td>Oct 5, 2025</td>
                    <td><code>TXN-2025-010</code></td>
                    <td><strong>₦45,000</strong></td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td><button class="view-receipt-btn"><i class="bi bi-file-text"></i> Receipt</button></td>
                  </tr>
                  
                  <tr data-status="completed" data-month="2025-10">
                    <td>5</td>
                    <td>Sep 5, 2025</td>
                    <td><code>TXN-2025-009</code></td>
                    <td><strong>₦40,000</strong></td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td><button class="view-receipt-btn"><i class="bi bi-file-text"></i> Receipt</button></td>
                  </tr>
                  
                  <tr data-status="completed" data-month="2025-10">
                    <td>6</td>
                    <td>Aug 5, 2025</td>
                    <td><code>TXN-2025-008</code></td>
                    <td><strong>₦30,000</strong></td>
                    <td><span class="status-badge completed">Completed</span></td>
                    <td><button class="view-receipt-btn"><i class="bi bi-file-text"></i> Receipt</button></td>
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
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const statusFilter = document.getElementById('statusFilter');
        const monthFilter = document.getElementById('monthFilter');
        
        // Filter Function
        function filterPayments() {
          const statusValue = statusFilter.value;
          const monthValue = monthFilter.value;
          const rows = document.querySelectorAll('#paymentTableBody tr');
          
          rows.forEach(function(row) {
            const status = row.dataset.status;
            const month = row.dataset.month;
            
            const matchStatus = statusValue === 'all' || status === statusValue;
            const matchMonth = monthValue === 'all' || month === monthValue;
            
            row.style.display = (matchStatus && matchMonth) ? '' : 'none';
          });
        }
        
        statusFilter.addEventListener('change', filterPayments);
        monthFilter.addEventListener('change', filterPayments);
        
        // Export CSV
        document.getElementById('exportPayments').addEventListener('click', function() {
          const rows = [['Date', 'Transaction ID', 'Amount', 'Method', 'Status', 'Reference']];
          
          document.querySelectorAll('#paymentTableBody tr').forEach(function(r) {
            if (r.style.display !== 'none') {
              const cells = r.querySelectorAll('td');
              const date = cells[1].innerText.trim();
              const txnId = cells[2].innerText.trim();
              const amount = cells[3].innerText.trim();
              const method = cells[4].innerText.trim();
              const status = cells[5].innerText.trim();
              const reference = cells[6].innerText.trim();
              rows.push([date, txnId, amount, method, status, reference]);
            }
          });
          
          let csv = rows.map(r => r.map(c => '"' + String(c).replace(/"/g, '""') + '"').join(',')).join('\n');
          const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
          const url = URL.createObjectURL(blob);
          const a = document.createElement('a');
          a.href = url;
          a.download = 'payment_history_' + new Date().toISOString().split('T')[0] + '.csv';
          document.body.appendChild(a);
          a.click();
          a.remove();
          URL.revokeObjectURL(url);
        });
        
        // View Receipt
        document.querySelectorAll('.view-receipt-btn').forEach(function(btn) {
          btn.addEventListener('click', function() {
            alert('Receipt viewing feature coming soon!');
          });
        });
      });
    </script>
  </body>
</html>
