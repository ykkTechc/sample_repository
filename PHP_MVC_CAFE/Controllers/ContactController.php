
<?php


require_once(ROOT_PATH .'Models/ContactModel.php');

class ContactController {
    private $request;  // リクエストパラメータ(GET,POST)
    private $Contact;   // Playerモデル
    private $Text;

    public function __construct() {
        // リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        // モデルオブジェクトの生成
        $this->Contact = new ContactModel();
        $this->Text    = new ContactModel();
        // 別モデルと連携
        $dbh = $this->Contact;
    }

    public function contact($data) 
    {
        $this->Contact->contact($data);
    }

    public function text($edit) 
    {
        $this->Contact->text($edit);
    }



    public function index() {
         $pageFlag = 0;
        if (isset($this->request['get']['pageFlag'])) {
            $pageFlag = $this->request['get']['pageFlag'];
}

        $contacts = $this->Contact->findAll($pageFlag);
        $params = [
          'contacts' => $contacts,
          'page' => $pageFlag // ページ番号
        ];
        return $params;
    }
}
?>