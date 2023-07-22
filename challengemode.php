<?php
$gen = "challenge";
$number_start = 1;
$number_pokemons = 1015;
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
    $region = "all";
    $title = "Can You Name All the Pokémon? Quiz (Challenge Mode)";
    $description = "Can you name " . $region . " the " . $number_pokemons . " Pokémon without Pokédex number hint？ Let's try challenge mode of the time attack quiz game to name " . $region . " the " . $number_pokemons . " Pokémon!";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_challenge.png";
    $clear_message = "<p>Congratulations!<br>You are a champion of Pokémon masters!</p>";
    $h1 = "Can You Name " . ucfirst($region) . " the " . $number_pokemons . " Pokémon? <span class='wrap'>(Challenge Mode)</span>";
    $note = "";
} else {
    $region = "全";
    $title = "ポケモン全部言えるかな？ゲーム(むずかし版)";
    $description = "キミは".$region."ポケモン".$number_pokemons."匹を図鑑番号のヒントなしに言えるかな？".$region."ポケモン".$number_pokemons."匹を答えるタイムアタッククイズゲームのむずかし版にチャレンジしよう！";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_challenge.png";
    $clear_message = "<p>クリアおめでとう！！！<br>キミはポケモンマスターのチャンピオンだ！</p>";
    $h1 = $region."ポケモン".$number_pokemons."匹言えるかな？<span class='wrap'>(むずかし版)</span>";
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