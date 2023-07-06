<?php
    include_once "header.php";
    require_once "config.php";
?>
<style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
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
}

.mid .left{
    flex: 0 80%;
    max-width: 80%;
}

.mid .right{
    flex: 0 20%;
    max-width: 20%;
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
            <table>
                <th>
                    <td>Name of passenger</td>
                    <td>Carrier</td>
                    <td>Flight Code</td>
                    <td>Class</td>
                </th>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="bot">

    </div>
</div>