<?php include('cfg/dbconnect.php');// make it cfg/dbconnect.php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title><!-- add product-->
    
</head>
<body>

    <div >

        <header >
                <h1>Add New Product </h1><!-- add new product-->
                <div>
                <!-- <a href="index.php" class="btn btn-primary">Back</a><delete it -->
                </div>
        </header>


    
        <form action="process.php" method="post"><!-- just image , name , description , price-->
            <div >
                <label for="Image">Image:</label><!--make it image-->
                <input type="file" id="Image" name="Image" required placeholder=" Put an image" >
            </div>


            <div >
                <label for="Name">Name:</label><!--  make it name-->
                <input type="text" id="Name" name="Name" required placeholder=" Write Product Name" >
            </div>

            <div >
                <label for="Price">Price:</label><!-- make it price -->
                <input type="number" id="Price" name="Price" required placeholder=" Product Price" >
            </div>


            <div >
                <label for="Description"> Description:</label><!-- description-->
                <input type="text" id="Description" name="Description" required placeholder=" Write A Description" >
            </div>


            <div class=><!-- add  product -->
                <input type="submit" name="Add" value="Add Product" >
            </div>
        </form>


    </div>




    
    
</body>
</html>