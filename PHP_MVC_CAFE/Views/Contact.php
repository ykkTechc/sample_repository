<?php


function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

require 'validation.php';
require_once(ROOT_PATH .'Controllers/ContactController.php');

    
if (!empty($_GET["id"])) {
  try {
      $dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASSWD);

      $stmt = $dbh->prepare('DELETE FROM contacts WHERE id = :id');

      $stmt->execute(array(':id' => $_GET["id"]));

  } catch (Exception $e) {
      echo 'エラーが発生しました。:' . $e->getMessage();
  }    
}

$create = new ContactController();
$edit = new ContactController();
$params = $edit->index();


/// $pageFlagにて切り替え
/// 入力画面

    $pageFlag = 0;
    $errors = validation($_POST);
/// 確認画面
if (!empty($_POST['btn_confirm']) && empty($errors)) {
    $pageFlag = 1;
}
/// 完了画面
if (!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
    var_dump($_POST);
    $create->contact($_POST); 

}
/// 更新画面
if (!empty($_POST["btn_edit"])) {
    $pageFlag = 3;

}



?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/css/base.css">
<link rel="stylesheet" type="text/css" href="/css/st.css">
<link rel="stylesheet" type="text/css" href="/css/table.css">
<script src="validation.js"></script>
<script>
function confirmFunction1() {
confirm("外部のページを開きますか？");
}
</script>
</head>

<body>
<div class = "container">

<!-- 入力画面フォーム -->
<?php if($pageFlag === 0 ) : ?>

<!-- エラー文表示 -->
<?php 
if(!empty($errors) &&  !empty($_POST['btn_confirm'])) : 

?>
<?php echo '<ul>' ; ?>
<?php
      foreach ($errors as $error){
      echo '<li>'. $error . '</li>' ;
    }
?>
<?php echo '</ul>' ; ?>
<?php endif ;?>


  <div class = "title">
    <h1>入力画面</h1>
  </div>
  <form method="POST" action="contact.php">
    <p>氏名</p>
  <input type="text" name="name" id="inputName" value="<?php if(!empty($_POST['name'])) { echo h($_POST['name']); } ?>" >
  <br>
    <p>フリガナ</p>
  <input type="text" name="kana" id="inputKana" value="<?php if(!empty($_POST['kana'])) { echo h($_POST['kana']); } ?>" >
  <br>
    <p>電話番号</p>
  <input type="text" name="tel" value="<?php if(!empty($_POST['tel'])) { echo h($_POST['tel']); } ?>" >
  <br>
    <p>メールアドレス</p>
  <input type="email" name="email" id="inputMail" value="<?php if(!empty($_POST['email'])) { echo h($_POST['email']); } ?>" >
  <br>
    <p>お問い合わせ内容</p>
  <textarea name="body" id="inputBody"><?php if(!empty($_POST['body'])) { echo h($_POST['body']);}?></textarea> 
    <p><input type="submit" name="btn_confirm" id="btnConfirm" value="送信"> </p>
  <br> 
  </form>
  <section>
    <table border="1">
      <tbody>
        <tr>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>お問い合わせ内容</th>
            <th>編集ボタン</th>
            <th>削除ボタン</th>
        </tr>
        <?php foreach($params['contacts'] as $content): ?>
        <tr>
            <td><?=$content['name'] ?></td>
            <td><?=$content['kana'] ?></td>
            <td><?=$content['tel'] ?></td>
            <td><?=$content['email'] ?></td>
            <td><?=$content['body'] ?></td>
            <td>
              <?php echo "<a href=edit.php?id=" . $content["id"] . ">編集</a>\n"; ?>
            </td>
            <td>
            <?php echo "<a onclick=confirmFunction1() href=contact.php?id=" . $content["id"] . ">削除</a>\n"; ?>
            </td>
        </tr>
        </tbody>
        <?php endforeach; ?>
        </table>
    </section>
<?php endif; ?>



<!-- 確認画面フォーム -->
<?php if($pageFlag === 1 ) : ?>
  <h1>確認画面</h1>
  <form method="POST" action="contact.php">
    <p>氏名</p>
    <?php echo h($_POST['name']);?>
    <br>
    <p>フリガナ</p>
    <?php echo h($_POST['kana']);?>
    <br>
    <p>電話番号</p>
    <?php echo h($_POST['tel']);?>
    <br>
    <p>メールアドレス</p>
    <?php echo h($_POST['email']);?>
    <br>
    <p>お問い合わせ</p>
    <?php echo h($_POST['body']);?>
    <br>
    <p>上記の内容でよろしいですか？</p>
    <input type="submit" name="back"        value="キャンセル">
    <input type="submit" name="btn_submit"  value="送信">                           
    <input type="hidden" name="name"        value="<?php echo h($_POST['name']); ?>" >  
    <input type="hidden" name="kana"        value="<?php echo h($_POST['kana']); ?>" >
    <input type="hidden" name="tel"         value="<?php echo h($_POST['tel']); ?>" >
    <input type="hidden" name="email"       value="<?php echo h($_POST['email']); ?>" >
    <input type="hidden" name="body"        value="<?php echo h($_POST['body']); ?>" >
  </form>
<?php endif; ?>



<!-- 完了画面フォーム -->
<?php if($pageFlag === 2 ) : ?>
  <p>完了画面</p>
<br>
お問合せ内容を送信しました。
<br>
ありがとうございました。
<br>
<form>
<input type="submit" name="back" value="キャンセル">
</form>
<?php endif; ?>

</div>
</body>
</html>