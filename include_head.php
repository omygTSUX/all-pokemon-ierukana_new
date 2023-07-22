<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $description; ?>">
    <meta name="twitter:image" content="<?php echo $twitter_image; ?>">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:image" content="<?php echo $twitter_image; ?>" />
    <?php if ($lang == "en-us") {
        echo "<meta property='og:site_name' content='Can You Name All the Pokémon? Quiz' />";
        echo "<meta property='og:locale' content='en_US'>";
    } else {
        echo "<meta property='og:site_name' content='ポケモン全部言えるかな？ゲーム' />";
        echo "<meta property='og:locale' content='ja_JP'>";
    } ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="<?php echo $css; ?>" rel="stylesheet">
    <link rel="icon" href="/img/system/favicon.ico">
    <?php
    $pos_question = mb_strpos($_SERVER['REQUEST_URI'], "?");
    $stripped_uri = $pos_question === false ? $_SERVER['REQUEST_URI'] : mb_substr($_SERVER['REQUEST_URI'], 0, $pos_question);
    ?>
    <link rel="alternate" hreflang="ja" href="https://all-pokemon-ierukana.com<?php echo $stripped_uri; ?>>">
    <link rel="alternate" hreflang="en" href="https://all-pokemon-ierukana.com<?php echo $stripped_uri; ?>?lang=en-us>">
    <!-- <?php echo $_SERVER['REQUEST_URI']; ?> -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5QG7HRH');
    </script>
    <!-- End Google Tag Manager -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>
        var gen = "<?php echo $gen; ?>";
        var number_start = <?php echo $number_start; ?>;
        var number_pokemons = <?php echo $number_pokemons; ?>;
        var lang = "<?php echo $lang; ?>";
    </script>
    <script defer src="<?php echo $script; ?>"></script>
</head>