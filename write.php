<?php
    require_once './function.php';
    writeCsv();
    //index.phpへリダイレクト
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');
?>