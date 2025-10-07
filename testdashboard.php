<?php
require "include/config.php"; // Include the database configuration file

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Fetch logged-in user's passport
$user_id = $_SESSION['user_id'];
$user_passport = 'default.jpg'; // fallback image
$user_query = "SELECT passport FROM users WHERE id = '$user_id' LIMIT 1";
$user_result = mysqli_query($conn, $user_query);
if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user_row = mysqli_fetch_assoc($user_result);
    if (!empty($user_row['passport'])) {
        $user_passport = $user_row['passport'];
    }
}

// Function to generate order_id
function generateOrderId($conn) {
    $month = strtolower(date('M'));
    // Count unique order IDs for the current month to avoid skipping numbers
    $query = "SELECT COUNT(DISTINCT order_id) AS count FROM sales WHERE order_id LIKE 'DME/$month/%'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'] + 1;
    $formatted_count = str_pad($count, 3, '0', STR_PAD_LEFT);
    return "DME/$month/$formatted_count";
}

$order_id = generateOrderId($conn); // Generate the order_id

if (isset($_GET['fetch_customer']) && isset($_GET['phone_number'])) {
    $phone_number = mysqli_real_escape_string($conn, $_GET['phone_number']);
    $query = "SELECT title, customer_surname, other_names, customer_email, customer_address FROM sales WHERE phone_number = '$phone_number' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $customer = mysqli_fetch_assoc($result);
        echo json_encode(['success' => true, 'data' => $customer]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Customer not found']);
    }
    exit;
}

if (isset($_POST['submit'])) { // Check if the form is submitted
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $customer_surname = mysqli_real_escape_string($conn, $_POST['customer_surname']);
    $other_names = mysqli_real_escape_string($conn, $_POST['other_names']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);

    // Handle multiple items
    $product_names = $_POST['product_name'];
    $models = $_POST['model'];
    $descriptions = $_POST['description'];
    $qtys = $_POST['qty'];
    $unit_prices = $_POST['unit_price'];
    $totals = $_POST['total_unit'];

    $all_valid = true;
    $error_message = '';
    $items_count = count($product_names);

    for ($i = 0; $i < $items_count; $i++) {
        $product_name = mysqli_real_escape_string($conn, $product_names[$i]);
        $model = mysqli_real_escape_string($conn, $models[$i]);
        $description = mysqli_real_escape_string($conn, $descriptions[$i]);
        $qty = (int)$qtys[$i];
        $unit_price = (float)$unit_prices[$i];
        $total_price = (float)$totals[$i];

        if (empty($product_name) || empty($model) || empty($description) || $qty <= 0 || $unit_price <= 0) {
            $all_valid = false;
            $error_message = 'Please fill all required fields correctly for all items.';
            break;
        }

        // Check available stock
        $stock_query = "SELECT quantity FROM stocklist WHERE product_name = '$product_name' AND model = '$model' LIMIT 1";
        $stock_result = mysqli_query($conn, $stock_query);
        if ($stock_result && mysqli_num_rows($stock_result) > 0) {
            $stock_row = mysqli_fetch_assoc($stock_result);
            $available_stock = $stock_row['quantity'];
            if ($qty > $available_stock) {
                $all_valid = false;
                $error_message = "Insufficient stock available for $product_name ($model).";
                break;
            }
        } else {
            $all_valid = false;
            $error_message = "Product or model not found in stock: $product_name ($model).";
            break;
        }
    }

    if ($all_valid) {
        for ($i = 0; $i < $items_count; $i++) {
            $product_name = mysqli_real_escape_string($conn, $product_names[$i]);
            $model = mysqli_real_escape_string($conn, $models[$i]);
            $description = mysqli_real_escape_string($conn, $descriptions[$i]);
            $qty = (int)$qtys[$i];
            $unit_price = (float)$unit_prices[$i];
            $total_price = (float)$totals[$i];

            // Deduct the quantity from stock
            $stock_query = "SELECT quantity FROM stocklist WHERE product_name = '$product_name' AND model = '$model' LIMIT 1";
            $stock_result = mysqli_query($conn, $stock_query);
            $stock_row = mysqli_fetch_assoc($stock_result);
            $available_stock = $stock_row['quantity'];
            $new_quantity = $available_stock - $qty;
            $update_stock_query = "UPDATE stocklist SET quantity = $new_quantity WHERE product_name = '$product_name' AND model = '$model'";
            mysqli_query($conn, $update_stock_query);

            // Insert the order into the sales table with seller as firstname
            $current_user_id = (int)$_SESSION['user_id'];
            $seller_firstname = '';
            $seller_query = "SELECT firstname FROM users WHERE id = $current_user_id LIMIT 1";
            $seller_result = mysqli_query($conn, $seller_query);
            if ($seller_result && mysqli_num_rows($seller_result) > 0) {
                $seller_row = mysqli_fetch_assoc($seller_result);
                $seller_firstname = mysqli_real_escape_string($conn, $seller_row['firstname']);
            }
            $query = "INSERT INTO sales (date, order_id, phone_number, title, customer_surname, other_names, customer_email, customer_address, product_name, model, description, qty, unit_price, total_price, seller) 
                      VALUES ('$date', '$order_id', '$phone_number', '$title', '$customer_surname', '$other_names', '$customer_email', '$customer_address', '$product_name', '$model', '$description', $qty, $unit_price, $total_price, '$seller_firstname')";
            mysqli_query($conn, $query);
        }
        echo "<script>alert('Order submitted successfully. Order ID: $order_id');</script>";
        echo "<script>window.location.href = 'saleshistory.php';</script>";
    } else {
        echo "<script>alert('$error_message');</script>";
    }
}

