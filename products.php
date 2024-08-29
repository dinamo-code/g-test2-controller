<?php include('top_menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/productscontrol.css">
    <title>Products List</title><!--products list-->

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

    <table class="productsmaintable">

        <!-- <thead>

            <tr>

                <th>id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>

            </tr>

        </thead> -->

        <tbody class="productsmaincontainer">

            <?php
            include('cfg/dbconnect.php');// cfg/dbconnect.php
            $sql = "SELECT * FROM  products";//recorrect table name
            $result = mysqli_query($conn,$sql);

            while($data = mysqli_fetch_array($result)){
             ?>

             <tr class="productcontainer">
                 <td class="productcontainerimg"><img src="<?php echo $data ['Image'];?>"></td><!--image-->
                 <td class="productcontainerid"><span>Id : </span><?php echo $data ['id'];?></td>
                <td class="productcontainername"><span>Name : </span><?php echo $data ['Name'];?></td><!--name-->
                <td class="productcontainerprice"><span>Price : </span><?php echo $data ['Price'];?><span>$</span></td><!--price-->
                <td class="productcontainerviewanddelete">
                    <a href="view.php?id=<?php echo $data['id']; ?>" class="productcontainerviewmore">Read More</a>
                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="productcontainerdelete">Delete</a>
                </td>
             </tr>

            <?php
        }?>        
        </tbody>


    </table>

        <footer>
            <div class="footercontainer">
                <p>All copy rights recived </p>
            </div>
        </footer>

</body>
</html>
