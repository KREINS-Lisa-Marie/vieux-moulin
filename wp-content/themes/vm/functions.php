<?php

// Charger les champs ACF exportés :
include_once('fields.php');

// Vérifier si la session est active ("started") ?
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gutenberg est le nouvel éditeur de contenu propre à Wordpress
// il ne nous intéresse pas pour l'utilisation du thème que nous
// allons créer. On va donc le désactiver :
// on met ce code pour changer la fenêtre par défaut pour changer les pages etc.

// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );
// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
// Disable default front-end styles.
add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );
    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );
    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

// Activer l'utilisation des vignettes (image de couverture) sur nos post types:
// activer le fait d'ajouter une image dans les posts des projets
add_theme_support('post-thumbnails', ['news']);

// Enregistrer de nouveaux "types de contenu", qui seront stockés dans la table
// "wp_posts", avec un identifiant de type spécifique dans la colonne "post_type":
// crée la catégorie "Projets" dans laquelle on peut faire des posts

register_post_type('news', [
    'label' => 'Actualités',
    'description' => 'Nos dernières actualités',
    'menu_position' => 6,
    'menu_icon' => 'dashicons-format-status',
    'public' => true,
    'has_archive' => false,
    'rewrite' => [
        'slug' => 'actualites',// nom du slug de la page
    ],
    'supports' => ['title','excerpt','editor','thumbnail'],
]);

// Ajouter des "catégories" (taxonomies) sur ces post_types :

/*register_taxonomy('course', ['recipe'], [
    'labels' => [
        'name' => 'Services',
        'singular_name' => 'Service'
    ],
    'description' => 'À quel moment du repas ce plat intervient-il ?',
    'public' => true,
    'hierarchical' => true,
    'show_tagcloud' => false,
]);

register_taxonomy('diet', ['recipe'], [
    'labels' => [
        'name' => 'Régimes alimentaires',
        'singular_name' => 'Régime'
    ],
    'description' => 'À quel type de régime appartient cette recette ?',
    'public' => true,
    'hierarchical' => true,
    'show_tagcloud' => false,
]);*/

// Paramétrer des tailles d'images pour le générateur de thumbnails de Wordpress :

// Sans recadrage :
add_image_size('travel-side', 420, 420);
// Avec recadrage :
add_image_size('travel-header', 1920, 400, true);




// Enregistrer les menus de navigation en fonction de l'endroit où ils sont exploités :

register_nav_menu('header_top', 'Premier menu de navigation en haut de la page.');
register_nav_menu('header_bottom', 'Deuxième menu de navigation en haut de la page.');



// Créer une nouvelle fonction qui permet de retourner un menu de navigation formaté en un
// tableau d'objets afin de pouvoir l'afficher à notre guise dans le template.

function dw_get_navigation_links(string $location): array
{
    // Récupérer l'objet WP pour le menu à la location $location
    $locations = get_nav_menu_locations();

    if(! isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[$location];
    $nav = wp_get_nav_menu_items($nav_id);

    // Transformer le menu en un tableau de liens, chaque lien étant un objet personnalisé

    $links = [];

    foreach ($nav as $post) {
        $link = new stdClass();
        $link->href = $post->url;
        $link->label = $post->title;
        $link->icon = get_field('icon', $post);

        $links[] = $link;
    }

    // Retourner ce tableau d'objets (liens).

    return $links;
}





// Ajouter un post-type custom pour sauvegarder les messages de contact

register_post_type('contact_message', [
    'label' => 'Messages de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'supports' => ['title','editor'],
]);

// Ajouter la fonctionnalité "POST" pour un formulaire de contact personnalisé :
add_action('admin_post_vm_submit_contact_form', 'vm_handle_contact_form');
add_action('admin_post_nopriv_vm_submit_contact_form', 'vm_handle_contact_form');

// Chargement de notre classe qui va gérer ce formulaire
require_once(__DIR__.'/forms/ContactForm.php');

function dw_handle_contact_form()
{
    $form = (new \DW_Theme\Forms\ContactForm())
        ->rule('firstname', 'required')
        ->rule('lastname', 'required')
        ->rule('email', 'required')
        ->rule('email', 'email')
        ->rule('message', 'required')
        ->rule('message', 'no_test')
        ->sanitize('firstname', 'sanitize_text_field')
        ->sanitize('lastname', 'sanitize_text_field')
        ->sanitize('email', 'sanitize_text_field')
        ->sanitize('message', 'sanitize_textarea_field');

    return $form->handle($_POST);
}




// ???

function dw_asset(string $file)
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/vm/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/vm/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/vm/resources/css/styles.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/vm/resources/css/styles.scss']['file']);
        }
    }
}





















//IMAGES


/**
 * Génère une image responsive au format <picture> avec les attributs srcset et sizes.
 *
 * Cette fonction accepte différents formats d'entrée pour l'image (ID, tableau associatif ou URL),
 * et retourne un bloc HTML contenant une balise <picture> incluant une balise <img>.
 * Elle utilise les fonctions natives de WordPress pour récupérer les différentes tailles d'image
 * et ainsi permettre au navigateur de choisir la version la plus adaptée à l'affichage.
 *
 * @param mixed $image    ID de l'image, tableau contenant la clé 'ID' ou URL de l'image.
 * @param array $settings Tableau d'options complémentaires :
 *                        - 'lazy'    => attribut loading (default: "eager").
 *                        - 'classes' => classes CSS à ajouter à la balise <img>.
 *
 * @return bool|string Retourne le code HTML de l'image responsive, ou une chaîne vide si l'image est invalide.
 */
function responsive_image($image, $settings): bool|string
{
    if (empty($image)) {
        return '';
    }
    $image_id = '';
    if (is_numeric($image)) {
        // si c'est un nombre, on considère que cela s'agit d'un ID
        $image_id = $image;
    } elseif (is_array($image) && isset($image['ID'])) {
        // Si c'est un tableau associatif contenant la clé ID, on récupère cet ID
        $image_id = $image['ID'];
    } else {
        // Générer un tag img par défaut
    }

// Récupération des informations de l'image depuis la base de données.
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Attribut alt
    $image_post = get_post($image_id); // Object WP_Post de l'image
    $title = $image_post->post_title ?? '';
    $name = $image_post->post_name ?? '';

// Récupération des URLS et attributs pour l'image en taille "full"
// Wordpress génère automatiquement un srcset basé sur les tailles existantes
    $src = wp_get_attachment_image_url($image_id, 'full');
    $srcset = wp_get_attachment_image_srcset($image_id, 'full');
    $sizes = wp_get_attachment_image_sizes($image_id, 'full');

// Gestion de l'attribut de chargement "lazy" ou "eager" selon les paramètres.
    $lazy = $settings['lazy'] ?? 'eager';

// Gestion des classes (si des classes sont fournies dans $settings).
    $classes = '';
    if (!empty($settings['classes'])) {
        $classes = is_array($settings['classes']) ? implode(' ', $settings['classes']) : $settings['classes'];
    }
    ob_start();
    ?>
    <picture>
        <!-- Ici, vous pouvez ajouter manuellement des balises <source> pour d'autres formats (WebP, AVIF, etc.)
             si ces formats sont disponibles via un plugin ou un traitement personnalisé. -->
        <img
            src="<?= esc_url($src) ?>"
            alt="<?= esc_attr($alt) ?>"
            loading="<?= esc_attr($lazy) ?>"
            srcset="<?= esc_attr($srcset) ?>"
            sizes="<?= esc_attr($sizes) ?>"
            class="<?= esc_attr($classes) ?>">
    </picture>
    <?php
    return ob_get_clean();
}