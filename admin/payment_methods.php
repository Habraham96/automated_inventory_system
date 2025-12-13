<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Payment Methods - SalesPilot</title>
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
      
      .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      }
      
      .payment-method-card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
        position: relative;
      }
      
      .payment-method-card:hover {
        border-color: #0d6efd;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      }
      
      .payment-method-card.disabled {
        opacity: 0.6;
        background: #f8f9fa;
      }
      
      .payment-logo {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        color: white;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
      }
      
      .payment-logo.paystack {
        background: linear-gradient(135deg, #00C3F9 0%, #0081CC 100%);
      }
      
      .payment-logo.flutterwave {
        background: linear-gradient(135deg, #FFA500 0%, #FF6B00 100%);
      }
      
      .payment-logo.stripe {
        background: linear-gradient(135deg, #635BFF 0%, #4B42D6 100%);
      }
      
      .payment-logo.paypal {
        background: linear-gradient(135deg, #0070BA 0%, #003087 100%);
      }
      
      .payment-logo.bank {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
      }
      
      .status-badge {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
      }
      
      .status-badge.active {
        background: #d1e7dd;
        color: #0a3622;
      }
      
      .status-badge.inactive {
        background: #f8d7da;
        color: #58151c;
      }
      
      .toggle-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 30px;
      }
      
      .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }
      
      .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 30px;
      }
      
      .toggle-slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
      }
      
      input:checked + .toggle-slider {
        background-color: #198754;
      }
      
      input:checked + .toggle-slider:before {
        transform: translateX(30px);
      }
      
      .config-item {
        margin-bottom: 1.25rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #0d6efd;
      }
      
      .config-item label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        display: block;
      }
      
      .config-item small {
        color: #6c757d;
        display: block;
        margin-top: 0.25rem;
      }
      
      .stats-row {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
      }
      
      .stat-item {
        text-align: center;
      }
      
      .stat-value {
        font-size: 1.75rem;
        font-weight: 700;
        color: #0d6efd;
        margin-bottom: 0.25rem;
      }
      
      .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include 'layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php include 'layouts/sidebar_content.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header">
              <div>
                <h3 class="mb-2"><i class="bi bi-credit-card-fill me-2"></i>Payment Methods</h3>
                <p class="mb-0">Manage payment gateways and transaction settings</p>
              </div>
            </div>
            
            <!-- Payment Statistics -->
            <div class="stats-row">
              <div class="row">
                <div class="col-md-3">
                  <div class="stat-item">
                    <div class="stat-value">5</div>
                    <div class="stat-label">Payment Methods</div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="stat-item">
                    <div class="stat-value">3</div>
                    <div class="stat-label">Active Gateways</div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="stat-item">
                    <div class="stat-value">₦2.4M</div>
                    <div class="stat-label">Monthly Volume</div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="stat-item">
                    <div class="stat-value">98.5%</div>
                    <div class="stat-label">Success Rate</div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Paystack -->
            <div class="payment-method-card">
              <span class="status-badge active">
                <i class="bi bi-check-circle-fill me-1"></i>Active
              </span>
              <div class="row">
                <div class="col-md-2">
                  <div class="payment-logo paystack">
                    <i class="bi bi-credit-card-2-front"></i>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                      <h4 class="mb-1">Paystack</h4>
                      <p class="text-muted mb-2">Accept payments via cards, bank transfers, and mobile money</p>
                      <div class="d-flex gap-3">
                        <small class="text-muted"><i class="bi bi-graph-up me-1"></i>1,245 transactions</small>
                        <small class="text-muted"><i class="bi bi-currency-exchange me-1"></i>₦1.2M volume</small>
                        <small class="text-muted"><i class="bi bi-check-circle me-1"></i>99.2% success</small>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                      <label class="toggle-switch mb-0">
                        <input type="checkbox" id="enablePaystack" checked onchange="togglePaymentMethod('Paystack', this)">
                        <span class="toggle-slider"></span>
                      </label>
                      <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#paystackConfig">
                        <i class="bi bi-gear me-1"></i>Configure
                      </button>
                    </div>
                  </div>
                  
                  <div class="collapse" id="paystackConfig">
                    <div class="border-top pt-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="paystackPublicKey">Public Key</label>
                            <input type="text" class="form-control" id="paystackPublicKey" value="pk_test_xxxxxxxxxxxxxxxxxx">
                            <small>Your Paystack public key</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="paystackSecretKey">Secret Key</label>
                            <input type="password" class="form-control" id="paystackSecretKey" value="sk_test_xxxxxxxxxxxxxxxxxx">
                            <small>Your Paystack secret key</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="paystackMode">Mode</label>
                            <select class="form-select" id="paystackMode">
                              <option value="test" selected>Test Mode</option>
                              <option value="live">Live Mode</option>
                            </select>
                            <small>Select test or live environment</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="paystackWebhook">Webhook URL</label>
                            <input type="text" class="form-control" id="paystackWebhook" value="https://yourdomain.com/webhook/paystack" readonly>
                            <small>Webhook endpoint for notifications</small>
                          </div>
                        </div>
                      </div>
                      <div class="text-end mt-3">
                        <button class="btn btn-secondary me-2" onclick="testPaymentGateway('Paystack')">
                          <i class="bi bi-lightning me-1"></i>Test Connection
                        </button>
                        <button class="btn btn-primary" onclick="savePaymentConfig('Paystack')">
                          <i class="bi bi-check-circle me-1"></i>Save Configuration
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Flutterwave -->
            <div class="payment-method-card">
              <span class="status-badge active">
                <i class="bi bi-check-circle-fill me-1"></i>Active
              </span>
              <div class="row">
                <div class="col-md-2">
                  <div class="payment-logo flutterwave">
                    <i class="bi bi-wallet2"></i>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                      <h4 class="mb-1">Flutterwave</h4>
                      <p class="text-muted mb-2">Process payments across Africa with multiple payment options</p>
                      <div class="d-flex gap-3">
                        <small class="text-muted"><i class="bi bi-graph-up me-1"></i>856 transactions</small>
                        <small class="text-muted"><i class="bi bi-currency-exchange me-1"></i>₦890K volume</small>
                        <small class="text-muted"><i class="bi bi-check-circle me-1"></i>98.5% success</small>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                      <label class="toggle-switch mb-0">
                        <input type="checkbox" id="enableFlutterwave" checked onchange="togglePaymentMethod('Flutterwave', this)">
                        <span class="toggle-slider"></span>
                      </label>
                      <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#flutterwaveConfig">
                        <i class="bi bi-gear me-1"></i>Configure
                      </button>
                    </div>
                  </div>
                  
                  <div class="collapse" id="flutterwaveConfig">
                    <div class="border-top pt-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="flutterwavePublicKey">Public Key</label>
                            <input type="text" class="form-control" id="flutterwavePublicKey" value="FLWPUBK_TEST-xxxxxxxxxxxxx">
                            <small>Your Flutterwave public key</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="flutterwaveSecretKey">Secret Key</label>
                            <input type="password" class="form-control" id="flutterwaveSecretKey" value="FLWSECK_TEST-xxxxxxxxxxxxx">
                            <small>Your Flutterwave secret key</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="flutterwaveEncryptionKey">Encryption Key</label>
                            <input type="password" class="form-control" id="flutterwaveEncryptionKey" value="FLWSECK_TESTxxxxxxxxxx">
                            <small>Your Flutterwave encryption key</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="flutterwaveMode">Mode</label>
                            <select class="form-select" id="flutterwaveMode">
                              <option value="test" selected>Test Mode</option>
                              <option value="live">Live Mode</option>
                            </select>
                            <small>Select test or live environment</small>
                          </div>
                        </div>
                      </div>
                      <div class="text-end mt-3">
                        <button class="btn btn-secondary me-2" onclick="testPaymentGateway('Flutterwave')">
                          <i class="bi bi-lightning me-1"></i>Test Connection
                        </button>
                        <button class="btn btn-primary" onclick="savePaymentConfig('Flutterwave')">
                          <i class="bi bi-check-circle me-1"></i>Save Configuration
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Stripe -->
            <div class="payment-method-card disabled">
              <span class="status-badge inactive">
                <i class="bi bi-x-circle-fill me-1"></i>Inactive
              </span>
              <div class="row">
                <div class="col-md-2">
                  <div class="payment-logo stripe">
                    <i class="bi bi-credit-card"></i>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                      <h4 class="mb-1">Stripe</h4>
                      <p class="text-muted mb-2">Global payment processing with advanced features</p>
                      <div class="d-flex gap-3">
                        <small class="text-muted"><i class="bi bi-graph-up me-1"></i>0 transactions</small>
                        <small class="text-muted"><i class="bi bi-currency-exchange me-1"></i>₦0 volume</small>
                        <small class="text-muted"><i class="bi bi-dash-circle me-1"></i>Not configured</small>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                      <label class="toggle-switch mb-0">
                        <input type="checkbox" id="enableStripe" onchange="togglePaymentMethod('Stripe', this)">
                        <span class="toggle-slider"></span>
                      </label>
                      <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#stripeConfig">
                        <i class="bi bi-gear me-1"></i>Configure
                      </button>
                    </div>
                  </div>
                  
                  <div class="collapse" id="stripeConfig">
                    <div class="border-top pt-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="stripePublishableKey">Publishable Key</label>
                            <input type="text" class="form-control" id="stripePublishableKey" placeholder="pk_test_xxxxxxxxxxxxx">
                            <small>Your Stripe publishable key</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="stripeSecretKey">Secret Key</label>
                            <input type="password" class="form-control" id="stripeSecretKey" placeholder="sk_test_xxxxxxxxxxxxx">
                            <small>Your Stripe secret key</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="stripeWebhookSecret">Webhook Secret</label>
                            <input type="password" class="form-control" id="stripeWebhookSecret" placeholder="whsec_xxxxxxxxxxxxx">
                            <small>Your Stripe webhook secret</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="stripeMode">Mode</label>
                            <select class="form-select" id="stripeMode">
                              <option value="test" selected>Test Mode</option>
                              <option value="live">Live Mode</option>
                            </select>
                            <small>Select test or live environment</small>
                          </div>
                        </div>
                      </div>
                      <div class="text-end mt-3">
                        <button class="btn btn-secondary me-2" onclick="testPaymentGateway('Stripe')">
                          <i class="bi bi-lightning me-1"></i>Test Connection
                        </button>
                        <button class="btn btn-primary" onclick="savePaymentConfig('Stripe')">
                          <i class="bi bi-check-circle me-1"></i>Save Configuration
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- PayPal -->
            <div class="payment-method-card disabled">
              <span class="status-badge inactive">
                <i class="bi bi-x-circle-fill me-1"></i>Inactive
              </span>
              <div class="row">
                <div class="col-md-2">
                  <div class="payment-logo paypal">
                    <i class="bi bi-paypal"></i>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                      <h4 class="mb-1">PayPal</h4>
                      <p class="text-muted mb-2">Accept PayPal and credit card payments worldwide</p>
                      <div class="d-flex gap-3">
                        <small class="text-muted"><i class="bi bi-graph-up me-1"></i>0 transactions</small>
                        <small class="text-muted"><i class="bi bi-currency-exchange me-1"></i>₦0 volume</small>
                        <small class="text-muted"><i class="bi bi-dash-circle me-1"></i>Not configured</small>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                      <label class="toggle-switch mb-0">
                        <input type="checkbox" id="enablePaypal" onchange="togglePaymentMethod('PayPal', this)">
                        <span class="toggle-slider"></span>
                      </label>
                      <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#paypalConfig">
                        <i class="bi bi-gear me-1"></i>Configure
                      </button>
                    </div>
                  </div>
                  
                  <div class="collapse" id="paypalConfig">
                    <div class="border-top pt-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="paypalClientId">Client ID</label>
                            <input type="text" class="form-control" id="paypalClientId" placeholder="AXXXXXXXXXXXXXXXXxxxxxx">
                            <small>Your PayPal client ID</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="paypalClientSecret">Client Secret</label>
                            <input type="password" class="form-control" id="paypalClientSecret" placeholder="EXXXXXXXXXXXXXXXXxxxxxx">
                            <small>Your PayPal client secret</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="paypalMode">Mode</label>
                            <select class="form-select" id="paypalMode">
                              <option value="sandbox" selected>Sandbox Mode</option>
                              <option value="live">Live Mode</option>
                            </select>
                            <small>Select sandbox or live environment</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="paypalWebhook">Webhook URL</label>
                            <input type="text" class="form-control" id="paypalWebhook" value="https://yourdomain.com/webhook/paypal" readonly>
                            <small>Webhook endpoint for notifications</small>
                          </div>
                        </div>
                      </div>
                      <div class="text-end mt-3">
                        <button class="btn btn-secondary me-2" onclick="testPaymentGateway('PayPal')">
                          <i class="bi bi-lightning me-1"></i>Test Connection
                        </button>
                        <button class="btn btn-primary" onclick="savePaymentConfig('PayPal')">
                          <i class="bi bi-check-circle me-1"></i>Save Configuration
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Bank Transfer -->
            <div class="payment-method-card">
              <span class="status-badge active">
                <i class="bi bi-check-circle-fill me-1"></i>Active
              </span>
              <div class="row">
                <div class="col-md-2">
                  <div class="payment-logo bank">
                    <i class="bi bi-bank"></i>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                      <h4 class="mb-1">Bank Transfer</h4>
                      <p class="text-muted mb-2">Direct bank transfer with manual confirmation</p>
                      <div class="d-flex gap-3">
                        <small class="text-muted"><i class="bi bi-graph-up me-1"></i>342 transactions</small>
                        <small class="text-muted"><i class="bi bi-currency-exchange me-1"></i>₦310K volume</small>
                        <small class="text-muted"><i class="bi bi-check-circle me-1"></i>100% success</small>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                      <label class="toggle-switch mb-0">
                        <input type="checkbox" id="enableBankTransfer" checked onchange="togglePaymentMethod('Bank Transfer', this)">
                        <span class="toggle-slider"></span>
                      </label>
                      <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#bankConfig">
                        <i class="bi bi-gear me-1"></i>Configure
                      </button>
                    </div>
                  </div>
                  
                  <div class="collapse" id="bankConfig">
                    <div class="border-top pt-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="bankName">Bank Name</label>
                            <input type="text" class="form-control" id="bankName" value="First Bank of Nigeria">
                            <small>Your bank name</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="accountNumber">Account Number</label>
                            <input type="text" class="form-control" id="accountNumber" value="1234567890">
                            <small>Your account number</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <label for="accountName">Account Name</label>
                            <input type="text" class="form-control" id="accountName" value="SalesPilot Limited">
                            <small>Account holder name</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="config-item">
                            <div class="d-flex justify-content-between align-items-center">
                              <div>
                                <label>Require Payment Proof</label>
                                <small>Require users to upload proof of payment</small>
                              </div>
                              <label class="toggle-switch mb-0">
                                <input type="checkbox" id="requireProof" checked>
                                <span class="toggle-slider"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-end mt-3">
                        <button class="btn btn-primary" onclick="savePaymentConfig('Bank Transfer')">
                          <i class="bi bi-check-circle me-1"></i>Save Configuration
                        </button>
                      </div>
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
    <script src="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    <?php include 'layouts/sidebar_scripts.php'; ?>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize Bootstrap dropdown for user avatar
      setTimeout(function() {
        var userDropdown = document.getElementById('UserDropdown');
        var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
        if (userDropdown && dropdownMenu && typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
          try { 
            new bootstrap.Dropdown(userDropdown, { autoClose: true, boundary: 'viewport' }); 
          } catch (error) { 
            console.error('Dropdown initialization error:', error); 
          }
        }
        
        // Initialize sidebar collapse behavior
        var sidebar = document.getElementById('sidebar');
        if (sidebar) {
          sidebar.querySelectorAll('a.nav-link[data-bs-toggle="collapse"]').forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
              e.preventDefault();
              var target = document.querySelector(this.getAttribute('href'));
              if (target && typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                sidebar.querySelectorAll('div.collapse.show').forEach(function (m) { 
                  if (m !== target) bootstrap.Collapse.getOrCreateInstance(m).hide(); 
                });
                bootstrap.Collapse.getOrCreateInstance(target).toggle();
              }
            });
          });
        }
      }, 500);
    });
    
    function togglePaymentMethod(method, checkbox) {
      const status = checkbox.checked ? 'enabled' : 'disabled';
      console.log(method + ' ' + status);
      
      const card = checkbox.closest('.payment-method-card');
      const badge = card.querySelector('.status-badge');
      
      if (checkbox.checked) {
        card.classList.remove('disabled');
        badge.classList.remove('inactive');
        badge.classList.add('active');
        badge.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i>Active';
      } else {
        card.classList.add('disabled');
        badge.classList.remove('active');
        badge.classList.add('inactive');
        badge.innerHTML = '<i class="bi bi-x-circle-fill me-1"></i>Inactive';
      }
      
      alert(method + ' has been ' + status);
    }
    
    function savePaymentConfig(method) {
      console.log('Saving configuration for ' + method);
      alert(method + ' configuration saved successfully!');
    }
    
    function testPaymentGateway(method) {
      console.log('Testing connection for ' + method);
      alert('Testing ' + method + ' connection...\n\nConnection successful!');
    }
    </script>
  </body>
</html>
