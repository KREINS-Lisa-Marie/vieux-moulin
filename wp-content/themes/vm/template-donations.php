<?php /* Template Name: Page "Donations" */ ?>

<?php get_header(); ?>


<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>


    <section class="introduction_donations">
        <h2 class="section_title" aria-level="2" role="heading">
            <?php $donations_introduction_title = get_field('title_introduction'); ?>
            <?php $donations_introduction_title = str_replace(['<p>', '</p>'], '', $donations_introduction_title);          // enlever les p car je veux avoir un h2
            $donations_introduction_title = str_replace('<strong>', '<strong class="underline">', $donations_introduction_title) //ajoute la classe "underline à la balise ?>
            <?= $donations_introduction_title ?>

        </h2>

        <?= get_field('text_introduction'); ?>


        <a href="<?= get_field('link_donations_projects'); ?>" title="Aller vers la page 'Nos maisons'"
           class="link_to_page link ">Voir nos projets
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                      fill="#F19595"/>
            </svg>
        </a>


    </section>

    <section class="types_of_donations_container">
        <h2 class="donations_title section_title title_middle" aria-level="2" role="heading">
            <?php $donation_types_title = get_field('title_types_of_donations'); ?>
            <?php $donation_types_title = str_replace(['<p>', '</p>'], '', $donation_types_title);          // enlever les p car je veux avoir un h2
            $donation_types_title = str_replace('<strong>', '<strong class="underline">', $donation_types_title) //ajoute la classe "underline à la balise ?>
            <?= $donation_types_title ?>


        </h2>

        <div class="donations_flex_container">
            <div class="types_of_donations_img">
                <?php
                $types_image = get_field('donations_image');
                //$size = 'full'; // (thumbnail, medium, large, full or custom size)
                if ($types_image) {
                    //echo wp_get_attachment_image($types_image, $size);
                    echo responsive_image($types_image, ['classes' => 'attachment-large size-large']);
                }
                ?>
            </div>
            <div class="donations_text">
                <?= get_field('text_types_of_donations'); ?>
            </div>
        </div>
    </section>

<!--    <section class="donations_container img_title_text">
        <h2 class="section_title">
            <span class="underline back"><?php /*= get_field('donations_title'); */?></span>
        </h2>
        <div class="qr_code qr_image">
            <?php
/*            $qr_code_image = get_field('image_qr_code');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($qr_code_image) {
                echo wp_get_attachment_image($qr_code_image, $size);
            }
            */?>
        </div>
        <div class="direct_donation_textinformation">
            <h3 class="donations_subtitle subtitle">
                <?php /*= get_field('subtitle_donations'); */?>
            </h3>
            <div class="donations_text">
                <?php /*= get_field('donations_text'); */?>
            </div>
            <div class="donations_subline">
                <?php /*= get_field('subline'); */?>
            </div>
            <a href="<?php /*= get_field('link_houses_to_contact'); */?>" title="Aller vers la page 'Contact'"
               class="link_to_page link">Dites nous comment</a>


<!-            <div class="qr_code qr_image">
                <?php
/*/*                $qr_code_image2 = get_field('image_qr_code');
                responsive_image($qr_code_image2, ['classes' => 'image'])
                */?>
            </div>->
        </div>
    </section>-->



    <section class="donations_container img_title_text">
        <h2 class="section_title" aria-level="2" role="heading">
            <?php $donations_donation_section_title = get_field('donations_title'); ?>
            <?php $donations_donation_section_title = str_replace(['<p>', '</p>'], '', $donations_donation_section_title);          // enlever les p car je veux avoir un h2
            $donations_donation_section_title = str_replace('<strong>', '<strong class="underline back">', $donations_donation_section_title) //ajoute la classe "underline à la balise ?>
            <?= $donations_donation_section_title ?>
        </h2>
        <h3 class="donations_subtitle subtitle" aria-level="3">
            <?= get_field('subtitle_donations'); ?>
        </h3>
        <div class="donations_text">
            <?= get_field('donations_text'); ?>
        </div>
        <div class="donations_subline">
            <?= get_field('subline'); ?>
        </div>
        <a href="<?= get_field('link_houses_to_contact');?>" title="Aller vers la page 'Contact'" class="link_to_page link link_to_donation_contact">Dites nous comment
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                      fill="#F19595"/>
            </svg>
        </a>

        <div class="qr_code qr_image">
            <?php
            $qr_code_image = get_field('image_qr_code');
            //$size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($qr_code_image) {
                //echo wp_get_attachment_image($qr_code_image, $size);
                echo responsive_image($qr_code_image, ['classes' => 'attachment-large size-large']);
            }
            ?>
        </div>
    </section>





    <section class="partners_container">

        <h2 class="section_title" aria-level="2" role="heading">
            <?php $donations_partners_title = get_field('title_partners'); ?>
            <?php $donations_partners_title = str_replace(['<p>', '</p>'], '', $donations_partners_title);          // enlever les p car je veux avoir un h2
            $donations_partners_title = str_replace('<strong>', '<strong class="underline">', $donations_partners_title) //ajoute la classe "underline à la balise ?>
            <?= $donations_partners_title ?>
        </h2>

        <div class="partners_gallery_container" itemprop="sponsor">
            <?php $images = get_field('gallery_partners'); ?>
            <?php if (!empty($images)): foreach ($images as $image): ?>
                <?= responsive_image($image, ['classes' => 'donations_partner_gallery__img']) ?>
            <?php endforeach; else: ?>
            <?php endif; ?>
        </div>
    </section>


<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p>La page est vide.</p>
<?php endif; ?>

<?php get_footer(); ?>

<?php