<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $filmname = isset($_POST['filmname'])?$_POST['filmname']:"";
    $filmtype = isset($_POST['filmtype'])?$_POST['filmtype']:"";
    $operation = $_POST['operation'];


    if(!$con){
        echo "{'status':'error'}";
    }
    //添加film
    if($operation=="add"){
        $sql = "insert into User(Film_Name,Film_Language,Film_Time) values ('".$filmname."','".$filmlanguage."''".$filmtime."')";
        mysqli_set_charset($con,"utf8");
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }
    //更改film
    else if($operation=="update"){
        $filmnum = $_POST['filmnum'];
        $sql = "update Film set Film_Name='".$filmname."',Film_Time='".$filmtime."',Film_Language='".$filmlanguage."' where Film_ID=$filmnum ";
        mysqli_set_charset($con,"utf8");
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }
    //删除film
    else if($operation=="del"){
        $filmnum = $_POST['filmnum'];
        $sql = "delete from Film where Film_ID=$filmnum";
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }

    mysqli_close($con);
?>