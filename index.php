<!DOCTYPE html>
<html lang="ja">
<?php
$gen = "all";
$number_start = 1;
$number_pokemons = 1008;
$region = "全";
$title = "ポケモン全部言えるかな？ゲーム";
$description = "キミは".$region."ポケモン".$number_pokemons."匹言えるかな？".$region."ポケモン".$number_pokemons."匹を答えるタイムアタッククイズゲームにチャレンジしよう！";
$twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_all.png";
$css = "style_raw.css?".date('YmdHis');
$script = "script_raw.js?".date('YmdHis');

require("include_head.php");

$clear_message = "<p>クリアおめでとう！<br>キミはまさしく".$region."ポケモンマスターだ！</p>";
$h1 = $region."ポケモン".$number_pokemons."匹言えるかな？";
$note = "";

require("include_body.php");
?>
</html>