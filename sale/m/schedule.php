<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');
    mysqli_set_charset($con,"utf8");
    error_reporting(0);
    $schnum = isset($_POST['schnum'])?$_POST['schnum']:"";
    $movnum = isset($_POST['movnum'])?$_POST['movnum']:"";
    $stunum = isset($_POST['stunum'])?$_POST['stunum']:"";
    $startt = isset($_POST['startt'])?$_POST['startt']:"";
    $endt = isset($_POST['endt'])?$_POST['endt']:"";
    $operation = $_POST['operation'];

    if(!$con){echo "{'status':'error'}";}


    //添加计划
    if($operation=="add"){
        //获取影片编号
        $sqlmn = "select Movie_Id from Movie where Movie_Name='".$movnum."' ";
        $resultmn = mysqli_query($con,$sqlmn);
        $mn = array();
        while($array = mysqli_fetch_array($resultmn)){
            $mn[] = $array;
        }
        $Movie_Id = $mn[0]['Movie_Id'];
        //echo $mn[0]['Movie_Id'];
        //获取影厅编号
        $sqlsn = "select Studio_ID from Studio where Studio_Name='".$stunum."' ";
        $resultsn = mysqli_query($con,$sqlsn);
        $sn = array();
        while($array = mysqli_fetch_array($resultsn)){
            $sn[] = $array;
        }
        $Studio_ID = $sn[0]['Studio_ID'];

        if(!mysqli_num_rows($resultmn) || !mysqli_num_rows($resultsn)){
            echo "error";
        }

        $sql = "insert into Schedule (Movie_Id,Studio_ID,Start_Time,End_Time) values ($Movie_Id,$Studio_ID,'".$startt."','".$endt."')";
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
        else
            echo "success";
    }
    //修改计划
//    else if($operation=="update"){
//        $sql1 = "update schedule set Movie_Id=$movnum,Studio_ID=$stunum,Start_Time='".$startt."',End_Time='".$endt."' ";
//        $result = mysqli_query($con,$sql1);
//        if(!$result){
//           echo mysqli_error($con);
//           exit();
//        }
//    }
    //删除计划
    else if($operation=="del"){
        $schedulenum = $_POST['schedulenum'];
        $sql = "delete from Schedule where Schedule_ID=$schedulenum";
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
        else{
            echo "success";
        }
    }

?>