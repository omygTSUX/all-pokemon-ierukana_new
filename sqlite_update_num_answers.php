<?php

$dsn = 'sqlite:./db/score.db';
try {
    $pdo = new PDO($dsn);

    $gen = $_POST['gen'];
    $num_answers = $_POST['num_answers'];

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $stmt = $pdo->prepare("SELECT * FROM average_num_answers WHERE gen = :gen");
    $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);
    $res = $stmt->execute();

    $data = $stmt->fetch();
    $new_num_players = $data["num_players"] + 1;
    $new_average_num_answers = round(($data["average_num_answers"] * $data["num_players"] + $num_answers) / $new_num_players);

    $stmt2 = $pdo->prepare("UPDATE average_num_answers SET average_num_answers = :new_average_num_answers, num_players = :new_num_players WHERE gen = :gen");

    $stmt2->bindParam(':gen', $gen, PDO::PARAM_STR);
    $stmt2->bindParam(':new_average_num_answers', $new_average_num_answers, PDO::PARAM_INT);
    $stmt2->bindParam(':new_num_players', $new_num_players, PDO::PARAM_INT);

    $res = $stmt2->execute();

    $pdo = null;
} catch (PDOException $e) {
    $new_average_num_answers = "[通信エラー]";
    $new_num_players = "[通信エラー]";
    $pdo = null;
}
$res_array = array('average_num_answers' => $new_average_num_answers, 'num_players' => $new_num_players);

echo json_encode($res_array, JSON_UNESCAPED_UNICODE);