// Fetch phone count
$phone_count = 0;
$phone_query = "SELECT SUM(quantity) as total FROM stocklist WHERE category = 'Phones'";
$phone_result = mysqli_query($conn, $phone_query);
if ($phone_result && $row = mysqli_fetch_assoc($phone_result)) {
    $phone_count = (int)$row['total'];
}

// Fetch power bank count
$powerbank_count = 0;
$powerbank_query = "SELECT SUM(quantity) as total FROM stocklist WHERE category = 'Power Banks'";
$powerbank_result = mysqli_query($conn, $powerbank_query);
if ($powerbank_result && $row = mysqli_fetch_assoc($powerbank_result)) {
    $powerbank_count = (int)$row['total'];
}

// Fetch music accessories count
$music_count = 0;
$music_query = "SELECT SUM(quantity) as total FROM stocklist WHERE category = 'Music Accessories'";
$music_result = mysqli_query($conn, $music_query);
if ($music_result && $row = mysqli_fetch_assoc($music_result)) {
    $music_count = (int)$row['total'];
}

// Fetch storage devices count
$storage_count = 0;
$storage_query = "SELECT SUM(quantity) as total FROM stocklist WHERE category = 'Storage Devices'";
$storage_result = mysqli_query($conn, $storage_query);
if ($storage_result && $row = mysqli_fetch_assoc($storage_result)) {
    $storage_count = (int)$row['total'];
}

// Fetch charger & cables count
$charger_count = 0;
$charger_query = "SELECT SUM(quantity) as total FROM stocklist WHERE category = 'Charger and Cables'";
$charger_result = mysqli_query($conn, $charger_query);
if ($charger_result && $row = mysqli_fetch_assoc($charger_result)) {
    $charger_count = (int)$row['total'];
}

// Fetch others count
$others_count = 0;
$others_query = "SELECT SUM(quantity) as total FROM stocklist WHERE category = 'Others'";
$others_result = mysqli_query($conn, $others_query);
if ($others_result && $row = mysqli_fetch_assoc($others_result)) {
    $others_count = (int)$row['total'];
}

