// 全ポケモンの数を動的に表示する関数
// function setNumberOfPokemons(number_pokemons) {
//     var element = document.getElementById('number_pokemons');
//     element.textContent = number_pokemons;
// }

// 残りポケモンの数を動的に表示する関数
function setRemainingNumber(remaining_number) {
    var element = document.getElementById('remaining_number');
    element.textContent = "残り" + padZero(remaining_number, 3) + "匹";
}

// ポケモンリストを動的に生成する関数
function createPokemonList(number_pokemons, number_start) {
    var ul = document.getElementById('pokemon_list');
    var dom = "";
    for (var p = 0; p < number_pokemons; p++) {
        var div = "<div id='pokemon_" + (number_start + p) + "' class='li_pokemon xx-small m-1'>" + padZero(number_start + p, 3) + "</div>";
        var li = "<li class='li_wrapper'>" + div + "</li>";
        dom += li;
    }
    ul.innerHTML = dom;
    // var fragment = document.createDocumentFragment();
    // for (var p = 0; p < number_pokemons; p++) {
    //     var li = document.createElement('li');
    //     li.classList.add("li_wrapper");
    //     var div = document.createElement('div');
    //     div.textContent = padZero(number_start + p, 3);
    //     div.id = "pokemon_" + (number_start + p);
    //     div.classList.add("li_pokemon", "xx-small", "m-1");
    //     li.appendChild(div);
    //     fragment.appendChild(li);
    // }
    // ul.appendChild(fragment);
}

// 全ポケモンリストを読み込む関数
function getCSV() {
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "all_pokemon.csv", true); // アクセスするファイルを指定
    req.send(null); // HTTPリクエストの発行

    // レスポンスが返ってきたらconvertCSVtoArray()を呼ぶ	
    req.onload = function () {
        convertCSVtoArray(req.responseText); // 渡されるのは読み込んだCSVデータ
    }
}

// 読み込んだCSVデータを二次元配列に変換する関数
function convertCSVtoArray(str) { // 読み込んだCSVデータが文字列として渡される
    window.all_pokemon_list = []; // 最終的な二次元配列を入れるための配列
    var tmp = str.split("\n"); // 改行を区切り文字として行を要素とした配列を生成

    // 各行ごとにカンマで区切った文字列を要素とした二次元配列を生成
    for (var i = 0; i < tmp.length; ++i) {
        all_pokemon_list[i] = tmp[i].split(',');
    }
}

function getJson() {
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "all_pokemon.json", true); // アクセスするファイルを指定
    req.send(null); // HTTPリクエストの発行
    req.onload = function () {
        window.all_pokemon_list = JSON.parse(req.responseText);
    }
}

