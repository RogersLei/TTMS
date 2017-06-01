<?php
    header('Content-Type:text/html;charset=utf-8');

    $total_num = count($Studiolist);  //总记录数
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
?>