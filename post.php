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
        <h2>投稿画面</h2>
        <a href="index.php">一覧画面へ</a>
    </div>
    <form method="POST" action="write.php">
        <label for="title">タイトル: </label>
        <input id="title" type="text" name="title" size="20" />
        <br />
        <label for="body">本文: </label>
        <input id="body" type="text" name="body" size="50" />
        <br />
        <input type="submit" value="投稿" />
    </form>
</body>
</html>