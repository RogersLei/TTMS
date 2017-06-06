<?php
    header('Content-Type:text/html;charset=utf-8');

    session_start();
    if(!isset($_SESSION['name'])){
        header('Location:../index.html');
    }

    $con = mysqli_connect('localhost','root','','ttms');
    mysqli_set_charset($con,"utf8");

    if(!$con){
        echo "{'status':'error'}";
    }
    else{
        $sql = "select schedule.Schedule_ID,movie.Movie_Name,studio.Studio_Name,`schedule`.Start_Time,`schedule`.End_Time FROM schedule,movie,studio WHERE movie.Movie_Id = schedule.Movie_Id and studio.Studio_ID = schedule.Studio_ID";
        $Schedulelist = array();
        $result = mysqli_query($con,$sql);
        while($array = mysqli_fetch_array($result)){
          $Schedulelist[] = $array;
        }
    }
    $total_num = count($Schedulelist);  //总记录数
    $perpage = 5;               //每页记录数
    $page = isset($_GET['page'])?(int)$_GET['page']:1;
    $total_page = ceil($total_num/$perpage); //总页数

    $page = max($page,1);
    $page = min($page,$total_page);
    $pre_page = $page-1<=0?$page:($page-1);
    $next_page = $page+1>$total_page?$page:($page+1);

    $start_index = $perpage*($page-1);
    $end_index = $perpage*$page-1;
    $end_index = min($end_index,$total_num-1);

    require_once "sale.html";
?>