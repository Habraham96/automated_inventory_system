<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>All Items - SalesPilot</title>
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
		/* Modal styles for better visibility */
		.modal-backdrop {
		  background-color: rgba(0, 0, 0, 0.7) !important;
		  z-index: 1050 !important;
		}
		.modal {
		  z-index: 1055 !important;
		}
		.modal-content {
		  border-radius: 15px !important;
		  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4) !important;
		  border: none !important;
		  overflow: hidden !important;
		}
		.modal-header {
		  border-bottom: none !important;
		  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
		  color: white !important;
		  padding: 1.5rem 2rem !important;
		}
		.modal-footer {
		  border-top: 1px solid #dee2e6 !important;
		  background-color: #f8f9fa !important;
		  padding: 1.5rem 2rem !important;
		}
		.modal-body {
		  padding: 2rem !important;
		  background-color: #ffffff !important;
		}
		
		/* Item option styling */
		.item-option {
		  transition: all 0.3s ease !important;
		  cursor: pointer !important;
		  border: 2px solid transparent !important;
		  margin-bottom: 0.75rem !important;
		  border-radius: 10px !important;
		}
		.item-option:hover {
		  background-color: #f8f9fa !important;
		  transform: translateX(5px) !important;
		  box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
		}
		.item-option.active {
		  background-color: #e3f2fd !important;
		  box-shadow: 0 3px 15px rgba(0,123,255,0.2) !important;
		}
		.item-option.active[data-type="standard"] {
		  border-color: #007bff !important;
		  background-color: #e3f2fd !important;
		}
		.item-option.active[data-type="variant"] {
		  border-color: #28a745 !important;
		  background-color: #d4edda !important;
		}
		.item-option.active[data-type="bundled"] {
		  border-color: #ffc107 !important;
		  background-color: #fff3cd !important;
		}
		
		/* Item details animation */
		.item-details {
		  opacity: 0 !important;
		  transition: opacity 0.3s ease !important;
		  display: none !important;
		}
		.item-details.active {
		  opacity: 1 !important;
		  display: block !important;
		}
		
		/* Modal buttons */
		.modal .btn {
		  border-radius: 8px !important;
		  font-weight: 500 !important;
		  transition: all 0.3s ease !important;
		}
		.modal .btn:hover {
		  transform: translateY(-1px) !important;
		  box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
		}
		
		/* Import/Export button styles */
		#importItems {
		  transition: all 0.3s ease !important;
		}
		#importItems:hover {
		  background-color: #17a2b8 !important;
		  color: white !important;
		  transform: translateY(-1px) !important;
		}
		#importItems:disabled {
		  opacity: 0.6 !important;
		  cursor: not-allowed !important;
		}
		
		#exportItems {
		  transition: all 0.3s ease !important;
		}
		#exportItems:hover {
		  background-color: #28a745 !important;
		  color: white !important;
		  transform: translateY(-1px) !important;
		}
		#exportItems:disabled {
		  opacity: 0.6 !important;
		  cursor: not-allowed !important;
		}
		
		/* Table row hover and click effects */
		#itemsTable tbody tr[data-clickable] {
		  transition: all 0.3s ease !important;
		  cursor: pointer !important;
		}
		#itemsTable tbody tr[data-clickable]:hover {
		  background-color: #f8f9fa !important;
		  transform: translateY(-2px) !important;
		  box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
		}
		#itemsTable tbody tr[data-clickable]:active {
		  transform: translateY(0) !important;
		  background-color: #e9ecef !important;
		}
		
		/* Prevent pointer events on interactive elements within rows */
		#itemsTable tbody tr td .form-check,
		#itemsTable tbody tr td .btn {
		  pointer-events: auto !important;
		  position: relative !important;
		  z-index: 10 !important;
		}
		
		/* Hover tooltip effect */
		#itemsTable tbody tr[data-clickable]:hover::after {
		  content: "Click to view details";
		  position: absolute;
		  background: rgba(0,0,0,0.8);
		  color: white;
		  padding: 5px 10px;
		  border-radius: 4px;
		  font-size: 12px;
		  white-space: nowrap;
		  z-index: 1000;
		  right: 10px;
		  top: 50%;
		  transform: translateY(-50%);
		  opacity: 0;
		  animation: fadeInTooltip 0.3s ease forwards;
		}
		
		@keyframes fadeInTooltip {
		  to {
		    opacity: 1;
		  }
		}
		
		/* Item details side panel styling */
		.item-details-panel {
		  position: fixed;
		  top: 0;
		  right: -500px;
		  width: 500px;
		  height: 100vh;
		  z-index: 1050;
		  transition: right 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
		}
		
		.item-details-panel.active {
		  right: 0;
		}
		
		.panel-overlay {
		  position: fixed;
		  top: 0;
		  left: 0;
		  width: 100vw;
		  height: 100vh;
		  background: rgba(0, 0, 0, 0.5);
		  opacity: 0;
		  visibility: hidden;
		  transition: all 0.3s ease;
		  z-index: -1;
		}
		
		.item-details-panel.active .panel-overlay {
		  opacity: 1;
		  visibility: visible;
		}
		
		.panel-content {
		  background: #ffffff;
		  height: 100%;
		  display: flex;
		  flex-direction: column;
		  box-shadow: -5px 0 25px rgba(0, 0, 0, 0.15);
		  position: relative;
		  z-index: 1;
		}
		
		.panel-header {
		  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
		  color: white;
		  padding: 1.5rem 2rem;
		  display: flex;
		  justify-content: between;
		  align-items: center;
		  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
		}
		
		.panel-title {
		  margin: 0;
		  font-size: 1.25rem;
		  font-weight: 600;
		  flex: 1;
		}
		
		.btn-close-panel {
		  background: none;
		  border: none;
		  color: white;
		  font-size: 1.2rem;
		  cursor: pointer;
		  padding: 0.5rem;
		  border-radius: 50%;
		  transition: all 0.3s ease;
		}
		
		.btn-close-panel:hover {
		  background: rgba(255, 255, 255, 0.2);
		  transform: scale(1.1);
		}
		
		.panel-body {
		  flex: 1;
		  padding: 2rem;
		  overflow-y: auto;
		}
		
		.item-image-section {
		  text-align: center;
		  margin-bottom: 2rem;
		  position: relative;
		}
		
		.item-image {
		  width: 150px;
		  height: 150px;
		  object-fit: cover;
		  border-radius: 15px;
		  border: 3px solid #e9ecef;
		  transition: all 0.3s ease;
		}
		
		.image-overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 50%;
		  transform: translateX(-50%);
		  opacity: 0;
		  transition: all 0.3s ease;
		}
		
		.item-image-section:hover .image-overlay {
		  opacity: 1;
		}
		
		.item-form-section {
		  animation: slideInUp 0.6s ease;
		}
		
		.form-group {
		  margin-bottom: 1.5rem;
		}
		
		.form-label {
		  font-weight: 600;
		  color: #495057;
		  margin-bottom: 0.5rem;
		  font-size: 0.9rem;
		}
		
		.form-control {
		  border: 2px solid #e9ecef;
		  border-radius: 10px;
		  padding: 0.75rem 1rem;
		  transition: all 0.3s ease;
		  background: #f8f9fa;
		}
		
		.form-control:focus {
		  border-color: #667eea;
		  box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
		  background: white;
		}
		
		.stock-status {
		  font-weight: 600;
		  border: none;
		  border-radius: 0 10px 10px 0;
		}
		
		.stock-status.in-stock {
		  background-color: #d4edda;
		  color: #155724;
		}
		
		.stock-status.low-stock {
		  background-color: #fff3cd;
		  color: #856404;
		}
		
		.stock-status.out-of-stock {
		  background-color: #f8d7da;
		  color: #721c24;
		}
		
		.calculated-section {
		  margin: 2rem 0;
		  padding: 1.5rem;
		  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
		  border-radius: 15px;
		  border: 1px solid #dee2e6;
		}
		
		.info-card {
		  text-align: center;
		  padding: 1rem;
		}
		
		.info-label {
		  font-size: 0.85rem;
		  color: #6c757d;
		  margin-bottom: 0.5rem;
		  font-weight: 500;
		}
		
		.info-value {
		  font-size: 1.4rem;
		  font-weight: 700;
		  color: #495057;
		}
		
		.panel-footer {
		  padding: 1.5rem 2rem;
		  background: #f8f9fa;
		  border-top: 1px solid #dee2e6;
		  display: flex;
		  justify-content: flex-end;
		  gap: 1rem;
		}
		
		.panel-footer .btn {
		  border-radius: 10px;
		  padding: 0.75rem 1.5rem;
		  font-weight: 600;
		  transition: all 0.3s ease;
		}
		
		.panel-footer .btn:hover {
		  transform: translateY(-2px);
		  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
		}
		
		@keyframes slideInUp {
		  from {
		    opacity: 0;
		    transform: translateY(30px);
		  }
		  to {
		    opacity: 1;
		    transform: translateY(0);
		  }
		}
		
		/* Responsive adjustments */
		@media (max-width: 768px) {
		  .item-details-panel {
		    width: 100vw;
		    right: -100vw;
		  }
		  
		  .panel-body {
		    padding: 1.5rem;
		  }
		  
		  .panel-header {
		    padding: 1rem 1.5rem;
		  }
		}
		
		/* Larger and centered checkboxes in table */
		#itemsTable th:nth-child(2),
		#itemsTable td:nth-child(2) {
		  text-align: center !important;
		  vertical-align: middle !important;
		  width: 80px !important;
		}
		
		/* Header checkbox styling */
		#itemsTable th:nth-child(2) .form-check {
		  justify-content: center !important;
		  margin: 0 !important;
		}
		
		#itemsTable th:nth-child(2) .form-check-input {
		  width: 1.2em !important;
		  height: 1.2em !important;
		  margin: 0 !important;
		  box-shadow: 0 2px 8px rgba(102,126,234,0.08);
		  border: 2px solid #667eea !important;
		}
		
		/* Row checkbox styling */
		.form-check-input.item-checkbox {
		  width: 1.5em !important;
		  height: 1.5em !important;
		  margin: 0 auto !important;
		  display: block !important;
		  box-shadow: 0 2px 8px rgba(102,126,234,0.08);
		  border: 2px solid #667eea !important;
		}
		
		.form-check {
		  display: flex !important;
		  justify-content: center !important;
		  align-items: center !important;
		  height: 100%;
		  margin: 0 !important;
		}

		/* Bulk action buttons styling */
		.bulk-actions {
		  display: inline-flex !important;
		  align-items: center;
		  animation: slideInRight 0.3s ease;
		}

		.bulk-actions .btn {
		  border-radius: 8px !important;
		  font-weight: 500 !important;
		  transition: all 0.3s ease !important;
		  padding: 0.5rem 1rem !important;
		}

		.bulk-actions .btn:hover {
		  transform: translateY(-1px) !important;
		  box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
		}

		#deselectAllBtn:hover {
		  background-color: #6c757d !important;
		  color: white !important;
		}

		#deleteSelectedBtn:hover {
		  background-color: #dc3545 !important;
		  color: white !important;
		}

		@keyframes slideInRight {
		  from {
		    opacity: 0;
		    transform: translateX(20px);
		  }
		  to {
		    opacity: 1;
		    transform: translateX(0);
		  }
		}

		/* Selected row highlighting */
		#itemsTable tbody tr.selected {
		  background-color: #e3f2fd !important;
		  border-left: 4px solid #2196f3 !important;
		}

		#itemsTable tbody tr.selected:hover {
		  background-color: #bbdefb !important;
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
				<!-- Sidebar include -->
				<?php include '../layouts/sidebar_content_pages.php'; ?>
				
				<!-- partial -->
				<div class="main-panel">
					<div class="content-wrapper">
						<!-- All Items content starts here -->
						<div class="row">
							<div class="col-12 grid-margin stretch-card">
								<div class="card card-rounded">
									<div class="card-body">
										<div class="d-sm-flex align-items-center justify-content-between mb-3">
											<div>
												<h4 class="card-title mb-0">All Items</h4>
												<p class="card-description">Manage your inventory items</p>
												<p style="color: red;">NOTE; Items tracked here are items with with TURNED ON stock tracking details.</p>
											</div>
											<div class="btn-wrapper">
												<button type="button" class="btn btn-primary text-white me-0" id="addItemQuickAction">
													<i class="bi bi-plus"></i> Add Item
												</button>
												
												<!-- Bulk Action Buttons (Hidden by default) -->
												<div class="bulk-actions ms-2" id="bulkActions" style="display: none;">
													<button type="button" class="btn btn-outline-secondary me-2" id="deselectAllBtn">
														<i class="bi bi-x-circle"></i> Deselect All
													</button>
													<button type="button" class="btn btn-outline-danger" id="deleteSelectedBtn">
														<i class="bi bi-trash"></i> Delete Selected
													</button>
												</div>
											</div>
										</div>
															
															<!-- Search and Filter Options -->
															<div class="row mb-3">
																<div class="col-md-4">
																	<div class="input-group">
																		<input type="text" class="form-control" placeholder="Search items..." id="searchItems">
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
																		<option value="Furniture">Furniture</option>
																		<option value="Kitchen">Kitchen</option>
																		<option value="Clothing">Clothing</option>
																	</select>
																	
																	<!-- Inventory Status Filter -->
																	<select class="form-select" id="inventoryFilter" style="max-width: 140px;">
																		<option value="">All Stock</option>
																		<option value="in-stock">In Stock</option>
																		<option value="low-stock">Low Stock</option>
																		<option value="out-of-stock">Out of Stock</option>
																	</select>
																	
																	<!-- Suppliers Filter -->
																	<select class="form-select" id="supplierFilter" style="max-width: 140px;">
																		<option value="">All Suppliers</option>
																		<option value="supplier1">Tech Solutions Ltd</option>
																		<option value="supplier2">Global Electronics</option>
																		<option value="supplier3">Office Furniture Co</option>
																		<option value="supplier4">Kitchen Essentials</option>
																	</select>
																	
																	<!-- Action Buttons -->
																	<button class="btn btn-outline-primary" id="applyFilters">
																		<i class="bi bi-funnel"></i> Apply
																	</button>
																	<button class="btn btn-outline-secondary" id="clearFilters">
																		<i class="bi bi-x-circle"></i> Clear
																	</button>
																	<button class="btn btn-outline-info" id="importItems">
																		<i class="bi bi-upload"></i> Import
																	</button>
																	<button class="btn btn-outline-success" id="exportItems">
																		<i class="bi bi-download"></i> Export
																	</button>
																	
																	<!-- Hidden file input for import -->
																	<input type="file" id="importFile" accept=".csv,.xlsx,.xls" style="display: none;">
																</div>
															</div>
															<br>

															<!-- Items Table -->
															<div class="table-responsive">
																<table class="table table-striped" id="itemsTable">
																	<thead>
																		<tr>
 																	<th>S/N</th>
 																	<th>
 																		<div class="form-check">
 																			<input class="form-check-input" type="checkbox" id="selectAllItems" title="Select All Items">
 																		</div>
 																	</th>
 																	<th>Item</th>
 																	<th>Category</th>
 																	<th>Unit</th>
 																	<th>Stock</th>
 																	<th>Selling Price</th>
 																	<th>Cost Price</th>
 																	<th>Supplier</th>
 																	<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<!-- Item Row 1 -->
																		<tr>
																			<td>1</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="1">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face1.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Samsung Galaxy S23 Ultra</h6>
																						<small class="text-muted">SKU: SAM-S23-001</small>
																					</div>
																				</div>
																			</td>
																			<td>Electronics</td>
																			<td>Piece</td>
																			<td>45</td>
																			<td>₦850,000</td>
																			<td>₦780,000</td>
																			<td>Tech Solutions Ltd</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 2 -->
																		<tr>
																			<td>2</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="2">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face2.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">MacBook Pro 14"</h6>
																						<small class="text-muted">SKU: APL-MBP-014</small>
																					</div>
																				</div>
																			</td>
																			<td>Electronics</td>
																			<td>Piece</td>
																			<td>8</td>
																			<td>₦1,450,000</td>
																			<td>₦1,300,000</td>
																			<td>Global Electronics</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 3 -->
																		<tr>
																			<td>3</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="3">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face3.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Sony WH-1000XM5 Headphones</h6>
																						<small class="text-muted">SKU: SNY-WH-005</small>
																					</div>
																				</div>
																			</td>
																			<td>Accessories</td>
																			<td>Piece</td>
																			<td>0</td>
																			<td>₦180,000</td>
																			<td>₦150,000</td>
																			<td>Global Electronics</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 4 -->
																		<tr>
																			<td>4</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="4">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face4.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Herman Miller Aeron Chair</h6>
																						<small class="text-muted">SKU: HM-AER-001</small>
																					</div>
																				</div>
																			</td>
																			<td>Furniture</td>
																			<td>Piece</td>
																			<td>12</td>
																			<td>₦450,000</td>
																			<td>₦380,000</td>
																			<td>Office Furniture Co</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>

																		<!-- Item Row 5 -->
																		<tr>
																			<td>5</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="5">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face5.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">KitchenAid Stand Mixer</h6>
																						<small class="text-muted">SKU: KA-SM-001</small>
																					</div>
																				</div>
																			</td>
																			<td>Kitchen</td>
																			<td>Piece</td>
																			<td>25</td>
																			<td>₦280,000</td>
																			<td>₦220,000</td>
																			<td>Kitchen Essentials</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 6 -->
																		<tr>
																			<td>6</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="6">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face1.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Nike Air Max 270</h6>
																						<small class="text-muted">SKU: NK-AM-270</small>
																					</div>
																				</div>
																			</td>
																			<td>Clothing</td>
																			<td>Pair</td>
																			<td>65</td>
																			<td>₦85,000</td>
																			<td>₦65,000</td>
																			<td>Global Electronics</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 7 -->
																		<tr>
																			<td>7</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="7">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face2.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Dell XPS 13 Laptop</h6>
																						<small class="text-muted">SKU: DL-XPS-013</small>
																					</div>
																				</div>
																			</td>
																			<td>Electronics</td>
																			<td>Piece</td>
																			<td>18</td>
																			<td>₦920,000</td>
																			<td>₦820,000</td>
																			<td>Global Electronics</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 8 -->
																		<tr>
																			<td>8</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="8">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face3.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Logitech MX Master 3 Mouse</h6>
																						<small class="text-muted">SKU: LG-MX-003</small>
																					</div>
																				</div>
																			</td>
																			<td>Accessories</td>
																			<td>Piece</td>
																			<td>42</td>
																			<td>₦35,000</td>
																			<td>₦28,000</td>
																			<td>Tech Solutions Ltd</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 9 -->
																		<tr>
																			<td>9</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="9">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face4.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">IKEA BEKANT Desk</h6>
																						<small class="text-muted">SKU: IK-BK-001</small>
																					</div>
																				</div>
																			</td>
																			<td>Furniture</td>
																			<td>Piece</td>
																			<td>30</td>
																			<td>₦75,000</td>
																			<td>₦55,000</td>
																			<td>Office Furniture Co</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 10 -->
																		<tr>
																			<td>10</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="10">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face5.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Ninja Blender Pro</h6>
																						<small class="text-muted">SKU: NJ-BL-PRO</small>
																					</div>
																				</div>
																			</td>
																			<td>Kitchen</td>
																			<td>Piece</td>
																			<td>5</td>
																			<td>₦95,000</td>
																			<td>₦75,000</td>
																			<td>Kitchen Essentials</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 11 -->
																		<tr>
																			<td>11</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="11">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face1.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Adidas Ultraboost 22</h6>
																						<small class="text-muted">SKU: AD-UB-022</small>
																					</div>
																				</div>
																			</td>
																			<td>Clothing</td>
																			<td>Pair</td>
																			<td>85</td>
																			<td>₦120,000</td>
																			<td>₦95,000</td>
																			<td>Global Electronics</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 12 -->
																		<tr>
																			<td>12</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="12">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face2.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">iPad Pro 12.9" (6th Gen)</h6>
																						<small class="text-muted">SKU: APL-IPD-129</small>
																					</div>
																				</div>
																			</td>
																			<td>Electronics</td>
																			<td>Piece</td>
																			<td>22</td>
																			<td>₦650,000</td>
																			<td>₦580,000</td>
																			<td>Tech Solutions Ltd</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 13 -->
																		<tr>
																			<td>13</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="13">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face3.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Bose QuietComfort Earbuds</h6>
																						<small class="text-muted">SKU: BS-QC-EAR</small>
																					</div>
																				</div>
																			</td>
																			<td>Accessories</td>
																			<td>Piece</td>
																			<td>38</td>
																			<td>₦145,000</td>
																			<td>₦120,000</td>
																			<td>Tech Solutions Ltd</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 14 -->
																		<tr>
																			<td>14</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="14">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face4.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Steelcase Leap V2 Chair</h6>
																						<small class="text-muted">SKU: SC-LP-V2</small>
																					</div>
																				</div>
																			</td>
																			<td>Furniture</td>
																			<td>Piece</td>
																			<td>7</td>
																			<td>₦380,000</td>
																			<td>₦320,000</td>
																			<td>Office Furniture Co</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 15 -->
																		<tr>
																			<td>15</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="15">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face5.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Instant Pot Duo 7-in-1</h6>
																						<small class="text-muted">SKU: IP-DUO-7IN1</small>
																					</div>
																				</div>
																			</td>
																			<td>Kitchen</td>
																			<td>Piece</td>
																			<td>55</td>
																			<td>₦65,000</td>
																			<td>₦50,000</td>
																			<td>Kitchen Essentials</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 16 -->
																		<tr>
																			<td>16</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="16">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face1.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Levi's 501 Original Jeans</h6>
																						<small class="text-muted">SKU: LV-501-ORG</small>
																					</div>
																				</div>
																			</td>
																			<td>Clothing</td>
																			<td>Piece</td>
																			<td>120</td>
																			<td>₦25,000</td>
																			<td>₦18,000</td>
																			<td>Global Electronics</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 17 -->
																		<tr>
																			<td>17</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="17">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face2.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Microsoft Surface Pro 9</h6>
																						<small class="text-muted">SKU: MS-SP-009</small>
																					</div>
																				</div>
																			</td>
																			<td>Electronics</td>
																			<td>Piece</td>
																			<td>15</td>
																			<td>₦750,000</td>
																			<td>₦680,000</td>
																			<td>Tech Solutions Ltd</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 18 -->
																		<tr>
																			<td>18</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="18">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face3.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Razer DeathAdder V3 Mouse</h6>
																						<small class="text-muted">SKU: RZ-DA-V3</small>
																					</div>
																				</div>
																			</td>
																			<td>Accessories</td>
																			<td>Piece</td>
																			<td>68</td>
																			<td>₦28,000</td>
																			<td>₦22,000</td>
																			<td>Example Supplier</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 19 -->
																		<tr>
																			<td>19</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="19">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face4.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">West Elm Mid-Century Bookshelf</h6>
																						<small class="text-muted">SKU: WE-MC-BSF</small>
																					</div>
																				</div>
																			</td>
																			<td>Furniture</td>
																			<td>Piece</td>
																			<td>3</td>
																			<td>₦195,000</td>
																			<td>₦155,000</td>
																			<td>Example Supplier</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																		
																		<!-- Item Row 20 -->
																		<tr>
																			<td>20</td>
																			<td>
																				<div class="form-check">
																					<input class="form-check-input item-checkbox" type="checkbox" value="20">
																				</div>
																			</td>
																			<td>
																				<div class="d-flex align-items-center">
																					<img src="../assets/images/faces/face5.jpg" alt="Product" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
																					<div>
																						<h6 class="mb-0">Breville Barista Express</h6>
																						<small class="text-muted">SKU: BV-BE-EXP</small>
																					</div>
																				</div>
																			</td>
																			<td>Kitchen</td>
																			<td>Piece</td>
																			<td>12</td>
																			<td>₦380,000</td>
																			<td>₦320,000</td>
																			<td>Example Supplier</td>
																			<td>
																				<button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Item"><i class="bi bi-pencil"></i></button>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<br>
															
															<!-- Pagination and Stats -->
															<div class="row mt-3">
																<div class="col-md-6">
																	<span class="text-muted">Showing 1 to 5 of 124 entries</span>
																</div>
																<div class="col-md-6">
																	<nav aria-label="Page navigation">
																		<ul class="pagination justify-content-end">
																			<li class="page-item disabled">
																				<a class="page-link" href="#" tabindex="-1">Previous</a>
																			</li>
																			<li class="page-item active"><a class="page-link" href="#">1</a></li>
																			<li class="page-item"><a class="page-link" href="#">2</a></li>
																			<li class="page-item"><a class="page-link" href="#">3</a></li>
																			<li class="page-item">
																				<a class="page-link" href="#">Next</a>
																			</li>
																		</ul>
																	</nav>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
						<!-- End of All Items content -->
					</div>
					
					<!-- partial:partials/_footer.html -->
					
					<!-- Item Details Side Panel -->
					<div class="item-details-panel" id="itemDetailsPanel">
						<div class="panel-overlay" id="panelOverlay"></div>
						<div class="panel-content">
							<div class="panel-header">
								<h5 class="panel-title">
									<i class="bi bi-box-seam me-2"></i>Item Details
								</h5>
								<button type="button" class="btn-close-panel" id="closePanelBtn">
									<i class="bi bi-x-lg"></i>
								</button>
							</div>
							
							<div class="panel-body">
								<!-- Item Image Section -->
								<div class="item-image-section">
									<img id="panelItemImage" src="../assets/images/faces/face1.jpg" alt="Item Image" class="item-image">
									<div class="image-overlay">
										<button class="btn btn-light btn-sm">
											<i class="bi bi-camera"></i> Change Image
										</button>
									</div>
								</div>
								
								<!-- Item Information Form -->
								<div class="item-form-section">
									<div class="form-group">
										<label class="form-label">Item Name</label>
										<input type="text" class="form-control" id="panelItemName" readonly>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label">SKU</label>
												<input type="text" class="form-control" id="panelItemSku" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label">Category</label>
												<input type="text" class="form-control" id="panelItemCategory" readonly>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label">Unit</label>
												<input type="text" class="form-control" id="panelItemUnit" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label">Stock Quantity</label>
												<div class="input-group">
													<input type="number" class="form-control" id="panelItemStock" readonly>
													<span class="input-group-text stock-status" id="panelStockStatus">In Stock</span>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label">Selling Price</label>
												<input type="text" class="form-control" id="panelItemSellingPrice" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label">Cost Price</label>
												<input type="text" class="form-control" id="panelItemCostPrice" readonly>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="form-label">Supplier</label>
										<input type="text" class="form-control" id="panelItemSupplier" readonly>
									</div>
									
									<!-- Calculated Fields -->
									<div class="calculated-section">
										<div class="row">
											<div class="col-md-6">
												<div class="info-card">
													<div class="info-label">Profit Margin</div>
													<div class="info-value" id="panelItemProfit">0%</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="info-card">
													<div class="info-label">Total Value</div>
													<div class="info-value" id="panelItemTotalValue">₦0</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="form-label">Last Updated</label>
										<input type="text" class="form-control" id="panelItemLastUpdated" readonly>
									</div>
								</div>
							</div>
							
							<div class="panel-footer">
								<button type="button" class="btn btn-secondary me-2" id="closePanelFooterBtn">Close</button>
								<button type="button" class="btn btn-primary" id="editItemPanelBtn">
									<i class="bi bi-pencil me-1"></i>Edit Item
								</button>
							</div>
						</div>
					</div>
					
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

		<!-- plugins:js -->
		<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
		<script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<script src="../assets/vendors/chart.js/chart.umd.js"></script>
		<script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="../assets/js/off-canvas.js"></script>
		<script src="../assets/js/template.js"></script>
		<script src="../assets/js/settings.js"></script>
		<script src="../assets/js/hoverable-collapse.js"></script>
		<script src="../assets/js/todolist.js"></script>
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="../assets/js/dashboard.js"></script>
		<!-- End custom js for this page-->

		<!-- Include Sidebar Scripts -->
		<?php include '../layouts/sidebar_scripts.php'; ?>
		
		<!-- Bootstrap JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		
		<!-- Sidebar Menu Behavior - Keep Inventory menu expanded on page load -->
		<script>
		document.addEventListener('DOMContentLoaded', function() {
          
          

		  // Items Table Functionality
		  
		  // Select All functionality
		  const selectAllCheckbox = document.getElementById('selectAllItems');
		  const itemCheckboxes = document.querySelectorAll('.item-checkbox');
		  const bulkActions = document.getElementById('bulkActions');
		  const deselectAllBtn = document.getElementById('deselectAllBtn');
		  const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
		  
		  // Function to toggle bulk actions visibility
		  function toggleBulkActions() {
		    const selectedCheckboxes = Array.from(itemCheckboxes).filter(cb => cb.checked);
		    
		    if (selectedCheckboxes.length > 0) {
		      bulkActions.style.display = 'inline-flex';
		      deleteSelectedBtn.textContent = `Delete ${selectedCheckboxes.length} Selected`;
		      
		      // Highlight selected rows
		      itemCheckboxes.forEach(checkbox => {
		        const row = checkbox.closest('tr');
		        if (checkbox.checked) {
		          row.classList.add('selected');
		        } else {
		          row.classList.remove('selected');
		        }
		      });
		    } else {
		      bulkActions.style.display = 'none';
		      
		      // Remove highlighting from all rows
		      itemCheckboxes.forEach(checkbox => {
		        const row = checkbox.closest('tr');
		        row.classList.remove('selected');
		      });
		    }
		  }
		  
		  if (selectAllCheckbox) {
		    selectAllCheckbox.addEventListener('change', function() {
		      itemCheckboxes.forEach(checkbox => {
		        checkbox.checked = this.checked;
		      });
		      toggleBulkActions();
		    });
		  }
		  
		  // Individual checkbox change
		  itemCheckboxes.forEach(checkbox => {
		    checkbox.addEventListener('change', function() {
		      const allChecked = Array.from(itemCheckboxes).every(cb => cb.checked);
		      const someChecked = Array.from(itemCheckboxes).some(cb => cb.checked);
		      
		      if (selectAllCheckbox) {
		        selectAllCheckbox.checked = allChecked;
		        selectAllCheckbox.indeterminate = someChecked && !allChecked;
		      }
		      
		      toggleBulkActions();
		    });
		  });
		  
		  // Deselect All button functionality
		  if (deselectAllBtn) {
		    deselectAllBtn.addEventListener('click', function() {
		      itemCheckboxes.forEach(checkbox => {
		        checkbox.checked = false;
		      });
		      
		      if (selectAllCheckbox) {
		        selectAllCheckbox.checked = false;
		        selectAllCheckbox.indeterminate = false;
		      }
		      
		      toggleBulkActions();
		    });
		  }
		  
		  // Delete Selected button functionality
		  if (deleteSelectedBtn) {
		    deleteSelectedBtn.addEventListener('click', function() {
		      const selectedCheckboxes = Array.from(itemCheckboxes).filter(cb => cb.checked);
		      const selectedCount = selectedCheckboxes.length;
		      
		      if (selectedCount === 0) return;
		      
		      // Show confirmation dialog
		      const confirmMessage = `Are you sure you want to delete ${selectedCount} selected item${selectedCount > 1 ? 's' : ''}? This action cannot be undone.`;
		      
		      if (confirm(confirmMessage)) {
		        // Get selected item IDs
		        const selectedIds = selectedCheckboxes.map(cb => cb.value);
		        
		        // Show loading state
		        deleteSelectedBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Deleting...';
		        deleteSelectedBtn.disabled = true;
		        
		        // Simulate deletion process (replace with actual server call)
		        setTimeout(() => {
		          // Remove selected rows from table
		          selectedCheckboxes.forEach(checkbox => {
		            const row = checkbox.closest('tr');
		            row.remove();
		          });
		          
		          // Reset button state
		          deleteSelectedBtn.innerHTML = '<i class="bi bi-trash"></i> Delete Selected';
		          deleteSelectedBtn.disabled = false;
		          
		          // Hide bulk actions
		          bulkActions.style.display = 'none';
		          
		          // Reset select all checkbox
		          if (selectAllCheckbox) {
		            selectAllCheckbox.checked = false;
		            selectAllCheckbox.indeterminate = false;
		          }
		          
		          // Show success message
		          alert(`Successfully deleted ${selectedCount} item${selectedCount > 1 ? 's' : ''}.`);
		          
		        }, 1500);
		      }
		    });
		  }
		  
		  // Table row click functionality for item details
		  const itemsTable = document.getElementById('itemsTable');
		  const itemDetailsPanel = document.getElementById('itemDetailsPanel');
		  const panelOverlay = document.getElementById('panelOverlay');
		  const closePanelBtn = document.getElementById('closePanelBtn');
		  const closePanelFooterBtn = document.getElementById('closePanelFooterBtn');
		  
		  // Add click event to table rows
		  if (itemsTable) {
		    const tableRows = itemsTable.querySelectorAll('tbody tr');
		    
		    tableRows.forEach((row, index) => {
		      row.addEventListener('click', function(e) {
		        // Prevent panel opening when clicking on checkbox or action buttons
		        if (e.target.closest('.form-check') || e.target.closest('.btn') || e.target.closest('td:last-child')) {
		          return;
		        }
		        
		        // Extract item data from row
		        const cells = row.querySelectorAll('td');
		        const itemData = {
		          id: cells[0].textContent.trim(),
		          name: cells[2].querySelector('h6').textContent.trim(),
		          sku: cells[2].querySelector('small').textContent.replace('SKU: ', '').trim(),
		          category: cells[3].textContent.trim(),
		          unit: cells[4].textContent.trim(),
		          stock: parseInt(cells[5].textContent.trim()),
		          sellingPrice: cells[6].textContent.trim(),
		          costPrice: cells[7].textContent.trim(),
		          supplier: cells[8].textContent.trim(),
		          image: cells[2].querySelector('img').src
		        };
		        
		        // Populate panel with item data
		        populateItemPanel(itemData);
		        
		        // Show panel
		        showItemPanel();
		      });
		      
		      // Add hover effect data attribute
		      row.setAttribute('data-clickable', 'true');
		    });
		  }
		  
		  // Function to show item panel
		  function showItemPanel() {
		    itemDetailsPanel.classList.add('active');
		    document.body.style.overflow = 'hidden'; // Prevent background scrolling
		  }
		  
		  // Function to hide item panel
		  function hideItemPanel() {
		    itemDetailsPanel.classList.remove('active');
		    document.body.style.overflow = ''; // Restore scrolling
		  }
		  
		  // Panel close event listeners
		  if (closePanelBtn) {
		    closePanelBtn.addEventListener('click', hideItemPanel);
		  }
		  
		  if (closePanelFooterBtn) {
		    closePanelFooterBtn.addEventListener('click', hideItemPanel);
		  }
		  
		  if (panelOverlay) {
		    panelOverlay.addEventListener('click', hideItemPanel);
		  }
		  
		  // ESC key to close panel
		  document.addEventListener('keydown', function(e) {
		    if (e.key === 'Escape' && itemDetailsPanel.classList.contains('active')) {
		      hideItemPanel();
		    }
		  });
		  
		  // Function to populate item panel
		  function populateItemPanel(itemData) {
		    document.getElementById('panelItemImage').src = itemData.image;
		    document.getElementById('panelItemName').value = itemData.name;
		    document.getElementById('panelItemSku').value = itemData.sku;
		    document.getElementById('panelItemCategory').value = itemData.category;
		    document.getElementById('panelItemUnit').value = itemData.unit;
		    document.getElementById('panelItemStock').value = itemData.stock;
		    document.getElementById('panelItemSellingPrice').value = itemData.sellingPrice;
		    document.getElementById('panelItemCostPrice').value = itemData.costPrice;
		    document.getElementById('panelItemSupplier').value = itemData.supplier;
		    
		    // Calculate and display profit margin
		    const sellingPrice = parseFloat(itemData.sellingPrice.replace(/[₦,]/g, ''));
		    const costPrice = parseFloat(itemData.costPrice.replace(/[₦,]/g, ''));
		    const profitMargin = ((sellingPrice - costPrice) / costPrice * 100).toFixed(2);
		    document.getElementById('panelItemProfit').textContent = `${profitMargin}%`;
		    
		    // Calculate total value
		    const totalValue = (sellingPrice * itemData.stock).toLocaleString('en-NG', {
		      style: 'currency',
		      currency: 'NGN',
		      minimumFractionDigits: 0
		    });
		    document.getElementById('panelItemTotalValue').textContent = totalValue;
		    
		    // Set stock status
		    const statusElement = document.getElementById('panelStockStatus');
		    if (itemData.stock === 0) {
		      statusElement.textContent = 'Out of Stock';
		      statusElement.className = 'input-group-text stock-status out-of-stock';
		    } else if (itemData.stock <= 10) {
		      statusElement.textContent = 'Low Stock';
		      statusElement.className = 'input-group-text stock-status low-stock';
		    } else {
		      statusElement.textContent = 'In Stock';
		      statusElement.className = 'input-group-text stock-status in-stock';
		    }
		    
		    // Set last updated date (current date for demo)
		    const now = new Date();
		    document.getElementById('panelItemLastUpdated').value = now.toLocaleDateString('en-US', {
		      year: 'numeric',
		      month: 'long',
		      day: 'numeric',
		      hour: '2-digit',
		      minute: '2-digit'
		    });
		    
		    // Store item ID for edit functionality
		    document.getElementById('editItemPanelBtn').setAttribute('data-item-id', itemData.id);
		  }
		  
		  // Edit item button functionality
		  document.getElementById('editItemPanelBtn').addEventListener('click', function() {
		    const itemId = this.getAttribute('data-item-id');
		    // Close panel
		    hideItemPanel();
		    // Here you can redirect to edit page or enable editing mode
		    console.log('Edit item with ID:', itemId);
		    // Example: window.location.href = `edit_item.php?id=${itemId}`;
		  });
		  
		  // Search and Filter functionality
		  const searchInput = document.getElementById('searchItems');
		  const categoryFilter = document.getElementById('categoryFilter');
		  const inventoryFilter = document.getElementById('inventoryFilter');
		  const supplierFilter = document.getElementById('supplierFilter');
		  const applyFiltersBtn = document.getElementById('applyFilters');
		  const clearFiltersBtn = document.getElementById('clearFilters');
		  
		  // Function to determine stock status based on quantity
		  function getStockStatus(quantity) {
		    const qty = parseInt(quantity);
		    if (qty === 0) return 'out-of-stock';
		    if (qty <= 10) return 'low-stock';
		    return 'in-stock';
		  }
		  
		  // Function to apply all filters
		  function applyAllFilters() {
		    const searchTerm = searchInput.value.toLowerCase();
		    const selectedCategory = categoryFilter.value;
		    const selectedInventory = inventoryFilter.value;
		    const selectedSupplier = supplierFilter.value;
		    const tableRows = document.querySelectorAll('#itemsTable tbody tr');
		    
		    tableRows.forEach(row => {
		      const itemName = row.querySelector('h6').textContent.toLowerCase();
		      const category = row.cells[3].textContent.trim(); // Category column
		      const stockQuantity = row.cells[5].textContent.trim(); // Stock column
		      const stockStatus = getStockStatus(stockQuantity);
		      
		      // Search filter
		      const matchesSearch = itemName.includes(searchTerm) || 
		                           category.toLowerCase().includes(searchTerm);
		      
		      // Category filter
		      const matchesCategory = !selectedCategory || category === selectedCategory;
		      
		      // Inventory filter
		      const matchesInventory = !selectedInventory || stockStatus === selectedInventory;
		      
		      // Supplier filter (for demo purposes, randomly assign)
		      const matchesSupplier = !selectedSupplier; // This would be based on actual supplier data
		      
		      // Show/hide row based on all filters
		      if (matchesSearch && matchesCategory && matchesInventory && matchesSupplier) {
		        row.style.display = '';
		      } else {
		        row.style.display = 'none';
		      }
		    });
		  }
		  
		  // Real-time search
		  if (searchInput) {
		    searchInput.addEventListener('input', applyAllFilters);
		  }
		  
		  // Apply filters button
		  if (applyFiltersBtn) {
		    applyFiltersBtn.addEventListener('click', applyAllFilters);
		  }
		  
		  // Clear filters button
		  if (clearFiltersBtn) {
		    clearFiltersBtn.addEventListener('click', function() {
		      searchInput.value = '';
		      categoryFilter.value = '';
		      inventoryFilter.value = '';
		      supplierFilter.value = '';
		      applyAllFilters();
		    });
		  }
		  
		  // Import functionality
		  const importBtn = document.getElementById('importItems');
		  const importFile = document.getElementById('importFile');
		  
		  if (importBtn) {
		    importBtn.addEventListener('click', function() {
		      importFile.click();
		    });
		  }
		  
		  if (importFile) {
		    importFile.addEventListener('change', function(e) {
		      const file = e.target.files[0];
		      if (file) {
		        // Check file type
		        const fileType = file.name.split('.').pop().toLowerCase();
		        if (['csv', 'xlsx', 'xls'].includes(fileType)) {
		          handleFileImport(file);
		        } else {
		          alert('Please select a valid file format (CSV, XLSX, or XLS)');
		        }
		      }
		    });
		  }
		  
		  // Export functionality
		  const exportBtn = document.getElementById('exportItems');
		  
		  if (exportBtn) {
		    exportBtn.addEventListener('click', function() {
		      exportItemsToCSV();
		    });
		  }
		  
		  // Function to handle file import
		  function handleFileImport(file) {
		    const formData = new FormData();
		    formData.append('importFile', file);
		    
		    // Show loading state
		    importBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Importing...';
		    importBtn.disabled = true;
		    
		    // Simulate import process (replace with actual server call)
		    setTimeout(() => {
		      // Reset button state
		      importBtn.innerHTML = '<i class="bi bi-upload"></i> Import';
		      importBtn.disabled = false;
		      
		      // Show success message
		      alert(`Successfully imported items from ${file.name}`);
		      
		      // Refresh the page or update the table
		      location.reload();
		    }, 2000);
		    
		    // Reset file input
		    importFile.value = '';
		  }
		  
		  // Function to export items to CSV
		  function exportItemsToCSV() {
		    // Show loading state
		    exportBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Exporting...';
		    exportBtn.disabled = true;
		    
		    // Get table data
		    const table = document.getElementById('itemsTable');
		    const rows = table.querySelectorAll('tbody tr');
		    
		    // CSV headers
		    let csvContent = 'S/N,Item Name,Category,SKU,Quantity,Unit Price,Status,Action Date,Supplier\n';
		    
		    // Add visible rows to CSV
		    rows.forEach((row, index) => {
		      if (row.style.display !== 'none') {
		        const cells = row.querySelectorAll('td');
		        if (cells.length > 2) { // Skip empty rows
		          const rowData = [
		            cells[0].textContent.trim(), // S/N
		            cells[2].textContent.trim(), // Item Name
		            cells[3].textContent.trim(), // Category
		            cells[4].textContent.trim(), // SKU
		            cells[5].textContent.trim(), // Quantity
		            cells[6].textContent.trim(), // Unit Price
		            cells[7].textContent.trim(), // Status
		            new Date().toLocaleDateString(), // Action Date
		            'N/A' // Supplier (placeholder)
		          ];
		          csvContent += rowData.map(field => `"${field.replace(/"/g, '""')}"`).join(',') + '\n';
		        }
		      }
		    });
		    
		    // Create and download CSV file
		    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
		    const link = document.createElement('a');
		    const url = URL.createObjectURL(blob);
		    link.setAttribute('href', url);
		    link.setAttribute('download', `inventory_items_${new Date().toISOString().split('T')[0]}.csv`);
		    link.style.visibility = 'hidden';
		    document.body.appendChild(link);
		    link.click();
		    document.body.removeChild(link);
		    
		    // Reset button state
		    setTimeout(() => {
		      exportBtn.innerHTML = '<i class="bi bi-download"></i> Export';
		      exportBtn.disabled = false;
		    }, 1000);
		  }
		  
		  // Filter change events
		  [categoryFilter, inventoryFilter, supplierFilter].forEach(filter => {
		    if (filter) {
		      filter.addEventListener('change', applyAllFilters);
		    }
		  });
		  
		  // Action buttons functionality
		  document.querySelectorAll('.btn-outline-primary').forEach(button => {
		    if (button.title === 'View') {
		      button.addEventListener('click', function() {
		        // View item functionality
		        console.log('View item clicked');
		        // Add your view logic here
		      });
		    }
		  });
		  
		  document.querySelectorAll('.btn-outline-warning').forEach(button => {
		    if (button.title === 'Edit') {
		      button.addEventListener('click', function() {
		        // Edit item functionality
		        console.log('Edit item clicked');
		        // Add your edit logic here
		      });
		    }
		  });
		  
		  document.querySelectorAll('.btn-outline-danger').forEach(button => {
		    if (button.title === 'Delete') {
		      button.addEventListener('click', function() {
		        // Delete item functionality with confirmation
		        if (confirm('Are you sure you want to delete this item?')) {
		          console.log('Delete item confirmed');
		          // Add your delete logic here
		        }
		      });
		    }
		  });

		  // Add Item Quick Action functionality
		  var addItemBtn = document.getElementById('addItemQuickAction');
		  if (addItemBtn) {
		    console.log('Add Item button found, attaching event listener');
		    addItemBtn.addEventListener('click', function(e) {
		      e.preventDefault();
		      e.stopPropagation();
		      
		      console.log('Add Item button clicked');
		      
		      var modal = document.getElementById('itemTypeModal');
		      if (modal) {
		        try {
		          // Check if Bootstrap is loaded
		          if (typeof bootstrap === 'undefined') {
		            console.error('Bootstrap JS is not loaded!');
		            alert('Bootstrap JavaScript is required for modals. Please refresh the page.');
		            return;
		          }
		          
		          var bsModal = bootstrap.Modal.getOrCreateInstance(modal);
		          bsModal.show();
		          console.log('Modal should be showing now');
		        } catch (error) {
		          console.error('Error showing modal:', error);
		          alert('Error opening modal: ' + error.message);
		        }
		      } else {
		        console.error('Modal element not found!');
		        alert('Modal not found on page!');
		      }
		    });
		  } else {
		    console.error('Add Item button not found!');
		  }
		});

		// Function to show item details when clicking on options
		function showItemDetails(type) {
		  console.log('Showing details for type:', type);
		  
		  // Remove active class from all options and reset their styles
		  document.querySelectorAll('.item-option').forEach(option => {
		    option.classList.remove('active');
		    option.style.border = '2px solid transparent';
		    option.style.backgroundColor = '';
		  });
		  
		  // Add active class to clicked option and apply active styling
		  const selectedOption = document.querySelector(`[data-type="${type}"]`);
		  if (selectedOption) {
		    selectedOption.classList.add('active');
		    
		    // Apply type-specific active styling
		    switch(type) {
		      case 'standard':
		        selectedOption.style.border = '2px solid #007bff';
		        selectedOption.style.backgroundColor = '#e3f2fd';
		        break;
		      case 'variant':
		        selectedOption.style.border = '2px solid #28a745';
		        selectedOption.style.backgroundColor = '#d4edda';
		        break;
		      case 'bundled':
		        selectedOption.style.border = '2px solid #ffc107';
		        selectedOption.style.backgroundColor = '#fff3cd';
		        break;
		    }
		  }
		  
		  // Hide all detail sections
		  document.querySelectorAll('.item-details').forEach(detail => {
		    detail.style.display = 'none';
		    detail.style.opacity = '0';
		    detail.classList.remove('active');
		  });
		  
		  // Show selected detail section with animation
		  const selectedDetail = document.getElementById(`${type}-details`);
		  if (selectedDetail) {
		    selectedDetail.style.display = 'block';
		    selectedDetail.classList.add('active');
		    
		    // Use setTimeout to ensure display:block is applied before opacity change
		    setTimeout(() => {
		      selectedDetail.style.opacity = '1';
		    }, 10);
		  }
		}

		// Function to handle item type selection
		function selectItemType(type) {
		  console.log('Selecting item type:', type);
		  
		  // Close the modal first
		  const modalElement = document.getElementById('itemTypeModal');
		  if (modalElement) {
		    try {
		      const modal = bootstrap.Modal.getInstance(modalElement);
		      if (modal) {
		        modal.hide();
		      } else {
		        console.warn('Modal instance not found, creating new one to hide');
		        const newModal = bootstrap.Modal.getOrCreateInstance(modalElement);
		        newModal.hide();
		      }
		    } catch (error) {
		      console.error('Error closing modal:', error);
		    }
		  }
		  
		  // Small delay to ensure modal closes before redirect
		  setTimeout(() => {
		    // Redirect based on the selected item type
		    switch(type) {
		      case 'standard':
		        console.log('Redirecting to standard item page');
		        window.location.href = 'add_item_standard.php';
		        break;
		      case 'variant':
		        console.log('Redirecting to variant item page');
		        window.location.href = 'add_item_variant.php';
		        break;
		      case 'bundled':
		        console.log('Redirecting to bundled item page');
		        window.location.href = 'add_item_bundled.php';
		        break;
		      default:
		        console.error('Unknown item type:', type);
		        alert('Unknown item type: ' + type);
		    }
		  }, 200);
		}

		// Function to handle Continue button click
		function proceedWithItemType() {
		  // Get the currently selected item type
		  const activeOption = document.querySelector('.item-option.active');
		  if (activeOption) {
		    const selectedType = activeOption.getAttribute('data-type');
		    console.log('Proceeding with item type:', selectedType);
		    selectItemType(selectedType);
		  } else {
		    console.warn('No item type selected');
		    alert('Please select an item type first.');
		  }
		}
		</script>

		<!-- Modal for selecting item type -->
		<div class="modal fade" id="itemTypeModal" tabindex="-1" aria-labelledby="itemTypeModalLabel" aria-hidden="true" style="z-index: 1055;">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content" style="border: none; box-shadow: 0 10px  30px rgba(0, 0, 0, 0.3);">
					<div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-bottom: none;">
						<h5 class="modal-title" id="itemTypeModalLabel" style="font-weight: 600;">
							<i class="bi bi-box-seam me-2"></i>Select Item Type
						</h5>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" style="min-height: 400px; padding: 2rem;">
						<div class="row">
							<!-- Left Column - Item Type Options -->
							<div class="col-md-4">
								<div class="list-group">
									<button type="button" class="list-group-item list-group-item-action d-flex align-items-center p-3 item-option active" 
											data-type="standard" onclick="showItemDetails('standard')" style="border: 2px solid #007bff; background-color: #e3f2fd;">
										<i class="bi bi-box-seam text-primary me-3" style="font-size: 1.5rem;"></i>
										<div>
											<h6 class="mb-0 text-primary">Standard Item</h6>
											<small class="text-muted">Simple single product</small>
										</div>
									</button>
									
									<button type="button" class="list-group-item list-group-item-action d-flex align-items-center p-3 item-option" 
											data-type="variant" onclick="showItemDetails('variant')" style="border: 2px solid transparent;">
										<i class="bi bi-grid-3x3 text-success me-3" style="font-size: 1.5rem;"></i>
										<div>
											<h6 class="mb-0 text-success">Variant Item</h6>
											<small class="text-muted">Multiple variations</small>
										</div>
									</button>
									
									<button type="button" class="list-group-item list-group-item-action d-flex align-items-center p-3 item-option" 
											data-type="bundled" onclick="showItemDetails('bundled')" style="border: 2px solid transparent;">
										<i class="bi bi-collection text-warning me-3" style="font-size: 1.5rem;"></i>
										<div>
											<h6 class="mb-0 text-warning">Bundled Item</h6>
											<small class="text-muted">Package of products</small>
										</div>
									</button>
								</div>
							</div>
							
							<!-- Right Column - Item Details -->
							<div class="col-md-8">
								<div class="item-details-container">
									<!-- Standard Item Details -->
									<div id="standard-details" class="item-details active" style="display: block; opacity: 1;">
										<div class="d-flex align-items-start mb-3">
											<i class="bi bi-box-seam text-primary me-3" style="font-size: 3rem;"></i>
											<div>
												<h4 class="text-primary mb-2">Standard Item</h4>
												<p class="text-dark mb-3">Perfect for single products without variations. Simple to set up and manage.</p>
											</div>
										</div>
										
										<div class="mb-3">
											<h6><strong>Best for:</strong></h6>
											<ul class="text-muted mb-3">
												<li>Products without variations (no size, color, or model options)</li>
												<li>Single SKU items</li>
												<li>Simple inventory tracking</li>
												<li>Quick setup and management</li>
											</ul>
										</div>
										
										<div class="mb-4">
											<h6><strong>Examples:</strong></h6>
											<div class="d-flex flex-wrap gap-2">
												<span class="badge bg-light text-dark">iPhone 13 Pro</span>
												<span class="badge bg-light text-dark">Office Chair</span>
												<span class="badge bg-light text-dark">Coffee Mug</span>
												<span class="badge bg-light text-dark">Notebook</span>
												<span class="badge bg-light text-dark">Power Bank</span>
											</div>
										</div>
										
										<button class="btn btn-primary" onclick="selectItemType('standard')" style="padding: 0.75rem 1.5rem;">
											<i class="bi bi-plus-circle me-1"></i> Create Standard Item
										</button>
									</div>
									
									<!-- Variant Item Details -->
									<div id="variant-details" class="item-details" style="display: none; opacity: 0;">
										<div class="d-flex align-items-start mb-3">
											<i class="bi bi-grid-3x3 text-success me-3" style="font-size: 3rem;"></i>
											<div>
												<h4 class="text-success mb-2">Variant Item</h4>
												<p class="text-dark mb-3">Ideal for products with multiple options like size, color, or style. Comprehensive variation management.</p>
											</div>
										</div>
										
										<div class="mb-3">
											<h6><strong>Best for:</strong></h6>
											<ul class="text-muted mb-3">
												<li>Products with size variations (S, M, L, XL)</li>
												<li>Items with color options</li>
												<li>Different models of the same product</li>
												<li>Complex inventory tracking by variation</li>
											</ul>
										</div>
										
										<div class="mb-4">
											<h6><strong>Examples:</strong></h6>
											<div class="d-flex flex-wrap gap-2">
												<span class="badge bg-light text-dark">T-Shirts (S,M,L)</span>
												<span class="badge bg-light text-dark">Shoes (Various Sizes)</span>
												<span class="badge bg-light text-dark">Phone Cases (Colors)</span>
												<span class="badge bg-light text-dark">Laptops (Models)</span>
											</div>
										</div>
										
										<button class="btn btn-success" onclick="selectItemType('variant')" style="padding: 0.75rem 1.5rem;">
											<i class="bi bi-plus-circle me-1"></i> Create Variant Item
										</button>
									</div>
									
									<!-- Bundled Item Details -->
									<div id="bundled-details" class="item-details" style="display: none; opacity: 0;">
										<div class="d-flex align-items-start mb-3">
											<i class="bi bi-collection text-warning me-3" style="font-size: 3rem;"></i>
											<div>
												<h4 class="text-warning mb-2">Bundled Item</h4>
												<p class="text-dark mb-3">Perfect for selling multiple products together as a package deal. Automatic inventory deduction.</p>
											</div>
										</div>
										
										<div class="mb-3">
											<h6><strong>Best for:</strong></h6>
											<ul class="text-muted mb-3">
												<li>Product packages and combo deals</li>
												<li>Gift sets and starter kits</li>
												<li>Promotional bundles</li>
												<li>Items sold together at discount</li>
											</ul>
										</div>
										
										<div class="mb-4">
											<h6><strong>Examples:</strong></h6>
											<div class="d-flex flex-wrap gap-2">
												<span class="badge bg-light text-dark">Laptop + Mouse + Bag</span>
												<span class="badge bg-light text-dark">Skincare Set</span>
												<span class="badge bg-light text-dark">Office Starter Kit</span>
												<span class="badge bg-light text-dark">Gaming Bundle</span>
											</div>
										</div>
										
										<button class="btn btn-warning text-dark" onclick="selectItemType('bundled')" style="padding: 0.75rem 1.5rem;">
											<i class="bi bi-plus-circle me-1"></i> Create Bundled Item
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer" style="border-top: 1px solid #dee2e6; background-color: #f8f9fa; padding: 1.5rem;">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 0.75rem 1.5rem;">Cancel</button>
						<button type="button" class="btn btn-primary" onclick="proceedWithItemType()" style="padding: 0.75rem 1.5rem;">
							<i class="bi bi-arrow-right me-1"></i>Continue
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- end of item type selection modal -->

		   <!-- partial -->
	</body>
</html>
