
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expired</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/exp.css">
</head>
<body>

<?php




session_start();
$error = "";
include "../config/config.php";

    if ($conn)
    {
            $todayDate = new DateTime();
            $productDate = "2024-11-01";
            $productDate = new DateTime($productDate);
       
        $sql = "SELECT * FROM product";
        $res=mysqli_query($conn,$sql);
        // code for displaying all items in the db
        // if(mysqli_num_rows($res)>0){
            
        //     echo "<table border='border'><tr><th>id</td><th>Item Name</th><th>Category</th><th>Expiry Date</th></tr>";
           
             
        //     while($row=mysqli_fetch_assoc($res)){
        //         $productDate = $row["item_exp"];
        //     $productDate = new DateTime($productDate);
        //         echo "<tr><td>".$row["item_id"]."</td><td>" .$row["item_name"]."</td><td>" .$row["item_category"]."</td><td>" .$row["item_exp"]."</td></td>";
        //     }
        //     echo"</table>";
        // }


        
           
            $sql = "SELECT DISTINCT item_category FROM product";
            $res=mysqli_query($conn,$sql);

            if(mysqli_num_rows($res)>0){
                
                
                
                echo  "<form method='POST' action='expired.php'> <br><br><br>
                <select  name='product' class='body1'>
                <option selected value='choose'>Choose a Category</option>";
                while($row=mysqli_fetch_assoc($res)){
                    echo"
                        
                        <option value='".$row["item_category"]."'>".$row["item_category"]."</option>";
                }  

                echo "                
                </select>
                <br>
                <div class='container'>
                 <button class='Btn center1' type='submit'>
                 <span class='text'>Search</span>
                 <span class='svgIcon'>
                  <svg fill='white' viewBox='0 0 512 512' height='1em' xmlns='http://www.w3.org/2000/svg'>
    <path d='M505 442.7l-99.7-99.7c28.4-34.5 45.7-78.3 45.7-125.5 0-110.5-89.5-200-200-200S51 107 51 217.5 140.5 417.5 251 417.5c47.2 0 91-17.3 125.5-45.7l99.7 99.7c4.7 4.7 10.8 7 17 7s12.3-2.3 17-7c9.4-9.4 9.4-24.6 0-33.9zM251 367.5c-82.7 0-150-67.3-150-150S168.3 67.5 251 67.5 401 134.8 401 217.5 333.7 367.5 251 367.5z'/>
</svg>

                 </span>
               </button>
               </div>
                 </form>";
                
                 
                
            
                
            
            if(isset($_POST['product'])){
                $selectedProduct = $_POST['product'];
                
                $sql1 = "SELECT * FROM product WHERE item_category = '$selectedProduct'";
                $res1=mysqli_query($conn,$sql1);
                {
                    $n=0;
                    echo "<h1 class='headex'> !!!!Expired Items!!!!</h1>";
                    echo "<ol style='--length: 5' role='list'>";
                
                    
                    while($row1=mysqli_fetch_assoc($res1)){
                        $productDate = $row1["item_exp"];
                    $productDate = new DateTime($productDate);
                    if($productDate< $todayDate){
                        $n=$n+1;
                        if($n===5){
                            $n=1;
                        }
                        echo "<li style='--i: $n'>
                        <h3> ID : " .$row1["item_id"]."<br> " .$row1["item_name"]."</h3>
                       
		<p class='textp'>₹ ".$row1["item_price"]."<br>".$row1["item_quantity"]." Nos</p>
        <p class='rred'>Expired on -->".$row1["item_exp"]."</p>
	</li> ";
                        
                    }
                    
                   
                }
                echo"</ol>";
                if($n===0){
                    echo "<h1>All Items are UptoDate</h1>";
                   }
               
            }

                $sql2 = "SELECT * FROM product WHERE item_category = '$selectedProduct'";
                $res2=mysqli_query($conn,$sql2);
                {
                
                    $n=0;
                    echo "<h1 class='headex'> Expiring Soon..</h1>";
                    echo "<ol style='--length: 5' role='list'>";
                    $todayDat = new DateTime();
                    $todayDat->modify('+1 week');
                    while($row2=mysqli_fetch_assoc($res2)){
                        $productDate = $row2["item_exp"];
                    $productDate = new DateTime($productDate);
                    if($productDate< $todayDat && $productDate> $todayDate){
                        $n=$n+1;
                        if($n===5){
                            $n=1;
                        }
                        echo "<li style='--i: $n'>
                        <h3> ID : " .$row2["item_id"]."<br> " .$row2["item_name"]."</h3>
                       
		
        <p class='textp'>₹ ".$row2["item_price"]."<br>".$row2["item_quantity"]." Nos</p>
        <p class='rred'>Expires on -->".$row2["item_exp"]."</p>
	</li> ";
                        
                    }
                    
                   
                }
                echo"</ol>";
               if($n===0){
                echo "<h1>No Items To Show</h1>";
               }
            
        }
       




        }
            else{
                echo "0 results";
            }
            
            if (mysqli_query($conn, $sql)) {
                $message = "results";
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        


    }
}
    $conn->close();

?>


</body>
</html>