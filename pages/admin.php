<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Invento</title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.html';
  
  $message = "";
  $error = "";

  // Check if the form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../config/config.php'; // Include your database connection

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if ($conn) {
      $sql = "INSERT INTO Users (Name, Address, Phone) VALUES ('$name', '$address', '$phone')";

      if (mysqli_query($conn, $sql)) {
        $message = "User added successfully!";
      } else {
        $error = "Error: " . mysqli_error($conn);
      }
      $conn->close();
    } else {
      $error = "Database not connected.";
    }
  }
  ?>

  <main class="main-content position-relative border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
          <div class="card">
            <div class="card-header text-center pb-0">
              <h4>Enter Your Details</h4>
              <p class="text-sm">Please fill out the form to submit your details.</p>
            </div>
            <div class="card-body">
              <!-- Display Success or Error Message -->
              <?php if ($message): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $message; ?>
                </div>
              <?php elseif ($error): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
                </div>
              <?php endif; ?>

              <!-- Form Section -->
              <form method="POST" action="">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
