<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="SRG, enfants, Strainchamps, Vieux Moulin, Fédération Wallonie-Bruxelles, Aide à la jeunesse">
    <meta name="author" content="Lisa-Marie Kreins">
    <meta name="description" content="Une page pour le SRG 'Le Vieux Moulin'">
   <!-- <link rel="stylesheet" href="./resources/css/styles.scss">-->
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
</head>
<body>
<header class="header">
    <h1 class="sro"><?= get_bloginfo('name') ?></h1>
    <nav class="nav__header">
        <h2 class="sro">Navigation pricinpale</h2>

        <ul class="nav__container__header__top">
            <?php foreach(dw_get_navigation_links('header_top') as $link): ?>
                <li class="nav__item__header_top nav__item--<?= $link->icon; ?>">
                    <a href="<?= $link->href; ?>" class="nav__link__header_top"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul class="nav__container__header__bottom">
            <?php foreach(dw_get_navigation_links('header_bottom') as $link): ?>
                <li class="nav__item__header__bottom nav__item--<?= $link->icon; ?>">
                    <a href="<?= $link->href; ?>" class="nav__link__header__bottom"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

    </nav>
</header>
<main>
