<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $studioname = isset($_POST['studioname'])?$_POST['studioname']:"";
    $studiorow = isset($_POST['studiorow'])?$_POST['studiorow']:"";
    $studiocol = isset($_POST['studiocol'])?$_POST['studiocol']:"";
    $operation = $_POST['operation'];


    if(!$con){
        echo "{'status':'error'}";
    }
    //添加影厅
    if($operation=="add"){
        $sql1 = "insert into Studio (Studio_Name,Studio_Row,Studio_Col) values ('".$studioname."','".$studiorow."','".$studiocol."')";
        mysqli_set_charset($con,"utf8");
        $result1 = mysqli_query($con,$sql1);
        if(!$result1){
            echo mysqli_error($con);
            exit();
        }
    }
    //更改影厅
    else if($operation=="update"){
        $studionum = $_POST['studionum'];
        $sql = "update Studio set Studio_Name='".$studioname."',Studio_Row='".$studiorow."',Studio_Col='".$studiocol."' where Studio_ID=$studionum ";
        echo $sql;
        mysqli_set_charset($con,"utf8");
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }
    //删除影厅
    else if($operation=="del"){
        $studionum = $_POST['studionum'];
        $sql = "delete from Studio where Studio_ID=$studionum";
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }

    mysqli_close($con);
?>