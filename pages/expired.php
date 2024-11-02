<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expired Products Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Original CSS imports -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
        .main-content {
            margin-left: 250px; /* Adjust based on your sidebar width */
            padding: 2rem;
            transition: margin-left 0.3s ease;
        }

        .product-card {
            border-radius: 15px;
            transition: transform 0.2s;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .expired {
            border-left: 5px solid #dc3545;
        }

        .expiring-soon {
            border-left: 5px solid #ffc107;
        }

        .category-select {
            max-width: 300px;
            margin: 0 auto;
        }

        .search-button {
            background: linear-gradient(to right, #4CAF50, #45a049);
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #4CAF50;
        }
    </style>
</head>
<body class="g-sidenav-show bg-gray-100">
    <?php
    session_start();
    include "../config/config.php";
    include "./sidebar.html";
    ?>

    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row justify-content-center mb-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center mb-4">Product Category Search</h4>
                            <form method="POST" action="expired.php" class="text-center">
                                <select name="product" class="form-select category-select mb-3">
                                    <option selected value="choose">Choose a Category</option>
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
                                <div class="">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if(isset($_POST['product']) && $_POST['product'] != 'choose') {
                $selectedProduct = $_POST['product'];
                $todayDate = new DateTime();
                
                // Expired Products Section
                echo '<div class="row mb-5">';
                echo '<div class="col-12">';
                echo '<h2 class="section-title">Expired Products</h2>';
                echo '<div class="row">';
                
                $sql1 = "SELECT * FROM product WHERE item_category = '$selectedProduct'";
                $res1 = mysqli_query($conn, $sql1);
                $hasExpired = false;
                
                while($row1 = mysqli_fetch_assoc($res1)) {
                    $productDate = new DateTime($row1["item_exp"]);
                    if($productDate < $todayDate) {
                        $hasExpired = true;
                        echo '
                        <div class="col-md-4 mb-4">
                            <div class="card product-card expired">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row1["item_name"].'</h5>
                                    <p class="card-text mb-1">ID: '.$row1["item_id"].'</p>
                                    <p class="card-text mb-1">₹'.$row1["item_price"].' | Quantity: '.$row1["item_quantity"].' Nos</p>
                                    <p class="card-text text-danger">Expired on: '.$row1["item_exp"].'</p>
                                </div>
                            </div>
                        </div>';
                    }
                }
                
                if (!$hasExpired) {
                    echo '<div class="col-12"><div class="alert alert-success">No expired products found!</div></div>';
                }
                
                echo '</div></div></div>';
                
                // Expiring Soon Section
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<h2 class="section-title">Expiring Soon</h2>';
                echo '<div class="row">';
                
                $todayDat = new DateTime();
                $todayDat->modify('+1 week');
                $sql2 = "SELECT * FROM product WHERE item_category = '$selectedProduct'";
                $res2 = mysqli_query($conn, $sql2);
                $hasExpiringSoon = false;
                
                while($row2 = mysqli_fetch_assoc($res2)) {
                    $productDate = new DateTime($row2["item_exp"]);
                    if($productDate < $todayDat && $productDate > $todayDate) {
                        $hasExpiringSoon = true;
                        echo '
                        <div class="col-md-4 mb-4">
                            <div class="card product-card expiring-soon">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row2["item_name"].'</h5>
                                    <p class="card-text mb-1">ID: '.$row2["item_id"].'</p>
                                    <p class="card-text mb-1">₹'.$row2["item_price"].' | Quantity: '.$row2["item_quantity"].' Nos</p>
                                    <p class="card-text text-warning">Expires on: '.$row2["item_exp"].'</p>
                                </div>
                            </div>
                        </div>';
                    }
                }
                
                if (!$hasExpiringSoon) {
                    echo '<div class="col-12"><div class="alert alert-info">No products expiring soon!</div></div>';
                }
                
                echo '</div></div></div>';
            }
            ?>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>
</html>