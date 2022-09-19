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

    $sql = "CREATE TABLE gen_1_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_2_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_3_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_4_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_5_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_6_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_7_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_8_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_9_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_all_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE gen_challenge_num_answers (
        id INTEGER PRIMARY KEY,
        num_answers INT
    )";
    $res = $pdo->query($sql);

    $sql = "CREATE TABLE average_num_answers (
        gen TEXT PRIMARY KEY,
        average_num_answers REAL,
        num_players INT
    )";
    $res = $pdo->query($sql);