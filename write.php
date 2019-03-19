<?php
    //関数をまとめたファイルを読み込み
    require_once './function.php';
    $csv = 'csv/board.csv';
    writeCsv($csv);
    //index.phpへリダイレクト
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');