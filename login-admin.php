<?php
    session_start();
    ob_start();
    require_once('config.php');
    include('user.php');
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $role=check_admin($email,$password);
        $kq=getadmininfo($email,$password);
        $_SESSION['role']=$role;
        if($role==1){
            $_SESSION['ad_name']=$kq[0]['name_admin'];
            header('location: admin.php?action=lịch+trình+bay');
        }
        else{
            $txt_erro='Email hoặc mật khẩu không đúng!!!';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
</head>
<body>
    <img src="photo/logo2.jpg" alt="" class="logo-1">
    <div class="container">
        
        <form action="" method="POST" role="form">
            <legend>Đăng nhâp tài khoản admin</legend>
        
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" placeholder="email" name="email" required>
                <br>
                <label for="">Password</label>
                <input type="password" class="form-control" id="" placeholder="Password" name="password" required>
            </div>
            <?php if(isset($txt_erro)&&($txt_erro!="")){ ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><?php echo $txt_erro; ?></strong>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" name="submit">Đăng nhập</button>
        </form>
        
    </div>
</body>
</html>