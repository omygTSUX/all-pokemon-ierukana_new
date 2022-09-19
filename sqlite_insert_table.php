<html>

<head>
    <title>PHP TEST</title>
</head>

<body>

    <?php

    $dsn = 'sqlite:./db/score.db';
    $pdo = new PDO($dsn);

    if (!$pdo) {
        die('接続失敗です。' . $sqliteerror);
    }

    $gen = "1";
    $num_answers = 75;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();


    $gen = "2";
    $num_answers = 50;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();

    $gen = "3";
    $num_answers = 67;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();

    $gen = "4";
    $num_answers = 53;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();

    $gen = "5";
    $num_answers = 78;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();

    $gen = "6";
    $num_answers = 36;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();

    $gen = "7";
    $num_answers = 44;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();

    $gen = "8";
    $num_answers = 48;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();

    $gen = "9";
    $num_answers = 50;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();
    
    $gen = "all";
    $num_answers = 450;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();

    $gen = "challenge";
    $num_answers = 450;
    $num_players = 1;

    $table_name = "gen_" . $gen . "_num_answers";
    $query = "INSERT INTO " . $table_name . " (num_answers) VALUES (:num_answers)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':num_answers', $num_answers, PDO::PARAM_INT);
    $res = $stmt->execute();

    $query = "INSERT INTO average_num_answers (gen, average_num_answers, num_players) VALUES (:gen, :average_num_answers, :num_players)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam( ':gen', $gen, PDO::PARAM_STR);
    $stmt->bindParam( ':average_num_answers', $num_answers, PDO::PARAM_INT);
    $stmt->bindParam( ':num_players', $num_players, PDO::PARAM_INT);
    $res = $stmt->execute();
    $pdo=null;
    ?>