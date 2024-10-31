<?php
session_start();
ob_start();
$error = "";
include "../config/config.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/invento.png">
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
</head>

<body class="g-sidenav-show  bg-gray-100">

  <?php
 include 'sidebar.html'
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
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
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
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
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
                          Payment successfully completed
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
                    <a href="tables.php" class="text-sm mb-0 text-capitalize font-weight-bold">View Table</a>
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
                    
                    <a href="delete.php" class="text-sm mb-0 text-capitalize font-weight-bold">Delete Item</a>
                    
                  </div>
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
                    <a href="" class="text-sm mb-0 text-capitalize font-weight-bold">Update Item </a>
                   
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

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Item table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
<?php
include "../config/config.php";

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}
else{

    $sql = "SELECT * FROM product";
    $res =  $conn->query($sql);
    if($res->num_rows > 0) {
        echo "<table class='table align-items-center mb-0'>
                <tr>
                    <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Id</th>
                    <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Item</th>
                    <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Price</th>
                    <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Status</th>
                    <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Expiry date</th>
                    <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Category</th>
                    <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Update</th>

                    <th class='text-secondary opacity-7'></th>
                </tr>";

        while($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>
                        <div class='d-flex px-2 py-1'>
                            <div class='d-flex flex-column justify-content-center'>
                                <h6 class='mb-0 text-sm'>".$row["item_id"]."</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class='d-flex px-2 py-1'>
                            <div>
                                <img src='../assets/img/team-2.jpg' class='avatar avatar-sm me-3' alt='user1'>
                            </div>
                            <div class='d-flex flex-column justify-content-center'>
                                <h6 class='mb-0 text-sm'>".$row["item_name"]."</h6>
                            </div>
                        </div>
                    </td>
                    <td><p class='text-xs font-weight-bold mb-0'>".$row["item_price"]."</p></td>
                    <td class='align-middle text-center text-sm'>
                        <span class='badge badge-sm bg-gradient-success'>".$row["item_quantity"]."</span>
                    </td>
                    <td class='align-middle text-center'>
                        <span class='text-secondary text-xs font-weight-bold'>".$row["item_exp"]."</span>
                    </td>
                    <td class='align-middle text-center'>
                        <span class='text-secondary text-xs font-weight-bold'>".$row["item_category"]."</span>
                    </td>
                    <td class='align-middle text-center'>
                        <a href='update.php?id=".$row['item_id']."' class='text-sm mb-0 text-capitalize font-weight-bold'>Edit</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
    

}


// Check if ID is provided in URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the existing item details
    $sql = "SELECT * FROM product WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();

    // Update the item when the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_quantity = $_POST['item_quantity'];
        $item_exp = $_POST['item_exp'];
        $item_category = $_POST['item_category'];
        
        // Update the item in the database
        $update_sql = "UPDATE product SET item_name = ?, item_price = ?, item_quantity = ?, item_exp = ?, item_category = ? WHERE item_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sdissi", $item_name, $item_price, $item_quantity, $item_exp, $item_category, $id);
        $update_stmt->execute();
        $update_stmt->close();

        
        header("Location:tables.php"); // Redirect to the main table page
        exit();
    }
} else {
    echo "No item ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Item</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Update Item</h2>
        <form method="POST" action="" class="border p-4 rounded">
            <div class="mb-3">
                <label for="item_name" class="form-label">Item Name:</label>
                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo htmlspecialchars($item['item_name']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="item_price" class="form-label">Price:</label>
                <input type="number" class="form-control" id="item_price" name="item_price" value="<?php echo htmlspecialchars($item['item_price']); ?>" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="item_quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="item_quantity" name="item_quantity" value="<?php echo htmlspecialchars($item['item_quantity']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="item_exp" class="form-label">Expiry Date:</label>
                <input type="date" class="form-control" id="item_exp" name="item_exp" value="<?php echo htmlspecialchars($item['item_exp']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="item_category" class="form-label">Category:</label>
                <input type="text" class="form-control" id="item_category" name="item_category" value="<?php echo htmlspecialchars($item['item_category']); ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>

</html>


<!-- Modal for Delete Confirmation -->
<div id="deleteModal" class="modal" style="display:none; position:fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000;">
    <div style="position: relative; margin: 15% auto; padding: 20px; background-color: white; width: 300px; border-radius: 5px; text-align: center;">
        <h5>Are you sure you want to delete this record?</h5>
        <button id="confirmDelete" style="margin: 10px; padding: 5px 10px; background-color: red; color: white; border: none; border-radius: 3px;">Yes</button>
        <button onclick="closeModal()" style="margin: 10px; padding: 5px 10px; background-color: gray; color: white; border: none; border-radius: 3px;">No</button>
    </div>
</div>

<script>
    let itemIdToDelete;

    function openModal(itemId) {
        itemIdToDelete = itemId; // Store the item ID to delete
        document.getElementById('deleteModal').style.display = 'block'; // Show the modal
    }

    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none'; // Hide the modal
    }

    document.getElementById('confirmDelete').addEventListener('click', function() {
        window.location.href = 'delete.php?id=' + itemIdToDelete; // Redirect to delete with item ID
    });
</script>



                     
            
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
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>