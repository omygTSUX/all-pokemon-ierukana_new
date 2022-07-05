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

// 画面の高さを100vhに調節する関数
function setFillHeight() {
    // var vh = window.innerHeight * 0.01;
    var vh = visualViewport.height * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);

    var body_height = document.querySelector("body").offsetHeight;
    var header_height = document.querySelector("header").offsetHeight;
    var others_height = document.querySelector("#others").offsetHeight;
    var footer_height = document.querySelector("footer").offsetHeight;
    document.documentElement.style.setProperty("--pokemon_list_height", `${(body_height - header_height - others_height - footer_height) * 0.9}px`);
}

// 画面のサイズ変動があった時に高さを再計算する
window.addEventListener('resize', function () {
    setFillHeight();
}, false);

// 解答欄にフォーカスした時に高さを再計算する、コピーライトを非表示にする
document.getElementById("input_answer").onfocus = function () {
    var noneOnFocusList = document.getElementsByClassName("none_onfocus");
    for(e of noneOnFocusList){
        e.classList.add("none");
    } 
    setTimeout("setFillHeight()", 500);
}

// 解答欄からフォーカスアウトした時に高さを再計算する、コピーライトを表示にする
document.getElementById("input_answer").onblur = function () {
    var noneOnFocusList = document.getElementsByClassName("none_onfocus");
    for(e of noneOnFocusList){
        e.classList.remove("none");
    } 
    setTimeout("setFillHeight()", 500);
}

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
    setFillHeight();
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
            li.classList.add("not_found");
            var id = li.id.slice(8);
            // li.textContent = padZero(id, 3);
            li.innerHTML = padZero(id, 3) + "<img src='./img/pokemon/" + padZero(id, 3) + ".png' class='image_pokemon' loading='lazy' title=''>";
        }
    }

    return false;
}

// 正解音ファイルを読み込む関数
function getCorrectAudio() {
    window.correctContext = new AudioContext();
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "./sound/nc162468.mp3", true); // アクセスするファイルを指定
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
    req.open("get", "./sound/wall.mp3", true); // アクセスするファイルを指定
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
    req.open("get", "./sound/celebrate_evolution_long.mp3", true); // アクセスするファイルを指定
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

    var input_answer = document.getElementById("input_answer");
    input_answer.setAttribute("disabled", true);
    input_answer.setAttribute("placeholder", "開始してね");

    document.getElementById("button_answer").setAttribute("disabled", true);
    
    var button = document.getElementById("button_start");
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
            li.classList.remove("not_found");
            li.classList.add("found", "not_answered");
            // li.innerHTML = "<img src='./img/pokemon/" + padZero(id, 3) + ".png' class='image_pokemon' loading='lazy' title='"+ all_pokemon_list[id-1].name +"'>";
        }
    }

    var time = toJapaneseHms(document.getElementById("timer").textContent);
    var number_answered = number_pokemons - remaining_number;
    document.getElementById("text_surrender_modal").innerHTML = "キミは" + time + "で<br>ポケモン" + number_answered + "/" + number_pokemons + "匹言えたよ！";

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
    //     remaining_number = 0;
    //     last_pokemon = "ピカチュウ";
    //     document.form_answer.reset();
    // }
    var eratta_result = eratta(answer);
    var pokemon = all_pokemon_list.slice(number_start - 1, number_start + number_pokemons - 1).find((v) => v.name === eratta_result);
    if (pokemon != undefined && !answered_list[pokemon.number - number_start + 1]) {
        if (document.getElementById("checkbox_audio").checked) {
            // audio.play();
            // audioElement.play();
            // Start audio
            // source.start(0);
            playCorrectAudio();
        }
        var li = document.getElementById('pokemon_' + pokemon.number);
        li.classList.add("found");
        li.innerHTML = "<img src='./img/pokemon/" + padZero(pokemon.number, 3) + ".png' class='image_pokemon' title='"+ pokemon.name +"'>";
        if (document.getElementById("checkbox_scroll").checked) {
            li.scrollIntoView({ behavior: "smooth", block: "nearest" });
        }
        answered_list[pokemon.number - number_start + 1] = true;
        remaining_number--;
        setRemainingNumber(remaining_number);
        window.last_pokemon = pokemon.name;
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

        var input_answer = document.getElementById("input_answer");
        input_answer.setAttribute("disabled", true);
        input_answer.setAttribute("placeholder", "開始してね");

        document.getElementById("button_answer").setAttribute("disabled", true);

        var button = document.getElementById("button_start");
        button.textContent = "開始";
        button.classList.replace('btn-danger', 'btn-success');
        button.classList.add('stopped');
        button.removeAttribute("data-bs-toggle");
        button.removeAttribute("data-bs-target");

        var button_tweet = document.getElementById("button_tweet");
        button_tweet.classList.add('highlight');

        setTimeout("showClearMessage()", 1000);
        // setTimeout("playClearAudio()", 1000);
        playClearAudio();
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
document.getElementById("button_tweet").onclick = function () {
    openTweetWindow();
}
document.getElementById("button_tweet_surrender_modal").onclick = function () {
    openTweetWindow();
}
document.getElementById("button_tweet_clear_modal").onclick = function () {
    openTweetWindow();
}
