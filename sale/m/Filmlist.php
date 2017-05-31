<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $sql = "SELECT * FROM User";
    if(!$con){
        echo "{'status':'error'}";
    }
    else{
        mysqli_set_charset($con,"utf8");
        $Filmlist = array();
        $result = mysqli_query($con,$sql);
        while($array = mysqli_fetch_array($result)){
          $Filmlist[] = $array;
        }
    }


    require_once 'filmpage.php';

    require_once "Film.html";
    //require_once "../../js/menu.js";
    mysqli_close($con);
?>