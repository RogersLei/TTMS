<?php
    header('Content-Type:text/html;charset=utf-8');
    $id = isset($_GET['id'])?$_GET['id']:"";   //schedule id
    $movie = isset($_GET['movie'])?$_GET['movie']:"";
    $studio = isset($_GET['studio'])?$_GET['studio']:"";

    $con = mysqli_connect('localhost','root','','ttms');
    mysqli_set_charset($con,"utf8");

    if(!$con){
        echo "{'status':'error'}";
    }
    else{
        $sql1 = "select * from Movie where Movie_Name='".$movie."'";
        $result1 = mysqli_query($con,$sql1);
        $movie_list = array();
        while($array = mysqli_fetch_array($result1)){
            $movie_list[] = $array;
        }
        //echo $movie_list[0]['Movie_Price'];
        $sql2 = "SELECT Studio_Row,Studio_Col,Sale_Status,Studio_ID FROM studio,sale where Studio_ID in (SELECT Studio_ID FROM `schedule` WHERE Schedule_ID=$id) AND Schedule_ID=$id";
        //echo $sql2;
        $result2 = mysqli_query($con,$sql2);
        $studio_list = array();
        while($array = mysqli_fetch_array($result2)){
            $studio_list[] = $array;
        }
        $row = $studio_list[0]['Studio_Row'];
        $col = $studio_list[0]['Studio_Col'];
        //echo $row;
        $k = 0 ;
        for($i=1;$i<=$row;$i++){
            for($j=1;$j<=$col;$j++){
                while($k<count($studio_list)){
                    $type = $studio_list[$k]['Sale_Status'];
                    if($type == "未锁定" ){
                        $fa[$i][$j] = "circle-o";
                        break;
                    }
                    else if($type == "已锁定" ){
                        $fa[$i][$j] = "clock-o";
                        break ;
                    }
                    else if($type == "已交易"){
                        $fa[$i][$j] = "check-circle-o";
                        break ;
                    }
                    else if($type == "已损坏"){
                        $fa[$i][$j] = "times-circle-o";
                        break ;
                    }
                }
                $k++;
            }
        }
        $sql3 = "select `schedule`.Start_Time,`schedule`.End_Time FROM schedule WHERE schedule.Schedule_ID = $id";
        $result3 = mysqli_query($con,$sql3);
        $scheduletime = array();
        while($array = mysqli_fetch_array($result3)){
            $scheduletime[] = $array;
        }
    }
    require_once "show_movie.html";

?>