<?php

include("cfg/dbconnect.php");// cfg/dbconnect.php

if (isset($_POST["Add"])) {
    $Name = mysqli_real_escape_string($conn, $_POST["Name"]);//name
    $Price = mysqli_real_escape_string($conn, $_POST["Price"]);//price
    $Description = mysqli_real_escape_string($conn, $_POST["Description"]);//description
    $sqlInsert = "INSERT INTO products(  Name , Price , Description ) 
    VALUES ('$Name','$Price', '$Description')";//recorrect table name image , name , price , description
    if(mysqli_query($conn,$sqlInsert)){

        session_start();
        $_SESSION["create"] = "Product Added Successfully!";// product 
        header("Location:index2.php");

    }else{
        die("Something went wrong");
    }
}

