<?php
require 'validation.php';

?>

<?php 
  var_dump($_POST);
  $errors = validation($_POST); 

  if (!empty($_POST['edit_confirm']) && empty($errors)) {
    try {
    $dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASSWD);

    $stmt = $dbh->prepare('UPDATE contacts SET name = :name, kana = :kana , tel = :tel , email = :email , body = :body WHERE id = :id');

    $stmt->execute(array(':name' => $_POST['name'], ':kana' => $_POST['kana'], ':tel' => $_POST['tel'], ':email' => $_POST['email'], ':body' => $_POST['body'], ':id' => $_POST['id']));
    } catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
      }
    } elseif (!empty($errors) && !empty($_POST['edit_confirm'])) {
      foreach($errors as $error){
        echo '<li>'. $error . '</li>' ;
      }
    }
   
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>更新完了</title>
  </head>
  <body>          
    <h2>更新が完了しました</h2>
  <p>
      <a href="Contact.php">投稿一覧へ</a>
  </p> 
  </body>
</html>
