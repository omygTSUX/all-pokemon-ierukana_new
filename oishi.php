<?php
$gen = "oishi";
$number_start = 1;
$number_pokemons = 1025;
if ($_SERVER['SERVER_NAME'] == "all-pokemon-ierukana.com") {
    $css = "style.css?" . date('YmdHis');
    $script = "script.js?" . date('YmdHis');
} else {
    $css = "style_raw.css?" . date('YmdHis');
    $script = "script_raw.js?" . date('YmdHis');
}
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}
else{
    $lang = "ja";
}

if ($lang == "en-us") {
    $region = "Oishi";
    $title = "Can You Name the \"Pokémon All Stars 1025\"? Quiz";
    $description = "Can You Name the \"Pokémon All Stars 1025\"? Let's challenge the time attack quiz game to name the \"Pokémon All Stars 1025\" Pokémon in order!";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_oishi.png";
    $clear_message = "<p>Congratulations!<br>You are the Masayoshi Oishi!</p>";
    $h1 = "Can You Name the ".$number_pokemons." Oishi's Pokémon?";
    $note = "";
} else {
    $region = "オーイシ";
    $title = "『ポケモンオールスターズ1025』言えるかな？ゲーム";
    $description = "キミは『ポケモンオールスターズ1025』言えるかな？『ポケモンオールスターズ1025』の順番通りにポケモンを答えるタイムアタッククイズゲームにチャレンジしよう！";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_oishi.png";
    $clear_message = "<p>クリアおめでとう！<br>キミはオーイシマサヨシだ！</p>";
    $h1 = "『ポケモンオールスターズ1025』言えるかな？";
    $note = "";
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<?php
require("include_head.php");
require("include_body.php");
?>

</html>