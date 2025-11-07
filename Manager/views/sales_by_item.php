<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sales by Item - SalesPilot</title>
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
            <!-- Sales by Item content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Sales by Item Report</h4>
                    <p class="card-description">Detailed sales performance for individual products.</p>

                    <!-- Date, Category, and Items Filter Section -->
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <select class="form-select form-select-sm mb-2" id="dateRangeFilter" onchange="toggleCustomRangeInputs()" style="font-size:0.85rem;">
                          <option value="today">Today</option>
                          <option value="yesterday">Yesterday</option>
                          <option value="last7">Last 7 Days</option>
                          <option value="last30">Last 30 Days</option>
                          <option value="thisMonth">This Month</option>
                          <option value="lastMonth">Last Month</option>
                          <option value="custom">Custom Range</option>
                        </select>
                        <div id="customRangeInputs" style="display:none;">
                          <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text" style="font-size:0.85rem;">From</span>
                            <input type="date" class="form-control form-control-sm" id="customStartDate" style="font-size:0.85rem;">
                          </div>
                          <div class="input-group input-group-sm">
                            <span class="input-group-text" style="font-size:0.85rem;">To</span>
                            <input type="date" class="form-control form-control-sm" id="customEndDate" style="font-size:0.85rem;">
                          </div>
                        </div>
                        <small class="form-text text-muted" style="font-size:0.8rem;">Choose a date range to filter sales by item.</small>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-select form-select-sm" id="categoryFilter" style="font-size:0.85rem;">
                          <option value="">All Categories</option>
                          <option value="Electronics">Electronics</option>
                          <option value="Accessories">Accessories</option>
                          <option value="Office">Office</option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-select form-select-sm" id="itemFilter" style="font-size:0.85rem;">
                          <option value="">All Items</option>
                          <option value="Wireless Mouse">Wireless Mouse</option>
                          <option value="USB-C Cable">USB-C Cable</option>
                          <option value="Bluetooth Headset">Bluetooth Headset</option>
                          <option value="Phone Case">Phone Case</option>
                          <option value="Laptop Stand">Laptop Stand</option>
                        </select>
                      </div>
                    </div>
                    <script>
                      function toggleCustomRangeInputs() {
                        var range = document.getElementById('dateRangeFilter');
                        var customInputs = document.getElementById('customRangeInputs');
                        if (range && customInputs) {
                          customInputs.style.display = range.value === 'custom' ? 'block' : 'none';
                        }
                      }
                      document.addEventListener('DOMContentLoaded', function() {
                        toggleCustomRangeInputs();
                      });
                    </script>
                    <div class="table-responsive">
                      <table class="table table-striped" id="salesByItemTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Item Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Qty Sold</th>
                            <th>Gross Sales Amount</th>
                            <th>Cost Price</th>
                            <th>Gross Profit</th>
                            <th>Discounts</th>
                            <th>Profit Margin</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Wireless Mouse</td>
                            <td>WM-001</td>
                            <td>Electronics</td>
                            <td>125</td>
                            <td>$29.99</td>
                            <td>$23.99</td>
                            <td>$5.00</td>
                            <td>$3,748.75</td>
                            <td>14%</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>USB-C Cable</td>
                            <td>UC-002</td>
                            <td>Accessories</td>
                            <td>250</td>
                            <td>$12.50</td>
                            <td>$8.75</td>
                            <td>$3.75</td>
                            <td>$3,125.00</td>
                            <td>30%</td>
                          </tr>
<script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('#salesByItemTable').DataTable({
      "pageLength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
                          <tr>
                            <td>3</td>
                            <td>Bluetooth Headset</td>
                            <td>BH-003</td>
                            <td>Electronics</td>
                            <td>87</td>
                            <td>$59.99</td>
                            <td>$45.00</td>
                            <td>$4</td>
                            <td>$5,219.13</td>
                            <td>23%</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Phone Case</td>
                            <td>PC-004</td>
                            <td>Accessories</td>
                            <td>198</td>
                            <td>$15.00</td>
                            <td>$2,970.00</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Laptop Stand</td>
                            <td>LS-005</td>
                            <td>Electronics</td>
                            <td>64</td>
                            <td>$59.99</td>
                            <td>$45.00</td>
                            <td>$4</td>
                            <td>$5,219.13</td>
                            <td>23%</td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="3">Total</th>
                            <th>724</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>$17,942.88</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <br><br><br>
                    <!-- Bar Chart: Qty Sold vs Item Name -->
                    <div class="row mt-5">
                      <div class="col-12">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <!-- <h5 class="card-title">Quantity Sold by Item</h5> -->
                            <div style="max-width: 600px; margin-left: 0;">
                              <canvas id="qtySoldBarChart" height="180"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- main-panel ends -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span> -->
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2025. All rights reserved.</span>
          </div>
        </footer>
            </div>
            <!-- Sales by Item content ends here -->
          </div>
          <!-- content-wrapper ends -->
          <!-- main-panel ends -->
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- inject:js -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
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
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  <script>
    // Data from the table
    const itemData = [
      { name: 'Wireless Mouse', qty: 125 },
      { name: 'USB-C Cable', qty: 250 },
      { name: 'Bluetooth Headset', qty: 87 },
      { name: 'Phone Case', qty: 198 },
      { name: 'Laptop Stand', qty: 64 }
    ];

    // Bar Chart: Qty Sold vs Item Name
    new Chart(document.getElementById('qtySoldBarChart').getContext('2d'), {
      type: 'bar',
      data: {
        labels: itemData.map(d => d.name),
        datasets: [{
          label: 'Qty Sold',
          data: itemData.map(d => d.qty),
          backgroundColor: '#4e73df',
          barThickness: 38,
          maxBarThickness: 40
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          x: { title: { display: true, text: 'Item Name' } },
          y: { title: { display: true, text: 'Qty Sold' }, beginAtZero: true }
        }
      }
    });
  </script>
  </body>
</html>
