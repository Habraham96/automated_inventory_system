<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customers - SalesPilot</title>
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php include 'layouts/sidebar_styles.php'; ?>
    <style>
      .main-panel { margin-left: 280px !important; transition: margin-left 0.2s ease !important; }
      body.sidebar-collapsed .main-panel { margin-left: 70px !important; }
      .content-container { padding: 25px; background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
      .dropdown-menu { position: absolute !important; z-index: 10000 !important; display: none; background: white !important; border: 1px solid rgba(0,0,0,.15) !important; border-radius: 0.25rem !important; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175) !important; }
      .dropdown-menu.show { display: block !important; }
      .dropdown-menu-end { right: 0 !important; left: auto !important; }
      .user-dropdown { position: relative !important; }
    </style>
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <?php include 'layouts/preloader.php'; ?>
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3"><button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize"><span class="icon-menu"></span></button></div>
        </div>
        <?php include 'layouts/sidebar_content.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row"><div class="col-sm-12"><div class="home-tab">
              <div class="content-container">
                <h3 class="mb-4">Customers</h3>
                <p>Customer management content will be implemented here.</p>
              </div>
            </div></div></div>
          </div>
          <footer class="footer"><div class="d-sm-flex justify-content-center justify-content-sm-between"><span class="text-muted text-center text-sm-left d-block d-sm-inline-block">SalesPilot © 2025</span></div></footer>
        </div>
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
    window.addEventListener('load', function() {
      setTimeout(function() {
        var userDropdown = document.getElementById('UserDropdown');
        var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
        if (userDropdown && dropdownMenu && typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
          try { new bootstrap.Dropdown(userDropdown, { autoClose: true, boundary: 'viewport' }); } catch (error) { console.error('Error:', error); }
        }
        var sidebar = document.getElementById('sidebar');
        if (sidebar) {
          sidebar.querySelectorAll('a.nav-link[data-bs-toggle="collapse"]').forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
              e.preventDefault();
              var target = document.querySelector(this.getAttribute('href'));
              if (target && typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                sidebar.querySelectorAll('div.collapse.show').forEach(function (m) { if (m !== target) bootstrap.Collapse.getOrCreateInstance(m).hide(); });
                bootstrap.Collapse.getOrCreateInstance(target).toggle();
              }
            });
          });
        }
      }, 500);
    });
    </script>
  </body>
</html>