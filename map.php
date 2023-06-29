<?php
    include_once('header.php');
    require_once('config.php');
    $result=mysqli_query($conn,"SELECT * FROM `airport` WHERE 1");
    $display_class = mysqli_query($conn,"SELECT * FROM `class` WHERE 1");
    if(isset($_GET['submit'])){
      $round_trip=$_GET['round-trip'];
    }
    $dt = date('Y-m-d');
    $dt2=date('Y-m-d',strtotime("+3 days"));
?>
<style>
  .answer { 
    display:none 
  }
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
  .maps{
    margin-top: 5%;
    width: 1150px;
    height: 600px;
  }
</style>
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
          <input type="date" name="" id="" class="date" value="<?php echo  $dt ;?>" min="<?php echo  $dt ;?>" required>
        </div>
      </div>
      <div class="select-item">
        <input type="checkbox" name="round-trip" id="round-trip" value="1" > Ngày khứ hồi
        <div>
          <fieldset class="answer">
            <input type="date" name="" id="" class="date" value="<?php echo  $dt2;?>" min="<?php echo $dt2; ?>">
          </fieldset>
        </div>
      </div>
    </div>
    <div>
      <input type="submit" value="Tìm chuyên bay" class="search-airline">
    </div>
  </form>
</div>
<script>
  $(function() {
    $("#round-trip").on("click",function() {
      $(".answer").toggle(this.checked);
    });
  });
</script>
<div class="container">
    <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29793.988211049866!2d105.8369637!3d21.022739599999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1687069870243!5m2!1sen!2s"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php
include_once('footer.php');

?>