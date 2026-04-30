<?php
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}
else{
    $lang = "ja";
}
if ($lang == "en-us"){
    $dsn = "sqlite:".$_SERVER['DOCUMENT_ROOT']."/db/score_english.db";
}else{
    $dsn = "sqlite:".$_SERVER['DOCUMENT_ROOT']."/db/score.db";
}
$pdo = new PDO($dsn);

if (!$pdo) {
    die('接続失敗です。' . $sqliteerror);
}
$gen_array = array("1","2","3","4","5","6","7","8","9","all","challenge","test");
foreach($gen_array as $gen){
    $query = "SELECT avg(num_answers), count(num_answers) from gen_".$gen."_num_answers;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
    $data = $stmt->fetch();
    var_dump($data);
    $average = round($data[0]);
    $players = $data[1];
    $query = "UPDATE average_num_answers SET average_num_answers = :average, num_players = :players WHERE gen = :gen";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':average', $average, PDO::PARAM_INT);
    $stmt->bindParam(':players', $players, PDO::PARAM_INT);
    $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);
    $res = $stmt->execute();

    
    $query = "SELECT avg(clear_time), count(clear_time) from gen_".$gen."_clear_time;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
    $data = $stmt->fetch();
    var_dump($data);
    $average = round($data[0]);
    $players = $data[1];
    $query = "UPDATE average_clear_time SET average_time = :average, num_players = :players WHERE gen = :gen";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':average', $average, PDO::PARAM_INT);
    $stmt->bindParam(':players', $players, PDO::PARAM_INT);
    $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);
    $res = $stmt->execute();
}
$pdo =null;
?>