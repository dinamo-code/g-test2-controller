<?php include('top_menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/productspage2.css">
    <link rel="stylesheet" href="CSS/shoppingcart.css">
    <title> Orders</title><!--products list-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
         .headerlogo {
        font-size: 30px;
        position: absolute;
        font-weight: 800;
        top: 15px;
        left : 5%;
    }
    .headerlogo a {
            color: #566dc5;
    }
    td div {
        display : inline-block ;
    }
    </style>

</head>
<body>
<header>
        <div class="headerlogo">
            <a href="controller.php">G</a>
        </div>
        <div class="headershopcart"><span onclick="togglecart()"><img src="img/shopingcart.png" alt="" class="shopcartimg"></span></div>
        <div class="productspagetitle">
            <h2>Orders</h2>
        </div>
    </header>
    <!-- <div class="shoppingcartcontainer" id="cartcard">
        <div class="cartcontainerheader">
            <h4>Shop cart</h4>
        </div>
        <div class="cartcontainermain">

        </div>
       <div class="cartcontainerfooter">
            <a href="shopcart.php">Manege Cart</a>

        </div> 
    </div>-->
    <div >
        <?php
        // session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div >
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>

        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div>
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>

    </div>  

    <table >


        <tbody class="maincardcontainer">

            <?php
            include('cfg/dbconnect.php');// cfg/dbconnect.php
            $sql = "SELECT * FROM  orders";//recorrect table name
            $result = mysqli_query($conn,$sql);

            while($data = mysqli_fetch_array($result)){
             ?>

             <tr class="cardcontainer" id="cardcontainer">
                 <td class="cardid" style="display :none;"><span>Id : </span><div id="productid"><?phpecho $data ['id'];?></div></td>
                 <td class="cardname"><span>Username : </span><div id="Username"><?php echo $data ['Username'];?></div></td><!--name-->
                 <td class="cardname"><span>Useremail : </span><div id="Useremail"><?php echo $data ['Useremail'];?></div></td><!--name-->
                 <td class="cardname"><span>Userlocation : </span><div id="Userlocation"><?php echo $data ['Userlocation'];?></div></td><!--name-->
                 <td class="cardname"><span>Paymethod : </span><div id="Paymethod"><?php echo $data ['Paymethod'];?></div></td><!--name-->
                 <td class="cardname"><span>Product_name : </span><div id="Product_name"><?php echo $data ['Product_name'];?></div></td><!--name-->
                 <td>
                <?php 
                $sql = "SELECT * FROM images  ";//
                $res = mysqli_query($conn,  $sql);//

                if (mysqli_num_rows($res) > 0) {
                    while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             	        <?php if( $images ['id'] === $data ['id']){ $test= $images ['image_url']; } ?>
                            <!-- <img src="uploads/<?php //echo $images ['image_url']; ?>" alt="">  -->
                       
			  <?php } }?> 

		
                </td>
                <td><span>Product_image : </span><img src="uploads/<?php  echo $test ;?>" alt="" style="width:100px ; height:100px"></td>
                 <td class="cardprice"><span>Product_price : </span><div id="Product_pricer"><?php echo $data ['Product_price'];?><span class="dolarsign"> $</span></div></td><!--price-->
                <td class="cardname"><span>Product_count : </span><div id="Product_count"><?php echo $data ['Product_count'];?></div></td><!--name-->
                
            </tr>
            <?php
        }?>        
        </tbody>
    </table>
    <script>
                let cartcard = document.getElementById("cartcard");
                function togglecart(){
                    cartcard.classList.toggle("opencart");
                }
            </script>
            <!-- edit to suit the shop cart -->
</body>
</html>
