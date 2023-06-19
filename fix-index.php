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
        .footer-bs {
            background-color: #3c3d41;
            padding: 60px 40px;
            color: rgba(255,255,255,1.00);
            margin-bottom: 0px;
            margin-top: 10%;
            border-top-left-radius: 0px;
            
        }
        .footer-bs .footer-brand, .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns {
            padding:10px 25px; 
        }
        .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { 
            border-color: transparent;
        }
        .footer-bs .footer-brand h2 { 
            margin:0px 0px 10px; 
        }
        .footer-bs .footer-brand p { 
            font-size:12px; color:rgba(255,255,255,0.70); 
        }

        .footer-bs .footer-nav ul.pages { 
            list-style:none; padding:0px; 
        }
        .footer-bs .footer-nav ul.pages li { 
            padding:5px 0px;
        }
        .footer-bs .footer-nav ul.pages a { 
            color:rgba(255,255,255,1.00); font-weight:bold; text-transform:uppercase; 
        }
        .footer-bs .footer-nav ul.pages a:hover { 
            color:rgba(255,255,255,0.80); text-decoration:none; 
        }
        .footer-bs .footer-nav h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom:10px;
        }

        .footer-bs .footer-nav ul.list { 
            list-style:none; padding:0px; 
        }
        .footer-bs .footer-nav ul.list li { 
            padding:5px 0px;
        }
        .footer-bs .footer-nav ul.list a { 
            color:rgba(255,255,255,0.80); 
        }
        .footer-bs .footer-nav ul.list a:hover { 
            color:rgba(255,255,255,0.60); text-decoration:none; 
        }

        .footer-bs .footer-social ul { 
            list-style:none; padding:0px; 
        }
        .footer-bs .footer-social h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .footer-bs .footer-social li { 
            padding:5px 4px;
        }
        .footer-bs .footer-social a { 
            color:rgba(255,255,255,1.00);
        }
        .footer-bs .footer-social a:hover { 
            color:rgba(255,255,255,0.80); text-decoration:none; 
        }

        .footer-bs .footer-ns h4 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom:10px;
        }
        .footer-bs .footer-ns p { 
            font-size:12px; color:rgba(255,255,255,0.70); 
        }

        @media (min-width: 768px) {
            .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-left:solid 1px rgba(255,255,255,0.10); }
        }
        .form-control {
            border: none;
            box-shadow: none;
            margin-top: 1%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    
</head>
<style>
  .main-box{
    margin-top: 30px;
    border: none;
    box-shadow: 0.1px 0.1px 0.1px 0.1px;
    border-radius: 5px;
    padding: 2%;
  }
  .selection{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .select-item{
    flex: 0 32%;
    border: none;
    border-bottom:1px solid;
    margin-top: 1%;
  }
  .form-control{
    border: none;
    box-shadow: none;
    margin-top: 1%;
  }
  .box-header{
    display: flex;
    justify-content: space-between;
    margin-top: 0;
    margin-right: 0;
    margin-left: 0;
  }
  .date{
    border: none;
    padding: 10px;
  }
  .search-airline{
    border: none;
    border-radius: 6px;
    color:#fff;
    background-color: rgb(255, 94, 31);
    padding: 7px;
    margin-top: 2%;
    width: 350px;
    margin-left: 68%;
  }
</style>
<div class="container">
  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="photo/los.webp" alt="Los Angeles" style="width:100%; height: 400px;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="photo/chica.jpg" alt="Chicago" style="width:100%; height: 400px;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="photo/newyork.jpg" alt="New York" style="width:100%; height: 400px;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="container main-box">
  <div class="box-header">
    <div>Một chiều / Khứ hồi</div>
    <div>Nhiều Thành phố</div>
    <div class="map">
      <a href="map.php">
        <img src="icon/map-icon.png" alt=""> Mở bản đồ
      </a>
    </div>
  </div>
  <form action="" method="get">
    <div class="selection">
      <div class="select-item">
        <div>Từ</div>
        <div>
          <select name="" class="form-control" id="input" required="required">
            <?php foreach ($result as $key) { ?>
            <option value="<?php echo $key['id_airport'] ?>" ><?php echo $key['name_airport']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="select-item">
        <div>Đến</div>
        <div>
          <select name="" id="input" class="form-control" required="required">
            <?php foreach ($result as $key) { ?>
            <option value="<?php echo $key['id_airport'] ?>" ><?php echo $key['name_airport']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="select-item">
        <div>Số hành khách</div>
        <div>
          <select name="" id="input" class="form-control" >
            <option value="" checked>Người lớn </option>
            <option value="">Trẻ em </option>
          </select>
        </div>
      </div>
      <div class="select-item">
        <div>Hạng ghế</div>
        <div>
          <select name="class" id="input" class="form-control"  required="required">
            <div>
              <?php foreach ($display_class as $key) { ?>
              <option value="<?php echo $key['id_class'] ?>" class="class"><?php echo $key['name_class']; ?></option>
              <?php } ?>
            </div>
          </select>
        </div>
      </div>
      <div class="select-item">
        <div>Ngày đi</div>
        <div>
          <input type="date" name="" id="" class="date" getdate>
        </div>
      </div>
      <div class="select-item">
        <input type="checkbox" name="round-trip" id="" value="true" > Ngày khứ hồi
        <div>
          <?php 
            if($round_trip='fale'){
              echo '<input type="date" name="" id="" class="date">';
            } 
            else{
              echo 'k kkk ';
            }
          ?>
          <!-- <input type="date" name="" id="" class="date"> -->
        </div>
      </div>
    </div>
    <div>
    <button type="submit" class="search-airline" name="submit">Tìm chuyến bay</button>
    </div>
  </form>
</div>
<?php
include_once('footer.php');

?>