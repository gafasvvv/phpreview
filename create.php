<?php
    //関数をまとめたファイルを読み込み
    require_once 'DatabaseController.php';
    $bbs = new DatabaseController();
    $bbs -> create();
    //index.phpへリダイレクト
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');