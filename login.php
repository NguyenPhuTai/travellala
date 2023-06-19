<?php 
//             require_once "config.php";
//             include_once "header.php";
//             if(isset($_POST['signin'])){
//             $email=mysqli_real_escape_string($conn,$_POST['email']);
//             $password=mysqli_real_escape_string($conn,$_POST['password']);
//             $password=md5($password);
//             $sql="SELECT * FROM customer WHERE email = '$email' && password = '$password' ";
//             $result=mysqli_query($conn,$sql);
//             $num = mysqli_num_rows($result);
//                     // Lấy dữ liệu từ câu truy vấn
//                     $row =  mysqli_fetch_assoc($result);
//                     if($num == 0) {
//                         echo "Tài khoản không tồn tại. Hãy tạo tài khoản mới.";
//                     } else {
//                         // Tạo phiên làm việc cho account này
                        
//                         $_SESSION["email"] = $email;
//                         // header ("location: profile.php");
//                     }
//             }
// ?>


