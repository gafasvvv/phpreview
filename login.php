<?php
    //XSS対策のため読み込んでいる
    require_once './encode.php';
    //session_start関数でセッション開始
    session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>
    <div>
    <form method="POST" action="session.php">
        <h2>ログイン画面</h2>
        <label for="user_id">ユーザーID: </label>
        <input id="user_id" type="text" name="user_id" size="20"
            value="<?=e($_SESSION['user_id'] ?? '')?>"/>
        <input type="submit" value="ログイン" />
    </form>
    </div>
</body>
</html>