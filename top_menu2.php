<?php 
if (!isset($_SESSION) || session_id() == "" || session_status() === PHP_SESSION_NONE)
session_start() 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/acountbox.css">
    </head>
    <style>
        .headeracountspan {
            position: relative;
            top :25px;
            left: 91.5%;
        }
        .huseracount {
            text-decoration :none;
            color : white;
            text-transform: capitalize;
            background-color :#566dc5;
            border-radius :50%;
            padding: 8px;
            padding-right :12px;
            padding-left :12px;
            font-weight :600;
            border-width :0px;
            cursor: pointer;
        }
        </style>
    <body>
        <div class="topmenu">
            <div class="menubar">

                <?php
                if (isset($_SESSION['name'])){
                    $str=$_SESSION['name'];
                    

                ?>
                <div><span class="headeracountspan" ><span class="huseracount" onclick="toggleMenu()"> <?php echo $str[0];?></span> </span></div>
                
                <div class="acountinfbox" id="subMenu">
                    <div class="acountboxavatar"><span ><a href ="later.php" class="acountboxavaterlink"> <?php echo $str[0];?></a> </span></div>
                    <div class="acountboxname"><span ><a href ="later.php" class="acountboxnamelink"> <?php echo $str;?></a></span></div>
                    <div class="setandout">
                    <div><a href="">Settings</a></div>
                     <div><a href="logout.php">Logout</a></div>
                     </div>
                     </div>

                  
               <?php } ?>
            </div>
        </div>
            <script>
                let subMenu = document.getElementById("subMenu");
                function toggleMenu(){
                    subMenu.classList.toggle("openmenu");
                }
            </script>
        </body>
</html>
    
