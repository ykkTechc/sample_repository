<?php
function validation($request) {
    $errors = [];

    if (empty($request['name']) || 10 < mb_strlen($request['name']) ) {
        $errors[] = '氏名は必須です。　10文字以内で入力してください。';
    }
  
    if (empty($request['kana']) || 10 < mb_strlen($request['kana']) ) {
        $errors[] = 'フリガナは必須です。　10文字以内で入力してください。';
    }

    if (empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL) ) {
        $errors[] = 'メールアドレスは必須です。正しい形式で入力してください';
    }

    if (empty($request['body'])) {
        $errors[] = 'お問い合わせ内容は必須です。';
    }

    if (!empty($request['tel'])) {
        if (preg_match("/[0-9]{3}[0-9]{4}[0-9]{3}/", $request['tel']) === 0) {
            $errors[] = '電話番号を正しい形式で入力してください';
        }
    }

    return $errors;
}
?>