<?php
    $pdo = new PDO('sqlite:./db/score.db');

    if (!$pdo) {
        die('接続失敗です。' . $sqliteerror);
    }

    $gen = $_POST['gen'];
    $clear_time = $_POST['clear_time'];
    $player_id= $_POST['player_id'];

    $stmt = $pdo->prepare("SELECT org_table.name, org_table.clear_time, org_table.player_id, (SELECT count(*) FROM gen_" . $gen . "_ranking AS tmp_table WHERE tmp_table.clear_time < org_table.clear_time) + 1 AS ranking FROM gen_" . $gen . "_ranking AS org_table ORDER BY ranking ASC");
    $res = $stmt->execute();
    $ranking = $stmt->fetchAll();

    if ($clear_time <= $ranking[min(count($ranking) - 1, 99)]['clear_time']) {
        for ($i = 0; $i < count($ranking); $i++) {
            if(!empty($ranking[$i]['player_id']) && strcmp($player_id, $ranking[$i]['player_id']) == 0){
                if($clear_time > $ranking[$i]['clear_time']){
                    $player_rank = "ランク外";
                    break;
                }
            }
            if ($clear_time <= $ranking[$i]['clear_time']) {
                $player_rank = $i + 1;
                break;
            }
        }
    } else {
        $player_rank = "ランク外";
    }
    $res_array = array('ranking' => $ranking, 'player_rank' => $player_rank);
    $pdo = null;
    echo json_encode($res_array, JSON_UNESCAPED_UNICODE);
    ?>
