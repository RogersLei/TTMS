<?php
    header('Content-Type:text/html;charset=utf-8');
    session_start();
    if(!isset($_SESSION['name'])){
        header('Location:../index.html');
    }
    else{
        if($_SESSION['type']=="售票员")
            header('Location:sale.php');
    }
?>