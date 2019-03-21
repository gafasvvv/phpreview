<?php
    //htmlspecialchars関数の読み込み
    require_once './htmlspecialchars.php';
    require_once 'Login.php';
    $login = new Login();
    $login -> login();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>
    <div>
    <form method="POST" action="">
        <h2>ログイン画面</h2>
        <label for="user_id">ユーザーID: </label>
        <input id="user_id" type="text" name="user_id" size="20"
            value="<?=e($_POST['user_id'] ?? '')?>"/>
        <input type="submit" value="ログイン" />
    </form>
    </div>
</body>
</html>