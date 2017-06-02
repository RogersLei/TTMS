<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');
    mysqli_set_charset($con,"utf8");

    $schnum = isset($_POST['schnum'])?$_POST['schnum']:"";
    $movnum = isset($_POST['movnum'])?$_POST['movnum']:"";
    $stunum = isset($_POST['stunum'])?$_POST['stunum']:"";
    $startt = isset($_POST['startt'])?$_POST['startt']:"";
    $endt = isset($_POST['endt'])?$_POST['endt']:"";
    $operation = $_POST['operation'];


    if(!$con){echo "{'status':'error'}";}
    //添加计划
    if($operation=="add"){
        $sql = "";
    }
    //修改计划
    else if($operation=="update"){
        $sql1 = "update schedule set Movie_Id=$movnum,Studio_ID=$stunum,Start_Time='".$startt."',End_Time='".$endt."' ";
//        $result = mysqli_query($con,$sql1);
//        if(!$result){
//           echo mysqli_error($con);
//           exit();
//        }
    }
    //删除计划
    else if($operation=="del"){
        $sql = "";
    }

?>