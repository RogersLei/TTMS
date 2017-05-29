<?php
    header('Content-Type:text/html;charset=utf-8');

    $list = array(
        array('username'=>"张三","useraccount"=>"zhangs","userpassword"=>"123456"),
        array('username'=>"张","useraccount"=>"zhan","userpassword"=>"123654"),
        array('username'=>"三","useraccount"=>"s","userpassword"=>"132465"),
        array('username'=>"张三","useraccount"=>"zhangs","userpassword"=>"123456"),
        array('username'=>"张","useraccount"=>"zhan","userpassword"=>"123654"),
        array('username'=>"三","useraccount"=>"s","userpassword"=>"132465"),
        array('username'=>"张三","useraccount"=>"zhangs","userpassword"=>"123456"),
        array('username'=>"张","useraccount"=>"zhan","userpassword"=>"123654"),
        array('username'=>"三","useraccount"=>"s","userpassword"=>"132465"),
        array('username'=>"张三","useraccount"=>"zhangs","userpassword"=>"123456"),
        array('username'=>"张","useraccount"=>"zhan","userpassword"=>"123654"),
        array('username'=>"三","useraccount"=>"s","userpassword"=>"132465")
    );

    require_once 'page.php';

    require_once "user.html";
    //require_once "../../js/menu.js";

?>