<?php include('cfg/dbconnect.php');// make it cfg/dbconnect.php 
include('top_menu.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/createproduct.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title><!-- add product-->
    
</head>
<body>

    <div >

        <header >
        <div class="headerlogo">
            <a href="products.php">G</a>
        </div>
        </header>

<section>
    <div class="createmaincontainer">
        <div class="creatpagetitle">
            <h3>Create New Product</h3>
        </div>
        <form action="process.php" method="post" enctype="multipart/form-data"><!-- just image , name , description , price-->
            <div >
                <label for="Image">Image:</label>
                <input type="file" id="Image" name="my_image" required placeholder=" Put an image" >
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
    </div>
    </section>


    
    
</body>
</html>