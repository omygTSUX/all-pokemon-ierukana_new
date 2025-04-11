<?php
$gen = "all";
$number_start = 1;
$number_pokemons = 1020;
if ($_SERVER['SERVER_NAME'] == "all-pokemon-ierukana.com") {
    $css = "style.css?" . date('YmdHis');
    $script = "script_ranking.js?" . date('YmdHis');
} else {
    $css = "style_raw.css?" . date('YmdHis');
    $script = "script_ranking.js?" . date('YmdHis');
}
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}
else{
    $lang = "ja";
}

if ($lang == "en-us") {
    $region = "all";
    $title = "Ranking｜Can You Name All the Pokémon? Quiz";
    $description = "Clear Time Ranking";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_all.png";
} else {
    $region = "全";
    $title = "ランキング｜ポケモン全部言えるかな？ゲーム";
    $description = "クリアタイムランキング";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_all.png";
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<?php
require("include_head.php");
require("include_ranking_body.php");
?>

</html>