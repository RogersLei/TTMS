<?php
    header('Content-Type:text/html;charset=utf-8');
    $con = mysqli_connect('localhost','root','','ttms');
    mysqli_set_charset($con,"utf8");
    error_reporting(0);
    $schnum = isset($_POST['schnum'])?$_POST['schnum']:"";
    $movnum = isset($_POST['movnum'])?$_POST['movnum']:"";  //name
    $stunum = isset($_POST['stunum'])?$_POST['stunum']:"";  //name
    $startt = isset($_POST['startt'])?$_POST['startt']:"";
    $endt = isset($_POST['endt'])?$_POST['endt']:"";
    $operation = $_POST['operation'];

    if(!$con){echo "{'status':'error'}";}

    //添加计划
    if($operation=="add"){
        //获取影片编号
        $sqlmn = "select Movie_Id from Movie where Movie_Name='".$movnum."' ";
        $resultmn = mysqli_query($con,$sqlmn);
        $mn = array();
        while($array = mysqli_fetch_array($resultmn)){
            $mn[] = $array;
        }
        $Movie_Id = $mn[0]['Movie_Id'];
        //echo $mn[0]['Movie_Id'];
        //获取影厅编号
        $sqlsn = "select Studio_ID from Studio where Studio_Name='".$stunum."' ";
        $resultsn = mysqli_query($con,$sqlsn);
        $sn = array();
        while($array = mysqli_fetch_array($resultsn)){
            $sn[] = $array;
        }
        $Studio_ID = $sn[0]['Studio_ID'];
        //echo $Studio_ID;
        if(!mysqli_num_rows($resultmn) || !mysqli_num_rows($resultsn)){
            echo "error";
            exit();
        }
        else{
            $sql = "insert into Schedule (Movie_Id,Studio_ID,Start_Time,End_Time) values ($Movie_Id,$Studio_ID,'".$startt."','".$endt."')";
            $result = mysqli_query($con,$sql);
            if(!$result){
            //echo "{'status':'sql error'}";
                echo mysqli_error($con);
                exit();
            }
            else{
                $sqlschnum = "select Schedule_ID from Schedule where Movie_Id=$Movie_Id and Studio_ID=$Studio_ID";
                $resultschnum = mysqli_query($con,$sqlschnum);
                $listschnum = array();
                while($array = mysqli_fetch_array($resultschnum)){
                    $listschnum[] = $array;
                }
                $Schedule_ID =  $listschnum[0]['Schedule_ID'];
                $sqlrc = "select Studio_Row,Studio_Col from Studio where Studio_ID=$Studio_ID ";
                $resultrc = mysqli_query($con,$sqlrc);
                $listrc = array();
                while($array = mysqli_fetch_array($resultrc)){
                    $listrc[] = $array;
                }
                $row = $listrc[0]['Studio_Row'];
                $col = $listrc[0]['Studio_Col'];
                //echo $row;
                //echo $col;
                for($i=1;$i<=$row;$i++){
                    for($j=1;$j<=$col;$j++){
                        $sqlseat = "select Seat_ID from Seat where Seat_Row=$i and Seat_Col=$j and Studio_ID=$Studio_ID";
                        $resultseat = mysqli_query($con,$sqlseat);
                        $listseat = array();
                        while($array = mysqli_fetch_array($resultseat)){
                            $listseat[] = $array;
                        }
                        $Seat_ID = $listseat[0]['Seat_ID'];
                        $Sale_Status = "未锁定";
                        //echo $Seat_ID."\n";
                        $sqlSale = "insert into Sale (Schedule_ID,Seat_ID,Sale_Status) values ($Schedule_ID,$Seat_ID,'".$Sale_Status."')";
                        //echo $sqlSale."\n";
                        $resultSale = mysqli_query($con,$sqlSale);
                        if(!$resultSale){
                            echo "error";
                            exit();
                        }
                    }
                }
                echo "success";
            }
        }
    }



    //修改计划
    else if($operation=="update"){
//       仅允许修改上映时间
    }
    //删除计划
    else if($operation=="del"){
        $schedulenum = $_POST['schedulenum'];
        $sql = "delete from Schedule where Schedule_ID=$schedulenum";
        $result = mysqli_query($con,$sql);
        if(!$result){
        //echo "{'status':'sql error'}";
            echo mysqli_error($con);
            exit();
        }
        else{
            echo "success";
        }
    }

?>