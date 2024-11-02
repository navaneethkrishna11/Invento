<?php
// Include database connection
include "../config/config.php";

// Get Total Stock
$stockQuery = "SELECT SUM(item_quantity) as total_stock FROM product";
$stockResult = mysqli_query($conn, $stockQuery);
$stockData = mysqli_fetch_assoc($stockResult);
$totalStock = $stockData['total_stock'] ?? 0;

// Get Total Products
$productQuery = "SELECT COUNT(*) as total_products FROM product";
$productResult = mysqli_query($conn, $productQuery);
$productData = mysqli_fetch_assoc($productResult);
$totalProducts = $productData['total_products'] ?? 0;

// Get Total Categories
$categoryQuery = "SELECT COUNT(DISTINCT category_name) as total_categories FROM categories";
$categoryResult = mysqli_query($conn, $categoryQuery);
$categoryData = mysqli_fetch_assoc($categoryResult);
$totalCategories = $categoryData['total_categories'] ?? 0;

// Get Low Stock Items (items with quantity less than 10)
$lowStockQuery = "SELECT COUNT(*) as low_stock FROM product WHERE item_quantity < 10";
$lowStockResult = mysqli_query($conn, $lowStockQuery);
$lowStockData = mysqli_fetch_assoc($lowStockResult);
$lowStock = $lowStockData['low_stock'] ?? 0;

$usersQuery = "SELECT * FROM users";
$usersQueryResult = $conn->query($usersQuery);

$total_sql = "SELECT COUNT(*) as total FROM categories";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_categories = $total_row['total'];

// Get categories created this month
$month_sql = "SELECT COUNT(*) as month_total FROM categories 
              WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) 
              AND YEAR(created_at) = YEAR(CURRENT_DATE())";
$month_result = $conn->query($month_sql);
$month_row = $month_result->fetch_assoc();
$month_categories = $month_row['month_total'];

// Calculate percentage increase
$percentage = ($total_categories > 0) ? ($month_categories / $total_categories) * 100 : 0;

// Fetch all categories ordered by creation date
$sql = "SELECT category_name, created_at FROM categories ORDER BY created_at DESC";
$result = $conn->query($sql);

