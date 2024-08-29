<?php include('top_menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title><!--product details--> 
    <style>
        /* .User-Details{
            background-color:#f5f5f5;

        } */
    </style>
</head>
<body>
    <div >
        <header >
            <h1>Product Details</h1><!-- product details--> 
            <div>
                <a href="products.php" >Back</a>
            </div>
        </header>

    </div>

    <div>
        <?php 
            include("cfg/dbconnect.php");//cfg/dbconnect.php
            $id=$_GET['id'];
            if($id){
            $sql = "SELECT * FROM `products` WHERE id = $id ";//recorrect table name 
            $result = mysqli_query($conn , $sql);
                while($row=mysqli_fetch_array($result)){
        ?>

                <h3>Image:</h3><!--image-->
                 <p><?php echo $row["Image"]; ?></p><!--image-->
                 <h3>Name:</h3><!--name-->
                 <p><?php echo $row["Name"]; ?></p><!--name-->
                 <h3>Price:</h3><!--price-->
                 <p><?php echo $row["Price"]; ?></p><!--price-->
                 <h3>Description :</h3><!--description-->
                 <p><?php echo $row["Description"]; ?></p><!--description-->


        <?php
                }
            }
            else{
                echo "<h3>No Product found</h3>";// product
            }
        ?>


    </div>





    </body>
</html>