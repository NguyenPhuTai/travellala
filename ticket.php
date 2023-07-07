<?php 
    include_once "header.php";
    require_once "config.php";
    require_once "user.php";
    $id=$_GET['id'];
    $sum_price=$_GET['sumprice'];
    $schedule=mysqli_query($conn,"SELECT s.id,s.time,s.sum_time,s.id_flight,f.code_flight AS 'code_flight',l.name_airline,s.id_airline,s.price_number_vip_1,s.price_number_vip_2,s.price_number_vip_3,s.price_adult,s.price_child,s.price_baby,a.id_airport AS'id airport go',a.name_airport AS'name airport go',a.code_airport AS 'code airport go',b.id_airport AS'id airport come',b.name_airport AS'name airport come',b.code_airport AS'code airport come' FROM `schedule` s
        CROSS JOIN route r ON s.id_route = r.id_route
        CROSS JOIN airport a ON r.id_airport_go = a.id_airport
        CROSS JOIN airport b ON r.id_airport_come =b.id_airport
        CROSS JOIN airline l ON s.id_airline=l.id_airline
        CROSS JOIN flight f ON f.id_flight= s.id_flight
        WHERE id=$id"); 
    $class=$_GET['class'];
    $getclassname=infoclass($class);
    $class_name=$getclassname[0]['name_class'];
    $code_flight=0;
    $name_airline;
    foreach ($schedule as $key) {
        if ($id==$key['id']) {
            $code_flight=$key['code_flight'];
            $name_airline=$key['name_airline'];
        }
    }
?>
<style>
    body{
        background: whitesmoke;
    }
    .signin{
        background: #fff;
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        padding: 10px;
        border-radius: 10px;
        max-width: 800px;
        box-shadow: rgba(3, 18, 26, 0.2) 0px 1px 2px;
    }
    .info-customer{
        display: flex;
        flex-direction: column;
        padding: 10px;
        border-radius: 10px;
        background: #fff;
        max-width: 800px;
        box-shadow: rgba(3, 18, 26, 0.2) 0px 1px 2px;
    }
    .book-ticket{
        border: none;
        color: #fff;
        height: 40px;
        background: rgb(1, 148, 243);
        margin-top: 20px;
        border-radius: 10px;
    }
    .display{
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-evenly;
    }
    .left{
        flex: 70%;
        margin-left: 15%;
    }
    .right{
        flex: 30%;
        padding: 10px;
        border-radius: 10px;
        background: #fff;
        max-width: 800px;
        box-shadow: rgba(3, 18, 26, 0.2) 0px 1px 2px;
        margin-right: 15%;
        max-width: fit-content;
        max-height: 600px;
        margin-top: 50px;
    }
    .time-from-to{
        display: flex;
        flex-wrap: nowrap;
        margin-left: 50%;
        transform: translateX(-70%);
    }
</style>
<div class="container">
    <h1>Đặt chỗ của tôi</h1>
    <p>Điền thông tin và xem lại đặt chỗ</p>
</div>
<div class="display">
    <div class="container left">
        <?php if(!isset($_SESSION['username'])){?>
        <div class="signin">
            <div>
                <img src="icon/signin.png" alt="">
            </div>
            <div>
                <h3>Đăng nhập hoặc Đăng ký và tận hưởng ưu đãi dành riêng cho thành viên</h3>
                <p>Đặt chỗ nhanh và dễ dàng hơn</p>
                <a href="create-acc.php"><h3>Đăng nhập và Đăng kí</h3></a>
            </div>
        </div>
        <?php } 
        else{
            $id_customer=$_SESSION['id'];
            $test=infoid($id_customer);
            $getinfoschedule=infoschedule($id);
            $mindate=date('Y-m-d');
            if (isset($_POST['booking'])) {
                $pnr_number=random_int(00001,99999);
                $gender=$_POST['gender'];
                $lastname=$_POST['last_name'];
                $name=$_POST['name'];
                $birthday=$_POST['birthday'];
                $nationality=$_POST['nationality'];
                $Passport_number=$_POST['Passport_number'];
                $Country_of_Issue=$_POST['Country_of_Issue'];
                $Passport_Expiry_Date=$_POST['Passport_Expiry_Date'];
                $date=$getinfoschedule[0]['time'];
                $phone=$test[0]['number_customer'];
                $email=$test[0]['email'];
                echo $birthday;
                echo $Passport_Expiry_Date;
                $insert_to_ticket=mysqli_query($conn,"INSERT INTO `booking_ticket` (`pnr_number`, `id_schedule`, `id_customer`, `phone`, `email`, `time`) 
                    VALUES ('$pnr_number', '$id', '$id_customer', '$phone', '$email', '$date')");
                $insert_to_detail=mysqli_query($conn,"INSERT INTO `booking_ticket_detail` (`id_booking_ticket_detail`, `pnr_number`, `id_customer`, `gender`, `birthday`, `name_class`, `price_class`, `last_name`, `name`, `nationality`, `Passport_number`, `Country_of_Issue`, `Passport Expiry Date`) 
                    VALUES (NULL, '$pnr_number', '$id_customer', $gender, '$birthday', '$class_name', $sum_price, '$lastname', '$name', '$nationality', $Passport_number, '$Country_of_Issue', '$Passport_Expiry_Date')");
                if ($insert_to_ticket&&$insert_to_detail) {
                    header('location: booking_ticket.php?pnr_number='.$pnr_number.'&class='.$class.'&codeflight='.$code_flight.'&nameairline='.$name_airline);
                }
                else {
                    echo 'faij';
                }
            }
        ?>
        <h3>Thông tin khách hàng</h3>
        <div >
            <form action="" method="post" class="info-customer">
                <h4>CHÚ Ý! Đối với trường hợp hành khách đi du lịch quốc tế hoặc quá cảnh ở nước ngoài,
                hộ chiếu bắt buộc phải còn hiệu lực ít nhất 6 tháng tính từ ngày khởi hành</h4>
                <br>
                <h4>Hãy chắc chắn rằng tên của hành khách khớp với tên trên CCCD/CMND/Hộ chiếu/Giấy phép lái xe do chính phủ cấp.
                Bạn nên tránh sai sót vì một số hãng hàng không cho phép sửa tên sau khi đặt vé.</h4>
                <br>
                <label for="">Danh xưng</label>
                <select name="gender" id="">
                    <option value="1">Ông</option>
                    <option value="0">Bà</option>
                </select>
                <label for="">Họ (vd: Nguyen)</label>
                <input type="text" name="last_name" required >
                <p>như trên CMND (không dấu)</p>
                <label for="">Tên Đệm & Tên (vd: Thi Ngoc Anh)</label>
                <input type="text" name="name" required>
                <p>như trên CMND (không dấu)</p>
                <label for="">Ngày sinh</label>
                <input type="date" name="birthday" id="" required>
                <p></p>
                <label for="">Quốc Tịch</label>
                <input type="text" name="nationality" id="" required>
                <p></p>
                <label for="">Số hộ chiếu</label>
                <input type="text" name="Passport_number" required pattern="[0-9]{11}">
                <p>Đối với hành khách dưới 18 tuổi, 
                bạn có thể nhập số ID hợp lệ khác (ví dụ: giấy khai sinh, thẻ học sinh/sinh viên) hoặc ngày sinh (ddmmyyyy)</p>
                <label for="">Quốc Gia Cấp</label>
                <input type="text" name="Country_of_Issue" required>
                <label for="">Ngày hết hạn</label>
                <input type="date" name="Passport_Expiry_Date" id="" required min="<?php echo $mindate; ?>" >
                <input type="submit" value="Đặt vé" class="book-ticket" name="booking">
            </form>
        </div>
    </div>
    <div class="right">
        <h3 style="color:rgb(1, 148, 243);">Chi tiết: </h3>
        <h3><?php foreach ($schedule as $key) {echo 'Từ: '.$key['name airport go'].' </br> '.'Đến: '.$key['name airport come']; ?></h3>
        <h3><?php $date= strtotime($key['time']); $time=strftime('%a,%d-%m-%Y',$date); echo 'Chuyén bay đi ngày: '.$time;?></h3>    
        <div class="time-from-to">
        <div>
          <h3><?php $date= strtotime($key['time']); $time=strftime('%H:%M',$date); echo $time;?></h3>
        </div>
        <div>
          <h4 style="text-align:center ;"><?php echo $key['sum_time']; ?>h</h4>
          <img class="icon" src="data:image/png;base64,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">
        </div>
        <div>
          <h3><?php $date= strtotime($key['time'].'+'.$key['sum_time'].'hours'); $time=strftime('%H:%M',$date); echo $time;?></h3>
        </div>
      </div>
      <div class="price">
        <h3><?php echo $sum_price;?>VND/khách</h3>
      </div>        
    </div>
    <?php } ?>
</div>
<?php } ?>

<?php
    include_once "footer.php";
?>