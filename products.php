<?php include('top_menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
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
            <h1> Products List </h1><!--products list-->
            <div>
                <a href="create.php" >Create</a>
 
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

        <thead>

            <tr>

                <th>id</th>
                <th>Image</th><!--image-->
                <th>Name</th><!--name-->
                <th>Price</th><!--price-->
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            <?php
            include('cfg/dbconnect.php');// cfg/dbconnect.php
            $sql = "SELECT * FROM  products";//recorrect table name
            $result = mysqli_query($conn,$sql);

            while($data = mysqli_fetch_array($result)){
             ?>

             <tr>

                <td><?php echo $data ['id'];?></td>
                <td><img src="<?php echo $data ['Image'];?>"></td><!--image-->
                <td><?php echo $data ['Name'];?></td><!--name-->
                <td><?php echo $data ['Price'];?></td><!--price-->
                <td>
                    <a href="view.php?id=<?php echo $data['id']; ?>" >Read More</a>
                    <a href="delete.php?id=<?php echo $data['id']; ?>" >Delete</a>

                </td>

             </tr>

            <?php
        }?>        


        </tbody>


    </table>



</body>
</html>
