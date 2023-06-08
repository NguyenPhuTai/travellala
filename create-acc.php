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
        body{
            font-family:  Godwit,MuseoSans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
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
            flex-direction: column-reverse;


        }
    </style>
</head>
<body>
    <div class="container">
    
        <div class="right-body">
            <div>
                <h1>Đăng ký thành viên của Travellala và trải nghiệm ưu đãi hấp dẫn!</h1>
                <h3>Thật nhanh và an toàn, hãy đăng ký ngay để được:</h3>
            </div>
        </div>
        <div class="left-body">
            <form action="" method="POST" role="form">
                <h1>Đặng ký thành viên Travellala</h1>

                <div class="form-group">
                    <label for="">label</label>
                    <input type="text" class="form-control" id="" placeholder="Input field">
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
