<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>
    <div>
        <a href="/index.php">一覧画面</a>
    </div>
    <form method="POST" action="/write.php">
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