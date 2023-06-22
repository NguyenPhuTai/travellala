<?php
  session_start();
  ob_start();
  if (isset($_POST['thoat'])) {
    if (isset($_SESSION['role'])) {
      unset($_SESSION['role']);
      unset($_SESSION['ad_name']);
      header('location: login-admin.php');
    }
  } 
  else {
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
      require_once "config.php";
      // include "function.php";
      include_once "user.php";
      $airport=mysqli_query($conn,"SELECT * FROM `airport` WHERE 1");
      $flight=mysqli_query($conn,"SELECT * FROM `flight` WHERE 1");
      $schedule=mysqli_query($conn,"SELECT s.id,s.time,s.sum_time,s.fix_number_vip_1,s.fix_number_vip_2,s.fix_number_vip_3,s.price_number_vip_1,s.price_number_vip_2,s.price_number_vip_3,s.price_adult,s.price_child,s.price_baby,a.name_airport AS'san bay di',b.name_airport AS'san bay den' FROM schedule s 
      CROSS JOIN route r ON s.id_route=r.id_route
      CROSS JOIN airport a ON r.id_airport_go=a.id_airport
      CROSS JOIN airport b ON r.id_airport_come=b.id_airport");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Travellala</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="short icon" href="photo/logo3.png">
      <link rel="stylesheet" href="style.css">
      <style>
        table{
          margin-bottom: 10%;
        }
        th{
          text-align: center;
          padding: 20px;
        }
        td{
          text-align: center;
          padding-left: 5px;
          padding-right: 5px;
        }
        .container{
          display: flex;
          justify-content: center;
        }
        .input-side-bar{
          margin-top: 10%;
          color: #818181;
          background: #111;
          border: none;
          margin-left: 50%;
          transform:translateX(-50%);
        }
        .input-side-bar:hover{
          color:#f1f1f1;
        }
        .navbar{
          display: flex;
          flex-wrap: nowrap;
          
          
        }
        .button-side-bar{
          margin-top: 21px;
          margin-left: 1%;
          margin-right: 1%;
          
        }
        .navbar-right{
          margin-left: 60%;
        }
        .thoat{
          margin-top: 50%;
          transform: translateY(-50%);
        }
        .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }

        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }

        .sidenav a:hover {
          color: #f1f1f1;
        }

        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
      </style>

    </head>

    <body>
      <nav class="navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <form action="" method="get">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <input type="submit" value="hãng bay" class="input-side-bar" name="action">
            <input type="submit" value="chuyến bay" class="input-side-bar" name="action">
            <input type="submit" value="lịch trình bay" class="input-side-bar" name="action">
            <input type="submit" value="hãng bay" class="input-side-bar">
            <input type="submit" value="hãng bay" class="input-side-bar">
          </div>
        </form>
        <span style="font-size:30px;cursor:pointer" class="button-side-bar" onclick="openNav()">&#9776;</span>
        <a href="admin.php"><img src="photo/logo2.jpg" alt="" class="logo-1"></a>
        <ul class="nav navbar-nav navbar-right">
          <div class="avatar">
            <img src="icon/avatar-default.jpg" alt="" class="icon-default">
          </div>
          <a href="">
            <p class="navbar-text"> <?php echo $_SESSION['ad_name']; ?> </p>
          </a>
          <form class="form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" accept-charset="UTF-8" id="login-nav">
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block thoat" name="thoat" value="Thoat">
            </div>
          </form>
        </ul>
      </nav>  
      <?php 
      if(isset($_GET['action'])){
        $action=$_GET['action'];
        switch ($action) {
          case 'hãng bay':
      ?>
      <div class="container">
      <table>
        <tr>
          <th>ID</th>
          <th>Name airport</th>
          <th>city</th>
          <th>code airport</th>
        </tr>
        <?php foreach ($airport as $key) { ?>
        <tr>
          <td><?php echo $key['id_airport'];?></td>
          <td><?php echo $key['name_airport'];?></td>
          <td><?php echo $key['city'];?></td>
          <td><?php echo $key['code_airport'];?></td>
        </tr>
        <?php } break; ?>
      </table>
      </div>
      <?php case 'chuyến bay':?>
      <div class="container">
      <table>
        <tr>
          <th>ID</th>
          <th>Code flight</th>
          <th>type air</th>
          <th>picture</th>
          <th>number vip 1</th>
          <th>number vip 2</th>
          <th>number vip 3</th>
        </tr>
        <?php foreach ($flight as $key) { ?>
        <tr>
          <td><?php echo $key['id_flight'];?></td>
          <td><?php echo $key['code_flight'];?></td>
          <td><?php echo $key['type_air'];?></td>
          <td><?php echo $key['img'];?></td>
          <td><?php echo $key['number_vip_1'];?></td>
          <td><?php echo $key['number_vip_2'];?></td>
          <td><?php echo $key['number_vip_3'];?></td>
        </tr>
        <?php } break; ?>
        <?php case 'lịch trình bay':?>
      <div class="container">
      <table>
        <tr>
          <th>ID</th>
          <th>time</th>
          <th>sum time</th>
          <th>fix number vip 1</th>
          <th>fix number vip 2</th>
          <th>fix number vip 3</th>
          <th>price number vip 1</th>
          <th>price number vip 2</th>
          <th>price number vip 3</th>
          <th>price adult</th>
          <th>price child</th>
          <th>price baby</th>
          <th>airport go</th>
          <th>airport come</th>
        </tr>
        <?php foreach ($schedule as $key) { ?>
        <tr>
          <td><?php echo $key['id'];?></td>
          <td><?php echo $key['time'];?></td>
          <td><?php echo $key['sum_time'];?></td>
          <td><?php echo $key['fix_number_vip_1'];?></td>
          <td><?php echo $key['fix_number_vip_2'];?></td>
          <td><?php echo $key['fix_number_vip_3'];?></td>
          <td><?php echo $key['price_number_vip_1'];?></td>
          <td><?php echo $key['price_number_vip_2'];?></td>
          <td><?php echo $key['price_number_vip_3'];?></td>
          <td><?php echo $key['price_adult'];?></td>
          <td><?php echo $key['price_child'];?></td>
          <td><?php echo $key['price_baby'];?></td>
          <td><?php echo $key['san bay den'];?></td>
          <td><?php echo $key['san bay di'];?></td>
        </tr>
        <?php } break; ?>
      </table>
      </table>
      </div>
      <?php }
      }
      ?>
        <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
        </script>

    </body>
            <?php
            // include_once "fix-index.php";
            ?>
        <?php } else {
        //echo "?";
        header('location: login-admin.php');
      }
    } ?>