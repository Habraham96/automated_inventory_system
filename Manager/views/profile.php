<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile - SalesPilot</title>    <?php include '../../include/responsive.php'; ?>    <!-- plugins:css -->
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
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <?php include '../layouts/sidebar_styles.php'; ?>
    
    <!-- Custom Filter Styles -->
    
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- Sidebar include -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- profile content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                      
                    </div>
                    
                    <div class="d-sm-flex justify-content-between align-items-start mb-3">
                      <div>
                        <h4 class="card-title mb-0"style="color:#007bff;font-weight:600;">Personal Profile</h4>
                        <p class="card-description">Update your personal information</p>
                      </div>
                    </div>

                    <form class="forms-sample">
                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="firstName" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="lastName" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="lastName" placeholder="Enter last name">
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="otherName" class="form-label">Other Name</label>
                          <input type="text" class="form-control" id="otherName" placeholder="Enter other name(s)">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="gender" class="form-label">Gender</label>
                          <select class="form-select" id="gender">
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="phoneNumber" class="form-label">Phone Number</label>
                          <input type="tel" class="form-control" id="phoneNumber" placeholder="Enter phone number">
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="dateOfBirth" class="form-label">Date of Birth</label>
                          <input type="date" class="form-control" id="dateOfBirth">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="profilePhoto" class="form-label">Profile Photo</label>
                          <input class="form-control" type="file" id="profilePhoto" accept="image/*">
                          <small class="text-muted d-block mt-1">Max size 2MB. JPG or PNG.</small>
                        </div>
                        <div class="col-md-6 mb-3 d-flex align-items-end">
                          <div class="d-flex align-items-center gap-3" style="width:100%;">
                            <div>
                              <span class="d-block mb-1">Preview</span>
                              <img id="profilePhotoPreview" src="../assets/images/faces/face8.jpg" alt="Profile preview" style="width:80px; height:80px; border-radius:8px; object-fit:cover; border:1px solid #ddd;">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                      </div>
                    </form><br>
                    



                    </div>  
           <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
        </div>
        <!-- content-wrapper ends -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      
     
      </div>
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
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
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/template.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    
    <!-- Include Sidebar Scripts -->
    <?php include '../layouts/sidebar_scripts.php'; ?>

    <script>
      // Profile photo preview
      document.getElementById('profilePhoto')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function(event) {
            document.getElementById('profilePhotoPreview').src = event.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    </script>
  </body>
</html>
                                  