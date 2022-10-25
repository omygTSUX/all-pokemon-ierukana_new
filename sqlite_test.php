<html>

<head>
    <title>PHP TEST</title>
</head>

<body>
<?php

$pdo = new PDO('sqlite:./db/score_tmp.db');

if (!$pdo) {
    die('接続失敗です。' . $sqliteerror);
}
$gen_array = array("1","2","3","4","5","6","7","8","9","all","challenge","test",);
foreach($gen_array as $gen){
    $query = "UPDATE gen_".$gen."_num_answers SET ip_address = '255.255.255.255', player_id = '000000000000000' WHERE id = 1;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
    
    $query = "UPDATE gen_".$gen."_clear_time SET ip_address = '255.255.255.255', player_id = '000000000000000' WHERE id = 1;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
    
    $query = "UPDATE gen_".$gen."_ranking SET ip_address = '255.255.255.255', player_id = '000000000000000' WHERE id = 1;";
    $stmt = $pdo->prepare($query);
    $res = $stmt->execute();
}

$pdo =null;
?>
</body>

</html>