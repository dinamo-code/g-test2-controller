<?php
include "top_menu.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>g-test</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/lange.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<style>
    .langfield {
        
    }
</style>
</head>
<body>
    <div class="maincontainer">
        <header>
            <div class="logo">
                <p class="glogo">G</p>
            </div>
            <div class="searchbar"></div>
            <div class="headerlinks">
            <div class="langfield">
                <select name="language" id="lang">
                    <option value="defult" selected>Lang</option>
                    <option value="ar" id="arlang" >Arabic</option>
                    <option value="en" id="enlang">English</option>
                </select></div>            <div class="headershopcart"></div>
            <div class="signcontainer">
            <!-- <div class="signinheader"><a href="login.php" class="Signinlink">Sign In</a></div>
            <div class="signupheader"><a href="register.php" class="signuplink">Sign Up</a></div> -->
            <div><a href="orders.php">Orders</a></div>
            <div><a href="products.php">Products</a></div>
            <div><a href="store.php">Store</a></div>
        </div>
            </div>
        </header>
    </div>
    <script src="JS/main.js"></script>
</body>
</html>