<?php include('top_menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/productsconpage2.css">
    <title>Products control</title><!--products list-->
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
    </style>

</head>
<body>
<header>
        <div class="headerlogo">
            <a href="controller.php">G</a>
        </div>
    </header>
    <div >

        <header >
            <div class="createlinkdiv">
                <a href="create.php" class="createlink">Create</a>
            </div>
        </header>


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
            $sql = "SELECT * FROM  products";//recorrect table name
            $result = mysqli_query($conn,$sql);

            while($data = mysqli_fetch_array($result)){
             ?>

             <tr class="cardcontainer">
                <td>
                <?php 
                //$sql = "SELECT * FROM images  ";//
                //$res = mysqli_query($conn,  $sql);//

                //if (mysqli_num_rows($res) > 0) {
                   // while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             	        <?php //if( $images ['id'] === $data ['id']){ $test= $images ['image_url']; } ?>
                            <!-- <img src="uploads/<?php //echo $images ['image_url']; ?>" alt="">  -->
                       
			  <?php //} }?> 

		
                </td>
                <td><img src="uploads/<?php  echo $data['image_url'] ;?>" alt="" style="width:100px ; height:100px"></td>
            
                <td class="cardid"><span>Id : </span><?php echo $data ['id'];?></td>
                <td class="cardname"><span>Name : </span><?php echo $data ['Name'];?></td><!--name-->
                <td class="cardprice"><span>Price : </span><?php echo $data ['Price'];?><span class="dolarsign"> $</span></td><!--price-->
                <td class="cardlinks">
                    <a href="view.php?id=<?php echo $data['id']; ?>" class="cardmorelink">More</a>
                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="carddeletelink">Delete</a>
                </td>
             </tr>
    <?php   }?>        
        </tbody>
    </table>
</body>
</html>
