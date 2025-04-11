// 全ポケモンの数を動的に表示する関数
// function setNumberOfPokemons(number_pokemons) {
//     var element = document.getElementById('number_pokemons');
//     element.textContent = number_pokemons;
// }

// 残りポケモンの数を動的に表示する関数
function setRemainingNumber(remaining_number) {
    var number_answered = number_pokemons - remaining_number;
    var span_number_answered = document.getElementById('span_number_answered');
    var span_remaining_number = document.getElementById('span_remaining_number');
    span_number_answered.textContent = padZero(number_answered, 3);
    span_remaining_number.textContent = padZero(remaining_number, 3);
}

// ポケモンリストを動的に生成する関数
function createPokemonList(number_pokemons, number_start) {
    var ul = document.getElementById('pokemon_list');
    var dom = "";
    for (var p = 0; p < number_pokemons; p++) {
        if(gen == "challenge"){
            var div = "<div id='pokemon_" + (number_start + p) + "' class='li_pokemon xx-small m-1'>???</div>";
        }else{
            var div = "<div id='pokemon_" + (number_start + p) + "' class='li_pokemon xx-small m-1'>" + padZero(number_start + p, 3) + "</div>";
        }
        var li = "<li class='li_wrapper'>" + div + "</li>";
        dom += li;
    }
    // dom += "<div id='dummy'><img src='./img/system/padding.jpeg'></div>";
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
    req.open("get", "all_pokemon.json?240123", true); // アクセスするファイルを指定
    req.send(null); // HTTPリクエストの発行
    req.onload = function () {
        window.all_pokemon_list = JSON.parse(req.responseText);
    }
}

// 数字を0埋めする関数
function padZero(num, digit) {
    var num_string = num.toString();
    if (num_string.length > digit) {
        return num_string;
    }
    else {
        var result = ("00000" + num_string).slice(-digit);
        return result;
    }
}

// 画面の高さを100vhに調節する関数
function setFillHeight() {
    // var vh = window.innerHeight * 0.01;
    var vh = visualViewport.height * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);

    var body_height = document.querySelector("body").offsetHeight;
    var header_height = document.querySelector("header").offsetHeight;
    var others_height = document.querySelector("#others").offsetHeight;
    var footer_height = document.querySelector("footer").offsetHeight;
    document.documentElement.style.setProperty("--pokemon_list_height", `${(body_height - header_height - others_height - footer_height) * 0.8}px`);
}

// 画面のサイズ変動があった時に高さを再計算する
window.addEventListener('resize', function () {
    setFillHeight();
}, false);

// 解答欄にフォーカスした時に高さを再計算する
document.getElementById("input_answer").onfocus = function () {
    noneHeaderAndFooter();
}

// 解答欄からフォーカスアウトした時に高さを再計算する
document.getElementById("input_answer").onblur = function () {
    setTimeout("setFillHeight()", 500);
}

// ヘッダーとフッターを非表示にする関数
function noneHeaderAndFooter() {
    var noneOnFocusList = document.getElementsByClassName("none_onfocus");
    for (e of noneOnFocusList) {
        e.classList.add("none");
    }
    setTimeout("setFillHeight()", 500);
    var button_menu = document.getElementById("button_menu");
    if (lang == "en-us") {
        button_menu.textContent = "Menu";
    } else {
        button_menu.textContent = "メニュー";
    }
    button_menu.classList.add('on_focus');
}

// ヘッダーとフッターを表示する関数
function displayHeaderAndFooter() {
    var noneOnFocusList = document.getElementsByClassName("none_onfocus");
    for (e of noneOnFocusList) {
        e.classList.remove("none");
    }
    setTimeout("setFillHeight()", 500);
    var button_menu = document.getElementById("button_menu");
    if (lang == "en-us") {
        button_menu.textContent = "Expand";
    } else {
        button_menu.textContent = "全画面化";
    }

    button_menu.classList.remove('on_focus');
}

// 全画面化ボタンを押したときの関数
document.getElementById("button_menu").onclick = function () {
    var button_menu = document.getElementById("button_menu");
    if (button_menu.classList.contains("on_focus")) {
        displayHeaderAndFooter();
    }
    else {
        noneHeaderAndFooter();
    }
    return false;
}

// // 解答欄からフォーカスアウトした時に高さを再計算する、コピーライトを表示にする
// document.getElementById("input_answer").onblur = function () {
//     var noneOnFocusList = document.getElementsByClassName("none_onfocus");
//     for (e of noneOnFocusList) {
//         e.classList.remove("none");
//     }
//     setTimeout("setFillHeight()", 500);
// }


