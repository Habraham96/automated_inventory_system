<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Returns - SalesPilot</title>
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../Manager/assets/js/select.dataTables.min.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php include 'layouts/sidebar_styles.php'; ?>
    <style>
      .main-panel { margin-left: 280px !important; transition: margin-left 0.2s ease !important; }
      body.sidebar-collapsed .main-panel { margin-left: 70px !important; }
      
      .table tbody tr { cursor: pointer; transition: all 0.3s ease; }
      .table tbody tr:hover { background-color: #f8f9fa !important; transform: translateY(-1px); box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
      .table tbody tr.clicked { background-color: #ffeaea !important; border-left: 4px solid #dc3545; }
      
      .return-details-panel { position: fixed; top: 0; right: -100%; width: 450px; height: 100vh; background: white; box-shadow: -5px 0 15px rgba(0,0,0,0.1); z-index: 1050; transition: all 0.3s ease; overflow-y: auto; }
      .return-details-panel.active { right: 0; }
      
      .panel-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1049; opacity: 0; visibility: hidden; transition: all 0.3s ease; }
      .panel-overlay.active { opacity: 1; visibility: visible; }
      
      .panel-header { background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; padding: 20px; border-bottom: 1px solid #dee2e6; }
      .panel-title { margin: 0; font-size: 1.25rem; font-weight: 600; }
      .btn-close-panel { background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer; padding: 0; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 50%; transition: background-color 0.2s ease; }
      .btn-close-panel:hover { background-color: rgba(255,255,255,0.1); }
      
      .panel-body { padding: 20px; }
      .detail-section { margin-bottom: 25px; padding: 20px; background: #f8f9fa; border-radius: 12px; border-left: 4px solid #dc3545; }
      .detail-label { font-weight: 600; color: #495057; margin-bottom: 8px; display: block; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; }
      .detail-value { color: #212529; font-size: 1rem; line-height: 1.5; }
      
      .reason-text { background: white; padding: 15px; border-radius: 8px; border: 1px solid #dee2e6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
      
      .status-badge { display: inline-block; padding: 6px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 500; text-transform: capitalize; }
      .status-badge.requested { background: #fff3cd; color: #856404; border: 1px solid #ffc107; }
      .status-badge.approved { background: #d4edda; color: #155724; border: 1px solid #28a745; }
      .status-badge.rejected { background: #f8d7da; color: #721c24; border: 1px solid #dc3545; }
      .status-badge.completed { background: #d1ecf1; color: #0c5460; border: 1px solid #17a2b8; }
      
      .item-list { background: white; border-radius: 8px; border: 1px solid #dee2e6; padding: 15px; }
      .item-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #eee; }
      .item-row:last-child { border-bottom: none; }
      
      .return-form-panel { position: fixed; top: 0; right: -600px; width: 600px; height: 100vh; background: white; box-shadow: -5px 0 15px rgba(0,0,0,0.1); z-index: 1060; transition: all 0.3s ease; overflow-y: auto; }
      .return-form-panel.active { right: 0; }
      
      .form-panel-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1055; opacity: 0; visibility: hidden; transition: all 0.3s ease; }
      .form-panel-overlay.active { opacity: 1; visibility: visible; }
      
      @media (max-width: 768px) { 
        .return-details-panel { width: 100%; right: -100%; } 
        .return-form-panel { width: 100%; right: -100%; }
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
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Returns</h4>
                    <p class="card-description">Manage all product returns and refund requests.</p>
                    
                    <div class="d-flex justify-content-end mb-3">
                      <button class="btn btn-primary" id="fileReturnBtn" onclick="openReturnFormPanel()">
                        <i class="bi bi-plus-circle me-2"></i>File a Return
                      </button>
                    </div>

                    <div class="table-responsive">
                      <table class="table table-hover" id="returnsTable">
                        <thead>
                          <tr>
                            <th>Return ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Reason</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody id="returnsTableBody">
                          <tr id="emptyState">
                            <td colspan="7" class="text-center py-5">
                              <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                              <p class="text-muted mt-2">No returns filed yet. Click "File a Return" to get started.</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="panel-overlay" id="panelOverlay"></div>
          <div class="return-details-panel" id="returnDetailsPanel">
            <div class="panel-header d-flex justify-content-between align-items-center">
              <h5 class="panel-title"><i class="bi bi-arrow-return-left me-2"></i>Return Details</h5>
              <button type="button" class="btn-close-panel" id="closePanelBtn"><i class="bi bi-x-lg"></i></button>
            </div>
            
            <div class="panel-body">
              <div class="detail-section">
                <label class="detail-label"><i class="bi bi-hash me-1"></i>Return ID</label>
                <div class="detail-value" id="detailReturnId">RET-001</div>
              </div>
              
              <div class="detail-section">
                <label class="detail-label"><i class="bi bi-receipt me-1"></i>Original Invoice</label>
                <div class="detail-value" id="detailOriginalInvoice">INV-001</div>
              </div>
              
              <div class="detail-section">
                <label class="detail-label"><i class="bi bi-calendar-event me-1"></i>Request Date</label>
                <div class="detail-value" id="detailDate">10/Nov/2025 9:15:00 AM</div>
              </div>
              
              <div class="detail-section">
                <label class="detail-label"><i class="bi bi-person me-1"></i>Customer</label>
                <div class="detail-value" id="detailCustomer">John Doe</div>
              </div>
              
              <div class="detail-section">
                <label class="detail-label"><i class="bi bi-currency-dollar me-1"></i>Refund Amount</label>
                <div class="detail-value" id="detailAmount">₦89.99</div>
              </div>
              
              <div class="detail-section">
                <label class="detail-label"><i class="bi bi-info-circle me-1"></i>Status</label>
                <div class="detail-value"><span class="status-badge requested" id="detailStatus">Requested</span></div>
              </div>
              
              <div class="detail-section">
                <label class="detail-label"><i class="bi bi-chat-text me-1"></i>Return Reason</label>
                <div class="detail-value"><div class="reason-text" id="detailReason">Product arrived damaged.</div></div>
              </div>
              
              <div class="detail-section">
                <label class="detail-label"><i class="bi bi-list-ul me-1"></i>Items Being Returned</label>
                <div class="detail-value"><div class="item-list" id="detailItems"></div></div>
              </div>
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
    
    <div class="form-panel-overlay" id="formPanelOverlay" onclick="closeReturnFormPanel()"></div>
    
    <div class="return-form-panel" id="returnFormPanel">
      <div class="panel-header d-flex justify-content-between align-items-center">
        <h5 class="panel-title"><i class="bi bi-arrow-return-left me-2"></i>File a Return</h5>
        <button type="button" class="btn-close-panel" onclick="closeReturnFormPanel()"><i class="bi bi-x-lg"></i></button>
      </div>
      
      <div class="panel-body">
        <form id="returnForm">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="productName" class="form-label">Product Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="productName" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="productQuantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="productQuantity" min="1" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="saleId" class="form-label">Sale ID/Receipt Number</label>
                  <input type="text" class="form-control" id="saleId">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="customerName" class="form-label">Customer Name</label>
                  <input type="text" class="form-control" id="customerName">
                </div>
              </div>
              <div class="mb-3">
                <label for="returnReason" class="form-label">Reason for Return <span class="text-danger">*</span></label>
                <select class="form-select" id="returnReason" required>
                  <option value="">Select a reason...</option>
                  <option value="Defective">Defective/Damaged Product</option>
                  <option value="Wrong Item">Wrong Item Received</option>
                  <option value="Not as Described">Not as Described</option>
                  <option value="Changed Mind">Customer Changed Mind</option>
                  <option value="Better Price">Found Better Price</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="returnNotes" class="form-label">Additional Notes</label>
                <textarea class="form-control" id="returnNotes" rows="3" placeholder="Provide any additional details about the return..."></textarea>
              </div>
              
              <div class="d-flex gap-2 mt-4">
                <button type="button" class="btn btn-secondary flex-fill" onclick="closeReturnFormPanel()" style="padding: 0.75rem;">
                  <i class="bi bi-x-circle me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary flex-fill" id="submitReturnBtn" style="padding: 0.75rem;">
                  <i class="bi bi-check-circle me-1"></i>Submit Return
                </button>
              </div>
            </form>
          </div>
        </div>
    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Manager/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../Manager/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    <?php include 'layouts/sidebar_scripts.php'; ?>
    <script>
let returnCounter = 1;
const returns = [];

function openReturnFormPanel() {
  const panel = document.getElementById('returnFormPanel');
  const overlay = document.getElementById('formPanelOverlay');
  panel.classList.add('active');
  overlay.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeReturnFormPanel() {
  const panel = document.getElementById('returnFormPanel');
  const overlay = document.getElementById('formPanelOverlay');
  panel.classList.remove('active');
  overlay.classList.remove('active');
  document.body.style.overflow = '';
}

document.addEventListener('DOMContentLoaded', function() {
  const submitReturnBtn = document.getElementById('submitReturnBtn');
  const returnForm = document.getElementById('returnForm');
  
  if (submitReturnBtn && returnForm) {
    submitReturnBtn.addEventListener('click', function() {
      if (!returnForm.checkValidity()) {
        returnForm.reportValidity();
        return;
      }
      
      const productName = document.getElementById('productName').value;
      const quantity = document.getElementById('productQuantity').value;
      const saleId = document.getElementById('saleId').value || 'N/A';
      const customerName = document.getElementById('customerName').value || 'Walk-in Customer';
      const reason = document.getElementById('returnReason').value;
      const notes = document.getElementById('returnNotes').value;
      
      const returnData = {
        id: `RET${String(returnCounter).padStart(4, '0')}`,
        productName, quantity, saleId, customerName, reason, notes,
        date: new Date().toLocaleDateString(),
        status: 'Pending'
      };
      
      returnCounter++;
      returns.push(returnData);
      addReturnToTable(returnData);
      returnForm.reset();
      
      closeReturnFormPanel();
      
      showToast('Success', 'Return filed successfully!', 'success');
    });
  }
  
  function addReturnToTable(returnData) {
    const tbody = document.getElementById('returnsTableBody');
    const emptyState = document.getElementById('emptyState');
    if (emptyState) { emptyState.remove(); }
    
    const row = document.createElement('tr');
    row.innerHTML = `
      <td><strong>${returnData.id}</strong></td>
      <td>${returnData.productName}</td>
      <td>${returnData.quantity}</td>
      <td><span class="badge bg-info">${returnData.reason}</span></td>
      <td>${returnData.date}</td>
      <td><span class="badge bg-warning">${returnData.status}</span></td>
      <td>
        <button class="btn btn-sm btn-primary me-1" onclick="viewReturn('${returnData.id}')" title="View Details">
          <i class="bi bi-eye"></i>
        </button>
        <button class="btn btn-sm btn-success me-1" onclick="approveReturn('${returnData.id}')" title="Approve">
          <i class="bi bi-check-circle"></i>
        </button>
        <button class="btn btn-sm btn-danger" onclick="deleteReturn('${returnData.id}')" title="Delete">
          <i class="bi bi-trash"></i>
        </button>
      </td>
    `;
    tbody.appendChild(row);
  }
  
  window.viewReturn = function(returnId) {
    const returnData = returns.find(r => r.id === returnId);
    if (returnData) {
      alert(`Return Details:\n\nID: ${returnData.id}\nProduct: ${returnData.productName}\nQuantity: ${returnData.quantity}\nReason: ${returnData.reason}\nNotes: ${returnData.notes || 'None'}\nCustomer: ${returnData.customerName}\nSale ID: ${returnData.saleId}`);
    }
  };
  
  window.approveReturn = function(returnId) {
    if (confirm('Approve this return?')) {
      const returnData = returns.find(r => r.id === returnId);
      if (returnData) {
        returnData.status = 'Approved';
        const rows = document.querySelectorAll('#returnsTableBody tr');
        rows.forEach(row => {
          if (row.querySelector('td')?.textContent.includes(returnId)) {
            const badge = row.querySelector('td:nth-child(6) span');
            if (badge) {
              badge.className = 'badge bg-success';
              badge.textContent = 'Approved';
            }
          }
        });
        showToast('Success', 'Return approved successfully!', 'success');
      }
    }
  };
  
  window.deleteReturn = function(returnId) {
    if (confirm('Are you sure you want to delete this return?')) {
      const index = returns.findIndex(r => r.id === returnId);
      if (index > -1) { returns.splice(index, 1); }
      
      const rows = document.querySelectorAll('#returnsTableBody tr');
      rows.forEach(row => {
        if (row.querySelector('td')?.textContent.includes(returnId)) { row.remove(); }
      });
      
      if (returns.length === 0) {
        const tbody = document.getElementById('returnsTableBody');
        tbody.innerHTML = `
          <tr id="emptyState">
            <td colspan="7" class="text-center py-5">
              <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
              <p class="text-muted mt-2">No returns filed yet. Click "File a Return" to get started.</p>
            </td>
          </tr>
        `;
      }
      showToast('Success', 'Return deleted successfully!', 'success');
    }
  };
  
  function showToast(title, message, type) {
    const bgColor = type === 'success' ? 'bg-success' : type === 'error' ? 'bg-danger' : 'bg-info';
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-white ${bgColor} border-0`;
    toast.setAttribute('role', 'alert');
    toast.setAttribute('aria-live', 'assertive');
    toast.setAttribute('aria-atomic', 'true');
    toast.style.position = 'fixed';
    toast.style.top = '20px';
    toast.style.right = '20px';
    toast.style.zIndex = '9999';
    toast.innerHTML = `
      <div class="d-flex">
        <div class="toast-body">
          <strong>${title}</strong><br>${message}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    `;
    document.body.appendChild(toast);
    const bsToast = new bootstrap.Toast(toast);
    bsToast.show();
    setTimeout(() => toast.remove(), 5000);
  }
  
  // Initialize Bootstrap dropdown for user avatar
  window.addEventListener('load', function() {
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
  });
});
    </script>
  </body>
</html>