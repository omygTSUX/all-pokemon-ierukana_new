// ポケモンの数を動的に表示する関数
function setNumberOfPokemons(number_pokemons){
    var elements = document.getElementsByClassName('number_pokemons');
    for (const e of elements){
        e.innerHTML = number_pokemons;
    }
}

// 表を動的に生成する関数
function createTable(number_pokemons) {
    // ヘッダー行を追加する
    var thead = document.getElementById('thead_pokedex_number');
    var tr = document.createElement('tr');
    for (var c = 0; c < Math.ceil(number_pokemons / 100)-1; c++) {
        var th = document.createElement('th');
        th.innerHTML = (c * 100 + 1) + "〜" + ((c + 1) * 100);
        th.setAttribute("colspan", 2);
        tr.appendChild(th);
    }
    var th = document.createElement('th');
    th.innerHTML = (c * 100 + 1) + "〜" + number_pokemons;
    th.setAttribute("colspan", 2);
    tr.appendChild(th);
    thead.appendChild(tr);

    // ボディを追加する
    var tbody = document.getElementById('tbody_pokemons');
    for (var r = 0; r < 100; r++) {
        var tr = document.createElement('tr');
        for (var c = 0; c < Math.ceil(number_pokemons / 100); c++) {
            var td = document.createElement('td');
            td.innerHTML = (c*100 + r+1);
            td.classList.add("td_pokedex_number")
            tr.appendChild(td);

            var td = document.createElement('td');
            td.innerHTML = "　　　　　　";
            td.setAttribute("id", "pokemon_" + (c*100 + r+1));
            td.classList.add("td_name_pokemon")
            tr.appendChild(td);
        }
        tbody.appendChild(tr);
    }

    // 端数のセルをグレーアウトする
    for (var p = number_pokemons+1; p < Math.ceil(number_pokemons/100)*100 + 1; p++){
        var td = document.getElementById('pokemon_' + p);
        td.classList.add("table-secondary");
    }
}

// 全ポケモンリストを読み込む関数
function getCSV(){
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "all_pokemon.csv", true); // アクセスするファイルを指定
    req.send(null); // HTTPリクエストの発行
	
    // レスポンスが返ってきたらconvertCSVtoArray()を呼ぶ	
    req.onload = function(){
	    convertCSVtoArray(req.responseText); // 渡されるのは読み込んだCSVデータ
    }
}

// 読み込んだCSVデータを二次元配列に変換する関数
function convertCSVtoArray(str){ // 読み込んだCSVデータが文字列として渡される
     window.all_pokemon_list = []; // 最終的な二次元配列を入れるための配列
    var tmp = str.split("\n"); // 改行を区切り文字として行を要素とした配列を生成
 
    // 各行ごとにカンマで区切った文字列を要素とした二次元配列を生成
    for(var i=0;i<tmp.length;++i){
        all_pokemon_list[i] = tmp[i].split(',');
    }
}

// ページロード時に自動実行する関数
window.onload = function () {
    var number_pokemons = 900;
    window.answered_list = Array(number_pokemons+1).fill(false)
    setNumberOfPokemons(number_pokemons);
    createTable(number_pokemons);
    getCSV();
}

// 回答ボタンを押した時に実行される関数
document.getElementById("form_answer").onsubmit = function() {
    var value = document.getElementById("input_answer").value;
    checkAnswer(value);
    return false;
  };


// 正解判定をする関数
function checkAnswer(answer){
    
    for(pokemon of all_pokemon_list){
        if(answer == pokemon[1] && !answered_list[pokemon[0]]){
            var td = document.getElementById('pokemon_'+pokemon[0]);
            td.innerHTML = pokemon[1];
            document.form_answer.reset();
            answered_list[pokemon[0]] = true;
        }
    }
}