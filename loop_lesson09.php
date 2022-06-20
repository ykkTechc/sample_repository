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
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
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
    $a=10;
    $b=5;
    $c=20; 
    $plus=$a+$b+$c;
    $d=7;
    $e=8;
    $f=12;
    $plus2=$d+$e+$f;
    $g=25;
    $h=9;
    $i=130;
    $plus3=$g+$h+$i;
    $vertical=$a+$d+$g;
    $vertical2=$b+$e+$h;
    $vertical3=$c+$f+$i;
    $vertical4=$plus+$plus2+$plus3;
    ?>
    <tr><th>_____</th><th>_c1</th><th>_c2</th><th>_c3</th><th>横合計</th></tr>
    <tr><td>___r1</td><td>_10</td><td>__5</td><td>_20</td><td><?php echo "___".$plus; ?></td></tr>
    <tr><td>___r2</td><td>__7</td><td>__8</td><td>_12</td><td><?php echo "___".$plus2; ?></td></tr>
    <tr><td>___r3</td><td>_25</td><td>__9</td><td>130</td><td><?php echo "__".$plus3; ?></td></tr>
    <tr><td>縦合計</td><td><?php echo "_".$vertical; ?></td><td><?php echo "_".$vertical2; ?></td><td><?php echo $vertical3; ?></td><td><?php echo "__".$vertical4; ?></td></tr>
</table>

    <!-- ここにテーブル表示 -->
</body>
</html>