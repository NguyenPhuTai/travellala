<?php
    include_once('header.php');
    require_once('config.php');
    $result=mysqli_query($conn,"SELECT * FROM `airport` WHERE 1");
    $display_class = mysqli_query($conn,"SELECT * FROM `class` WHERE 1");
    if(isset($_GET['submit'])){
      $round_trip=$_GET['round-trip'];
    }
?>
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
    <div>một chiều / khứ hồi</div>
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
        <div>từ</div>
        <div>
          <select name="" class="form-control" id="input" required="required">
            <?php foreach ($result as $key) { ?>
            <option value="<?php echo $key['id_airport'] ?>" ><?php echo $key['name_airport']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="select-item">
        <div>đến</div>
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
          <input type="date" name="" id="" class="date">
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