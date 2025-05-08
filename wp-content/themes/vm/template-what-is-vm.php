<?php /* Template Name: Page "What-is-it" */ ?>

<?php get_header(); ?>


<section class="what_introduction_container img_title_text">
    <h2 class="section_title">
        <?= get_field('title_dintroduction_what_is_it');?>
    </h2>
    <?= get_field('text_introduction_what_is_it');?>
    <?= get_field('introduction_image');?>
    <div class="what_introduction_image">
        <?php
        $what_introduction_image = get_field('introduction_image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($what_introduction_image) {
            echo wp_get_attachment_image($what_introduction_image, $size);
        }
        ?>
    </div>


</section>





<div>
    <section class="missions_container img_title_text">
        <h2 class="section_title">
            <?= get_field('missions_title'); ?>
        </h2>
        <?= get_field('text_missions'); ?>

        <?= get_field('introduction_image'); ?>
    </section>
    <section class="values_container img_title_text">

        <h2 class="section_title">
            <?= get_field('title_values'); ?>
        </h2>
        <?= get_field('text_values'); ?>

        <?= get_field('introduction_image'); ?>
    </section>
</div>



<section class="what_activities_container title_text">
    <h2 class="section_title">
        <?= get_field('title_activities'); ?>
    </h2>
    <?= get_field('text_activities'); ?>

</section>




<section class="history_container title_images_text_link">
    <h2 class="section_title">
        <?= get_field('title_history'); ?>
    </h2>
    <div class="history_images_container">
        <?php $images = get_field('gallery_lhistory_vm'); ?>

        <?php if (!empty($images)): foreach ($images as $image): ?>
            <?= responsive_image($image, ['classes' => 'history_gallery__img']) ?>
        <?php endforeach; else: ?>
        <?php endif; ?>
    </div>

    <?= get_field('text_history'); ?>
    <a href="<?= get_field('link_what_is_to_houses'); ?>" title="Aller vers la page 'Nos maisons'" class="link_to_page">Découvrez nos maisons</a>
</section>


<section class="partners_container title_gallery">
    <h2 class="section_title">
        <?= get_field('partners_title'); ?>
    </h2>
        <div class="partners_images_container">
            <?php $images = get_field('partners_gallery'); ?>

            <?php if (!empty($images)): foreach ($images as $image): ?>
                <?= responsive_image($image, ['classes' => 'partners_gallery__img']) ?>
            <?php endforeach; else: ?>
            <?php endif; ?>
    </div>

</section>

<?php get_footer(); ?>
