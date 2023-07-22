<?php
$gen = "3";
$number_start = 252;
$number_pokemons = 135;
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
    $region = "Hoenn";
    $title = "Can You Name the $number_pokemons $region Pokémon? Quiz";
    $description = "Can you name the $number_pokemons $region Pokémon？ Let's challenge the time attack quiz game to name the " . $number_pokemons ." ". $region . " Pokémon!";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_3.png";
    $clear_message = "<p>Congratulations!<br>You are a master of " . $region . " Pokémon!</p>";
    $h1 = "Can You Name the ".$number_pokemons." <ruby>".$region."<rt>Gen.".$gen."</rt></ruby> Pokémon?";
    $note = "";
} else {
    $region = "ホウエン";
    $title = "第".$gen."世代".$region."ポケモン".$number_pokemons."匹言えるかな？ゲーム";
    $description = "キミは第".$gen."世代".$region."ポケモン".$number_pokemons."匹言えるかな？第".$gen."世代".$region."ポケモン".$number_pokemons."匹を答えるタイムアタッククイズゲームにチャレンジしよう！";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_3.png";
    $clear_message = "<p>クリアおめでとう！<br>キミは".$region."ポケモンマスターだ！</p>";
    $h1 = "<ruby>".$region."<rt>第".$gen."世代</rt></ruby>ポケモン".$number_pokemons."匹言えるかな？";
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