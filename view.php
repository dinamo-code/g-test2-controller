<?php include('top_menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/viewmore.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Product Details</title><!--product details--> 
    <style>
    </style>
</head>
<body>
<header>
        <div class="headerlogo">
            <a href="products.php">G</a>
        </div>
    </header>
    <div class="viewmaincontainer">
        <?php 
            include("cfg/dbconnect.php");//cfg/dbconnect.php
            $id=$_GET['id'];
            if($id){
            $sql = "SELECT * FROM `products` WHERE id = $id ";//recorrect table name 
            $result = mysqli_query($conn , $sql);
                while($row=mysqli_fetch_array($result)){
        ?>
                            <?php 
                $sql = "SELECT * FROM images  ";//
                $res = mysqli_query($conn,  $sql);//

                if (mysqli_num_rows($res) > 0) {
                    while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             	        <?php if( $images ['id'] === $row ['id']){ $test= $images ['image_url']; } ?>
                            <!-- <img src="uploads/<?php //echo $images ['image_url']; ?>" alt="">  -->
                       
			  <?php } }?> 

                <!-- <h3>Image:</h3> -->
                 <div class="viewimgcontainer"><img src="uploads/<?php  echo $test ;?>" alt="" style="width:100px ; height:100px"></div><!--image-->
                 <div class="viewinfcontainer">
                 <div class="namemaincontainer">
                 <h3>Name:</h3><!--name-->
                 </div>
                 <div class="pricemaincontainer">
                 <div class="viewnameconainer"><?php echo $row["Name"]; ?></div><!--name-->
                 <h3>Price:</h3><!--price-->
                 <div class="viewpriceconainer"><?php echo $row["Price"]; ?> <span> $</span></div><!--price-->
                 </div>
                 <div class="desmaincontainer">
                 <h3>Description :</h3><!--description-->
                 <div class="viewdesconainer"><?php echo $row["Description"]; ?><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus nulla quam vero, porro necessitatibus quisquam saepe assumenda, pariatur aliquam ea reprehenderit eos ducimus ut? Eligendi tempora delectus sint neque fugiat.</p></div><!--description-->
                 </div>
                 </div>

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