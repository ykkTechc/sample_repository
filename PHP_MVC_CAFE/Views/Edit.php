<?php
session_start();
require_once(ROOT_PATH .'Controllers/ContactController.php');
try {

    $dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASSWD);

    $stmt = $dbh->prepare('SELECT * FROM contacts WHERE id = :id');

    $stmt->execute(array(':id' => $_GET["id"]));

    $result = 0;

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
}

require 'validation.php';
$edit = new ContactController();


$errors = validation($_POST);


if (!empty($_POST['edit_confirm']) && empty($errors)) {
    $edit->text($_POST); 
    header("Location: Contact.php");
} 

if (!empty($errors) && !empty($_POST['edit_confirm'])) {
    foreach ($errors as $error){
        echo '<li>'. $error . '</li>' ;
    }
}


?>

<!DOCTYPE html>
<html>
<head>

</head>
<meta charset="utf-8">
<script src="validation.js"></script>
<link rel="stylesheet" type="text/css" href="/css/st.css">
</head>
<body>



<title>編集</title>
                          <!-- $resultフォームの情報 -->
    
        <h2>更新画面</h2>
        <div class="form">
        <form action="" method="POST">
                <input type="hidden" name="id" value="<?php if (!empty($result['id'])) echo(htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'));?>">
            <p>
                <label>お名前：</label>
                <input type="text" name="name" value="<?php if (!empty($result['name'])) echo(htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>フリガナ：</label>
                <input type="text" name="kana" value="<?php if (!empty($result['kana'])) echo(htmlspecialchars($result['kana'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>電話番号：</label>
                <input type="text" name="tel" value="<?php if (!empty($result['tel'])) echo(htmlspecialchars($result['tel'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>メールアドレス：</label>
                <input type="text" name="email" value="<?php if (!empty($result['email'])) echo(htmlspecialchars($result['email'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>投稿内容：</label>
                <input type="text" name="body" value="<?php if (!empty($result['body'])) echo(htmlspecialchars($result['body'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>上記の内容でよろしいですか？</p>
            <p>
                <input type="submit" name="edit_confirm" id="btnConfirm"  value="更新">
            </p>
        </form>
        <form method="POST" action=Contact.php>
            <p> 
                <input type="submit" name="" value="キャンセル">
            </p>  
        </form>
        <br>
    </div>
    
            
</body>
</html> 