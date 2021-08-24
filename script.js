// 全ポケモンの数を動的に表示する関数
function setNumberOfPokemons(number_pokemons){
    var elements = document.getElementsByClassName('number_pokemons');
    for (const e of elements){
        e.innerHTML = number_pokemons;
    }
}

// 残りポケモンの数を動的に表示する関数
function setRemainingNumber(remaining_number){
    var elements = document.getElementsByClassName('remaining_number');
    for (const e of elements){
        e.innerHTML = padZero(remaining_number, 3);
    }
}

// 表を動的に生成する関数
function createTable(number_pokemons) {
    // ヘッダー行を追加する
    var thead = document.getElementById('thead_pokedex_number');
    var tr = document.createElement('tr');
    tr.classList.add("table-secondary");
    for (var c = 0; c < Math.ceil(number_pokemons / 100)-1; c++) {
        var th = document.createElement('th');
        th.innerHTML = padZero((c * 100 + 1), 3) + "〜" + ((c + 1) * 100);
        th.classList.add("text-center");
        th.setAttribute("colspan", 2);
        tr.appendChild(th);
    }
    var th = document.createElement('th');
    th.innerHTML = (c * 100 + 1) + "〜" + number_pokemons;
    th.classList.add("text-center");
    th.setAttribute("colspan", 2);
    tr.appendChild(th);
    thead.appendChild(tr);

    // ボディを追加する
    var tbody = document.getElementById('tbody_pokemons');
    for (var r = 0; r < 100; r++) {
        var tr = document.createElement('tr');
        for (var c = 0; c < Math.ceil(number_pokemons / 100); c++) {
            var td = document.createElement('td');
            td.innerHTML = padZero(c*100 + r+1, 3);
            td.classList.add("td_pokedex_number");
            tr.appendChild(td);

            var td = document.createElement('td');
            td.setAttribute("id", "pokemon_" + (c*100 + r+1));
            td.classList.add("td_name_pokemon");
            tr.appendChild(td);
        }
        tbody.appendChild(tr);
    }
    var tr = document.createElement('tr');
    tr.classList.add("boder-0");
    for (var c = 0; c < Math.ceil(number_pokemons / 100); c++) {
        var td = document.createElement('td');
        td.classList.add("border-0");
        tr.appendChild(td);

        var td = document.createElement('td');
        td.classList.add("border-0");
        td.innerHTML = "　　　　　　　";
        tr.appendChild(td);
    }
    tbody.appendChild(tr);

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

// 数字を0埋めする関数
function padZero(v, digit) {
    var result =("00000" + v).slice(-digit);
    return result;
}

// 数字を時間に変換する関数
function toHms(t) {
	var hms = "";
	var h = t / 3600 | 0;
	var m = t % 3600 / 60 | 0;
	var s = t % 60;

	hms = padZero(h, 3) + ":" + padZero(m, 2) + ":" + padZero(s, 2);

	return hms;
}

// タイマーを動かす関数
function setTime(){
    var shown_time = new Date().getTime() - start_time;
    var timer = document.getElementById('timer');
    timer.innerHTML = toHms(Math.floor(shown_time/1000));
}

// タイマーをスタートする関数
function startTimer(){
    window.timer_count = setInterval("setTime()", 1000);
}

// タイマーをストップする関数
function stopTimer(){
    clearInterval(timer_count);
}

// ページロード時に自動実行する関数
window.onload = function () {
    getCSV();
    window.number_pokemons = 900;
    window.answered_list = Array(number_pokemons+1).fill(false)
    window.remaining_number = number_pokemons;
    setNumberOfPokemons(number_pokemons);
    setRemainingNumber(number_pokemons);
    createTable(number_pokemons);

}

// 開始ボタンを押した時に実行される関数
document.getElementById("button_start").onclick = function() {
    var button = document.getElementById("button_start");
    if (button.classList.contains("stopped")){
        window.start_time = new Date().getTime();
        startTimer();
        document.getElementById("input_answer").removeAttribute("disabled");
        document.getElementById("button_answer").removeAttribute("disabled");
        button.innerHTML="降参";
        button.classList.replace('btn-success', 'btn-danger');
        button.classList.remove("stopped");

        answered_list.fill(false);
        var cells = document.getElementsByClassName("td_name_pokemon");
        for (c of cells){
            c.innerHTML="";
        }
    }
    else{
        stopTimer();
        document.getElementById("input_answer").setAttribute("disabled", true);
        document.getElementById("button_answer").setAttribute("disabled", true);
        button.innerHTML="開始";
        button.classList.replace('btn-danger', 'btn-success');
        button.classList.add('stopped');
    }

    return false;
  }


// 回答ボタンを押した時に実行される関数
document.getElementById("form_answer").onsubmit = function() {
    var value = document.getElementById("input_answer").value;
    checkAnswer(value);
    return false;
  }


// 正解判定をする関数
function checkAnswer(answer){
    // if(answer=="クリア"){
    //     for(pokemon of all_pokemon_list){
    //             var td = document.getElementById('pokemon_'+pokemon[0]);
    //             var img = "./img/"+ padZero(pokemon[0], 3)+".png";
    //             td.innerHTML = "<span class='name_pokemon'>"+pokemon[1]+"</span>"+"<img src="+img+" class='image_pokemon'>";
    //             document.form_answer.reset();
    //             answered_list[pokemon[0]] = true;
    //             remaining_number--;
    //             setRemainingNumber(remaining_number);
    //     }
    // }

    for(pokemon of all_pokemon_list){
        if(answer == pokemon[1] && !answered_list[pokemon[0]]){
            var td = document.getElementById('pokemon_'+pokemon[0]);
            var img = "./img/"+ padZero(pokemon[0], 3)+".png";
            td.innerHTML = "<span class='name_pokemon'>"+pokemon[1]+"</span>"+"<img src="+img+" class='image_pokemon'>";
            document.form_answer.reset();
            answered_list[pokemon[0]] = true;
            remaining_number--;
            setRemainingNumber(remaining_number);
        }
    }
}

// ツイートボタンの文言を設定する関数
document.getElementById("button_tweet").onclick = function() {
    var time = document.getElementById("timer").innerHTML;
    var number_answered = number_pokemons - remaining_number;
    var href="https://twitter.com/share?text=" + time +"でポケモン"+ number_answered +"/" +number_pokemons+ "匹言えた！ - ポケモン全部言えるかな？&url=https://all-pokemon-ierukana.herokuapp.com/&hashtags=ポケモン全部言えるかな";
    window.open(encodeURI(decodeURI(href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); 
    return false;
  }