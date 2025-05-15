<?php /* Template Name: Page "What-is-it" */ ?>

<?php get_header(); ?>


<section class="what_introduction_container img_title_text">
    <h2 class="section_title">
        <span class="underline">Le </span>
        <span class="underline">Vieux </span>
        <span class="underline">Moulin </span> c’est quoi?
    </h2>
    <?= get_field('text_introduction_what_is_it');?>
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
            Nos <span class="underline back">missions </span>
        </h2>
        <?= get_field('text_missions'); ?>
        <div class="what_mission_image">
            <?php
            $what_mission_image = get_field('image_mission');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($what_mission_image) {
                echo wp_get_attachment_image($what_mission_image, $size);
            }
            ?>
        </div>

    </section>
    <section class="values_container img_title_text">

        <h2 class="section_title">
            Nos <span class="underline back">valeurs </span>
        </h2>
        <?= get_field('text_values'); ?>

        <div class="what_values_image">
            <?php
            $what_values_image = get_field('image_values');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($what_values_image) {
                echo wp_get_attachment_image($what_values_image, $size);
            }
            ?>
        </div>

    </section>
</div>



<section class="what_activities_container title_text">
    <h2 class="section_title title_middle">
        <span class="underline back">Activités </span>
        <span class="underline back">des </span>
        <span class="underline back">enfants</span>
        <?php /*= get_field('title_activities'); */?>
    </h2>
    <?= get_field('text_activities'); ?>

</section>




<section class="history_container title_images_text_link">
    <h2 class="section_title title_middle">
        <span class="underline back">Histoire </span>
        <span class="underline back">et </span>
        <span class="underline back">évolution</span> du Vieux Moulin
    </h2>
    <div class="history_images_container">
        <?php $images = get_field('gallery_lhistory_vm'); ?>

        <?php if (!empty($images)): foreach ($images as $image): ?>
            <?= responsive_image($image, ['classes' => 'history_gallery__img']) ?>
        <?php endforeach; else: ?>
        <?php endif; ?>
    </div>

    <?= get_field('text_history'); ?>
    <a href="<?= get_field('link_what_is_to_houses'); ?>" title="Aller vers la page 'Nos maisons'" class="link_to_page link">Découvrez nos maisons             <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                  fill="#F19595"/>
        </svg>
    </a>
</section>


<section class="partners_container what_title_gallery">
    <h2 class="section_title">
        <span class="underline"><?= get_field('partners_title'); ?></span>
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
