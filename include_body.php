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
                        <div class="modal-footer">
                            <button type="button" id="button_tweet_surrender_modal" class="btn btn-info btn-sm">結果Tweet</button>
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
                        <div class="modal-footer">
                            <button type="button" id="button_tweet_clear_modal" class="btn btn-info btn-sm">結果Tweet</button>
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
                <a href="./ranking.html">クリアタイムランキング</a>
                <a href="./privacypolicy.html">プライバシーポリシー・配信ガイドライン</a>
            </div>
        </div>
    </footer>
    <div class="container mt-4 border border-secondary rounded">
        <div class="row">
            <div class="col" id="ad_moshimo_vstaruniverse">
                <div class="text-center mt-4">
<!-- START MoshimoAffiliateEasyLink -->
<script type="text/javascript">
(function(b,c,f,g,a,d,e){b.MoshimoAffiliateObject=a;
b[a]=b[a]||function(){arguments.currentScript=c.currentScript
||c.scripts[c.scripts.length-2];(b[a].q=b[a].q||[]).push(arguments)};
c.getElementById(a)||(d=c.createElement(f),d.src=g,
d.id=a,e=c.getElementsByTagName("body")[0],e.appendChild(d))})
(window,document,"script","//dn.msmstatic.com/site/cardlink/bundle.js?20220329","msmaflink");
msmaflink({"n":"【予約】「VSTARユニバース」BOX ","b":"","t":"","d":"https:\/\/thumbnail.image.rakuten.co.jp","c_p":"\/@0_mall\/mokemoke\/cabinet","p":["\/imgrc0100500780.jpg","\/imgrc0100500781.jpg"],"u":{"u":"https:\/\/item.rakuten.co.jp\/mokemoke\/10000997\/","t":"rakuten","r_v":""},"v":"2.1","b_l":[{"id":1,"u_tx":"楽天市場で見る","u_bc":"#f76956","u_url":"https:\/\/item.rakuten.co.jp\/mokemoke\/10000997\/","a_id":3588805,"p_id":54,"pl_id":27059,"pc_id":54,"s_n":"rakuten","u_so":1},{"id":2,"u_tx":"Yahoo!ショッピングで見る","u_bc":"#66a7ff","u_url":"https:\/\/shopping.yahoo.co.jp\/search?first=1\u0026p=%E3%80%90%E4%BA%88%E7%B4%84%E3%80%91%E3%80%8CVSTAR%E3%83%A6%E3%83%8B%E3%83%90%E3%83%BC%E3%82%B9%E3%80%8DBOX%20","a_id":3588816,"p_id":1225,"pl_id":27061,"pc_id":1925,"s_n":"yahoo","u_so":2}],"eid":"Z6k0O","s":"s"});
</script>
<div id="msmaflink-Z6k0O">リンク</div>
<!-- MoshimoAffiliateEasyLink END -->
                </div>
            </div>
            <div class="col" id="ad_moshimo_paradigmtrigger">
                <div class="text-center mt-4">
