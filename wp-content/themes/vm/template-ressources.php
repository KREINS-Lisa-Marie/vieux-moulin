<?php /* Template Name: Page "Resources" */ ?>

<?php get_header(); ?>


<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>




    <?php
    $resources_image = get_field('image_resources');
    $size = 'medium'; // (thumbnail, medium, large, full or custom size)
    if( $resources_image ) {
        echo wp_get_attachment_image( $resources_image, $size );
    }
    ?>


    <section class="introduction_resources">
        <h2 class="section_title">
            <?= get_field('title_description_resources'); ?>
        </h2>

        <?= get_field('resources_description_text'); ?>
    </section>
<section>
    <h2 class="section_title">
        <?= get_field('title_resources_collection');?>
    </h2>

    <!--Boucle sur le repeater "Fichiers de ressources" pour afficher les fichiers-->
    <?php
    if( have_rows('resources_files') ): ?>
        <ul class="resources_list">
            <?php while( have_rows('resources_files') ): the_row();

                // Récupère les sous-champs
                $file = get_sub_field('single_file');

                if ($file): ?>
                    <li class="list_element_file">
                        <a href="<?php esc_html($file); ?>" class="file_link"><?php echo $file['filename']; ?></a>
                    </li>
                <?php endif;
            endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Aucun fichier trouvée.</p>
    <?php endif; ?>
</section>


<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p>La page est vide.</p>
<?php endif; ?>

<?php get_footer(); ?>

<?php
/*// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); */?>