// // ポケモンリストの高さを調節する関数
// function setPokemonListHeight(){
//     var body_height = document.querySelector("body").offsetHeight;
//     var header_height = document.querySelector("header").offsetHeight;
//     var others_height = document.querySelector("#others").offsetHeight;
//     var footer_height = document.querySelector("footer").offsetHeight;
//     document.documentElement.style.setProperty("--pokemon_list_height", `${(body_height - header_height - others_height - footer_height)*0.9}px`);
// }

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

// 時間を英語に変換する関数
function toEnglishHms(hms) {
    var japaneseHms = hms.split(":");
    var ji = Number(japaneseHms[0]);
    var hun = Number(japaneseHms[1]);
    var byou = Number(japaneseHms[2]);

    return ji + "h" + hun + "m" + byou + "s";
}

// タイマーを動かす関数
function setTime() {
    window.shown_time = new Date().getTime() - start_time;
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

// ユーザーにユニークIDを付与する関数
function setPlayerId() {
    var player_id = localStorage.getItem("player_id");
    if (!player_id) {
        localStorage.clear();
        player_id = new Date().getTime().toString() + Math.floor(Math.random() * 1000000000000).toString();
        localStorage.setItem("player_id", player_id);
    }
    var gen_all_best_time = localStorage.getItem("gen_all_best_time");
    if (!!gen_all_best_time) {
        if (gen_all_best_time < 3600) {
            localStorage.setItem("gen_all_best_time", 99999999);
        }
    }
    var gen_challenge_best_time = localStorage.getItem("gen_challenge_best_time");
    if (!!gen_challenge_best_time) {
        if (gen_challenge_best_time < 3600) {
            localStorage.setItem("gen_challenge_best_time", 99999999);
        }
    }
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
    setFillHeight();
    setPlayerId();
}, false);

// 開始ボタンを押した時に実行される関数
document.getElementById("button_start").onclick = function () {
    var button = document.getElementById("button_start");
    // 開始する時
    if (button.classList.contains("stopped")) {
        if (typeof all_pokemon_list === 'undefined') {
            getJson();
            getCorrectAudio();
            getIncorrectAudio();
            getClearAudio();
            // window.audio = new Audio("./sound/nc162468.wav");
            // window.audioContext = new AudioContext();
            // // get the audio element
            // // window.audioElement = document.querySelector('audio');
            // // pass it into the audio context
            // // window.track = audioContext.createMediaElementSource(audioElement);
            // window.track = audioContext.createMediaElementSource(audio);
            // track.connect(audioContext.destination);
        }
        window.start_time = new Date().getTime();
        startTimer();
        var input_answer = document.getElementById("input_answer");
        input_answer.removeAttribute("disabled");
        document.getElementById("button_answer").removeAttribute("disabled");
        button.classList.replace('btn-success', 'btn-danger');
        button.classList.remove("stopped");
        button.classList.remove("initial");
        button.setAttribute("data-bs-toggle", "modal");
        button.setAttribute("data-bs-target", "#confirm_modal");
        if (lang == "en-us") {
            input_answer.setAttribute("placeholder", "Pokémon Name");
            button.textContent = "Give Up";
        } else {
            input_answer.setAttribute("placeholder", "ポケモン名");
            button.textContent = "降参";
        }
        var dropdownMenuSnsShare = document.getElementById("dropdownMenuSnsShare");
        dropdownMenuSnsShare.classList.remove('highlight');

        remaining_number = number_pokemons;
        setRemainingNumber(remaining_number);
        answered_list.fill(false);

        var li_pokemons = document.getElementsByClassName('li_pokemon');
        for (li of li_pokemons) {
            li.classList.remove("found", "not_answered");
            var id = li.id.slice(8);
            if(gen == "challenge"){
                li.textContent = "???";
            }
            else{
                li.textContent = padZero(id, 3);
            }
        }

        noneHeaderAndFooter();

        window.onbeforeunload = beforeUnload;
    }

    return false;
}

function beforeUnload(event) {
    event.preventDefault();
    if (lang == "en-us") {
        event.returnValue = "When you refresh the page, the data is lost, do you continue?";
    } else {
        event.returnValue = 'ページを更新するとデータが消えますが続行しますか？';
    }
}

