<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Categories - SalesPilot</title>
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
    <?php include '../layouts/sidebar_styles.php'; ?>
    
    <!-- Custom Categories Page Styles -->
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
      
      #addCategoryBtn:hover {
        background-color: #0056b3 !important;
        transform: translateY(-2px) !important;
      }
      
      /* Table styling */
      .table th {
        border-top: none !important;
        font-weight: 600 !important;
        color: #495057 !important;
        background-color: #f8f9fa !important;
      }
      
      .table th:last-child {
        text-align: center !important;
      }
      
      /* Reduce space between last two columns */
      .table th:nth-last-child(2),
      .table td:nth-last-child(2) {
        width: 120px !important;
        padding-right: 8px !important;
      }
      
      .table th:last-child,
      .table td:last-child {
        width: 100px !important;
        padding-left: 8px !important;
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
      
      @media (max-width: 768px) {
        .filter-container .col-md-8 {
          flex-direction: column;
          gap: 10px !important;
          align-items: stretch !important;
        }
        
        .filter-container .d-flex {
          flex-wrap: wrap;
        }
      }
      
      /* Action buttons in table */
      .action-buttons {
        display: flex;
        gap: 0.25rem;
        justify-content: center;
        align-items: center;
      }
      
      .action-buttons .btn {
        width: 32px;
        height: 32px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
      }
      
      .action-buttons .btn i {
        font-size: 0.875rem;
        transition: all 0.2s ease;
      }
      
      .action-buttons .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
      }
      
      .action-buttons .edit-btn:hover {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
      }
      
      .action-buttons .delete-btn:hover {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
      }
      
      .action-buttons .btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }

      .btn-sm {
        padding: 0.25rem 0.5rem !important;
        font-size: 0.75rem !important;
      }
      
      /* Card styling */
      .card {
        box-shadow: 0 0 20px rgba(0,0,0,0.1) !important;
        border: none !important;
      }
      
      /* Filter buttons hover effects */
      #applyFilters:hover {
        background-color: #0056b3 !important;
        color: white !important;
      }
      
      #clearFilters:hover {
        background-color: #6c757d !important;
        color: white !important;
      }
      
      #exportCategories:hover {
        background-color: #28a745 !important;
        color: white !important;
      }
      
      /* Responsive adjustments */
      @media (max-width: 768px) {
        .d-sm-flex {
          flex-direction: column !important;
          gap: 1rem !important;
        }
        
        .btn-wrapper {
          align-self: stretch !important;
        }
        
        .col-md-8 {
          flex-direction: column !important;
          gap: 0.5rem !important;
        }
      }
      
      .main-panel {
        transition: margin-left 0.2s ease !important;
        margin-left: 280px !important;
      }
      .main-panel.sidebar-collapsed {
        margin-left: 70px !important;
      }

    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- partial: Include Sidebar Content -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Categories content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <!-- Header Section -->
                    <div class="d-sm-flex justify-content-between align-items-start">
                      <div>
                        <h4 class="card-title mb-0">Categories</h4>
                        <p class="card-description">Manage your product categories below.</p>
                      </div>
                      <div class="btn-wrapper">
                        <button type="button" class="btn btn-primary text-white me-0" id="addCategoryBtn" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                          <i class="bi bi-plus"></i> Add Category
                        </button>
                      </div>
                    </div>
                    
                    <!-- Modern Search and Filter Section -->
                    <div class="row mb-3 filter-container">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search categories..." id="searchCategories">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Filter by Items Count -->
                        <select class="form-select" id="itemsFilter" style="max-width: 140px;">
                          <option value="">All Items</option>
                          <option value="0-10">0-10 Items</option>
                          <option value="11-25">11-25 Items</option>
                          <option value="26-50">26+ Items</option>
                        </select>
                        
                        <!-- Filter by Margin Range -->
                        <select class="form-select" id="marginFilter" style="max-width: 140px;">
                          <option value="">All Margins</option>
                          <option value="0-15">0-15%</option>
                          <option value="16-25">16-25%</option>
                          <option value="26+">26%+</option>
                        </select>
                        
                        <!-- Action Buttons -->
                        <button class="btn btn-outline-primary" id="applyFilters">
                          <i class="bi bi-funnel"></i> Apply
                        </button>
                        <button class="btn btn-outline-secondary" id="clearFilters">
                          <i class="bi bi-x-circle"></i> Clear
                        </button>
                        <button class="btn btn-outline-success" id="exportCategories">
                          <i class="bi bi-download"></i> Export
                        </button>
                      </div>
                    </div><br>

                
                
                <div class="table-responsive">
                  <table class="table table-striped" id="categoriesTable">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Category</th>
                        <th>Items</th>
                        <th>Default Margin</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Electronics</td>
                        <td>12</td>
                        <td>15%</td>
                        <td>
                          <div class="action-buttons">
                            <button class="btn btn-sm btn-outline-primary edit-btn" 
                                    data-id="1"
                                    data-name="Electronics"
                                    data-items="12"
                                    data-margin="15"
                                    title="Edit Category">
                              <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger delete-btn" 
                                    data-id="1"
                                    data-name="Electronics"
                                    title="Delete Category">
                              <i class="bi bi-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Groceries</td>
                        <td>34</td>
                        <td>10%</td>
                        <td>
                          <div class="action-buttons">
                            <button class="btn btn-sm btn-outline-primary edit-btn" 
                                    data-id="2"
                                    data-name="Groceries"
                                    data-items="34"
                                    data-margin="10"
                                    title="Edit Category">
                              <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger delete-btn" 
                                    data-id="2"
                                    data-name="Groceries"
                                    title="Delete Category">
                              <i class="bi bi-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Clothing</td>
                        <td>28</td>
                        <td>20%</td>
                        <td>
                          <div class="action-buttons">
                            <button class="btn btn-sm btn-outline-primary edit-btn" 
                                    data-id="3"
                                    data-name="Clothing"
                                    data-items="28"
                                    data-margin="20"
                                    title="Edit Category">
                              <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger delete-btn" 
                                    data-id="3"
                                    data-name="Clothing"
                                    title="Delete Category">
                              <i class="bi bi-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Home & Garden</td>
                        <td>18</td>
                        <td>25%</td>
                        <td>
                          <div class="action-buttons">
                            <button class="btn btn-sm btn-outline-primary edit-btn" 
                                    data-id="4"
                                    data-name="Home & Garden"
                                    data-items="18"
                                    data-margin="25"
                                    title="Edit Category">
                              <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger delete-btn" 
                                    data-id="4"
                                    data-name="Home & Garden"
                                    title="Delete Category">
                              <i class="bi bi-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Sports & Recreation</td>
                        <td>22</td>
                        <td>18%</td>
                        <td>
                          <div class="action-buttons">
                            <button class="btn btn-sm btn-outline-primary edit-btn" 
                                    data-id="5"
                                    data-name="Sports & Recreation"
                                    data-items="22"
                                    data-margin="18"
                                    title="Edit Category">
                              <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger delete-btn" 
                                    data-id="5"
                                    data-name="Sports & Recreation"
                                    title="Delete Category">
                              <i class="bi bi-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
          
    <!-- Add Category Modal -->
          <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCategoryForm">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="addCategoryName" class="form-label">Category Name</label>
                      <input type="text" class="form-control" id="addCategoryName" name="categoryName" required>
                    </div>
                    <div class="mb-3">
                      <label for="addDefaultMargin" class="form-label">Default Margin (%)</label>
                      <input type="number" class="form-control" id="addDefaultMargin" name="defaultMargin" min="0" step="any" placeholder="Optional">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Category</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Edit Category Modal -->
          <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCategoryForm">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="editCategoryName" class="form-label">Category Name</label>
                      <input type="text" class="form-control" id="editCategoryName" name="categoryName" required>
                    </div>
                    <div class="mb-3">
                      <label for="editDefaultMargin" class="form-label">Default Margin (%)</label>
                      <input type="number" class="form-control" id="editDefaultMargin" name="defaultMargin" required min="0" step="any">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Categories Page JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Search and Filter functionality
      const searchInput = document.getElementById('searchCategories');
      const table = document.getElementById('categoriesTable');
      const tableBody = table.querySelector('tbody');
      
      // Real-time search functionality
      if (searchInput) {
        searchInput.addEventListener('input', function() {
          const searchTerm = searchInput.value.toLowerCase();
          const rows = Array.from(tableBody.querySelectorAll('tr'));
          
          rows.forEach(row => {
            const categoryName = row.cells[1].textContent.toLowerCase();
            const itemsCount = row.cells[2].textContent.toLowerCase();
            const margin = row.cells[3].textContent.toLowerCase();
            
            const matchesSearch = categoryName.includes(searchTerm) || 
                                 itemsCount.includes(searchTerm) || 
                                 margin.includes(searchTerm);
            
            if (matchesSearch) {
              row.style.display = '';
            } else {
              row.style.display = 'none';
            }
          });
        });
      }
      
      // Filter functionality
      const itemsFilter = document.getElementById('itemsFilter');
      const marginFilter = document.getElementById('marginFilter');
      const applyFiltersBtn = document.getElementById('applyFilters');
      const clearFiltersBtn = document.getElementById('clearFilters');
      const exportBtn = document.getElementById('exportCategories');
      
      function performFilter() {
        const searchTerm = searchInput.value.toLowerCase();
        const itemsRange = itemsFilter.value;
        const marginRange = marginFilter.value;
        const rows = Array.from(tableBody.querySelectorAll('tr'));
        
        rows.forEach(row => {
          const categoryName = row.cells[1].textContent.toLowerCase();
          const itemsCount = parseInt(row.cells[2].textContent);
          const marginValue = parseInt(row.cells[3].textContent.replace('%', ''));
          
          let matchesSearch = categoryName.includes(searchTerm) || 
                             row.cells[2].textContent.toLowerCase().includes(searchTerm) || 
                             row.cells[3].textContent.toLowerCase().includes(searchTerm);
          
          let matchesItems = true;
          if (itemsRange) {
            if (itemsRange === '0-10') matchesItems = itemsCount >= 0 && itemsCount <= 10;
            else if (itemsRange === '11-25') matchesItems = itemsCount >= 11 && itemsCount <= 25;
            else if (itemsRange === '26-50') matchesItems = itemsCount >= 26;
          }
          
          let matchesMargin = true;
          if (marginRange) {
            if (marginRange === '0-15') matchesMargin = marginValue >= 0 && marginValue <= 15;
            else if (marginRange === '16-25') matchesMargin = marginValue >= 16 && marginValue <= 25;
            else if (marginRange === '26+') matchesMargin = marginValue >= 26;
          }
          
          if (matchesSearch && matchesItems && matchesMargin) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      }
      
      // Apply filters button
      if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', performFilter);
      }
      
      // Clear filters button
      if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
          searchInput.value = '';
          itemsFilter.value = '';
          marginFilter.value = '';
          performFilter();
        });
      }
      
      // Export button
      if (exportBtn) {
        exportBtn.addEventListener('click', function() {
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
          
          var csv = tableToCSV('categoriesTable');
          downloadCSV(csv, 'categories_report.csv');
        });
      }
      
      // Action buttons functionality
      const addCategoryForm = document.getElementById('addCategoryForm');
      const editCategoryForm = document.getElementById('editCategoryForm');
      let editingRow = null;

      // Edit button functionality
      document.getElementById('categoriesTable').addEventListener('click', function(e) {
        const editBtn = e.target.closest('.edit-btn');
        const deleteBtn = e.target.closest('.delete-btn');
        
        if (editBtn) {
          const row = editBtn.closest('tr');
          editingRow = row;
          // Fill edit modal form with data attributes
          document.getElementById('editCategoryName').value = editBtn.getAttribute('data-name');
          document.getElementById('editDefaultMargin').value = editBtn.getAttribute('data-margin');
          // Show edit modal
          const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('editCategoryModal'));
          modal.show();
        }
        
        if (deleteBtn) {
          const categoryName = deleteBtn.getAttribute('data-name');
          if (confirm(`Are you sure you want to delete the category "${categoryName}"?`)) {
            row.remove();
            updateSerialNumbers();
          }
        }
      });

      // Add Category Form Submit
      addCategoryForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const categoryName = document.getElementById('addCategoryName').value.trim();
        const defaultMargin = document.getElementById('addDefaultMargin').value;
        
        if (!categoryName || !defaultMargin) {
          alert('Please fill in all required fields.');
          return;
        }
        
        // Add new row
        const tableBody = document.getElementById('categoriesTable').querySelector('tbody');
        const newRowNumber = tableBody.children.length + 1;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
          <td>${newRowNumber}</td>
          <td>${categoryName}</td>
          <td>0</td>
          <td>${defaultMargin}%</td>
          <td>
            <div class="action-buttons">
              <button class="btn btn-sm btn-outline-primary edit-btn" 
                      data-id="${newRowNumber}"
                      data-name="${categoryName}"
                      data-items="0"
                      data-margin="${defaultMargin}"
                      title="Edit Category">
                <i class="bi bi-pencil"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger delete-btn" 
                      data-id="${newRowNumber}"
                      data-name="${categoryName}"
                      title="Delete Category">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </td>
        `;
        tableBody.appendChild(newRow);
        
        addCategoryForm.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('addCategoryModal'));
        modal.hide();
        alert('Category added successfully!');
      });

      // Edit Category Form Submit
      editCategoryForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const categoryName = document.getElementById('editCategoryName').value.trim();
        const defaultMargin = document.getElementById('editDefaultMargin').value;
        
        if (!categoryName || !defaultMargin) {
          alert('Please fill in all required fields.');
          return;
        }
        
        if (editingRow) {
          // Update existing row
          editingRow.cells[1].textContent = categoryName;
          editingRow.cells[3].textContent = defaultMargin + '%';
          editingRow = null;
        }
        
        editCategoryForm.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('editCategoryModal'));
        modal.hide();
        alert('Category updated successfully!');
      });

      // Function to update serial numbers after deletion
      function updateSerialNumbers() {
        const rows = document.querySelectorAll('#categoriesTable tbody tr');
        rows.forEach((row, index) => {
          row.cells[0].textContent = index + 1;
        });
      }
      
      // Clear modal forms when modals are hidden
      document.getElementById('addCategoryModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('addCategoryForm').reset();
      });
      
      document.getElementById('editCategoryModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('editCategoryForm').reset();
        editingRow = null;
      });
      
      
      // Sidebar collapse/expand logic (keep mainPanel in sync) — moved to central handler
      const mainPanel = document.getElementById('mainPanel');
      const sidebar = document.querySelector('.sidebar');
      // Use a centralized approach in `sidebar_scripts.php` to manage events
      document.addEventListener('DOMContentLoaded', function() {
        // Mirror sidebar collapsed class when it changes
        setTimeout(function() {
          if (sidebar && mainPanel) {
            if (sidebar.classList.contains('sidebar-collapsed')) {
              mainPanel.classList.add('sidebar-collapsed');
            } else {
              mainPanel.classList.remove('sidebar-collapsed');
            }
          }
        }, 300);
      });
    </script>
  </body>
</html>
