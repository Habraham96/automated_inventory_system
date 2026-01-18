<?php
// BRM Commissions Page - scaffold with sample data
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>BRM Commissions - SalesPilot</title>
		<?php include '../include/responsive.php'; ?>
		<link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
		<link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
		<link rel="stylesheet" href="../Manager/assets/css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
		<?php include 'layouts/sidebar_styles.php'; ?>
		<style>
			.main-panel { margin-left: 280px !important; }
			.page-header { background: linear-gradient(135deg,#20c997 0%,#167a5c 100%); color:#fff; padding:1.25rem; border-radius:8px; margin-bottom:1rem; }
			.stat { background:#fff; padding:1rem; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.06); }
			.comm-row td { vertical-align: middle; }
			.comm-breakdown-row td { background:#f8f9fa; padding:0.5rem 1rem; }
			.view-arrow { transition: transform .15s ease; }
			.export-btn { float:right; }
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
									<h3 class="mb-0"><i class="bi bi-currency-exchange me-2"></i>BRM Commissions</h3>
									<small class="text-white-50">Overview of commissions due to BRMs and payout breakdowns</small>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="card mb-3">
									<div class="card-body d-flex justify-content-between align-items-center">
										<div>
											<div class="text-muted">Total Outstanding</div>
											<div class="h4">₦283,000</div>
										</div>
										<div>
											<button id="exportCommissions" class="btn btn-sm btn-outline-success export-btn"><i class="bi bi-download me-1"></i>Export CSV</button>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="card-body">
										<h5 class="card-title">BRM Commission Summary</h5>
										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>#</th>
														<th>BRM</th>
														<th>Company</th>
														<th>Total Comm. (₦)</th>
														<th>Paid (₦)</th>
														<th>Due (₦)</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody id="commTableBody">
													<tr class="comm-row">
														<td>1</td>
														<td>Alice Martinez</td>
														<td>Tech Innovations Ltd</td>
														<td>120,000</td>
														<td>60,000</td>
														<td>60,000</td>
														<td><button class="btn btn-sm btn-outline-primary view-commissions-btn" data-brm-id="1"><i class="bi bi-caret-right-fill me-1 view-arrow"></i>View</button></td>
													</tr>
													<tr class="comm-row">
														<td>2</td>
														<td>Benjamin Clark</td>
														<td>Global Solutions Inc</td>
														<td>75,000</td>
														<td>50,000</td>
														<td>25,000</td>
														<td><button class="btn btn-sm btn-outline-primary view-commissions-btn" data-brm-id="2"><i class="bi bi-caret-right-fill me-1 view-arrow"></i>View</button></td>
													</tr>
													<tr class="comm-row">
														<td>3</td>
														<td>Chidi Okonkwo</td>
														<td>Lagoon Tech</td>
														<td>90,000</td>
														<td>30,000</td>
														<td>60,000</td>
														<td><button class="btn btn-sm btn-outline-primary view-commissions-btn" data-brm-id="3"><i class="bi bi-caret-right-fill me-1 view-arrow"></i>View</button></td>
													</tr>
													<tr class="comm-row">
														<td>4</td>
														<td>Denise Amar</td>
														<td>BrightWave</td>
														<td>40,000</td>
														<td>40,000</td>
														<td>0</td>
														<td><button class="btn btn-sm btn-outline-primary view-commissions-btn" data-brm-id="4"><i class="bi bi-caret-right-fill me-1 view-arrow"></i>View</button></td>
													</tr>
													<tr class="comm-row">
														<td>5</td>
														<td>Emeka Nwosu</td>
														<td>Continental Supplies</td>
														<td>150,000</td>
														<td>100,000</td>
														<td>50,000</td>
														<td><button class="btn btn-sm btn-outline-primary view-commissions-btn" data-brm-id="5"><i class="bi bi-caret-right-fill me-1 view-arrow"></i>View</button></td>
													</tr>
													<tr class="comm-row">
														<td>6</td>
														<td>Fatima Yusuf</td>
														<td>NorthStar Ventures</td>
														<td>18,000</td>
														<td>18,000</td>
														<td>0</td>
														<td><button class="btn btn-sm btn-outline-primary view-commissions-btn" data-brm-id="6"><i class="bi bi-caret-right-fill me-1 view-arrow"></i>View</button></td>
													</tr>
												</tbody>
											</table>
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
			</div>
		</div>

		<script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../Manager/assets/js/template.js"></script>
		<?php include 'layouts/sidebar_scripts.php'; ?>
		<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Sample commission breakdowns per BRM
			const brmCommissions = {
				1: {
					total: 120000, paid: 60000, due: 60000,
					breakdown: [
						{ date: '2025-10-01', customer: 'Customer A', amount: 30000, status: 'Paid' },
						{ date: '2025-11-05', customer: 'Customer B', amount: 30000, status: 'Paid' },
						{ date: '2025-12-12', customer: 'Customer C', amount: 60000, status: 'Due' }
					]
				},
				2: {
					total: 75000, paid: 50000, due: 25000,
					breakdown: [
						{ date: '2025-09-12', customer: 'Customer X', amount: 25000, status: 'Paid' },
						{ date: '2025-11-20', customer: 'Customer Y', amount: 25000, status: 'Paid' },
						{ date: '2025-12-18', customer: 'Customer Z', amount: 25000, status: 'Due' }
					]
				},
				3: { total: 90000, paid: 30000, due: 60000, breakdown: [ { date:'2025-10-11', customer:'Paul Okoro', amount:30000, status:'Paid' }, { date:'2025-12-01', customer:'Ngozi Obi', amount:60000, status:'Due' } ] },
				4: { total: 40000, paid: 40000, due:0, breakdown: [ { date:'2025-08-08', customer:'Ayodele Smith', amount:40000, status:'Paid' } ] },
				5: { total:150000, paid:100000, due:50000, breakdown: [ { date:'2025-09-30', customer:'Grace Ihunwo', amount:50000, status:'Paid' }, { date:'2025-10-20', customer:'Chimamanda K', amount:50000, status:'Paid' }, { date:'2025-12-10', customer:'Ibrahim S', amount:25000, status:'Due' }, { date:'2025-12-15', customer:'Samuel T', amount:25000, status:'Due' } ] },
				6: { total:18000, paid:18000, due:0, breakdown: [ { date:'2025-11-01', customer:'Hajara Bello', amount:18000, status:'Paid' } ] }
			};

			function buildBreakdownHtml(breakdown) {
				if (!breakdown || breakdown.length === 0) return '<p class="text-muted mb-0">No commission records.</p>';
				let html = '<div class="table-responsive"><table class="table table-sm mb-0"><thead><tr><th>#</th><th>Date</th><th>Customer</th><th>Amount (₦)</th><th>Status</th></tr></thead><tbody>';
				breakdown.forEach(function(b,i){ html += `<tr><td>${i+1}</td><td>${b.date}</td><td>${b.customer}</td><td>${b.amount.toLocaleString()}</td><td>${b.status}</td></tr>`; });
				html += '</tbody></table></div>';
				return html;
			}

			// Inline expand/collapse for commission breakdown
			document.querySelectorAll('.view-commissions-btn').forEach(function(btn){
				btn.addEventListener('click', function(){
					const brmId = this.dataset.brmId;
					const tr = this.closest('tr');
					const next = tr.nextElementSibling;

					if (next && next.classList && next.classList.contains('comm-breakdown-row') && next.dataset.brmId === brmId) {
						next.remove();
						const arrow = this.querySelector('.view-arrow');
						if (arrow) { arrow.classList.remove('bi-caret-down-fill'); arrow.classList.add('bi-caret-right-fill'); }
						return;
					}

					// Close any open breakdown rows
					document.querySelectorAll('.comm-breakdown-row').forEach(function(r){ r.remove(); });
					document.querySelectorAll('.view-arrow').forEach(function(a){ a.classList.remove('bi-caret-down-fill'); a.classList.add('bi-caret-right-fill'); });

					const cols = tr.children.length;
					const row = document.createElement('tr');
					row.className = 'comm-breakdown-row';
					row.dataset.brmId = brmId;
					const td = document.createElement('td');
					td.colSpan = cols;
					td.innerHTML = buildBreakdownHtml((brmCommissions[brmId] && brmCommissions[brmId].breakdown) || []);
					row.appendChild(td);
					tr.parentNode.insertBefore(row, tr.nextSibling);

					const arrow = this.querySelector('.view-arrow');
					if (arrow) { arrow.classList.remove('bi-caret-right-fill'); arrow.classList.add('bi-caret-down-fill'); }
				});
			});

			// Export CSV of commissions
			document.getElementById('exportCommissions').addEventListener('click', function(){
				const rows = [['BRM','Company','Total','Paid','Due']];
				// read table rows
				document.querySelectorAll('#commTableBody .comm-row').forEach(function(r){
					const cells = r.querySelectorAll('td');
					const brm = cells[1].innerText.trim();
					const company = cells[2].innerText.trim();
					const total = cells[3].innerText.trim();
					const paid = cells[4].innerText.trim();
					const due = cells[5].innerText.trim();
					rows.push([brm, company, total, paid, due]);
				});
				let csv = rows.map(r => r.map(c => '"'+String(c).replace(/"/g,'""')+'"').join(',')).join('\n');
				const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
				const url = URL.createObjectURL(blob);
				const a = document.createElement('a');
				a.href = url; a.download = 'brm_commissions.csv'; document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
			});

		});
		</script>
	</body>
</html>

