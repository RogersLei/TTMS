<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $username = isset($_POST['username'])?$_POST['username']:"";
    $userpwd = isset($_POST['userpassword'])?$_POST['userpassword']:"";
    $userpwds = md5($userpwd);
    $usertype = isset($_POST['usertype'])?$_POST['usertype']:"";
    $operation = $_POST['operation'];


    if(!$con){
        echo "{'status':'error'}";
    }
    //添加用户
    if($operation=="add"){
        $sql = "insert into User(User_Name,User_Pwd,User_Pwds,User_Type) values ('".$username."','".$userpwd."','".$userpwds."','".$usertype."')";
        mysqli_set_charset($con,"utf8");
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }
    //更改用户
    else if($operation=="update"){
        $usernum = $_POST['usernum'];
        $sql = "update User set User_Name='".$username."',User_Pwd='".$userpwd."',User_Type='".$usertype."' where User_ID=$usernum ";
        mysqli_set_charset($con,"utf8");
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }
    //删除用户
    else if($operation=="del"){
        $usernum = $_POST['usernum'];
        $sql = "delete from User where User_ID=$usernum";
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
    }

    mysqli_close($con);
?>