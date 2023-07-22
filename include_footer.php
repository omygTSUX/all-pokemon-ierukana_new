<?php if ($lang == "en-us") {
        $text_sound = "Sound";
        $text_scroll = "Auto Scroll";
        $text_author = "Send bug reports to the author: @omygTSUX";
        $text_copyright = "“Can You Name All the Pokémon? Quiz” is an unofficial derivative work of Pokémon.";
        $text_ranking = "Clear Time Ranking";
        $text_privacypolicy = "Privacy Policy / Distribution Guideliney";
} else {
    $text_sound = "効果音";
    $text_scroll = "自動スクロール";
    $text_author = "バグ報告は作者へ：@omygTSUX";
    $text_copyright = "「ポケモン全部言えるかな？ゲーム」は、ポケットモンスターの非公式2次創作です。";
    $text_ranking = "クリアタイムランキング";
    $text_privacypolicy = "プライバシーポリシー・配信ガイドライン";
}
?>
<footer class="none_onfocus">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="audio" class="form-check form-switch text-start xx-small mb-0">
                    <label for="checkbox_audio" class="form-check-label"><?php echo $text_sound; ?></label>
                    <input id="checkbox_audio" type="checkbox" class="form-check-input" checked>
                </div>
                <div id="scroll" class="form-check form-switch text-start xx-small mt-0">
                    <label for="checkbox_scroll" class="form-check-label"><?php echo $text_scroll; ?></label>
                    <input id="checkbox_scroll" type="checkbox" class="form-check-input" checked>
                </div>
            </div>
            <div id="author" class="col text-end xx-small">
                <a href="https://twitter.com/omygTSUX" target="blank" onClick="gtag('event', 'click', {'event_category': 'author', 'event_label': 'author'});"><?php echo $text_author; ?></a>
            </div>
        </div>
    </div>
    <div id="copyright">
        <p class="mb-0 xx-small note">
            <?php echo $text_copyright; ?>
        </p>
        <div class="text-center small note">
            <a href="ranking?lang=<?php echo $lang; ?>">
                <?php echo $text_ranking; ?>
            </a>
            　
            <a href="privacypolicy?lang=<?php echo $lang; ?>">
                <?php echo $text_privacypolicy; ?>
            </a>
        </div>
    </div>
</footer>