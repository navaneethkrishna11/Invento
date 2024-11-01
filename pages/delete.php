<?php
session_start();
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

// Check for database connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check for expired items and delete them
$currentDate = date('Y-m-d'); // Get the current date

// Prepare and execute DELETE query for expired items
$deleteExpiredSql = "DELETE FROM product WHERE item_exp < ?";
$deleteExpiredStmt = $conn->prepare($deleteExpiredSql);
$deleteExpiredStmt->bind_param("s", $currentDate);
$deleteExpiredStmt->execute();
$deleteExpiredStmt->close(); // Close the statement

// Initialize message variable
$message = "";

// Check if an ID is provided in the GET request for a specific delete action
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Get the item_id to delete

    // Prepare and execute DELETE query for specific item
    $sql = "DELETE FROM product WHERE item_id=?";
    $delete_stmt = $conn->prepare($sql);
    $delete_stmt->bind_param("i", $id);
    $delete_stmt->execute();

    // Optional: Check if the delete was successful
    if ($delete_stmt->affected_rows > 0) {
        $message = "Record deleted successfully."; // Set success message
    } else {
        $message = "Error deleting record."; // Set error message
    }
}

// Prepare and execute SELECT query to fetch all remaining records
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Check if there are records to display
if ($result->num_rows > 0) {
    echo "<table class='table align-items-center mb-0'>
            <tr>
                <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Id</th>
                <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Item</th>
                <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Price</th>
                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Status</th>
                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Expiry date</th>
                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Category</th>
                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Delete</th>
            </tr>";

    // Fetch and display each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><div class='d-flex px-2 py-1'><div class='d-flex flex-column justify-content-center'><h6 class='mb-0 text-sm'>" . $row["item_id"] . "</h6></div></div></td>
                <td><div class='d-flex px-2 py-1'><div><img src='../assets/img/team-2.jpg' class='avatar avatar-sm me-3' alt='user1'></div><div class='d-flex flex-column justify-content-center'><h6 class='mb-0 text-sm'>" . $row["item_name"] . "</h6></div></div></td>
                <td><p class='text-xs font-weight-bold mb-0'>" . $row["item_price"] . "</p></td>
                <td class='align-middle text-center text-sm'><span class='badge badge-sm bg-gradient-success'>" . $row["item_quantity"] . "</span></td>
                <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row["item_exp"] . "</span></td>
                <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-bold'>" . $row["item_category"] . "</span></td>
                <td class='align-middle text-center'>
                    <a href='#' class='text-secondary text-xs font-weight-bold' style='color: red;' onclick=\"openModal(" . $row['item_id'] . ")\">Remove</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Display the deletion message outside the table and center it
if ($message) {
    echo "<div style='text-align: center; color: green;'>$message</div>"; // Center the message
}

// Close the database connection
$conn->close();
?>

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