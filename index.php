<?php
    require_once './function.php';
    if(empty($_SESSION['user_id'])){
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
        <th>ID</th>
        <th>タイトル</th>
        <th>本文</th>
        <th>USER ID</th>
    </tr>
    <br />
    <?php
        $csv = 'csv/board.csv';
        $readCsv = readCsv($csv);
    ?>
</body>
</html>