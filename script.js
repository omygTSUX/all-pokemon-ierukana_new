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
        tr.appendChild(th);
    }
    var th = document.createElement('th');
    th.innerHTML = (c * 100 + 1) + "〜" + number_pokemons;
    tr.appendChild(th);
    thead.appendChild(tr);

    // ボディを追加する
    var tbody = document.getElementById('tbody_pokemons');
    for (var r = 0; r < 100; r++) {
        var tr = document.createElement('tr');
        for (var c = 0; c < Math.ceil(number_pokemons / 100); c++) {
            var td = document.createElement('td');
            td.setAttribute("id", "pokemon_" + (c*100 + r+1));
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

// ページロード時に自動実行する関数
window.onload = function () {
    var number_pokemons = 900;
    setNumberOfPokemons(number_pokemons);
    createTable(number_pokemons);
}