function setRemainingNumber(e){document.getElementById("remaining_number").textContent="残り"+padZero(e,3)+"匹"}function createPokemonList(e,t){for(var n=document.getElementById("pokemon_list"),o="",r=0;r<e;r++){o+="<li class='li_wrapper'>"+("<div id='pokemon_"+(t+r)+"' class='li_pokemon xx-small m-1'>"+padZero(t+r,3)+"</div>")+"</li>"}n.innerHTML=o}function getCSV(){var e=new XMLHttpRequest;e.open("get","all_pokemon.csv",!0),e.send(null),e.onload=function(){convertCSVtoArray(e.responseText)}}function convertCSVtoArray(e){window.all_pokemon_list=[];for(var t=e.split("\n"),n=0;n<t.length;++n)all_pokemon_list[n]=t[n].split(",")}function getJson(){var e=new XMLHttpRequest;e.open("get","all_pokemon.json",!0),e.send(null),e.onload=function(){window.all_pokemon_list=JSON.parse(e.responseText)}}function padZero(e,t){return("00000"+e).slice(-t)}function setFillHeight(){var e=.01*visualViewport.height;document.documentElement.style.setProperty("--vh",`${e}px`);var t=document.querySelector("body").offsetHeight,n=document.querySelector("header").offsetHeight,o=document.querySelector("#others").offsetHeight,r=document.querySelector("footer").offsetHeight;document.documentElement.style.setProperty("--pokemon_list_height",`${.9*(t-n-o-r)}px`)}function toHms(e){var t=e%3600/60|0,n=e%60;return padZero(e/3600|0,3)+":"+padZero(t,2)+":"+padZero(n,2)}function toJapaneseHms(e){var t=e.split(":");return Number(t[0])+"時間"+Number(t[1])+"分"+Number(t[2])+"秒"}function setTime(){var e=(new Date).getTime()-start_time;document.getElementById("timer").textContent=toHms(Math.floor(e/1e3))}function startTimer(){window.timer_count=setInterval("setTime()",1e3)}function stopTimer(){clearInterval(timer_count)}function getCorrectAudio(){window.correctContext=new AudioContext;var e=new XMLHttpRequest;e.open("get","./sound/nc162468.mp3",!0),e.responseType="arraybuffer",e.send(null),e.onload=function(){if(200===e.status&&(window.correctArrayBuffer=e.response,correctArrayBuffer instanceof ArrayBuffer)){correctContext.decodeAudioData(correctArrayBuffer,function(e){window.correctAudioBuffer=e},function(e){e instanceof Error?window.alert(e.message):window.alert('Error : "decodeAudioData" method.')})}}}function getIncorrectAudio(){window.incorrectContext=new AudioContext;var e=new XMLHttpRequest;e.open("get","./sound/wall.mp3",!0),e.responseType="arraybuffer",e.send(null),e.onload=function(){if(200===e.status&&(window.incorrectArrayBuffer=e.response,incorrectArrayBuffer instanceof ArrayBuffer)){incorrectContext.decodeAudioData(incorrectArrayBuffer,function(e){window.incorrectAudioBuffer=e},function(e){e instanceof Error?window.alert(e.message):window.alert('Error : "decodeAudioData" method.')})}}}function getClearAudio(){window.clearContext=new AudioContext;var e=new XMLHttpRequest;e.open("get","./sound/celebrate_evolution_long.mp3",!0),e.responseType="arraybuffer",e.send(null),e.onload=function(){if(200===e.status&&(window.clearArrayBuffer=e.response,clearArrayBuffer instanceof ArrayBuffer)){clearContext.decodeAudioData(clearArrayBuffer,function(e){window.clearAudioBuffer=e},function(e){e instanceof Error?window.alert(e.message):window.alert('Error : "decodeAudioData" method.')})}}}function playCorrectAudio(){window.correctSource=correctContext.createBufferSource(),correctSource.buffer=correctAudioBuffer,correctSource.loop=!1,correctSource.loopStart=0,correctSource.loopEnd=correctAudioBuffer.duration,correctSource.playbackRate.value=1,correctSource.connect(correctContext.destination),correctSource.start(0)}function playIncorrectAudio(){window.incorrectSource=incorrectContext.createBufferSource(),incorrectSource.buffer=incorrectAudioBuffer,incorrectSource.loop=!1,incorrectSource.loopStart=0,incorrectSource.loopEnd=incorrectAudioBuffer.duration,incorrectSource.playbackRate.value=1,incorrectSource.connect(incorrectContext.destination),incorrectSource.start(0)}function playClearAudio(){window.clearSource=clearContext.createBufferSource(),clearSource.buffer=clearAudioBuffer,clearSource.loop=!1,clearSource.loopStart=0,clearSource.loopEnd=clearAudioBuffer.duration,clearSource.playbackRate.value=1,clearSource.connect(clearContext.destination),clearSource.start(0)}function hiraToKata(e){return e.replace(/[\u3041-\u3096]/g,e=>String.fromCharCode(e.charCodeAt(0)+96))}function eratta(e){var t=e;t=hiraToKata(e);for(p of[["ニドランオス","ニドラン♂"],["ニドランメス","ニドラン♀"],["ポリゴンツー","ポリゴン2"],["ポリゴン２","ポリゴン2"],["ポリゴンゼット","ポリゴンZ"],["ポリゴンｚ","ポリゴンZ"],["ポリゴンＺ","ポリゴンZ"],["ポリゴンz","ポリゴンZ"],["タイプヌル","タイプ:ヌル"],["タイプ：ヌル","タイプ:ヌル"],["カプ･コケコ","カプ・コケコ"],["カプコケコ","カプ・コケコ"],["カプ･テテフ","カプ・テテフ"],["カプテテフ","カプ・テテフ"],["カプ･ブルル","カプ・ブルル"],["カプブルル","カプ・ブルル"],["カプ･レヒレ","カプ・レヒレ"],["カプレヒレ","カプ・レヒレ"]])if(t==p[0]){t=p[1];break}return t}function checkAnswer(e){var t=eratta(e),n=all_pokemon_list.slice(number_start-1,number_start+number_pokemons-1).find(e=>e.name===t);if(null==n||answered_list[n.number-number_start+1])""!=t&&document.getElementById("checkbox_audio").checked&&playIncorrectAudio();else{document.getElementById("checkbox_audio").checked&&playCorrectAudio();var o=document.getElementById("pokemon_"+n.number);o.classList.add("found"),o.innerHTML="<img src='./img/pokemon/"+padZero(n.number,3)+".png' class='image_pokemon' title='"+n.name+"'>",document.getElementById("checkbox_scroll").checked&&o.scrollIntoView({behavior:"smooth",block:"nearest"}),answered_list[n.number-number_start+1]=!0,remaining_number--,setRemainingNumber(remaining_number),window.last_pokemon=n.name,document.form_answer.reset()}}function showClearMessage(){new bootstrap.Modal(document.getElementById("clear_modal"),{keyboard:!1}).show()}function openTweetWindow(){var e,t=toJapaneseHms(document.getElementById("timer").textContent),n=number_pokemons-remaining_number,o=document.title,r=location.href;return e=0==remaining_number?"https://twitter.com/share?text="+t+"でポケモン"+n+"/"+number_pokemons+"匹言えた！最後のポケモンは"+last_pokemon+"だった！ - "+o+"&url="+r+"&hashtags=ポケモン全部言えるかな":"https://twitter.com/share?text="+t+"でポケモン"+n+"/"+number_pokemons+"匹言えた！ - "+o+"&url="+r+"&hashtags=ポケモン全部言えるかな",window.open(encodeURI(decodeURI(e)),"tweetwindow","width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1"),!1}window.addEventListener("resize",function(){setFillHeight()},!1),document.getElementById("input_answer").onfocus=function(){var t=document.getElementsByClassName("none_onfocus");for(e of t)e.classList.add("none");setTimeout("setFillHeight()",500)},document.getElementById("input_answer").onblur=function(){var t=document.getElementsByClassName("none_onfocus");for(e of t)e.classList.remove("none");setTimeout("setFillHeight()",500)},window.addEventListener("DOMContentLoaded",function(){window.answered_list=Array(number_pokemons+1).fill(!1),window.remaining_number=number_pokemons,setRemainingNumber(number_pokemons),createPokemonList(number_pokemons,number_start),setFillHeight()},!1),document.getElementById("button_start").onclick=function(){var e=document.getElementById("button_start");if(e.classList.contains("stopped")){"undefined"==typeof all_pokemon_list&&(getJson(),getCorrectAudio(),getIncorrectAudio(),getClearAudio()),window.start_time=(new Date).getTime(),startTimer();var t=document.getElementById("input_answer");t.removeAttribute("disabled"),t.setAttribute("placeholder","ポケモン名"),document.getElementById("button_answer").removeAttribute("disabled"),e.textContent="降参",e.classList.replace("btn-success","btn-danger"),e.classList.remove("stopped"),e.classList.remove("initial"),e.setAttribute("data-bs-toggle","modal"),e.setAttribute("data-bs-target","#confirm_modal"),document.getElementById("button_tweet").classList.remove("highlight"),remaining_number=number_pokemons,setRemainingNumber(remaining_number),answered_list.fill(!1);var n=document.getElementsByClassName("li_pokemon");for(li of n){li.classList.remove("found","not_answered");var o=li.id.slice(8);li.textContent=padZero(o,3)}}return!1},document.getElementById("button_confirm").onclick=function(){var e=answered_list;stopTimer();var t=document.getElementById("input_answer");t.setAttribute("disabled",!0),t.setAttribute("placeholder","開始してね"),document.getElementById("button_answer").setAttribute("disabled",!0);var n=document.getElementById("button_start");n.textContent="開始",n.classList.replace("btn-danger","btn-success"),n.classList.add("stopped"),n.removeAttribute("data-bs-toggle"),n.removeAttribute("data-bs-target"),document.getElementById("button_tweet").classList.add("highlight");var o=document.getElementsByClassName("li_pokemon");for(li of o){var r=li.id.slice(8);e[r-number_start+1]||(li.classList.add("found","not_answered"),li.innerHTML="<img src='./img/pokemon/"+padZero(r,3)+".png' class='image_pokemon' loading='lazy' title='"+all_pokemon_list[r-1].name+"'>")}var a=toJapaneseHms(document.getElementById("timer").textContent),i=number_pokemons-remaining_number;return document.getElementById("text_surrender_modal").innerHTML="キミは"+a+"で<br>ポケモン"+i+"/"+number_pokemons+"匹言えたよ！",!1},document.getElementById("form_answer").onsubmit=function(){return checkAnswer(document.getElementById("input_answer").value),!1},document.form_answer.onreset=function(){if(0==remaining_number){stopTimer();var e=document.getElementById("input_answer");e.setAttribute("disabled",!0),e.setAttribute("placeholder","開始してね"),document.getElementById("button_answer").setAttribute("disabled",!0);var t=document.getElementById("button_start");t.textContent="開始",t.classList.replace("btn-danger","btn-success"),t.classList.add("stopped"),t.removeAttribute("data-bs-toggle"),t.removeAttribute("data-bs-target"),document.getElementById("button_tweet").classList.add("highlight"),setTimeout("showClearMessage()",1e3),playClearAudio()}},document.getElementById("button_tweet").onclick=function(){openTweetWindow()},document.getElementById("button_tweet_surrender_modal").onclick=function(){openTweetWindow()},document.getElementById("button_tweet_clear_modal").onclick=function(){openTweetWindow()};