mysqli_close($conn);
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        
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
                                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Stock</p>
                                      <h5 class="font-weight-bolder mb-0">
                                          <?php echo number_format($totalStock); ?>
                                      </h5>
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

              <!-- Total Products Card -->
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                  <div class="card">
                      <div class="card-body p-3">
                          <div class="row">
                              <div class="col-8">
                                  <div class="numbers">
                                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Products</p>
                                      <h5 class="font-weight-bolder mb-0">
                                          <?php echo number_format($totalProducts); ?>
                                      </h5>
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

              <!-- Total Categories Card -->
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                  <div class="card">
                      <div class="card-body p-3">
                          <div class="row">
                              <div class="col-8">
                                  <div class="numbers">
                                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Categories</p>
                                      <h5 class="font-weight-bolder mb-0">
                                          <?php echo number_format($totalCategories); ?>
                                      </h5>
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

              <!-- Low Stock Items Card -->
              <div class="col-xl-3 col-sm-6">
                  <div class="card">
                      <div class="card-body p-3">
                          <div class="row">
                              <div class="col-8">
                                  <div class="numbers">
                                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Low Stock Items</p>
                                      <h5 class="font-weight-bolder mb-0">
                                          <?php echo number_format($lowStock); ?>
                                      </h5>
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
     
          
      <div class="row mt-4">
        <div class="col-lg-5 mb-lg-0 mb-4">
          <div class="card z-index-2">
          </div>
        </div>
      </div>


      <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
              <div class="card-header pb-0">
                  <div class="row">
                      <div class="col-lg-6 col-7">
                          <h6>Users</h6>
                          <p class="text-sm mb-0">
                              <i class="fa fa-check text-info" aria-hidden="true"></i>
                              <span class="font-weight-bold ms-1"><?php echo $usersQueryResult->num_rows; ?> users</span> registered
                          </p>
                      </div>
                      <div class="col-lg-6 col-5 my-auto text-end">
                          <div class="dropdown float-lg-end pe-4">
                              <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-ellipsis-v text-secondary"></i>
                              </a>
                              <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Add User</a></li>
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Export Data</a></li>
                                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Generate Report</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Details</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                  <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th> -->
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              if ($usersQueryResult->num_rows > 0) {
                                  while($row = $usersQueryResult->fetch_assoc()) {
                                      ?>
                                      <tr>
                                          <td>
                                              <div class="d-flex px-2 py-1">
                                                  <div>
                                                      <img src="../assets/img/default-avatar.png" class="avatar avatar-sm me-3" alt="user">
                                                  </div>
                                                  <div class="d-flex flex-column justify-content-center">
                                                      <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($row['username']); ?></h6>
                                                      <p class="text-xs text-secondary mb-0"><?php echo htmlspecialchars($row['email']); ?></p>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <p class="text-xs font-weight-bold mb-0"><?php echo htmlspecialchars($row['mobile_no']); ?></p>
                                          </td>
                                          <td class="align-middle text-center text-sm">
                                              <span class="badge badge-sm bg-gradient-success"><?php echo htmlspecialchars($row['role']); ?></span>
                                          </td>
                                          <!-- <td class="align-middle text-center">
                                              <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                  Edit
                                              </a>
                                              |
                                              <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" onclick="return confirm('Are you sure you want to delete this user?');">
                                                  Delete
                                              </a>
                                          </td> -->
                                      </tr>
                                      <?php
                                  }
                              } else {
                                  ?>
                                  <tr>
                                      <td colspan="4" class="text-center">No users found</td>
                                  </tr>
                                  <?php
                              }
                              ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
              <div class="card-header pb-0">
                  <h6>Categories Overview</h6>
                  <p class="text-sm">
                      <?php if ($percentage > 0): ?>
                          <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                      <?php else: ?>
                          <i class="fa fa-arrow-down text-danger" aria-hidden="true"></i>
                      <?php endif; ?>
                      <span class="font-weight-bold"><?php echo number_format($percentage, 1); ?>%</span> this month
                  </p>
              </div>
              <div class="card-body p-3">
                  <div class="timeline timeline-one-side">
                      <?php
                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              $date = new DateTime($row['created_at']);
                              ?>
                              <div class="timeline-block mb-3">
                                  <span class="timeline-step">
                                      <i class="ni ni-tag text-success text-gradient"></i>
                                  </span>
                                  <div class="timeline-content">
                                      <h6 class="text-dark text-sm font-weight-bold mb-0">
                                          <?php echo htmlspecialchars($row['category_name']); ?>
                                      </h6>
                                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                          <?php echo $date->format('d M g:i A'); ?>
                                      </p>
                                  </div>
                              </div>
                              <?php
                          }
                      } else {
                          ?>
                          <div class="timeline-block mb-3">
                              <div class="timeline-content">
                                  <h6 class="text-dark text-sm font-weight-bold mb-0">No categories found</h6>
                              </div>
                          </div>
                          <?php
                      }
                      ?>
                  </div>
              </div>
          </div>
      </div>
      </div>
    </div>
  </main>
 
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    // var ctx = document.getElementById("chart-bars").getContext("2d");

    // new Chart(ctx, {
    //   type: "bar",
    //   data: {
    //     labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    //     datasets: [{
    //       label: "Sales",
    //       tension: 0.4,
    //       borderWidth: 0,
    //       borderRadius: 4,
    //       borderSkipped: false,
    //       backgroundColor: "#fff",
    //       data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
    //       maxBarThickness: 6
    //     }, ],
    //   },
    //   options: {
    //     responsive: true,
    //     maintainAspectRatio: false,
    //     plugins: {
    //       legend: {
    //         display: false,
    //       }
    //     },
    //     interaction: {
    //       intersect: false,
    //       mode: 'index',
    //     },
    //     scales: {
    //       y: {
    //         grid: {
    //           drawBorder: false,
    //           display: false,
    //           drawOnChartArea: false,
    //           drawTicks: false,
    //         },
    //         ticks: {
    //           suggestedMin: 0,
    //           suggestedMax: 500,
    //           beginAtZero: true,
    //           padding: 15,
    //           font: {
    //             size: 14,
    //             family: "Open Sans",
    //             style: 'normal',
    //             lineHeight: 2
    //           },
    //           color: "#fff"
    //         },
    //       },
    //       x: {
    //         grid: {
    //           drawBorder: false,
    //           display: false,
    //           drawOnChartArea: false,
    //           drawTicks: false
    //         },
    //         ticks: {
    //           display: false
    //         },
    //       },
    //     },
    //   },
    // });


    // var ctx2 = document.getElementById("chart-line").getContext("2d");

    // var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    // gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    // gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    // gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    // var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    // gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    // gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    // gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    // new Chart(ctx2, {
    //   type: "line",
    //   data: {
    //     labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    //     datasets: [{
    //         label: "Mobile apps",
    //         tension: 0.4,
    //         borderWidth: 0,
    //         pointRadius: 0,
    //         borderColor: "#cb0c9f",
    //         borderWidth: 3,
    //         backgroundColor: gradientStroke1,
    //         fill: true,
    //         data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
    //         maxBarThickness: 6

    //       },
    //       {
    //         label: "Websites",
    //         tension: 0.4,
    //         borderWidth: 0,
    //         pointRadius: 0,
    //         borderColor: "#3A416F",
    //         borderWidth: 3,
    //         backgroundColor: gradientStroke2,
    //         fill: true,
    //         data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
    //         maxBarThickness: 6
    //       },
    //     ],
    //   },
    //   options: {
    //     responsive: true,
    //     maintainAspectRatio: false,
    //     plugins: {
    //       legend: {
    //         display: false,
    //       }
    //     },
    //     interaction: {
    //       intersect: false,
    //       mode: 'index',
    //     },
    //     scales: {
    //       y: {
    //         grid: {
    //           drawBorder: false,
    //           display: true,
    //           drawOnChartArea: true,
    //           drawTicks: false,
    //           borderDash: [5, 5]
    //         },
    //         ticks: {
    //           display: true,
    //           padding: 10,
    //           color: '#b2b9bf',
    //           font: {
    //             size: 11,
    //             family: "Open Sans",
    //             style: 'normal',
    //             lineHeight: 2
    //           },
    //         }
    //       },
    //       x: {
    //         grid: {
    //           drawBorder: false,
    //           display: false,
    //           drawOnChartArea: false,
    //           drawTicks: false,
    //           borderDash: [5, 5]
    //         },
    //         ticks: {
    //           display: true,
    //           color: '#b2b9bf',
    //           padding: 20,
    //           font: {
    //             size: 11,
    //             family: "Open Sans",
    //             style: 'normal',
    //             lineHeight: 2
    //           },
    //         }
    //       },
    //     },
    //   },
    // });
  </script>
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