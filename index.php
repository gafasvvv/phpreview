<?php
    //session_start関数でセッション開始
    session_start();
    require_once './function.php';
    if(empty($_SESSION['user']['user_id'])){
        //login.phpへリダイレクト
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'login.php');
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>
    <div>
        <h2>一覧画面</h2>
        <a href="post.php">投稿画面へ</a>
    </div>
    <tr>
        <th>user_id</th>
        <th>タイトル</th>
        <th>本文</th>
    </tr>
    <br />
    <?php
        $csv = 'csv/board.csv';
        $readCsv = readCsv($csv);
    ?>
</body>
</html>