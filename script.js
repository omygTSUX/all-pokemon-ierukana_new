function createTable (number_pokemons) {
    // ヘッダー行を追加する
    var thead = document.getElementsByClassName('thead_pokedex_number');
    var tr = document.createElement('tr');
    for (var c = 0; c < Math.ceil(number_pokemons / 100); c++) {
        var th = document.createElement('th');
        th.innerHTML = (c*100 + 1) + "〜" + ((c+1)*100);
    }
    thead.appendChild(tr);

    // ボディを追加する
    var tbody = document.getElementsByClassName('tbody_pokemons');
    for (var r = 0; r < 100; r++) {
        var tr = document.createElement('tr');
        for (var c = 0; c < Math.ceil(number_pokemons / 100); c++) {
          var td = document.createElement('td');
          tr.appendChild(td);
        }
        tbody.appendChild(tr);
    }
}

window.onload = (function () {
    var number_pokemons = 900;
    createTable(number_pokemons);
})