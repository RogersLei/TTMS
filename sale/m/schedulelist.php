<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $sql = "SELECT * FROM Schedule";
    if(!$con){
        echo "{'status':'error'}";
    }
    else{
        mysqli_set_charset($con,"utf8");
        $Schedulelist = array();
        $result = mysqli_query($con,$sql);
        while($array = mysqli_fetch_array($result)){
          $Schedulelist[] = $array;
        }
    }


    require_once 'schedulepage.php';

    require_once "schedule.html";
    //require_once "../../js/menu.js";
    mysqli_close($con);
?>