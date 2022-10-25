<?php

$pdo = new PDO('sqlite:./db/score.db');

if (!$pdo) {
    die('接続失敗です。' . $sqliteerror);
}
$gen_array = array("1","2","3","4","5","6","7","8","9","all","challenge","test",);
foreach($gen_array as $gen){
    $query = "ALTER TABLE gen_".$gen."_num_answers ADD COLUMN player_id TEXT;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
    
    $query = "ALTER TABLE gen_".$gen."_clear_time ADD COLUMN player_id TEXT;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
    
    $query = "ALTER TABLE gen_".$gen."_ranking ADD COLUMN player_id TEXT;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
}

$pdo =null;
?>