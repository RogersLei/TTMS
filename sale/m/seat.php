<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');
    mysqli_set_charset($con,"utf8");
    $name = isset($_GET['name'])?$_GET['name']:"";
    $row = isset($_GET['row'])?$_GET['row']:"";
    $col = isset($_GET['col'])?$_GET['col']:"";
    $id = isset($_GET['id'])?$_GET['id']:"";

//          判断数据表中是否存在
    $sql = "select * from Seat where Studio_ID=$id and Seat_Row=$row and Seat_Col=$col";
    $result1 = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result1);

    $clickrow = isset($_GET['crow'])?$_GET['crow']:"";
    $clickcol = isset($_GET['ccol'])?$_GET['ccol']:"";

    if(!$con){echo "{'status':'error'}";}
    else{
        if(!$num){ //初次进入
            //echo "<script>alert('1');</script>";
            $type = "未锁定";

            for($i=1;$i<=$row;$i++){
                for($j=1;$j<=$col;$j++){
                    $sql1 = "insert into Seat (Studio_ID,Seat_Row,Seat_Col,Seat_Status) values ($id,$i,$j,'".$type."')";
                    mysqli_query($con,$sql1);
                }
            }
        }
        else{
            if(isset($_GET['type'])){//修改
                $type = $_GET['type'];
                $sql3 = "update Seat set Seat_Status='".$type."' where Studio_ID=$id and Seat_Row=$row and Seat_Col=$col ";
                $result3 = mysqli_query($con,$sql3);
            }
            else{
                $stype = "";
                //echo "<script>alert('2');</script>";
                if(isset($_GET['crow'])){  //是否点击
                    $sql2 = "select Seat_Status from Seat where Studio_ID=$id and Seat_Row=$clickrow and Seat_Col=$clickcol";
                    $result2 = mysqli_query($con,$sql2);
                    //echo $result2;
                    $Status = array();
                    while($array = mysqli_fetch_array($result2)){
                      $Status[] = $array;
                    }
                    $stype = $Status[0]['Seat_Status'];
                    //echo "<script>alert('".$stype."');</script>";
                }

                $sql4 = "select * from Seat where Studio_ID=$id";
                $result4 = mysqli_query($con,$sql4);
                $seatlist = array();
                while($array = mysqli_fetch_array($result4)){
                  $seatlist[] = $array;
                }

                $fa = array();
                //$count = count($seatlist);
                $k = 0 ;
                for($i=1;$i<$row+1;$i++){
                    for($j=1;$j<$col+1;$j++){
                        while($k<count($seatlist)){
                            $type = $seatlist[$k]['Seat_Status'];
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
                //echo "<script>alert($count);</script>";
                //$test = $seatlist[5]['Seat_Status'];
                //echo "<script>alert($test);</script>";
            }
        }
    }
    require "seat.html";
?>