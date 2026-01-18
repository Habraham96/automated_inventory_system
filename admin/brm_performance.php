<?php
// BRM Performance Page - simple scaffold
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BRM Performance - SalesPilot</title>
    <?php include '../include/responsive.php'; ?>
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php include 'layouts/sidebar_styles.php'; ?>
    <style>
      .main-panel { margin-left: 280px !important; }
      .page-header { background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); color:#fff; padding:1.25rem; border-radius:8px; margin-bottom:1rem; }
      .stats-row { display:flex; gap:1rem; margin-bottom:1rem; }
      .stat { background:#fff; padding:1rem; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.06); flex:1; }
      .chart-placeholder { height:320px; background:linear-gradient(180deg,#f8f9fa,#fff); border-radius:8px; display:flex; align-items:center; justify-content:center; color:#6c757d; }
      .view-arrow { transition: transform .15s ease; }
      .brm-customers-row td { background:#f8f9fa; }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include 'layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php include 'layouts/sidebar_content.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="mb-0"><i class="bi bi-bar-chart-line-fill me-2"></i>BRM Performance</h3>
                  <small class="text-white-50">Overview of BRM activity, conversions and commissions</small>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="stats-row">
                  <div class="stat">
                    <div class="d-flex justify-content-between">
                      <div>
                        <div class="text-muted">Total BRMs</div>
                        <div class="h4">42</div>
                      </div>
                      <div class="align-self-center"><i class="bi bi-people-fill" style="font-size:28px;color:#667eea"></i></div>
                    </div>
                  </div>
                  <div class="stat">
                    <div class="d-flex justify-content-between">
                      <div>
                        <div class="text-muted">Active This Month</div>
                        <div class="h4">28</div>
                      </div>
                      <div class="align-self-center"><i class="bi bi-graph-up" style="font-size:28px;color:#17a2b8"></i></div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Top BRMs</h5>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>BRM</th>
                            <th>Company</th>
                            <th>Customers</th>
                            <th>Commission (₦)</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Alice Martinez</td>
                            <td>Tech Innovations Ltd</td>
                            <td>15</td>
                            <td>₦120,000</td>
                            <td><button class="btn btn-sm btn-outline-primary view-brm-btn" data-brm-id="1"><i class="bi bi-caret-right-fill me-1 view-arrow" aria-hidden="true"></i>View</button></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Benjamin Clark</td>
                            <td>Global Solutions Inc</td>
                            <td>8</td>
                            <td>₦75,000</td>
                            <td><button class="btn btn-sm btn-outline-primary view-brm-btn" data-brm-id="2"><i class="bi bi-caret-right-fill me-1 view-arrow" aria-hidden="true"></i>View</button></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Chidi Okonkwo</td>
                            <td>Lagoon Tech</td>
                            <td>12</td>
                            <td>₦90,000</td>
                            <td><button class="btn btn-sm btn-outline-primary view-brm-btn" data-brm-id="3"><i class="bi bi-caret-right-fill me-1 view-arrow" aria-hidden="true"></i>View</button></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Denise Amar</td>
                            <td>BrightWave</td>
                            <td>6</td>
                            <td>₦40,000</td>
                            <td><button class="btn btn-sm btn-outline-primary view-brm-btn" data-brm-id="4"><i class="bi bi-caret-right-fill me-1 view-arrow" aria-hidden="true"></i>View</button></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Emeka Nwosu</td>
                            <td>Continental Supplies</td>
                            <td>20</td>
                            <td>₦150,000</td>
                            <td><button class="btn btn-sm btn-outline-primary view-brm-btn" data-brm-id="5"><i class="bi bi-caret-right-fill me-1 view-arrow" aria-hidden="true"></i>View</button></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Fatima Yusuf</td>
                            <td>NorthStar Ventures</td>
                            <td>4</td>
                            <td>₦18,000</td>
                            <td><button class="btn btn-sm btn-outline-primary view-brm-btn" data-brm-id="6"><i class="bi bi-caret-right-fill me-1 view-arrow" aria-hidden="true"></i>View</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- Performance Chart placed below the table as requested -->
                <div class="card mt-4 mb-4">
                  <div class="card-body">
                    <h5 class="card-title">Performance Chart</h5>
                    <div class="chart-placeholder" id="performanceChart">Chart area — integrate Chart.js or your charting library here</div>
                  </div>
                </div>
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

    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <?php include 'layouts/sidebar_scripts.php'; ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Sample customers mapping by BRM id - replace with real data fetch
      const brmCustomers = {
        1: [
          { name: 'Customer A', phone: '+234 701 111 1111', email: 'a@cust.com' },
          { name: 'Customer B', phone: '+234 702 222 2222', email: 'b@cust.com' },
          { name: 'Customer C', phone: '+234 703 000 0000', email: 'c@cust.com' }
        ],
        2: [
          { name: 'Customer X', phone: '+234 703 333 3333', email: 'x@cust.com' },
          { name: 'Customer Y', phone: '+234 704 444 4444', email: 'y@cust.com' },
          { name: 'Customer Z', phone: '+234 705 555 5555', email: 'z@cust.com' }
        ],
        3: [
          { name: 'Paul Okoro', phone: '+234 706 666 6666', email: 'paul@client.com' },
          { name: 'Ngozi Obi', phone: '+234 707 777 7777', email: 'ngozi@client.com' }
        ],
        4: [
          { name: 'Ayodele Smith', phone: '+234 708 888 8888', email: 'ayodele@client.com' }
        ],
        5: [
          { name: 'Grace Ihunwo', phone: '+234 709 999 9999', email: 'grace@client.com' },
          { name: 'Chimamanda K', phone: '+234 710 101 0101', email: 'chimamanda@client.com' },
          { name: 'Ibrahim S', phone: '+234 711 111 1212', email: 'ibrahim@client.com' },
          { name: 'Samuel T', phone: '+234 712 121 2121', email: 'samuel@client.com' }
        ],
        6: [
          { name: 'Hajara Bello', phone: '+234 713 131 3131', email: 'hajara@client.com' }
        ]
      };

      function buildCustomersHtml(list) {
        if (!list || list.length === 0) return '<p class="text-muted mb-0">No customers found for this BRM.</p>';
        let html = '<div class="table-responsive"><table class="table table-sm mb-0"><thead><tr><th>#</th><th>Name</th><th>Phone</th><th>Email</th></tr></thead><tbody>';
        list.forEach(function(c, i) {
          html += `<tr><td>${i+1}</td><td>${c.name}</td><td>${c.phone}</td><td>${c.email}</td></tr>`;
        });
        html += '</tbody></table></div>';
        return html;
      }

      // Toggle inline customers row under the BRM row
      document.querySelectorAll('.view-brm-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          const brmId = this.dataset.brmId;
          const tr = this.closest('tr');
          const next = tr.nextElementSibling;

          // If next is already the customers row for this BRM, remove it (collapse)
          if (next && next.classList && next.classList.contains('brm-customers-row') && next.dataset.brmId === brmId) {
            next.remove();
            const arrow = this.querySelector('.view-arrow');
            if (arrow) { arrow.classList.remove('bi-caret-down-fill'); arrow.classList.add('bi-caret-right-fill'); }
            return;
          }

          // Close any other open customers rows
          document.querySelectorAll('.brm-customers-row').forEach(function(r) { r.remove(); });
          document.querySelectorAll('.view-arrow').forEach(function(a) { a.classList.remove('bi-caret-down-fill'); a.classList.add('bi-caret-right-fill'); });

          // Insert customers row
          const cols = tr.children.length;
          const row = document.createElement('tr');
          row.className = 'brm-customers-row';
          row.dataset.brmId = brmId;
          const td = document.createElement('td');
          td.colSpan = cols;
          const customers = brmCustomers[brmId] || [];
          td.innerHTML = buildCustomersHtml(customers);
          row.appendChild(td);
          tr.parentNode.insertBefore(row, tr.nextSibling);

          // Update arrow icon for this button
          const arrow = this.querySelector('.view-arrow');
          if (arrow) { arrow.classList.remove('bi-caret-right-fill'); arrow.classList.add('bi-caret-down-fill'); }
        });
      });
    });
    </script>
  </body>
</html>