// 正解音ファイルを読み込む関数
function getCorrectAudio() {
    window.correctContext = new AudioContext();
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "sound/select.mp3", true); // アクセスするファイルを指定
    req.responseType = 'arraybuffer';  // XMLHttpRequest Level 2
    req.send(null); // HTTPリクエストの発行
    req.onload = function () {
        if (req.status === 200) {
            window.correctArrayBuffer = req.response;
            if (correctArrayBuffer instanceof ArrayBuffer) {
                // The 2nd argument for decodeAudioData
                var successCallback = function (audioBufferOriginal) {
                    /* audioBuffer is the instance of AudioBuffer */
                    // Create the instance of AudioBufferSourceNode
                    // window.source = context.createBufferSource();
                    // Set the instance of AudioBuffer
                    window.correctAudioBuffer = audioBufferOriginal;
                    // source.buffer = audioBuffer;
                    // // Set parameters
                    // source.loop = false;
                    // source.loopStart = 0;
                    // source.loopEnd = audioBuffer.duration;
                    // source.playbackRate.value = 1.0;
                    // // AudioBufferSourceNode (Input) -> AudioDestinationNode (Output)
                    // source.connect(context.destination);
                };
                // The 3rd argument for decodeAudioData
                var errorCallback = function (error) {
                    if (error instanceof Error) {
                        window.alert(error.message);
                    } else {
                        window.alert('Error : "decodeAudioData" method.');
                    }
                };
                // Create the instance of AudioBuffer (Asynchronously)
                correctContext.decodeAudioData(correctArrayBuffer, successCallback, errorCallback);
            }
        }
    };
}

// 不正解音ファイルを読み込む関数
function getIncorrectAudio() {
    window.incorrectContext = new AudioContext();
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "sound/wall.mp3", true); // アクセスするファイルを指定
    req.responseType = 'arraybuffer';  // XMLHttpRequest Level 2
    req.send(null); // HTTPリクエストの発行
    req.onload = function () {
        if (req.status === 200) {
            window.incorrectArrayBuffer = req.response;
            if (incorrectArrayBuffer instanceof ArrayBuffer) {
                // The 2nd argument for decodeAudioData
                var successCallback = function (audioBufferOriginal) {
                    window.incorrectAudioBuffer = audioBufferOriginal;
                };
                // The 3rd argument for decodeAudioData
                var errorCallback = function (error) {
                    if (error instanceof Error) {
                        window.alert(error.message);
                    } else {
                        window.alert('Error : "decodeAudioData" method.');
                    }
                };
                // Create the instance of AudioBuffer (Asynchronously)
                incorrectContext.decodeAudioData(incorrectArrayBuffer, successCallback, errorCallback);
            }
        }
    };
}

// クリア音ファイルを読み込む関数
function getClearAudio() {
    window.clearContext = new AudioContext();
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "sound/celebrate_evolution_long.mp3", true); // アクセスするファイルを指定
    req.responseType = 'arraybuffer';  // XMLHttpRequest Level 2
    req.send(null); // HTTPリクエストの発行
    req.onload = function () {
        if (req.status === 200) {
            window.clearArrayBuffer = req.response;
            if (clearArrayBuffer instanceof ArrayBuffer) {
                // The 2nd argument for decodeAudioData
                var successCallback = function (audioBufferOriginal) {
                    window.clearAudioBuffer = audioBufferOriginal;
                };
                // The 3rd argument for decodeAudioData
                var errorCallback = function (error) {
                    if (error instanceof Error) {
                        window.alert(error.message);
                    } else {
                        window.alert('Error : "decodeAudioData" method.');
                    }
                };
                // Create the instance of AudioBuffer (Asynchronously)
                clearContext.decodeAudioData(clearArrayBuffer, successCallback, errorCallback);
            }
        }
    };
}

// //音ソースを使い回す関数
// function createSource(audioBuffer) {
//     /* audioBuffer is the instance of AudioBuffer */
//     // Create the instance of AudioBufferSourceNode
//     window.source = context.createBufferSource();
//     // Set the instance of AudioBuffer
//     source.buffer = audioBuffer;
//     // Set parameters
//     source.loop = false;
//     source.loopStart = 0;
//     source.loopEnd = audioBuffer.duration;
//     source.playbackRate.value = 1.0;
//     // AudioBufferSourceNode (Input) -> AudioDestinationNode (Output)
//     source.connect(context.destination);
// }

