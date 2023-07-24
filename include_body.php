<?php if ($lang == "en-us") {
    $text_before_surrender = "Would you like to give up on this battle and quit now?";
    $text_yes = "Yes";
    $text_no = "No";
    $text_result_surrender = "You could guess <span id='num_answers'>[Communicating...]</span> / $number_pokemons Pokémon in <span id='surrender_time'>[Communicating...]</span>!";
    $text_average_surrender = "The average score for the <span id='num_surrender_players'>[Communicating...]</span> gave up people is <span id='average_num_answers'>[Communicating...]</span> / $number_pokemons Pokémon.";
    $text_sns_share = "Share your result to SNS";
    $text_twitter_share = "Share your result to X (Twitter)";
    $text_facebook_share = "Copy & Share your result to Facebook";
    $text_line_share = "Copy & Share your result to LINE";
    $text_instagram_share = "Copy & Share your result to Instagram";
    $text_close = "Close";
    $text_result_clear = "Your clear time: ";
    $text_average_clear = "The average time for the <span id='num_clear_players'>[Communicating...]</span> cleared people is <span id='average_time'>[Communicating...]</span>.";
    $text_ad = "Ad";
    $text_progress = "Now <span id='span_number_answered' class='h4'>???</span> &nbsp;&nbsp;&nbsp; Rest<span id='span_remaining_number' class='h4'>???</span>";
    $text_placeholder = "Press Start";
    $text_answer = "Enter";
    $text_start = "Start";
    $text_menu = "Expand";
    $text_sns_share_short = "Share";
} else {
    $text_before_surrender = "勝負を　あきらめて<br>降参しますか？";
    $text_yes = "はい";
    $text_no = "いいえ";
    $text_result_surrender = "キミは<span id='surrender_time'></span>で<br>ポケモン <span id='num_answers'></span> / $number_pokemons 匹言えたよ！";
    $text_average_surrender = "降参した<span id='num_surrender_players'>[通信待機中…]</span>人の平均解答数：<span id='average_num_answers'>[通信待機中…]</span> / $number_pokemons 匹";
    $text_sns_share = "結果をSNSにシェア";
    $text_twitter_share = "結果をX(Twitter)にシェア";
    $text_facebook_share = "結果をコピーしてFacebookにシェア";
    $text_line_share = "結果をコピーしてLINEにシェア";
    $text_instagram_share = "結果をコピーしてInstagramにシェア";
    $text_close = "閉じる";
    $text_result_clear = "キミのクリアタイム：";
    $text_average_clear = "クリアした<span id='num_clear_players'>[通信待機中…]</span>人の平均タイム：<span id='average_time'>[通信待機中…]</span>";
    $text_ad = "広告";
    $text_progress = "現在<span id='span_number_answered' class='h4'>???</span>匹 残り<span id='span_remaining_number' class='h4'>???</span>匹";
    $text_placeholder = "開始してね";
    $text_answer = "回答";
    $text_start = "開始";
    $text_menu = "全画面化";
    $text_sns_share_short = "SNS共有";
} ?>

