<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Saved Carts - SalesPilot</title>
		<?php include '../../include/responsive.php'; ?>
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
		<?php include '../layouts/preloader.php'; ?>
		
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
		
		/* Custom Date Inputs - Direct positioning under date filter */
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
		}
		
		#customDateInputs.show {
			opacity: 1;
			transform: translateY(0) scale(1);
			pointer-events: all;
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
		
		/* ESC key hint */
		.esc-hint {
			position: absolute;
			top: 8px;
			right: 12px;
			font-size: 0.7rem;
			color: #6c757d;
			background: rgba(108, 117, 125, 0.1);
			padding: 2px 6px;
			border-radius: 4px;
			font-weight: 500;
		}
		
		.custom-date-wrapper {
			position: relative;
			display: flex;
			flex-direction: column;
			gap: 12px;
			min-width: 160px;
		}
		
		.custom-date-input {
			border: 2px solid #e9ecef !important;
			border-radius: 10px !important;
			padding: 14px 16px !important;
			font-size: 1rem !important;
			transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
			background: #ffffff !important;
			color: #495057 !important;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1) !important;
			position: relative;
			min-width: 160px !important;
			height: 48px !important;
		}
		
		.custom-date-input:focus {
			border-color: #007bff !important;
			box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
			transform: translateY(-2px) !important;
			background: #f8f9fa !important;
		}
		
		.custom-date-input:hover {
			border-color: #007bff !important;
			transform: translateY(-1px) !important;
			box-shadow: 0 4px 12px rgba(0, 123, 255, 0.15) !important;
		}
		
		.date-label {
			font-size: 0.8rem;
			font-weight: 600;
			color: #6c757d;
			text-transform: uppercase;
			letter-spacing: 0.6px;
			margin-bottom: 6px;
			display: flex;
			align-items: center;
			gap: 6px;
		}
		
		.date-label i {
			font-size: 1.1rem;
			color: #007bff;
		}
		
		/* Custom date picker icon styling */
		.custom-date-input::-webkit-calendar-picker-indicator {
			background-color: #007bff;
			border-radius: 6px;
			padding: 6px;
			cursor: pointer;
			transition: all 0.3s ease;
			width: 20px;
			height: 20px;
		}
		
		.custom-date-input::-webkit-calendar-picker-indicator:hover {
			background-color: #0056b3;
			transform: scale(1.15);
		}
		
		/* Range connector */
		.date-range-connector {
			display: flex;
			align-items: center;
			justify-content: center;
			color: #6c757d;
			font-weight: bold;
			margin: 0 16px;
			font-size: 1.3rem;
			margin-top: 20px;
		}
		
		/* Responsive adjustments */
		@media (max-width: 768px) {
			#customDateInputs {
				padding: 16px 18px;
				border-radius: 12px;
				min-width: 340px;
				margin-top: 6px;
			}
			
			.custom-date-wrapper {
				gap: 10px;
				min-width: 140px;
			}
		}
		
		/* Table row hover and click effects */
		.table tbody tr {
			cursor: pointer;
			transition: all 0.3s ease;
		}
		
		.table tbody tr:hover {
			background-color: #f8f9fa !important;
			transform: translateY(-1px);
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
		}
		
		.table tbody tr.clicked {
			background-color: #e3f2fd !important;
			border-left: 4px solid #2196F3;
		}
		
		/* Activity Details Side Panel */
		.activity-details-panel {
			position: fixed;
			top: 0;
			right: -100%;
			width: 450px;
			height: 100vh;
			background: white;
			box-shadow: -5px 0 15px rgba(0,0,0,0.1);
			z-index: 1050;
			transition: all 0.3s ease;
			overflow-y: auto;
		}
		
		.activity-details-panel.active {
			right: 0;
		}
		
		.panel-overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0,0,0,0.5);
			z-index: 1049;
			opacity: 0;
			visibility: hidden;
			transition: all 0.3s ease;
		}
		
		.panel-overlay.active {
			opacity: 1;
			visibility: visible;
		}
		
		.panel-header {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
			padding: 20px;
			border-bottom: 1px solid #dee2e6;
		}
		
		.panel-title {
			margin: 0;
			font-size: 1.25rem;
			font-weight: 600;
		}
		
		.btn-close-panel {
			background: none;
			border: none;
			color: white;
			font-size: 1.5rem;
			cursor: pointer;
			padding: 0;
			width: 30px;
			height: 30px;
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 50%;
			transition: background-color 0.2s ease;
		}
		
		.btn-close-panel:hover {
			background-color: rgba(255,255,255,0.1);
		}
		
		.panel-body {
			padding: 20px;
		}
		
		.detail-section {
			margin-bottom: 25px;
			padding: 20px;
			background: #f8f9fa;
			border-radius: 12px;
			border-left: 4px solid #667eea;
		}
		
		.detail-label {
			font-weight: 600;
			color: #495057;
			margin-bottom: 8px;
			display: block;
			font-size: 0.9rem;
			text-transform: uppercase;
			letter-spacing: 0.5px;
		}
		
		.detail-value {
			color: #212529;
			font-size: 1rem;
			line-height: 1.5;
		}
		
		.detail-value.activity-text {
			background: white;
			padding: 15px;
			border-radius: 8px;
			border: 1px solid #dee2e6;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
		
		.access-badge {
			display: inline-block;
			padding: 6px 12px;
			border-radius: 20px;
			font-size: 0.85rem;
			font-weight: 500;
			text-transform: capitalize;
		}
		
		.access-badge.manager {
			background: #e8f5e8;
			color: #2e7d32;
			border: 1px solid #4caf50;
		}
		
		.access-badge.staff {
			background: #e3f2fd;
			color: #1565c0;
			border: 1px solid #2196f3;
		}
		
		.timestamp-info {
			display: flex;
			align-items: center;
			gap: 8px;
			color: #6c757d;
			font-size: 0.9rem;
		}
		
		@media (max-width: 768px) {
			.activity-details-panel {
				width: 100%;
				right: -100%;
			}
		}
			.custom-date-input {
				padding: 12px 14px !important;
				font-size: 0.95rem !important;
				min-width: 140px !important;
				height: 44px !important;
			}
			
			.date-label {
				font-size: 0.75rem;
				gap: 5px;
			}
			
			.date-label i {
				font-size: 1rem;
			}
			
			.date-range-connector {
				margin: 0 12px;
				font-size: 1.2rem;
				margin-top: 18px;
			}
		}
		
		@media (max-width: 480px) {
			#customDateInputs {
				padding: 14px 16px;
				min-width: 300px;
			}
			
			.custom-date-wrapper {
				min-width: 120px;
			}
			
			.custom-date-input {
				min-width: 120px !important;
				height: 42px !important;
			}
			
			.date-range-connector {
				margin: 0 8px;
				font-size: 1.1rem;
			}
		}
		
		/* Animation for overlay showing/hiding */
		@keyframes overlaySlideIn {
			from {
				opacity: 0;
				transform: translateY(-20px) scale(0.95);
				backdrop-filter: blur(0px);
			}
			to {
				opacity: 1;
				transform: translateY(0) scale(1);
				backdrop-filter: blur(8px);
			}
		}
		
		@keyframes overlaySlideOut {
			from {
				opacity: 1;
				transform: translateY(0) scale(1);
				backdrop-filter: blur(8px);
			}
			to {
				opacity: 0;
				transform: translateY(-20px) scale(0.95);
				backdrop-filter: blur(0px);
			}
		}
		
		/* Legacy animations - keeping for compatibility */
		@keyframes slideInDown {
			from {
				opacity: 0;
				transform: translateY(-20px) scale(0.95);
			}
			to {
				opacity: 1;
				transform: translateY(0) scale(1);
			}
		}
		
		@keyframes slideOutUp {
			from {
				opacity: 1;
				transform: translateY(0) scale(1);
			}
			to {
				opacity: 0;
				transform: translateY(-20px) scale(0.95);
			}
		}
		
		#customDateInputs.entering {
			animation: slideInDown 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
		}
		
		#customDateInputs.leaving {
			animation: slideOutUp 0.3s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards;
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
										<h4 class="card-title">Activity Logs</h4>
										<p class="card-description">Track all system activities and user access logs.</p>
										
										<!-- Search and Filter Options -->
										<div class="row mb-3 filter-container">
											<div class="col-md-4">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Search activities..." id="searchActivities">
													<button class="btn btn-outline-secondary" type="button">
														<i class="bi bi-search"></i>
													</button>
												</div>
											</div>
											<div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
												<!-- Access Type Filter -->
												<select class="form-select" id="accessTypeFilter" style="max-width: 140px;">
													<option value="">All Access Types</option>
													<option value="Login">Manager</option>
													<option value="Logout">Staff</option>						
												</select>
												
												<!-- Staff Filter -->
												<select class="form-select" id="staffFilter" style="max-width: 140px;">
													<option value="">All Staff</option>
													<option value="John Smith">John Smith</option>
													<option value="Sarah Johnson">Sarah Johnson</option>
													<option value="Michael Brown">Michael Brown</option>
													<option value="Emily Davis">Emily Davis</option>
													<option value="David Wilson">David Wilson</option>
													<option value="Lisa Anderson">Lisa Anderson</option>
													<option value="Robert Taylor">Robert Taylor</option>
													<option value="Jennifer Garcia">Jennifer Garcia</option>
													<option value="System Admin">System Admin</option>
												</select>
												
												<!-- Date Range Filter -->
												<div class="date-filter-wrapper">
													<select class="form-select" id="dateFilter" style="max-width: 140px;">
														<option value="">All Dates</option>
														<option value="today">Today</option>
														<option value="yesterday">Yesterday</option>
														<option value="last7days">Last 7 Days</option>
														<option value="last30days">Last 30 Days</option>
														<option value="custom">Custom Range</option>
													</select>
													
													<!-- Custom Date Inputs -->
													<div id="customDateInputs" class="custom-date-container">
														<div class="row g-3">
															<div class="col-md-6">
																<label for="startDate" class="form-label text-muted">From Date</label>
																<input type="date" class="form-control" id="startDate" onchange="performSearch()">
															</div>
															<div class="col-md-6">
																<label for="endDate" class="form-label text-muted">To Date</label>
																<input type="date" class="form-control" id="endDate" onchange="performSearch()">
															</div>
														</div>
														<div class="text-center mt-3">
															<button type="button" class="btn btn-outline-secondary btn-sm" onclick="hideCustomDateOverlay()">
																<i class="fas fa-times"></i> Close
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
												<button class="btn btn-outline-success">
													<i class="bi bi-download"></i> Export
												</button>
											</div>
										</div>
										<br>
										
										<div class="table-responsive">
											<table class="table table-striped" id="table">
												<thead>
													<tr>
														<th>S/N</th>
														<th>Date</th>
														<th>Activity</th>
														<th>Staff Name</th>
														<th>Access Type</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Nov 7, 2025 9:00:00 AM</td>
														<td>User logged into system</td>
														<td>John Smith</td>
														<td>Manager</td>
													</tr>
													<tr>
														<td>2</td>
														<td>Nov 7, 2025 8:50:12 AM</td>
														<td>Added new product: Samsung Galaxy S24</td>
														<td>Sarah Johnson</td>
														<td>Staff</td>
													</tr>
													<tr>
														<td>3</td>
														<td>Nov 7, 2025 6:45:00 PM</td>
														<td>Updated inventory for iPhone 15 Pro</td>
														<td>Michael Brown</td>
														<td>Staff</td>
													</tr>
													<tr>
														<td>4</td>
														<td>Nov 7, 2025 8:30:00 AM</td>
														<td>Generated sales report</td>
														<td>Emily Davis</td>
														<td>Staff</td>
													</tr>
													<tr>
														<td>5</td>
														<td>Nov 7, 2025 6:45:00 PM</td>
														<td>Deleted discontinued product: Nokia 3310</td>
														<td>David Wilson</td>
														<td>Staff</td>
													</tr>
													<tr>
														<td>6</td>
														<td>Nov 7, 2025 6:33:22 AM</td>
														<td>User logged out of system</td>
														<td>John Smith</td>
														<td>Manager</td>
													</tr>
													<tr>
														<td>7</td>
														<td>Nov 7, 2025 5:44:20 AM</td>
														<td>Processed sale transaction #TXN001234</td>
														<td>Lisa Anderson</td>
														<td>Staff</td>
													</tr>
													<tr>
														<td>8</td>
														<td>Nov 7, 2025 8:45:00 AM</td>
														<td>Updated user permissions for staff member</td>
														<td>Robert Taylor</td>
														<td>Staff</td>
													</tr>
													<tr>
														<td>9</td>
														<td>Nov 7, 2025 6:45:00 PM</td>
														<td>Exported inventory data to CSV</td>
														<td>Jennifer Garcia</td>
														<td>staff</td>
													</tr>
													<tr>
														<td>10</td>
														<td>Nov 7, 2025 6:45:00 PM</td>
														<td>Backup database completed successfully</td>
														<td>System Admin</td>
														<td>Manager</td>
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
					
					<!-- Activity Details Side Panel -->
					<div class="panel-overlay" id="panelOverlay"></div>
					<div class="activity-details-panel" id="activityDetailsPanel">
						<div class="panel-header d-flex justify-content-between align-items-center">
							<h5 class="panel-title">
								<i class="bi bi-clipboard-data me-2"></i>Activity Details
							</h5>
							<button type="button" class="btn-close-panel" id="closePanelBtn">
								<i class="bi bi-x-lg"></i>
							</button>
						</div>
						
						<div class="panel-body">
							<!-- Basic Information -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-hash me-1"></i>Log ID
								</label>
								<div class="detail-value" id="detailLogId">#001</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-calendar-event me-1"></i>Date & Time
								</label>
								<div class="detail-value">
									<div class="timestamp-info">
										<i class="bi bi-clock"></i>
										<span id="detailDateTime">Nov 7, 2025 9:15:00 AM</span>
									</div>
								</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-activity me-1"></i>Activity Description
								</label>
								<div class="detail-value activity-text" id="detailActivity">
									User logged into system
								</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-person me-1"></i>Staff Member
								</label>
								<div class="detail-value" id="detailStaffName">John Smith</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-shield-check me-1"></i>Access Level
								</label>
								<div class="detail-value">
									<span class="access-badge manager" id="detailAccessType">Manager</span>
								</div>
							</div>
							
							<!-- Additional Information -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-info-circle me-1"></i>Additional Information
								</label>
								<div class="detail-value">
									<div class="row">
										<div class="col-6">
											<small class="text-muted">Session ID:</small><br>
											<span id="detailSessionId">SES_001234567</span>
										</div>
										<div class="col-6">
											<small class="text-muted">IP Address:</small><br>
											<span id="detailIpAddress">192.168.1.101</span>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-6">
											<small class="text-muted">Browser:</small><br>
											<span id="detailBrowser">Chrome 118.0</span>
										</div>
										<div class="col-6">
											<small class="text-muted">Status:</small><br>
											<span class="badge bg-success" id="detailStatus">Completed</span>
										</div>
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
		  // Initialize Bootstrap dropdowns for profile menu
		  var dropdownElementList = [].slice.call(document.querySelectorAll('[data-bs-toggle="dropdown"]'));
		  var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
		    return new bootstrap.Dropdown(dropdownToggleEl);
		  });
		  
		  // Profile dropdown specific handler
		  var userDropdownToggle = document.getElementById('UserDropdown');
		  if (userDropdownToggle) {
		    console.log('Profile dropdown initialized');
		    
		    // Ensure dropdown is properly initialized
		    var dropdown = bootstrap.Dropdown.getOrCreateInstance(userDropdownToggle);
		    
		    // Add click event listener
		    userDropdownToggle.addEventListener('click', function(e) {
		      e.preventDefault();
		      console.log('Profile picture clicked');
		      
		      var dropdownMenu = this.nextElementSibling;
		      if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
		        // Toggle dropdown visibility
		        if (dropdownMenu.classList.contains('show')) {
		          dropdown.hide();
		        } else {
		          dropdown.show();
		        }
		      }
		    });
		  }
		  
          
		});
		</script>
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="../assets/js/dashboard.js"></script>
		<!-- End custom js for this page-->
		
		<!-- Activity Logs Search and Filter functionality -->
		<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Get DOM elements
			const searchInput = document.getElementById('searchActivities');
			const accessTypeFilter = document.getElementById('accessTypeFilter');
			const staffFilter = document.getElementById('staffFilter');
			const dateFilter = document.getElementById('dateFilter');
			const customDateInputs = document.getElementById('customDateInputs');
			const startDateInput = document.getElementById('startDate');
			const endDateInput = document.getElementById('endDate');
			const applyFiltersBtn = document.getElementById('applyFilters');
			const clearFiltersBtn = document.getElementById('clearFilters');
			const table = document.getElementById('table');
			const tableBody = table.querySelector('tbody');
			const tableRows = Array.from(tableBody.querySelectorAll('tr'));

			// Set default dates for custom range
			const today = new Date();
			const todayStr = today.toISOString().split('T')[0];
			const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
			const weekAgoStr = weekAgo.toISOString().split('T')[0];
			
			startDateInput.value = weekAgoStr;
			endDateInput.value = todayStr;

			// Show/hide custom date overlay based on date filter selection
			function showCustomDateOverlay() {
				const customDateInputs = document.getElementById('customDateInputs');
				customDateInputs.classList.add('show');
				
				// Focus on start date for better UX
				setTimeout(() => {
					startDateInput.focus();
				}, 200);
			}
			
			function hideCustomDateOverlay() {
				const customDateInputs = document.getElementById('customDateInputs');
				customDateInputs.classList.remove('show');
			}
			
			// Date filter change handler
			dateFilter.addEventListener('change', function() {
				if (this.value === 'custom') {
					showCustomDateOverlay();
				} else {
					hideCustomDateOverlay();
				}
				// Trigger search when date filter changes
				performSearch();
			});
			
			// ESC key handler for closing custom date overlay
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape' || e.keyCode === 27) {
					if (customDateInputs.classList.contains('show')) {
						// Reset date filter to empty and hide overlay
						dateFilter.value = '';
						hideCustomDateOverlay();
						performSearch();
						e.preventDefault();
					}
				}
			});
			
			// Click outside overlay to close
			document.addEventListener('click', function(e) {
				const isClickInsideFilter = e.target.closest('.date-filter-wrapper');
				if (!isClickInsideFilter && customDateInputs.classList.contains('show')) {
					dateFilter.value = '';
					hideCustomDateOverlay();
					performSearch();
				}
			});

			// Store original table data
			const originalData = tableRows.map(row => {
				const cells = row.querySelectorAll('td');
				return {
					element: row,
					sn: cells[0]?.textContent.trim() || '',
					date: cells[1]?.textContent.trim() || '',
					activity: cells[2]?.textContent.trim() || '',
					staffName: cells[3]?.textContent.trim() || '',
					accessType: cells[4]?.textContent.trim() || ''
				};
			});

			// Search functionality
			function performSearch() {
				const searchTerm = searchInput.value.toLowerCase();
				const accessType = accessTypeFilter.value;
				const staff = staffFilter.value;
				const dateRange = dateFilter.value;

				const filteredData = originalData.filter(item => {
					// Text search across activity and staff name
					const matchesSearch = searchTerm === '' || 
						item.activity.toLowerCase().includes(searchTerm) ||
						item.staffName.toLowerCase().includes(searchTerm);

					// Access type filter
					const matchesAccessType = accessType === '' || item.accessType === accessType;

					// Staff filter
					const matchesStaff = staff === '' || item.staffName === staff;

					// Date filter with enhanced logic
					let matchesDate = true;
					if (dateRange && dateRange !== '') {
						const itemDate = new Date(item.date.split(' ')[0]); // Extract date part only
						const currentDate = new Date();
						
						switch (dateRange) {
							case 'today':
								const today = new Date();
								today.setHours(0, 0, 0, 0);
								const tomorrow = new Date(today);
								tomorrow.setDate(tomorrow.getDate() + 1);
								matchesDate = itemDate >= today && itemDate < tomorrow;
								break;
								
							case 'yesterday':
								const yesterday = new Date();
								yesterday.setDate(yesterday.getDate() - 1);
								yesterday.setHours(0, 0, 0, 0);
								const todayStart = new Date(yesterday);
								todayStart.setDate(todayStart.getDate() + 1);
								matchesDate = itemDate >= yesterday && itemDate < todayStart;
								break;
								
							case 'last7days':
								const sevenDaysAgo = new Date();
								sevenDaysAgo.setDate(sevenDaysAgo.getDate() - 7);
								sevenDaysAgo.setHours(0, 0, 0, 0);
								matchesDate = itemDate >= sevenDaysAgo;
								break;
								
							case 'last30days':
								const thirtyDaysAgo = new Date();
								thirtyDaysAgo.setDate(thirtyDaysAgo.getDate() - 30);
								thirtyDaysAgo.setHours(0, 0, 0, 0);
								matchesDate = itemDate >= thirtyDaysAgo;
								break;
								
							case 'custom':
								const startDate = new Date(startDateInput.value);
								const endDate = new Date(endDateInput.value);
								
								if (startDateInput.value && endDateInput.value) {
									startDate.setHours(0, 0, 0, 0);
									endDate.setHours(23, 59, 59, 999);
									matchesDate = itemDate >= startDate && itemDate <= endDate;
								} else if (startDateInput.value) {
									startDate.setHours(0, 0, 0, 0);
									matchesDate = itemDate >= startDate;
								} else if (endDateInput.value) {
									endDate.setHours(23, 59, 59, 999);
									matchesDate = itemDate <= endDate;
								}
								break;
								
							default:
								matchesDate = true;
						}
					}

					return matchesSearch && matchesAccessType && matchesStaff && matchesDate;
				});

				// Clear table body
				tableBody.innerHTML = '';

				// Add filtered rows
				if (filteredData.length === 0) {
					const noResultsRow = document.createElement('tr');
					noResultsRow.innerHTML = `
						<td colspan="5" class="text-center text-muted py-4">
							<i class="bi bi-search"></i><br>
							No activities found matching your criteria
						</td>
					`;
					tableBody.appendChild(noResultsRow);
				} else {
					filteredData.forEach((item, index) => {
						// Update serial number for filtered results
						const cells = item.element.querySelectorAll('td');
						cells[0].textContent = index + 1;
						tableBody.appendChild(item.element);
					});
				}

				// Update results count
				updateResultsCount(filteredData.length);
			}

			// Update results count
			function updateResultsCount(count) {
				let countElement = document.getElementById('resultsCount');
				if (!countElement) {
					countElement = document.createElement('small');
					countElement.id = 'resultsCount';
					countElement.className = 'text-muted';
					const cardDescription = document.querySelector('.card-description');
					cardDescription.appendChild(document.createElement('br'));
					cardDescription.appendChild(countElement);
				}
				
				if (count === originalData.length) {
					countElement.textContent = `Showing all ${count} activities`;
				} else {
					countElement.textContent = `Showing ${count} of ${originalData.length} activities`;
				}
			}

			// Clear all filters
			function clearAllFilters() {
				searchInput.value = '';
				accessTypeFilter.value = '';
				staffFilter.value = '';
				dateFilter.value = '';
				startDateInput.value = weekAgoStr;
				endDateInput.value = todayStr;
				
				// Hide custom date overlay properly
				hideCustomDateOverlay();
				
				// Restore original table
				tableBody.innerHTML = '';
				originalData.forEach(item => {
					tableBody.appendChild(item.element);
				});
				
				updateResultsCount(originalData.length);
			}

			// Event listeners
			searchInput.addEventListener('input', performSearch);
			accessTypeFilter.addEventListener('change', performSearch);
			staffFilter.addEventListener('change', performSearch);
			// dateFilter change listener is already added above
			startDateInput.addEventListener('change', performSearch);
			endDateInput.addEventListener('change', performSearch);
			applyFiltersBtn.addEventListener('click', performSearch);
			clearFiltersBtn.addEventListener('click', clearAllFilters);

			// Enter key support for search
			searchInput.addEventListener('keypress', function(e) {
				if (e.key === 'Enter') {
					e.preventDefault();
					performSearch();
				}
			});

			// Initialize results count
			updateResultsCount(originalData.length);

			// Table row click functionality for activity details
			const activityDetailsPanel = document.getElementById('activityDetailsPanel');
			const panelOverlay = document.getElementById('panelOverlay');
			const closePanelBtn = document.getElementById('closePanelBtn');
			
			// Add click event to table rows
			tableRows.forEach((row, index) => {
				row.addEventListener('click', function(e) {
					// Remove clicked class from all rows
					tableRows.forEach(r => r.classList.remove('clicked'));
					
					// Add clicked class to current row
					this.classList.add('clicked');
					
					// Extract activity data from row
					const cells = this.querySelectorAll('td');
					const activityData = {
						id: cells[0].textContent.trim(),
						dateTime: cells[1].textContent.trim(),
						activity: cells[2].textContent.trim(),
						staffName: cells[3].textContent.trim(),
						accessType: cells[4].textContent.trim().toLowerCase()
					};
					
					// Populate panel with activity data
					populateActivityPanel(activityData);
					
					// Show panel
					showActivityPanel();
				});
				
				// Add data attribute for styling
				row.setAttribute('data-clickable', 'true');
			});
			
			// Function to show activity panel
			function showActivityPanel() {
				activityDetailsPanel.classList.add('active');
				panelOverlay.classList.add('active');
				document.body.style.overflow = 'hidden'; // Prevent background scrolling
			}
			
			// Function to hide activity panel
			function hideActivityPanel() {
				activityDetailsPanel.classList.remove('active');
				panelOverlay.classList.remove('active');
				document.body.style.overflow = ''; // Restore scrolling
				
				// Remove clicked class from all rows
				tableRows.forEach(r => r.classList.remove('clicked'));
			}
			
			// Panel close event listeners
			if (closePanelBtn) {
				closePanelBtn.addEventListener('click', hideActivityPanel);
			}
			
			if (panelOverlay) {
				panelOverlay.addEventListener('click', hideActivityPanel);
			}
			
			// ESC key to close panel
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape' && activityDetailsPanel.classList.contains('active')) {
					hideActivityPanel();
				}
			});
			
			// Function to populate activity panel
			function populateActivityPanel(data) {
				// Generate mock additional data based on activity type
				const mockData = generateMockData(data);
				
				document.getElementById('detailLogId').textContent = `#LOG${data.id.padStart(6, '0')}`;
				document.getElementById('detailDateTime').textContent = data.dateTime;
				document.getElementById('detailActivity').textContent = data.activity;
				document.getElementById('detailStaffName').textContent = data.staffName;
				
				// Set access type with proper styling
				const accessBadge = document.getElementById('detailAccessType');
				accessBadge.textContent = data.accessType.charAt(0).toUpperCase() + data.accessType.slice(1);
				accessBadge.className = `access-badge ${data.accessType}`;
				
				// Populate additional information
				document.getElementById('detailSessionId').textContent = mockData.sessionId;
				document.getElementById('detailIpAddress').textContent = mockData.ipAddress;
				document.getElementById('detailBrowser').textContent = mockData.browser;
				document.getElementById('detailStatus').textContent = mockData.status;
				document.getElementById('detailStatus').className = `badge bg-${mockData.statusColor}`;
			}
			
			// Function to generate mock additional data
			function generateMockData(data) {
				const sessions = ['SES_001234567', 'SES_002345678', 'SES_003456789'];
				const ips = ['192.168.1.101', '192.168.1.102', '192.168.1.103', '10.0.0.25'];
				const browsers = ['Chrome 118.0', 'Firefox 119.0', 'Safari 17.0', 'Edge 118.0'];
				const statuses = [
					{ text: 'Completed', color: 'success' },
					{ text: 'In Progress', color: 'warning' },
					{ text: 'Failed', color: 'danger' },
					{ text: 'Pending', color: 'info' }
				];
				
				const randomIndex = parseInt(data.id) % 4;
				const status = statuses[randomIndex];
				
				return {
					sessionId: sessions[randomIndex],
					ipAddress: ips[randomIndex],
					browser: browsers[randomIndex],
					status: status.text,
					statusColor: status.color
				};
			}

			// Export functionality
			document.querySelector('.btn-outline-success').addEventListener('click', function() {
				const visibleRows = Array.from(tableBody.querySelectorAll('tr'));
				let csvContent = 'S/N,Date,Activity,Staff Name,Access Type\n';
				
				visibleRows.forEach(row => {
					const cells = row.querySelectorAll('td');
					if (cells.length === 5) {
						const rowData = Array.from(cells).map(cell => 
							'"' + cell.textContent.trim().replace(/"/g, '""') + '"'
						).join(',');
						csvContent += rowData + '\n';
					}
				});

				// Create and download file
				const blob = new Blob([csvContent], { type: 'text/csv' });
				const url = window.URL.createObjectURL(blob);
				const link = document.createElement('a');
				link.href = url;
				link.download = 'activity_logs_' + new Date().toISOString().split('T')[0] + '.csv';
				document.body.appendChild(link);
				link.click();
				document.body.removeChild(link);
				window.URL.revokeObjectURL(url);
			});
		});
		
				// Preloader handled via include '../layouts/preloader.php'
			</script>
	</body>
</html>
