<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>All Items - SalesPilot</title>
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
		</style>
		<!-- endinject -->
		<link rel="shortcut icon" href="../assets/images/favicon.png" />
	</head>
	<body class="with-welcome-text">
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
											</div>
											<div class="btn-wrapper">
												<button type="button" class="btn btn-primary text-white me-0" id="addItemQuickAction">
													<i class="bi bi-plus"></i> Add Item
												</button>
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
																	<button class="btn btn-outline-success">
																		<i class="bi bi-download"></i> Export
																	</button>
																</div>
															</div>
															<br>

															<!-- Items Table -->
															<div class="table-responsive">
																<table class="table table-striped" id="itemsTable">
																	<thead>
																		<tr>
																			<th>S/N</th>
																			<th>Select</th>
																			<th>Item</th>
																			<th>Category</th>
																			<th>Unit</th>
																			<th>Stock</th>
																			<th>Selling Price</th>
																			<th>Cost Price</th>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
																			<td>
																				<button class="btn btn-sm btn-primary me-1">Edit</button>
																				<button class="btn btn-sm btn-danger">Delete</button>
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
					<footer class="footer">
						<div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
							<span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Made with <i class="mdi mdi-heart text-danger"></i></span>
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
		  // Auto-expand the Inventory menu when page loads
		  const inventoryMenu = document.getElementById('icons');
		  if (inventoryMenu) {
		    const bsCollapse = bootstrap.Collapse.getOrCreateInstance(inventoryMenu);
		    bsCollapse.show();
		  }
		  
		  // Only one submenu open at a time, but allow other parent menus to close this one
		  document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
		    link.addEventListener('click', function(e) {
		      e.preventDefault();
		      var targetSelector = this.getAttribute('href');
		      var target = document.querySelector(targetSelector);
		      if (!target) return;
		      
		      // Collapse all other open submenus (including Inventory menu when other parent clicked)
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

		  // Items Table Functionality
		  
		  // Select All functionality
		  const selectAllCheckbox = document.getElementById('selectAllItems');
		  const itemCheckboxes = document.querySelectorAll('.item-checkbox');
		  
		  if (selectAllCheckbox) {
		    selectAllCheckbox.addEventListener('change', function() {
		      itemCheckboxes.forEach(checkbox => {
		        checkbox.checked = this.checked;
		      });
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
		    });
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
				<div class="modal-content" style="border: none; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
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