// 正解音ファイルを再生する関数
function playCorrectAudio() {
    // var audioBuffer = window.audioBufferOriginal;
    /* audioBuffer is the instance of AudioBuffer */
    // Create the instance of AudioBufferSourceNode
    window.correctSource = correctContext.createBufferSource();
    // Set the instance of AudioBuffer
    correctSource.buffer = correctAudioBuffer;
    // Set parameters
    correctSource.loop = false;
    correctSource.loopStart = 0;
    correctSource.loopEnd = correctAudioBuffer.duration;
    correctSource.playbackRate.value = 1.0;
    // AudioBufferSourceNode (Input) -> AudioDestinationNode (Output)
    correctSource.connect(correctContext.destination);
    correctSource.start(0);
    // source.onended = function (event) {
    //     // // Remove event handler
    //     source.onended = null;
    //     // document.onkeydown = null;
    //     // Stop audio
    //     source.stop(0);
    //     // console.log('"on' + event.type + '" event handler !!');
    //     // Audio is not started !!
    //     // It is necessary to create the instance of AudioBufferSourceNode again
    //     // source.start(0);
    //     // var audioBuffer = window.audioBufferOriginal;
    //     // createSource(audioBuffer);
    // };
}

// 不正解音ファイルを再生する関数
function playIncorrectAudio() {
    /* audioBuffer is the instance of AudioBuffer */
    window.incorrectSource = incorrectContext.createBufferSource();
    // Set the instance of AudioBuffer
    incorrectSource.buffer = incorrectAudioBuffer;
    // Set parameters
    incorrectSource.loop = false;
    incorrectSource.loopStart = 0;
    incorrectSource.loopEnd = incorrectAudioBuffer.duration;
    incorrectSource.playbackRate.value = 1.0;
    incorrectSource.connect(incorrectContext.destination);
    incorrectSource.start(0);
}

// クリア音ファイルを再生する関数
function playClearAudio() {
    /* audioBuffer is the instance of AudioBuffer */
    window.clearSource = clearContext.createBufferSource();
    // Set the instance of AudioBuffer
    clearSource.buffer = clearAudioBuffer;
    // Set parameters
    clearSource.loop = false;
    clearSource.loopStart = 0;
    clearSource.loopEnd = clearAudioBuffer.duration;
    clearSource.playbackRate.value = 1.0;
    clearSource.connect(clearContext.destination);
    clearSource.start(0);
}

