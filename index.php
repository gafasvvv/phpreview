<?php
    require_once './encode.php';
    require_once './function.php';
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>
    <div>
        <a href="/post.php">投稿画面</a>
    </div>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>本文</th>
        <th>USER ID</th>
    </tr>
    <br />
    <?php
        $readCsv = readCsv();
    ?>
</body>
</html>