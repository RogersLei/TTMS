<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $filmname = isset($_POST['filmname'])?$_POST['filmname']:"";
    $filmtype = isset($_POST['filmtype'])?$_POST['filmtype']:"";
    $filmtime = isset($_POST['filmtime'])?$_POST['filmtime']:"";
    $filmprice = isset($_POST['filmprice'])?$_POST['filmprice']:"";
    $operation = $_POST['operation'];


    if(!$con){
        echo "{'status':'error'}";
    }
    //添加film
    if($operation=="add"){
        $sql = "insert into movie(Movie_Name,Movie_Type,Movie_Time,Movie_Price) values ('".$filmname."','".$filmtype."','".$filmtime."','".$filmprice."')";
        //echo $sql;
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
        $sql = "update movie set Movie_Name='".$filmname."',Movie_Time='".$filmtime."',Movie_Type='".$filmtype."',Movie_Price='".$filmprice."' where Movie_ID=$filmnum ";
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
        $sql = "delete from movie where Movie_Id=$filmnum";
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }

    mysqli_close($con);
?>