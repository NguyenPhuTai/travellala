<?php
    include_once "header.php";
    require_once "config.php";
    $pnr_number=$_GET['pnr_number'];
    $detail_ticket=mysqli_query($conn,"SELECT * FROM `booking_ticket_detail` WHERE pnr_number =$pnr_number");
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
}

</style>

<div class="container">
    <div class="top">
        
        <img src="photo/airplane-ticket.png" alt=""  class="img1">
        <img src="photo/logo-footer.jpg" alt="" class="img" >
        <h3> TRAVELLALA</h3>
        <h3> TRAVELLALA</h3>
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