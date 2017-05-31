<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');

    $name = trim($_POST["username"]);
    $pwd = $_POST["password"];

    $sql = "SELECT * FROM User";

    if(!$con){echo "connect error"}

    if($name == "admin" && $pwd == "123456"){
        echo "<script>";
        echo "location.href = '../sale/menu.html'";
        echo "</script>";
    }
?>