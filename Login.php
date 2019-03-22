<?php
    require_once 'htmlspecialchars.php';
    require_once 'DatabaseController.php';
    DatabaseController::login();
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
        <label for="login_id">ログインID: </label>
        <input id="login_id" type="text" name="login_id" size="20"
            value="<?=e($_POST['login_id'] ?? '')?>"/>
        <input type="submit" value="ログイン" />
    </form>
    </div>
</body>
</html>