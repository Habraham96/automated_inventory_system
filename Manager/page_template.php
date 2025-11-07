<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SalesPilot - Page Template</title>
    
    <!-- External CSS Dependencies -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    
    <!-- Include Sidebar Styles -->
    <?php include 'layouts/sidebar_styles.php'; ?>
    
    <!-- Additional styles to fix main panel positioning -->
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
        
        /* Content wrapper padding */
        .content-wrapper {
            padding: 2rem !important;
        }
    </style>
</head>

<body class="with-welcome-text">
    
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            
            <!-- Include Sidebar Content -->
            <?php include 'layouts/sidebar_content.php'; ?>
            
            <!-- Main Content Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    
                    <!-- Your page content goes here -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Page Content</h4>
                                    <p class="card-description">
                                        This is where your main page content will go.
                                        The sidebar is now included as a reusable component.
                                    </p>
                                    
                                    <!-- Debug buttons for testing -->
                                    <div class="mt-3">
                                        <button class="btn btn-primary me-2" onclick="window.testSidebarToggle()">Test Sidebar Toggle</button>
                                        <button class="btn btn-secondary" onclick="console.log('Sidebar button:', document.getElementById('sidebarToggle'))">Check Button</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            Premium <a href="#" target="_blank">SalesPilot</a> from Sales Management.
                        </span>
                        <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">
                            Copyright © 2025. All rights reserved.
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- External JavaScript -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    
    <!-- Include Sidebar Scripts -->
    <?php include 'layouts/sidebar_scripts.php'; ?>
    
</body>
</html>