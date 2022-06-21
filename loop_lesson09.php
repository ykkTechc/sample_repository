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

$arr = array(
            array('a1' => 10, 'b2' => 7, 'c3' => 25),
            array('a1' => 5,  'b2' => 8, 'c3' => 9),
            array('a1' => 20, 'b2' => 12, 'c3' => 130),
            array('d1' => 10, 'e2' => 5, 'f3' => 20),
            array('d1' => 7, 'e2' => 8, 'f3' => 12),
            array('d1' => 25, 'e2' => 9, 'f3' => 130),
          );
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
<table>
    <?php
    foreach ($arr as $arr_1) {
        $sum += $arr_1[a1];
        $sum_1 += $arr_1[b2];
        $sum_2 += $arr_1[c3];
        $sum_3 += $arr_1[d1];
        $sum_4 += $arr_1[e2];
        $sum_5 += $arr_1[f3];
        $sum_6 += $sum + $sum_1 + $sum_2 + $sum_3 + $sum_4 + $sum_5;
    }

    ?>
    <tr><th>_____</th><th>_c1</th><th>_c2</th><th>_c3</th><th>横合計</th></tr>
    <tr><td>___r1</td><td>_10</td><td>__5</td><td>_20</td><td><?php echo "___".$sum;?></td></tr>
    <tr><td>___r2</td><td>__7</td><td>__8</td><td>_12</td><td><?php echo "___".$sum_1?></td></tr>
    <tr><td>___r3</td><td>_25</td><td>__9</td><td>130</td><td><?php echo "__".$sum_2?></td></tr>
    <tr><td>縦合計</td><td><?php echo "_".$sum_3?></td><td><?php echo "_".$sum_4 ?></td><td><?php echo $sum_5 ?></td><td><?php echo $sum_6 ?></td></tr>

</table>


</body>

</html>