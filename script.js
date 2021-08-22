
// 表を動的に生成する関数
function createTable(number_pokemons) {
    // ヘッダー行を追加する
    var thead = document.getElementById('thead_pokedex_number');
    var tr = document.createElement('tr');
    for (var c = 0; c < Math.ceil(number_pokemons / 100); c++) {
        var th = document.createElement('th');
        th.innerHTML = (c * 100 + 1) + "〜" + ((c + 1) * 100);
        tr.appendChild(th);
    }
    thead.appendChild(tr);

    // ボディを追加する
    var tbody = document.getElementById('tbody_pokemons');
    for (var r = 0; r < 100; r++) {
        var tr = document.createElement('tr');
        for (var c = 0; c < Math.ceil(number_pokemons / 100); c++) {
            var td = document.createElement('td');
            tr.appendChild(td);
        }
        tbody.appendChild(tr);
    }
}

// ページロード時に自動実行する関数
window.onload = function () {
    var number_pokemons = 900;
    createTable(number_pokemons);
}