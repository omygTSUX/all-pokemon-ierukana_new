<!DOCTYPE html>
<html lang="ja">
<?php
$gen = "7";
$number_start = 722;
$number_pokemons = 88;
$region = "アローラ・GO";
$title = "第".$gen."世代".$region."ポケモン".$number_pokemons."匹言えるかな？ゲーム";
$description = "キミは第".$gen."世代".$region."ポケモン".$number_pokemons."匹言えるかな？第".$gen."世代".$region."ポケモン".$number_pokemons."匹を答えるタイムアタッククイズゲームにチャレンジしよう！";
$twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_7.png";
$css = "style.css?".date('YmdHis');
$script = "script.js?".date('YmdHis');

require("include_head.php");

$clear_message = "<p>クリアおめでとう！<br>キミは".$region."ポケモンマスターだ！</p>";
$h1 = "<ruby>".$region."<rt>第".$gen."世代</rt></ruby>ポケモン".$number_pokemons."匹言えるかな？";
$note = "";

require("include_body.php");
?>
</html>