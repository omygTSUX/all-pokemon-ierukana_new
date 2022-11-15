<!DOCTYPE html>
<html lang="ja">
<?php
$gen = "6";
$number_start = 650;
$number_pokemons = 72;
$region = "カロス";
$title = $region."ポケモン".$number_pokemons."匹言えるかな？ゲーム";
$description = "キミは".$region."ポケモン".$number_pokemons."匹言えるかな？".$region."ポケモン".$number_pokemons."匹を答えるタイムアタッククイズゲームにチャレンジしよう！";
$twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_6.png";
$css = "style_raw.css?".date('YmdHis');
$script = "script_raw.js?".date('YmdHis');

require("include_head.php");

$clear_message = "<p>クリアおめでとう！<br>キミは".$region."ポケモンマスターだ！</p>";
$h1 = $region."ポケモン".$number_pokemons."匹言えるかな？";
$note = "";

require("include_body.php");
?>
</html>