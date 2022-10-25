<?php

$dsn = 'sqlite:./db/score.db';
try {
    $pdo = new PDO($dsn);

    $gen = $_POST['gen'];
    $clear_time = $_POST['clear_time'];
    $last_pokemon = $_POST['last_pokemon'];
    $player_id= $_POST['player_id'];

    $table_name = "gen_" . $gen . "_clear_time";
    $query = "INSERT OR REPLACE INTO " . $table_name . " (clear_time, last_pokemon, ip_address, player_id) VALUES (:clear_time, :last_pokemon, :ip_address, :player_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':clear_time', $clear_time, PDO::PARAM_INT);
    $stmt->bindParam(':last_pokemon', $last_pokemon, PDO::PARAM_STR);
    $stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
    $stmt->bindParam(':player_id', $player_id, PDO::PARAM_STR);
    $res = $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
$pdo = null;
?>