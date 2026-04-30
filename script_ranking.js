function selectRegionRanking(region){
    var current_region = document.getElementById("dropdownMenuButtonRanking");
    current_region.textContent = region.name;

    var data = "clear_time=99999999&player_id=0&gen=" + region.value + "&lang=" + lang;
    var request = new XMLHttpRequest();
    if(lang=="ja" && document.getElementById("checkbox_old_ranking").checked){
        request.open('post', "sqlite_fetch_old_ranking.php", true);
    }
    else{
        request.open('post', "sqlite_fetch_ranking.php", true);
    }
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(data);
    request.onload = function () {
        // console.log(request.responseText);
        var res = JSON.parse(request.responseText);
        var ranking = res["ranking"];
    
        var tbody = document.getElementById('tbody_ranking');
        var dom = "";
        var ranking_length = Object.keys(ranking).length;
        for (var p = 0; p < Math.min(ranking_length, 100); p++) {
            var rank = ranking[p]["ranking"];
            var name = ranking[p]["name"];
            var time = toHms(ranking[p]["clear_time"]);

            var th_rank = "<th scope='row'>" + rank + "</th>";
            var td_name = "<td>" + name + "</td>";
            var td_time = "<td>" + time + "</td>";
            var row_color = "";
            switch (p){
                case 0:{
                    row_color = "table-warning";
                    break;
                }
                case 1:{
                    row_color = "table-secondary";
                    break;
                }
                case 2:{
                    row_color = "table-danger";
                    break;
                }
                default:{
                    row_color = "";
                }
            }
    
            var tr = "<tr class='" + row_color + "'>" + th_rank + td_name + td_time + "</tr>";
            dom += tr;
        }
        tbody.innerHTML = dom;
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

    hms = padZero(h, 1) + ":" + padZero(m, 2) + ":" + padZero(s, 2);

    return hms;
}