function setRemainingNumber(t){document.getElementById("remaining_number").textContent="残り"+padZero(t,3)+"匹"}function createPokemonList(t,n){for(var o=document.getElementById("pokemon_list"),r="",a=0;a<t;a++)r+="<li class='li_wrapper'>"+("<div id='pokemon_"+(n+a)+"' class='li_pokemon xx-small m-1'>"+padZero(n+a,3))+"</div></li>";o.innerHTML=r}function getCSV(){var t=new XMLHttpRequest;t.open("get","all_pokemon.csv",!0),t.send(null),t.onload=function(){convertCSVtoArray(t.responseText)}}function convertCSVtoArray(t){window.all_pokemon_list=[];for(var n=t.split("\n"),o=0;o<n.length;++o)all_pokemon_list[o]=n[o].split(",")}function getJson(){var t=new XMLHttpRequest;t.open("get","all_pokemon.json",!0),t.send(null),t.onload=function(){window.all_pokemon_list=JSON.parse(t.responseText)}}function padZero(t,n){return("00000"+t).slice(-n)}function setFillHeight(){var t=.01*visualViewport.height;document.documentElement.style.setProperty("--vh",`${t}px`);var n=document.querySelector("body").offsetHeight,o=document.querySelector("header").offsetHeight,r=document.querySelector("#others").offsetHeight,a=document.querySelector("footer").offsetHeight;document.documentElement.style.setProperty("--pokemon_list_height",`${(n-o-r-a)*.8}px`)}function noneHeaderAndFooter(){var t=document.getElementsByClassName("none_onfocus");for(e of t)e.classList.add("none");setTimeout("setFillHeight()",500);var n=document.getElementById("button_menu");n.textContent="メニュー",n.classList.add("on_focus")}function displayHeaderAndFooter(){var t=document.getElementsByClassName("none_onfocus");for(e of t)e.classList.remove("none");setTimeout("setFillHeight()",500);var n=document.getElementById("button_menu");n.textContent="全画面化",n.classList.remove("on_focus")}function toHms(t){var n="";return padZero(t/3600|0,3)+":"+padZero(t%3600/60|0,2)+":"+padZero(t%60,2)}function toJapaneseHms(t){var n,o=t.split(":"),r=Number(o[0]);return r+"時間"+Number(o[1])+"分"+Number(o[2])+"秒"}function setTime(){window.shown_time=new Date().getTime()-start_time,document.getElementById("timer").textContent=toHms(Math.floor(shown_time/1e3))}function startTimer(){window.timer_count=setInterval("setTime()",1e3)}function stopTimer(){clearInterval(timer_count)}function getCorrectAudio(){window.correctContext=new AudioContext;var t=new XMLHttpRequest;t.open("get","./sound/nc162468.mp3",!0),t.responseType="arraybuffer",t.send(null),t.onload=function(){if(200===t.status&&(window.correctArrayBuffer=t.response,correctArrayBuffer instanceof ArrayBuffer)){var n=function(t){window.correctAudioBuffer=t},o=function(t){t instanceof Error?window.alert(t.message):window.alert('Error : "decodeAudioData" method.')};correctContext.decodeAudioData(correctArrayBuffer,n,o)}}}function getIncorrectAudio(){window.incorrectContext=new AudioContext;var t=new XMLHttpRequest;t.open("get","./sound/wall.mp3",!0),t.responseType="arraybuffer",t.send(null),t.onload=function(){if(200===t.status&&(window.incorrectArrayBuffer=t.response,incorrectArrayBuffer instanceof ArrayBuffer)){var n=function(t){window.incorrectAudioBuffer=t},o=function(t){t instanceof Error?window.alert(t.message):window.alert('Error : "decodeAudioData" method.')};incorrectContext.decodeAudioData(incorrectArrayBuffer,n,o)}}}function getClearAudio(){window.clearContext=new AudioContext;var t=new XMLHttpRequest;t.open("get","./sound/celebrate_evolution_long.mp3",!0),t.responseType="arraybuffer",t.send(null),t.onload=function(){if(200===t.status&&(window.clearArrayBuffer=t.response,clearArrayBuffer instanceof ArrayBuffer)){var n=function(t){window.clearAudioBuffer=t},o=function(t){t instanceof Error?window.alert(t.message):window.alert('Error : "decodeAudioData" method.')};clearContext.decodeAudioData(clearArrayBuffer,n,o)}}}function playCorrectAudio(){window.correctSource=correctContext.createBufferSource(),correctSource.buffer=correctAudioBuffer,correctSource.loop=!1,correctSource.loopStart=0,correctSource.loopEnd=correctAudioBuffer.duration,correctSource.playbackRate.value=1,correctSource.connect(correctContext.destination),correctSource.start(0)}function playIncorrectAudio(){window.incorrectSource=incorrectContext.createBufferSource(),incorrectSource.buffer=incorrectAudioBuffer,incorrectSource.loop=!1,incorrectSource.loopStart=0,incorrectSource.loopEnd=incorrectAudioBuffer.duration,incorrectSource.playbackRate.value=1,incorrectSource.connect(incorrectContext.destination),incorrectSource.start(0)}function playClearAudio(){window.clearSource=clearContext.createBufferSource(),clearSource.buffer=clearAudioBuffer,clearSource.loop=!1,clearSource.loopStart=0,clearSource.loopEnd=clearAudioBuffer.duration,clearSource.playbackRate.value=1,clearSource.connect(clearContext.destination),clearSource.start(0)}function hiraToKata(t){return t.replace(/[\u3041-\u3096]/g,t=>String.fromCharCode(t.charCodeAt(0)+96))}function eratta(t){var n=t;for(p of(n=hiraToKata(t),[["ニドランオス","ニドラン♂"],["ニドランメス","ニドラン♀"],["ポリゴンツー","ポリゴン2"],["ポリゴン２","ポリゴン2"],["ポリゴンゼット","ポリゴンZ"],["ポリゴンｚ","ポリゴンZ"],["ポリゴンＺ","ポリゴンZ"],["ポリゴンz","ポリゴンZ"],["タイプヌル","タイプ:ヌル"],["タイプ：ヌル","タイプ:ヌル"],["カプ･コケコ","カプ・コケコ"],["カプコケコ","カプ・コケコ"],["カプ･テテフ","カプ・テテフ"],["カプテテフ","カプ・テテフ"],["カプ･ブルル","カプ・ブルル"],["カプブルル","カプ・ブルル"],["カプ･レヒレ","カプ・レヒレ"],["カプレヒレ","カプ・レヒレ"]]))if(n==p[0]){n=p[1];break}return n}function checkAnswer(t){var n=eratta(t),o=all_pokemon_list.slice(number_start-1,number_start+number_pokemons-1).find(t=>t.name===n);if(void 0==o||answered_list[o.number-number_start+1])""!=n&&document.getElementById("checkbox_audio").checked&&playIncorrectAudio();else{document.getElementById("checkbox_audio").checked&&playCorrectAudio();var r=document.getElementById("pokemon_"+o.number);r.classList.add("found"),r.innerHTML="<img src='./img/pokemon/"+padZero(o.number,3)+".png' class='image_pokemon' title='"+o.name+"'>",document.getElementById("checkbox_scroll").checked&&r.scrollIntoView({behavior:"smooth",block:"nearest"}),answered_list[o.number-number_start+1]=!0,setRemainingNumber(--remaining_number),window.last_pokemon=o.name,document.form_answer.reset()}}function showClearMessage(){new bootstrap.Modal(document.getElementById("clear_modal"),{keyboard:!1}).show()}function openTweetWindow(){var t,n=toJapaneseHms(document.getElementById("timer").textContent),o=number_pokemons-remaining_number,r=document.title,a=location.href;return t=0==remaining_number?"https://twitter.com/share?text="+n+"でポケモン"+o+"/"+number_pokemons+"匹言えた！最後のポケモンは"+last_pokemon+"だった！ - "+r+"&url="+a+"&hashtags=ポケモン全部言えるかな":"https://twitter.com/share?text="+n+"でポケモン"+o+"/"+number_pokemons+"匹言えた！ - "+r+"&url="+a+"&hashtags=ポケモン全部言えるかな",window.open(encodeURI(decodeURI(t)),"tweetwindow","width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1"),!1}function logClearTime(){var t=Math.floor(window.shown_time/1e3),n="clear_time="+t+"&gen="+gen,o=new XMLHttpRequest;o.open("post","sqlite_update_clear_time.php",!0),o.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),o.send(n),o.onload=function(){var n=JSON.parse(o.responseText),r=n.num_players,a=n.average_time;isNaN(a)||(a=toJapaneseHms(toHms(a))),document.getElementById("clear_time").textContent=toJapaneseHms(toHms(t)),document.getElementById("num_players").textContent=r,document.getElementById("average_time").textContent=a}}function logNumOfAnswers(){var t=number_pokemons-remaining_number,n="num_answers="+t+"&gen="+gen,o=new XMLHttpRequest;o.open("post","sqlite_update_num_answers.php",!0),o.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),o.send(n),o.onload=function(){console.log(o.responseText);var n=JSON.parse(o.responseText),r=n.num_players,a=n.average_num_answers;document.getElementById("num_answers").textContent=t,document.getElementById("num_players").textContent=r,document.getElementById("average_num_answers").textContent=a}}window.addEventListener("resize",function(){setFillHeight()},!1),document.getElementById("input_answer").onfocus=function(){noneHeaderAndFooter()},document.getElementById("input_answer").onblur=function(){setTimeout("setFillHeight()",500)},document.getElementById("button_menu").onclick=function(){return document.getElementById("button_menu").classList.contains("on_focus")?displayHeaderAndFooter():noneHeaderAndFooter(),!1},window.addEventListener("DOMContentLoaded",function(){window.answered_list=Array(number_pokemons+1).fill(!1),window.remaining_number=number_pokemons,setRemainingNumber(number_pokemons),createPokemonList(number_pokemons,number_start),setFillHeight(),choiceRandomAd()},!1),document.getElementById("button_start").onclick=function(){var t=document.getElementById("button_start");if(t.classList.contains("stopped")){"undefined"==typeof all_pokemon_list&&(getJson(),getCorrectAudio(),getIncorrectAudio(),getClearAudio()),window.start_time=new Date().getTime(),startTimer();var n=document.getElementById("input_answer");n.removeAttribute("disabled"),n.setAttribute("placeholder","ポケモン名"),document.getElementById("button_answer").removeAttribute("disabled"),t.textContent="降参",t.classList.replace("btn-success","btn-danger"),t.classList.remove("stopped"),t.classList.remove("initial"),t.setAttribute("data-bs-toggle","modal"),t.setAttribute("data-bs-target","#confirm_modal"),document.getElementById("button_tweet").classList.remove("highlight"),setRemainingNumber(remaining_number=number_pokemons),answered_list.fill(!1);var o=document.getElementsByClassName("li_pokemon");for(li of o){li.classList.remove("found","not_answered");var r=li.id.slice(8);li.textContent=padZero(r,3)}noneHeaderAndFooter()}return!1},document.getElementById("button_confirm").onclick=function(){var t=answered_list;stopTimer(),logNumOfAnswers();var n=document.getElementById("input_answer");n.setAttribute("disabled",!0),n.setAttribute("placeholder","開始してね"),document.getElementById("button_answer").setAttribute("disabled",!0);var o=document.getElementById("button_start");o.textContent="開始",o.classList.replace("btn-danger","btn-success"),o.classList.add("stopped"),o.removeAttribute("data-bs-toggle"),o.removeAttribute("data-bs-target"),document.getElementById("button_tweet").classList.add("highlight");var r=document.getElementsByClassName("li_pokemon");for(li of r){var a=li.id.slice(8);t[a-number_start+1]||(li.classList.add("found","not_answered"),li.innerHTML="<img src='./img/pokemon/"+padZero(a,3)+".png' class='image_pokemon' loading='lazy' title='"+all_pokemon_list[a-1].name+"'>")}var s=toJapaneseHms(toHms(Math.floor(window.shown_time/1e3)));return document.getElementById("surrender_time").textContent=s,displayHeaderAndFooter(),!1},document.getElementById("form_answer").onsubmit=function(){return checkAnswer(document.getElementById("input_answer").value),!1},document.form_answer.onreset=function(){if(0==remaining_number){stopTimer(),logClearTime();var t=document.getElementById("input_answer");t.setAttribute("disabled",!0),t.setAttribute("placeholder","開始してね"),document.getElementById("button_answer").setAttribute("disabled",!0);var n=document.getElementById("button_start");n.textContent="開始",n.classList.replace("btn-danger","btn-success"),n.classList.add("stopped"),n.removeAttribute("data-bs-toggle"),n.removeAttribute("data-bs-target"),document.getElementById("button_tweet").classList.add("highlight"),setTimeout("showClearMessage()",1e3),playClearAudio(),displayHeaderAndFooter()}},document.getElementById("button_tweet").onclick=function(){openTweetWindow()},document.getElementById("button_tweet_surrender_modal").onclick=function(){openTweetWindow()},document.getElementById("button_tweet_clear_modal").onclick=function(){openTweetWindow()};