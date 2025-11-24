<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sales by Category - SalesPilot</title>
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
    
    <!-- Custom Filter Styles -->
    <style>
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
      
      .filter-container .form-select,
      .filter-container .btn {
        min-height: 38px;
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
    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
    <div class="container-scroller">
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:layouts/sidebar_content.php -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Sales by Category content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Sales by Category Report</h4>
                    <p class="card-description">View sales performance across different product categories.</p>
                    
                    <!-- Modern Search and Filter Options -->
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
                        <!-- Category Filter -->
                        <select class="form-select" id="categoryFilter" style="max-width: 140px;">
                          <option value="">All Categories</option>
                          <option value="Electronics">Electronics</option>
                          <option value="Accessories">Accessories</option>
                          <option value="Apparel">Apparel</option>
                          <option value="Office">Office</option>
                        </select>
                        
                        <!-- Units Range Filter -->
                        <select class="form-select" id="unitsFilter" style="max-width: 140px;">
                          <option value="">All Units</option>
                          <option value="0-100">0-100 Units</option>
                          <option value="101-300">101-300 Units</option>
                          <option value="301+">301+ Units</option>
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
                      <table class="table table-striped" id="salesByCategoryTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Category</th>
                            <th>Units Sold</th>
                            <th>Gross Sales</th>
                            <th>Net Sales</th>
                            <th>Items Cost</th>
                            <th>Gross Profit</th>
                            <th>Tax</th>
                            <th>Margin</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Electronics</td>
                            <td>245</td>
                            <td>₦120,450.00</td>
                            <td>₦120,000.00</td>
                            <td>₦70,000.00</td>
                            <td>₦50,000.00</td>
                            <td>₦450.00</td>
                            <td>41.7%</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Accessories</td>
                            <td>358</td>
                            <td>₦89,500.00</td>
                            <td>₦85,000.00</td>
                            <td>₦42,000.00</td>
                            <td>₦43,000.00</td>
                            <td>₦4,500.00</td>
                            <td>50.6%</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Apparel</td>
                            <td>187</td>
                            <td>₦56,610.00</td>
                            <td>₦50,500.00</td>
                            <td>₦20,800.00</td>
                            <td>₦29,700.00</td>
                            <td>₦6,110.00</td>
                            <td>58.8%</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Home & Garden</td>
                            <td>92</td>
                            <td>₦20,760.00</td>
                            <td>₦20,700.00</td>
                            <td>₦10,500.00</td>
                            <td>₦10,200.00</td>
                            <td>₦60.00</td>
                            <td>49.3%</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Office Supplies</td>
                            <td>142</td>
                            <td>₦35,800.00</td>
                            <td>₦34,200.00</td>
                            <td>₦18,500.00</td>
                            <td>₦15,700.00</td>
                            <td>₦1,600.00</td>
                            <td>45.9%</td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Sports & Outdoors</td>
                            <td>76</td>
                            <td>₦28,340.00</td>
                            <td>₦27,500.00</td>
                            <td>₦14,200.00</td>
                            <td>₦13,300.00</td>
                            <td>₦840.00</td>
                            <td>48.4%</td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="2">Total</th>
                            <th>1,100</th>
                            <th>₦351,460.00</th>
                            <th>₦337,900.00</th>
                            <th>₦176,000.00</th>
                            <th>₦161,900.00</th>
                            <th>₦13,560.00</th>
                            <th>47.9%</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    
                    <hr class="my-3" style="border-top: 2px solid #e0e0e0;">
                    
                    <!-- Bar Chart: Units Sold vs Category -->
                    <div class="mt-4 mb-2">
                      <h5 class="mb-3">Sales Performance by Category</h5>
                      <div style="width: 100%; max-width: 900px; margin: 0 auto;">
                        <canvas id="unitsSoldBarChart" height="220"></canvas>
                      </div>
                      <div class="d-flex flex-wrap align-items-center justify-content-center gap-3 mt-3" id="barChartLegend">
                        <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#36A2EB;border-radius:3px;margin-right:6px;"></span>Electronics</span>
                        <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#FFCE56;border-radius:3px;margin-right:6px;"></span>Accessories</span>
                        <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#4BC0C0;border-radius:3px;margin-right:6px;"></span>Apparel</span>
                        <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#FF6384;border-radius:3px;margin-right:6px;"></span>Home &amp; Garden</span>
                        <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#9966FF;border-radius:3px;margin-right:6px;"></span>Office Supplies</span>
                        <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#FF9F40;border-radius:3px;margin-right:6px;"></span>Sports &amp; Outdoors</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Sales by Category content ends here -->
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
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
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/template.js"></script>
    <?php include '../layouts/sidebar_scripts.php'; ?>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>

    <!-- DataTables (ensure jQuery from vendor.bundle.base.js is loaded first) -->
    <script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    
    <script>
      // Consolidated DOMContentLoaded handler: DataTable init, Chart init, filters and listeners
      document.addEventListener('DOMContentLoaded', function() {
        // DataTables init (if available)
        if (typeof $ !== 'undefined' && typeof $.fn.DataTable !== 'undefined') {
          try {
            $('#salesByCategoryTable').DataTable({
              pageLength: 10,
              lengthChange: false,
              ordering: true,
              searching: false,
              info: true,
              autoWidth: false,
              order: [[2, 'desc']] // Sort by Units Sold by default
            });
          } catch (dtErr) {
            console.warn('DataTable init failed:', dtErr);
          }
        } else {
          console.warn('jQuery or DataTables not available yet.');
        }

        // Chart Initialization (if available)
        if (typeof Chart !== 'undefined') {
          try {
            const canvas = document.getElementById('unitsSoldBarChart');
            if (canvas) {
              const ctx = canvas.getContext('2d');
              new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: ['Electronics', 'Accessories', 'Apparel', 'Home & Garden', 'Office Supplies', 'Sports & Outdoors'],
                  datasets: [{
                    label: 'Units Sold',
                    data: [245, 358, 187, 92, 142, 76],
                    backgroundColor: [
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(255, 206, 86, 0.7)',
                      'rgba(75, 192, 192, 0.7)',
                      'rgba(255, 99, 132, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2,
                    maxBarThickness: 48
                  }]
                },
                options: {
                  responsive: true,
                  maintainAspectRatio: false,
                  plugins: { 
                    legend: { display: false }, 
                    title: { 
                      display: true, 
                      text: 'Units Sold by Category', 
                      font: { size: 18, weight: 'bold' }, 
                      padding: 20 
                    } 
                  },
                  scales: {
                    x: { 
                      title: { 
                        display: true, 
                        text: 'Category', 
                        font: { size: 14, weight: 'bold' } 
                      }, 
                      ticks: { font: { size: 12 } } 
                    },
                    y: { 
                      title: { 
                        display: true, 
                        text: 'Units Sold', 
                        font: { size: 14, weight: 'bold' } 
                      }, 
                      beginAtZero: true, 
                      ticks: { 
                        precision: 0, 
                        font: { size: 12 } 
                      } 
                    }
                  }
                }
              });
              console.log('Chart initialized successfully');
            } else {
              console.error('Canvas element not found!');
            }
          } catch (chartErr) {
            console.error('Chart initialization error:', chartErr);
          }
        } else {
          console.warn('Chart.js is not loaded!');
        }

        // Modern Filter JavaScript
        // expose overlay/search functions globally for inline attributes
        window.showCustomDateOverlay = function() { 
          var el = document.getElementById('customDateInputs'); 
          if (el) el.classList.add('show'); 
        };
        
        window.hideCustomDateOverlay = function() { 
          var el = document.getElementById('customDateInputs'); 
          if (el) el.classList.remove('show'); 
        };
        
        window.performSearch = function() { 
          console.log('Performing search with filters...');
          // Add your search/filter logic here
          // This would typically make an AJAX call to filter the data
        };

        var dateRangeFilter = document.getElementById('dateRangeFilter');
        if (dateRangeFilter) {
          dateRangeFilter.addEventListener('change', function() { 
            if (this.value === 'custom') {
              showCustomDateOverlay(); 
            } else {
              hideCustomDateOverlay(); 
            }
          });
        }

        var applyBtn = document.getElementById('applyFilters');
        if (applyBtn) applyBtn.addEventListener('click', performSearch);

        var clearBtn = document.getElementById('clearFilters');
        if (clearBtn) {
          clearBtn.addEventListener('click', function() {
            var sc = document.getElementById('searchCategories'); if (sc) sc.value = '';
            var cf = document.getElementById('categoryFilter'); if (cf) cf.value = '';
            var uf = document.getElementById('unitsFilter'); if (uf) uf.value = '';
            var dr = document.getElementById('dateRangeFilter'); if (dr) dr.value = '';
            var sd = document.getElementById('customStartDate'); if (sd) sd.value = '';
            var ed = document.getElementById('customEndDate'); if (ed) ed.value = '';
            hideCustomDateOverlay(); 
            performSearch();
          });
        }

        var exportBtn = document.getElementById('exportReport');
        if (exportBtn) {
          exportBtn.addEventListener('click', function() {
            function tableToCSV(tableId) {
              var table = document.getElementById(tableId); 
              if (!table) return '';
              var rows = table.querySelectorAll('tr'); 
              var csv = [];
              for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll('th, td');
                for (var j = 0; j < cols.length; j++) {
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
            
            var csv = tableToCSV('salesByCategoryTable'); 
            if (csv) downloadCSV(csv, 'sales_by_category_report.csv');
          });
        }

        // Close overlay when clicking outside
        document.addEventListener('click', function(e) {
          var overlay = document.getElementById('customDateInputs'); 
          var dateFilter = document.getElementById('dateRangeFilter');
          if (overlay && dateFilter && !overlay.contains(e.target) && !dateFilter.contains(e.target)) {
            hideCustomDateOverlay();
          }
        });

        // Close overlay with Escape key
        document.addEventListener('keydown', function(e) { 
          if (e.key === 'Escape') hideCustomDateOverlay(); 
        });

        // Fallback: delegated click handler to toggle sidebar collapses
        document.addEventListener('click', function(e) {
          try {
            if (e.defaultPrevented) return;
            var trigger = e.target.closest('.sidebar .nav-link[data-bs-toggle="collapse"]');
            if (!trigger) return;
            var selector = trigger.getAttribute('href') || trigger.getAttribute('data-bs-target') || trigger.dataset.bsTarget;
            if (!selector) return;
            var collapseEl = document.querySelector(selector);
            if (!collapseEl) return;
            var bs = bootstrap.Collapse.getOrCreateInstance(collapseEl, { toggle: false });
            if (collapseEl.classList.contains('show')) bs.hide(); 
            else bs.show();
            e.preventDefault();
          } catch (err) {
            // silent fallback
          }
        });
      });
    </script>
  </body>
</html>
