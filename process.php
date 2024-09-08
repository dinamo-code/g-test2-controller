<?php // 1st

include("cfg/dbconnect.php");// cfg/dbconnect.php

if (isset($_POST['Add']) && isset($_FILES['my_image'])) {

    echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

    $Name = mysqli_real_escape_string($conn, $_POST["Name"]);//name
    $Price = mysqli_real_escape_string($conn, $_POST["Price"]);//price
    $Description = mysqli_real_escape_string($conn, $_POST["Description"]);
    if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index2.php?error=$em");
        }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png"); 
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    //insert
                    $sqlInsert = "INSERT INTO products( image_url ,  Name , Price , Description ) VALUES
                     ('$new_img_name','$Name','$Price', '$Description')";
                    if(mysqli_query($conn,$sqlInsert)){
                        session_start(); 
                        $_SESSION["create"] = "Product Added Successfully!"; 
                        header("Location:products.php");
                        }else{
                            die("Something went wrong");
                        }
                }
            }
    }
}
