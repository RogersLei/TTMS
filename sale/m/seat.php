<?php
    header('Content-Type:text/html;charset=utf-8');
    $name = $_GET['name'];
    $row = $_GET['row'];
    $col = $_GET['col'];

    require_once "seat.html";
?>