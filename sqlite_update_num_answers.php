<?php

if ($_POST['lang'] == "en-us"){
    $dsn = "sqlite:".$_SERVER['DOCUMENT_ROOT']."/db/score_english.db";
}else{
    $dsn = "sqlite:".$_SERVER['DOCUMENT_ROOT']."/db/score.db";
}

try {
    $pdo = new PDO($dsn);

    $gen = $_POST['gen'];
    $num_answers = $_POST['num_answers'];
    $player_id= $_POST['player_id'];
    if($num_answers > 0){
        $table_name = "gen_" . $gen . "_num_answers";
        $query = "INSERT OR REPLACE INTO " . $table_name . " (num_answers, ip_address, player_id) VALUES (:num_answers, :ip_address, :player_id)";
        echo($query);
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
        $stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
        $stmt->bindParam(':player_id', $player_id, PDO::PARAM_STR);
        $stmt->execute();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
$pdo = null;
?>