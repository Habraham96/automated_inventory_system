<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Saved Carts - SalesPilot</title>
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
		
		<!-- Include Sidebar Styles -->
		<?php include '../layouts/sidebar_styles.php'; ?>
		
		<style>
		/* Main panel positioning to avoid sidebar overlap */
		.main-panel {
			margin-left: 280px !important;
			transition: margin-left 0.2s ease !important;
		}
		
		/* Adjust main panel when sidebar is collapsed */
		body.sidebar-collapsed .main-panel {
			margin-left: 70px !important;
		}
		</style>
		<!-- endinject -->
		<link rel="shortcut icon" href="../assets/images/favicon.png" />
	</head>
	<body class="with-welcome-text">
		<div class="container-scroller">
			<div class="container-fluid page-body-wrapper">
				
				<!-- Include Sidebar Content -->
				<?php include '../layouts/sidebar_content_pages.php'; ?>
				
				<!-- partial -->
				<div class="main-panel">
					<div class="content-wrapper">
						<!-- Page content starts here -->
						<div class="row">
							<div class="col-12 grid-margin stretch-card">
								<div class="card card-rounded">
									<div class="card-body">
										<h4 class="card-title">Page</h4>
										<p class="card-description">Content placeholder replicated from Saved Carts.</p>
										<div class="table-responsive">
											<table class="table table-striped" id="table">
												<thead>
													<tr>
														<th>Column 1</th>
														<th>Column 2</th>
														<th>Column 3</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Example</td>
														<td>Example</td>
														<td>Example</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Page content ends here -->
					</div>
					<!-- content-wrapper ends -->
					<footer class="footer">
						<div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
							<span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2025. All rights reserved.</span>
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
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<script src="../assets/vendors/chart.js/chart.umd.js"></script>
		<script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<!-- <script src="../assets/js/off-canvas.js"></script> Commented out to avoid conflicts -->
		<!-- <script src="../assets/js/template.js"></script> Commented out to avoid conflicts -->
		
		<!-- Include Sidebar Scripts -->
		<?php include '../layouts/sidebar_scripts.php'; ?>
		
		<script src="../assets/js/settings.js"></script>
		<script src="../assets/js/hoverable-collapse.js"></script>
		<script src="../assets/js/todolist.js"></script>
		
		<!-- Sidebar Menu Behavior - Standard collapse behavior for single pages -->
		<script>
		document.addEventListener('DOMContentLoaded', function() {
		  // Only one submenu open at a time
		  document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
		    link.addEventListener('click', function(e) {
		      e.preventDefault();
		      var targetSelector = this.getAttribute('href');
		      var target = document.querySelector(targetSelector);
		      if (!target) return;
		      
		      // Collapse all other open submenus
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
