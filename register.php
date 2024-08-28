<?php
  include "cfg/dbconnect.php";
  $Aname = $email = $pwd = $conf_pwd = "";
  $Aname_err = $email_err = $pwd_err = $conf_pwd_err = "";
  $error = false; 
  $err_msg = "";
  
  if (isset($_POST['submit'])){
  
      $Aname = trim($_POST['Aname']);
      $email = trim($_POST['email']);
      $pwd = trim($_POST['pwd']);
      $conf_pwd = trim($_POST['conf_pwd']);
      // validate fields
      if ($Aname == ""){
          $Aname_err = "name is mandatory";
          $error = true;
      }
  
      if ($email == ""){
          $email_err = "Email is mandatory";
          $error = true;
      }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $email_err = "Invalid Email format";
              $error = true;
          }
      else{   // check if email already registered
          $sql = "select * from admins where email = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s",$email);
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows >0){
              $email_err = "Email already registered";
              $error = true;
          } 
      }
  
      if ($pwd == ""){
          $pwd_err = "Passqword is mandatory";
          $error = true;
      }
      elseif (strlen($pwd) < 6) {
          $pwd_err = "Password must be atleast 6 characters";
          $error = true;
          }
      
      if ($conf_pwd == ""){
          $conf_pwd_err = "Confirm Password is mandatory";
          $error = true;
      }
  
      if ($pwd !="" && $conf_pwd !=""){
          if ($pwd != $conf_pwd){
              $conf_pwd_err = "Passwords do not match";
              $error = true;
          }
      }
  
        // all validations passed
        if (!$error){
          $pwd = password_hash($pwd, PASSWORD_DEFAULT);
  
          $sql = "insert into admins (Aname, email, password) value(?, ?, ?)";
          try{
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("sss", $Aname, $email, $pwd);
              $stmt->execute();
              $succ_msg = "Registration successful. Please <a href='login.php'>login</a>";
              $Aname = $email ="";
          }
          catch(Exception $e){
              $error_msg = $e->getMessage();
          }
          $_SESSION['Aname'] = $row['Aname'];
          header("location:login.php");
      }
  }
  include "top_menu.php";
  ?>
  <link rel="stylesheet" href="CSS/signup.css">
  
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
  <div class="container">
      <div class="err-msg">
          <?php if (!empty($succ_msg)){ ?>
            <div class="alert alert-success">
                  <?= $succ_msg?>
                </div>
                <?php } ?>
  
          <?php if (!empty($error_msg)){ ?>
              <div class="alert alert-danger">
                  <?= $error_msg?>
              </div>
              <?php } ?>
              
            </div>
            <div class="signupcontainer">
          <h2 class="signuptitle">Registration</h2>
      <form action="" method="post">
          <div class="">
              <input
                  type="text"
                  class="namefield"
                  name="Aname"
                  id="Aname"
                  placeholder="Enter name"
                  value="<?=$Aname?>"
              />
              <div class="input-err text-danger"><?= $Aname_err?></div>
              
          </div>
  
          <div class="mb-3">
              <input
                  type="text"
                  class="form-control"
                  name="email"
                  id="email"
                  placeholder="Enter email"
                  value="<?=$email?>"
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
  
          <div class="mb-3">
              <input
                  type="password"
                  class="form-control"
                  name="conf_pwd"
                  id="conf_pwd"
                  placeholder="Enter Confirm password"
              />
              <div class="input-err text-danger"><?= $conf_pwd_err?></div>
              
          </div>
  
          <div class="form-check showpassbox">
          <input
              class="form-check-input "
              style="margin-top:20px;
                        position: relative;
                        left: px;
              "
              name=""
              id=""
              type="checkbox"
              value="checkedValue"
              aria-label="Show Password"
              onclick = "showPwd()"
          /> <span class="showpasslabel">Show Password</span>
          </div>
          
          <div class="reg-button text-center mt-3">
              <button
                  type="submit"
                  name = "submit"
                  class="btn btn-primary submitsignup">
                  Register
              </button>
          </div>
          <p>Already Registered? Login <a href="login.php">here</a></p>
      </form>
      </div>
  </div>
  <script>
      function showPwd(){
          var pwd = document.getElementById("pwd");
          var conf_pwd = document.getElementById("conf_pwd");
          if (pwd.type === "password")
              pwd.type = "text";
          else
          pwd.type = "password"
  
          if (conf_pwd.type === "password")
              conf_pwd.type = "text";
          else
              conf_pwd.type = "password"
      }
  </script>
  </body>
  </html>    
