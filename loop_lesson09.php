<?php

// 以下配列の中身をfor文を使用して表示してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7,  'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
$sum=[];
$tbody="<tbody>\n";
for( $i=0; $i<count($arr); $i++ ){
    $tbody.="<tr>\n";
    $tbody.="<th>".array_keys($arr)[$i]."</th>";
    for($j=0;$j<count(array_values($arr)[$i]);$j++){
        $val=array_values(array_values($arr)[$i])[$j];
        $tbody.="<td>$val</td>";
        if(!isset($sum[$j]))$sum[$j]=0;
        $sum[$j]+=$val;
    }
    $tbody.="<td>".array_sum(array_values($arr)[$i])."</td>";
    $tbody.="</tr>\n";
}
$tbody.="<tr>\n";
$tbody.="<th>計</th>";
for($i=0;$i<count(array_values($arr)[0]);$i++){
    $tbody.="<td>".$sum[$i]."</td>";
}
$tbody.="<td>".array_sum($sum)."</td>";
$tbody.="</tr>\n";

$tbody.="</tbody>\n";
?>
<!DOCTYPE html>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
border:1px solid #000;
}
</style>
<table>
<thead>
<tr>
<th>_____</th>
<th>_c1</th>
<th>_c2</th>
<th>_c3</th>
<th>計</th>
</tr>
</thead>
<?= $tbody;?>
</table>
</body>
</html>