<?php

$dsn = 'sqlite:./db/score.db';
try {
    $pdo = new PDO($dsn);

    $gen = $_POST['gen'];
    $clear_time = $_POST['clear_time'];

    $table_name = "gen_" . $gen . "_clear_time";
    $query = "INSERT INTO " . $table_name . " (clear_time) VALUES (:clear_time)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':clear_time', $clear_time, PDO::PARAM_INT);
    $res = $stmt->execute();

    $stmt = $pdo->prepare("SELECT * FROM average_clear_time WHERE gen = :gen");
    $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);
    $res = $stmt->execute();

    $data = $stmt->fetch();
    $new_num_players = $data["num_players"] + 1;
    $new_average_time = round(($data["average_time"] * $data["num_players"] + $clear_time) / $new_num_players);

    $stmt2 = $pdo->prepare("UPDATE average_clear_time SET average_time = :new_average_time, num_players = :new_num_players WHERE gen = :gen");

    $stmt2->bindParam(':gen', $gen, PDO::PARAM_STR);
    $stmt2->bindParam(':new_average_time', $new_average_time, PDO::PARAM_INT);
    $stmt2->bindParam(':new_num_players', $new_num_players, PDO::PARAM_INT);

    $res = $stmt2->execute();

    $pdo = null;
} catch (PDOException $e) {
    $new_average_time = "[通信エラー]";
    $new_num_players = "[通信エラー]";
    $pdo = null;
}
$res_array = array('average_time' => $new_average_time, 'num_players' => $new_num_players);

echo json_encode($res_array, JSON_UNESCAPED_UNICODE);
