<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $name = trim($_POST["username"]);
    $pwd = $_POST["password"];

    $sql = "select User_ID,User_Type from user where User_Name = '".$name."' and User_Pwd = '".$pwd."' ";
    $list = array();
//    if($name == "admin" && $pwd == "123456"){
//        echo "success";
//    }

    if(!$con){echo "<script>alert('error');</script>";}
    else{
        mysqli_set_charset($con,"utf8");

        $query = mysqli_query($con,$sql);
        //        echo $sql;
        if($result =  mysqli_num_rows($query)){
            while($array = mysqli_fetch_array($query)){
                session_start();
                $list[] = $array;
                $type = $list[0]['User_Type'];
                echo $type;
                $_SESSION['name'] = $name ;
                $_SESSION['type'] = $type;
                if($type == "管理员"){
                    header('Location:../sale/menu.php');
                    exit;
                }
                else if($type == "售票员"){
                    header('Location:../sale/sale.php');
                    exit;
                }
            }
        }
        else{
            echo "<script>alert('name or password error');</script>";
            header('Location:../index.html');
            exit;
        }
    }
?>