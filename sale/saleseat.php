<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');
    mysqli_set_charset($con,"utf8");

    $clickrow = $_POST['crow'];
    $clickcol = $_POST['ccol'];
    $id = $_POST['id'];  //studio_id
    $schid = $_POST['schid'];
    if(isset($_POST['type'])){//修改
        //echo "<script>alert($id+' '+'33');</script>";
        //echo "<script>alert($id);</script>";
        $type = $_POST['type'];
        $sql3 = "update Sale set Sale_Status='".$type."' where Schedule_ID=$schid and Seat_ID =(SELECT Seat_ID from seat WHERE Studio_ID=$id and Seat_Row=$clickrow and Seat_Col=$clickcol) ";
        $result3 = mysqli_query($con,$sql3);
        if($result3){
            echo "success";
        }
    }
?>