<?php
    include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            font-size: 24px;
            font-weight: 700;
        }
        h3{
            font-size: 20px;
            font-weight: 700;
        }
        body{
            font-family:  Godwit,MuseoSans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
            font-weight: 550;
            font-size: 16px;
        }
        .container{
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
        }
        .left-body{
            flex: 30%;


        }
        .right-body{
            flex: 70%;
            display: flex;
            flex-direction: column;


        }
        .btn-primary{
            width: 100%;
        }
        .right-body-banner{
            display: flex;
            flex-wrap:wrap ;
            justify-content: space-between;
        }
        .banner{
            flex:0 45%;
            margin: 1%;
        }
        .icon{
            max-width: 70px;
            max-height: 70px;
        }
    </style>
</head>
<body>
    <div class="container">
    
        <div class="right-body">
            <div class="">
                <h1>Đăng ký thành viên của Travellala và trải nghiệm ưu đãi hấp dẫn!</h1>
                <h3>Thật nhanh và an toàn, hãy đăng ký ngay để được:</h3>
            </div>
            <div class="right-body-banner">
                <div class="banner">
                    <img src="icon/icon-phone.png" alt="" class="icon">
                    <h3>Nhận thưởng cho mỗi lần đặt vé</h3>
                    <p>Tích điểm cho mỗi đặt vé máy bay và phòng khách sạn. Quy đổi để du lịch tiết kiệm hơn! </p>
                </div>
                <div class="banner">
                <img src="icon/icon-convenient.png" alt="" class="icon">
                    <h3>Tiện lợi ngay cả sau khi đặt vé</h3>
                </div>
                <div class="banner">
                <img src="icon/icon-pay.png" alt="" class="icon">
                    <h3>Thanh toán không cần thẻ với travelalaPay</h3>
                </div>
                <div class="banner">
                <img src="icon/icon-adventure.png" alt="" class="icon">
                    <h3>Trải nghiệm đặt vé suôn sẻ</h3>
                </div>
            </div>
        </div>
        <div class="left-body">
            <form action="" method="POST" role="form">
                <h1>Đặng ký thành viên Travellala</h1>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="tel" class="form-control" id="" placeholder="Phone" checked>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary">Đặng ký</button>
            </form>
        </div>
    </div>
</body>
</html>
