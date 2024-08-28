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
        right: 8%;
    }
    #lang {
        border-radius: 5px;

    }
    .signcontainer {
        position:absolute;
        top:65%;
        left : 41%;
    }
    .adminsigndiv {
        position:absolute;
        top:30%;
        left : 31%;
        text-align :center;
    }
    .adminsigndiv h2{
        color : #566dc5;
    }
    .adminsigndiv p{
        font-size :20px;
    }
    .adminsigndiv span {
        color : #566dc5;
    }
    .signcontainer a {
        padding: 15px;
        padding-right :25px;
        padding-left :25px;
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
                </select></div>
            <div class="headershopcart"></div>
            <div class="adminsigndiv">
                <h2>Wellcome in admin panel registration</h2>
                <p><span>"</span> please sign and go to admin panel <span>"</span></p>
            </div>
            <div class="signcontainer">
            <div class="signinheader"><a href="login.php" class="Signinlink">Sign In</a></div>
            <div class="signupheader"><a href="register.php" class="signuplink">Sign Up</a></div>
            </div>
            </div>
        </header>
        
    </div>
    <script src="JS/lang.js"></script>
    <script src="JS/main.js"></script>
</body>
</html>