<?php
    header('Content-Type:text/html;charset=utf-8');
    require "connect.php";
    $name = $_POST["username"];
    $pwd = $_POST["password"];
    if($name == "admin" && $pwd == "123456"){
        echo "<script>";
        echo "location.href = '../sale/menu.html'";
        echo "</script>";
    }
?>