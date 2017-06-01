<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $sql = "SELECT * FROM studio";
    if(!$con){
        echo "{'status':'error'}";
    }
    else{
        mysqli_set_charset($con,"utf8");
        $Studiolist = array();
        $result = mysqli_query($con,$sql);
        while($array = mysqli_fetch_array($result)){
          $Studiolist[] = $array;
        }
    }


    require_once 'studiopage.php';

    require_once "studio.html";
    //require_once "../../js/menu.js";
    mysqli_close($con);
?>