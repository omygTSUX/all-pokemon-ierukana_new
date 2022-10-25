<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>サンプルページ</title>
  </head>
  <body>
    <h1>タイトル</h1>
    <!-- formからデータを受け取る -->
    <?php
    $word = $_GET['word'];
    echo $word;

    file_put_contents("sample.txt", $word);
?>
<?php
//ファイルを変数に入れる
$csv_file = file_get_contents('ranking_test.csv');

//変数を改行毎の配列に変換
$aryHoge = explode("\n", $csv_file);

$aryCsv = [];
foreach($aryHoge as $key => $value){
    //if($key == 0) continue; 1行目が見出しなど、取得したくない場合
    if(!$value) continue; //空白行が含まれていたら除外
    $aryCsv[] = explode(",", $value);
}
print_r($aryCsv);
?>
  </body>
</html>