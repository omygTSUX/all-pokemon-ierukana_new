document.getElementById("form_ranking_test").onsubmit = function () {
    var name = document.getElementById("input_name").value;
    var time = document.getElementById("input_time").value;
    data = "name="+ name + "&time="+ time;
    // var fd = new FormData();
    // fd.append('name', "テスト６");
    // fd.append('time', 3603);
    var request = new XMLHttpRequest();
    request.open('post', "sqlite_test copy.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(data);
    request.onload = function () {
        var p = document.getElementById("response");
        console.log(request.responseText);
        var res = JSON.parse(request.responseText);
        var gen = res["gen"];
        var average_time = res["average_time"];
        var num_players = res["num_players"];
        p.innerHTML = "gen: "+gen +"<br>"+"average_time: "+average_time +"<br>"+"num_players: "+num_players +"<br>";
    }
    return false;
}