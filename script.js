function setNumberOfPokemons(e){document.getElementById("number_pokemons").textContent=e}function setRemainingNumber(e){document.getElementById("remaining_number").textContent="残り"+padZero(e,3)+"匹"}function createPokemonList(e,t){for(var n=document.getElementById("pokemon_list"),o="",r=0;r<e;r++){o+="<li class='li_wrapper'>"+("<div id='pokemon_"+(t+r)+"' class='li_pokemon xx-small m-1'>"+padZero(t+r,3)+"</div>")+"</li>"}n.innerHTML=o}function getCSV(){var e=new XMLHttpRequest;e.open("get","all_pokemon.csv",!0),e.send(null),e.onload=function(){convertCSVtoArray(e.responseText)}}function convertCSVtoArray(e){window.all_pokemon_list=[];for(var t=e.split("\n"),n=0;n<t.length;++n)all_pokemon_list[n]=t[n].split(",")}function getJson(){var e=new XMLHttpRequest;e.open("get","all_pokemon.json",!0),e.send(null),e.onload=function(){window.all_pokemon_list=JSON.parse(e.responseText)}}function padZero(e,t){return("00000"+e).slice(-t)}function toHms(e){var t=e%3600/60|0,n=e%60;return padZero(e/3600|0,3)+":"+padZero(t,2)+":"+padZero(n,2)}function toJapaneseHms(e){var t=e.split(":");return Number(t[0])+"時間"+Number(t[1])+"分"+Number(t[2])+"秒"}function setTime(){var e=(new Date).getTime()-start_time;document.getElementById("timer").textContent=toHms(Math.floor(e/1e3))}function startTimer(){window.timer_count=setInterval("setTime()",1e3)}function stopTimer(){clearInterval(timer_count)}function hiraToKata(e){return e.replace(/[\u3041-\u3096]/g,e=>String.fromCharCode(e.charCodeAt(0)+96))}function eratta(e){var t=e;t=hiraToKata(e);for(p of[["ニドランオス","ニドラン♂"],["ニドランメス","ニドラン♀"],["ポリゴンツー","ポリゴン2"],["ポリゴン２","ポリゴン2"],["ポリゴンゼット","ポリゴンZ"],["ポリゴンｚ","ポリゴンZ"],["ポリゴンＺ","ポリゴンZ"],["ポリゴンz","ポリゴンZ"],["タイプヌル","タイプ:ヌル"],["タイプ：ヌル","タイプ:ヌル"],["カプ･コケコ","カプ・コケコ"],["カプコケコ","カプ・コケコ"],["カプ･テテフ","カプ・テテフ"],["カプテテフ","カプ・テテフ"],["カプ･ブルル","カプ・ブルル"],["カプブルル","カプ・ブルル"],["カプ･レヒレ","カプ・レヒレ"],["カプレヒレ","カプ・レヒレ"]])if(t==p[0]){t=p[1];break}return t}function checkAnswer(e){var t=eratta(e),n=all_pokemon_list.find(e=>e.name===t);if(null!=n&&!answered_list[n.number-number_start+1]){var o=document.getElementById("pokemon_"+n.number);o.classList.add("found"),o.innerHTML="<img src='./img/"+padZero(n.number,3)+".png' class='image_pokemon'>",answered_list[n.number-number_start+1]=!0,remaining_number--,setRemainingNumber(remaining_number),window.last_pokemon=n.name,document.form_answer.reset()}}function alertClearMessage(){window.alert("クリアおめでとう！結果Tweetボタンでぜひ共有してください！")}window.addEventListener("DOMContentLoaded",function(){window.answered_list=Array(number_pokemons+1).fill(!1),window.remaining_number=number_pokemons,setNumberOfPokemons(number_pokemons),setRemainingNumber(number_pokemons),createPokemonList(number_pokemons,number_start)},!1),document.getElementById("button_start").onclick=function(){var e=document.getElementById("button_start");if(e.classList.contains("stopped")){"undefined"==typeof all_pokemon_list&&getJson(),window.start_time=(new Date).getTime(),startTimer(),document.getElementById("input_answer").removeAttribute("disabled"),document.getElementById("button_answer").removeAttribute("disabled"),e.textContent="降参",e.classList.replace("btn-success","btn-danger"),e.classList.remove("stopped"),remaining_number=number_pokemons,setRemainingNumber(remaining_number),answered_list.fill(!1);var t=document.getElementsByClassName("li_pokemon");for(li of t){li.classList.remove("found","not_answered");var n=li.id.slice(8);li.textContent=padZero(n,3)}}else{var o=answered_list;stopTimer(),document.getElementById("input_answer").setAttribute("disabled",!0),document.getElementById("button_answer").setAttribute("disabled",!0),e.textContent="開始",e.classList.replace("btn-danger","btn-success"),e.classList.add("stopped");t=document.getElementsByClassName("li_pokemon");for(li of t){o[(n=li.id.slice(8))-number_start+1]||(li.classList.add("found","not_answered"),li.innerHTML="<img src='./img/"+padZero(n,3)+".png' class='image_pokemon' loading='lazy'>")}}return!1},document.getElementById("form_answer").onsubmit=function(){return checkAnswer(document.getElementById("input_answer").value),!1},document.form_answer.onreset=function(){if(0==remaining_number){stopTimer();var e=document.getElementById("button_start");document.getElementById("input_answer").setAttribute("disabled",!0),document.getElementById("button_answer").setAttribute("disabled",!0),e.textContent="開始",e.classList.replace("btn-danger","btn-success"),e.classList.add("stopped"),setTimeout("alertClearMessage()",500)}},document.getElementById("button_tweet").onclick=function(){var e,t=toJapaneseHms(document.getElementById("timer").textContent),n=number_pokemons-remaining_number,o=document.title,r=location.href;return e=0==remaining_number?"https://twitter.com/share?text="+t+"でポケモン"+n+"/"+number_pokemons+"匹言えた！最後のポケモンは"+last_pokemon+"だった！ - "+o+"&url="+r+"&hashtags=ポケモン全部言えるかな":"https://twitter.com/share?text="+t+"でポケモン"+n+"/"+number_pokemons+"匹言えた！ - "+o+"&url="+r+"&hashtags=ポケモン全部言えるかな",window.open(encodeURI(decodeURI(e)),"tweetwindow","width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1"),ga("send","event","button_tweet","click","button_tweet","1"),!1},document.getElementById("author_link").onclick=function(){ga("send","event","author","click","author","1")};