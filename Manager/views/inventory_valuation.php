<script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('#inventoryValuationTable').DataTable({
      "pageLength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory Valuation - SalesPilot</title>
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
    <!-- endinject -->
    <style>
      html, body, .container-scroller, .container-fluid.page-body-wrapper, .main-panel {
        height: 100%;
        min-height: 100vh;
      }
      .content-wrapper {
        min-height: calc(100vh - 56px); /* adjust 56px if your footer is taller */
        display: flex;
        flex-direction: column;
      }
      .fixed-bottom-footer {
        background: transparent;
        box-shadow: none;
        border: none;
        padding: 16px 0 8px 0;
        color: #222;
        font-size: 1rem;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100vw;
        z-index: 1050;
        text-align: left;
      }
      @media (min-width: 992px) {
        .fixed-bottom-footer {
          left: 280px;
          width:
        }
      }
    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- partial: Include Sidebar Content -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Inventory Valuation content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                      <h4 class="card-title">Inventory Valuation Report</h4>
                      <p class="card-description">Current inventory value and stock levels.</p>
                      <form class="row g-2 align-items-center mb-4" id="inventoryFilterForm" style="margin-bottom: 1.5rem !important;">
                        <div class="col-md-4 col-12">
                          <input type="text" class="form-control form-control-sm" id="searchInput" placeholder="Search Item Name or Category">
                        </div>
                        <div class="col-md-3 col-8">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle w-100 text-start" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                              <span id="selectedCategoryLabel">All Categories</span>
                            </button>
                            <ul class="dropdown-menu w-100 px-2" aria-labelledby="categoryDropdown" style="min-width: 100%;">
                              <li>
                                <label class="dropdown-item mb-1">
                                  <input type="checkbox" class="categoryCheckbox" value="Electronics"> Electronics
                                </label>
                              </li>
                              <li>
                                <label class="dropdown-item mb-1">
                                  <input type="checkbox" class="categoryCheckbox" value="Accessories"> Accessories
                                </label>
                              </li>
                              <li>
                                <label class="dropdown-item mb-1">
                                  <input type="checkbox" class="categoryCheckbox" value="Furniture"> Furniture
                                </label>
                              </li>
                              <li>
                                <label class="dropdown-item mb-1">
                                  <input type="checkbox" class="categoryCheckbox" value="Stationery"> Stationery
                                </label>
                              </li>
                              <li class="text-center mt-2 mb-1">
                                <button type="button" class="btn btn-sm btn-primary w-100" onclick="updateCategoryFilter()">Apply Filter</button>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </form>
                      <div class="row mb-4">
<script>
function updateCategoryFilter() {
  var checkboxes = document.getElementsByClassName('categoryCheckbox');
  var selected = [];
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      selected.push(checkboxes[i].value);
    }
  }
  var label = 'All Categories';
  if (selected.length === 1) label = selected[0];
  else if (selected.length > 1) label = selected.join(', ');
  document.getElementById('selectedCategoryLabel').textContent = label;
  filterInventoryTable();
}

function filterInventoryTable() {
  var input = document.getElementById('searchInput').value.toLowerCase();
  var checkboxes = document.getElementsByClassName('categoryCheckbox');
  var selectedCategories = [];
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      selectedCategories.push(checkboxes[i].value);
    }
  }
  var table = document.getElementById('inventoryValuationTable');
  var trs = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
  for (var i = 0; i < trs.length; i++) {
    var tds = trs[i].getElementsByTagName('td');
    var itemName = tds[0].textContent.toLowerCase();
    var itemCategory = tds[1].textContent;
    var show = true;
    if (input && !(itemName.includes(input) || itemCategory.toLowerCase().includes(input))) {
      show = false;
    }
    if (selectedCategories.length > 0 && !selectedCategories.includes(itemCategory)) {
      show = false;
    }
    trs[i].style.display = show ? '' : 'none';
  }
}

