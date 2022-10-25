<?php

$dsn = 'sqlite:./db/score.db';
try {
    $pdo = new PDO($dsn);

    $gen = $_POST['gen'];

    $stmt = $pdo->prepare("SELECT * FROM average_num_answers WHERE gen = :gen");
    $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);
    $res = $stmt->execute();

    $data = $stmt->fetch();
    $num_players = $data["num_players"];
    $average_num_answers = $data["average_num_answers"];
    
} catch (PDOException $e) {
    $average_num_answers = "[通信エラー]";
    $num_players = "[通信エラー]";
}
$pdo = null;
$res_array = array('average_num_answers' => $average_num_answers, 'num_players' => $num_players);

echo json_encode($res_array, JSON_UNESCAPED_UNICODE);
?>