<?php

$pdo = new PDO('sqlite:./db/score.db');

if (!$pdo) {
    die('接続失敗です。' . $sqliteerror);
}

// $gen = "8";
// $table_name = "gen_" . $gen . "_clear_time";
// $query = "DELETE FROM " . $table_name . " WHERE player_id = '1665297999081946498351005'";
// $stmt = $pdo->prepare($query);
// $res = $stmt->execute();

// $table_name = "gen_" . $gen . "_ranking";
// $query = "DELETE FROM " . $table_name . " WHERE player_id = '1665297999081946498351005'";
// $stmt = $pdo->prepare($query);
// $res = $stmt->execute();
$gen_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "all", "challenge");
foreach ($gen_array as $gen) {
    $table_name = "gen_" . $gen . "_ranking";
    $stmt = $pdo->prepare("SELECT * FROM " . $table_name . " WHERE player_id NOT IN (SELECT dstct_table.player_id AS player_id FROM (SELECT ip_address, Min(clear_time), player_id FROM " . $table_name . " GROUP BY ip_address) AS dstct_table)");
    $res = $stmt->execute();
    while ($data = $stmt->fetch()) {
        var_dump($data);
        $player_id = $data["player_id"];
        $query2 = "DELETE FROM gen_" . $gen . "_clear_time WHERE player_id = '" . $player_id . "'";
        $stmt2 = $pdo->prepare($query2);
        $res2 = $stmt2->execute();

        $query3 = "DELETE FROM gen_" . $gen . "_ranking WHERE player_id = '" . $player_id . "'";
        $stmt3 = $pdo->prepare($query3);
        $res3 = $stmt3->execute();
    }
}

foreach ($gen_array as $gen) {
    // $gen = "6";
    $table_name = "gen_" . $gen . "_ranking";
    $stmt = $pdo->prepare("SELECT * FROM " . $table_name . " WHERE player_id NOT IN (SELECT dstct_table.player_id AS player_id FROM (SELECT name, Min(clear_time), player_id FROM " . $table_name . " GROUP BY name) AS dstct_table)");
    $res = $stmt->execute();
    // var_dump($stmt->fetchAll());
    while ($data = $stmt->fetch()) {
        var_dump($data);
        $player_id = $data["player_id"];
        $query2 = "DELETE FROM gen_" . $gen . "_clear_time WHERE player_id = '" . $player_id . "'";
        $stmt2 = $pdo->prepare($query2);
        $res2 = $stmt2->execute();

        $query3 = "DELETE FROM gen_" . $gen . "_ranking WHERE player_id = '" . $player_id . "'";
        $stmt3 = $pdo->prepare($query3);
        $res3 = $stmt3->execute();
    }
}
