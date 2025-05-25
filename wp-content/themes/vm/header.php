<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
          content="SRG, enfants, Strainchamps, Vieux Moulin, Fédération Wallonie-Bruxelles, Aide à la jeunesse">
    <meta name="author" content="Lisa-Marie Kreins">
    <meta name="description" content="Une page pour le SRG 'Le Vieux Moulin'">

    <!--Flavicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/vm/flavicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/wp-content/themes/vm/flavicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/vm/flavicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/wp-content/themes/vm/flavicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/vm/flavicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/wp-content/themes/vm/flavicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/vm/flavicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/vm/flavicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/vm/flavicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/wp-content/themes/vm/flavicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/vm/flavicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/wp-content/themes/vm/flavicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/vm/flavicon/favicon-16x16.png">
    <link rel="manifest" href="/wp-content/themes/vm/flavicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- <link rel="stylesheet" href="./resources/css/styles.scss">-->
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
</head>
<body>
<header class="header">
    <h1 class="sro"><?= get_bloginfo('name') ?> <?= get_the_title() ?></h1>
    <nav class="nav__header">
        <h2 class="sro">Navigation pricinpale</h2>
        <a href="http://vieux-moulin-site.test/" title="Aller vers la page d'accueil" class="logo_link">
            <img src="/wp-content/themes/vm/resources/img/Logo.webp" alt="Logo Vieux Moulin" width="30" height="24" class="logo_image">
            <span class="le_vieux_moulin_logo_title">Le Vieux Moulin</span>
        </a>
        <a href="#content" class="sro skip" title="Aller au contenu principal">Aller au contenu principal</a>

        <input type="checkbox" id="burger_menu" name="burger_menu">
        <label for="burger_menu" class="burger_menu">
            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
                <path d="M2 11H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
                <path d="M2 20H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
            </svg>
        </label>


        <ul class="nav__container__header__bottom">
            <?php foreach (dw_get_navigation_links('header_bottom') as $link): ?>
                <li class="nav__item__header__bottom">
                    <a href="<?= $link->href; ?>" class="nav__link__header__bottom"><?= $link->label;?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul class="nav__container__header__top">
            <li class="nav__item__header_top">
                <a href="http://vieux-moulin-site.test/nos-actualites/" class="nav__link__header_top" title="Aller vers la page 'Actualités'">
                    Actualités
                </a>
            </li>
            <?php foreach (dw_get_navigation_links('header_top') as $link): ?>
                <li class="nav__item__header_top">
                    <a href="<?= $link->href; ?>" class="nav__link__header_top"><?= $link->label;?></a>
                </li>
            <?php endforeach; ?>



            <li class="facebook_container">
                <a href="https://www.facebook.com/people/Vieux-Moulin-Strainchamps/pfbid02bLExiMxPRDfak3ahy8h4cWBsRDihrcjNnGQBLHZqehkmfYg2jRzii8zYCWe1n95hl/" title="Aller vers la page Facebook du Vieux Moulin" class="facebook_link">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="30px" height="30px"><path fill="#3F51B5" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"/><path fill="#FFF" d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z"/></svg>
                </a>
            </li>
        </ul>
    </nav>
</header>















<main id="content">



    <!--<header class="header">
    <h1 class="sro"><?php /*/*= get_bloginfo('name') */?></h1>
    <a href="http://vieux-moulin-site.test/" title="Aller vers la page d'accueil">
        <img src="/wp-content/themes/vm/resources/img/Logo.webp" alt="Logo Vieux Moulin" width="30" height="24"
             class="logo_image">
    </a>
    <nav class="nav__header">
        <h2 class="sro">Navigation pricinpale</h2>
        <a href="#content" class="sro">Aller au contenu principal</a>
        <input type="checkbox" id="burger_menu" name="burger_menu">
        <label for="burger_menu" class="burger_menu">
            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
                <path d="M2 11H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
                <path d="M2 20H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
            </svg>
        </label>
        <ul class="nav__container__header__top">
            <?php /*foreach (dw_get_navigation_links('header_top') as $link): */?>
                <li class="nav__item__header_top">
                    <a href="<?php /*= $link->href; */?>" class="nav__link__header_top"><?php /*= $link->label;*/?></a>
                </li>
            <?php /*endforeach; */?>
        </ul>

        <ul class="nav__container__header__bottom">
            <?php /*foreach (dw_get_navigation_links('header_bottom') as $link): */?>
                <li class="nav__item__header__bottom">
                    <a href="<?php /*= $link->href; */?>" class="nav__link__header__bottom"><?php /*= $link->label; */?></a>
                </li>
            <?php /*endforeach; */?>
            <li class="facebook_container">
                <a href="https://www.facebook.com/people/Vieux-Moulin-Strainchamps/pfbid02bLExiMxPRDfak3ahy8h4cWBsRDihrcjNnGQBLHZqehkmfYg2jRzii8zYCWe1n95hl/" title="Aller vers la page Facebook du Vieux Moulin" class="facebook_link">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path fill="#3F51B5" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"/><path fill="#FFF" d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z"/></svg>
                </a>
            </li>
        </ul>

    </nav>
</header>-->


  <!--  <header class="header">
        <h1 class="sro"><?php /*= get_bloginfo('name') */?> <?php /*= get_the_title() */?></h1>
        <a href="http://vieux-moulin-site.test/" title="Aller vers la page d'accueil">
            <img src="/wp-content/themes/vm/resources/img/Logo.webp" alt="Logo Vieux Moulin" width="30" height="24" class="logo_image">
        </a>
        <nav class="nav__header">
            <h2 class="sro">Navigation pricinpale</h2>
            <a href="#content" class="sro">Aller au contenu principal</a>
            <input type="checkbox" id="burger_menu" name="burger_menu">
            <label for="burger_menu" class="burger_menu">
                <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
                    <path d="M2 11H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
                    <path d="M2 20H22" stroke="#000" stroke-width="2" stroke-linecap="square"/>
                </svg>
            </label>
            <ul class="nav__container__header__top">
                <?php /*foreach (dw_get_navigation_links('header_top') as $link): */?>
                    <li class="nav__item__header_top">
                        <a href="<?php /*= $link->href; */?>" class="nav__link__header_top"><?php /*= $link->label;*/?></a>
                    </li>
                <?php /*endforeach; */?>
            </ul>

            <ul class="nav__container__header__bottom">
                <?php /*foreach (dw_get_navigation_links('header_bottom') as $link): */?>
                    <li class="nav__item__header__bottom">
                        <a href="<?php /*= $link->href; */?>" class="nav__link__header__bottom"><?php /*= $link->label;*/?></a>
                    </li>
                <?php /*endforeach; */?>
                <li class="facebook_container">
                    <a href="https://www.facebook.com/people/Vieux-Moulin-Strainchamps/pfbid02bLExiMxPRDfak3ahy8h4cWBsRDihrcjNnGQBLHZqehkmfYg2jRzii8zYCWe1n95hl/" title="Aller vers la page Facebook du Vieux Moulin" class="facebook_link">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path fill="#3F51B5" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"/><path fill="#FFF" d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z"/></svg>
                    </a>
                </li>
            </ul>

        </nav>
    </header>-->

