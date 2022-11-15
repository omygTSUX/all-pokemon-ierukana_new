<?php

$pdo = new PDO('sqlite:./db/score.db');

if (!$pdo) {
    die('接続失敗です。' . $sqliteerror);
}
$gen_array = array("1","2","3","4","5","6","7","8","9","all","challenge","test");
foreach($gen_array as $gen){
    $query = "SELECT num_answers FROM gen_".$gen."_num_answers ORDER BY num_answers;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
    $data = $stmt->fetchAll();
    // echo var_dump($data);
    $players = count($data);
    $median_index = intdiv($players, 2);
    $median = $data[$median_index][0];
    echo $gen." ".$median_index." ".$median."<br>";
    // $query = "UPDATE average_num_answers SET average_num_answers = :average, num_players = :players WHERE gen = :gen";
    // $stmt = $pdo->prepare($query);
    // $stmt->bindParam(':average', $median, PDO::PARAM_INT);
    // $stmt->bindParam(':players', $players, PDO::PARAM_INT);
    // $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);
    // $res = $stmt->execute();

    
    $query = "SELECT clear_time from gen_".$gen."_clear_time ORDER BY clear_time;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
    $data = $stmt->fetchAll();
    // echo var_dump($data);
    $players = count($data);
    $median_index = intdiv($players, 2);
    $median = $data[$median_index][0];
    echo $gen." ".$median_index." ".$median."<br>";
    // $query = "UPDATE average_clear_time SET average_time = :average, num_players = :players WHERE gen = :gen";
    // $stmt = $pdo->prepare($query);
    // $stmt->bindParam(':average', $median, PDO::PARAM_INT);
    // $stmt->bindParam(':players', $players, PDO::PARAM_INT);
    // $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);
    // $res = $stmt->execute();
}
$pdo =null;
?>