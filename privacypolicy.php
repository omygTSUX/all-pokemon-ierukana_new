<?php
$gen = "all";
$number_start = 1;
$number_pokemons = 1020;
if ($_SERVER['SERVER_NAME'] == "all-pokemon-ierukana.com") {
    $css = "style.css?" . date('YmdHis');
    $script = "";
} else {
    $css = "style_raw.css?" . date('YmdHis');
    $script = "";
}
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
} else {
    $lang = "ja";
}

if ($lang == "en-us") {
    $region = "all";
    $title = "Privacy Policy｜Can You Name All the Pokémon? Quiz";
    $description = "Description of Privacy Policy";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_all.png";
} else {
    $region = "全";
    $title = "プライバシーポリシー｜ポケモン全部言えるかな？ゲーム";
    $description = "プライバシーポリシーの説明";
    $twitter_image = "https://all-pokemon-ierukana.com/img/system/tweet_all.png";
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<?php
require("include_head.php");
?>

<body class="px-2 pb-2 px-sm-4 px-lg-5">
    <?php require("include_header.php"); ?>
    <?php
    if ($lang == "en-us") {
        require("include_privacypolicy_main_en.php");
    } else {
        require("include_privacypolicy_main.php");
    }
    ?>
    <?php require("include_footer.php"); ?>
    <?php require("include_ad.php"); ?>
</body>

</html>