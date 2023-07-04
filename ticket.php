<?php 
    include_once"header.php";
    require_once"config.php";
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
</style>
<div class="container">
    <h1>Đặt chỗ của tôi</h1>
    <p>Điền thông tin và xem lại đặt chỗ</p>
</div>
<div class="container">
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
    <h3>Thông tin khách hàng</h3>
    <div class="info-customer">
        <h4>CHÚ Ý! Đối với trường hợp hành khách đi du lịch quốc tế hoặc quá cảnh ở nước ngoài,
        hộ chiếu bắt buộc phải còn hiệu lực ít nhất 6 tháng tính từ ngày khởi hành</h4>
        <br>
        <h4>Hãy chắc chắn rằng tên của hành khách khớp với tên trên CCCD/CMND/Hộ chiếu/Giấy phép lái xe do chính phủ cấp.
        Bạn nên tránh sai sót vì một số hãng hàng không cho phép sửa tên sau khi đặt vé.</h4>
        <br>
        <label for="">Danh xưng</label>
        <select name="" id="">
            <option value="Ông">Ông</option>
            <option value="Bà">Bà</option>
            <option value="Cô">Cô</option>
        </select>
        <label for="">Họ (vd: Nguyen)</label>
        <input type="text">
        <p>như trên CMND (không dấu)</p>
        <label for="">Tên Đệm & Tên (vd: Thi Ngoc Anh)</label>
        <input type="text">
        <p>như trên CMND (không dấu)</p>
        <label for="">Ngày sinh</label>
        <input type="date" name="" id="">
        <p></p>
        <label for="">Quốc Tịch</label>
        <input type="text" name="" id="">
        <p></p>
        <label for="">Số hộ chiếu</label>
        <input type="text">
        <p>Đối với hành khách dưới 18 tuổi, 
        bạn có thể nhập số ID hợp lệ khác (ví dụ: giấy khai sinh, thẻ học sinh/sinh viên) hoặc ngày sinh (ddmmyyyy)</p>
        <label for="">Quốc Gia Cấp</label>
        <input type="text">
        <label for="">Ngày hết hạn</label>
        <input type="date" name="" id="">
        <input type="button" value="Đặt vé" class="book-ticket">
    </div>
</div>
<?php
    include_once"footer.php";
?>