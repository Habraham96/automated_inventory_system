<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Pending Sales - SalesPilot</title>
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
		
		/* Pending Sale Details Side Panel */
		.sale-details-panel {
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
		
		.sale-details-panel.active {
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
			background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
			border-left: 4px solid #28a745;
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
		
		.status-badge {
			display: inline-block;
			padding: 6px 12px;
			border-radius: 20px;
			font-size: 0.85rem;
			font-weight: 500;
			text-transform: capitalize;
		}
		
		.status-badge.pending {
			background: #fff3cd;
			color: #856404;
			border: 1px solid #ffc107;
		}
		
		.status-badge.processing {
			background: #d1ecf1;
			color: #0c5460;
			border: 1px solid #17a2b8;
		}
		
		.status-badge.on-hold {
			background: #f8d7da;
			color: #721c24;
			border: 1px solid #dc3545;
		}
		
		.item-list {
			background: white;
			border-radius: 8px;
			border: 1px solid #dee2e6;
			padding: 15px;
		}
		
		.item-row {
			display: flex;
			justify-content: between;
			align-items: center;
			padding: 10px 0;
			border-bottom: 1px solid #eee;
		}
		
		.item-row:last-child {
			border-bottom: none;
		}
		
		@media (max-width: 768px) {
			.sale-details-panel {
				width: 100%;
				right: -100%;
			}
		}
		</style>
		<!-- endinject -->
		<link rel="shortcut icon" href="../assets/images/favicon.png" />
	</head>
	<body class="with-welcome-text">
		<?php include '../layouts/preloader.php'; ?>
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
										<h4 class="card-title">Pending Sales</h4>
										<p class="card-description">Monitor and manage all pending sales transactions.</p>
										
										<!-- Search and Filter Options -->
										<div class="row mb-3 filter-container">
											<div class="col-md-4">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Search sales..." id="searchSales">
													<button class="btn btn-outline-secondary" type="button">
														<i class="bi bi-search"></i>
													</button>
												</div>
											</div>
											<div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
												<!-- Status Filter -->
												<select class="form-select" id="statusFilter" style="max-width: 140px;">
													<option value="">All Status</option>
													<option value="Pending">Pending</option>
													<option value="Processing">Processing</option>
													<option value="On Hold">On Hold</option>						
												</select>
												
												<!-- Customer Filter -->
												<select class="form-select" id="customerFilter" style="max-width: 140px;">
													<option value="">All Customers</option>
													<option value="John Doe">John Doe</option>
													<option value="Jane Smith">Jane Smith</option>
													<option value="Michael Brown">Michael Brown</option>
													<option value="Sarah Johnson">Sarah Johnson</option>
													<option value="David Wilson">David Wilson</option>
													<option value="Lisa Anderson">Lisa Anderson</option>
													<option value="Robert Taylor">Robert Taylor</option>
													<option value="Jennifer Garcia">Jennifer Garcia</option>
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
											<table class="table table-striped" id="salesTable">
												<thead>
													<tr>
														<th>S/N</th>
														<th>Invoice</th>
														<th>Date</th>
														<th>Customer</th>
														<th>Amount</th>
														<th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>INV-P001</td>
														<td>Nov 10, 2025</td>
														<td>John Doe</td>
														<td>₦24500.50</td>
														<td><span class="badge bg-warning">Pending</span></td>
														<td>
															<button class="btn btn-sm btn-outline-success me-1" title="Complete Sale">
																<i class="bi bi-check-circle"></i>
															</button>
															<button class="btn btn-sm btn-outline-primary" title="Edit">
																<i class="bi bi-pencil"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>INV-P002</td>
														<td>Nov 10, 2025</td>
														<td>Jane Smith</td>
														<td>₦18900.75</td>
														<td><span class="badge bg-info">Processing</span></td>
														<td>
															<button class="btn btn-sm btn-outline-success me-1" title="Complete Sale">
																<i class="bi bi-check-circle"></i>
															</button>
															<button class="btn btn-sm btn-outline-primary" title="Edit">
																<i class="bi bi-pencil"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>3</td>
														<td>INV-P003</td>
														<td>Nov 9, 2025</td>
														<td>Michael Brown</td>
														<td>₦12500.99</td>
														<td><span class="badge bg-warning">Pending</span></td>
														<td>
															<button class="btn btn-sm btn-outline-success me-1" title="Complete Sale">
																<i class="bi bi-check-circle"></i>
															</button>
															<button class="btn btn-sm btn-outline-primary" title="Edit">
																<i class="bi bi-pencil"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>4</td>
														<td>INV-P004</td>
														<td>Nov 9, 2025</td>
														<td>Sarah Johnson</td>
														<td>₦33400.25</td>
														<td><span class="badge bg-danger">On Hold</span></td>
														<td>
															<button class="btn btn-sm btn-outline-success me-1" title="Complete Sale">
																<i class="bi bi-check-circle"></i>
															</button>
															<button class="btn btn-sm btn-outline-primary" title="Edit">
																<i class="bi bi-pencil"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>5</td>
														<td>INV-P005</td>
														<td>Nov 8, 2025</td>
														<td>David Wilson</td>
														<td>₦45600.80</td>
														<td><span class="badge bg-info">Processing</span></td>
														<td>
															<button class="btn btn-sm btn-outline-success me-1" title="Complete Sale">
																<i class="bi bi-check-circle"></i>
															</button>
															<button class="btn btn-sm btn-outline-primary" title="Edit">
																<i class="bi bi-pencil"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>6</td>
														<td>INV-P006</td>
														<td>Nov 8, 2025</td>
														<td>Lisa Anderson</td>
														<td>₦27800.40</td>
														<td><span class="badge bg-warning">Pending</span></td>
														<td>
															<button class="btn btn-sm btn-outline-success me-1" title="Complete Sale">
																<i class="bi bi-check-circle"></i>
															</button>
															<button class="btn btn-sm btn-outline-primary" title="Edit">
																<i class="bi bi-pencil"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>7</td>
														<td>INV-P007</td>
														<td>Nov 7, 2025</td>
														<td>Robert Taylor</td>
														<td>₦15600.75</td>
														<td><span class="badge bg-warning">Pending</span></td>
														<td>
															<button class="btn btn-sm btn-outline-success me-1" title="Complete Sale">
																<i class="bi bi-check-circle"></i>
															</button>
															<button class="btn btn-sm btn-outline-primary" title="Edit">
																<i class="bi bi-pencil"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>8</td>
														<td>INV-P008</td>
														<td>Nov 7, 2025</td>
														<td>Jennifer Garcia</td>
														<td>₦38900.90</td>
														<td><span class="badge bg-info">Processing</span></td>
														<td>
															<button class="btn btn-sm btn-outline-success me-1" title="Complete Sale">
																<i class="bi bi-check-circle"></i>
															</button>
															<button class="btn btn-sm btn-outline-primary" title="Edit">
																<i class="bi bi-pencil"></i>
															</button>
														</td>
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
					
					<!-- Sale Details Side Panel -->
					<div class="panel-overlay" id="panelOverlay"></div>
					<div class="sale-details-panel" id="saleDetailsPanel">
						<div class="panel-header d-flex justify-content-between align-items-center">
							<h5 class="panel-title">
								<i class="bi bi-receipt me-2"></i>Sale Details
							</h5>
							<button type="button" class="btn-close-panel" id="closePanelBtn">
								<i class="bi bi-x-lg"></i>
							</button>
						</div>
						
						<div class="panel-body">
							<!-- Basic Information -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-receipt-cutoff me-1"></i>Invoice Number
								</label>
								<div class="detail-value" id="detailInvoice">INV-P001</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-calendar-event me-1"></i>Order Date
								</label>
								<div class="detail-value" id="detailDate">Nov 10, 2025</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-person me-1"></i>Customer
								</label>
								<div class="detail-value" id="detailCustomer">John Doe</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-currency-dollar me-1"></i>Total Amount
								</label>
								<div class="detail-value" id="detailAmount">₦24500.50</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-info-circle me-1"></i>Status
								</label>
								<div class="detail-value">
									<span class="status-badge pending" id="detailStatus">Pending</span>
								</div>
							</div>
							
							<!-- Items List -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-list-ul me-1"></i>Items Ordered
								</label>
								<div class="detail-value">
									<div class="item-list" id="detailItems">
										<!-- Items will be populated by JavaScript -->
									</div>
								</div>
							</div>
							
							<!-- Payment Information -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-credit-card me-1"></i>Payment Information
								</label>
								<div class="detail-value" id="detailPayment">
									<div class="row">
										<div class="col-6">
											<small class="text-muted">Method:</small><br>
											<span>Credit Card</span>
										</div>
										<div class="col-6">
											<small class="text-muted">Status:</small><br>
											<span class="badge bg-warning">Pending</span>
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
		
		<!-- Include Sidebar Scripts -->
		<?php include '../layouts/sidebar_scripts.php'; ?>
		
		<script src="../assets/js/settings.js"></script>
		<script src="../assets/js/hoverable-collapse.js"></script>
		<script src="../assets/js/todolist.js"></script>
		
		<!-- Sidebar Menu Behavior with Profile Dropdown Fix removed (merged into main handler) -->
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="../assets/js/dashboard.js"></script>
		<!-- End custom js for this page-->
		
		<!-- Pending Sales Search and Filter functionality (includes profile dropdown init) -->
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
			  var dropdown = bootstrap.Dropdown.getOrCreateInstance(userDropdownToggle);
			  userDropdownToggle.addEventListener('click', function(e) {
			    e.preventDefault();
			    var dropdownMenu = this.nextElementSibling;
			    if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
			      if (dropdownMenu.classList.contains('show')) {
			        dropdown.hide();
			      } else {
			        dropdown.show();
			      }
			    }
			  });
			}

			// Get DOM elements
			const searchInput = document.getElementById('searchSales');
			const statusFilter = document.getElementById('statusFilter');
			const customerFilter = document.getElementById('customerFilter');
			const dateFilter = document.getElementById('dateFilter');
			const customDateInputs = document.getElementById('customDateInputs');
			const startDateInput = document.getElementById('startDate');
			const endDateInput = document.getElementById('endDate');
			const applyFiltersBtn = document.getElementById('applyFilters');
			const clearFiltersBtn = document.getElementById('clearFilters');
			const table = document.getElementById('salesTable');
			const tableBody = table.querySelector('tbody');
			const tableRows = Array.from(tableBody.querySelectorAll('tr'));

			// Ensure sidebar parent menu arrows rotate correctly when their collapses open/close
			try {
				var sidebarCollapseTriggers = document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]');
				sidebarCollapseTriggers.forEach(function(trigger) {
					var targetSelector = trigger.getAttribute('data-bs-target') || trigger.getAttribute('href');
					if (!targetSelector) return;
					var collapseEl = document.querySelector(targetSelector);
					if (!collapseEl) return;
					// Set initial state based on whether the collapse is shown
					var arrowEl = trigger.querySelector('.menu-arrow');
					if (collapseEl.classList.contains('show')) {
						trigger.classList.remove('collapsed');
						trigger.setAttribute('aria-expanded', 'true');
						if (arrowEl) arrowEl.classList.add('rotated');
					} else {
						trigger.classList.add('collapsed');
						trigger.setAttribute('aria-expanded', 'false');
						if (arrowEl) arrowEl.classList.remove('rotated');
					}

					// Listen for bootstrap collapse events to toggle classes
					collapseEl.addEventListener('shown.bs.collapse', function() {
						trigger.classList.remove('collapsed');
						trigger.setAttribute('aria-expanded', 'true');
						if (arrowEl) arrowEl.classList.add('rotated');
					});

					collapseEl.addEventListener('hidden.bs.collapse', function() {
						trigger.classList.add('collapsed');
						trigger.setAttribute('aria-expanded', 'false');
						if (arrowEl) arrowEl.classList.remove('rotated');
					});
				});
			} catch (err) {
				console.warn('Sidebar arrow rotation init failed:', err);
			}

			// Set default dates for custom range
			const today = new Date();
			const todayStr = today.toISOString().split('T')[0];
			const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
			const weekAgoStr = weekAgo.toISOString().split('T')[0];
			
			startDateInput.value = weekAgoStr;
			endDateInput.value = todayStr;

			// Show/hide custom date overlay (exposed globally for inline onclick)
			window.showCustomDateOverlay = function() { customDateInputs.classList.add('show'); setTimeout(() => { if (startDateInput) startDateInput.focus(); }, 200); };
			window.hideCustomDateOverlay = function() { customDateInputs.classList.remove('show'); };
			
			// Date filter change handler
			dateFilter.addEventListener('change', function() {
				if (this.value === 'custom') {
					showCustomDateOverlay();
				} else {
					hideCustomDateOverlay();
				}
				performSearch();
			});
			
			// ESC key handler
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape' && customDateInputs.classList.contains('show')) {
					dateFilter.value = '';
					hideCustomDateOverlay();
					performSearch();
					e.preventDefault();
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
					invoice: cells[1]?.textContent.trim() || '',
					date: cells[2]?.textContent.trim() || '',
					customer: cells[3]?.textContent.trim() || '',
					amount: cells[4]?.textContent.trim() || '',
					status: cells[5]?.textContent.trim() || ''
				};
			});

			// Search functionality (exposed globally for inline onchange)
			window.performSearch = function() {
				const searchTerm = searchInput.value.toLowerCase();
				const status = statusFilter.value;
				const customer = customerFilter.value;
				const dateRange = dateFilter.value;

				const filteredData = originalData.filter(item => {
					// Text search
					const matchesSearch = searchTerm === '' || 
						item.invoice.toLowerCase().includes(searchTerm) ||
						item.customer.toLowerCase().includes(searchTerm);

					// Status filter
					const matchesStatus = status === '' || item.status.includes(status);

					// Customer filter
					const matchesCustomer = customer === '' || item.customer === customer;

					// Date filter
					let matchesDate = true;
					if (dateRange && dateRange !== '') {
						const itemDate = new Date(item.date.split(' ')[0]);
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
								}
								break;
								
							default:
								matchesDate = true;
						}
					}

					return matchesSearch && matchesStatus && matchesCustomer && matchesDate;
				});

				// Clear table body
				tableBody.innerHTML = '';

				// Add filtered rows
				if (filteredData.length === 0) {
					const noResultsRow = document.createElement('tr');
					noResultsRow.innerHTML = `
						<td colspan="7" class="text-center text-muted py-4">
							<i class="bi bi-search"></i><br>
							No pending sales found matching your criteria
						</td>
					`;
					tableBody.appendChild(noResultsRow);
				} else {
					filteredData.forEach((item, index) => {
						const cells = item.element.querySelectorAll('td');
						cells[0].textContent = index + 1;
						tableBody.appendChild(item.element);
					});
				}

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
					countElement.textContent = `Showing all ${count} pending sales`;
				} else {
					countElement.textContent = `Showing ${count} of ${originalData.length} pending sales`;
				}
			}

			// Clear all filters
			function clearAllFilters() {
				searchInput.value = '';
				statusFilter.value = '';
				customerFilter.value = '';
				dateFilter.value = '';
				startDateInput.value = weekAgoStr;
				endDateInput.value = todayStr;
				
				hideCustomDateOverlay();
				
				tableBody.innerHTML = '';
				originalData.forEach(item => {
					tableBody.appendChild(item.element);
				});
				
				updateResultsCount(originalData.length);
			}

			// Event listeners
			searchInput.addEventListener('input', performSearch);
			statusFilter.addEventListener('change', performSearch);
			customerFilter.addEventListener('change', performSearch);
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

			// Table row click functionality for sale details
			const saleDetailsPanel = document.getElementById('saleDetailsPanel');
			const panelOverlay = document.getElementById('panelOverlay');
			const closePanelBtn = document.getElementById('closePanelBtn');
			
			// Sample sale details data
			const saleDetails = {
				'INV-P001': {
					invoice: 'INV-P001',
							date: 'Nov 10, 2025',
					customer: 'John Doe',
					amount: '$245.50',
					status: 'pending',
					items: [
						{ name: 'Laptop Stand', qty: 1, price: 89.99, total: 89.99 },
						{ name: 'Wireless Mouse', qty: 2, price: 25.50, total: 51.00 },
						{ name: 'USB Hub', qty: 1, price: 104.51, total: 104.51 }
					]
				},
				'INV-P002': {
					invoice: 'INV-P002',
							date: 'Nov 10, 2025',
					customer: 'Jane Smith',
					amount: '$189.75',
					status: 'processing',
					items: [
						{ name: 'Gaming Keyboard', qty: 1, price: 125.00, total: 125.00 },
						{ name: 'Mouse Pad', qty: 1, price: 64.75, total: 64.75 }
					]
				}
				// Add more mock data as needed
			};
			
			// Add click event to table rows
			tableRows.forEach((row, index) => {
				row.addEventListener('click', function(e) {
					// Don't trigger if clicking on action buttons
					if (e.target.closest('button')) return;
					
					// Remove clicked class from all rows
					tableRows.forEach(r => r.classList.remove('clicked'));
					
					// Add clicked class to current row
					this.classList.add('clicked');
					
					// Extract sale data from row
					const cells = this.querySelectorAll('td');
					const invoiceNumber = cells[1].textContent.trim();
					const saleData = saleDetails[invoiceNumber] || {
						invoice: cells[1].textContent.trim(),
						date: cells[2].textContent.trim(),
						customer: cells[3].textContent.trim(),
						amount: cells[4].textContent.trim(),
						status: cells[5].textContent.toLowerCase().includes('pending') ? 'pending' : 
								cells[5].textContent.toLowerCase().includes('processing') ? 'processing' : 'on-hold',
						items: [
							{ name: 'Sample Product', qty: 1, price: 100.00, total: 100.00 }
						]
					};
					
					// Populate panel with sale data
					populateSalePanel(saleData);
					
					// Show panel
					showSalePanel();
				});
			});
			
			// Function to show sale panel
			function showSalePanel() {
				saleDetailsPanel.classList.add('active');
				panelOverlay.classList.add('active');
				document.body.style.overflow = 'hidden';
			}
			
			// Function to hide sale panel
			function hideSalePanel() {
				saleDetailsPanel.classList.remove('active');
				panelOverlay.classList.remove('active');
				document.body.style.overflow = '';
				
				tableRows.forEach(r => r.classList.remove('clicked'));
			}
			
			// Panel close event listeners
			if (closePanelBtn) {
				closePanelBtn.addEventListener('click', hideSalePanel);
			}
			
			if (panelOverlay) {
				panelOverlay.addEventListener('click', hideSalePanel);
			}
			
			// ESC key to close panel
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape' && saleDetailsPanel.classList.contains('active')) {
					hideSalePanel();
				}
			});
			
			// Function to populate sale panel
			function populateSalePanel(data) {
				document.getElementById('detailInvoice').textContent = data.invoice;
				document.getElementById('detailDate').textContent = data.date;
				document.getElementById('detailCustomer').textContent = data.customer;
				document.getElementById('detailAmount').textContent = data.amount;
				
				// Set status with proper styling
				const statusBadge = document.getElementById('detailStatus');
				statusBadge.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
				statusBadge.className = `status-badge ${data.status}`;
				
				// Populate items list
				const itemsList = document.getElementById('detailItems');
				itemsList.innerHTML = '';
				
				if (data.items && data.items.length > 0) {
					data.items.forEach(item => {
						const itemDiv = document.createElement('div');
						itemDiv.className = 'item-row';
						itemDiv.innerHTML = `
							<div>
								<strong>${item.name}</strong><br>
								<small class="text-muted">Qty: ${item.qty} × $${item.price.toFixed(2)}</small>
							</div>
							<div class="text-end">
								<strong>$${item.total.toFixed(2)}</strong>
							</div>
						`;
						itemsList.appendChild(itemDiv);
					});
				} else {
					itemsList.innerHTML = '<div class="text-muted text-center py-3">No items found</div>';
				}
			}

			// Export functionality
			document.querySelector('.btn-outline-success').addEventListener('click', function() {
				const visibleRows = Array.from(tableBody.querySelectorAll('tr'));
				let csvContent = 'S/N,Invoice,Date,Customer,Amount,Status\n';
				
				visibleRows.forEach(row => {
					const cells = row.querySelectorAll('td');
					if (cells.length === 7) {
						const rowData = Array.from(cells.slice(0, 6)).map(cell => 
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
				link.download = 'pending_sales_' + new Date().toISOString().split('T')[0] + '.csv';
				document.body.appendChild(link);
				link.click();
				document.body.removeChild(link);
				window.URL.revokeObjectURL(url);
			});
		});
		</script>
	</body>
</html>