<body class="px-2 pb-2 px-sm-4 px-lg-5 gen-<?php echo $gen; ?>">
    <?php require("include_header.php"); ?>
    <main>
        <div id="others">
            <div class="modal fade" id="confirm_modal" tabindex="-1" aria-labelledby="confirm_modal_label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $text_before_surrender; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="button_confirm" class="btn btn-primary btn-sm" data-bs-target="#surrender_modal" data-bs-toggle="modal" data-bs-dismiss="modal"><?php echo $text_yes; ?></button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><?php echo $text_no; ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="surrender_modal" tabindex="-1" aria-labelledby="surrender_modal_label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-target="#ad_modal" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <?php echo $text_result_surrender; ?>
                            </p>
                            <p class="small">
                                <?php echo $text_average_surrender; ?>
                            </p>
                            <p id="message_best_num_answers"></p>
                        </div>
                        <div class="modal-footer dropup">
                            <button class="dropdown_sns btn dropdown-toggle btn-sm text-white" type="button" id="dropdownMenuSnsShareSurrenderModal" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $text_sns_share; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSnsShareSurrenderModal">
                                <li class="mb-1"><a rel="nofollow" role="button" class="button_tweet btn btn-sm text-white" onclick="openTweetWindow();"><img src="/img/system/logo_X.png" class="sns_logo"> <?php echo $text_twitter_share; ?></a></li>
                                <li class="mb-1"><a rel="nofollow" role="button" class="button_facebook btn btn-sm text-white" onclick="copyResultText('openFacebook()');"><img src="/img/system/logo_facebook.png" class="sns_logo"> <?php echo $text_facebook_share; ?></a></li>
                                <li class="mb-1"><a rel="nofollow" role="button" class="button_line btn btn-sm text-white" onclick="copyResultText('openLine()');"><img src="/img/system/logo_line.png" class="sns_logo"> <?php echo $text_line_share; ?></a></li>
                                <li class="mb-1"><a rel="nofollow" role="button" class="button_instagram btn btn-sm text-white" onclick="copyResultText('openInstagram()');"><img src="/img/system/logo_instagram.png" class="sns_logo"> <?php echo $text_instagram_share; ?></a></li>
                            </ul>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><?php echo $text_close; ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="clear_modal" tabindex="-1" aria-labelledby="clear_modal_label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-target="#ad_modal" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $clear_message; ?>
                            <p class="small"><?php echo $text_result_clear; ?><span id="clear_time"></span><br>
                                <?php echo $text_average_clear; ?>
                            </p>
                            <p id="message_ranking"></p>
                        </div>
                        <div class="modal-footer dropup">
                            <button class="dropdown_sns btn dropdown-toggle btn-sm text-white" type="button" id="dropdownMenuSnsShareClearModal" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $text_sns_share; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSnsShareClearModal">
                                <li class="mb-1"><a rel="nofollow" role="button" class="button_tweet btn btn-sm text-white" onclick="openTweetWindow();"><img src="/img/system/logo_X.png" class="sns_logo"> <?php echo $text_twitter_share; ?></a></li>
                                <li class="mb-1"><a rel="nofollow" role="button" class="button_facebook btn btn-sm text-white" onclick="copyResultText('openFacebook()');"><img src="/img/system/logo_facebook.png" class="sns_logo"> <?php echo $text_facebook_share; ?></a></li>
                                <li class="mb-1"><a rel="nofollow" role="button" class="button_line btn btn-sm text-white" onclick="copyResultText('openLine()');"><img src="/img/system/logo_line.png" class="sns_logo"> <?php echo $text_line_share; ?></a></li>
                                <li class="mb-1"><a rel="nofollow" role="button" class="button_instagram btn btn-sm text-white" onclick="copyResultText('openInstagram()');"><img src="/img/system/logo_instagram.png" class="sns_logo"> <?php echo $text_instagram_share; ?></a></li>
                            </ul>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><?php echo $text_close; ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <h1 id="h1" class="mb-0 text-center h2 none_onfocus" lang="<?php echo $lang ?>">
                <?php echo $h1; ?>
            </h1>
            <p class="text-center small mb-0 none_onfocus"><?php echo $note; ?></p>
            <div class="container mb-2 rounded">
                <div class="row rounded justify-content-center">
                    <div class="col-6 col-lg-3 border rounded text-center bgcolor_white_alpha fit-content">
                        <p id="timer" class="h4 mb-0">000:00:00</p>
                    </div>
                    <div class="col-6 col-lg-3 border rounded text-center bgcolor_white_alpha fit-content">
                        <p id="progress" class="xx-small mb-0"><?php echo $text_progress; ?></p>
                    </div>
                    <div class="col-auto">
                        <form name="form_answer" id="form_answer" autocomplete="off">
                            <div class="row">
                                <div class="col-auto px-1">
                                    <input type="text" id="input_answer" placeholder="<?php echo $text_placeholder; ?>" class="form-control-sm xx-small-sp" disabled lang="<?php echo $lang ?>">
                                </div>
                                <div class="col-auto ps-0 pe-1">
                                    <input type="submit" id="button_answer" value="<?php echo $text_answer; ?>" class="btn btn-primary btn-sm xx-small-sp" disabled lang="<?php echo $lang ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto ps-0 pe-1">
                        <button id="button_start" class="btn btn-success btn-sm stopped initial xx-small-sp" lang="<?php echo $lang ?>"><?php echo $text_start; ?></button>
                    </div>
                    <div class="col-auto ps-0 pe-1">
                        <button id="button_menu" class="btn btn-secondary btn-sm xx-small-sp" lang="<?php echo $lang ?>"><?php echo $text_menu; ?></button>
                    </div>
                    <div class="col-auto px-0">
                        <button class="dropdown_sns btn dropdown-toggle btn-sm text-white xx-small-sp" type="button" id="dropdownMenuSnsShare" data-bs-toggle="dropdown" aria-expanded="false" lang="<?php echo $lang ?>">
                            <?php echo $text_sns_share_short; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuSnsShare">
                            <li class="mb-1"><a rel="nofollow" role="button" class="button_tweet btn btn-sm text-white" onclick="openTweetWindow();"><img src="/img/system/logo_X.png" class="sns_logo"> <?php echo $text_twitter_share; ?></a></li>
                            <li class="mb-1"><a rel="nofollow" role="button" class="button_facebook btn btn-sm text-white" onclick="copyResultText('openFacebook()');"><img src="/img/system/logo_facebook.png" class="sns_logo"> <?php echo $text_facebook_share; ?></a></li>
                            <li class="mb-1"><a rel="nofollow" role="button" class="button_line btn btn-sm text-white" onclick="copyResultText('openLine()');"><img src="/img/system/logo_line.png" class="sns_logo"> <?php echo $text_line_share; ?></a></li>
                            <li class="mb-1"><a rel="nofollow" role="button" class="button_instagram btn btn-sm text-white" onclick="copyResultText('openInstagram()');"><img src="/img/system/logo_instagram.png" class="sns_logo"> <?php echo $text_instagram_share; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul id="pokemon_list" class="list-unstyled d-flex flex-wrap border border-secondary rounded p-0 bgcolor_white all_pokemon">
        </ul>
    </main>
    <?php require("include_footer.php"); ?>
</body>