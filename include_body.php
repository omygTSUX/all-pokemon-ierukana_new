<body class="px-2 pb-2 px-sm-4 px-lg-5 gen-<?php echo $gen; ?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QG7HRH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="none_onfocus">
        <div class="container mb-1 border rounded pc_only bgcolor_white_alpha">
            <div class="row rounded">
                <div class="col text-center p-0">
                    <a class="navi" href="./1-151.html">カントー</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./152-251.html">ジョウト</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./252-386.html">ホウエン</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./387-493.html">シンオウ</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./494-649.html">イッシュ</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./650-721.html">カロス</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./722-809.html">アローラ</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./810-905.html">ガラル</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./">全部</a>
                </div>
                <div class="col text-center p-0">
                    <a class="navi" href="./challengemode.html">むずかし版</a>
                </div>
            </div>
        </div>
        <div class="dropdown sp_only">
            <div class="dropdown-wrapper bgcolor_white_alpha me-0 ms-auto">
                <button class="btn dropdown-toggle btn-sm border rounded" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    他の地方
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item navi" href="./1-151.html">カントー</a></li>
                    <li><a class="dropdown-item navi" href="./152-251.html">ジョウト</a></li>
                    <li><a class="dropdown-item navi" href="./252-386.html">ホウエン</a></li>
                    <li><a class="dropdown-item navi" href="./387-493.html">シンオウ</a></li>
                    <li><a class="dropdown-item navi" href="./494-649.html">イッシュ</a></li>
                    <li><a class="dropdown-item navi" href="./650-721.html">カロス</a></li>
                    <li><a class="dropdown-item navi" href="./722-809.html">アローラ</a></li>
                    <li><a class="dropdown-item navi" href="./810-905.html">ガラル</a></li>
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
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-target="#ad_modal" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="text_surrender_modal"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="button_tweet_surrender_modal" class="btn btn-info btn-sm" data-bs-dismiss="modal">結果Tweet</button>
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
                                クリアした<span id="num_players">[通信待機中…]</span>人の平均タイム：<span
                                    id="average_time">[通信待機中…]</span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="button_tweet_clear_modal" class="btn btn-info btn-sm" data-bs-dismiss="modal">結果Tweet</button>
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
                            <div id="ad_modal_admax" class="text-center">
                                <!-- admax -->
                                <script src="https://adm.shinobi.jp/o/2a44cdc906aa04b85f7842733f5214d1"></script>
                                <!-- admax -->
                            </div>
                            <div id="ad_modal_a8" class="text-center">
                                <a href="https://px.a8.net/svt/ejp?a8mat=3NH3FJ+XXR16+50+2HH0SH" target="_blank" rel="nofollow noopener">
                                    <img border="0" width="300" height="300" alt="" src="https://www27.a8.net/svt/bgt?aid=220827295057&wid=002&eno=01&mid=s00000000018015028000&mc=1"></a>
                                <img border="0" width="1" height="1" src="https://www18.a8.net/0.gif?a8mat=3NH3FJ+XXR16+50+2HH0SH" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 id="h1" class="mb-0 text-center h2 none_onfocus">
                <?php echo $h1; ?>
            </h1>
            <p class="text-center xx-small note mb-0 none_onfocus"><?php echo $note; ?></p>
            <div class="container mb-2 rounded">
                <div class="row rounded">
                    <div class="col-md-3 col-6 border rounded text-center bgcolor_white_alpha fit-content">
                        <p id="timer" class="h4 mb-0">000:00:00</p>
                    </div>
                    <div class="col-md-3 col-6 border rounded text-center bgcolor_white_alpha fit-content">
                        <p id="remaining_number" class="h4 mb-0">残り???匹</p>
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
                    <div class="col-auto rounded">
                        <a id="button_tweet" rel="nofollow" role="button" class="btn btn-info btn-sm xx-small-sp" onClick="gtag('event', 'click', {'event_category': 'button_tweet', 'event_label': 'button_tweet'});">結果Tweet</a>
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
        <div id="copyright" class="xx-small note">
            <p class="mb-0">
                「ポケモン全部言えるかな？ゲーム」は、ポケットモンスターの非公式2次創作です。<br>
                ©2006 Pokémon. ©1995-2006 Nintendo/Creatures Inc./GAME FREAK inc.<br>
                「Pokémon DP Sound Library」の利用規約に同意し作成されたコンテンツです。
            </p>
            <div class="text-center xx-small note">
                <a href="./privacypolicy.html">プライバシーポリシー</a>
            </div>
        </div>
    </footer>
    <div class="container mt-4 border border-secondary rounded">
        <p class="mt-2 small fw-bold text-center">広告</p>
        <div class="row">
            <div class="col">
                <div class="text-center mt-4">
                    <!-- START MoshimoAffiliateEasyLink -->
                    <script type="text/javascript">
                        (function(b, c, f, g, a, d, e) {
                            b.MoshimoAffiliateObject = a;
                            b[a] = b[a] || function() {
                                arguments.currentScript = c.currentScript ||
                                    c.scripts[c.scripts.length - 2];
                                (b[a].q = b[a].q || []).push(arguments)
                            };
                            c.getElementById(a) || (d = c.createElement(f), d.src = g,
                                d.id = a, e = c.getElementsByTagName("body")[0], e.appendChild(d))
                        })
                        (window, document, "script", "//dn.msmstatic.com/site/cardlink/bundle.js?20220329", "msmaflink");
                        msmaflink({
                            "n": "ロストアビス 【BOX（30パック入り）】",
                            "b": "",
                            "t": "",
                            "d": "https:\/\/thumbnail.image.rakuten.co.jp",
                            "c_p": "",
                            "p": ["\/@0_mall\/aromacoffee\/cabinet\/09084823\/imgrc0091915974.jpg"],
                            "u": {
                                "u": "https:\/\/item.rakuten.co.jp\/aromacoffee\/pm-pmcgrbb\/",
                                "t": "rakuten",
                                "r_v": ""
                            },
                            "v": "2.1",
                            "b_l": [{
                                "id": 1,
                                "u_tx": "楽天市場で見る",
                                "u_bc": "#f76956",
                                "u_url": "https:\/\/item.rakuten.co.jp\/aromacoffee\/pm-pmcgrbb\/",
                                "a_id": 3588805,
                                "p_id": 54,
                                "pl_id": 27059,
                                "pc_id": 54,
                                "s_n": "rakuten",
                                "u_so": 1
                            }, {
                                "id": 2,
                                "u_tx": "Yahoo!ショッピングで見る",
                                "u_bc": "#66a7ff",
                                "u_url": "https:\/\/shopping.yahoo.co.jp\/search?first=1\u0026p=%E3%83%AD%E3%82%B9%E3%83%88%E3%82%A2%E3%83%93%E3%82%B9%20%E3%80%90BOX%EF%BC%8830%E3%83%91%E3%83%83%E3%82%AF%E5%85%A5%E3%82%8A%EF%BC%89%E3%80%91",
                                "a_id": 3588816,
                                "p_id": 1225,
                                "pl_id": 27061,
                                "pc_id": 1925,
                                "s_n": "yahoo",
                                "u_so": 2
                            }],
                            "eid": "gyaZD",
                            "s": "xs"
                        });
                    </script>
                    <div id="msmaflink-gyaZD">リンク</div>
                    <!-- MoshimoAffiliateEasyLink END -->
                </div>
            </div>
            <div class="col">
                <div class="text-center mt-4">
                    <!-- START MoshimoAffiliateEasyLink -->
                    <script type="text/javascript">
                        (function(b, c, f, g, a, d, e) {
                            b.MoshimoAffiliateObject = a;
                            b[a] = b[a] || function() {
                                arguments.currentScript = c.currentScript ||
                                    c.scripts[c.scripts.length - 2];
                                (b[a].q = b[a].q || []).push(arguments)
                            };
                            c.getElementById(a) || (d = c.createElement(f), d.src = g,
                                d.id = a, e = c.getElementsByTagName("body")[0], e.appendChild(d))
                        })
                        (window, document, "script", "//dn.msmstatic.com/site/cardlink/bundle.js?20220329", "msmaflink");
                        msmaflink({
                            "n": "白熱のアルカナ 1BOX ",
                            "b": "",
                            "t": "",
                            "d": "https:\/\/thumbnail.image.rakuten.co.jp",
                            "c_p": "\/@0_mall\/akasatana-shop\/cabinet",
                            "p": ["\/compass1661841087.jpg", "\/compass1661841121.jpg"],
                            "u": {
                                "u": "https:\/\/item.rakuten.co.jp\/akasatana-shop\/4521329365480\/",
                                "t": "rakuten",
                                "r_v": ""
                            },
                            "v": "2.1",
                            "b_l": [{
                                "id": 1,
                                "u_tx": "楽天市場で見る",
                                "u_bc": "#f76956",
                                "u_url": "https:\/\/item.rakuten.co.jp\/akasatana-shop\/4521329365480\/",
                                "a_id": 3588805,
                                "p_id": 54,
                                "pl_id": 27059,
                                "pc_id": 54,
                                "s_n": "rakuten",
                                "u_so": 1
                            }, {
                                "id": 2,
                                "u_tx": "Yahoo!ショッピングで見る",
                                "u_bc": "#66a7ff",
                                "u_url": "https:\/\/shopping.yahoo.co.jp\/search?first=1\u0026p=%E7%99%BD%E7%86%B1%E3%81%AE%E3%82%A2%E3%83%AB%E3%82%AB%E3%83%8A%201BOX%20",
                                "a_id": 3588816,
                                "p_id": 1225,
                                "pl_id": 27061,
                                "pc_id": 1925,
                                "s_n": "yahoo",
                                "u_so": 2
                            }],
                            "eid": "Tg8zB",
                            "s": "xs"
                        });
                    </script>
                    <div id="msmaflink-Tg8zB">リンク</div>
                    <!-- MoshimoAffiliateEasyLink END -->
                </div>
            </div>
            <div class="col">
                <div class="text-center mt-4">
                    <!-- START MoshimoAffiliateEasyLink -->
                    <script type="text/javascript">
                        (function(b, c, f, g, a, d, e) {
                            b.MoshimoAffiliateObject = a;
                            b[a] = b[a] || function() {
                                arguments.currentScript = c.currentScript ||
                                    c.scripts[c.scripts.length - 2];
                                (b[a].q = b[a].q || []).push(arguments)
                            };
                            c.getElementById(a) || (d = c.createElement(f), d.src = g,
                                d.id = a, e = c.getElementsByTagName("body")[0], e.appendChild(d))
                        })
                        (window, document, "script", "//dn.msmstatic.com/site/cardlink/bundle.js?20220329", "msmaflink");
                        msmaflink({
                            "n": "スプラトゥーン3",
                            "b": "",
                            "t": "",
                            "d": "https:\/\/thumbnail.image.rakuten.co.jp",
                            "c_p": "\/@0_mall\/book\/cabinet\/0337",
                            "p": ["\/4902370550337.jpg", "\/4902370550337_2.jpg", "\/4902370550337_3.jpg"],
                            "u": {
                                "u": "https:\/\/item.rakuten.co.jp\/book\/17134614\/",
                                "t": "rakuten",
                                "r_v": ""
                            },
                            "v": "2.1",
                            "b_l": [{
                                "id": 1,
                                "u_tx": "楽天市場で見る",
                                "u_bc": "#f76956",
                                "u_url": "https:\/\/item.rakuten.co.jp\/book\/17134614\/",
                                "a_id": 3588805,
                                "p_id": 54,
                                "pl_id": 27059,
                                "pc_id": 54,
                                "s_n": "rakuten",
                                "u_so": 0
                            }, {
                                "id": 2,
                                "u_tx": "Yahoo!ショッピングで見る",
                                "u_bc": "#66a7ff",
                                "u_url": "https:\/\/shopping.yahoo.co.jp\/search?first=1\u0026p=%E3%82%B9%E3%83%97%E3%83%A9%E3%83%88%E3%82%A5%E3%83%BC%E3%83%B33",
                                "a_id": 3588816,
                                "p_id": 1225,
                                "pl_id": 27061,
                                "pc_id": 1925,
                                "s_n": "yahoo",
                                "u_so": 1
                            }],
                            "eid": "TMDed",
                            "s": "xs"
                        });
                    </script>
                    <div id="msmaflink-TMDed">リンク</div>
                    <!-- MoshimoAffiliateEasyLink END -->
                </div>
            </div>
            <div class="col">
                <div class="text-center mt-4">
                    <a href="https://px.a8.net/svt/ejp?a8mat=3NH3FJ+XXR16+50+2HMT4H" rel="nofollow">
                        <img border="0" width="300" height="250" alt="" src="https://www23.a8.net/svt/bgt?aid=220827295057&wid=002&eno=01&mid=s00000000018015055000&mc=1"></a>
                    <img border="0" width="1" height="1" src="https://www18.a8.net/0.gif?a8mat=3NH3FJ+XXR16+50+2HMT4H" alt="">
                </div>
            </div>
            <div class="col">
                <div class="text-center mt-4">
                    <!-- admax -->
                    <script src="https://adm.shinobi.jp/o/f31d936003736ab29994a209ce0ff737"></script>
                    <!-- admax -->
                </div>
            </div>
        </div>
    </div>
</body>