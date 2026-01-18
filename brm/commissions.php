<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Commissions - SalesPilot</title>
    <?php include '../include/responsive.php'; ?>
    
    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Include Sidebar Styles -->
    <?php include 'layouts/sidebar_styles.php'; ?>
    
    <style>
      /* Page Header */
      .page-header {
        background: linear-gradient(135deg, #20c997 0%, #167a5c 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      }
      
      .page-header h1 {
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: white;
      }
      
      .page-header p {
        margin-bottom: 0;
        opacity: 0.9;
      }
      
      /* Commission Stats Cards */
      .commission-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }
      
      .stat-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
      }
      
      .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
      }
      
      .stat-card.total { border-left-color: #667eea; }
      .stat-card.paid { border-left-color: #198754; }
      .stat-card.pending { border-left-color: #ffc107; }
      .stat-card.thismonth { border-left-color: #17a2b8; }
      
      .stat-card .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
      }
      
      .stat-card.total .stat-icon {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
      }
      
      .stat-card.paid .stat-icon {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .stat-card.pending .stat-icon {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .stat-card.thismonth .stat-icon {
        background: rgba(23, 162, 184, 0.1);
        color: #17a2b8;
      }
      
      .stat-card h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: #2c3e50;
      }
      
      .stat-card p {
        color: #6c757d;
        margin-bottom: 0;
        font-size: 0.9rem;
      }
      
      /* Commission Table */
      .commission-table-section {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      }
      
      .commission-table-section h4 {
        margin-bottom: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
      }
      
      .filter-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
      }
      
      .filter-group {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
      }
      
      .filter-group select {
        padding: 0.5rem 1rem;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        font-size: 0.9rem;
      }
      
      .export-btn {
        background: linear-gradient(135deg, #20c997 0%, #167a5c 100%);
        color: white;
        border: none;
        padding: 0.5rem 1.25rem;
        border-radius: 6px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .export-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(32, 201, 151, 0.3);
      }
      
      .commission-table {
        width: 100%;
        border-collapse: collapse;
      }
      
      .commission-table thead {
        background: #f8f9fa;
      }
      
      .commission-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #dee2e6;
        font-size: 0.9rem;
      }
      
      .commission-table td {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        color: #495057;
        vertical-align: middle;
      }
      
      .commission-table tbody tr:hover {
        background: #f8f9fa;
      }
      
      .status-badge {
        display: inline-block;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
      }
      
      .status-badge.paid {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
      }
      
      .status-badge.pending {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
      }
      
      .status-badge.processing {
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
      }
      
      .view-details-btn {
        background: transparent;
        border: 1px solid #667eea;
        color: #667eea;
        padding: 0.4rem 1rem;
        border-radius: 6px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .view-details-btn:hover {
        background: #667eea;
        color: white;
      }
      
      .view-arrow {
        transition: transform 0.2s ease;
        margin-right: 0.25rem;
      }
      
      .view-arrow.expanded {
        transform: rotate(90deg);
      }
      
      /* Commission Breakdown Row */
      .comm-breakdown-row {
        background: #f8f9fa !important;
      }
      
      .comm-breakdown-row td {
        padding: 1.5rem !important;
      }
      
      .breakdown-details {
        background: white;
        border-radius: 8px;
        padding: 1rem;
      }
      
      .breakdown-details h6 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 1rem;
      }
      
      .breakdown-table {
        width: 100%;
        font-size: 0.85rem;
      }
      
      .breakdown-table th {
        padding: 0.5rem;
        text-align: left;
        color: #6c757d;
        font-weight: 600;
        border-bottom: 1px solid #dee2e6;
      }
      
      .breakdown-table td {
        padding: 0.5rem;
        border-bottom: 1px solid #e9ecef;
      }
      
      /* Empty State */
      .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
      }
      
      .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
      }
      
      /* OTP Animation */
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
    </style>
  </head>
  
  <body class="with-welcome-text">
    <div class="container-scroller">
      
      <!-- Include Preloader -->
      <?php include 'layouts/preloader.php'; ?>
      
      <!-- Include Sidebar Content -->
      <?php include 'layouts/sidebar_content.php'; ?>
      
      <!-- Main Panel -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <!-- Page Header -->
          <div class="page-header">
            <h1><i class="bi bi-cash-stack"></i> My Commissions</h1>
            <p>Track your commission earnings and payment history</p>
          </div>
          
          <!-- Commission Stats -->
          <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap;">
            <div class="stat-card total" style="flex: 0 0 auto; min-width: 280px; padding: 1.25rem;">
              <div style="display: flex; align-items: center; gap: 1rem;">
                <div class="stat-icon" style="margin-bottom: 0;">
                  <i class="bi bi-wallet2"></i>
                </div>
                <div>
                  <h3 style="margin-bottom: 0.25rem;">₦110,000</h3>
                  <p style="margin-bottom: 0;">Wallet Balance</p>
                </div>
              </div>
            </div>
            <div style="display: flex; gap: 0.75rem;">
              <button onclick="openAddAccountModal()" style="background: linear-gradient(135deg, #20c997 0%, #167a5c 100%); color: white; border: none; padding: 0.75rem 1.25rem; border-radius: 6px; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease; white-space: nowrap;">
                <i class="bi bi-bank"></i> Add Account
              </button>
              <button onclick="openWithdrawModal()" style="background: white; color: #dc3545; border: 1px solid #dc3545; padding: 0.75rem 1.25rem; border-radius: 6px; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease; white-space: nowrap;">
                <i class="bi bi-cash"></i> Withdraw
              </button>
            </div>
          </div>
          
          <!-- Wallet Action Modals (Hidden by default) -->
          <div id="addAccountModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
            <div style="background: white; border-radius: 12px; padding: 2rem; max-width: 450px; width: 90%; box-shadow: 0 8px 32px rgba(0,0,0,0.2);">
              <h5 style="margin-bottom: 1.5rem; color: #2c3e50;">
                <i class="bi bi-bank" style="color: #20c997;"></i> Add Bank Account
              </h5>
              <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #6c757d; font-size: 0.9rem;">Account Number</label>
                <input type="text" id="accountNumber" placeholder="Enter 10-digit account number" maxlength="10" onkeyup="validateAccountNumber()" style="width: 100%; padding: 0.75rem; border: 1px solid #dee2e6; border-radius: 6px; font-size: 1rem;">
                <small id="accountNumberStatus" style="display: block; margin-top: 0.25rem; color: #6c757d;"></small>
              </div>
              <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #6c757d; font-size: 0.9rem;">Bank Name</label>
                <select id="bankName" onchange="fetchAccountName()" style="width: 100%; padding: 0.75rem; border: 1px solid #dee2e6; border-radius: 6px; font-size: 0.9rem;">
                  <option value="">Select Bank</option>
                  <option value="044">Access Bank</option>
                  <option value="063">Access Bank (Diamond)</option>
                  <option value="050">Ecobank Nigeria</option>
                  <option value="070">Fidelity Bank</option>
                  <option value="011">First Bank of Nigeria</option>
                  <option value="214">First City Monument Bank</option>
                  <option value="058">Guaranty Trust Bank</option>
                  <option value="030">Heritage Bank</option>
                  <option value="301">Jaiz Bank</option>
                  <option value="082">Keystone Bank</option>
                  <option value="526">Parallex Bank</option>
                  <option value="076">Polaris Bank</option>
                  <option value="101">Providus Bank</option>
                  <option value="221">Stanbic IBTC Bank</option>
                  <option value="068">Standard Chartered Bank</option>
                  <option value="232">Sterling Bank</option>
                  <option value="100">Suntrust Bank</option>
                  <option value="032">Union Bank of Nigeria</option>
                  <option value="033">United Bank for Africa</option>
                  <option value="215">Unity Bank</option>
                  <option value="035">Wema Bank</option>
                  <option value="057">Zenith Bank</option>
                  <option value="304">Lotus Bank</option>
                  <option value="50211">Kuda Bank</option>
                  <option value="090267">Rubies Bank</option>
                  <option value="090405">Moniepoint MFB</option>
                  <option value="090110">VFD Microfinance Bank</option>
                </select>
              </div>
              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #6c757d; font-size: 0.9rem;">Account Name</label>
                <input type="text" id="accountName" placeholder="Account name will appear here..." readonly style="width: 100%; padding: 0.75rem; border: 1px solid #dee2e6; border-radius: 6px; font-size: 1rem; background: #f8f9fa; color: #495057;">
                <div id="fetchingStatus" style="display: none; margin-top: 0.5rem; color: #667eea; font-size: 0.85rem;">
                  <i class="bi bi-arrow-repeat" style="animation: spin 1s linear infinite;"></i> Fetching account name...
                </div>
              </div>
              <div style="display: flex; gap: 0.75rem;">
                <button onclick="closeAddAccountModal()" style="flex: 1; background: #f8f9fa; color: #6c757d; border: none; padding: 0.75rem; border-radius: 6px; cursor: pointer;">Cancel</button>
                <button onclick="processAddAccount()" id="addAccountBtn" disabled style="flex: 1; background: #ccc; color: white; border: none; padding: 0.75rem; border-radius: 6px; cursor: not-allowed;">Add Account</button>
              </div>
            </div>
          </div>
          
          <style>
            @keyframes spin {
              from { transform: rotate(0deg); }
              to { transform: rotate(360deg); }
            }
          </style>
          
          <div id="withdrawModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
            <div style="background: white; border-radius: 12px; padding: 2rem; max-width: 450px; width: 90%; box-shadow: 0 8px 32px rgba(0,0,0,0.2);">
              <h5 style="margin-bottom: 1.5rem; color: #2c3e50;">
                <i class="bi bi-cash" style="color: #dc3545;"></i> Withdraw Funds
              </h5>
              <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #6c757d; font-size: 0.9rem;">Amount (₦)</label>
                <input type="number" id="withdrawAmount" placeholder="Enter amount" style="width: 100%; padding: 0.75rem; border: 1px solid #dee2e6; border-radius: 6px; font-size: 1rem;">
                <small style="color: #6c757d; display: block; margin-top: 0.25rem;">Available: ₦110,000</small>
              </div>
              <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #6c757d; font-size: 0.9rem;">Bank Account</label>
                <select id="withdrawBankAccount" style="width: 100%; padding: 0.75rem; border: 1px solid #dee2e6; border-radius: 6px; font-size: 0.9rem;">
                  <option>GTBank - 0123456789</option>
                  <option>Access Bank - 9876543210</option>
                  <option>Add New Account</option>
                </select>
              </div>
              <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #6c757d; font-size: 0.9rem;">Reason (Optional)</label>
                <textarea id="withdrawReason" placeholder="Enter withdrawal reason" style="width: 100%; padding: 0.75rem; border: 1px solid #dee2e6; border-radius: 6px; font-size: 0.9rem; resize: vertical; min-height: 60px;"></textarea>
              </div>
              
              <!-- OTP Section (Initially Hidden) -->
              <div id="otpSection" style="display: none; margin-bottom: 1rem; padding: 1rem; background: #f8f9fa; border-radius: 8px; border-left: 4px solid #667eea;">
                <label style="display: block; margin-bottom: 0.5rem; color: #2c3e50; font-size: 0.9rem; font-weight: 600;">
                  <i class="bi bi-shield-lock"></i> Enter OTP
                </label>
                <p style="margin-bottom: 0.75rem; font-size: 0.85rem; color: #6c757d;">
                  We've sent a 6-digit code to your email: <strong id="userEmail">user@example.com</strong>
                </p>
                <input type="text" id="otpInput" placeholder="Enter 6-digit OTP" maxlength="6" style="width: 100%; padding: 0.75rem; border: 1px solid #dee2e6; border-radius: 6px; font-size: 1.1rem; text-align: center; letter-spacing: 0.5rem; font-weight: 600;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.75rem;">
                  <small style="color: #6c757d; font-size: 0.8rem;">
                    Code expires in <span id="otpTimer" style="color: #dc3545; font-weight: 600;">05:00</span>
                  </small>
                  <button onclick="resendOTP()" id="resendOtpBtn" disabled style="background: transparent; border: none; color: #667eea; font-size: 0.85rem; cursor: pointer; text-decoration: underline;">
                    Resend OTP
                  </button>
                </div>
              </div>
              
              <div id="sendingOtpStatus" style="display: none; margin-bottom: 1rem; color: #667eea; font-size: 0.9rem; text-align: center;">
                <i class="bi bi-arrow-repeat" style="animation: spin 1s linear infinite;"></i> Sending OTP to your email...
              </div>
              
              <div style="display: flex; gap: 0.75rem;">
                <button onclick="closeWithdrawModal()" style="flex: 1; background: #f8f9fa; color: #6c757d; border: none; padding: 0.75rem; border-radius: 6px; cursor: pointer;">Cancel</button>
                <button onclick="initiateWithdrawal()" id="withdrawActionBtn" style="flex: 1; background: #dc3545; color: white; border: none; padding: 0.75rem; border-radius: 6px; cursor: pointer;">Send OTP</button>
              </div>
            </div>
          </div>
          
          <!-- Commission Table -->
          <div class="commission-table-section">
            <h4><i class="bi bi-table"></i> Commission History</h4>
            
            <!-- Filter Bar -->
            <div class="filter-bar">
              <div class="filter-group">
                <select id="statusFilter">
                  <option value="all">All Status</option>
                  <option value="paid">Paid</option>
                  <option value="pending">Pending</option>
                  <option value="processing">Processing</option>
                </select>
                
                <select id="monthFilter">
                  <option value="all">All Months</option>
                  <option value="2026-01">January 2026</option>
                  <option value="2025-12">December 2025</option>
                  <option value="2025-11">November 2025</option>
                  <option value="2025-10">October 2025</option>
                </select>
              </div>
              
              <button id="exportCommissions" class="export-btn">
                <i class="bi bi-download"></i> Export CSV
              </button>
            </div>
            
            <!-- Commission Table -->
            <div class="table-responsive">
              <table class="commission-table" id="commissionTable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Plan</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="commissionTableBody">
                  <tr class="comm-row" data-status="pending" data-month="2026-01">
                    <td>1</td>
                    <td>Jan 10, 2026</td>
                    <td>Tech Solutions Ltd</td>
                    <td>Enterprise Plan</td>
                    <td><strong>₦45,000</strong></td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>-</td>
                    <td>
                      <button class="view-details-btn" data-comm-id="1">
                        <i class="bi bi-caret-right-fill view-arrow"></i>Details
                      </button>
                    </td>
                  </tr>
                  
                  <tr class="comm-row" data-status="pending" data-month="2026-01">
                    <td>2</td>
                    <td>Jan 8, 2026</td>
                    <td>Retail Express</td>
                    <td>Professional Plan</td>
                    <td><strong>₦40,000</strong></td>
                    <td><span class="status-badge pending">Pending</span></td>
                    <td>-</td>
                    <td>
                      <button class="view-details-btn" data-comm-id="2">
                        <i class="bi bi-caret-right-fill view-arrow"></i>Details
                      </button>
                    </td>
                  </tr>
                  
                  <tr class="comm-row" data-status="paid" data-month="2025-12">
                    <td>3</td>
                    <td>Dec 28, 2025</td>
                    <td>Fashion Hub Nigeria</td>
                    <td>Business Plan</td>
                    <td><strong>₦35,000</strong></td>
                    <td><span class="status-badge paid">Paid</span></td>
                    <td>Jan 5, 2026</td>
                    <td>
                      <button class="view-details-btn" data-comm-id="3">
                        <i class="bi bi-caret-right-fill view-arrow"></i>Details
                      </button>
                    </td>
                  </tr>
                  
                  <tr class="comm-row" data-status="paid" data-month="2025-12">
                    <td>4</td>
                    <td>Dec 20, 2025</td>
                    <td>Auto Parts Co</td>
                    <td>Professional Plan</td>
                    <td><strong>₦40,000</strong></td>
                    <td><span class="status-badge paid">Paid</span></td>
                    <td>Jan 3, 2026</td>
                    <td>
                      <button class="view-details-btn" data-comm-id="4">
                        <i class="bi bi-caret-right-fill view-arrow"></i>Details
                      </button>
                    </td>
                  </tr>
                  
                  <tr class="comm-row" data-status="processing" data-month="2025-12">
                    <td>5</td>
                    <td>Dec 15, 2025</td>
                    <td>Lagos Tech Hub</td>
                    <td>Enterprise Plan</td>
                    <td><strong>₦65,000</strong></td>
                    <td><span class="status-badge processing">Processing</span></td>
                    <td>-</td>
                    <td>
                      <button class="view-details-btn" data-comm-id="5">
                        <i class="bi bi-caret-right-fill view-arrow"></i>Details
                      </button>
                    </td>
                  </tr>
                  
                  <tr class="comm-row" data-status="paid" data-month="2025-11">
                    <td>6</td>
                    <td>Nov 25, 2025</td>
                    <td>Global Supplies Inc</td>
                    <td>Business Plan</td>
                    <td><strong>₦35,000</strong></td>
                    <td><span class="status-badge paid">Paid</span></td>
                    <td>Dec 5, 2025</td>
                    <td>
                      <button class="view-details-btn" data-comm-id="6">
                        <i class="bi bi-caret-right-fill view-arrow"></i>Details
                      </button>
                    </td>
                  </tr>
                  
                  <tr class="comm-row" data-status="paid" data-month="2025-11">
                    <td>7</td>
                    <td>Nov 18, 2025</td>
                    <td>Mega Mart Nigeria</td>
                    <td>Professional Plan</td>
                    <td><strong>₦40,000</strong></td>
                    <td><span class="status-badge paid">Paid</span></td>
                    <td>Dec 1, 2025</td>
                    <td>
                      <button class="view-details-btn" data-comm-id="7">
                        <i class="bi bi-caret-right-fill view-arrow"></i>Details
                      </button>
                    </td>
                  </tr>
                  
                  <tr class="comm-row" data-status="paid" data-month="2025-10">
                    <td>8</td>
                    <td>Oct 30, 2025</td>
                    <td>Coastal Ventures</td>
                    <td>Enterprise Plan</td>
                    <td><strong>₦50,000</strong></td>
                    <td><span class="status-badge paid">Paid</span></td>
                    <td>Nov 10, 2025</td>
                    <td>
                      <button class="view-details-btn" data-comm-id="8">
                        <i class="bi bi-caret-right-fill view-arrow"></i>Details
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        
        <!-- Footer -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
              © 2026 SalesPilot. All rights reserved.
            </span>
          </div>
        </footer>
      </div>
    </div>
    
    <!-- JavaScript Dependencies -->
    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    
    <!-- Include Sidebar Scripts -->
    <?php include 'layouts/sidebar_script.php'; ?>
    
    <script>
      // Wallet Management Functions
      function validateAccountNumber() {
        const accountNumber = document.getElementById('accountNumber').value;
        const status = document.getElementById('accountNumberStatus');
        const addBtn = document.getElementById('addAccountBtn');
        
        if (accountNumber.length === 10 && /^\d+$/.test(accountNumber)) {
          status.textContent = '✓ Valid account number';
          status.style.color = '#198754';
        } else if (accountNumber.length > 0) {
          status.textContent = 'Account number must be 10 digits';
          status.style.color = '#dc3545';
          addBtn.disabled = true;
          addBtn.style.background = '#ccc';
          addBtn.style.cursor = 'not-allowed';
        } else {
          status.textContent = '';
        }
      }
      
      function fetchAccountName() {
        const accountNumber = document.getElementById('accountNumber').value;
        const bankCode = document.getElementById('bankName').value;
        const accountNameInput = document.getElementById('accountName');
        const fetchingStatus = document.getElementById('fetchingStatus');
        const addBtn = document.getElementById('addAccountBtn');
        
        if (!accountNumber || accountNumber.length !== 10 || !bankCode) {
          if (!accountNumber || accountNumber.length !== 10) {
            alert('Please enter a valid 10-digit account number first');
          }
          return;
        }
        
        // Show fetching status
        fetchingStatus.style.display = 'block';
        accountNameInput.value = '';
        addBtn.disabled = true;
        addBtn.style.background = '#ccc';
        addBtn.style.cursor = 'not-allowed';
        
        // Simulate API call (replace with actual API call)
        setTimeout(function() {
          // This is a simulation - replace with actual Paystack/Flutterwave API call
          const mockAccountName = 'JOHN DOE ENTERPRISES';
          
          accountNameInput.value = mockAccountName;
          fetchingStatus.style.display = 'none';
          
          // Enable add button
          addBtn.disabled = false;
          addBtn.style.background = 'linear-gradient(135deg, #20c997 0%, #167a5c 100%)';
          addBtn.style.cursor = 'pointer';
          
          /* 
          // Actual implementation with Paystack API:
          fetch('https://api.paystack.co/bank/resolve?account_number=' + accountNumber + '&bank_code=' + bankCode, {
            method: 'GET',
            headers: {
              'Authorization': 'Bearer YOUR_PAYSTACK_SECRET_KEY'
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.status && data.data) {
              accountNameInput.value = data.data.account_name;
              addBtn.disabled = false;
              addBtn.style.background = 'linear-gradient(135deg, #20c997 0%, #167a5c 100%)';
              addBtn.style.cursor = 'pointer';
            } else {
              accountNameInput.value = '';
              alert('Could not verify account details. Please check the account number and bank.');
            }
            fetchingStatus.style.display = 'none';
          })
          .catch(error => {
            console.error('Error:', error);
            accountNameInput.value = '';
            alert('Error verifying account. Please try again.');
            fetchingStatus.style.display = 'none';
          });
          */
        }, 1500);
      }
      
      function openAddAccountModal() {
        document.getElementById('addAccountModal').style.display = 'flex';
      }
      
      function closeAddAccountModal() {
        document.getElementById('addAccountModal').style.display = 'none';
        document.getElementById('bankName').value = '';
        document.getElementById('accountNumber').value = '';
        document.getElementById('accountName').value = '';
        document.getElementById('accountNumberStatus').textContent = '';
        document.getElementById('fetchingStatus').style.display = 'none';
        const addBtn = document.getElementById('addAccountBtn');
        addBtn.disabled = true;
        addBtn.style.background = '#ccc';
        addBtn.style.cursor = 'not-allowed';
      }
      
      function processAddAccount() {
        const bankName = document.getElementById('bankName').selectedOptions[0].text;
        const bankCode = document.getElementById('bankName').value;
        const accountNumber = document.getElementById('accountNumber').value;
        const accountName = document.getElementById('accountName').value;
        
        if (!bankCode) {
          alert('Please select a bank');
          return;
        }
        if (!accountNumber || accountNumber.length !== 10 || !/^\d+$/.test(accountNumber)) {
          alert('Please enter a valid 10-digit account number');
          return;
        }
        if (!accountName || accountName.trim() === '') {
          alert('Please fetch the account name by selecting a bank');
          return;
        }
        
        // Process add account logic here
        alert('Bank account added successfully!\n\nBank: ' + bankName + '\nAccount: ' + accountNumber + '\nName: ' + accountName);
        closeAddAccountModal();
      }
      
      let otpSent = false;
      let otpTimerInterval = null;
      
      function openWithdrawModal() {
        document.getElementById('withdrawModal').style.display = 'flex';
        // Reset OTP section
        otpSent = false;
        document.getElementById('otpSection').style.display = 'none';
        document.getElementById('withdrawActionBtn').textContent = 'Send OTP';
        document.getElementById('otpInput').value = '';
        if (otpTimerInterval) {
          clearInterval(otpTimerInterval);
        }
      }
      
      function closeWithdrawModal() {
        document.getElementById('withdrawModal').style.display = 'none';
        document.getElementById('withdrawAmount').value = '';
        document.getElementById('withdrawBankAccount').selectedIndex = 0;
        document.getElementById('withdrawReason').value = '';
        document.getElementById('otpSection').style.display = 'none';
        document.getElementById('otpInput').value = '';
        otpSent = false;
        if (otpTimerInterval) {
          clearInterval(otpTimerInterval);
        }
      }
      
      function initiateWithdrawal() {
        if (!otpSent) {
          // Validate withdrawal details first
          const amount = document.getElementById('withdrawAmount').value;
          const bankAccount = document.getElementById('withdrawBankAccount').value;
          
          if (!amount || amount <= 0) {
            alert('Please enter a valid amount');
            return;
          }
          if (parseInt(amount) > 450000) {
            alert('Insufficient wallet balance');
            return;
          }
          if (!bankAccount || bankAccount === 'Add New Account') {
            alert('Please select a valid bank account');
            return;
          }
          
          // Send OTP
          sendOTP();
        } else {
          // Verify OTP and process withdrawal
          processWithdrawal();
        }
      }
      
      function sendOTP() {
        // Show sending status
        document.getElementById('sendingOtpStatus').style.display = 'block';
        document.getElementById('withdrawActionBtn').disabled = true;
        
        // Get withdrawal details
        const amount = document.getElementById('withdrawAmount').value;
        const bankAccount = document.getElementById('withdrawBankAccount').value;
        
        // Make AJAX call to PHP script that sends email
        fetch('send_withdrawal_otp.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            amount: amount,
            bankAccount: bankAccount
          })
        })
        .then(response => response.json())
        .then(data => {
          // Hide sending status
          document.getElementById('sendingOtpStatus').style.display = 'none';
          document.getElementById('withdrawActionBtn').disabled = false;
          
          if (data.success) {
            // Update email display
            if (data.email) {
              document.getElementById('userEmail').textContent = data.email;
            }
            
            // Show OTP section
            showOTPSection();
            
            alert('✅ OTP has been sent to your email!');
          } else {
            alert('❌ Failed to send OTP: ' + (data.message || 'Please try again.'));
          }
        })
        .catch(error => {
          console.error('Error:', error);
          document.getElementById('sendingOtpStatus').style.display = 'none';
          document.getElementById('withdrawActionBtn').disabled = false;
          alert('❌ Error sending OTP. Please check your connection and try again.');
        });
      }
      
      function showOTPSection() {
        otpSent = true;
        document.getElementById('otpSection').style.display = 'block';
        document.getElementById('withdrawActionBtn').textContent = 'Verify & Withdraw';
        
        // Start OTP timer (5 minutes)
        startOTPTimer(300); // 300 seconds = 5 minutes
      }
      
      function startOTPTimer(duration) {
        let timeRemaining = duration;
        const timerDisplay = document.getElementById('otpTimer');
        const resendBtn = document.getElementById('resendOtpBtn');
        
        // Disable resend button initially
        resendBtn.disabled = true;
        resendBtn.style.color = '#ccc';
        resendBtn.style.cursor = 'not-allowed';
        
        otpTimerInterval = setInterval(function() {
          const minutes = Math.floor(timeRemaining / 60);
          const seconds = timeRemaining % 60;
          
          timerDisplay.textContent = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
          
          if (timeRemaining <= 0) {
            clearInterval(otpTimerInterval);
            timerDisplay.textContent = 'Expired';
            timerDisplay.style.color = '#dc3545';
            
            // Enable resend button
            resendBtn.disabled = false;
            resendBtn.style.color = '#667eea';
            resendBtn.style.cursor = 'pointer';
          }
          
          timeRemaining--;
        }, 1000);
      }
      
      function resendOTP() {
        // Reset OTP input
        document.getElementById('otpInput').value = '';
        
        // Clear existing timer
        if (otpTimerInterval) {
          clearInterval(otpTimerInterval);
        }
        
        // Reset timer display
        document.getElementById('otpTimer').style.color = '#dc3545';
        
        // Send new OTP
        sendOTP();
      }
      
      function processWithdrawal() {
        const otpInput = document.getElementById('otpInput').value;
        
        // Validate OTP
        if (!otpInput || otpInput.length !== 6) {
          alert('Please enter a valid 6-digit OTP');
          return;
        }
        
        // Disable button during processing
        const withdrawBtn = document.getElementById('withdrawActionBtn');
        withdrawBtn.disabled = true;
        withdrawBtn.textContent = 'Processing...';
        
        // Get withdrawal details
        const amount = document.getElementById('withdrawAmount').value;
        const bankAccount = document.getElementById('withdrawBankAccount').value;
        const reason = document.getElementById('withdrawReason').value;
        
        // Make AJAX call to process withdrawal
        fetch('process_withdrawal.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            amount: amount,
            bankAccount: bankAccount,
            reason: reason,
            otp: otpInput
          })
        })
        .then(response => response.json())
        .then(data => {
          withdrawBtn.disabled = false;
          withdrawBtn.textContent = 'Verify & Withdraw';
          
          if (data.success) {
            alert('✅ Withdrawal of ₦' + parseInt(amount).toLocaleString() + ' submitted successfully!\n\n' +
                  'Your funds will be transferred to:\n' + bankAccount + '\n\n' +
                  'Withdrawal ID: #' + data.withdrawal_id + '\n' +
                  'New Wallet Balance: ₦' + parseFloat(data.new_balance).toLocaleString());
            
            // Update wallet balance on page
            // You can add code here to refresh the wallet balance display
            
            closeWithdrawModal();
            
            // Optionally reload page to show updated balance
            setTimeout(function() {
              location.reload();
            }, 2000);
          } else {
            alert('❌ Failed to process withdrawal: ' + (data.message || 'Please try again.'));
          }
        })
        .catch(error => {
          console.error('Error:', error);
          withdrawBtn.disabled = false;
          withdrawBtn.textContent = 'Verify & Withdraw';
          alert('❌ Error processing withdrawal. Please check your connection and try again.');
        });
      }
      
      // Close modals when clicking outside
      window.onclick = function(event) {
        const addModal = document.getElementById('addAccountModal');
        const withdrawModal = document.getElementById('withdrawModal');
        if (event.target === addModal) {
          closeAddAccountModal();
        }
        if (event.target === withdrawModal) {
          closeWithdrawModal();
        }
      }
    </script>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Sample commission details
        const commissionDetails = {
          1: { customer: 'Tech Solutions Ltd', plan: 'Enterprise Plan', amount: 45000, rate: '15%', subscription: '₦300,000', date: 'Jan 10, 2026', status: 'Pending' },
          2: { customer: 'Retail Express', plan: 'Professional Plan', amount: 40000, rate: '20%', subscription: '₦200,000', date: 'Jan 8, 2026', status: 'Pending' },
          3: { customer: 'Fashion Hub Nigeria', plan: 'Business Plan', amount: 35000, rate: '17.5%', subscription: '₦200,000', date: 'Dec 28, 2025', status: 'Paid', paymentDate: 'Jan 5, 2026', paymentMethod: 'Bank Transfer' },
          4: { customer: 'Auto Parts Co', plan: 'Professional Plan', amount: 40000, rate: '20%', subscription: '₦200,000', date: 'Dec 20, 2025', status: 'Paid', paymentDate: 'Jan 3, 2026', paymentMethod: 'Bank Transfer' },
          5: { customer: 'Lagos Tech Hub', plan: 'Enterprise Plan', amount: 65000, rate: '13%', subscription: '₦500,000', date: 'Dec 15, 2025', status: 'Processing' },
          6: { customer: 'Global Supplies Inc', plan: 'Business Plan', amount: 35000, rate: '17.5%', subscription: '₦200,000', date: 'Nov 25, 2025', status: 'Paid', paymentDate: 'Dec 5, 2025', paymentMethod: 'Bank Transfer' },
          7: { customer: 'Mega Mart Nigeria', plan: 'Professional Plan', amount: 40000, rate: '20%', subscription: '₦200,000', date: 'Nov 18, 2025', status: 'Paid', paymentDate: 'Dec 1, 2025', paymentMethod: 'Bank Transfer' },
          8: { customer: 'Coastal Ventures', plan: 'Enterprise Plan', amount: 50000, rate: '10%', subscription: '₦500,000', date: 'Oct 30, 2025', status: 'Paid', paymentDate: 'Nov 10, 2025', paymentMethod: 'Bank Transfer' }
        };
        
        // Build breakdown HTML
        function buildBreakdownHtml(details) {
          if (!details) return '<p class="text-muted mb-0">No details available.</p>';
          
          let html = `
            <div class="breakdown-details">
              <h6>Commission Details</h6>
              <div class="row">
                <div class="col-md-6">
                  <p><strong>Customer:</strong> ${details.customer}</p>
                  <p><strong>Plan:</strong> ${details.plan}</p>
                  <p><strong>Subscription Value:</strong> ${details.subscription}</p>
                  <p><strong>Commission Rate:</strong> ${details.rate}</p>
                </div>
                <div class="col-md-6">
                  <p><strong>Commission Amount:</strong> ₦${details.amount.toLocaleString()}</p>
                  <p><strong>Earned Date:</strong> ${details.date}</p>
                  <p><strong>Status:</strong> ${details.status}</p>
                  ${details.paymentDate ? `<p><strong>Payment Date:</strong> ${details.paymentDate}</p>` : ''}
                  ${details.paymentMethod ? `<p><strong>Payment Method:</strong> ${details.paymentMethod}</p>` : ''}
                </div>
              </div>
            </div>
          `;
          return html;
        }
        
        // View details toggle
        document.querySelectorAll('.view-details-btn').forEach(function(btn) {
          btn.addEventListener('click', function() {
            const commId = this.dataset.commId;
            const tr = this.closest('tr');
            const next = tr.nextElementSibling;
            const arrow = this.querySelector('.view-arrow');
            
            // Check if breakdown row already exists
            if (next && next.classList.contains('comm-breakdown-row') && next.dataset.commId === commId) {
              next.remove();
              arrow.classList.remove('expanded');
              return;
            }
            
            // Close any open breakdown rows
            document.querySelectorAll('.comm-breakdown-row').forEach(function(r) { r.remove(); });
            document.querySelectorAll('.view-arrow').forEach(function(a) { a.classList.remove('expanded'); });
            
            // Create new breakdown row
            const cols = tr.children.length;
            const row = document.createElement('tr');
            row.className = 'comm-breakdown-row';
            row.dataset.commId = commId;
            const td = document.createElement('td');
            td.colSpan = cols;
            td.innerHTML = buildBreakdownHtml(commissionDetails[commId]);
            row.appendChild(td);
            tr.parentNode.insertBefore(row, tr.nextSibling);
            
            arrow.classList.add('expanded');
          });
        });
        
        // Filter functionality
        const statusFilter = document.getElementById('statusFilter');
        const monthFilter = document.getElementById('monthFilter');
        
        function filterTable() {
          const statusValue = statusFilter.value;
          const monthValue = monthFilter.value;
          const rows = document.querySelectorAll('#commissionTableBody .comm-row');
          
          rows.forEach(function(row) {
            const status = row.dataset.status;
            const month = row.dataset.month;
            
            const statusMatch = statusValue === 'all' || status === statusValue;
            const monthMatch = monthValue === 'all' || month === monthValue;
            
            row.style.display = (statusMatch && monthMatch) ? '' : 'none';
            
            // Hide breakdown if parent is hidden
            const next = row.nextElementSibling;
            if (next && next.classList.contains('comm-breakdown-row')) {
              next.style.display = (statusMatch && monthMatch) ? '' : 'none';
            }
          });
        }
        
        statusFilter.addEventListener('change', filterTable);
        monthFilter.addEventListener('change', filterTable);
        
        // Export CSV
        document.getElementById('exportCommissions').addEventListener('click', function() {
          const rows = [['Date', 'Customer', 'Plan', 'Amount', 'Status', 'Payment Date']];
          
          document.querySelectorAll('#commissionTableBody .comm-row').forEach(function(r) {
            if (r.style.display !== 'none') {
              const cells = r.querySelectorAll('td');
              const date = cells[1].innerText.trim();
              const customer = cells[2].innerText.trim();
              const plan = cells[3].innerText.trim();
              const amount = cells[4].innerText.trim();
              const status = cells[5].innerText.trim();
              const paymentDate = cells[6].innerText.trim();
              rows.push([date, customer, plan, amount, status, paymentDate]);
            }
          });
          
          let csv = rows.map(r => r.map(c => '"' + String(c).replace(/"/g, '""') + '"').join(',')).join('\n');
          const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
          const url = URL.createObjectURL(blob);
          const a = document.createElement('a');
          a.href = url;
          a.download = 'my_commissions_' + new Date().toISOString().split('T')[0] + '.csv';
          document.body.appendChild(a);
          a.click();
          a.remove();
          URL.revokeObjectURL(url);
        });
      });
    </script>
  </body>
</html>