//降参確認ボタンを押した時に実行される関数
document.getElementById("button_confirm").onclick = function () {
    var answered_list_local = answered_list;

    stopTimer();
    var best_num_answers = localStorage.getItem('gen_' + gen + '_best_num_answers');
    var num_answers = number_pokemons - remaining_number;
    var span_num_answers = document.getElementById("num_answers");
    span_num_answers.textContent = num_answers;
    fetchAverageNumAnswers();
    // console.log(!best_num_answers || num_answers > best_num_answers);
    if (isNaN(best_num_answers)) {
        num_answers = 0;
    }
    if (!best_num_answers || num_answers > best_num_answers) {
        best_num_answers = num_answers;
        logNumOfAnswers(num_answers);
        localStorage.setItem('gen_' + gen + '_best_num_answers', num_answers);
    }
    var message_best_num_answers = document.getElementById("message_best_num_answers");
    if (lang == "en-us") {
        message_best_num_answers.innerHTML = "Your best score is " + best_num_answers + " / " + number_pokemons + " Pokémon. <br>" +
        "Try again to break the record!<br>" +
        "<a href='ranking?lang="+lang+"' target='_blank' rel='nofollow noopener'>Click Here</a> to check rankings.";
    } else {
        message_best_num_answers.innerHTML = "キミの最高解答数：" + best_num_answers + " / " + number_pokemons + "匹 <br>" +
        "記録更新を目指してまた挑戦してね！<br>" +
        "ランキングの確認は<a href='ranking' target='_blank' rel='nofollow noopener'>こちら</a>";
    }



    var input_answer = document.getElementById("input_answer");
    input_answer.setAttribute("disabled", true);
    if (lang == "en-us") {
        input_answer.setAttribute("placeholder", "Press Start");

    }else{
        input_answer.setAttribute("placeholder", "開始してね");
    }

    document.getElementById("button_answer").setAttribute("disabled", true);

    var button = document.getElementById("button_start");
    if (lang == "en-us") {
        button.textContent = "Start";
    } else {
        button.textContent = "開始";
    }
    button.classList.replace('btn-danger', 'btn-success');
    button.classList.add('stopped');
    button.removeAttribute("data-bs-toggle");
    button.removeAttribute("data-bs-target");

    var dropdownMenuSnsShare = document.getElementById("dropdownMenuSnsShare");
    dropdownMenuSnsShare.classList.add('highlight');

    var li_pokemons = document.getElementsByClassName('li_pokemon');
    for (li of li_pokemons) {
        var id = li.id.slice(8);
        if (gen == "challenge"){
            if (!answered_list[id - number_start + 1]) {
                li.classList.add("not_answered");
            }
            li.classList.add("found");
            if(lang == "en-us"){
                li.innerHTML = "<img src='img/pokemon/" + padZero(id, 3) + ".png?240123' class='image_pokemon' loading='lazy' title='" + all_pokemon_list[id - 1].name_english_raw + "'>";
            }else{
                li.innerHTML = "<img src='img/pokemon/" + padZero(id, 3) + ".png?240123' class='image_pokemon' loading='lazy' title='" + all_pokemon_list[id - 1].name + "'>";
            }
        }else{
            if (!answered_list_local[id - number_start + 1]) {
                li.classList.add("found", "not_answered");
                if(lang == "en-us"){
                    li.innerHTML = "<img src='img/pokemon/" + padZero(id, 3) + ".png?240123' class='image_pokemon' loading='lazy' title='" + all_pokemon_list[id - 1].name_english_raw + "'>";
                }else{
                    li.innerHTML = "<img src='img/pokemon/" + padZero(id, 3) + ".png?240123' class='image_pokemon' loading='lazy' title='" + all_pokemon_list[id - 1].name + "'>";
                }
            }
        }
    }
    if(lang == "en-us"){
        var surrender_time = toEnglishHms(toHms(Math.floor(window.shown_time / 1000)));
    }else{
        var surrender_time = toJapaneseHms(toHms(Math.floor(window.shown_time / 1000)));
    }
    document.getElementById("surrender_time").textContent = surrender_time;

    displayHeaderAndFooter();
    window.onbeforeunload = null;
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

// 英語入力の表記揺れを直す関数
function eratta_english(answer) {
    var eratta_result = answer.replace("♂", "male");
    eratta_result = eratta_result.replace("♀", "female");
    eratta_result = eratta_result.replace(/[^0-9a-z]/gi, '');
    eratta_result = eratta_result.toLowerCase();

    // 日本語入力でエラー音を出すために必要
    if(eratta_result == "" && answer != ""){
        return answer;
    }
    else{
        return eratta_result;
    }
}

// 正解判定をする関数
function checkAnswer(answer) {
    // if (answer == "クリア") {
    //     remaining_number = 0;
    //     last_pokemon = "ピカチュウ";
    //     document.form_answer.reset();
    // }
    if(lang == "en-us"){
        var eratta_result = eratta_english(answer);
        if(eratta_result == "nidoran"){
            checkAnswer("nidoranfemale");
            checkAnswer("nidoranmale");
            return;
        }
        var pokemon = all_pokemon_list.slice(number_start - 1, number_start + number_pokemons - 1).find((v) => v.name_english === eratta_result);
    }else{
        var eratta_result = eratta(answer);
        var pokemon = all_pokemon_list.slice(number_start - 1, number_start + number_pokemons - 1).find((v) => v.name === eratta_result);
    
    }
    if (pokemon != undefined && !answered_list[pokemon.number - number_start + 1]) {
        if (document.getElementById("checkbox_audio").checked) {
            // audio.play();
            // audioElement.play();
            // Start audio
            // source.start(0);
            playCorrectAudio();
        }
        if(gen == "challenge"){
            var li = document.getElementById('pokemon_' + (number_pokemons - remaining_number + 1));
        }else{
            var li = document.getElementById('pokemon_' + pokemon.number);
        }
        li.classList.add("found");
        if(lang == "en-us"){
            li.innerHTML = "<img src='img/pokemon/" + padZero(pokemon.number, 3) + ".png?240123' class='image_pokemon' title='" + pokemon.name_english_raw + "'>";
        }
        else{
            li.innerHTML = "<img src='img/pokemon/" + padZero(pokemon.number, 3) + ".png?240123' class='image_pokemon' title='" + pokemon.name + "'>";
        }
        if (document.getElementById("checkbox_scroll").checked) {
            li.scrollIntoView({ behavior: "smooth", block: "nearest" });
        }
        answered_list[pokemon.number - number_start + 1] = true;
        remaining_number--;
        setRemainingNumber(remaining_number);
        if(lang == "en-us"){
            window.last_pokemon = pokemon.name_english_raw;
        }
        else{
            window.last_pokemon = pokemon.name;
        }
        document.form_answer.reset();
    }
    else {
        if (eratta_result != "") {
            if (document.getElementById("checkbox_audio").checked) {
                // audio.play();
                // audioElement.play();
                // Start audio
                // source.start(0);
                playIncorrectAudio();
            }
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

        var player_id = localStorage.getItem("player_id");
        var best_time = localStorage.getItem('gen_' + gen + '_best_time');
        var clear_time = Math.floor(window.shown_time / 1000);

        var span_clear_time = document.getElementById("clear_time");
        if(lang == "en-us"){
            span_clear_time.textContent = toEnglishHms(toHms(clear_time));
        }else{
            span_clear_time.textContent = toJapaneseHms(toHms(clear_time));
        }

        fetchAverageTime();

        if (isNaN(best_time)) {
            clear_time = 35999;
        }
        // 記録がないか、クリアタイムがベストタイムより早い場合
        if (!best_time || clear_time < best_time) {
            best_time = clear_time;
            localStorage.setItem('gen_' + gen + '_best_time', best_time);
            logClearTime(clear_time, player_id);
        }

        // ランキングに入れるかどうか判定
        fetchRanking(clear_time, player_id, best_time);

        var input_answer = document.getElementById("input_answer");
        input_answer.setAttribute("disabled", true);
        if (lang == "en-us") {
            input_answer.setAttribute("placeholder", "Press Start");
    
        }else{
            input_answer.setAttribute("placeholder", "開始してね");
        }

        document.getElementById("button_answer").setAttribute("disabled", true);

        var button = document.getElementById("button_start");
        if (lang == "en-us") {
            button.textContent = "Start";
        }else{
            button.textContent = "開始";
        }

        button.classList.replace('btn-danger', 'btn-success');
        button.classList.add('stopped');
        button.removeAttribute("data-bs-toggle");
        button.removeAttribute("data-bs-target");

        var dropdownMenuSnsShare = document.getElementById("dropdownMenuSnsShare");
        dropdownMenuSnsShare.classList.add('highlight');

        setTimeout("showClearMessage()", 1000);
        // setTimeout("playClearAudio()", 1000);
        playClearAudio();

        displayHeaderAndFooter();
    }
}

function showClearMessage() {
    var clear_modal = new bootstrap.Modal(document.getElementById("clear_modal"), {
        keyboard: false
    });
    clear_modal.show();
}

// ツイートボタンの文言を設定する関数
function openTweetWindow() {
    if(lang == "en-us"){
        var time = toEnglishHms(document.getElementById("timer").textContent);
    }else{
        var time = toJapaneseHms(document.getElementById("timer").textContent);
    }
    var number_answered = number_pokemons - remaining_number;
    var title = document.title;
    var url = location.href;
    var href;
    if (remaining_number == 0) {
        if (lang == "en-us") {
            href = "https://twitter.com/share?text=" + "I could guess " + number_answered + " / " + number_pokemons + " Pokémon in " + time + "! The last Pokémon was " + last_pokemon + "! - " + title + "&url=" + url + "&hashtags=CanYouNameAllthePokemon";
        }else{
            href = "https://twitter.com/share?text=" + time + "でポケモン" + number_answered + "/" + number_pokemons + "匹言えた！最後のポケモンは" + last_pokemon + "だった！ - " + title + "&url=" + url + "&hashtags=ポケモン全部言えるかな";
        }
    }else{
        if (lang == "en-us") {
            href = "https://twitter.com/share?text=" + "I could guess " + number_answered + " / " + number_pokemons + " Pokémon in " + time + "! - " + title + "&url=" + url + "&hashtags=CanYouNameAllthePokemon";
        }else{
            href = "https://twitter.com/share?text=" + time + "でポケモン" + number_answered + "/" + number_pokemons + "匹言えた！ - " + title + "&url=" + url + "&hashtags=ポケモン全部言えるかな";
        }
    }

    window.open(encodeURI(decodeURI(href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1');
    return false;
}



// document.getElementById("button_tweet").onclick = function () {
//     openTweetWindow();
// }
// document.getElementById("button_tweet_surrender_modal").onclick = function () {
//     openTweetWindow();
// }
// document.getElementById("button_tweet_clear_modal").onclick = function () {
//     openTweetWindow();
// }

// SNS共有ボタンの文言を設定する関数
function copyResultText(func) {
    if(lang == "en-us"){
        var time = toEnglishHms(document.getElementById("timer").textContent);
    }else{
        var time = toJapaneseHms(document.getElementById("timer").textContent);
    }
    var number_answered = number_pokemons - remaining_number;
    var title = document.title;
    var url = location.href;
    var text;
    if (remaining_number == 0) {
        if (lang == "en-us") {
            text = "I could guess " + number_answered + " / " + number_pokemons + " Pokémon in " + time + "! The last Pokémon was " + last_pokemon + "! - " + title;
        }
        else{
            text = time + "でポケモン" + number_answered + "/" + number_pokemons + "匹言えた！最後のポケモンは" + last_pokemon + "だった！ - " + title;
        }
    }else{
        if (lang == "en-us") {
            text = "I could guess " + number_answered + " / " + number_pokemons + " Pokémon in " + time + "! - " + title;
        }
        else{
            text = time + "でポケモン" + number_answered + "/" + number_pokemons + "匹言えた！ - " + title;
        }
    }
    if (func != "openLine()") {
        if (lang == "en-us") {
            text += " " + url + " #CanYouNameAllthePokemon";
        }
        else{
            text += " " + url + " #ポケモン全部言えるかな";
        }
    }

    navigator.clipboard.writeText(text);
    setTimeout(func, 500);
    return false;
}

function openFacebook() {
    window.open("https://www.facebook.com/share.php?u=" + location.href);
}

// document.getElementById("button_facebook").onclick = function () {
//     copyResultText("openFacebook()");
// }

function openLine() {
    window.open("https://social-plugins.line.me/lineit/share?url=" + location.href);
}

// document.getElementById("button_line").onclick = function () {
//     copyResultText("openLine()");
// }

function openInstagram() {
    window.open("https://www.instagram.com/");
}

// document.getElementById("button_instagram").onclick = function () {
//     copyResultText("openInstagram()");
// }

// クリアタイムをDBに記録する関数
function logClearTime(clear_time, player_id) {
    var data = "clear_time=" + clear_time + "&gen=" + gen + "&last_pokemon=" + last_pokemon + "&player_id=" + player_id + "&lang=" + lang;
    var request = new XMLHttpRequest();
    request.open('post', "sqlite_update_clear_time.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(data);
    request.onload = function () {
        // console.log(request.responseText);
        //     var res = JSON.parse(request.responseText);
        //     var num_players = res["num_players"];
        //     var average_time = res["average_time"];
        //     if (!isNaN(average_time)) {
        //         average_time = toJapaneseHms(toHms(average_time));
        //     }

        //     var span_num_clear_players = document.getElementById("num_clear_players");
        //     span_num_clear_players.textContent = num_players;
        //     var span_average_time = document.getElementById("average_time");
        //     span_average_time.textContent = average_time;
    }
}

// 平均タイムをDBから取得する関数
function fetchAverageTime() {
    var data = "gen=" + gen + "&lang=" + lang;
    var request = new XMLHttpRequest();
    request.open('post', "sqlite_fetch_average_time.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(data);
    request.onload = function () {
        // console.log(request.responseText);
        var res = JSON.parse(request.responseText);
        var num_players = res["num_players"];
        var average_time = res["average_time"];
        if (!isNaN(average_time)) {
            if (lang == "en-us"){
                average_time = toEnglishHms(toHms(average_time));
            }else{
                average_time = toJapaneseHms(toHms(average_time));
            }
        }

        var span_num_clear_players = document.getElementById("num_clear_players");
        span_num_clear_players.textContent = num_players;
        var span_average_time = document.getElementById("average_time");
        span_average_time.textContent = average_time;
    }
}

// 解答数をDBに記録する関数
function logNumOfAnswers(num_answers) {
    var player_id = localStorage.getItem("player_id");
    var data = "num_answers=" + num_answers + "&gen=" + gen + "&player_id=" + player_id + "&lang=" + lang;
    var request = new XMLHttpRequest();
    request.open('post', "sqlite_update_num_answers.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(data);
    // request.onload = function () {
    // console.log(request.responseText);
    //     var res = JSON.parse(request.responseText);
    //     var num_players = res["num_players"];
    //     var average_num_answers = res["average_num_answers"];

    //     var span_num_answers = document.getElementById("num_answers");
    //     span_num_answers.textContent = num_answers;
    //     var span_num_surrender_players = document.getElementById("num_surrender_players");
    //     span_num_surrender_players.textContent = num_players;
    //     var span_average_num_answers = document.getElementById("average_num_answers");
    //     span_average_num_answers.textContent = average_num_answers;
    // }
}

// 平均解答数をDBから取得する関数
function fetchAverageNumAnswers() {
    var data = "gen=" + gen + "&lang=" + lang;
    var request = new XMLHttpRequest();
    request.open('post', "sqlite_fetch_average_num_answers.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(data);
    request.onload = function () {
        // console.log(request.responseText);
        var res = JSON.parse(request.responseText);
        var num_players = res["num_players"];
        var average_num_answers = res["average_num_answers"];

        var span_num_surrender_players = document.getElementById("num_surrender_players");
        span_num_surrender_players.textContent = num_players;
        var span_average_num_answers = document.getElementById("average_num_answers");
        span_average_num_answers.textContent = average_num_answers;
    }
}

function fetchRanking(clear_time, player_id, best_time) {
    var data = "clear_time=" + clear_time + "&gen=" + gen + "&player_id=" + player_id + "&lang=" + lang;
    var request = new XMLHttpRequest();
    request.open('post', "sqlite_fetch_ranking.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(data);
    request.onload = function () {
        // console.log(request.responseText);
        var res = JSON.parse(request.responseText);
        var player_rank = res["player_rank"];
        setRankInMessage(player_rank, best_time);
    }
}

function setRankInMessage(player_rank, best_time) {
    // console.log(player_rank);
    var message_ranking = document.getElementById("message_ranking");
    if (!isNaN(player_rank)) {
        if(lang == "en-us"){
            message_ranking.innerHTML = "Congratulations! You are ranked #" + player_rank + "!<br>"
            + "Enter your name (max. 12 characters)" +
            "<form name='form_ranking' id='form_ranking' autocomplete='off' onsubmit='sendRankingName(); return false;'>" +
            "<input type='text' id='input_ranking' class='form-control-sm' maxlength='12' required>" +
            "<input type='submit' id='button_ranking' value='Send' class='btn btn-primary btn-sm'>" +
            "</form>";
        }else{
            message_ranking.innerHTML = "おめでとう！" + player_rank + "位にランクインしたよ！<br>"
            + "名前を入力してね(12文字以内)" +
            "<form name='form_ranking' id='form_ranking' autocomplete='off' onsubmit='sendRankingName(); return false;'>" +
            "<input type='text' id='input_ranking' class='form-control-sm' maxlength='12' required>" +
            "<input type='submit' id='button_ranking' value='送信' class='btn btn-primary btn-sm'>" +
            "</form>";
        }
    }
    else {
        if(lang == "en-us"){
            message_ranking.innerHTML = "Your best time: " + toEnglishHms(toHms(best_time)) + "<br>" +
            "Try again to break the record!<br>" +
            "<a href='ranking?lang="+lang+"' target='_blank' rel='nofollow noopener'>Click Here</a> to check rankings.";
        }else{
            message_ranking.innerHTML = "キミのベストタイム：" + toJapaneseHms(toHms(best_time)) + "<br>" +
            "記録更新を目指してまた挑戦してね！<br>" +
            "ランキングの確認は<a href='ranking' target='_blank' rel='nofollow noopener'>こちら</a>";
        }
    }
}

function sendRankingName() {
    var player_id = localStorage.getItem("player_id");
    var clear_time = Math.floor(window.shown_time / 1000);
    var input_ranking = document.getElementById("input_ranking");
    var button_ranking = document.getElementById("button_ranking");
    input_ranking.setAttribute("disabled", true);
    button_ranking.setAttribute("disabled", true);
    var name = input_ranking.value;
    // console.log(name);

    var data = "clear_time=" + clear_time + "&gen=" + gen + "&name=" + name + "&player_id=" + player_id + "&lang=" + lang;
    var request = new XMLHttpRequest();
    request.open('post', "sqlite_update_ranking.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(data);
    request.onload = function () {
        var message_ranking = document.getElementById("message_ranking");
        if(lang == "en-us"){
            message_ranking.innerHTML = "Your name has been registered!<br>" +
            "<a href='ranking?lang="+lang+"' target='_blank' rel='nofollow noopener'>Click Here</a> to check rankings.";
        }else{
            message_ranking.innerHTML = "名前をランキングに登録したよ！<br>" +
            "ランキングの確認は<a href='ranking' target='_blank' rel='nofollow noopener'>こちら</a>";
        }
    }

    return false;
}