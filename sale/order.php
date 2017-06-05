<?php
    header('Content-Type:text/html;charset=utf-8');
    //require_once "../php/init.php";

    $con = mysqli_connect('localhost','root','','ttms');
    mysqli_set_charset($con,"utf8");

    $time = $_POST['time'];
    $price = $_POST['price'];
    $seatlist = $_POST['seat'];
    $scheduid = $_POST['id'];
    //echo $seatlist;

    if(!$con){
        echo "{'status':'error'}";
    }
    else{

        $type = "已交易";
        $seatarray = explode(" ",$seatlist);
        //echo count($seatarray);
        for($i=0;$i<count($seatarray)-1;$i++){
            $seat = explode("s",$seatarray[$i]);
            //echo $seat[0];
            //echo $seat[1];
            $sql = "UPDATE seat set Seat_Status='".$type."' WHERE  (Seat_Col=$seat[1] and Seat_Row=$seat[0] and Studio_ID = ( SELECT Studio_ID FROM `schedule` WHERE `schedule`.Schedule_ID=$scheduid))";
            //echo $sql;
            $result = mysqli_query($con,$sql);
            if(!$result){
                echo "error";
                break;
            }
        }
        $sql2 = "insert into ticket (Schedule_ID,Ticket_Price,Ticket_Time) values ($scheduid,$price,'".$time."')";
        $result2 = mysqli_query($con,$sql2);
        if(!$result2){
            echo "error";
        }
        echo "success";
    }
?>