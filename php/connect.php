<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');
    if($con){}
    else{echo "connect error";}
?>