<?php
$gen = "all";
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
} else {
    $lang = "ja";
}

if ($lang == "en-us") {
    $region = "all";
    $title = "Can You Name All the Pokémon? Quiz";
    $description = "Can you name " . $region . " the " . $number_pokemons . " Pokémon？ Let's challenge the time attack quiz game to name " . $region . " the " . $number_pokemons . " Pokémon!";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_all.png";
    $clear_message = "<p>Congratulations!<br>You are truly a master of " . $region . " the Pokémon!</p>";
    $h1 = "Can You Name " . ucfirst($region) . " the " . $number_pokemons . " Pokémon?";
    $note = "";
} else {
    $region = "全";
    $title = "ポケモン全部言えるかな？ゲーム";
    $description = "キミは" . $region . "ポケモン" . $number_pokemons . "匹言えるかな？" . $region . "ポケモン" . $number_pokemons . "匹を答えるタイムアタッククイズゲームにチャレンジしよう！";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_all.png";
    $clear_message = "<p>クリアおめでとう！<br>キミはまさしく" . $region . "ポケモンマスターだ！</p>";
    $h1 = $region . "ポケモン" . $number_pokemons . "匹言えるかな？";
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