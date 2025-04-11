<?php if ($lang == "en-us") {
    $text_h1 = "Clear Time Ranking";
    $text_select_region = "Select Region";
    $ranking_region_array = array(1 => "Kanto", 2 => "Johto", 3 => "Hoenn", 4 => "Sinnoh", 5 => "Unova", 6 => "Kalos", 7 => "Alola / Go", 8 => "Galar / Hisui", 9 => "Paldea", "all" => "All", "challenge" => "Challenge");
    $text_th_rank = "Rank";
    $text_th_name = "Name";
    $text_th_time = "Time";
    $text_guide_select_region = "↑Click “Select Region”↑";
} else {
    $text_h1 = "クリアタイムランキング";
    $text_select_region = "地方を選んでね";
    $ranking_region_array = array(1 => "カントー", 2 => "ジョウト", 3 => "ホウエン", 4 => "シンオウ", 5 => "イッシュ", 6 => "カロス", 7 => "アローラ・GO", 8 => "ガラル・ヒスイ", 9 => "パルデア", "all" => "全部", "challenge" => "むずかし版");
    $text_th_rank = "順位";
    $text_th_name = "名前";
    $text_th_time = "タイム";
    $text_guide_select_region = "↑「地方を選んでね」をクリックしてね↑";
} ?>

<body class="px-2 pb-2 px-sm-4 px-lg-5">
<?php require($_SERVER['DOCUMENT_ROOT']."/include_header.php"); ?>
    <main>
        <div class="text-center mb-4">
            <h1><?php echo $text_h1; ?></h1>
            <div class="mb-2">
                <div class="ad_ranking_top_pc">
                <a href="https://px.a8.net/svt/ejp?a8mat=3TFE2B+987X3U+348+6CHB5" rel="nofollow">
<img border="0" width="728" height="90" alt="" src="https://www29.a8.net/svt/bgt?aid=230825459558&wid=002&eno=01&mid=s00000000404001066000&mc=1"></a>
<img border="0" width="1" height="1" src="https://www12.a8.net/0.gif?a8mat=3TFE2B+987X3U+348+6CHB5" alt="">
                </div>
                <div class="ad_ranking_top_tb">
                <a href="https://px.a8.net/svt/ejp?a8mat=3TFE2B+987X3U+348+62MDD" rel="nofollow">
<img border="0" width="468" height="60" alt="" src="https://www25.a8.net/svt/bgt?aid=230825459558&wid=002&eno=01&mid=s00000000404001020000&mc=1"></a>
<img border="0" width="1" height="1" src="https://www10.a8.net/0.gif?a8mat=3TFE2B+987X3U+348+62MDD" alt="">
                </div>
                <div class="ad_ranking_top_sp">
                <a href="https://px.a8.net/svt/ejp?a8mat=3TFE2B+987X3U+348+6ARKX" rel="nofollow">
<img border="0" width="234" height="60" alt="" src="https://www20.a8.net/svt/bgt?aid=230825459558&wid=002&eno=01&mid=s00000000404001058000&mc=1"></a>
<img border="0" width="1" height="1" src="https://www11.a8.net/0.gif?a8mat=3TFE2B+987X3U+348+6ARKX" alt="">
                </div>
            </div>
            <div id="dropdown-wrapper-ranking" class="bgcolor_white_alpha mx-auto mb-2">
                <button class="btn dropdown-toggle btn-sm border rounded" type="button" id="dropdownMenuButtonRanking"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $text_select_region; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonRanking">
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["1"]; ?>" value="1"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["1"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["2"]; ?>" value="2"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["2"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["3"]; ?>" value="3"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["3"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["4"]; ?>" value="4"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["4"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["5"]; ?>" value="5"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["5"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["6"]; ?>" value="6"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["6"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["7"]; ?>" value="7"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["7"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["8"]; ?>" value="8"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["8"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["9"]; ?>" value="9"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["9"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["all"]; ?>" value="all"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["all"]; ?></button></li>
                    <li><button class="dropdown-item" name="<?php echo $ranking_region_array["challenge"]; ?>" value="challenge"
                            onClick="selectRegionRanking(this);"><?php echo $ranking_region_array["challenge"]; ?></button></li>
                </ul>
            </div>
            <?php 
            if($lang == "en-us"){

            }else{
                echo "<label><input type='checkbox' id='checkbox_old_ranking' />パルデア追加前のランキングを見る</label>";
            }
            ?>
            <div id="div_ranking_table" class="w-50 border rounded mx-auto mb-2 overflow-scroll">
                <table class="table table-hover table-light table-sm">
                    <thead class="table-info fixed">
                        <tr>
                            <th scope="col" class="th_rank"><?php echo $text_th_rank; ?></th>
                            <th scope="col" class="th_name"><?php echo $text_th_name; ?></th>
                            <th scope="col" class="th_time"><?php echo $text_th_time; ?></th>
                        </tr>
                    </thead>
                    <tbody id="tbody_ranking">
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $text_guide_select_region; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ad_ranking_top">
                <!-- admax -->
                <script src="https://adm.shinobi.jp/o/9601f0462b232d84ab47f373e61557f0"></script>
                <!-- admax -->
            </div>
        </div>
    </main>
    <?php require($_SERVER['DOCUMENT_ROOT']."/include_footer.php"); ?>
    <?php require($_SERVER['DOCUMENT_ROOT']."/include_ad.php"); ?>
</body>
