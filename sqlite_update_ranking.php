<?php

if ($_POST['lang'] == "en-us"){
    $dsn = "sqlite:".$_SERVER['DOCUMENT_ROOT']."/db/score_english.db";
}else{
    $dsn = "sqlite:".$_SERVER['DOCUMENT_ROOT']."/db/score.db";
}
$pdo = new PDO($dsn);

if (!$pdo) {
    die('接続失敗です。' . $sqliteerror);
}

$clear_time = $_POST['clear_time'];
$gen = $_POST['gen'];
$name = htmlspecialchars(mb_substr($_POST['name'], 0, 12), ENT_QUOTES, "UTF-8");
$player_id = $_POST['player_id'];

$table_name = "gen_" . $gen . "_ranking";
$query = "INSERT OR REPLACE INTO " . $table_name . " (name, clear_time, ip_address, player_id) VALUES (:name, :clear_time, :ip_address, :player_id)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':clear_time', $clear_time, PDO::PARAM_INT);
$stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
$stmt->bindParam(':player_id', $player_id, PDO::PARAM_STR);

$res = $stmt->execute();
$pdo = null;
?>