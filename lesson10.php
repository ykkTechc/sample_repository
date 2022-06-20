<?php
$w = date("w");
$week = array("日","月","火","水","木","金","土");
$today = date("Y年m月d日")."($week[$w]曜日)";
echo ($today);
?>
<!-- // 
今日の日付けを以下の形式で表示してください。
// xxxx年xx月xx日（x曜日） 
-->
