<?php
    require_once 'BbsController.php';
    BbsController::redirect();
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
        $bbsController = new BbsController();
        $bbsController -> index();
    ?>
</body>
</html>