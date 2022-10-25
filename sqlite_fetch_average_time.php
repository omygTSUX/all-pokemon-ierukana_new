<?php

$dsn = 'sqlite:./db/score.db';
try {
    $pdo = new PDO($dsn);

    $gen = $_POST['gen'];

    $stmt = $pdo->prepare("SELECT * FROM average_clear_time WHERE gen = :gen");
    $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);
    $res = $stmt->execute();

    $data = $stmt->fetch();
    $num_players = $data["num_players"];
    $average_time = $data["average_time"];
    
} catch (PDOException $e) {
    $average_time = "[通信エラー]";
    $num_players = "[通信エラー]";
}
$pdo = null;
$res_array = array('average_time' => $average_time, 'num_players' => $num_players);

echo json_encode($res_array, JSON_UNESCAPED_UNICODE);
?>