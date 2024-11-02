<?php
session_start();
$error = "";
include "../config/config.php";

  function validatePhone($phone) {
      return preg_match('/^[0-9]{10}$/', $phone);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
      $category = mysqli_real_escape_string($conn, $_POST['sale_category']);
      $product = mysqli_real_escape_string($conn, $_POST['sale_product']);
      $quantity = intval($_POST['sale_quantity']);
      $unit_price = floatval($_POST['unit_price']);
      $total_amount = floatval($_POST['total_amount']);
      $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
      $customer_phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
      $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
      $sale_date = mysqli_real_escape_string($conn, $_POST['sale_date']);
      $sale_notes = mysqli_real_escape_string($conn, isset($_POST['sale_notes']) ? $_POST['sale_notes'] : '');

      $errors = array();

      if ($category == 'choose') {
          $errors[] = "Please select a valid category";
      }

      if (empty($product)) {
          $errors[] = "Please select a product";
      }

      if ($quantity <= 0) {
          $errors[] = "Quantity must be greater than 0";
      }

      if ($unit_price <= 0) {
          $errors[] = "Unit price must be greater than 0";
      }

      if (!validatePhone($customer_phone)) {
          $errors[] = "Invalid phone number format";
      }

      $stock_check = "SELECT item_quantity, item_price FROM product WHERE item_name = ?";
      $stmt = $conn->prepare($stock_check);
      $stmt->bind_param("s", $product);
      $stmt->execute();
      $result = $stmt->get_result();
      $product_data = $result->fetch_assoc();

      if (!$product_data) {
          $errors[] = "Product not found";
      } elseif ($product_data['item_quantity'] < $quantity) {
          $errors[] = "Insufficient stock. Available: " . $product_data['item_quantity'];
      }

      if (empty($errors)) {
          try {

              $conn->begin_transaction();

              $insert_sale = "INSERT INTO sales (
                  category_name, 
                  product_name, 
                  quantity, 
                  unit_price, 
                  total_amount, 
                  customer_name, 
                  customer_phone, 
                  payment_method, 
                  sale_date, 
                  notes,
                  created_at
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

              $stmt = $conn->prepare($insert_sale);
              $stmt->bind_param("ssiddssss", 
                  $category,
                  $product,
                  $quantity,
                  $unit_price,
                  $total_amount,
                  $customer_name,
                  $customer_phone,
                  $payment_method,
                  $sale_date,
                  $sale_notes
              );
              $stmt->execute();

              $update_stock = "UPDATE product SET 
                            item_quantity = item_quantity - ? 
                            WHERE item_name = ?";
              
              $stmt = $conn->prepare($update_stock);
              $stmt->bind_param("is", $quantity, $product);
              $stmt->execute();

              $conn->commit();

              $_SESSION['success_message'] = "Sale recorded successfully!";
              
              $sale_id = $conn->insert_id;
              $_SESSION['last_sale_id'] = $sale_id;

              header("Location: view_sale.php?id=" . $sale_id);
              exit();

          } catch (Exception $e) {
              $conn->rollback();
              $errors[] = "Error processing sale: " . $e->getMessage();
          }
      }

      if (!empty($errors)) {
          $_SESSION['error_messages'] = $errors;

          $_SESSION['form_data'] = $_POST;
          header("Location: " . $_SERVER['PHP_SELF']);
          exit();
      }
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sales</li>
          </ol>
        </nav>
      </div>
    </nav>
    
    <!-- End Navbar -->





<!---------------------------------------------------FORM TO ADD NEW ITEM IS SHOWN BELOW --------------------------------------------------------------------------------------->


<div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-4 shadow">
                    <div class="card-header bg-primary text-white">
                        <center>
                        <h4 class="mb-0 ">SALES DETAILS</h4>
                        </center>
                    </div>
                    <div class="card-body">
                    <?php if ($error): ?>
                         <div class="alert alert-danger"><?php echo $error; ?></div>
                     <?php endif; ?>
                    <?php if (!empty($message)): ?>
                         <div class="alert alert-success"><?php echo $message; ?></div>
                    <?php endif; ?>
                        <form id="salesForm" method='post' enctype="multipart/form-data">
                          <div class="mb-3">
                              <label for="sale_category" class="form-label">Product Category:</label>
                              <select class="form-select" id="sale_category" name="sale_category" required onchange="fetchProducts()">
                                  <option selected value="choose">Select Product Category</option>
                                  <?php
                                  if ($conn) {
                                      $sql = "SELECT DISTINCT category_name FROM categories";
                                      $res = mysqli_query($conn, $sql);
                                      while($row = mysqli_fetch_assoc($res)) {
                                          echo "<option value='".$row["category_name"]."'>".$row["category_name"]."</option>";
                                      }
                                  }
                                  ?>
                              </select>
                          </div>

                          <div class="mb-3">
                              <label for="sale_product" class="form-label">Product Name:</label>
                              <select class="form-select" id="sale_product" name="sale_product" required>
                                  <option selected value="">Select Product</option>
                                  <?php
                                  if ($conn) {
                                      $sql = "SELECT DISTINCT item_name FROM product";
                                      $res = mysqli_query($conn, $sql);
                                      while($row = mysqli_fetch_assoc($res)) {
                                          echo "<option value='".$row["item_name"]."'>".$row["item_name"]."</option>";
                                      }
                                  }
                                  ?>
                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="sale_quantity" class="form-label">Quantity Sold:</label>
                              <input type="number" class="form-control" id="sale_quantity" name="sale_quantity" min="1" required>
                          </div>

                          <div class="mb-3">
                              <label for="unit_price" class="form-label">Unit Price:</label>
                              <div class="input-group">
                                  <span class="input-group-text">₹</span>
                                  <input type="number" class="form-control" id="unit_price" name="unit_price" step="0.01" readonly>
                              </div>
                          </div>

                          <div class="mb-3">
                              <label for="total_amount" class="form-label">Total Amount:</label>
                              <div class="input-group">
                                  <span class="input-group-text">₹</span>
                                  <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" readonly>
                              </div>
                          </div>

                          <div class="mb-3">
                              <label for="customer_name" class="form-label">Customer Name:</label>
                              <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                          </div>

                          <div class="mb-3">
                              <label for="customer_phone" class="form-label">Customer Phone:</label>
                              <input type="tel" class="form-control" id="customer_phone" name="customer_phone" pattern="[0-9]{10}" required>
                          </div>

                          <div class="mb-3">
                              <label for="payment_method" class="form-label">Payment Method:</label>
                              <select class="form-select" id="payment_method" name="payment_method" required>
                                  <option value="">Select Payment Method</option>
                                  <option value="cash">Cash</option>
                                  <option value="card">Card</option>
                                  <option value="upi">UPI</option>
                                  <option value="netbanking">Net Banking</option>
                              </select>
                          </div>

                          <div class="mb-3">
                              <label for="sale_date" class="form-label">Sale Date:</label>
                              <input type="datetime-local" class="form-control" id="sale_date" name="sale_date" 
                                    value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                          </div>

                          <div class="mb-3">
                              <label for="sale_notes" class="form-label">Notes:</label>
                              <textarea class="form-control" id="sale_notes" name="sale_notes" rows="3"></textarea>
                          </div>

                          <div class="d-grid">
                              <button type="submit" class="btn btn-primary btn-lg">Record Sale</button>
                          </div>

                          <div class="messages">
                              <?php
                              if (isset($_SESSION['error_messages'])) {
                                  foreach ($_SESSION['error_messages'] as $error) {
                                      echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
                                  }
                                  unset($_SESSION['error_messages']);
                              }

                              if (isset($_SESSION['success_message'])) {
                                  echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
                                  unset($_SESSION['success_message']);
                              }
                              ?>
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