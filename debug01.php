<?php
// デバック練習
// 氏名入力時に入力内容が表示されるようにプログラムを完成させてください。
if (!empty($_POST)) {
    $lastName = $_POST['last_name'];
    $firstName= $_POST['first_name'];
    if ($lastName != null && $firstName != null) {
        echo '私の名前は'.$lastName.$firstName.'です。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>デバック練習</title>
</head>
<body>
    <section>
    <form action='debug01.php' method="POST">
        <label>姓</label>
        <input type="text" name="last_name">
        <label>名</label>
        <input type="text" name="first_name">
        <input type="submit" value="送信する">
    </form>
    </section>
</body>
</html>