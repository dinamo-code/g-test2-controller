<?php
session_start();
include "cfg/dbconnect.php";
$email = $pwd = "";
$email_err = $pwd_err = "";
$error = false; 
$err_msg = "";

if (isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);

    if (isset($_POST['remember']))
        $remember = $_POST['remember'];
   
    // validate fields

    if ($email == ""){
        $email_err = "Email is mandatory";
        $error = true;
    }

    if ($pwd == ""){
        $pwd_err = "Password is mandatory";
        $error = true;
    }


     // all validations passed
     if (!$error){

        $sql = "select * from admins where email = ?";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows >0){
                $row = $result->fetch_assoc();
                $stored_pwd = $row['password'];
                if (password_verify($pwd, $stored_pwd)){
                    // login successful
                    if (isset($_POST['remember'])){
                       
                        setcookie("remember_email", $email, time()+365*24*3600);
                        setcookie("remember", $remember, time()+365*24*3600);
                    }
                    else{
                        setcookie("remember_email", $email, time() - 365*24*3600);
                        setcookie("remember", $remember, time() - 365*24*3600);
                    }
                    $_SESSION['name'] = $row['name'];
                    header("location:controller.php");
                }
                else{
                    $error_msg = "Incorrect Password";
                }

            }
            else {
                $error_msg = "Email id not registered";
            }

          
        }
        catch(Exception $e){
            $error_msg = $e->getMessage();
        }

    }
}
include "top_menu.php";
?>


<div class="container">
    <div class="err-msg">

        <?php if (!empty($error_msg)){ ?>
            <div class="alert alert-danger">
                <?= $error_msg?>
            </div>
        <?php } ?>
        
    </div>
    <link rel="stylesheet" href="CSS/signin.css">
    <style>
    .showpasslabel {
        position: relative;
        right:110px;
        top:-5px;
    }
    .showpassbox {
        margin-top:15px;
        margin-bottom: 10px;

    }
  </style>
    <div class="signincontainer">
        <h2 class="signintitle">Login</h2>
        <form action="" method="post">
            <?php
             $display_email = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : $email;

             $checked = !empty($remember) ? "checked" : (isset($_COOKIE['remember']) ? "checked" : "");
            ?>
        <div class="mb-3">
            <input
                type="text"
                class="form-control"
                name="email"
                id="email"
                placeholder="Enter email"
                value="<?=$display_email?>"
            />
            <div class="input-err text-danger"><?= $email_err?></div>
           
        </div>

        <div class="mb-3">
            <input
                type="password"
                class="form-control"
                name="pwd"
                id="pwd"
                placeholder="Enter password"
            />
            <div class="input-err text-danger"><?= $pwd_err?></div>
           
        </div>

       <div class="form-check showpassbox">
        <input
            class="form-check-input"
            name="remember"
            id=""
            type="checkbox"
            value="checkedValue"
            aria-label="Remember Me"
            <?= $checked?>
        /><span class="showpasslabel">Remember Me</span>
       </div>
       
        <div class="reg-button text-center mt-3">
            <button
                type="submit"
                name = "submit"
                class="btn btn-primary submitsignin">
                Login
            </button>
        </div>
        <p>Not Registered? Click <a href="adminregister.php">here</a> to register</p>
    </form>
    </div>
</div>
</body>
</html>