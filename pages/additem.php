<?php
session_start();
$error = "";
include "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_quantity = $_POST['item_quantity'];
    $item_exp = $_POST['item_exp'];
    $item_category = $_POST['item_category'];

    error_log("Processing form submission");
    error_log("Files array: " . print_r($_FILES, true));
    
    // Image handling
    if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['item_image'];
        
        // File properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        
        // Get file extension
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Allowed file types
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        
        if (in_array($file_ext, $allowed)) {
            // Check file size (5MB maximum)
            if ($file_size <= 5242880) { // 5MB in bytes
                // Create unique file name
                $file_name_new = $item_id . '_' . uniqid('', true) . '.' . $file_ext;
                
                // Upload directory - make sure this directory exists and is writable
                $upload_dir = '../uploads/products/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                $file_destination = $upload_dir . $file_name_new;
                
                // Move uploaded file
                if (move_uploaded_file($file_tmp, $file_destination)) {
                    if ($conn) {
                        // SQL with image field
                        $sql = "INSERT INTO product (
                            item_id, 
                            item_name, 
                            item_price, 
                            item_quantity, 
                            item_exp, 
                            item_category, 
                            item_image
                        ) VALUES (
                            '$item_id', 
                            '$item_name', 
                            '$item_price', 
                            '$item_quantity', 
                            '$item_exp', 
                            '$item_category', 
                            '$file_name_new'
                        )";
                        
                        if (mysqli_query($conn, $sql)) {
                            $message = "Product added successfully!";
                            
                        } else {
                            $error = "Error: " . mysqli_error($conn);
    
                            if (file_exists($file_destination)) {
                                unlink($file_destination);
                            }
                        }
                    } else {
                        $error = "Database not connected."; 
                        if (file_exists($file_destination)) {
                            unlink($file_destination);
                        }
                    }
                } else {
                    $error = "Failed to move uploaded file.";
                }
            } else {
                $error = "File size too large. Maximum size is 5MB.";
            }
        } else {
            $error = "Invalid file type. Allowed types: " . implode(', ', $allowed);
        }
    } else {
        $error = "Please select a valid image file.";
    }
    
  

    if ($conn) $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/Invento.png">
 
  <title>
    Invento
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <style>
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">

  <?php
 include 'sidebar.html';
  ?>
 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Products</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Products</h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
            </li>
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
               

               
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Expired Products
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row">


        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <a href="/dashboard/Invento/pages/tables.php" class="text-sm mb-0 text-capitalize font-weight-bold">View Table</a>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <a href="additem.php" class="text-sm mb-0 text-capitalize font-weight-bold">Add Item</a>
                   
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                  <a href="delete.php" class="text-sm mb-0 text-capitalize font-weight-bold">Delete Item</a> </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                  <a href="update.php?id=.$row['item_id']" class="text-sm mb-0 text-capitalize font-weight-bold">Update Item</a> 
                   
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>





<!---------------------------------------------------FORM TO ADD NEW ITEM IS SHOWN BELOW --------------------------------------------------------------------------------------->

<div class="mt-3 ms-3">
    <button type="button" class="btn btn-outline-primary"> <a href="category.php">Create Category</a></button>
</div>

<div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-4 shadow">
                    <div class="card-header bg-primary text-white">
                        <center>
                        <h4 class="mb-0 ">ADD NEW ITEM</h4>
                        </center>
                    </div>
                    <div class="card-body">
                    <?php if ($error): ?>
                         <div class="alert alert-danger"><?php echo $error; ?></div>
                     <?php endif; ?>
                    <?php if (!empty($message)): ?>
                         <div class="alert alert-success"><?php echo $message; ?></div>
                    <?php endif; ?>
                    
                        <form id="itemForm" method='post' enctype="multipart/form-data">
                          
                            <div class="mb-3">
                                <label for="item_category" class="form-label">Item Category:</label>
                              
                                <select class="form-select" id="item_category" name="item_category" required>
                                  
                                    <option value="">Choose a category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $result = mysqli_query($conn, $sql);
                                    
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['category_name'] . '</option>';
                                        }
                                    }
                                 ?>
                                </select>
                               
                            </div>
                           
                            <div class="mb-3">
                                <label for="item_id" class="form-label">Item ID:</label>
                                <input type="text" class="form-control" id="item_id" name="item_id" required>
                            </div>
                            <div class="mb-3">
                                <label for="item_name" class="form-label">Item Name:</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="item_price" class="form-label">Item Price:</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control" id="item_price" name="item_price" step="0.01" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="item_quantity" class="form-label">Item Quantity:</label>
                                <input type="number" class="form-control" id="item_quantity" name="item_quantity" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="item_exp" class="form-label">Expiry Date:</label>
                                <input type="date" class="form-control" id="item_exp" name="item_exp" >
                            </div>

                            <div class="form-group">
                               <label for="item_image">Product Image</label>
                               <input type="file" class="form-control" id="item_image" name="item_image" accept="image/*" onchange="previewImage(event)">
                          </div>
    
                           <div class="mt-3">
                               <img id="preview" style="max-width: 200px; display: none;" class="img-thumbnail">
                           </div>


                           
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>
 

                    </div>
                </div>
            </div>
        </div>
</div>



     
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

function previewImage(event) {
    var preview = document.getElementById('preview');
    preview.style.display = 'block';
    preview.src = URL.createObjectURL(event.target.files[0]);
    
    preview.onload = function() {
        URL.revokeObjectURL(preview.src);
    }
}

  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>