</script>

                        <div class="col-md-3 col-6 mb-2">
                          <div class="card text-white bg-primary h-100">
                            <div class="card-body py-3 px-2">
                              <div class="d-flex flex-column align-items-start">
                                <span class="fw-bold fs-6">Total Inventory Value</span>
                                <span class="fs-5">$13,812.50</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                          <div class="card text-white bg-success h-100">
                            <div class="card-body py-3 px-2">
                              <div class="d-flex flex-column align-items-start">
                                <span class="fw-bold fs-6">Total Selling Price Value</span>
                                <span class="fs-5">$18,000.00</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                          <div class="card text-white bg-warning h-100">
                            <div class="card-body py-3 px-2">
                              <div class="d-flex flex-column align-items-start">
                                <span class="fw-bold fs-6">Potential Profit</span>
                                <span class="fs-5">$4,187.50</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                          <div class="card text-white bg-info h-100">
                            <div class="card-body py-3 px-2">
                              <div class="d-flex flex-column align-items-start">
                                <span class="fw-bold fs-6">Margin</span>
                                <span class="fs-5">23.3%</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="table-responsive">
                        <table class="table table-striped" id="inventoryValuationTable">
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Item Name</th>
                              <th>Category</th>
                              <th>Qty In Stock</th>
                              <th>Cost</th>
                              <th>Inventory Value</th>
                              <th>Total Selling Price Value</th>
                              <th>Potential Profit</th>
                              <th>Margin</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Product A</td>
                              <td>Electronics</td>
                              <td>150</td>
                              <td>$25.00</td>
                              <td>$3,750.00</td>
                              <td>$4,950.00</td>
                              <td>$1,200.00</td>
                              <td>24.2%</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Product B</td>
                              <td>Accessories</td>
                              <td>85</td>
                              <td>$12.50</td>
                              <td>$1,062.50</td>
                              <td>$1,445.00</td>
                              <td>$382.50</td>
                              <td>26.5%</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Product C</td>
                              <td>Electronics</td>
                              <td>200</td>
                              <td>$45.00</td>
                              <td>$9,000.00</td>
                              <td>$12,000.00</td>
                              <td>$3,000.00</td>
                              <td>25.0%</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Product D</td>
                              <td>Furniture</td>
                              <td>60</td>
                              <td>$80.00</td>
                              <td>$4,800.00</td>
                              <td>$6,600.00</td>
                              <td>$1,800.00</td>
                              <td>27.3%</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Product E</td>
                              <td>Stationery</td>
                              <td>500</td>
                              <td>$2.00</td>
                              <td>$1,000.00</td>
                              <td>$1,500.00</td>
                              <td>$500.00</td>
                              <td>33.3%</td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>Product F</td>
                              <td>Accessories</td>
                              <td>120</td>
                              <td>$15.00</td>
                              <td>$1,800.00</td>
                              <td>$2,400.00</td>
                              <td>$600.00</td>
                              <td>25.0%</td>
                            </tr>
                            <tr>
                              <td>7</td>
                              <td>Product G</td>
                              <td>Electronics</td>
                              <td>75</td>
                              <td>$60.00</td>
                              <td>$4,500.00</td>
                              <td>$6,000.00</td>
                              <td>$1,500.00</td>
                              <td>25.0%</td>
                            </tr>
                            <tr>
                              <td>8</td>
                              <td>Product H</td>
                              <td>Furniture</td>
                              <td>40</td>
                              <td>$120.00</td>
                              <td>$4,800.00</td>
                              <td>$6,000.00</td>
                              <td>$1,200.00</td>
                              <td>20.0%</td>
                            </tr>
                            <tr>
                              <td>9</td>
                              <td>Product I</td>
                              <td>Stationery</td>
                              <td>300</td>
                              <td>$3.00</td>
                              <td>$900.00</td>
                              <td>$1,200.00</td>
                              <td>$300.00</td>
                              <td>25.0%</td>
                            </tr>
                            <tr>
                              <td>10</td>
                              <td>Product J</td>
                              <td>Accessories</td>
                              <td>200</td>
                              <td>$8.00</td>
                              <td>$1,600.00</td>
                              <td>$2,200.00</td>
                              <td>$600.00</td>
                              <td>27.3%</td>
                            </tr>
                          </tbody>
                          
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Inventory Valuation content ends here -->
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
        <hr class="my-4" style="border-top: 2px solid #e0e0e0; margin-top: 2.5rem; margin-bottom: 1.5rem;">
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        </div>
        <!-- main-panel ends -->
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
    <?php include '../layouts/sidebar_scripts.php'; ?>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    
    <!-- Sidebar Menu Collapse Behavior - Ensures only one submenu open at a time, auto-expand Reports menu -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Auto-expand the Reports menu when page loads (form-elements menu)
      const reportsMenu = document.getElementById('form-elements');
      if (reportsMenu) {
        const bsCollapse = bootstrap.Collapse.getOrCreateInstance(reportsMenu);
        bsCollapse.show();
      }
      
      // Only one submenu open at a time, expand/collapse on one click
      document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          var targetSelector = this.getAttribute('href');
          var target = document.querySelector(targetSelector);
          if (!target) return;
          
          // Collapse all other open submenus (including Reports menu when other parent clicked)
          document.querySelectorAll('.sidebar .collapse.show').forEach(function(openMenu) {
            if (openMenu !== target) {
              var openCollapse = bootstrap.Collapse.getOrCreateInstance(openMenu);
              openCollapse.hide();
            }
          });
          
          // Toggle the clicked submenu
          var bsCollapse = bootstrap.Collapse.getOrCreateInstance(target);
          bsCollapse.toggle();
        });
      });
    });
    </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
