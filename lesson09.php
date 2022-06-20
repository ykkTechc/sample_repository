<?php
$scores = array(10,60,90,70,50);
 foreach ($scores as $score) {
   if ($score>=80) {
    $count = '優';
   }
   elseif ($score>=60) {
    $count = '良';
   }
   elseif ($score>=40) {
    $count = '可';
   }
   else {
    $count = '不可';
   }
   echo $score.'は'.$count.'です。' ;
 }
?>

<!-- 
// 配列に「10,60,90,70,50」を点数として格納し
// それぞれをif文で

// 80点以上なら「優」
// 60点以上なら「良」
// 40点以上なら「可」
// それ以下なら「不可」

// という形で区別し、
// ○○点は「○」です。と出力してください。 -->
