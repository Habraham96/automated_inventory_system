<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Completed Sales - SalesPilot</title>
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
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <?php include '../layouts/sidebar_styles.php'; ?>
    
    <!-- Custom Filter Styles -->
    <style>
      /* Button styling */
      .btn-wrapper {
        margin-bottom: 1rem;
      }
      
      .btn {
        border-radius: 8px !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
      }
      
      .btn:hover {
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
      }
      
      #exportSalesBtn:hover {
        background-color: #28a745 !important;
        transform: translateY(-2px) !important;
      }
      
      /* Table styling */
      .table th {
        border-top: none !important;
        font-weight: 600 !important;
        color: #495057 !important;
        background-color: #f8f9fa !important;
      }
      
      .table tbody tr {
        transition: background-color 0.3s ease !important;
      }
      
      .table tbody tr:hover {
        background-color: #f8f9fa !important;
      }
      
      /* Search and filter section */
      .filter-container .form-select,
      .filter-container .btn {
        min-height: 38px;
      }
      
      .form-control, .form-select {
        border-radius: 8px !important;
        border: 1px solid #dee2e6 !important;
        transition: all 0.3s ease !important;
      }
      
      .form-control:focus, .form-select:focus {
        border-color: #667eea !important;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25) !important;
      }
      
      /* Custom Date Filter Styling */
      .date-filter-wrapper {
        position: relative;
        display: inline-block;
      }
      
      #customDateInputs {
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        z-index: 1000;
        background: #ffffff;
        border: 2px solid #007bff;
        border-radius: 12px;
        padding: 16px;
        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2);
        min-width: 380px;
        opacity: 0;
        transform: translateY(-10px) scale(0.95);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        display: none;
      }
      
      #customDateInputs.show {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: all;
        display: block;
      }
      
      #customDateInputs::before {
        content: '';
        position: absolute;
        top: -8px;
        right: 20px;
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #007bff;
      }
      
      #customDateInputs::after {
        content: '';
        position: absolute;
        top: -6px;
        right: 21px;
        width: 0;
        height: 0;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #ffffff;
      }
      
      @media (max-width: 768px) {
        #customDateInputs {
          padding: 16px 18px;
          border-radius: 12px;
          min-width: 340px;
          margin-top: 6px;
        }
        
        .filter-container .col-md-8 {
          flex-direction: column;
          gap: 10px !important;
          align-items: stretch !important;
        }
        
        .filter-container .d-flex {
          flex-wrap: wrap;
        }
      }
      
      .main-panel {
        transition: margin-left 0.2s ease !important;
        margin-left: 280px !important;
      }
      
      .main-panel.sidebar-collapsed {
        margin-left: 70px !important;
      }
      
      /* Clickable rows */
      #completedSalesTable tbody tr {
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      #completedSalesTable tbody tr:hover {
        background-color: #f8f9fa !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }
      
      #completedSalesTable tbody tr.selected {
        background-color: #e3f2fd !important;
        border-left: 4px solid #2196F3;
      }
      
      #completedSalesTable tbody tr[data-clickable="true"] {
        position: relative;
      }
      
      /* Side panel styles */
      .details-panel {
        position: fixed;
        top: 0;
        right: -400px;
        width: 400px;
        height: 100vh;
        background: white;
        box-shadow: -2px 0 10px rgba(0,0,0,0.1);
        transition: right 0.3s ease;
        z-index: 1050;
        overflow-y: auto;
      }
      
      .details-panel.open {
        right: 0;
      }
      
      .details-panel-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1040;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
      }
      
      .details-panel-backdrop.show {
        opacity: 1;
        visibility: visible;
      }
      
      .details-panel-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-bottom: 1px solid #e9ecef;
      }
      
      .details-panel-body {
        padding: 1.5rem;
      }
      
      .detail-item {
        margin-bottom: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #667eea;
      }
      
      .detail-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
      }
      
      .detail-value {
        color: #6c757d;
        font-size: 0.95rem;
      }
      
      .items-list {
        max-height: 300px;
        overflow-y: auto;
      }
      
      .item-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem;
        border-bottom: 1px solid #e9ecef;
      }
      
      .item-row:last-child {
        border-bottom: none;
      }
    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- Sidebar include -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Completed Sales content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                      <div>
                        <h4 class="card-title mb-0">Completed Sales</h4>
                        <p class="card-description">List of completed sales transactions.</p>
                      </div>
                    </div>
                    
                    <!-- Modern Search and Filter Options -->
                    <div class="row mb-3 filter-container">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search completed sales..." id="searchSales">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Seller Filter -->
                        <select class="form-select" id="sellerFilter" style="max-width: 140px;">
                          <option value="">All Sellers</option>
                          <option value="Alice Johnson">Alice Johnson</option>
                          <option value="Bob Smith">Bob Smith</option>
                          <option value="Carol Williams">Carol Williams</option>
                          <option value="David Brown">David Brown</option>
                        </select>
                        
                        <!-- Status Filter -->
                        <select class="form-select" id="statusFilter" style="max-width: 140px;">
                          <option value="">All Status</option>
                          <option value="Completed">Completed</option>
                          <option value="Pending">Pending</option>
                          <option value="Cancelled">Cancelled</option>
                        </select>
                        
                        <!-- Date Range Filter -->
                        <div class="date-filter-wrapper">
                          <select class="form-select" id="dateRangeFilter" style="max-width: 140px;">
                            <option value="">All Dates</option>
                            <option value="today">Today</option>
                            <option value="yesterday">Yesterday</option>
                            <option value="last7">Last 7 Days</option>
                            <option value="last30">Last 30 Days</option>
                            <option value="thisMonth">This Month</option>
                            <option value="lastMonth">Last Month</option>
                            <option value="custom">Custom Range</option>
                          </select>
                          
                          <!-- Custom Date Inputs -->
                          <div id="customDateInputs" class="custom-date-container">
                            <div class="row g-3">
                              <div class="col-md-6">
                                <label for="customStartDate" class="form-label text-muted">From Date</label>
                                <input type="date" class="form-control" id="customStartDate" onchange="performSearch()">
                              </div>
                              <div class="col-md-6">
                                <label for="customEndDate" class="form-label text-muted">To Date</label>
                                <input type="date" class="form-control" id="customEndDate" onchange="performSearch()">
                              </div>
                            </div>
                            <div class="text-center mt-3">
                              <button type="button" class="btn btn-outline-secondary btn-sm" onclick="hideCustomDateOverlay()">
                                <i class="bi bi-x"></i> Close
                              </button>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <button class="btn btn-outline-primary" id="applyFilters">
                          <i class="bi bi-funnel"></i> Apply
                        </button>
                        <button class="btn btn-outline-secondary" id="clearFilters">
                          <i class="bi bi-x-circle"></i> Clear
                        </button>
                        <button class="btn btn-outline-success" id="exportReport">
                          <i class="bi bi-download"></i> Export
                        </button>
                      </div>
                    </div><br>
                    
                    <div class="table-responsive">
                      <table class="table table-striped" id="completedSalesTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Sold by:</th>
                            <th>Total</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>INV-001</td>
                            <td>Oct 14, 2025 10:30:00 AM</td>
                            <td>John Doe</td>
                            <td>Alice Johnson</td>
                            <td>₦12000.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>INV-002</td>
                            <td>Oct 15, 2025 11:15:00 AM</td>
                            <td>Jane Smith</td>
                            <td>Bob Smith</td>
                            <td>₦25050</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>INV-003</td>
                            <td>Oct 15, 2025 4:45:20 PM</td>
                            <td>Michael Brown</td>
                            <td>Carol Williams</td>
                            <td>₦8900.99</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>INV-004</td>
                            <td>Oct 17, 2025 1:20:15 PM</td>
                            <td>Sarah Johnson</td>
                            <td>Alice Johnson</td>
                            <td>₦17525</td>
                            <td><span class="badge badge-opacity-warning">Pending</span></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>INV-005</td>
                            <td>Oct 18, 2025 10:30:45 AM</td>
                            <td>David Wilson</td>
                            <td>David Brown</td>
                            <td>₦32000.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!-- Pagination and Info -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div class="text-muted small">
                        Showing <strong>1-5</strong> of <strong>5</strong> entries
                      </div>
                      <nav aria-label="Table pagination">
                        <ul class="pagination pagination-sm mb-0">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
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
          <!-- Completed Sales content ends here -->
           <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
        </div>
        <!-- content-wrapper ends -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      
      <!-- Side Panel for Sale Details -->
      <div class="details-panel-backdrop" id="detailsBackdrop"></div>
      <div class="details-panel" id="detailsPanel">
            <div class="details-panel-header">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                  <i class="bi bi-receipt me-2"></i>Sale Details
                </h5>
                <button type="button" class="btn btn-sm btn-light" id="closePanelBtn">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>
            </div>
            <div class="details-panel-body">
              <div class="detail-item">
                <div class="detail-label">Invoice Number</div>
                <div class="detail-value" id="detailInvoice">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Transaction Date</div>
                <div class="detail-value" id="detailDate">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Customer Information</div>
                <div class="detail-value" id="detailCustomer">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Sales Representative</div>
                <div class="detail-value" id="detailSeller">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Transaction Status</div>
                <div class="detail-value" id="detailStatus">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Total Amount</div>
                <div class="detail-value" id="detailTotal">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Items Purchased</div>
                <div class="items-list" id="detailItems">
                  <div class="item-row">
                    <div>
                      <strong>Sample Product 1</strong><br>
                      <small class="text-muted">Qty: 2 × $25.00</small>
                    </div>
                    <div class="text-end">
                      <strong>$50.00</strong>
                    </div>
                  </div>
                  <div class="item-row">
                    <div>
                      <strong>Sample Product 2</strong><br>
                      <small class="text-muted">Qty: 1 × $70.00</small>
                    </div>
                    <div class="text-end">
                      <strong>$70.00</strong>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Payment Information</div>
                <div class="detail-value">
                  <div>Method: <strong>Cash</strong></div>
                  <div>Amount Paid: <strong>$120.00</strong></div>
                  <div>Change: <strong>$0.00</strong></div>
                </div>
              </div>
              
              <div class="mt-3">
                <button class="btn btn-primary w-100 mb-2">
                  <i class="bi bi-printer me-2"></i>Print Receipt
                </button>
                <button class="btn btn-outline-secondary w-100">
                  <i class="bi bi-arrow-return-left me-2"></i>Process Refund
                </button>
              </div>
            </div>
      </div>
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- endinject -->
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
    
    <!-- Include Sidebar Scripts -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    <!-- Sidebar Menu Behavior - Keep Sales menu expanded on page load -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Side panel elements
      const detailsPanel = document.getElementById('detailsPanel');
      const detailsBackdrop = document.getElementById('detailsBackdrop');
      const closePanelBtn = document.getElementById('closePanelBtn');
      const salesTable = document.getElementById('completedSalesTable');
      
      // Sample detailed data for each invoice
      const salesDetails = {
        'INV-001': {
          invoice: 'INV-001',
          date: 'Oct 14, 2025 2:30:00 PM',
          customer: 'John Doe\n📞 +1-555-0123\n📧 john.doe@email.com',
          seller: 'Alice Johnson',
          status: 'Completed',
          total: '$120.00',
          items: [
            { name: 'Wireless Headphones', qty: 1, price: 89.99, total: 89.99 },
            { name: 'Phone Case', qty: 2, price: 15.00, total: 30.00 }
          ],
          payment: { method: 'Cash', paid: 120.00, change: 0.00 }
        },
        'INV-002': {
          invoice: 'INV-002',
          date: 'Oct 15, 2025 4:45:00 PM',
          customer: 'Jane Smith\n📞 +1-555-0456\n📧 jane.smith@email.com',
          seller: 'Bob Smith',
          status: 'Completed',
          total: '$250.50',
          items: [
            { name: 'Bluetooth Speaker', qty: 1, price: 120.00, total: 120.00 },
            { name: 'USB Cable', qty: 3, price: 12.50, total: 37.50 },
            { name: 'Power Bank', qty: 1, price: 93.00, total: 93.00 }
          ],
          payment: { method: 'Credit Card', paid: 250.50, change: 0.00 }
        },
        'INV-003': {
          invoice: 'INV-003',
          date: 'Oct 16, 2025 10:20:00 AM',
          customer: 'Michael Brown\n📞 +1-555-0789\n📧 michael.brown@email.com',
          seller: 'Carol Williams',
          status: 'Completed',
          total: '$89.99',
          items: [
            { name: 'Gaming Mouse', qty: 1, price: 89.99, total: 89.99 }
          ],
          payment: { method: 'Cash', paid: 90.00, change: 0.01 }
        },
        'INV-004': {
          invoice: 'INV-004',
          date: 'Oct 17, 2025 1:15:00 PM',
          customer: 'Sarah Johnson\n📞 +1-555-0321\n📧 sarah.johnson@email.com',
          seller: 'Alice Johnson',
          status: 'Pending',
          total: '$175.25',
          items: [
            { name: 'Tablet Stand', qty: 2, price: 45.00, total: 90.00 },
            { name: 'Screen Protector', qty: 5, price: 17.05, total: 85.25 }
          ],
          payment: { method: 'Bank Transfer', paid: 0.00, change: 0.00 }
        },
        'INV-005': {
          invoice: 'INV-005',
          date: 'Oct 18, 2025 11:00:00 AM',
          customer: 'David Wilson\n📞 +1-555-0654\n📧 david.wilson@email.com',
          seller: 'David Brown',
          status: 'Completed',
          total: '$320.00',
          items: [
            { name: 'Laptop Bag', qty: 1, price: 65.00, total: 65.00 },
            { name: 'Wireless Keyboard', qty: 1, price: 155.00, total: 155.00 },
            { name: 'Optical Mouse', qty: 2, price: 50.00, total: 100.00 }
          ],
          payment: { method: 'Cash', paid: 320.00, change: 0.00 }
        }
      };
      
      // Function to open side panel
      function openSidePanel(invoiceNumber) {
        const details = salesDetails[invoiceNumber];
        if (!details) return;
        
        // Populate panel with data
        document.getElementById('detailInvoice').textContent = details.invoice;
        document.getElementById('detailDate').textContent = details.date;
        document.getElementById('detailCustomer').innerHTML = details.customer.replace(/\n/g, '<br>');
        document.getElementById('detailSeller').textContent = details.seller;
        document.getElementById('detailStatus').innerHTML = `<span class="badge badge-opacity-${details.status === 'Completed' ? 'success' : details.status === 'Pending' ? 'warning' : 'danger'}">${details.status}</span>`;
        document.getElementById('detailTotal').textContent = details.total;
        
        // Populate items list
        const itemsList = document.getElementById('detailItems');
        itemsList.innerHTML = '';
        details.items.forEach(item => {
          const itemRow = document.createElement('div');
          itemRow.className = 'item-row';
          itemRow.innerHTML = `
            <div>
              <strong>${item.name}</strong><br>
              <small class="text-muted">Qty: ${item.qty} × $${item.price.toFixed(2)}</small>
            </div>
            <div class="text-end">
              <strong>$${item.total.toFixed(2)}</strong>
            </div>
          `;
          itemsList.appendChild(itemRow);
        });
        
        // Update payment info
        const paymentInfo = itemsList.parentElement.nextElementSibling.querySelector('.detail-value');
        paymentInfo.innerHTML = `
          <div>Method: <strong>${details.payment.method}</strong></div>
          <div>Amount Paid: <strong>$${details.payment.paid.toFixed(2)}</strong></div>
          <div>Change: <strong>$${details.payment.change.toFixed(2)}</strong></div>
        `;
        
        // Show panel
        detailsBackdrop.classList.add('show');
        detailsPanel.classList.add('open');
      }
      
      // Function to close side panel
      function closeSidePanel() {
        detailsBackdrop.classList.remove('show');
        detailsPanel.classList.remove('open');
        // Remove selected class from all rows
        document.querySelectorAll('#completedSalesTable tbody tr').forEach(row => {
          row.classList.remove('selected');
        });
      }
      
      // Add click event to table rows
      salesTable.addEventListener('click', function(e) {
        const row = e.target.closest('tbody tr');
        if (row) {
          // Remove selected class from all rows
          document.querySelectorAll('#completedSalesTable tbody tr').forEach(r => {
            r.classList.remove('selected');
          });
          
          // Add selected class to clicked row
          row.classList.add('selected');
          
          // Get invoice number from the row
          const invoiceNumber = row.cells[1].textContent.trim();
          openSidePanel(invoiceNumber);
        }
      });
      
      // Add data-clickable attribute to all table rows for better UX
      document.querySelectorAll('#completedSalesTable tbody tr').forEach(row => {
        row.setAttribute('data-clickable', 'true');
      });
      
      // Close panel events
      closePanelBtn.addEventListener('click', closeSidePanel);
      detailsBackdrop.addEventListener('click', closeSidePanel);
      
      // Close panel with Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && detailsPanel.classList.contains('open')) {
          closeSidePanel();
        }
      });

      // Export functionality
      const exportBtn = document.getElementById('exportSalesBtn');
      if (exportBtn) {
        exportBtn.addEventListener('click', function() {
          exportBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Exporting...';
          exportBtn.disabled = true;
          
          // Get table data
          const table = document.getElementById('completedSalesTable');
          const rows = table.querySelectorAll('tbody tr:not([style*="display: none"])');
          let csvContent = 'S/N,Invoice,Date,Customer,Sold by,Total,Status\n';
          
          rows.forEach(row => {
            const rowData = [
              row.cells[0].textContent.trim(),
              row.cells[1].textContent.trim(),
              row.cells[2].textContent.trim(),
              row.cells[3].textContent.trim(),
              row.cells[4].textContent.trim(),
              row.cells[5].textContent.trim(),
              row.cells[6].textContent.trim()
            ];
            csvContent += rowData.map(field => `"${field.replace(/"/g, '""')}"`).join(',') + '\n';
          });
          
          // Create and download CSV file
          const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
          const link = document.createElement('a');
          const url = URL.createObjectURL(blob);
          link.setAttribute('href', url);
          link.setAttribute('download', `completed_sales_${new Date().toISOString().split('T')[0]}.csv`);
          link.style.visibility = 'hidden';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
          
          // Reset button state
          setTimeout(() => {
            exportBtn.innerHTML = '<i class="bi bi-download"></i> Export';
            exportBtn.disabled = false;
          }, 1000);
        });
      }

      
    });
    </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->

    <!-- Search and Filter functionality -->
    <script>
      // Overlay logic for custom date inputs
      function showCustomDateOverlay() {
        document.getElementById('customDateInputs').classList.add('show');
      }
      
      function hideCustomDateOverlay() {
        document.getElementById('customDateInputs').classList.remove('show');
      }
      
      function performSearch() {
        // Search functionality implementation
        console.log('Performing search...');
      }
      
      document.addEventListener('DOMContentLoaded', function() {
        var dateRangeFilter = document.getElementById('dateRangeFilter');
        dateRangeFilter.addEventListener('change', function() {
          if (this.value === 'custom') {
            showCustomDateOverlay();
          } else {
            hideCustomDateOverlay();
          }
        });
        
        // Apply filters button
        document.getElementById('applyFilters').addEventListener('click', function() {
          performSearch();
        });
        
        // Clear filters button
        document.getElementById('clearFilters').addEventListener('click', function() {
          document.getElementById('searchSales').value = '';
          document.getElementById('sellerFilter').value = '';
          document.getElementById('statusFilter').value = '';
          document.getElementById('dateRangeFilter').value = '';
          document.getElementById('customStartDate').value = '';
          document.getElementById('customEndDate').value = '';
          hideCustomDateOverlay();
          performSearch();
        });
        
        // Export button
        document.getElementById('exportReport').addEventListener('click', function() {
          // Export table to CSV
          function tableToCSV(tableId) {
            var table = document.getElementById(tableId);
            var rows = table.querySelectorAll('tr');
            var csv = [];
            for (var i = 0; i < rows.length; i++) {
              var row = [], cols = rows[i].querySelectorAll('th, td');
              for (var j = 0; j < cols.length - 1; j++) { // Exclude action column
                var text = cols[j].innerText.replace(/"/g, '""');
                if (text.indexOf(',') !== -1 || text.indexOf('"') !== -1) {
                  text = '"' + text + '"';
                }
                row.push(text);
              }
              csv.push(row.join(','));
            }
            return csv.join('\n');
          }
          
          function downloadCSV(csv, filename) {
            var csvFile = new Blob([csv], { type: 'text/csv' });
            var downloadLink = document.createElement('a');
            downloadLink.download = filename;
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = 'none';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
          }
          
          var csv = tableToCSV('completedSalesTable');
          downloadCSV(csv, 'completed_sales_report.csv');
        });
        
        // Close overlay when clicking outside
        document.addEventListener('click', function(e) {
          const overlay = document.getElementById('customDateInputs');
          const dateFilter = document.getElementById('dateRangeFilter');
          if (!overlay.contains(e.target) && !dateFilter.contains(e.target)) {
            hideCustomDateOverlay();
          }
        });
        
        // Close overlay with Escape key
        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape') {
            hideCustomDateOverlay();
          }
        });
      });
    </script>

  </body>
</html>
                                  