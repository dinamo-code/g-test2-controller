<?php include('top_menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/storepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Store</title>
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
        <h3>
            Store Management & Analytics
        </h3>
    </header>
    <section class="Analytics">
        <div class="totalsales card">
            <h4>Total Sales <span>0</span> <span style="color :#566dc5;">$</span></h4>
            <div class="salesgragh"></div>
        </div>
        <div class="orders card">
        <?php
        include('cfg/dbconnect.php');// cfg/dbconnect.php
    $sql = "SELECT * FROM  orders ORDER BY id DESC limit 1";//recorrect table name
    $result = mysqli_query($conn,$sql);
    
    while($orders = mysqli_fetch_array($result)){
     ?> 
            <h4>Orders  <span>  <?php echo $orders ['id'] ?></span></h4>
            <?php   }?>  
            <div class="ordersgragh"></div>
            </div>
            <div class="users card">
                <?php
                include('cfg/dbconnect.php');// cfg/dbconnect.php
            $sql = "SELECT * FROM  users ORDER BY id DESC LIMIT 1";//recorrect table name
            $res = mysqli_query($conn,$sql);
            
            while($data = mysqli_fetch_array($res)){
             ?> 

            <h4>Users  <span>  <?php echo $data ['id'] ?></span></h4>
            <?php   }?>   
            <div class="usersgragh"></div>
        </div>
    </section>
    <section class="pagesmanage">
        <div class="conpages card">
            <a href=""></a>
        </div>
    </section>
</body>
</html>