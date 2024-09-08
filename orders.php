<?php include('top_menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/orderpage1.css">
    <title> Orders</title><!--products list-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        .cardcontainer {
        border-radius :25px;
        box-shadow: 2.5px 2.5px 32px  rgba(82, 78, 78, 0.278);
        margin-bottom:10px !important
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
            <h3 class="orderpagetitle">Orders</h3>
        </div>
    </header>
    <div>
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
                 <td class="cardid" style="display :none;"><span>Id  </span><div id="productid"><?php echo $data ['id'];?></div></td>
                 <td class="cardname"><span>Username  </span><div id="Username"><?php echo $data ['Username'];?></div></td><!--name-->
                 <td class="cardname"><span>Useremail  </span><div id="Useremail"><?php echo $data ['Useremail'];?></div></td><!--name-->
                 <td class="cardname"><span>Userlocation  </span><div id="Userlocation"><a href="<?php echo $data ['Userlocation'];?>"><img src="imgs/maps-and-flags.png" alt="" style="width :22px;height :22px"></a></div></td><!--name-->
                 <td class="cardname"><span>Paymethod  </span><div id="Paymethod"><?php echo $data ['Paymethod'];?></div></td><!--name-->
                 <td class="cardname"><span>Product name  </span><div id="Product_name"><?php echo $data ['Product_name'];?></div></td><!--name-->
                 <td>

                </td>
                <td class="cardimg"><img src="uploads/<?php  echo $data['image_url'] ;?>" alt=""></td>
                 <td class="cardprice"><span>Product price </span><div id="Product_pricer"><?php echo $data ['Product_price'];?><span class="dolarsign"> $</span></div></td><!--price-->
                <td class="cardname"><span>Product count  </span><div id="Product_count"><?php echo $data ['Product_count'];?></div></td><!--name-->
                <td class="cardname"><span> Ordered at </span><div id="Product_count"><?php echo $data ['ordered_at'];?></div></td><!--name-->
                <td class="cardlocation"><span>Location url</span><p class="locationurl"><?php echo $data ['Userlocation'];?></p></td>
                
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
