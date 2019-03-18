<?php
    //session_start関数でセッション開始
    session_start();
    //csvファイルを開いて中身を読み込み
    $file = fopen('user.csv', 'r+');
    $line = fgetcsv($file, 1024, ",");
    //配列で返ってきたデータから必要なuser_idを取り出す
    $user_id = $line[2];
    //user.csvのuser_idと入力されたユーザーIDとが合致するかの処理       
    if($_POST['user_id'] === $user_id){
        $_SESSION['user_id'] = $_POST['user_id'];
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'index.php');
    } //合致しなければログイン画面へリダイレクト
    else {
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'login.php');
    }
    //csvファイルを閉じる
    fclose($file);
?>
