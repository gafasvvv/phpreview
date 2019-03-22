<?php
    require_once 'Database.php';
    Database::getDb();
    require_once 'DatabaseController.php';
    DatabaseController::redirect();
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
        <th>ユーザー名</th>
        <th>タイトル</th>
        <th>本文</th>
    </tr>
    <br />
    <?php
        $databaseController = new DatabaseController();
        $databaseController -> index();
    ?>
</body>
</html>