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
          flex-wrap: wrap;
          
          
        }
        .button-side-bar{
          margin-top: 21px;
          margin-left: 1%;
          margin-right: 1%;
          
        }
        .navbar-right{
          margin-left: 70%;
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
            <input type="submit" value="hãng bay" class="input-side-bar" name="airline">
            <input type="submit" value="chuyến bay" class="input-side-bar" name="airline">
            <input type="submit" value="hãng bay" class="input-side-bar">
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
      if(isset($_GET['airline'])){
        $action=$_GET['airline'];
        switch ($action) {
          case 'chuyến bay':
            echo '1222324';
            break;
          case 'hãng bay':
            echo 'hihi';
            break;
          default:
            # code...
            break;
          }
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