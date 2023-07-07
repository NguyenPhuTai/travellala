<?php
    include_once "header.php";
    require_once "config.php";
    require_once "user.php";
    $pnr_number=$_GET['pnr_number'];
    $detail_ticket=mysqli_query($conn,"SELECT * FROM `booking_ticket_detail` WHERE pnr_number =$pnr_number");
    $class=$_GET['class'];
    $getclassname=infoclass($class);
    $class_name=$getclassname[0]['name_class'];
    $code_flight=$_GET['codeflight'];
    $name_airline=$_GET['nameairline'];
    $schedule=mysqli_query($conn,"SELECT s.id,s.time,s.sum_time,s.id_flight,f.code_flight AS 'code_flight',l.name_airline,s.id_airline,s.price_number_vip_1,s.price_number_vip_2,s.price_number_vip_3,s.price_adult,s.price_child,s.price_baby,a.id_airport AS'id airport go',a.name_airport AS'name airport go',a.code_airport AS 'code airport go',b.id_airport AS'id airport come',b.name_airport AS'name airport come',b.code_airport AS'code airport come' FROM `schedule` s
    CROSS JOIN route r ON s.id_route = r.id_route
    CROSS JOIN airport a ON r.id_airport_go = a.id_airport
    CROSS JOIN airport b ON r.id_airport_come =b.id_airport
    CROSS JOIN airline l ON s.id_airline=l.id_airline
    CROSS JOIN flight f ON f.id_flight= s.id_flight
    CROSS JOIN booking_ticket t ON t.id_schedule=s.id
    WHERE t.pnr_number=$pnr_number");
?>
<style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background: whitesmoke;
}
.container{
    margin-left: 50%;
    transform: translateX(-50%);
    margin-top: 50px;
    width: 700px;
    height: 300px;
    
    border-top-right-radius: 50px ;
    border-top-left-radius: 50px ;
}

.top{
    height: 50px;
    background:rgb(1, 148, 243);
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: space-around;
    border-top-right-radius: 50px ;
    border-top-left-radius: 50px ;
}

.top .img{
    height: 45px;
    width: 114px;
}
.top .img1{
    height: 42px;
    width: 52px;
}
.top h3{
    
}

.mid{
    height: 230px;
}
.bot{
    height: 20px;
    background:rgb(1, 148, 243);
    border-bottom-left-radius: 50px ;
    border-bottom-right-radius: 50px ;
    
}

.mid{
    display: flex;
    background: #fff;
}

.mid .left{
    flex: 0 80%;
    max-width: 80%;
}

.mid .right{
    flex: 0 20%;
    max-width: 20%;
}
.head{
    padding-top: 10px;
    padding-left: 15px;
    padding-right: 15px;
    margin-top:20px;
}
.boarding_time{
    text-align: center;
    font-size: 50px;
}
</style>

<div class="container">
    <div class="top">
        
        <img src="photo/airplane-ticket.png" alt=""  class="img1">
        <img src="photo/logo-footer.jpg" alt="" class="img" >
        <h3> BOARDING PASS</h3>
        <h3><?php echo $name_airline; ?></h3>
    </div>

    <div class="mid">
        <div class="right">
            
        </div>

        <div class="left">
            
            <table class="head">
                <thead>
                    <tr>
                        <th class="head">Name of passenger: </th>
                        <th class="head">Carrier: </th>
                        <th class="head">Flight no: </th>
                        <th class="head">Class: </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail_ticket as $key) {?>
                    <tr>
                        <td class="head"><?php echo $key['last_name'].' '.$key['name']; ?></td>
                        <td class="head"><?php echo $class_name; ?></td>
                        <td class="head"><?php echo $code_flight; ?></td>
                        <td class="head"><?php echo $class_name; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <table class="head">
                <thead>
                    <tr>
                        <th class="head">From: </th>
                        <th class="head">to: </th>
                        <th class="head">Date: </th>
                        <th class="head">BOARDING TIME: </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schedule as $key) {?>
                    <tr>
                        <td class="head"><?php echo $key['code airport go'] ; ?></td>
                        <td class="head"><?php echo $key['code airport come']; ?></td>
                        <td class="head"><?php $date= strtotime($key['time']); $time=strftime('%a,%d-%m-%Y',$date); echo $time; ?></td>
                        <td class="head boarding_time"><?php $date= strtotime($key['time']); $time=strftime('%H:%M',$date); echo $time; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="bot">

    </div>
</div>
<?php
    include_once "footer.php";
?>