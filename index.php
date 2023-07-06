<?php
    include_once('header.php');
    require_once('config.php');
    $result=mysqli_query($conn,"SELECT * FROM `airport` WHERE 1");
    $display_class = mysqli_query($conn,"SELECT * FROM `class` WHERE 1");
    $dt = date('Y-m-d');
    $dt2=date('Y-m-d',strtotime("+3 days"));
    // $test=mysqli_num_rows($schedule);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .main-box{
    margin-top: 30px;
    border: none;
    box-shadow:  1px 2px 5px 0px #aaaaaa;
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
  .answer { 
    display:none;
  }
  .ticket{
    display: flex;
    flex-direction: row;
    margin-left: 50%;
    transform: translateX(-40%);
    margin-top: 2%;

  }
  .right-box{
    width: 900px;
    box-shadow:  1px 2px 5px 0px #aaaaaa;
    border-radius: 10px;
  }
  .icon{
    width: 50px;
    height: 50px;
    margin-left: 20px;
    margin-right: 20px;
  }
  .time-from-to{
    display: flex;
    flex-wrap: nowrap;
    margin-left: 100px;
  }
  .price{
    margin-left: 100px;
  }
  .top-box{
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-left: 6%;
    margin-right: 6%;

  }
  .bottom-ticket{
    display: flex;
    flex-wrap: nowrap;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 20px;
    margin-left: 10%;
    margin-right: 10%;
    justify-content: space-between;
    align-items: center;
  }
  .select{
    width: 120px;
    height: 40px;
    background: rgb(1, 148, 243);
    color:#fff;
    border-radius: 10px;
    border: none;
  }
  .detail-schedule{
    color: #fff;
    border-radius:10px ;
    background:rgb(1, 148, 243) ;
  }
</style>
<?php
// truy ván tìm chuyến bay 
  if (isset($_GET['search'])) {
    $airport_to=$_GET['airport-to'];
    $airport_from=$_GET['airport-from'];
    $date_to=$_GET['date-to'];
    $date_from=$_GET['date-from'];
    $class=$_GET['class'];
    $display_airport=mysqli_query($conn,"SELECT * FROM `airport` WHERE 1");
    $display_class=mysqli_query($conn,"SELECT * FROM `class` WHERE 1");
    $schedule=mysqli_query($conn,"SELECT s.id,s.time,s.sum_time,s.price_number_vip_1,s.price_number_vip_2,s.price_number_vip_3,s.price_adult,s.price_child,s.price_baby,a.id_airport AS'id airport go',a.name_airport AS'name airport go',a.code_airport AS 'code airport go',b.id_airport AS'id airport come',b.name_airport AS'name airport come',b.code_airport AS'code airport come' FROM `schedule` s
    CROSS JOIN route r ON s.id_route = r.id_route
    CROSS JOIN airport a ON r.id_airport_go = a.id_airport
    CROSS JOIN airport b ON r.id_airport_come =b.id_airport
      WHERE r.id_airport_go=$airport_from 
      AND r.id_airport_come=$airport_to 
      AND s.time HAVING '$date_from'");
?>
<div class="container detail-schedule">
    <div>
      <?php foreach ($display_airport as $key) { ?>
      <h1><?php if($key['id_airport']==$airport_from){echo $key['name_airport'].'->';} if($key['id_airport']==$airport_to){echo $key['name_airport'];}?></h1>
      <h1><?php  ?></h1>
      <?php } ?>
      <p><?php  $date= strtotime($date_from); $time=strftime('%a,%d-%m-%Y',$date); echo $time;?>
        | 8 hành khách
        | <?php foreach ($display_class as $key ) {
            if ($key['id_class']==$class) {
              echo $key['name_class'];
            }
        } ?>
      </p>
    </div>  
</div>
<?php foreach ($schedule as $key ) { ?>
<div class="container ticket">
  <div class="right-box">
    <div class="top-box">
      <img src="photo/logo3.png" alt="" style="width: 50px;height: 50px;">
      <div>
        <h3>vietnamairline</h3>
      </div>
      <div class="time-from-to">
        <div>
          <h3><?php $date= strtotime($key['time']); $time=strftime('%H:%M',$date); echo $time;?></h3>
          <h3><?php echo $key['code airport go']; ?></h3>
        </div>
        <div>
          <h4 style="text-align:center ;"><?php echo $key['sum_time']; ?>h</h4>
          <img class="icon" src="data:image/png;base64,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">
        </div>
        <div>
          <h3><?php $date= strtotime($key['time'].'+'.$key['sum_time'].'hours'); $time=strftime('%H:%M',$date); echo $time;?></h3>
          <h3><?php echo $key['code airport come']; ?></h3>
        </div>
      </div>
      <div class="price">
        <h3>6.300.000VND/khách</h3>
      </div>
    </div>
    <div class="bottom-ticket">
      <div>
        <a href="">chi tiết</a>
      </div>
      <div>
        <a href="ticket.php?id=<?php echo $key['id'];?>">
          <input type="submit" value="chọn" class="select">
        </a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php }
    else{
?>
<div class="container">
  <!-- <h2>HI!</h2> -->
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
          <select name="airport-from" class="form-control" id="input" required="required">
            <?php foreach ($result as $key) { ?>
            <option value="<?php echo $key['id_airport'] ?>" ><?php echo $key['name_airport']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="select-item">
        <div>Đến</div>
        <div>
          <select name="airport-to" id="input" class="form-control" required="required">
            <?php foreach ($result as $key) { ?>
            <option value="<?php echo $key['id_airport'] ?>" ><?php echo $key['name_airport']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="select-item">
        <div>Số hành khách</div>
        <div>
          <select name="customer" id="input" class="form-control" >
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
          <input type="date" name="date-from" id="" class="date" value="<?php echo  $dt ;?>" min="<?php echo  $dt ;?>" required>
        </div>
      </div>
      <div class="select-item">
        <input type="checkbox" name="round-trip" id="round-trip" value="1" > Ngày khứ hồi
        <div>
          <fieldset class="answer">
            <input type="date" name="date-to" id="" class="date" value="<?php echo  $dt2;?>" min="<?php echo $dt2; ?>">
          </fieldset>
        </div>
      </div>
    </div>
    <div>
      <input type="submit" name="search" value="Tìm chuyên bay" class="search-airline">
    </div>
  </form>
</div>
<?php } ?>
<script>
  $(function() {
    $("#round-trip").on("click",function() {
      $(".answer").toggle(this.checked);
    });
  });
  $(function() {
    $("detail").on("click",function() {
      $(".ticket-2").toggle(this.checked);
    });
  });
</script>
<?php
include_once('footer.php');

?>