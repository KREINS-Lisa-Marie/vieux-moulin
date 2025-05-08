<?php /* Template Name: Page "Donations" */ ?>

<?php get_header(); ?>


<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>





    <section class="introduction_donations">
        <h2 class="section_title">
            <?= get_field('title_introduction'); ?>
        </h2>

        <?= get_field('text_introduction'); ?>
        <a href="<?php the_field('link_donations_projects'); ?>" title="Aller vers la page 'Nos maisons'" class="link_to_page">Voir nos projets</a>
    </section>








    <section class="donation_types_section">
        <h2 class="section_title">
            <?= get_field('title_types_of_donations');?>
        </h2>

        <?php
        $donations_image = get_field('donations_image');
        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
        if( $donations_image ) {
            echo wp_get_attachment_image( $donations_image, $size );
        }
        ?>

        <?= get_field('text_types_of_donations');?>
    </section>

<h2 class="section_title">
    <?= get_field('title_partners');?>
</h2>
<?= get_field('');?>

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





