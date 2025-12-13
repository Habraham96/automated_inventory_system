<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plans & Pricing - SalesPilot</title>
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
      
      .plan-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border: 3px solid #e9ecef;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }
      
      .plan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      }
      
      .plan-card.popular {
        border-color: #0d6efd;
        border-width: 3px;
      }
      
      .plan-card.popular::before {
        content: "MOST POPULAR";
        position: absolute;
        top: 20px;
        right: -35px;
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        color: white;
        padding: 5px 40px;
        font-size: 0.75rem;
        font-weight: 700;
        transform: rotate(45deg);
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      }
      
      .plan-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #e9ecef;
      }
      
      .plan-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 2.5rem;
        color: white;
      }
      
      .plan-icon.trial {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
      }
      
      .plan-icon.basic {
        background: linear-gradient(135deg, #0dcaf0 0%, #0891b2 100%);
      }
      
      .plan-icon.standard {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
      }
      
      .plan-icon.premium {
        background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
      }
      
      .plan-name {
        font-size: 1.75rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.5rem;
      }
      
      .plan-description {
        color: #6c757d;
        font-size: 0.95rem;
      }
      
      .plan-pricing {
        text-align: center;
        margin-bottom: 2rem;
      }
      
      .plan-price {
        font-size: 3rem;
        font-weight: 700;
        color: #0d6efd;
        line-height: 1;
      }
      
      .plan-price .currency {
        font-size: 1.5rem;
        vertical-align: top;
      }
      
      .plan-period {
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 0.5rem;
      }
      
      .plan-features {
        list-style: none;
        padding: 0;
        margin-bottom: 2rem;
      }
      
      .plan-features li {
        padding: 0.75rem 0;
        color: #495057;
        display: flex;
        align-items: center;
        gap: 0.75rem;
      }
      
      .plan-features li i {
        color: #198754;
        font-size: 1.1rem;
        flex-shrink: 0;
      }
      
      .plan-features li.disabled {
        color: #adb5bd;
        text-decoration: line-through;
      }
      
      .plan-features li.disabled i {
        color: #dee2e6;
      }
      
      .plan-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1.5rem;
      }
      
      .plan-stats {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
        margin-top: 1.5rem;
      }
      
      .plan-stats .stat-row {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #e9ecef;
      }
      
      .plan-stats .stat-row:last-child {
        border-bottom: none;
      }
      
      .plan-stats .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
      }
      
      .plan-stats .stat-value {
        font-weight: 600;
        color: #212529;
      }
      
      .edit-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 500px;
        height: 100vh;
        background: white;
        box-shadow: -5px 0 15px rgba(0,0,0,0.2);
        transform: translateX(100%);
        visibility: hidden;
        transition: transform 0.3s ease, visibility 0.3s ease;
        z-index: 1050;
        overflow-y: auto;
      }
      
      .edit-panel.show {
        transform: translateX(0);
        visibility: visible;
      }
      
      .edit-panel-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        position: sticky;
        top: 0;
        z-index: 10;
      }
      
      .edit-panel-body {
        padding: 2rem;
      }
      
      .panel-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
        z-index: 1040;
      }
      
      .panel-overlay.show {
        opacity: 1;
        visibility: visible;
      }
      
      .form-section {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e9ecef;
      }
      
      .form-section:last-child {
        border-bottom: none;
      }
      
      .form-section h6 {
        font-weight: 600;
        color: #495057;
        margin-bottom: 1rem;
      }
      
      .feature-input-group {
        margin-bottom: 1rem;
      }
      
      .feature-input-group .input-group {
        margin-bottom: 0.5rem;
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
              <div class="d-flex justify-content-between align-items-center w-100">
                <div>
                  <h3 class="mb-2"><i class="bi bi-tag-fill me-2"></i>Plans & Pricing</h3>
                  <p class="mb-0">Manage subscription plans and pricing tiers</p>
                </div>
                <button class="btn btn-light" onclick="addNewPlan()">
                  <i class="bi bi-plus-circle me-2"></i>Add New Plan
                </button>
              </div>
            </div>
            
            <!-- Plans Overview Stats -->
            <div class="row mb-4">
              <div class="col-md-3">
                <div class="card text-center border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                  <div class="card-body">
                    <h2 class="mb-0">4</h2>
                    <small>Active Plans</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                  <div class="card-body">
                    <h2 class="mb-0">245</h2>
                    <small>Total Subscribers</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                  <div class="card-body">
                    <h2 class="mb-0">₦2.1M</h2>
                    <small>Monthly Revenue</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white;">
                  <div class="card-body">
                    <h2 class="mb-0">₦8,571</h2>
                    <small>Avg Revenue/User</small>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Plans Grid -->
            <div class="row">
              <!-- Trial Plan -->
              <div class="col-md-6 col-lg-3">
                <div class="plan-card">
                  <div class="plan-header">
                    <div class="plan-icon trial">
                      <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="plan-name">Trial</div>
                    <div class="plan-description">Perfect for getting started</div>
                  </div>
                  
                  <div class="plan-pricing">
                    <div class="plan-price">
                      <span class="currency">₦</span>0
                    </div>
                    <div class="plan-period">14 days free trial</div>
                  </div>
                  
                  <ul class="plan-features">
                    <li><i class="bi bi-check-circle-fill"></i>5 Products</li>
                    <li><i class="bi bi-check-circle-fill"></i>Basic Reports</li>
                    <li><i class="bi bi-check-circle-fill"></i>1 User Account</li>
                    <li><i class="bi bi-check-circle-fill"></i>Email Support</li>
                    <li class="disabled"><i class="bi bi-x-circle-fill"></i>Advanced Analytics</li>
                    <li class="disabled"><i class="bi bi-x-circle-fill"></i>API Access</li>
                  </ul>
                  
                  <div class="plan-stats">
                    <div class="stat-row">
                      <span class="stat-label">Active Users</span>
                      <span class="stat-value">23</span>
                    </div>
                    <div class="stat-row">
                      <span class="stat-label">Conversion Rate</span>
                      <span class="stat-value">65%</span>
                    </div>
                  </div>
                  
                  <div class="plan-actions">
                    <button class="btn btn-outline-primary flex-fill" onclick="editPlan('trial')">
                      <i class="bi bi-pencil"></i> Edit
                    </button>
                    <button class="btn btn-outline-secondary" onclick="viewPlanDetails('trial')">
                      <i class="bi bi-eye"></i>
                    </button>
                  </div>
                </div>
              </div>
              
              <!-- Basic Plan -->
              <div class="col-md-6 col-lg-3">
                <div class="plan-card">
                  <div class="plan-header">
                    <div class="plan-icon basic">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="plan-name">Basic</div>
                    <div class="plan-description">For small businesses</div>
                  </div>
                  
                  <div class="plan-pricing">
                    <div class="plan-price">
                      <span class="currency">₦</span>5,000
                    </div>
                    <div class="plan-period">per month</div>
                  </div>
                  
                  <ul class="plan-features">
                    <li><i class="bi bi-check-circle-fill"></i>50 Products</li>
                    <li><i class="bi bi-check-circle-fill"></i>Standard Reports</li>
                    <li><i class="bi bi-check-circle-fill"></i>3 User Accounts</li>
                    <li><i class="bi bi-check-circle-fill"></i>Email Support</li>
                    <li><i class="bi bi-check-circle-fill"></i>Mobile App Access</li>
                    <li class="disabled"><i class="bi bi-x-circle-fill"></i>API Access</li>
                  </ul>
                  
                  <div class="plan-stats">
                    <div class="stat-row">
                      <span class="stat-label">Active Users</span>
                      <span class="stat-value">87</span>
                    </div>
                    <div class="stat-row">
                      <span class="stat-label">Monthly Revenue</span>
                      <span class="stat-value">₦435K</span>
                    </div>
                  </div>
                  
                  <div class="plan-actions">
                    <button class="btn btn-outline-primary flex-fill" onclick="editPlan('basic')">
                      <i class="bi bi-pencil"></i> Edit
                    </button>
                    <button class="btn btn-outline-secondary" onclick="viewPlanDetails('basic')">
                      <i class="bi bi-eye"></i>
                    </button>
                  </div>
                </div>
              </div>
              
              <!-- Standard Plan -->
              <div class="col-md-6 col-lg-3">
                <div class="plan-card popular">
                  <div class="plan-header">
                    <div class="plan-icon standard">
                      <i class="bi bi-boxes"></i>
                    </div>
                    <div class="plan-name">Standard</div>
                    <div class="plan-description">Most popular choice</div>
                  </div>
                  
                  <div class="plan-pricing">
                    <div class="plan-price">
                      <span class="currency">₦</span>10,000
                    </div>
                    <div class="plan-period">per month</div>
                  </div>
                  
                  <ul class="plan-features">
                    <li><i class="bi bi-check-circle-fill"></i>200 Products</li>
                    <li><i class="bi bi-check-circle-fill"></i>Advanced Reports</li>
                    <li><i class="bi bi-check-circle-fill"></i>10 User Accounts</li>
                    <li><i class="bi bi-check-circle-fill"></i>Priority Support</li>
                    <li><i class="bi bi-check-circle-fill"></i>Mobile App Access</li>
                    <li><i class="bi bi-check-circle-fill"></i>Basic API Access</li>
                  </ul>
                  
                  <div class="plan-stats">
                    <div class="stat-row">
                      <span class="stat-label">Active Users</span>
                      <span class="stat-value">98</span>
                    </div>
                    <div class="stat-row">
                      <span class="stat-label">Monthly Revenue</span>
                      <span class="stat-value">₦980K</span>
                    </div>
                  </div>
                  
                  <div class="plan-actions">
                    <button class="btn btn-outline-primary flex-fill" onclick="editPlan('standard')">
                      <i class="bi bi-pencil"></i> Edit
                    </button>
                    <button class="btn btn-outline-secondary" onclick="viewPlanDetails('standard')">
                      <i class="bi bi-eye"></i>
                    </button>
                  </div>
                </div>
              </div>
              
              <!-- Premium Plan -->
              <div class="col-md-6 col-lg-3">
                <div class="plan-card">
                  <div class="plan-header">
                    <div class="plan-icon premium">
                      <i class="bi bi-gem"></i>
                    </div>
                    <div class="plan-name">Premium</div>
                    <div class="plan-description">For growing enterprises</div>
                  </div>
                  
                  <div class="plan-pricing">
                    <div class="plan-price">
                      <span class="currency">₦</span>15,000
                    </div>
                    <div class="plan-period">per month</div>
                  </div>
                  
                  <ul class="plan-features">
                    <li><i class="bi bi-check-circle-fill"></i>Unlimited Products</li>
                    <li><i class="bi bi-check-circle-fill"></i>Premium Reports</li>
                    <li><i class="bi bi-check-circle-fill"></i>Unlimited Users</li>
                    <li><i class="bi bi-check-circle-fill"></i>24/7 Phone Support</li>
                    <li><i class="bi bi-check-circle-fill"></i>Mobile App Access</li>
                    <li><i class="bi bi-check-circle-fill"></i>Full API Access</li>
                  </ul>
                  
                  <div class="plan-stats">
                    <div class="stat-row">
                      <span class="stat-label">Active Users</span>
                      <span class="stat-value">37</span>
                    </div>
                    <div class="stat-row">
                      <span class="stat-label">Monthly Revenue</span>
                      <span class="stat-value">₦555K</span>
                    </div>
                  </div>
                  
                  <div class="plan-actions">
                    <button class="btn btn-outline-primary flex-fill" onclick="editPlan('premium')">
                      <i class="bi bi-pencil"></i> Edit
                    </button>
                    <button class="btn btn-outline-secondary" onclick="viewPlanDetails('premium')">
                      <i class="bi bi-eye"></i>
                    </button>
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
    
    <!-- Edit Plan Panel -->
    <div class="panel-overlay" id="panelOverlay" onclick="closeEditPanel()"></div>
    <div class="edit-panel" id="editPanel">
      <div class="edit-panel-header">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Plan</h5>
          <button class="btn btn-sm btn-light" onclick="closeEditPanel()">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
      </div>
      <div class="edit-panel-body">
        <form id="editPlanForm">
          <div class="form-section">
            <h6>Basic Information</h6>
            <div class="mb-3">
              <label class="form-label">Plan Name</label>
              <input type="text" class="form-control" id="planName" placeholder="e.g., Standard">
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text" class="form-control" id="planDescription" placeholder="e.g., Most popular choice">
            </div>
            <div class="mb-3">
              <label class="form-label">Plan Icon</label>
              <select class="form-select" id="planIcon">
                <option value="hourglass-split">Hourglass (Trial)</option>
                <option value="box">Box (Basic)</option>
                <option value="boxes">Boxes (Standard)</option>
                <option value="gem">Gem (Premium)</option>
                <option value="star">Star</option>
                <option value="trophy">Trophy</option>
              </select>
            </div>
          </div>
          
          <div class="form-section">
            <h6>Pricing</h6>
            <div class="mb-3">
              <label class="form-label">Monthly Price (₦)</label>
              <input type="number" class="form-control" id="planPrice" placeholder="e.g., 10000">
            </div>
            <div class="mb-3">
              <label class="form-label">Billing Period</label>
              <select class="form-select" id="planPeriod">
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
                <option value="trial">Trial Period</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Trial Days (if applicable)</label>
              <input type="number" class="form-control" id="trialDays" placeholder="e.g., 14">
            </div>
          </div>
          
          <div class="form-section">
            <h6>Features</h6>
            <div id="featuresContainer">
              <div class="feature-input-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Feature description" value="200 Products">
                  <button class="btn btn-outline-danger" type="button">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </div>
              <div class="feature-input-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Feature description" value="Advanced Reports">
                  <button class="btn btn-outline-danger" type="button">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </div>
              <div class="feature-input-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Feature description" value="10 User Accounts">
                  <button class="btn btn-outline-danger" type="button">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-sm btn-outline-primary w-100" onclick="addFeatureField()">
              <i class="bi bi-plus-circle me-1"></i>Add Feature
            </button>
          </div>
          
          <div class="form-section">
            <h6>Settings</h6>
            <div class="mb-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="planActive" checked>
                <label class="form-check-label" for="planActive">Plan is Active</label>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="planFeatured">
                <label class="form-check-label" for="planFeatured">Mark as Popular</label>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="planVisible" checked>
                <label class="form-check-label" for="planVisible">Visible to Users</label>
              </div>
            </div>
          </div>
          
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-secondary flex-fill" onclick="closeEditPanel()">Cancel</button>
            <button type="button" class="btn btn-primary flex-fill" onclick="savePlan()">
              <i class="bi bi-check-circle me-1"></i>Save Changes
            </button>
          </div>
        </form>
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
    
    function editPlan(planType) {
      console.log('Editing plan:', planType);
      document.getElementById('editPanel').classList.add('show');
      document.getElementById('panelOverlay').classList.add('show');
      document.body.style.overflow = 'hidden';
    }
    
    function closeEditPanel() {
      document.getElementById('editPanel').classList.remove('show');
      document.getElementById('panelOverlay').classList.remove('show');
      document.body.style.overflow = 'auto';
    }
    
    function addNewPlan() {
      console.log('Adding new plan');
      document.getElementById('editPlanForm').reset();
      editPlan('new');
    }
    
    function savePlan() {
      console.log('Saving plan changes');
      alert('Plan updated successfully!');
      closeEditPanel();
    }
    
    function viewPlanDetails(planType) {
      console.log('Viewing details for:', planType);
      alert('Opening detailed analytics for ' + planType + ' plan');
    }
    
    function addFeatureField() {
      const container = document.getElementById('featuresContainer');
      const newFeature = document.createElement('div');
      newFeature.className = 'feature-input-group';
      newFeature.innerHTML = `
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Feature description">
          <button class="btn btn-outline-danger" type="button" onclick="this.closest('.feature-input-group').remove()">
            <i class="bi bi-trash"></i>
          </button>
        </div>
      `;
      container.appendChild(newFeature);
    }
    </script>
  </body>
</html>
