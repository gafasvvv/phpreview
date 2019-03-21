<?php
    //関数をまとめたファイルを読み込み
    require_once 'Csv.php';
    $csv = new Csv('csv/board.csv');
    $csv -> writeCsv();
    //index.phpへリダイレクト
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');