<!-- START MoshimoAffiliateEasyLink -->
<script type="text/javascript">
(function(b,c,f,g,a,d,e){b.MoshimoAffiliateObject=a;
b[a]=b[a]||function(){arguments.currentScript=c.currentScript
||c.scripts[c.scripts.length-2];(b[a].q=b[a].q||[]).push(arguments)};
c.getElementById(a)||(d=c.createElement(f),d.src=g,
d.id=a,e=c.getElementsByTagName("body")[0],e.appendChild(d))})
(window,document,"script","//dn.msmstatic.com/site/cardlink/bundle.js?20220329","msmaflink");
msmaflink({"n":"ポケモンカードゲーム パラダイムトリガー BOX","b":"","t":"","d":"https:\/\/thumbnail.image.rakuten.co.jp","c_p":"","p":["\/@0_mall\/fullahead\/cabinet\/07535276\/07986105\/pk-rakuten-box029.jpg"],"u":{"u":"https:\/\/item.rakuten.co.jp\/fullahead\/pk-rakuten-box029\/","t":"rakuten","r_v":""},"v":"2.1","b_l":[{"id":1,"u_tx":"楽天市場で見る","u_bc":"#f76956","u_url":"https:\/\/item.rakuten.co.jp\/fullahead\/pk-rakuten-box029\/","a_id":3588805,"p_id":54,"pl_id":27059,"pc_id":54,"s_n":"rakuten","u_so":1},{"id":2,"u_tx":"Yahoo!ショッピングで見る","u_bc":"#66a7ff","u_url":"https:\/\/shopping.yahoo.co.jp\/search?first=1\u0026p=%E3%83%9D%E3%82%B1%E3%83%A2%E3%83%B3%E3%82%AB%E3%83%BC%E3%83%89%E3%82%B2%E3%83%BC%E3%83%A0%20%E3%83%91%E3%83%A9%E3%83%80%E3%82%A4%E3%83%A0%E3%83%88%E3%83%AA%E3%82%AC%E3%83%BC%20BOX","a_id":3588816,"p_id":1225,"pl_id":27061,"pc_id":1925,"s_n":"yahoo","u_so":2}],"eid":"IkmkG","s":"s"});
</script>
<div id="msmaflink-IkmkG">リンク</div>
<!-- MoshimoAffiliateEasyLink END -->
                </div>
            </div>
            <div class="col" id="ad_moshimo_scarlet">
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
                            "n": "ポケットモンスター スカーレット",
                            "b": "",
                            "t": "",
                            "d": "https:\/\/thumbnail.image.rakuten.co.jp",
                            "c_p": "\/@0_mall\/book\/cabinet\/0542",
                            "p": ["\/4902370550542.jpg", "\/4902370550542_2.jpg", "\/4902370550542_3.jpg"],
                            "u": {
                                "u": "https:\/\/item.rakuten.co.jp\/book\/17247719\/",
                                "t": "rakuten",
                                "r_v": ""
                            },
                            "v": "2.1",
                            "b_l": [{
                                "id": 1,
                                "u_tx": "楽天市場で見る",
                                "u_bc": "#f76956",
                                "u_url": "https:\/\/item.rakuten.co.jp\/book\/17247719\/",
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
                                "u_url": "https:\/\/shopping.yahoo.co.jp\/search?first=1\u0026p=%E3%83%9D%E3%82%B1%E3%83%83%E3%83%88%E3%83%A2%E3%83%B3%E3%82%B9%E3%82%BF%E3%83%BC%20%E3%82%B9%E3%82%AB%E3%83%BC%E3%83%AC%E3%83%83%E3%83%88",
                                "a_id": 3588816,
                                "p_id": 1225,
                                "pl_id": 27061,
                                "pc_id": 1925,
                                "s_n": "yahoo",
                                "u_so": 2
                            }],
                            "eid": "yhluU",
                            "s": "xs"
                        });
                    </script>
                    <div id="msmaflink-yhluU">リンク</div>
                    <!-- MoshimoAffiliateEasyLink END -->
                </div>
            </div>
            <div class="col" id="ad_moshimo_violet">
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
                            "n": "ポケットモンスター バイオレット",
                            "b": "",
                            "t": "",
                            "d": "https:\/\/thumbnail.image.rakuten.co.jp",
                            "c_p": "\/@0_mall\/book\/cabinet\/0559",
                            "p": ["\/4902370550559.jpg", "\/4902370550559_2.jpg", "\/4902370550559_3.jpg"],
                            "u": {
                                "u": "https:\/\/item.rakuten.co.jp\/book\/17247720\/",
                                "t": "rakuten",
                                "r_v": ""
                            },
                            "v": "2.1",
                            "b_l": [{
                                "id": 1,
                                "u_tx": "楽天市場で見る",
                                "u_bc": "#f76956",
                                "u_url": "https:\/\/item.rakuten.co.jp\/book\/17247720\/",
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
                                "u_url": "https:\/\/shopping.yahoo.co.jp\/search?first=1\u0026p=%E3%83%9D%E3%82%B1%E3%83%83%E3%83%88%E3%83%A2%E3%83%B3%E3%82%B9%E3%82%BF%E3%83%BC%20%E3%83%90%E3%82%A4%E3%82%AA%E3%83%AC%E3%83%83%E3%83%88",
                                "a_id": 3588816,
                                "p_id": 1225,
                                "pl_id": 27061,
                                "pc_id": 1925,
                                "s_n": "yahoo",
                                "u_so": 2
                            }],
                            "eid": "ldHQG",
                            "s": "xs"
                        });
                    </script>
                    <div id="msmaflink-ldHQG">リンク</div>
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