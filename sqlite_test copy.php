
    <?php

    $dsn = 'sqlite:./score.db';
    $pdo = new PDO($dsn);

    if (!$pdo) {
        die('接続失敗です。' . $sqliteerror);
    }

    //print('接続に成功しました。<br>');

    // SQLiteに対する処理

    // $db = null;

    // print('切断しました。<br>');


    // (1)データベースへ接続
    // $dbh = new PDO("sqlite:./sqlite.db");

    // (2)テーブル作成のSQLを作成
    // $sql = 'CREATE TABLE user_list (
    // 	id INTEGER PRIMARY KEY,
    // 	name TEXT,
    // 	age INT,
    // 	registry_datetime TEXT
    // )';

    // $sql = "CREATE TABLE test_clear_score (
    //     id INTEGER PRIMARY KEY,
    //     clear_time INT
    // )";
    // $sql = "CREATE TABLE test_clear_average (
    //     gen TEXT PRIMARY KEY,
    //     average_time INT,
    //     num_players INT
    // )";
    // // (3)SQLを実行
    // $res = $pdo->query($sql);

    // } catch(PDOException $e) {

    // 	echo $e->getMessage();
    // 	die();
    // }
    // $dbh = null;

    // // (1) 登録するデータを用意
    // date_default_timezone_set('Asia/Tokyo');
    // $name = '山田太郎';
    // $age = 30;
    // $registry_datetime = date('Y-m-d H:i:s');

    // $clear_time = 3800;

    // $gen = "test";
    // $average_time = 3600;
    // $num_players = 1;

    $gen = $_POST['gen'];
    $clear_time = $_POST['time'];

    // // (2) データベースに接続
    // // $pdo = new PDO("sqlite:./sqlite.db");

    // // (3) SQL作成
    // $stmt = $pdo->prepare("INSERT INTO user_list (
    // 	name, age, registry_datetime
    // ) VALUES (
    // 	:name, :age, :registry_datetime
    // )");

    $table_name = $gen."_clear_score";
    $query = "INSERT INTO ".$table_name." (clear_time) VALUES (:clear_time)";
    $stmt4 = $pdo->prepare($query);

    // $stmt2 = $pdo->prepare("INSERT INTO test_clear_average (
    // 	gen, average_time, num_players
    // ) VALUES (
    // 	:gen, :average_time, :num_players
    // )");

    // // (4) 登録するデータをセット
    // $stmt->bindParam( ':name', $name, PDO::PARAM_STR);
    // $stmt->bindParam( ':age', $age, PDO::PARAM_STR);
    // $stmt->bindParam( ':registry_datetime', $registry_datetime, PDO::PARAM_STR);

    $stmt4->bindParam( ':clear_time', $clear_time, PDO::PARAM_INT);

    // $stmt2->bindParam( ':gen', $gen, PDO::PARAM_STR);
    // $stmt2->bindParam( ':average_time', $average_time, PDO::PARAM_INT);
    // $stmt2->bindParam( ':num_players', $num_players, PDO::PARAM_INT);

    // // // (5) SQL実行
    $res = $stmt4->execute();
    if($res){
        //print('実行に成功しました。<br>');
        $stmt5 = $pdo->prepare("SELECT * FROM test_clear_score");
        $res = $stmt5->execute();
        $data = $stmt5->fetchall(3);
        //var_dump($data);
    }
    else{
        print('実行に失敗しました。<br>');
    }
   

    // $res = $stmt2->execute();
    // var_dump($pdo->lastInsertId());

    // // (3) SQL作成
    // $id = 1;
    // $stmt = $pdo->prepare("SELECT * FROM user_list WHERE id = :id");

    $stmt = $pdo->prepare("SELECT * FROM test_clear_average WHERE gen = :gen");

    // // (4) 登録するデータをセット
    // $stmt->bindParam( ':id', $id, PDO::PARAM_INT);

    $stmt->bindParam(':gen', $gen, PDO::PARAM_STR);

    // // (5) SQL実行
    $res = $stmt->execute();

    // (6) SQL実行
    if ($res) {
        $data = $stmt->fetch();
        //var_dump($data);
        $new_num_players = $data["num_players"] + 1;
        $new_average_time = round(($data["average_time"] * $data["num_players"] + $clear_time) / $new_num_players);

        $stmt2 = $pdo->prepare("UPDATE test_clear_average SET average_time = :average_time, num_players = :num_players WHERE gen = :gen");

        $stmt2->bindParam( ':gen', $gen, PDO::PARAM_STR);
        $stmt2->bindParam( ':average_time', $new_average_time, PDO::PARAM_INT);
        $stmt2->bindParam( ':num_players', $new_num_players, PDO::PARAM_INT);

        $res = $stmt2->execute();
    }

    $stmt3 = $pdo->prepare("SELECT * FROM test_clear_average WHERE gen = :gen");
    $stmt3->bindParam(':gen', $gen, PDO::PARAM_STR);
    $res = $stmt3->execute();
    $data3 = $stmt3->fetch();
    //var_dump($data3);



    $pdo = null;
    echo json_encode($data3, JSON_UNESCAPED_UNICODE);
    ?>