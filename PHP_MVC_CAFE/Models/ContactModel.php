
<?php
require_once(ROOT_PATH .'Models/Db.php');

class ContactModel extends Db {
    public function __construct($dbh = null) {
        parent::__construct($dbh);
    }
    public function contact($data)
    {  
        $name = $data['name'];
        $kana = $data['kana'];
        $tel = $data['tel'];
        $email = $data['email'];
        $body = $data['body'];
        $this->dbh->beginTransaction();
        try {
            $sql = "INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name,:kana,:tel,:email,:body)";
            $sth = $this->dbh->prepare($sql);
            $sth -> bindValue(':name', $name);
            $sth -> bindValue(':kana', $kana);
            $sth -> bindValue(':tel', $tel);
            $sth -> bindValue(':email', $email);
            $sth -> bindValue(':body', $body);
            $sth->execute();
            $this->dbh->commit();
        } catch (Exception $e) {
            echo "接続失敗: " . $e->getMessage() . "\n";
            exit();
        }
        }

        public function text($edit){
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
        }




        public function findAll($pageFlag = 0):Array {
            $sql = 'SELECT';
            $sql .= ' id,';
            $sql .= ' name,';
            $sql .= ' kana,';            
            $sql .= ' tel,';
            $sql .= ' email,';
            $sql .= ' body';
            $sql .= ' FROM contacts';

            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

    }
?>