// Fetch stock quantities by category for the chart
$category_labels = [];
$category_data = [];
$cat_query = "SELECT category, SUM(quantity) as total FROM stocklist GROUP BY category ORDER BY category";
$cat_result = mysqli_query($conn, $cat_query);
while ($row = mysqli_fetch_assoc($cat_result)) {
    $category_labels[] = $row['category'];
    $category_data[] = (int)$row['total'];
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/dme.png">
    <title>Retails Management System Dashboard</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
/* Use Comic Sans across the dashboard to override external styles */
html, body, .page-wrapper, .card, .btn, .form-control, input, select, textarea, button {
    font-family: 'Comic Sans MS', 'Comic Sans', cursive !important;
}
/* Custom extra-wide modal for order form */
.modal-dialog.modal-xl.custom-wide-modal {
    max-width: 60vw;
    width: 60vw;
}
    /* Responsive improvements for dashboard */
    .card-hover .box {
            min-width: 0;
            word-break: break-word;
    }
    .chart-container {
            width: 100%;
            min-width: 0;
    }
    @media (max-width: 991px) {
        .modal-dialog.modal-xl.custom-wide-modal {
            max-width: 95vw;
            width: 95vw;
        }
        .card-hover {
            margin-bottom: 18px;
        }
        .row > [class^='col-'] {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
    @media (max-width: 600px) {
        .modal-dialog.modal-xl.custom-wide-modal {
            max-width: 99vw;
            width: 99vw;
            margin: 0;
        }
        .card-hover .box {
            padding: 18px 8px;
            font-size: 1rem;
        }
        .page-title {
            font-size: 1.3rem;
        }
        .card-title {
            font-size: 1.1rem;
        }
        .chart-container {
            height: 30vh !important;
            min-width: 0;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .login-form, .modal-content, .form-control {
            font-size: 1rem;
        }
        .form-group label {
            font-size: 0.98rem;
        }
        .btn {
            font-size: 1rem;
            padding: 8px 12px;
        }
    }
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                        <img src="assets/images/dme2.png" alt="homepage" class="light-logo" width="100"/>
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                        
                            
                     
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                      
                        
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                     <ul class="navbar-nav float-right">
                    <!-- <li class="nav-item dropdown">
                            

                        <-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/<?php echo htmlspecialchars($user_passport); ?>" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="profile.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a> -->
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a> -->
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="authentication-logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <!-- <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div> -->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
      

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php require "asidebar.php";  ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="text-center mt-4" style="margin-left: 0px;">
                            <br><br>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Take Customer's Order</button>
</div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl custom-wide-modal" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Customer's Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <div class="modal-body">
                                    <form action="" method="POST" id="orderForm">
                                        <div class="row">
                                            <!-- Date and Order ID -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date" class="col-form-label">Date:</label>
                                                    <input type="date" class="form-control" id="date" name="date" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="order_id" class="col-form-label">Order ID:</label>
                                                    <input type="text" class="form-control" id="order_id" name="order_id" value="<?php echo $order_id; ?>" readonly>
                                                </div>
                                            </div>

                                            <!-- Customer Details -->
                                            <div class="col-md-6">
                                                <div class="form-group" style="position:relative;">
                                                    <label for="phone_number" class="col-form-label">Customer's Phone Number:</label>
                                                    <input type="number" minlength="11" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Customer's Phone Number">
                                                    <small id="phone-error" class="text-danger" style="display:none; position:absolute; left:0;">Please enter only numeric digits (0-9).</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title" class="col-form-label" >Title:</label>
                                                    <select name="title" class="form-control" id="title" required>
                                                        <option value="" selected disabled>Select Title</option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Miss/Mrs">Miss/Mrs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_surname" class="col-form-label">Customer's Surname:</label>
                                                    <input type="text" class="form-control" id="customer_surname" name="customer_surname" placeholder="Enter Customer's Surname">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="other_names" class="col-form-label">Other Name(s):</label>
                                                    <input type="text" class="form-control" id="other_names" name="other_names" placeholder="Enter Other Name(s)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_email" class="col-form-label">Customer's Email:</label>
                                                    <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Enter Customer's Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_address" class="col-form-label">Customer's Home/Office Address:</label>
                                                    <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Enter Customer's Home/Office Address">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div id="items-container">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="orderItemsTable">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Product Name</th>
                                                            <th>Model</th>
                                                            <th>Description/IMEI/Serial</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="order-items-tbody">
                                                        <tr class="item-row">
                                                            <td class="sn-cell">1</td>
                                                            <td>
                                                                <select class="form-control product_name" name="product_name[]" onchange="populateModels(this)">
                                                                    <option selected disabled>Select Product Name</option>
                                                                    <?php
                                                                    $query = "SELECT DISTINCT product_name FROM stocklist ORDER BY product_name ASC";
                                                                    $result = mysqli_query($conn, $query);
                                                                    if ($result && mysqli_num_rows($result) > 0) {
                                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                            echo "<option value='" . htmlspecialchars($row['product_name']) . "'>" . htmlspecialchars($row['product_name']) . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control model" name="model[]" onchange="updateDetails(this)">
                                                                    <option>Select Model</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <textarea name="description[]" class="form-control description" rows="1" readonly></textarea>
                                                            </td>
                                                            <td>
                                                                <input type="number" min="1" class="form-control qty" name="qty[]" onchange="calculateTotal(this)"/>
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control unit_price" name="unit_price[]" min="0" step="50.0" placeholder="Enter unit price" readonly/>
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control total" name="total_unit[]" readonly/>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger btn-sm remove-item-btn">Remove</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
        
                                            <div class="text-right" style="margin-bottom: 20px;">
                                                <button type="button" class="btn btn-info" id="add-item-btn">Add More Items</button>
                                            </div>
                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group text-right">
                                                    <label class="font-weight-bold" for="sum_total">Sum Total:</label>
                                                    <input type="text" id="sum_total" class="form-control" style="max-width:200px; display:inline-block; font-weight:bold;" value="0.00" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                
                <!-- ============================================================== -->

                <div class="row"><!-- Begin of row for navbar-->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="fa fa-mobile"></i></h1>
                                <h6 class="text-white">Phones</h6>
                                <h6 class="text-white"><?php echo $phone_count; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="fa fa-battery-full"></i>
                                </h1>
                                <h6 class="text-white">Power Banks</h6>
                                <h6 class="text-white"><?php echo $powerbank_count; ?></h6>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="fa fa-music"></i>
                                </h1>
                                <h6 class="text-white">Music Accessories</h6>
                                <h6 class="text-white"><?php echo $music_count; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fa fa-archive" aria-hidden="true"></i>
                                </h1>
                                <h6 class="text-white">Storage Devices</h6>
                                <h6 class="text-white"><?php echo $storage_count; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="fa fa-plug"></i>
                                </h1>
                                <h6 class="text-white">Charger & Cables</h6>
                                <h6 class="text-white"><?php echo $charger_count; ?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                                <h6 class="text-white">Others</h6>
                                <h6 class="text-white"><?php echo $others_count; ?></h6>
                            </div>
                        </div>
                    </div>
                
                </div><!-- end of Row for navbar-->

                <!-- ============================================================== -->
                <!-- Add Button under Dashboard -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Bar Chart Section -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Stock Chart</h4>
                                <div class="chart-container" style="position: relative; height:40vh; width:100%">
                                    <canvas id="assetBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Stock Alert Chart</h4>
                                <div class="chart-container" style="position: relative; height:40vh; width:100%">
                                    <canvas id="stockAlertChart"></canvas>
                                </div>
                                <div id="stockAlertMessage" style="margin-top:10px;font-weight:bold;color:#d9534f;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
    // Phone number input: show error on non-numeric key press
    document.addEventListener('DOMContentLoaded', function() {
        const phoneInput = document.getElementById('phone_number');
        const phoneError = document.getElementById('phone-error');
        if (phoneInput && phoneError) {
            phoneInput.addEventListener('keydown', function(e) {
                // Allow: backspace, delete, tab, escape, enter, arrows, home, end
                if (["Backspace","Delete","Tab","Escape","Enter","ArrowLeft","ArrowRight","Home","End"].includes(e.key)) {
                    phoneError.style.display = 'none';
                    return;
                }
                // Block: e, E, +, -, ., and any non-digit
                if (e.key === 'e' || e.key === 'E' || e.key === '+' || e.key === '-' || e.key === '.' || (e.key.length === 1 && !/\d/.test(e.key))) {
                    e.preventDefault();
                    phoneError.style.display = 'inline';
                } else {
                    phoneError.style.display = 'none';
                }
            });
            phoneInput.addEventListener('input', function() {
                let cleaned = phoneInput.value.replace(/\D/g, '');
                if (phoneInput.value !== cleaned) {
                    phoneInput.value = cleaned;
                    phoneError.style.display = 'inline';
                } else {
                    phoneError.style.display = 'none';
                }
            });
        }
    });
    // Render charts after DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        // Stock by Category Bar Chart
        var ctx = document.getElementById('assetBarChart').getContext('2d');
        var assetBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($category_labels); ?>,
                datasets: [{
                    label: 'Stock by Category',
                    data: <?php echo json_encode($category_data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(100, 255, 218, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(100, 255, 218, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantity in Stock'
                        }
                    }
                }
            }
        });

        // Stock Alert Chart (Low Stock Notification)
        fetch('fetch_stock_alert.php')
            .then(response => response.json())
            .then(data => {
                var labels = [];
                var values = [];
                data.items.forEach(function(item) {
                    labels.push(item.product_name + ' (' + item.model + ')');
                    values.push(item.quantity);
                });
                var ctx2 = document.getElementById('stockAlertChart').getContext('2d');
                new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Quantity in Stock',
                            data: values,
                            backgroundColor: 'rgba(220, 53, 69, 0.5)',
                            borderColor: 'rgba(220, 53, 69, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return 'Qty: ' + context.parsed.y;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Quantity in Stock'
                                },
                                stepSize: 1,
                                ticks: {
                                    stepSize: 1,
                                    autoSkip: false,
                                    maxTicksLimit: 10
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Item'
                                }
                            }
                        }
                    }
                });
                var alertMsg = '';
                if (data.items.length > 0) {
                    alertMsg = 'Low stock alert! The following items are below or equal to the threshold (' + data.threshold + '):';
                } else {
                    alertMsg = 'All stock levels are above the low stock threshold (' + data.threshold + ').';
                }
                document.getElementById('stockAlertMessage').innerHTML = alertMsg;
            });
    });
                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->

                <!-- Sales chart -->
            
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
        <!--  All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.     -->
                </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    $(document).ready(function() {
        $('#add-item-btn').click(function() {
            var itemRow = $('.item-row').first().clone();
            itemRow.find('select, input, textarea').each(function() {
                if ($(this).is('select')) {
                    $(this).val($(this).find('option:first').val());
                    if ($(this).hasClass('model')) {
                        $(this).html('<option>Select Model</option>');
                    }
                } else {
                    $(this).val('');
                }
            });
            // Insert the new row after the last item-row
            $('#order-items-tbody').append(itemRow);
            updateSN();
        });

        $('#items-container').on('change', '.product_name', function() {
            populateModels(this);
        });
        $('#items-container').on('change', '.model', function() {
            updateDetails(this);
        });
        $('#items-container').on('input', '.qty', function() {
            calculateTotal(this);
        });
             // Auto-populate customer info by phone number
        const phoneInput = document.getElementById('phone_number');
        let suggestionBox;
        let selectedSuggestionIndex = -1;
        let suggestions = [];

        phoneInput.addEventListener('input', function() {
            const query = phoneInput.value.trim();
            selectedSuggestionIndex = -1;
            if (query.length < 3) {
                if (suggestionBox) suggestionBox.style.display = 'none';
                suggestions = [];
                return;
            }
            fetch('fetch_customer_phone_suggestions.php?q=' + encodeURIComponent(query))
                .then(response => response.json())
                .then(phones => {
                    suggestions = phones;
                    if (!suggestionBox) {
                        suggestionBox = document.createElement('div');
                        suggestionBox.style.position = 'absolute';
                        suggestionBox.style.background = '#fff';
                        suggestionBox.style.border = '1px solid #ccc';
                        suggestionBox.style.zIndex = 1000;
                        suggestionBox.style.width = phoneInput.offsetWidth + 'px';
                        suggestionBox.className = 'phone-suggestion-box';
                        phoneInput.parentNode.appendChild(suggestionBox);
                        suggestionBox.style.top = (phoneInput.offsetTop + phoneInput.offsetHeight) + 'px';
                        suggestionBox.style.left = phoneInput.offsetLeft + 'px';
                    }
                    suggestionBox.innerHTML = '';
                    if (phones.length === 0) {
                        suggestionBox.style.display = 'none';
                        return;
                    }
                    phones.forEach((phoneObj, idx) => {
                        const item = document.createElement('div');
                        // Show phone number and full name in suggestion
                        item.textContent = phoneObj.phone_number + ' - ' + phoneObj.full_name;
                        item.style.padding = '4px 8px';
                        item.style.cursor = 'pointer';
                        item.tabIndex = -1;
                        item.className = 'phone-suggestion-item';
                        item.addEventListener('mousedown', function(e) {
                            e.preventDefault();
                            phoneInput.value = phoneObj.phone_number;
                            suggestionBox.style.display = 'none';
                            phoneInput.dispatchEvent(new Event('blur'));
                        });
                        suggestionBox.appendChild(item);
                    });
                    suggestionBox.style.display = 'block';
                });
        });

        phoneInput.addEventListener('keydown', function(e) {
            if (!suggestionBox || suggestionBox.style.display === 'none' || suggestions.length === 0) return;
            const items = suggestionBox.querySelectorAll('.phone-suggestion-item');
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (selectedSuggestionIndex < suggestions.length - 1) {
                    selectedSuggestionIndex++;
                } else {
                    selectedSuggestionIndex = 0;
                }
                items.forEach((item, idx) => {
                    item.style.background = idx === selectedSuggestionIndex ? '#e9ecef' : '#fff';
                });
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (selectedSuggestionIndex > 0) {
                    selectedSuggestionIndex--;
                } else {
                    selectedSuggestionIndex = suggestions.length - 1;
                }
                items.forEach((item, idx) => {
                    item.style.background = idx === selectedSuggestionIndex ? '#e9ecef' : '#fff';
                });
            } else if (e.key === 'Enter') {
                if (selectedSuggestionIndex >= 0 && selectedSuggestionIndex < suggestions.length) {
                    e.preventDefault();
                    phoneInput.value = suggestions[selectedSuggestionIndex];
                    suggestionBox.style.display = 'none';
                    phoneInput.dispatchEvent(new Event('blur'));
                }
            }
        });

        document.addEventListener('click', function(e) {
            if (suggestionBox && !suggestionBox.contains(e.target) && e.target !== phoneInput) {
                suggestionBox.style.display = 'none';
            }
        });

        // Auto-populate customer info by phone number
        $('#phone_number').on('blur', function() {
            var phoneNumber = $(this).val();
            if (phoneNumber.length === 11) {
                fetch('fetch_customer.php?phone_number=' + encodeURIComponent(phoneNumber))
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#title').val(data.title);
                            $('#customer_surname').val(data.customer_surname);
                            $('#other_names').val(data.other_names);
                            $('#customer_address').val(data.customer_address);
                            $('#customer_email').val(data.customer_email);
                        } else {
                            $('#title').val('');
                            $('#customer_surname').val('');
                            $('#other_names').val('');
                            $('#customer_address').val('');
                            $('#customer_email').val('');
                            // Optionally alert: alert(data.message || 'Customer not found');
                        }
                    })
                    .catch(() => {
                        $('#title').val('');
                        $('#customer_surname').val('');
                        $('#other_names').val('');
                        $('#customer_address').val('');
                        $('#customer_email').val('');
                    });
            }
        });

        $('#orderForm').on('submit', function(e) {
            var title = $('#title').val();
            if (!title) {
                alert('Please select a title before submitting the form.');
                $('#title').focus();
                e.preventDefault();
                return false;
            }
        });
    });

    function populateModels(selectElement) {
        const productName = selectElement.value;
        const row = selectElement.closest('.item-row');
        const modelSelect = row.querySelector('.model');
        if (!productName) {
            alert('Please select a valid product name.');
            return;
        }
        modelSelect.innerHTML = '<option selected disabled>Loading models...</option>';
        fetch(`fetch_models.php?product_name=${encodeURIComponent(productName)}`)
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                return response.json();
            })
            .then(data => {
                modelSelect.innerHTML = '<option selected disabled>Select Model</option>';
                if (data.models && data.models.length > 0) {
                    // Sort models alphabetically by model name
                    data.models.sort((a, b) => a.model.localeCompare(b.model));
                    data.models.forEach(model => {
                        const option = document.createElement('option');
                        option.value = model.model;
                        // Show both model and description in the dropdown
                        option.textContent = model.model + ' | ' + model.description;
                        option.setAttribute('data-description', model.description);
                        option.setAttribute('data-unit-price', model.unit_price);
                        option.setAttribute('data-stock', model.stock);
                        modelSelect.appendChild(option);
                    });
                } else {
                    alert('No models found for the selected product.');
                }
            })
            .catch(error => {
                alert('An error occurred while fetching models.');
                modelSelect.innerHTML = '<option selected disabled>Select Model</option>';
            });
    }

    function updateDetails(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const row = selectElement.closest('.item-row');
        const description = selectedOption.getAttribute('data-description');
        const unitPrice = selectedOption.getAttribute('data-unit-price');
        const availableStock = selectedOption.getAttribute('data-stock');
        row.querySelector('.description').value = description || '';
        row.querySelector('.unit_price').value = unitPrice || '';
        const qtyInput = row.querySelector('.qty');
        qtyInput.setAttribute('max', availableStock);
        qtyInput.value = '';
        row.querySelector('.total').value = '';
    }

    function calculateTotal(qtyInput) {
        const row = qtyInput.closest('.item-row');
        const qty = parseFloat(row.querySelector('.qty').value) || 0;
        const unitPrice = parseFloat(row.querySelector('.unit_price').value) || 0;
        const maxQty = parseInt(qtyInput.getAttribute('max'), 10) || 0;
        if (qty > maxQty) {
            alert(`The quantity entered exceeds the available stock (${maxQty}).`);
            row.querySelector('.qty').value = maxQty;
            row.querySelector('.total').value = (maxQty * unitPrice).toFixed(2);
        } else {
            row.querySelector('.total').value = (qty * unitPrice).toFixed(2);
        }
        updateSumTotal();
    }

    function updateSumTotal() {
        let sum = 0;
        document.querySelectorAll('.total').forEach(function(input) {
            let val = parseFloat(input.value);
            if (!isNaN(val)) sum += val;
        });
        const sumTotalInput = document.getElementById('sum_total');
        if (sumTotalInput) sumTotalInput.value = sum.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('date');
        if (dateInput) {
            const today = new Date().toISOString().split('T')[0];
            dateInput.value = today;
        }
        // Update sum total when any total field changes
        document.getElementById('items-container').addEventListener('input', function(e) {
            if (e.target.classList.contains('total')) {
                updateSumTotal();
            }
        });
        updateSumTotal();
    });

    // Update SN column for all rows
function updateSN() {
    $('#order-items-tbody .item-row').each(function(index) {
        $(this).find('.sn-cell').text(index + 1);
    });
}

// Update SN on remove
$('#order-items-tbody').on('click', '.remove-item-btn', function() {
    $(this).closest('.item-row').remove();
    updateSN();
});

// Initial SN update
updateSN();
    </script>
</body>
</html>