// 数字を0埋めする関数
function padZero(v, digit) {
    var result = ("00000" + v).slice(-digit);
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

// 時間を日本語に変換する関数
function toJapaneseHms(hms) {
    var japaneseHms = hms.split(":");
    var ji = Number(japaneseHms[0]);
    var hun = Number(japaneseHms[1]);
    var byou = Number(japaneseHms[2]);

    return ji + "時間" + hun + "分" + byou + "秒";
}

// タイマーを動かす関数
function setTime() {
    var shown_time = new Date().getTime() - start_time;
    var timer = document.getElementById('timer');
    timer.textContent = toHms(Math.floor(shown_time / 1000));
}

// タイマーをスタートする関数
function startTimer() {
    window.timer_count = setInterval("setTime()", 1000);
}

// タイマーをストップする関数
function stopTimer() {
    clearInterval(timer_count);
}

// HTML読み込み時に自動実行する関数
window.addEventListener("DOMContentLoaded", function () {
    // getJson();
    // getCSV();
    window.answered_list = Array(number_pokemons + 1).fill(false)
    window.remaining_number = number_pokemons;
    // setNumberOfPokemons(number_pokemons);
    setRemainingNumber(number_pokemons);
    createPokemonList(number_pokemons, number_start);
}, false);

// 開始ボタンを押した時に実行される関数
document.getElementById("button_start").onclick = function () {
    var button = document.getElementById("button_start");
    // 開始する時
    if (button.classList.contains("stopped")) {
        if (typeof all_pokemon_list === 'undefined') {
            getJson();
            window.audio = new Audio("./sound/nc162468.wav");
            window.audioContext = new AudioContext();
            // get the audio element
            // window.audioElement = document.querySelector('audio');
            // pass it into the audio context
            // window.track = audioContext.createMediaElementSource(audioElement);
            window.track = audioContext.createMediaElementSource(audio);
            track.connect(audioContext.destination);

        }
        window.start_time = new Date().getTime();
        startTimer();
        var input_answer = document.getElementById("input_answer");
        input_answer.removeAttribute("disabled");
        input_answer.setAttribute("placeholder", "ポケモン名");
        document.getElementById("button_answer").removeAttribute("disabled");
        button.textContent = "降参";
        button.classList.replace('btn-success', 'btn-danger');
        button.classList.remove("stopped");
        button.classList.remove("initial");
        button.setAttribute("data-bs-toggle", "modal");
        button.setAttribute("data-bs-target", "#confirm_modal");

        var button_tweet = document.getElementById("button_tweet");
        button_tweet.classList.remove('highlight');

        remaining_number = number_pokemons;
        setRemainingNumber(remaining_number);
        answered_list.fill(false);

        var li_pokemons = document.getElementsByClassName('li_pokemon');
        for (li of li_pokemons) {
            li.classList.remove("found", "not_answered");
            var id = li.id.slice(8);
            li.textContent = padZero(id, 3);
        }
    }

    return false;
}

//降参確認ボタンを押した時に実行される関数
document.getElementById("button_confirm").onclick = function () {
    var button = document.getElementById("button_start");
    var answered_list_local = answered_list;
    stopTimer();
    var input_answer = document.getElementById("input_answer");
    input_answer.setAttribute("disabled", true);
    input_answer.setAttribute("placeholder", "開始してね");
    document.getElementById("input_answer").setAttribute("disabled", true);
    document.getElementById("button_answer").setAttribute("disabled", true);
    button.textContent = "開始";
    button.classList.replace('btn-danger', 'btn-success');
    button.classList.add('stopped');
    button.removeAttribute("data-bs-toggle");
    button.removeAttribute("data-bs-target");

    var button_tweet = document.getElementById("button_tweet");
    button_tweet.classList.add('highlight');

    var li_pokemons = document.getElementsByClassName('li_pokemon');
    for (li of li_pokemons) {
        var id = li.id.slice(8);
        if (!answered_list_local[id - number_start + 1]) {
            li.classList.add("found", "not_answered");
            li.innerHTML = "<img src='./img/pokemon/" + padZero(id, 3) + ".png' class='image_pokemon' loading='lazy'>";
        }
    }

    return false;
}

// ツイートボタンを強調する関数
// function highlight_button(){
//     var button_tweet = document.getElementById("button_tweet");
// 	button_tweet.classList.add('highlight');

// 	setTimeout(function() {
// 		button_tweet.classList.remove('highlight');
// 	}, 10000);
// }

// 回答ボタンを押した時に実行される関数
document.getElementById("form_answer").onsubmit = function () {
    var value = document.getElementById("input_answer").value;
    checkAnswer(value);
    return false;
}

// ひらがなをカタカナに直す関数
function hiraToKata(str) {
    return str.replace(/[\u3041-\u3096]/g, ch =>
        String.fromCharCode(ch.charCodeAt(0) + 0x60)
    );
}

// 入力の表記揺れを直す関数
function eratta(answer) {
    var eratta_result = answer;
    eratta_result = hiraToKata(answer);
    var eratta_list = [
        ["ニドランオス", "ニドラン♂"],
        ["ニドランメス", "ニドラン♀"],
        ["ポリゴンツー", "ポリゴン2"],
        ["ポリゴン２", "ポリゴン2"],
        ["ポリゴンゼット", "ポリゴンZ"],
        ["ポリゴンｚ", "ポリゴンZ"],
        ["ポリゴンＺ", "ポリゴンZ"],
        ["ポリゴンz", "ポリゴンZ"],
        ["タイプヌル", "タイプ:ヌル"],
        ["タイプ：ヌル", "タイプ:ヌル"],
        ["カプ･コケコ", "カプ・コケコ"],
        ["カプコケコ", "カプ・コケコ"],
        ["カプ･テテフ", "カプ・テテフ"],
        ["カプテテフ", "カプ・テテフ"],
        ["カプ･ブルル", "カプ・ブルル"],
        ["カプブルル", "カプ・ブルル"],
        ["カプ･レヒレ", "カプ・レヒレ"],
        ["カプレヒレ", "カプ・レヒレ"]
    ];
    for (p of eratta_list) {
        if (eratta_result == p[0]) {
            eratta_result = p[1];
            break;
        }
    }
    return eratta_result;
}

// 正解判定をする関数
function checkAnswer(answer) {
    // if(answer=="クリア"){
    //     for(pokemon of all_pokemon_list.slice(number_start - 1, number_start + number_pokemons - 1)){
    //             remaining_number--;
    //             setRemainingNumber(remaining_number);
    //             document.form_answer.reset();
    //     }
    // }
    var eratta_result = eratta(answer);
    var pokemon = all_pokemon_list.slice(number_start - 1, number_start + number_pokemons - 1).find((v) => v.name === eratta_result);
    if (pokemon != undefined && !answered_list[pokemon.number - number_start + 1]) {
        var li = document.getElementById('pokemon_' + pokemon.number);
        li.classList.add("found");
        li.innerHTML = "<img src='./img/pokemon/" + padZero(pokemon.number, 3) + ".png' class='image_pokemon'>";
        // li.scrollIntoView({behavior: "smooth", block: "nearest"});
        answered_list[pokemon.number - number_start + 1] = true;
        remaining_number--;
        setRemainingNumber(remaining_number);
        window.last_pokemon = pokemon.name;
        document.form_answer.reset();
        if(document.getElementById("checkbox_audio").checked){
            audio.play();
            // audioElement.play();
        }
    }
    // for (pokemon of all_pokemon_list.slice(number_start - 1, number_start + number_pokemons - 1)) {
    //     if (eratta_result == pokemon[1] && !answered_list[pokemon[0] - number_start + 1]) {
    //         var li = document.getElementById('pokemon_' + pokemon[0]);
    //         li.classList.add("found");
    //         li.innerHTML = "<img src='./img/pokemon" + padZero(pokemon[0], 3) + ".png' class='image_pokemon' loading='lazy'>";
    //         answered_list[pokemon[0] - number_start + 1] = true;
    //         remaining_number--;
    //         setRemainingNumber(remaining_number);
    //         window.last_pokemon = pokemon[1];
    //         document.form_answer.reset();
    //         break;
    //     }
    // }
}

// クリア判定をする関数
document.form_answer.onreset = function () {
    if (remaining_number == 0) {
        stopTimer();
        var button = document.getElementById("button_start");
        document.getElementById("input_answer").setAttribute("disabled", true);
        document.getElementById("button_answer").setAttribute("disabled", true);
        button.textContent = "開始";
        button.classList.replace('btn-danger', 'btn-success');
        button.classList.add('stopped');
        var button_tweet = document.getElementById("button_tweet");
        button_tweet.classList.add('highlight');
        setTimeout("alertClearMessage()", 1000);
    }
}

function alertClearMessage() {
    window.alert("クリアおめでとう！結果Tweetボタンでぜひ共有してください！");
}

// ツイートボタンの文言を設定する関数
document.getElementById("button_tweet").onclick = function () {
    var time = toJapaneseHms(document.getElementById("timer").textContent);
    var number_answered = number_pokemons - remaining_number;
    var title = document.title;
    var url = location.href;
    var href;
    if (remaining_number == 0) {
        href = "https://twitter.com/share?text=" + time + "でポケモン" + number_answered + "/" + number_pokemons + "匹言えた！最後のポケモンは" + last_pokemon + "だった！ - " + title + "&url=" + url + "&hashtags=ポケモン全部言えるかな";
    }
    else {
        href = "https://twitter.com/share?text=" + time + "でポケモン" + number_answered + "/" + number_pokemons + "匹言えた！ - " + title + "&url=" + url + "&hashtags=ポケモン全部言えるかな";
    }
    window.open(encodeURI(decodeURI(href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1');
    return false;
}