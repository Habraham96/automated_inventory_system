<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sell - SalesPilot</title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    
    <!-- inject:css -->
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/styles.css">
    
    <!-- Include Sidebar Styles -->
    <?php include 'layouts/sidebar_styles.php'; ?>
    
    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="../asset/images/salespilot logo2.png" /> -->
      
    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="../asset/images/salespilot logo2.png" /> -->
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      
      <!-- Include Preloader -->
      <?php include 'layouts/preloader.php'; ?>
      
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          
        </div>
        
        
        <!-- Include Sidebar Content -->
        <?php include 'layouts/sidebar_content.php'; ?>
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  
                  <!-- Page Content -->
                  <div class="sell-container">
                    <div class="pos-layout">
                      <!-- Items Section -->
                      <div class="items-section">
                        <div class="items-container">
                          <!-- Filter Controls -->
                          <div class="filter-controls">
                            <div class="filter-left">
                              <div class="search-box">
                                <i class="bi bi-search search-icon"></i>
                                <input type="text" id="searchInput" placeholder="Search items by name..." autocomplete="off">
                                <i class="bi bi-x-circle clear-icon" id="clearSearch"></i>
                              </div>
                            </div>
                            
                            <div class="filter-right">
                              <div class="category-filter">
                                <select id="categoryFilter">
                                  <option value="">All Categories</option>
                                  <option value="laptops">Laptops</option>
                                  <option value="accessories">Accessories</option>
                                  <option value="storage">Storage Devices</option>
                                  <option value="peripherals">Peripherals</option>
                                  <option value="components">Components</option>
                                  <option value="cables">Cables & Adapters</option>
                                </select>
                              </div>
                              
                              <div class="filter-badge">
                                <i class="bi bi-box-seam"></i>
                                <span id="itemCount">20 Items</span>
                              </div>
                            </div>
                          </div>
                          
                          <div class="items-grid">
                          <!-- Item 1 -->
                          <div class="item-card" data-name="Laptop HP Pavilion" data-price="450000" data-stock="15" data-img="../Manager/assets/images/faces/face1.jpg">
                            <img src="../Manager/assets/images/faces/face1.jpg" alt="Product">
                            <div class="item-overlay">
                              <div class="item-name">Laptop HP Pavilion</div>
                              <div class="item-price">₦450,000</div>
                              <div class="item-stock">Stock: 15</div>
                            </div>
                          </div>
                          
                          <!-- Item 2 -->
                          <div class="item-card" data-name="Wireless Mouse" data-price="8500" data-stock="45" data-img="../Manager/assets/images/faces/face2.jpg">
                            <img src="../Manager/assets/images/faces/face2.jpg" alt="Product">
                            <div class="item-overlay">
                              <div class="item-name">Wireless Mouse</div>
                              <div class="item-price">₦8,500</div>
                              <div class="item-stock">Stock: 45</div>
                            </div>
                          </div>
                          
                          <!-- Item 3 -->
                          <div class="item-card" data-name="USB Flash Drive 64GB" data-price="5200" data-stock="120" data-img="../Manager/assets/images/faces/face3.jpg">
                            <img src="../Manager/assets/images/faces/face3.jpg" alt="Product">
                            <div class="item-overlay">
                              <div class="item-name">USB Flash Drive 64GB</div>
                              <div class="item-price">₦5,200</div>
                              <div class="item-stock">Stock: 120</div>
                            </div>
                          </div>
                          
                          <!-- Item 4 -->
                          <div class="item-card" data-name="Gaming Keyboard" data-price="25000" data-stock="30" data-img="../Manager/assets/images/faces/face4.jpg">
                            <img src="../Manager/assets/images/faces/face4.jpg" alt="Product">
                            <div class="item-overlay">
                              <div class="item-name">Gaming Keyboard</div>
                              <div class="item-price">₦25,000</div>
                              <div class="item-stock">Stock: 30</div>
                            </div>
                          </div>
                          
                          <!-- Item 5 -->
                          <div class="item-card" data-name="Monitor 24&quot; LED" data-price="85000" data-stock="22" data-img="../Manager/assets/images/faces/face5.jpg">
                            <img src="../Manager/assets/images/faces/face5.jpg" alt="Product">
                            <div class="item-overlay">
                              <div class="item-name">Monitor 24" LED</div>
                              <div class="item-price">₦85,000</div>
                              <div class="item-stock">Stock: 22</div>
                            </div>
                          </div>
                          
                          <!-- Item 6 -->
                          <div class="item-card" data-name="Headphones Bluetooth" data-price="15500" data-stock="60" data-img="../Manager/assets/images/faces/face6.jpg">
                            <img src="../Manager/assets/images/faces/face6.jpg" alt="Product">
                            <div class="item-overlay">
                              <div class="item-name">Headphones Bluetooth</div>
                              <div class="item-price">₦15,500</div>
                              <div class="item-stock">Stock: 60</div>
                            </div>
                          </div>
                          
                          <!-- Item 7 -->
                          <div class="item-card" data-name="External HDD 1TB" data-price="32000" data-stock="18" data-img="../Manager/assets/images/faces/face7.jpg">
                            <img src="../Manager/assets/images/faces/face7.jpg" alt="Product">
                            <div class="item-overlay">
                              <div class="item-name">External HDD 1TB</div>
                              <div class="item-price">₦32,000</div>
                              <div class="item-stock">Stock: 18</div>
                            </div>
                          </div>
                          
                          <!-- Item 8 -->
                          <div class="item-card" data-name="Webcam HD 1080p" data-price="22000" data-stock="25" data-img="../Manager/assets/images/faces/face8.jpg">
                            <img src="../Manager/assets/images/faces/face8.jpg" alt="Product">
                            <div class="item-overlay">
                              <div class="item-name">Webcam HD 1080p</div>
                              <div class="item-price">₦22,000</div>
                              <div class="item-stock">Stock: 25</div>
                            </div>
                          </div>
                          
                          <!-- Item 9 -->
                          <div class="item-card" data-name="Desktop PC Core i5" data-price="320000" data-stock="8" data-img="../Manager/assets/images/faces/face1.jpg">
                            <img src="../Manager/assets/images/faces/face1.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Desktop PC Core i5</div>
                            <div class="item-price">₦320,000</div>
                            <div class="item-stock">Stock: 8</div>
                          </div>
                            </div>
                          
                          <!-- Item 10 -->
                          <div class="item-card" data-name="Printer Canon" data-price="65000" data-stock="12" data-img="../Manager/assets/images/faces/face2.jpg">
                            <img src="../Manager/assets/images/faces/face2.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Printer Canon</div>
                            <div class="item-price">₦65,000</div>
                            <div class="item-stock">Stock: 12</div>
                          </div>
                          </div>
                          
                          <!-- Item 11 -->
                          <div class="item-card" data-name="Router WiFi Dual Band" data-price="18500" data-stock="35" data-img="../Manager/assets/images/faces/face3.jpg">
                            <img src="../Manager/assets/images/faces/face3.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Router WiFi Dual Band</div>
                            <div class="item-price">₦18,500</div>
                            <div class="item-stock">Stock: 35</div>
                          </div>
                          </div>
                          
                          <!-- Item 12 -->
                          <div class="item-card" data-name="Smart Watch" data-price="45000" data-stock="28" data-img="../Manager/assets/images/faces/face4.jpg">
                            <img src="../Manager/assets/images/faces/face4.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Smart Watch</div>
                            <div class="item-price">₦45,000</div>
                            <div class="item-stock">Stock: 28</div>
                          </div>
                            </div>
                          
                          <!-- Item 13 -->
                          <div class="item-card" data-name="Power Bank 20000mAh" data-price="12000" data-stock="75" data-img="../Manager/assets/images/faces/face5.jpg">
                            <img src="../Manager/assets/images/faces/face5.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Power Bank 20000mAh</div>
                            <div class="item-price">₦12,000</div>
                            <div class="item-stock">Stock: 75</div>
                          </div>
                            </div>
                          
                          <!-- Item 14 -->
                          <div class="item-card" data-name="Graphics Tablet" data-price="38000" data-stock="15" data-img="../Manager/assets/images/faces/face6.jpg">
                            <img src="../Manager/assets/images/faces/face6.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Graphics Tablet</div>
                            <div class="item-price">₦38,000</div>
                            <div class="item-stock">Stock: 15</div>
                          </div>
                            </div>
                          
                          <!-- Item 15 -->
                          <div class="item-card" data-name="SSD 500GB" data-price="42000" data-stock="40" data-img="../Manager/assets/images/faces/face7.jpg">
                            <img src="../Manager/assets/images/faces/face7.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">SSD 500GB</div>
                            <div class="item-price">₦42,000</div>
                            <div class="item-stock">Stock: 40</div>
                          </div>
                            </div>
                          
                          <!-- Item 16 -->
                          <div class="item-card" data-name="RAM 16GB DDR4" data-price="35000" data-stock="50" data-img="../Manager/assets/images/faces/face8.jpg">
                            <img src="../Manager/assets/images/faces/face8.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">RAM 16GB DDR4</div>
                            <div class="item-price">₦35,000</div>
                            <div class="item-stock">Stock: 50</div>
                          </div>
                            </div>
                          
                          <!-- Item 17 -->
                          <div class="item-card" data-name="Laptop Bag Premium" data-price="8000" data-stock="65" data-img="../Manager/assets/images/faces/face1.jpg">
                            <img src="../Manager/assets/images/faces/face1.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Laptop Bag Premium</div>
                            <div class="item-price">₦8,000</div>
                            <div class="item-stock">Stock: 65</div>
                          </div>
                            </div>
                          
                          <!-- Item 18 -->
                          <div class="item-card" data-name="USB-C Hub 7-in-1" data-price="15000" data-stock="42" data-img="../Manager/assets/images/faces/face2.jpg">
                            <img src="../Manager/assets/images/faces/face2.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">USB-C Hub 7-in-1</div>
                            <div class="item-price">₦15,000</div>
                            <div class="item-stock">Stock: 42</div>
                          </div>
                            </div>
                          
                          <!-- Item 19 -->
                          <div class="item-card" data-name="Cooling Pad Laptop" data-price="9500" data-stock="38" data-img="../Manager/assets/images/faces/face3.jpg">
                            <img src="../Manager/assets/images/faces/face3.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Cooling Pad Laptop</div>
                            <div class="item-price">₦9,500</div>
                            <div class="item-stock">Stock: 38</div>
                          </div>
                            </div>
                          
                          <!-- Item 20 -->
                          <div class="item-card" data-name="Cable HDMI 2.0" data-price="3500" data-stock="95" data-img="../Manager/assets/images/faces/face4.jpg">
                            <img src="../Manager/assets/images/faces/face4.jpg" alt="Product">
                            <div class="item-overlay">
                            <div class="item-name">Cable HDMI 2.0</div>
                            <div class="item-price">₦3,500</div>
                            <div class="item-stock">Stock: 95</div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                      <!-- Cart Panel -->
                      <div class="cart-panel">
                        <div class="cart-header">
                          <i class="bi bi-cart3"></i> Cart
                        </div>
                        
                        <!-- Customer Section -->
                        <div class="customer-section" id="customerSection">
                          <div class="customer-label">Customer</div>
                          <div class="customer-display">
                            <span class="customer-name" id="customerName">Walk-in Customer</span>
                            <button class="customer-change" id="addCustomerBtn">
                              <i class="bi bi-person-plus"></i> Change
                            </button>
                          </div>
                          
                          <!-- Customer Dropdown -->
                          <div class="customer-dropdown" id="customerDropdown">
                            <div class="customer-dropdown-search">
                              <input type="text" id="customerSearchInput" placeholder="Search customers..." autocomplete="off">
                            </div>
                            <div class="customer-dropdown-list" id="customerDropdownList">
                              <!-- Customers will be loaded here dynamically -->
                            </div>
                          </div>
                        </div>
                        
                        <div class="cart-items">
                          <div class="cart-empty">
                            <i class="bi bi-cart-x cart-empty-icon"></i>
                            <p>Your cart is empty</p>
                            <small>Add items to get started</small>
                          </div>
                        </div>
                        <div class="cart-summary">
                          <!-- Add Discount Button -->
                          <button class="cart-action-btn" id="addDiscountBtn">
                            <i class="bi bi-percent"></i> Add Discount
                          </button>
                          
                          <div class="cart-total">
                            <span>Total:</span>
                            <span>₦0.00</span>
                          </div>
                          
                          <!-- Cart Actions -->
                          <div class="cart-actions">
                            <button class="cart-action-btn" id="saveCartBtn">
                              <i class="bi bi-bookmark"></i> Save
                            </button>
                          </div>
                          
                          <button class="checkout-btn" id="checkoutBtn">
                            <i class="bi bi-check-circle"></i> Checkout
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Page Content -->
                  
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          
          <!-- Add Item Modal -->
          <div class="modal-overlay" id="itemModal">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="modalTitle"></h3>
                <button class="modal-close" id="closeModal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="item-preview" id="itemPreview">
                  <img src="" alt="Item" id="modalItemImg">
                  <div class="item-preview-info">
                    <div class="item-preview-name" id="modalItemName"></div>
                    <div class="item-preview-price" id="modalItemPrice"></div>
                    <div class="item-preview-stock" id="modalItemStock"></div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="form-label">Quantity</label>
                  <div class="quantity-control">
                    <button class="quantity-btn" id="decreaseQty">-</button>
                    <input type="number" class="form-control quantity-input" id="itemQuantity" value="1" min="1">
                    <button class="quantity-btn" id="increaseQty">+</button>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="form-label">Note (Optional)</label>
                  <textarea class="form-control" id="itemNote" rows="3" placeholder="Add any special instructions..."></textarea>
                </div>
              </div>
              <button class="add-to-cart-btn" id="addToCartBtn">
                <i class="bi bi-cart-plus"></i> Add to Cart
              </button>
            </div>
          </div>
          
          <!-- Customer Selection Modal -->
          <div class="modal-overlay" id="customerModal">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Select Customer</h3>
                <button class="modal-close" id="closeCustomerModal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="customer-list" id="customerList">
                  <!-- New Customer Option -->
                  <div class="customer-list-item new-customer" data-customer-id="new">
                    <div class="customer-info">
                      <div class="customer-item-name">
                        <i class="bi bi-plus-circle"></i> New Customer
                      </div>
                      <div class="customer-item-phone">Add a new customer</div>
                    </div>
                    <i class="bi bi-chevron-right customer-select-icon"></i>
                  </div>
                  
                  <!-- Walk-in Customer -->
                  <div class="customer-list-item" data-customer-id="walk-in" data-customer-name="Walk-in Customer">
                    <div class="customer-info">
                      <div class="customer-item-name">Walk-in Customer</div>
                      <div class="customer-item-phone">Anonymous customer</div>
                    </div>
                    <i class="bi bi-check-circle customer-select-icon"></i>
                  </div>
                  
                  <!-- Sample Customers (will be loaded from localStorage/database) -->
                  <div class="customer-list-item" data-customer-id="1" data-customer-name="John Doe" data-customer-phone="08012345678">
                    <div class="customer-info">
                      <div class="customer-item-name">John Doe</div>
                      <div class="customer-item-phone">08012345678</div>
                    </div>
                    <i class="bi bi-check-circle customer-select-icon"></i>
                  </div>
                  
                  <div class="customer-list-item" data-customer-id="2" data-customer-name="Jane Smith" data-customer-phone="08087654321">
                    <div class="customer-info">
                      <div class="customer-item-name">Jane Smith</div>
                      <div class="customer-item-phone">08087654321</div>
                    </div>
                    <i class="bi bi-check-circle customer-select-icon"></i>
                  </div>
                  
                  <div class="customer-list-item" data-customer-id="3" data-customer-name="David Johnson" data-customer-phone="08098765432">
                    <div class="customer-info">
                      <div class="customer-item-name">David Johnson</div>
                      <div class="customer-item-phone">08098765432</div>
                    </div>
                    <i class="bi bi-check-circle customer-select-icon"></i>
                  </div>
                </div>
                
                <!-- New Customer Form -->
                <div class="new-customer-form" id="newCustomerForm">
                  <h4>Add New Customer</h4>
                  <div class="form-group">
                    <label class="form-label">Customer Name *</label>
                    <input type="text" class="form-control" id="newCustomerName" placeholder="Enter customer name" required>
                  </div>
                  <div class="form-row">
                    <div class="form-group">
                      <label class="form-label">Phone Number</label>
                      <input type="tel" class="form-control" id="newCustomerPhone" placeholder="080XXXXXXXX">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" id="newCustomerEmail" placeholder="email@example.com">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" id="newCustomerAddress" rows="2" placeholder="Enter customer address"></textarea>
                  </div>
                  <button class="select-customer-btn" id="saveNewCustomerBtn">
                    <i class="bi bi-person-plus"></i> Add & Select Customer
                  </button>
                </div>
              </div>
              <button class="select-customer-btn" id="selectCustomerBtn">
                <i class="bi bi-check-circle"></i> Select Customer
              </button>
            </div>
          </div>
          
          <!-- Save Cart Modal -->
          <div class="modal-overlay" id="saveCartModal">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Save Cart</h3>
                <button class="modal-close" id="closeSaveCartModal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="saved-cart-warning">
                  <i class="bi bi-info-circle"></i> Save this cart to retrieve it later from the Saved Carts page.
                </div>
                
                <div class="form-group">
                  <label class="form-label">Cart Name *</label>
                  <input type="text" class="form-control" id="savedCartName" placeholder="e.g., John's Order, Pending Sale #123" required>
                </div>
                
                <div class="form-group">
                  <label class="form-label">Note (Optional)</label>
                  <textarea class="form-control" id="savedCartNote" rows="3" placeholder="Add any notes about this cart..."></textarea>
                </div>
                
                <div class="saved-carts-list" id="savedCartsList">
                  <small>Your saved carts will appear here</small>
                </div>
              </div>
              <button class="select-customer-btn" id="confirmSaveCartBtn">
                <i class="bi bi-bookmark-fill"></i> Save Cart
              </button>
            </div>
          </div>
          
          <!-- Receipt Modal -->
          <div class="receipt-modal" id="receiptModal">
            <div class="receipt-container">
              <div class="receipt-header">
                <h2><i class="bi bi-receipt"></i> Receipt</h2>
                <div class="business-name">SalesPilot Inventory</div>
                <div class="receipt-date" id="receiptDate"></div>
              </div>
              
              <div class="receipt-body">
                <div class="receipt-info">
                  <div class="receipt-info-row">
                    <span class="receipt-info-label">Receipt No:</span>
                    <span class="receipt-info-value" id="receiptNumber"></span>
                  </div>
                  <div class="receipt-info-row">
                    <span class="receipt-info-label">Customer:</span>
                    <span class="receipt-info-value" id="receiptCustomer"></span>
                  </div>
                  <div class="receipt-info-row">
                    <span class="receipt-info-label">Served By:</span>
                    <span class="receipt-info-value">Staff Name</span>
                  </div>
                </div>
                
                <div class="receipt-items">
                  <div class="receipt-items-header">Items Purchased</div>
                  <div id="receiptItemsList"></div>
                </div>
                
                <div class="receipt-totals">
                  <div class="receipt-total-row">
                    <span>Subtotal:</span>
                    <span id="receiptSubtotal">₦0.00</span>
                  </div>
                  <div class="receipt-total-row">
                    <span>Tax (0%):</span>
                    <span>₦0.00</span>
                  </div>
                  <div class="receipt-total-row grand-total">
                    <span>Total:</span>
                    <span id="receiptTotal">₦0.00</span>
                  </div>
                </div>
              </div>
              
              <div class="receipt-footer">
                <div class="receipt-actions">
                  <button class="receipt-btn receipt-btn-print" id="printReceiptBtn">
                    <i class="bi bi-printer"></i> Print
                  </button>
                  <button class="receipt-btn receipt-btn-close" id="closeReceiptBtn">
                    <i class="menu-icon bi bi-cart-fill"></i> Start New Sale
                  </button>
                </div>
                <div class="receipt-thank-you">
                  <i class="bi bi-heart-fill"></i> Thank you for your purchase!
                </div>
              </div>
            </div>
          </div>
          
          <!-- Receipt Modal -->
          <div class="receipt-modal" id="receiptModal">
            <div class="receipt-container">
              <div class="receipt-header">
                <h2><i class="bi bi-receipt"></i> Receipt</h2>
                <div class="business-name">SalesPilot Inventory</div>
                <div class="receipt-date" id="receiptDate"></div>
              </div>
              
              <div class="receipt-body">
                <div class="receipt-info">
                  <div class="receipt-info-row">
                    <span class="receipt-info-label">Receipt No:</span>
                    <span class="receipt-info-value" id="receiptNumber"></span>
                  </div>
                  <div class="receipt-info-row">
                    <span class="receipt-info-label">Customer:</span>
                    <span class="receipt-info-value" id="receiptCustomer"></span>
                  </div>
                  <div class="receipt-info-row">
                    <span class="receipt-info-label">Served By:</span>
                    <span class="receipt-info-value">Staff Name</span>
                  </div>
                </div>
                
                <div class="receipt-items">
                  <div class="receipt-items-header">Items Purchased</div>
                  <div id="receiptItemsList"></div>
                </div>
                
                <div class="receipt-totals">
                  <div class="receipt-total-row">
                    <span>Subtotal:</span>
                    <span id="receiptSubtotal">₦0.00</span>
                  </div>
                  <div class="receipt-total-row">
                    <span>Tax (0%):</span>
                    <span>₦0.00</span>
                  </div>
                  <div class="receipt-total-row grand-total">
                    <span>Total:</span>
                    <span id="receiptTotal">₦0.00</span>
                  </div>
                </div>
              </div>
              
              <div class="receipt-footer">
                <div class="receipt-actions">
                  <button class="receipt-btn receipt-btn-print" id="printReceiptBtn">
                    <i class="bi bi-printer"></i> Print
                  </button>
                  <button class="receipt-btn receipt-btn-close" id="closeReceiptBtn">
                    <i class="bi bi-x-circle"></i> Close
                  </button>
                </div>
                <div class="receipt-thank-you">
                  <i class="bi bi-heart-fill"></i> Thank you for your purchase!
                </div>
              </div>
            </div>
          </div>
          
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">SalesPilot © 2025</span>
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
    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap JS (needed for dropdown functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- endinject -->
    
    <!-- Plugin js for this page -->
    <script src="../Manager/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../Manager/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    
    <!-- inject:js -->
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    <!-- endinject -->
    
    <!-- Include Sidebar Scripts -->
    <?php include 'layouts/sidebar_scripts.php'; ?>
    
    <!-- Dropdown and Sidebar Menu Script -->
    <script>
    // Initialize after everything is loaded
    window.addEventListener('load', function() {
      console.log('=== Page fully loaded ===');
      console.log('Bootstrap available:', typeof bootstrap !== 'undefined');
      
      // Wait a bit more to ensure all scripts are initialized
      setTimeout(function() {
        console.log('=== Initializing dropdown ===');
        
        var userDropdown = document.getElementById('UserDropdown');
        var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
        
        console.log('UserDropdown element:', userDropdown);
        console.log('Dropdown menu element:', dropdownMenu);
        
        if (!userDropdown || !dropdownMenu) {
          console.error('Dropdown elements not found!');
          return;
        }
        
        // Initialize Bootstrap Dropdown
        if (typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
          try {
            var dropdown = new bootstrap.Dropdown(userDropdown, {
              autoClose: true,
              boundary: 'viewport'
            });
            console.log('Bootstrap Dropdown initialized:', dropdown);
            
            // Test click
            userDropdown.addEventListener('click', function(e) {
              console.log('Dropdown clicked!');
              console.log('Menu has show class:', dropdownMenu.classList.contains('show'));
            });
          } catch (error) {
            console.error('Error initializing dropdown:', error);
          }
        } else {
          console.error('Bootstrap not available!');
        }
        
        // Handle sidebar collapse menus
        var sidebar = document.getElementById('sidebar');
        if (sidebar) {
          sidebar.querySelectorAll('a.nav-link[data-bs-toggle="collapse"]').forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
              e.preventDefault();
              
              var targetSelector = this.getAttribute('href');
              if (!targetSelector || !targetSelector.startsWith('#')) return;
              
              var target = document.querySelector(targetSelector);
              if (!target) return;
              
              // Close all other open submenus
              sidebar.querySelectorAll('div.collapse.show').forEach(function (openMenu) {
                if (openMenu !== target) {
                  if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                    var collapseInstance = bootstrap.Collapse.getOrCreateInstance(openMenu);
                    collapseInstance.hide();
                  }
                }
              });
              
              // Toggle the clicked menu
              if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                var targetCollapse = bootstrap.Collapse.getOrCreateInstance(target);
                targetCollapse.toggle();
              }
            });
          });
        }
        
      }, 500); // Wait 500ms after page load
    });
    
    // Search and Filter Functionality
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('searchInput');
      const clearSearch = document.getElementById('clearSearch');
      const categoryFilter = document.getElementById('categoryFilter');
      const itemCards = document.querySelectorAll('.item-card');
      const itemCount = document.getElementById('itemCount');
      
      // Cart array to store items
      let cartItems = [];
      let selectedCustomer = {
        id: null,
        name: 'Walk-in Customer'
      };
      
      // Customer Dropdown Elements
      const customerDropdown = document.getElementById('customerDropdown');
      const customerSearchInput = document.getElementById('customerSearchInput');
      const customerDropdownList = document.getElementById('customerDropdownList');
      
      // Sample customers - in production, load from database
      let allCustomers = [
        { id: 'walk-in', name: 'Walk-in Customer', phone: '', type: 'default' },
        { id: '1', name: 'John Doe', phone: '08012345678', type: 'regular' },
        { id: '2', name: 'Jane Smith', phone: '08087654321', type: 'regular' },
        { id: '3', name: 'David Johnson', phone: '08098765432', type: 'regular' },
        { id: '4', name: 'Sarah Williams', phone: '08011223344', type: 'regular' },
        { id: '5', name: 'Michael Brown', phone: '08099887766', type: 'regular' }
      ];
      
      // Load saved customers from localStorage
      const savedCustomers = JSON.parse(localStorage.getItem('customers') || '[]');
      allCustomers = allCustomers.concat(savedCustomers.map(function(c) {
        return { id: c.id, name: c.name, phone: c.phone || '', type: 'regular' };
      }));
      
      // Add Customer Button - Toggle Dropdown
      const addCustomerBtn = document.getElementById('addCustomerBtn');
      addCustomerBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        customerDropdown.classList.toggle('active');
        if (customerDropdown.classList.contains('active')) {
          customerSearchInput.value = '';
          renderCustomerDropdown(allCustomers);
          customerSearchInput.focus();
        }
      });
      
      // Close dropdown when clicking outside
      document.addEventListener('click', function(e) {
        if (!document.getElementById('customerSection').contains(e.target)) {
          customerDropdown.classList.remove('active');
        }
      });
      
      // Search customers
      customerSearchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const filtered = allCustomers.filter(function(customer) {
          return customer.name.toLowerCase().includes(searchTerm) || 
                 customer.phone.includes(searchTerm);
        });
        renderCustomerDropdown(filtered);
      });
      
      // Render customer dropdown list
      function renderCustomerDropdown(customers) {
        customerDropdownList.innerHTML = '';
        
        // Add "New Customer" option at the top
        const newCustomerItem = document.createElement('div');
        newCustomerItem.className = 'customer-dropdown-item new-customer';
        newCustomerItem.innerHTML = `
          <div class="customer-dropdown-icon"><i class="bi bi-plus"></i></div>
          <div class="customer-dropdown-info">
            <div class="customer-dropdown-name">Add New Customer</div>
            <div class="customer-dropdown-phone">Create a new customer</div>
          </div>
        `;
        newCustomerItem.addEventListener('click', function() {
          customerDropdown.classList.remove('active');
          customerModal.classList.add('active');
          newCustomerForm.classList.add('active');
          document.getElementById('customerList').style.display = 'none';
          selectCustomerBtn.style.display = 'none';
          document.getElementById('newCustomerName').focus();
        });
        customerDropdownList.appendChild(newCustomerItem);
        
        // Add customers
        customers.forEach(function(customer) {
          const isSelected = selectedCustomer.id === customer.id || 
                           (selectedCustomer.id === null && customer.id === 'walk-in');
          
          const item = document.createElement('div');
          item.className = 'customer-dropdown-item' + (isSelected ? ' selected' : '');
          
          const initials = customer.name.split(' ').map(function(n) { return n[0]; }).join('').toUpperCase().substring(0, 2);
          
          item.innerHTML = `
            <div class="customer-dropdown-icon">${initials}</div>
            <div class="customer-dropdown-info">
              <div class="customer-dropdown-name">${customer.name}</div>
              ${customer.phone ? '<div class="customer-dropdown-phone">' + customer.phone + '</div>' : '<div class="customer-dropdown-phone">No phone</div>'}
            </div>
            ${isSelected ? '<i class="bi bi-check-circle customer-dropdown-check"></i>' : ''}
          `;
          
          item.addEventListener('click', function() {
            selectCustomer(customer);
          });
          
          customerDropdownList.appendChild(item);
        });
      }
      
      // Select customer from dropdown
      function selectCustomer(customer) {
        selectedCustomer = {
          id: customer.id === 'walk-in' ? null : customer.id,
          name: customer.name,
          phone: customer.phone
        };
        document.getElementById('customerName').textContent = selectedCustomer.name;
        customerDropdown.classList.remove('active');
      }
      
      // Customer Modal Elements (for adding new customers)
      const customerModal = document.getElementById('customerModal');
      const closeCustomerModal = document.getElementById('closeCustomerModal');
      const newCustomerForm = document.getElementById('newCustomerForm');
      const saveNewCustomerBtn = document.getElementById('saveNewCustomerBtn');
      
      // Close Customer Modal
      closeCustomerModal.addEventListener('click', function() {
        customerModal.classList.remove('active');
        newCustomerForm.classList.remove('active');
      });
      
      customerModal.addEventListener('click', function(e) {
        if (e.target === customerModal) {
          customerModal.classList.remove('active');
          newCustomerForm.classList.remove('active');
        }
      });
      
      // Save New Customer Button
      saveNewCustomerBtn.addEventListener('click', function() {
        const name = document.getElementById('newCustomerName').value.trim();
        const phone = document.getElementById('newCustomerPhone').value.trim();
        const email = document.getElementById('newCustomerEmail').value.trim();
        const address = document.getElementById('newCustomerAddress').value.trim();
        
        if (!name) {
          alert('Please enter customer name');
          return;
        }
        
        // Create new customer
        const newCustomer = {
          id: 'cust_' + Date.now(),
          name: name,
          phone: phone,
          email: email,
          address: address,
          createdAt: new Date().toISOString()
        };
        
        // Save to localStorage
        const customers = JSON.parse(localStorage.getItem('customers') || '[]');
        customers.push(newCustomer);
        localStorage.setItem('customers', JSON.stringify(customers));
        
        // Add to dropdown list
        allCustomers.push({
          id: newCustomer.id,
          name: newCustomer.name,
          phone: newCustomer.phone || '',
          type: 'regular'
        });
        
        // Set as selected customer
        selectedCustomer = {
          id: newCustomer.id,
          name: newCustomer.name,
          phone: newCustomer.phone
        };
        document.getElementById('customerName').textContent = selectedCustomer.name;
        
        // Reset form and close modal
        document.getElementById('newCustomerName').value = '';
        document.getElementById('newCustomerPhone').value = '';
        document.getElementById('newCustomerEmail').value = '';
        document.getElementById('newCustomerAddress').value = '';
        customerModal.classList.remove('active');
        newCustomerForm.classList.remove('active');
        
        alert('Customer added successfully!');
      });
      
      // Save Cart Modal Elements
      const saveCartModal = document.getElementById('saveCartModal');
      const closeSaveCartModal = document.getElementById('closeSaveCartModal');
      const confirmSaveCartBtn = document.getElementById('confirmSaveCartBtn');
      
      // Save Cart Button - Open Modal
      const saveCartBtn = document.getElementById('saveCartBtn');
      saveCartBtn.addEventListener('click', function() {
        if (cartItems.length === 0) {
          alert('Cart is empty. Add items before saving.');
          return;
        }
        
        saveCartModal.classList.add('active');
        document.getElementById('savedCartName').value = '';
        document.getElementById('savedCartNote').value = '';
        
        // Load and display existing saved carts
        loadSavedCartsList();
      });
      
      // Close Save Cart Modal
      closeSaveCartModal.addEventListener('click', function() {
        saveCartModal.classList.remove('active');
      });
      
      saveCartModal.addEventListener('click', function(e) {
        if (e.target === saveCartModal) {
          saveCartModal.classList.remove('active');
        }
      });
      
      // Confirm Save Cart
      confirmSaveCartBtn.addEventListener('click', function() {
        const cartName = document.getElementById('savedCartName').value.trim();
        const cartNote = document.getElementById('savedCartNote').value.trim();
        
        if (!cartName) {
          alert('Please enter a name for the cart');
          return;
        }
        
        const savedCart = {
          id: 'cart_' + Date.now(),
          name: cartName,
          note: cartNote,
          customer: selectedCustomer,
          items: [...cartItems],
          total: cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0),
          savedAt: new Date().toISOString()
        };
        
        // Save to localStorage
        const savedCarts = JSON.parse(localStorage.getItem('savedCarts') || '[]');
        savedCarts.push(savedCart);
        localStorage.setItem('savedCarts', JSON.stringify(savedCarts));
        
        alert('Cart saved successfully!');
        
        // Clear current cart
        cartItems = [];
        selectedCustomer = { id: null, name: 'Walk-in Customer' };
        document.getElementById('customerName').textContent = 'Walk-in Customer';
        updateCartUI();
        
        saveCartModal.classList.remove('active');
      });
      
      // Load Saved Carts List
      function loadSavedCartsList() {
        const savedCartsList = document.getElementById('savedCartsList');
        const savedCarts = JSON.parse(localStorage.getItem('savedCarts') || '[]');
        
        if (savedCarts.length === 0) {
          savedCartsList.innerHTML = '<small>No saved carts yet</small>';
          return;
        }
        
        savedCartsList.innerHTML = '';
        savedCarts.slice(-5).reverse().forEach(function(cart) {
          const date = new Date(cart.savedAt).toLocaleString();
          const cartItem = document.createElement('div');
          cartItem.className = 'saved-cart-item';
          cartItem.innerHTML = `
            <div class="saved-cart-item-name">${cart.name}</div>
            <div class="saved-cart-item-details">${cart.customer.name} • ${cart.items.length} items • ₦${cart.total.toLocaleString()}</div>
            <div class="saved-cart-item-date">${date}</div>
          `;
          savedCartsList.appendChild(cartItem);
        });
      }
      
      // Checkout Button
      const checkoutBtn = document.getElementById('checkoutBtn');
      const receiptModal = document.getElementById('receiptModal');
      const closeReceiptBtn = document.getElementById('closeReceiptBtn');
      const printReceiptBtn = document.getElementById('printReceiptBtn');
      
      checkoutBtn.addEventListener('click', function() {
        if (cartItems.length === 0) {
          alert('Cart is empty. Add items before checkout.');
          return;
        }
        
        // Generate receipt
        generateReceipt();
        
        // Show receipt modal
        receiptModal.classList.add('active');
        
        // Here you would typically send to server to save the sale
      });
      
      // Generate Receipt
      function generateReceipt() {
        const receiptNumber = 'RCP' + Date.now();
        const currentDate = new Date();
        const formattedDate = currentDate.toLocaleString('en-US', {
          year: 'numeric',
          month: 'short',
          day: 'numeric',
          hour: '2-digit',
          minute: '2-digit'
        });
        
        // Set receipt header info
        document.getElementById('receiptDate').textContent = formattedDate;
        document.getElementById('receiptNumber').textContent = receiptNumber;
        document.getElementById('receiptCustomer').textContent = selectedCustomer.name;
        
        // Generate items list
        const receiptItemsList = document.getElementById('receiptItemsList');
        receiptItemsList.innerHTML = '';
        
        let subtotal = 0;
        cartItems.forEach(function(item) {
          const itemTotal = item.price * item.quantity;
          subtotal += itemTotal;
          
          const itemHTML = `
            <div class="receipt-item">
              <div class="receipt-item-name">${item.name}</div>
              <div class="receipt-item-details">
                <span>${item.quantity} × ₦${item.price.toLocaleString()}</span>
                <span>₦${itemTotal.toLocaleString()}</span>
              </div>
              ${item.note ? '<div class="receipt-item-note">Note: ' + item.note + '</div>' : ''}
            </div>
          `;
          receiptItemsList.insertAdjacentHTML('beforeend', itemHTML);
        });
        
        // Set totals
        document.getElementById('receiptSubtotal').textContent = '₦' + subtotal.toLocaleString();
        document.getElementById('receiptTotal').textContent = '₦' + subtotal.toLocaleString();
      }
      
      // Close Receipt Modal
      closeReceiptBtn.addEventListener('click', function() {
        receiptModal.classList.remove('active');
        
        // Clear cart after closing receipt
        cartItems = [];
        selectedCustomer = { id: null, name: 'Walk-in Customer' };
        document.getElementById('customerName').textContent = 'Walk-in Customer';
        updateCartUI();
      });
      
      // Close receipt when clicking outside
      receiptModal.addEventListener('click', function(e) {
        if (e.target === receiptModal) {
          receiptModal.classList.remove('active');
          
          // Clear cart
          cartItems = [];
          selectedCustomer = { id: null, name: 'Walk-in Customer' };
          document.getElementById('customerName').textContent = 'Walk-in Customer';
          updateCartUI();
        }
      });
      
      // Print Receipt
      printReceiptBtn.addEventListener('click', function() {
        window.print();
      });
      
      // Search functionality
      searchInput.addEventListener('input', function() {
        filterItems();
      });
      
      // Clear search
      clearSearch.addEventListener('click', function() {
        searchInput.value = '';
        filterItems();
      });
      
      // Category filter
      categoryFilter.addEventListener('change', function() {
        filterItems();
      });
      
      function filterItems() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();
        let visibleCount = 0;
        
        itemCards.forEach(function(card) {
          const itemName = card.querySelector('.item-name').textContent.toLowerCase();
          const matchesSearch = itemName.includes(searchTerm);
          const matchesCategory = selectedCategory === '' || itemName.includes(selectedCategory);
          
          if (matchesSearch && matchesCategory) {
            card.style.display = 'block';
            visibleCount++;
          } else {
            card.style.display = 'none';
          }
        });
        
        // Update count
        itemCount.textContent = visibleCount + ' Item' + (visibleCount !== 1 ? 's' : '');
      }
      
      // Modal functionality
      const modal = document.getElementById('itemModal');
      const closeModal = document.getElementById('closeModal');
      const decreaseQty = document.getElementById('decreaseQty');
      const increaseQty = document.getElementById('increaseQty');
      const itemQuantity = document.getElementById('itemQuantity');
      const addToCartBtn = document.getElementById('addToCartBtn');
      const itemNote = document.getElementById('itemNote');
      
      let currentItem = null;
      
      // Open modal when item card is clicked
      itemCards.forEach(function(card) {
        card.addEventListener('click', function() {
          currentItem = {
            name: this.dataset.name,
            price: parseFloat(this.dataset.price),
            stock: parseInt(this.dataset.stock),
            img: this.dataset.img
          };
          
          // Populate modal
          document.getElementById('modalTitle').textContent = currentItem.name;
          document.getElementById('modalItemName').textContent = currentItem.name;
          document.getElementById('modalItemPrice').textContent = '₦' + currentItem.price.toLocaleString();
          document.getElementById('modalItemStock').textContent = 'Available: ' + currentItem.stock + ' units';
          document.getElementById('modalItemImg').src = currentItem.img;
          
          // Reset form
          itemQuantity.value = 1;
          itemQuantity.max = currentItem.stock;
          itemNote.value = '';
          
          // Show modal
          modal.classList.add('active');
        });
      });
      
      // Close modal
      closeModal.addEventListener('click', function() {
        modal.classList.remove('active');
      });
      
      // Close modal when clicking outside
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          modal.classList.remove('active');
        }
      });
      
      // Quantity controls
      decreaseQty.addEventListener('click', function() {
        let qty = parseInt(itemQuantity.value);
        if (qty > 1) {
          itemQuantity.value = qty - 1;
        }
      });
      
      increaseQty.addEventListener('click', function() {
        let qty = parseInt(itemQuantity.value);
        let max = parseInt(itemQuantity.max);
        if (qty < max) {
          itemQuantity.value = qty + 1;
        }
      });
      
      // Add to cart
      addToCartBtn.addEventListener('click', function() {
        if (!currentItem) return;
        
        const quantity = parseInt(itemQuantity.value);
        const note = itemNote.value.trim();
        
        // Check if item already exists in cart
        const existingIndex = cartItems.findIndex(item => item.name === currentItem.name);
        
        if (existingIndex >= 0) {
          // Update quantity
          cartItems[existingIndex].quantity += quantity;
          if (note) {
            cartItems[existingIndex].note = note;
          }
        } else {
          // Add new item
          cartItems.push({
            name: currentItem.name,
            price: currentItem.price,
            quantity: quantity,
            note: note,
            img: currentItem.img
          });
        }
        
        // Update cart UI
        updateCartUI();
        
        // Close modal
        modal.classList.remove('active');
      });
      
      // Update cart UI
      function updateCartUI() {
        const cartItemsContainer = document.querySelector('.cart-items');
        const cartTotalElement = document.querySelector('.cart-total span:last-child');
        
        // Clear existing items
        cartItemsContainer.innerHTML = '';
        
        if (cartItems.length === 0) {
          cartItemsContainer.innerHTML = `
            <div class="cart-empty">
              <i class="bi bi-cart-x cart-empty-icon"></i>
              <p>Your cart is empty</p>
              <small>Add items to get started</small>
            </div>
          `;
          cartTotalElement.textContent = '₦0.00';
          return;
        }
        
        // Add cart items
        let total = 0;
        cartItems.forEach(function(item, index) {
          const itemTotal = item.price * item.quantity;
          total += itemTotal;
          
          const cartItemHTML = `
            <div class="cart-item">
              <div class="cart-item-info">
                <div class="cart-item-name">${item.name}</div>
                <div class="cart-item-details">Qty: ${item.quantity} × ₦${item.price.toLocaleString()}</div>
                ${item.note ? '<div class="cart-item-details">Note: ' + item.note + '</div>' : ''}
              </div>
              <div class="cart-item-price">₦${itemTotal.toLocaleString()}</div>
              <button class="cart-item-remove" data-index="${index}">×</button>
            </div>
          `;
          cartItemsContainer.insertAdjacentHTML('beforeend', cartItemHTML);
        });
        
        // Update total
        cartTotalElement.textContent = '₦' + total.toLocaleString();
        
        // Add remove functionality
        document.querySelectorAll('.cart-item-remove').forEach(function(btn) {
          btn.addEventListener('click', function() {
            const index = parseInt(this.dataset.index);
            cartItems.splice(index, 1);
            updateCartUI();
          });
        });
      }
    });
    </script>
    
  </body>
</html>
