<?php
session_start();
ob_start();
require_once "config.php";
include_once "user.php";
if (isset($_POST['thoat'])&&($role!=1)) {
    if (isset($_SESSION['username'])) {
      session_destroy();
      header('location: index.php');
    }
  } 
if (isset($_POST['signin']) && ($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $role = checkuser($email, $password);
    $_SESSION['role'] = $role;
    $kq = getuserinfo($email, $password);
    if ($role == 0) {
        $_SESSION['role'] = $role;
        $_SESSION['email'] = $kq[0]['email'];
        $_SESSION['username'] = $kq[0]['name_customer'];
        $_SESSION['id'] = $kq[0]['id_customer'];

        header('location: index.php');
    }
    else {
        $txt_erro="Thông tin tài khoản không chính xác";
        // header('location: create-acc.php');
        // $_SESSION['role'] = $role;
        // $_SESSION['email'] = $kq[0]['email'];
        // $_SESSION['username'] = $kq[0]['name_customer'];
        // $_SESSION['id'] = $kq[0]['id_customer'];

        // header('location: index.php');
    }
}


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
        h1 {
            font-size: 24px;
            font-weight: 700;
        }

        h3 {
            font-size: 20px;
            font-weight: 700;
        }

        body {
            font-family: Godwit, MuseoSans, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            font-weight: 550;
            font-size: 16px;
        }

        .footer-bs {
            background-color: #3c3d41;
            padding: 60px 40px;
            color: rgba(255, 255, 255, 1.00);
            margin-bottom: 0px;
            margin-top: 10%;
            border-top-left-radius: 0px;

        }

        .footer-bs .footer-brand,
        .footer-bs .footer-nav,
        .footer-bs .footer-social,
        .footer-bs .footer-ns {
            padding: 10px 25px;
        }

        .footer-bs .footer-nav,
        .footer-bs .footer-social,
        .footer-bs .footer-ns {
            border-color: transparent;
        }

        .footer-bs .footer-brand h2 {
            margin: 0px 0px 10px;
        }

        .footer-bs .footer-brand p {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.70);
        }

        .footer-bs .footer-nav ul.pages {
            list-style: none;
            padding: 0px;
        }

        .footer-bs .footer-nav ul.pages li {
            padding: 5px 0px;
        }

        .footer-bs .footer-nav ul.pages a {
            color: rgba(255, 255, 255, 1.00);
            font-weight: bold;
            text-transform: uppercase;
        }

        .footer-bs .footer-nav ul.pages a:hover {
            color: rgba(255, 255, 255, 0.80);
            text-decoration: none;
        }

        .footer-bs .footer-nav h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .footer-bs .footer-nav ul.list {
            list-style: none;
            padding: 0px;
        }

        .footer-bs .footer-nav ul.list li {
            padding: 5px 0px;
        }

        .footer-bs .footer-nav ul.list a {
            color: rgba(255, 255, 255, 0.80);
        }

        .footer-bs .footer-nav ul.list a:hover {
            color: rgba(255, 255, 255, 0.60);
            text-decoration: none;
        }

        .footer-bs .footer-social ul {
            list-style: none;
            padding: 0px;
        }

        .footer-bs .footer-social h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .footer-bs .footer-social li {
            padding: 5px 4px;
        }

        .footer-bs .footer-social a {
            color: rgba(255, 255, 255, 1.00);
        }

        .footer-bs .footer-social a:hover {
            color: rgba(255, 255, 255, 0.80);
            text-decoration: none;
        }

        .footer-bs .footer-ns h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .footer-bs .footer-ns p {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.70);
        }

        @media (min-width: 768px) {

            .footer-bs .footer-nav,
            .footer-bs .footer-social,
            .footer-bs .footer-ns {
                border-left: solid 1px rgba(255, 255, 255, 0.10);
            }
        }

        .form-control {
            border: none;
            box-shadow: none;
            margin-top: 1%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .thoat{
          margin-top: 50%;
          transform: translateY(-50%);
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-default " role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php"><img src="photo/logo2.jpg" alt="" class="logo-1"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                        <?php
                            // if (isset($txt_erro) && ($txt_erro != "")) {
                            //     echo "<font color='red'>" . $txt_erro . "</font>";
                            // }
                        ?>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <div class="avatar">
                        <img src="icon/avatar-default.jpg" alt="" class="icon-default">
                    </div>
                    <?php if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
                        echo '<a href="edit-acc.php">
                                <p class="navbar-text">' . $_SESSION['username'] . '</p>
                            </a>
                            <form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav">
                                 <div class="form-group">
                                     <input type="submit" class="btn btn-primary btn-block thoat" name="thoat" value="thoat">
                                 </div>
                            </form>';
                    } else { ?>
                        <a href="create-acc.php">
                            <p class="navbar-text">Đăng kí ?</p>
                        </a>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Đăng nhập</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Login here


                                            <form class="form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                    <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="Email address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                    <input type="password" class="form-control" name="password" id="exampleInputPassword2" placeholder="Password" required>
                                                    <?php if(isset($txt_erro)&&($txt_erro!="")){ ?>
                                                    <div class="alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <strong><?php echo $txt_erro; ?></strong>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary btn-block" name="signin" value="Đăng nhập">
                                                </div>
                                                <p>or</p>
                                                <div class="social-buttons">
                                                    <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                                    <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="bottom text-center">
                                            New here ? <a href="#"><b>Join Us</b></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <?php
    // include_once "index.php";
    ?>