<?php
    //関数をまとめたファイルを読み込み
    require_once 'BbsController.php';
    $bbs = new BbsController();
    $bbs -> create();
    //index.phpへリダイレクト
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');