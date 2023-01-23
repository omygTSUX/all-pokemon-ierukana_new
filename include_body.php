<body class="px-2 pb-2 px-sm-4 px-lg-5 gen-<?php echo $gen; ?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QG7HRH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="none_onfocus">
        <div class="container mb-1 border rounded pc_only bgcolor_white_alpha">
            <div class="row rounded">
                <div class="col text-center p-0">
                    <a class="navi" href="./gen01.html">カントー</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./gen02.html">ジョウト</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./gen03.html">ホウエン</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./gen04.html">シンオウ</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./gen05.html">イッシュ</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./gen06.html">カロス</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./gen07.html">アローラ</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./gen08.html">ガラル</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./gen09.html">パルデア</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./">全部</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi note" href="./challengemode.html">むずかし</a>
                </div>
            </div>
        </div>
        <div class="dropdown sp_only">
            <div class="dropdown-wrapper bgcolor_white_alpha me-0 ms-auto">
                <button class="btn dropdown-toggle btn-sm border rounded" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    他の地方
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item navi" href="./gen01.html">カントー</a></li>
                    <li><a class="dropdown-item navi" href="./gen02.html">ジョウト</a></li>
                    <li><a class="dropdown-item navi" href="./gen03.html">ホウエン</a></li>
                    <li><a class="dropdown-item navi" href="./gen04.html">シンオウ</a></li>
                    <li><a class="dropdown-item navi" href="./gen05.html">イッシュ</a></li>
                    <li><a class="dropdown-item navi" href="./gen06.html">カロス</a></li>
                    <li><a class="dropdown-item navi" href="./gen07.html">アローラ</a></li>
                    <li><a class="dropdown-item navi" href="./gen08.html">ガラル</a></li>
                    <li><a class="dropdown-item navi" href="./gen09.html">パルデア</a></li>
                    <li><a class="dropdown-item navi" href="./">全部</a></li>
                    <li><a class="dropdown-item navi" href="./challengemode.html">むずかし版</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div id="others">
            <div class="modal fade" id="confirm_modal" tabindex="-1" aria-labelledby="confirm_modal_label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>勝負を　あきらめて<br>降参しますか？</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="button_confirm" class="btn btn-primary btn-sm" data-bs-target="#surrender_modal" data-bs-toggle="modal" data-bs-dismiss="modal">はい</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">いいえ</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="surrender_modal" tabindex="-1" aria-labelledby="surrender_modal_label" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-target="#ad_modal" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                キミは<span id="surrender_time"></span>で<br>ポケモン<span id="num_answers"></span> / <?php echo $number_pokemons; ?>匹言えたよ！
                            </p>
                            <p class="small">降参した<span id="num_surrender_players">[通信待機中…]</span>人の平均解答数：<span id="average_num_answers">[通信待機中…]</span> / <?php echo $number_pokemons; ?>匹
                            </p>
                            <p id="message_best_num_answers"></p>
                        </div>
                        <div class="modal-footer dropup">
                            <button class="dropdown_sns btn dropdown-toggle btn-sm text-white" type="button" id="dropdownMenuSnsShareSurrenderModal" data-bs-toggle="dropdown" aria-expanded="false">
                                結果をSNSにシェア
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSnsShareSurrenderModal">
                                <li class="mb-1"><a rel="nofollow" role="button"
                                        class="button_tweet btn btn-sm text-white"
                                        onclick="openTweetWindow();"><img src="./img/system/logo_twitter.png" class="sns_logo"> 結果をTwitterにシェア</a></li>
                                <li class="mb-1"><a rel="nofollow" role="button"
                                        class="button_facebook btn btn-sm text-white"
                                        onclick="copyResultText('openFacebook()');"><img src="./img/system/logo_facebook.png" class="sns_logo"> 結果をコピーしてFacebookにシェア</a></li>
                                <li class="mb-1"><a rel="nofollow" role="button"
                                        class="button_line btn btn-sm text-white"
                                        onclick="copyResultText('openLine()');"><img src="./img/system/logo_line.png" class="sns_logo"> 結果をコピーしてLINEにシェア</a></li>
                                <li class="mb-1"><a rel="nofollow" role="button"
                                        class="button_instagram btn btn-sm text-white"
                                        onclick="copyResultText('openInstagram()');"><img src="./img/system/logo_instagram.png" class="sns_logo"> 結果をコピーしてInstagramにシェア</a></li>
                            </ul>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-target="#ad_modal" data-bs-toggle="modal" data-bs-dismiss="modal">閉じる</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="clear_modal" tabindex="-1" aria-labelledby="clear_modal_label" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-target="#ad_modal" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $clear_message; ?>
                            <p class="small">キミのクリアタイム：<span id="clear_time"></span><br>
                                クリアした<span id="num_clear_players">[通信待機中…]</span>人の平均タイム：<span id="average_time">[通信待機中…]</span>
                            </p>
                            <p id="message_ranking"></p>
                        </div>
                        <div class="modal-footer dropup">
                            <button class="dropdown_sns btn dropdown-toggle btn-sm text-white" type="button" id="dropdownMenuSnsShareClearModal" data-bs-toggle="dropdown" aria-expanded="false">
                                結果をSNSにシェア
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSnsShareClearModal">
                                <li class="mb-1"><a rel="nofollow" role="button"
                                        class="button_tweet btn btn-sm text-white"
                                        onclick="openTweetWindow();"><img src="./img/system/logo_twitter.png" class="sns_logo"> 結果をTwitterにシェア</a></li>
                                <li class="mb-1"><a rel="nofollow" role="button"
                                        class="button_facebook btn btn-sm text-white"
                                        onclick="copyResultText('openFacebook()');"><img src="./img/system/logo_facebook.png" class="sns_logo"> 結果をコピーしてFacebookにシェア</a></li>
                                <li class="mb-1"><a rel="nofollow" role="button"
                                        class="button_line btn btn-sm text-white"
                                        onclick="copyResultText('openLine()');"><img src="./img/system/logo_line.png" class="sns_logo"> 結果をコピーしてLINEにシェア</a></li>
                                <li class="mb-1"><a rel="nofollow" role="button"
                                        class="button_instagram btn btn-sm text-white"
                                        onclick="copyResultText('openInstagram()');"><img src="./img/system/logo_instagram.png" class="sns_logo"> 結果をコピーしてInstagramにシェア</a></li>
                            </ul>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-target="#ad_modal" data-bs-toggle="modal" data-bs-dismiss="modal">閉じる</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ad_modal" tabindex="-1" aria-labelledby="ad_modal_label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            広告<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="ad_modal_a8" class="text-center">
                            <a href="https://px.a8.net/svt/ejp?a8mat=3NNEHH+CLOCII+CO4+15XZKH" rel="nofollow">
                    <img border="0" width="300" height="250" alt="" src="https://www25.a8.net/svt/bgt?aid=221121557762&wid=002&eno=01&mid=s00000001642007045000&mc=1"></a>
                <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=3NNEHH+CLOCII+CO4+15XZKH" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 id="h1" class="mb-0 text-center h2 none_onfocus">
                <?php echo $h1; ?>
            </h1>
            <p class="text-center small mb-0 none_onfocus"><?php echo $note; ?></p>
            <div class="container mb-2 rounded">
                <div class="row rounded">
                    <div class="col-6 col-md-auto col-lg-3 border rounded text-center bgcolor_white_alpha fit-content">
                        <p id="timer" class="h4 mb-0">000:00:00</p>
                    </div>
                    <div class="col-6 col-md-auto col-lg-3 border rounded text-center bgcolor_white_alpha fit-content">
                        <p id="progress" class="xx-small mb-0">現在<span id="span_number_answered" class="h4">???</span>匹 残り<span id="span_remaining_number" class="h4">???</span>匹</p>
                    </div>
                    <div class="col-auto">
                        <form name="form_answer" id="form_answer" autocomplete="off">
                            <div class="row">
                                <div class="col-auto">
                                    <input type="text" id="input_answer" placeholder="開始してね" class="form-control-sm" disabled>
                                </div>
                                <div class="col-auto">
                                    <input type="submit" id="button_answer" value="回答" class="btn btn-primary btn-sm xx-small-sp" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <button id="button_start" class="btn btn-success btn-sm stopped initial xx-small-sp">開始</button>
                    </div>
                    <div class="col-auto">
                        <button id="button_menu" class="btn btn-secondary btn-sm xx-small-sp">全画面化</button>
                    </div>
                    <div class="col-auto">
                        <button class="dropdown_sns btn dropdown-toggle btn-sm text-white xx-small-sp" type="button" id="dropdownMenuSnsShare" data-bs-toggle="dropdown" aria-expanded="false">
                            SNS共有
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuSnsShare">
                            <li class="mb-1"><a rel="nofollow" role="button"
                                    class="button_tweet btn btn-sm text-white xx-small-sp"
                                    onclick="openTweetWindow();"><img src="./img/system/logo_twitter.png" class="sns_logo"> 結果をTwitterにシェア</a></li>
                            <li class="mb-1"><a rel="nofollow" role="button"
                                    class="button_facebook btn btn-sm text-white xx-small-sp"
                                    onclick="copyResultText('openFacebook()');"><img src="./img/system/logo_facebook.png" class="sns_logo"> 結果をコピーしてFacebookにシェア</a></li>
                            <li class="mb-1"><a rel="nofollow" role="button"
                                    class="button_line btn btn-sm text-white xx-small-sp"
                                    onclick="copyResultText('openLine()');"><img src="./img/system/logo_line.png" class="sns_logo"> 結果をコピーしてLINEにシェア</a></li>
                            <li class="mb-1"><a rel="nofollow" role="button"
                                    class="button_instagram btn btn-sm text-white xx-small-sp"
                                    onclick="copyResultText('openInstagram()');"><img src="./img/system/logo_instagram.png" class="sns_logo"> 結果をコピーしてInstagramにシェア</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul id="pokemon_list" class="list-unstyled d-flex flex-wrap border border-secondary rounded p-0 bgcolor_white all_pokemon">
        </ul>
    </main>
    <footer class="none_onfocus">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="audio" class="form-check form-switch text-start xx-small mb-0">
                        <label for="checkbox_audio" class="form-check-label">効果音</label>
                        <input id="checkbox_audio" type="checkbox" class="form-check-input" checked>
                    </div>
                    <div id="scroll" class="form-check form-switch text-start xx-small mt-0">
                        <label for="checkbox_scroll" class="form-check-label">自動スクロール</label>
                        <input id="checkbox_scroll" type="checkbox" class="form-check-input" checked>
                    </div>
                </div>
                <div id="author" class="col text-end xx-small">
                    <a href="https://twitter.com/omygTSUX" target="blank" onClick="gtag('event', 'click', {'event_category': 'author', 'event_label': 'author'});">バグ報告は作者へ：@omygTSUX</a>
                </div>
            </div>
        </div>
        <div id="copyright">
            <p class="mb-0 xx-small note">
                「ポケモン全部言えるかな？ゲーム」は、ポケットモンスターの非公式2次創作です。<br>
                ©2006 Pokémon. ©1995-2006 Nintendo/Creatures Inc./GAME FREAK inc.<br>
                「Pokémon DP Sound Library」の利用規約に同意し作成されたコンテンツです。
            </p>
            <div class="text-center small note">
                <a href="./ranking.html">クリアタイムランキング</a>　
                <a href="./privacypolicy.html">プライバシーポリシー・配信ガイドライン</a>
            </div>
        </div>
    </footer>
    <?php require("include_ad.php"); ?>
</body>