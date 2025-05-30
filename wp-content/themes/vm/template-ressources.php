<?php /* Template Name: Page "Resources" */ ?>

<?php get_header(); ?>


<?php
/*// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); */ ?>

<div class="flex_container_first_section">
    <div class="image_resources" itemprop="image">
        <?php
        $resources_image = get_field('image_resources');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($resources_image) {
            echo wp_get_attachment_image($resources_image, $size);
        }
        ?>
    </div>

    <section class="introduction_resources">
        <h2 class="section_title title_middle">
            Le <span class="underline">projet </span><span class="underline">éducatif</span> en quelques mots
        </h2>

        <?= get_field('resources_description_text');?>

        <?php
        $single_file = get_field('single_file');?>
        <?php if ($single_file): ?>

            <a href="<?php echo $single_file['url']; ?>" download="<?php echo $single_file['filename']; ?>"
               title="Télécharger le fichier '<?php echo $single_file['filename']; ?>'" class="single_file">
                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.99984 12L1.92736 7L3.34766 5.55L5.98535 8.15V0H8.01434V8.15L10.652 5.55L12.0723 7L6.99984 12Z"
                          fill="black"/>
                    <path d="M0.912868 14H13.0868C14.3044 14.0004 14.3044 16 13.0868 16H0.912868C-0.304289 16 -0.304289 14.0004 0.912868 14Z"
                          fill="black"/>
                </svg> <?php echo $single_file['filename']; ?>
            </a>
            <?php else: ?>
            <p>Aucun fichier trouvée.</p>
        <?php endif; ?>
    </section>
</div>

<section class="download_resources_container">
    <h2 class="section_title title_middle">
        <span class="underline">Ressources</span> téléchargables
    </h2>

    <!--Boucle sur le repeater "Fichiers de ressources" pour afficher les fichiers-->
    <?php
    if (have_rows('resources_files')): ?>
        <ul class="resources_list">
            <?php while (have_rows('resources_files')): the_row(); ?>


                <li>
                <?php
                // Récupère les sous-champs
                $file_resource = get_sub_field('file');
                if ($file_resource): ?>
                    <a href="<?php echo $file_resource['url']; ?>" download="<?php echo $file_resource['filename']; ?>"
                       title="Télécharger le fichier '<?php echo $file_resource['filename']; ?>'">
                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.99984 12L1.92736 7L3.34766 5.55L5.98535 8.15V0H8.01434V8.15L10.652 5.55L12.0723 7L6.99984 12Z"
                                  fill="black"/>
                            <path d="M0.912868 14H13.0868C14.3044 14.0004 14.3044 16 13.0868 16H0.912868C-0.304289 16 -0.304289 14.0004 0.912868 14Z"
                                  fill="black"/>
                        </svg> <?php echo $file_resource['filename']; ?>
                    </a>
                    </li>

                <?php endif;
            endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Aucun fichier trouvée.</p>
    <?php endif; ?>
</section>


<?php get_footer(); ?>