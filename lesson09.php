<?php
$scores = array(10,60,90,70,50);
 foreach ($scores as $score) {
   if ($score<40) {
    $count = "不可";
   }
   elseif ($score>=90) {
    $count = "優";
   }
   elseif ($score>=60) {
    $count = "良";
   }
   else {
    $count = "可";
   }
   echo $score."は".$count."です。" ;
 }
 
?>


