<?php
    header('Content-Type:text/html;charset=utf-8');
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

    //var_dump($Schedulelist);
    //多表查询
//    for($i=0;$i<count($Schedulelist);$i++){
//        //var_dump($Schedulelist[$i]['Movie_Id']);
//        $Movie_Id = $Schedulelist[$i]['Movie_Id'];
//        $Studio_ID = $Schedulelist[$i]['Studio_ID'];
//        //var_dump($Movie_Id." ".$Studio_ID);
//        $sql = "select movie.Movie_Name,studio.Studio_Name FROM schedule,movie,studio WHERE movie.Movie_Id = schedule.Schedule_ID and studio.Studio_ID = schedule.Schedule_ID";
//    }
    require_once 'schedulepage.php';

    require_once "schedule.html";
    //require_once "../../js/menu.js";





    mysqli_close($con);
?>