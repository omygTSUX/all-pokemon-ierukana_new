<?php
if ($lang == "en-us") {
    $region_array = array(1 => "Kanto", 2 => "Johto", 3 => "Hoenn", 4 => "Sinnoh", 5 => "Unova", 6 => "Kalos", 7 => "Alola / Go", 8 => "Galar / Hisui", 9 => "Paldea", "all" => "All", "challenge" => "Challenge");
    $text_other_regions = "Other Regions";

} else {
    $region_array = array(1 => "カントー", 2 => "ジョウト", 3 => "ホウエン", 4 => "シンオウ", 5 => "イッシュ", 6 => "カロス", 7 => "アローラ・GO", 8 => "ガラル・ヒスイ", 9 => "パルデア", "all" => "全部", "challenge" => "むずかし版");
    $text_other_regions = "他の地方";
}
?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QG7HRH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="none_onfocus">
    <div class="d-flex justify-content-end">
        <div class="dropdown">
            <div class="dropdown-wrapper bgcolor_white_alpha border rounded">
                <button class="btn dropdown-toggle btn-sm xx-small-sp" type="button" id="dropdownLanguageButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Language
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownLanguageButton">
                    <li><a class="dropdown-item navi" href="<?php echo $_SERVER['SCRIPT_NAME'] ?>">日本語</a></li>
                    <li><a class="dropdown-item navi" href="<?php echo $_SERVER['SCRIPT_NAME'] . "?lang=en-us" ?>">English</a></li>
                </ul>
            </div>
        </div>

        <!-- <div class="container mb-1 border rounded pc_only bgcolor_white_alpha">
                <div class="row rounded">
                    <div class="col text-center p-0">
                        <a class="navi" href="gen01"><?php echo $region_array["1"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="gen02"><?php echo $region_array["2"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="gen03"><?php echo $region_array["3"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="gen04"><?php echo $region_array["4"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="gen05"><?php echo $region_array["5"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="gen06"><?php echo $region_array["6"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="gen07"><?php echo $region_array["7"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="gen08"><?php echo $region_array["8"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="gen09"><?php echo $region_array["9"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi" href="/"><?php echo $region_array["all"]; ?></a>
                    </div>
                    <div class="col text-center p-0">
                        <a class="navi note" href="challengemode"><?php echo $region_array["challenge"]; ?></a>
                    </div>
                </div>
            </div> -->
        <div class="dropdown">
            <div class="dropdown-wrapper bgcolor_white_alpha ms-1 border rounded" lang="<?php echo $lang ?>">
                <button class="btn dropdown-toggle btn-sm xx-small-sp" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $text_other_regions ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item navi" href="gen01?lang=<?php echo $lang; ?>"><?php echo $region_array["1"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="gen02?lang=<?php echo $lang; ?>"><?php echo $region_array["2"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="gen03?lang=<?php echo $lang; ?>"><?php echo $region_array["3"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="gen04?lang=<?php echo $lang; ?>"><?php echo $region_array["4"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="gen05?lang=<?php echo $lang; ?>"><?php echo $region_array["5"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="gen06?lang=<?php echo $lang; ?>"><?php echo $region_array["6"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="gen07?lang=<?php echo $lang; ?>"><?php echo $region_array["7"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="gen08?lang=<?php echo $lang; ?>"><?php echo $region_array["8"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="gen09?lang=<?php echo $lang; ?>"><?php echo $region_array["9"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="/?lang=<?php echo $lang; ?>"><?php echo $region_array["all"]; ?></a></li>
                    <li><a class="dropdown-item navi" href="challengemode?lang=<?php echo $lang; ?>"><?php echo $region_array["challenge"]; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>