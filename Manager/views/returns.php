<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Returns - SalesPilot</title>
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
			border: 2px solid #dc3545;
			border-radius: 12px;
			padding: 16px;
			box-shadow: 0 8px 25px rgba(220, 53, 69, 0.2);
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
			border-bottom: 8px solid #dc3545;
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
			background-color: #ffeaea !important;
			border-left: 4px solid #dc3545;
		}
		
		/* Return Details Side Panel */
		.return-details-panel {
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
		
		.return-details-panel.active {
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
			background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
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
			border-left: 4px solid #dc3545;
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
		
		.reason-text {
			background: white;
			padding: 15px;
			border-radius: 8px;
			border: 1px solid #dee2e6;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
		
		.status-badge {
			display: inline-block;
			padding: 6px 12px;
			border-radius: 20px;
			font-size: 0.85rem;
			font-weight: 500;
			text-transform: capitalize;
		}
		
		.status-badge.requested {
			background: #fff3cd;
			color: #856404;
			border: 1px solid #ffc107;
		}
		
		.status-badge.approved {
			background: #d4edda;
			color: #155724;
			border: 1px solid #28a745;
		}
		
		.status-badge.rejected {
			background: #f8d7da;
			color: #721c24;
			border: 1px solid #dc3545;
		}
		
		.status-badge.completed {
			background: #d1ecf1;
			color: #0c5460;
			border: 1px solid #17a2b8;
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
			.return-details-panel {
				width: 100%;
				right: -100%;
			}
		}
		
		/* Modal styles for better visibility */
		.modal-backdrop {
			background-color: rgba(0, 0, 0, 0.7) !important;
			z-index: 1050 !important;
		}
		
		#returnModal {
			z-index: 1055 !important;
		}
		
		#returnModal .modal-content {
			background-color: #fff !important;
		}
		
		#returnModal .modal-body {
			background-color: #fff !important;
		}
		
		@media (max-width: 767px) {
			#returnModal .modal-dialog {
				max-width: 98vw !important;
				margin: 0.5rem !important;
			}
			
			#returnModal .modal-body {
				padding: 1rem !important;
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
										<h4 class="card-title">Returns</h4>
										<p class="card-description">Manage all product returns and refund requests.</p>
										
										<!-- File a Return Button -->
										<div class="d-flex justify-content-end mb-3">
											<button class="btn btn-primary" id="fileReturnBtn" data-bs-toggle="modal" data-bs-target="#returnModal">
												<i class="bi bi-plus-circle me-2"></i>File a Return
											</button>
										</div>

										<!-- Returns Table -->
										<div class="table-responsive">
											<table class="table table-hover" id="returnsTable">
												<thead>
													<tr>
														<th>Return ID</th>
														<th>Product Name</th>
														<th>Quantity</th>
														<th>Reason</th>
														<th>Date</th>
														<th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody id="returnsTableBody">
													<!-- Returns will be added here dynamically -->
													<tr id="emptyState">
														<td colspan="7" class="text-center py-5">
															<i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
															<p class="text-muted mt-2">No returns filed yet. Click "File a Return" to get started.</p>
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

					<!-- Return Details Side Panel -->
					<div class="panel-overlay" id="panelOverlay"></div>
					<div class="return-details-panel" id="returnDetailsPanel">
						<div class="panel-header d-flex justify-content-between align-items-center">
							<h5 class="panel-title">
								<i class="bi bi-arrow-return-left me-2"></i>Return Details
							</h5>
							<button type="button" class="btn-close-panel" id="closePanelBtn">
								<i class="bi bi-x-lg"></i>
							</button>
						</div>
						
						<div class="panel-body">
							<!-- Basic Information -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-hash me-1"></i>Return ID
								</label>
								<div class="detail-value" id="detailReturnId">RET-001</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-receipt me-1"></i>Original Invoice
								</label>
								<div class="detail-value" id="detailOriginalInvoice">INV-001</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-calendar-event me-1"></i>Request Date
								</label>
								<div class="detail-value" id="detailDate">10/Nov/2025 9:15:00 AM</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-person me-1"></i>Customer
								</label>
								<div class="detail-value" id="detailCustomer">John Doe</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-currency-dollar me-1"></i>Refund Amount
								</label>
								<div class="detail-value" id="detailAmount">$89.99</div>
							</div>
							
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-info-circle me-1"></i>Status
								</label>
								<div class="detail-value">
									<span class="status-badge requested" id="detailStatus">Requested</span>
								</div>
							</div>
							
							<!-- Return Reason -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-chat-text me-1"></i>Return Reason
								</label>
								<div class="detail-value">
									<div class="reason-text" id="detailReason">
										Product arrived damaged and not as described. Customer uploaded photos showing packaging damage and product defects.
									</div>
								</div>
							</div>
							
							<!-- Items Being Returned -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-list-ul me-1"></i>Items Being Returned
								</label>
								<div class="detail-value">
									<div class="item-list" id="detailItems">
										<!-- Items will be populated by JavaScript -->
									</div>
								</div>
							</div>
							
							<!-- Additional Information -->
							<div class="detail-section">
								<label class="detail-label">
									<i class="bi bi-gear me-1"></i>Processing Information
								</label>
								<div class="detail-value">
									<div class="row">
										<div class="col-6">
											<small class="text-muted">Processed By:</small><br>
											<span id="detailProcessedBy">System</span>
										</div>
										<div class="col-6">
											<small class="text-muted">Refund Method:</small><br>
											<span id="detailRefundMethod">Original Payment</span>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-12">
											<small class="text-muted">Processing Notes:</small><br>
											<span id="detailNotes">Awaiting admin approval</span>
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
		
		<!-- Return Modal Form -->
		<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" style="max-width: 550px;">
				<div class="modal-content" style="border: none; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
					<div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-bottom: none;">
						<h5 class="modal-title" id="returnModalLabel" style="font-weight: 600;">
							<i class="bi bi-arrow-return-left me-2"></i>File a Return
						</h5>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" style="padding: 1.5rem; background-color: #fff;">
						<form id="returnForm">
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="productName" class="form-label">Product Name <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="productName" required>
								</div>
								<div class="col-md-6 mb-3">
									<label for="productQuantity" class="form-label">Quantity <span class="text-danger">*</span></label>
									<input type="number" class="form-control" id="productQuantity" min="1" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="saleId" class="form-label">Sale ID/Receipt Number</label>
									<input type="text" class="form-control" id="saleId">
								</div>
								<div class="col-md-6 mb-3">
									<label for="customerName" class="form-label">Customer Name</label>
									<input type="text" class="form-control" id="customerName">
								</div>
							</div>
							<div class="mb-3">
								<label for="returnReason" class="form-label">Reason for Return <span class="text-danger">*</span></label>
								<select class="form-select" id="returnReason" required>
									<option value="">Select a reason...</option>
									<option value="Defective">Defective/Damaged Product</option>
									<option value="Wrong Item">Wrong Item Received</option>
									<option value="Not as Described">Not as Described</option>
									<option value="Changed Mind">Customer Changed Mind</option>
									<option value="Better Price">Found Better Price</option>
									<option value="Other">Other</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="returnNotes" class="form-label">Additional Notes</label>
								<textarea class="form-control" id="returnNotes" rows="3" placeholder="Provide any additional details about the return..."></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer" style="border-top: 1px solid #dee2e6; background-color: #f8f9fa; padding: 1.5rem;">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 0.75rem 1.5rem;">Cancel</button>
						<button type="button" class="btn btn-primary" id="submitReturnBtn" style="padding: 0.75rem 1.5rem;">
							<i class="bi bi-check-circle me-1"></i>Submit Return
						</button>
					</div>
				</div>
			</div>
		</div>
		
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
		
		<!-- Include Sidebar Scripts -->
		<?php include '../layouts/sidebar_scripts.php'; ?>
		
		<script src="../assets/js/settings.js"></script>
		<script src="../assets/js/hoverable-collapse.js"></script>
		<script src="../assets/js/todolist.js"></script>
		
		
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="../assets/js/dashboard.js"></script>
		<!-- End custom js for this page-->
		
		<!-- File a Return functionality -->
		<script>
		let returnCounter = 1;
		const returns = [];

		document.addEventListener('DOMContentLoaded', function() {
			// Submit return form
			const submitReturnBtn = document.getElementById('submitReturnBtn');
			const returnForm = document.getElementById('returnForm');
			const returnModal = document.getElementById('returnModal');
			
			if (submitReturnBtn && returnForm) {
				submitReturnBtn.addEventListener('click', function() {
					// Validate form
					if (!returnForm.checkValidity()) {
						returnForm.reportValidity();
						return;
					}
					
					// Get form values
					const productName = document.getElementById('productName').value;
					const quantity = document.getElementById('productQuantity').value;
					const saleId = document.getElementById('saleId').value || 'N/A';
					const customerName = document.getElementById('customerName').value || 'Walk-in Customer';
					const reason = document.getElementById('returnReason').value;
					const notes = document.getElementById('returnNotes').value;
					
					// Create return object
					const returnData = {
						id: `RET${String(returnCounter).padStart(4, '0')}`,
						productName,
						quantity,
						saleId,
						customerName,
						reason,
						notes,
						date: new Date().toLocaleDateString(),
						status: 'Pending'
					};
					
					returnCounter++;
					returns.push(returnData);
					
					// Add to table
					addReturnToTable(returnData);
					
					// Reset form
					returnForm.reset();
					
					// Close modal
					const modal = bootstrap.Modal.getInstance(returnModal);
					if (modal) {
						modal.hide();
					}
					
					// Show success message
					showToast('Success', 'Return filed successfully!', 'success');
				});
			}
			
			function addReturnToTable(returnData) {
				const tbody = document.getElementById('returnsTableBody');
				const emptyState = document.getElementById('emptyState');
				
				// Remove empty state if it exists
				if (emptyState) {
					emptyState.remove();
				}
				
				const row = document.createElement('tr');
				row.innerHTML = `
					<td><strong>${returnData.id}</strong></td>
					<td>${returnData.productName}</td>
					<td>${returnData.quantity}</td>
					<td><span class="badge bg-info">${returnData.reason}</span></td>
					<td>${returnData.date}</td>
					<td><span class="badge bg-warning">${returnData.status}</span></td>
					<td>
						<button class="btn btn-sm btn-primary me-1" onclick="viewReturn('${returnData.id}')" title="View Details">
							<i class="bi bi-eye"></i>
						</button>
						<button class="btn btn-sm btn-success me-1" onclick="approveReturn('${returnData.id}')" title="Approve">
							<i class="bi bi-check-circle"></i>
						</button>
						<button class="btn btn-sm btn-danger" onclick="deleteReturn('${returnData.id}')" title="Delete">
							<i class="bi bi-trash"></i>
						</button>
					</td>
				`;
				tbody.appendChild(row);
			}
			
			window.viewReturn = function(returnId) {
				const returnData = returns.find(r => r.id === returnId);
				if (returnData) {
					alert(`Return Details:\n\nID: ${returnData.id}\nProduct: ${returnData.productName}\nQuantity: ${returnData.quantity}\nReason: ${returnData.reason}\nNotes: ${returnData.notes || 'None'}\nCustomer: ${returnData.customerName}\nSale ID: ${returnData.saleId}`);
				}
			};
			
			window.approveReturn = function(returnId) {
				if (confirm('Approve this return?')) {
					const returnData = returns.find(r => r.id === returnId);
					if (returnData) {
						returnData.status = 'Approved';
						// Update badge in table
						const rows = document.querySelectorAll('#returnsTableBody tr');
						rows.forEach(row => {
							if (row.querySelector('td')?.textContent.includes(returnId)) {
								const badge = row.querySelector('td:nth-child(6) span');
								if (badge) {
									badge.className = 'badge bg-success';
									badge.textContent = 'Approved';
								}
							}
						});
						showToast('Success', 'Return approved successfully!', 'success');
					}
				}
			};
			
			window.deleteReturn = function(returnId) {
				if (confirm('Are you sure you want to delete this return?')) {
					const index = returns.findIndex(r => r.id === returnId);
					if (index > -1) {
						returns.splice(index, 1);
					}
					// Remove from table
					const rows = document.querySelectorAll('#returnsTableBody tr');
					rows.forEach(row => {
						if (row.querySelector('td')?.textContent.includes(returnId)) {
							row.remove();
						}
					});
					// Show empty state if no returns
					if (returns.length === 0) {
						const tbody = document.getElementById('returnsTableBody');
						tbody.innerHTML = `
							<tr id="emptyState">
								<td colspan="7" class="text-center py-5">
									<i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
									<p class="text-muted mt-2">No returns filed yet. Click "File a Return" to get started.</p>
								</td>
							</tr>
						`;
					}
					showToast('Success', 'Return deleted successfully!', 'success');
				}
			};
			
			function showToast(title, message, type) {
				const bgColor = type === 'success' ? 'bg-success' : type === 'error' ? 'bg-danger' : 'bg-info';
				const toast = document.createElement('div');
				toast.className = `toast align-items-center text-white ${bgColor} border-0`;
				toast.setAttribute('role', 'alert');
				toast.setAttribute('aria-live', 'assertive');
				toast.setAttribute('aria-atomic', 'true');
				toast.style.position = 'fixed';
				toast.style.top = '20px';
				toast.style.right = '20px';
				toast.style.zIndex = '9999';
				toast.innerHTML = `
					<div class="d-flex">
						<div class="toast-body">
							<strong>${title}</strong><br>${message}
						</div>
						<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
					</div>
				`;
				document.body.appendChild(toast);
				const bsToast = new bootstrap.Toast(toast);
				bsToast.show();
				setTimeout(() => toast.remove(), 5000);
						this.disabled = false;
						
						// Show success message or redirect to return form
						alert('Return form will be opened here.\n\nIn a real implementation, this would:\n- Open a return request form\n- Allow customer to select products to return\n- Collect return reason and details\n- Submit the return request');
						
						// You can replace the alert with actual form modal or redirect
						// window.location.href = 'return_form.php';
						
					}, 1500);
				});
			}
		});
		</script>
	</body>
</html>
