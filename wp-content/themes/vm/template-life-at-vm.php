<?php /* Template Name: Page "Life" */ ?>

<?php get_header(); ?>


<section class="what_is_life_like_container title_text">    <!--TITRE du de la section d'introduction-->
    <h2 class="section_title">
        <?= get_field('introduction_title'); ?>
    </h2>
    <?= get_field('introduction_texte'); ?>
    <a href="<?= get_field('link_lif_to_houses'); ?>" title="Aller vers la page 'Nos maisons'" class="link_to_page">Découvrez nos maisons</a>

</section>

<section class="activities_container img_title_text">
    <h2 class="section_title">
        <?= get_field('activities_title');?>
    </h2>
    <?= get_field('activities_text');?>

    <div class="life_activity_image">
        <?php
        $life_activity_image = get_field('activity_image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($life_activity_image) {
            echo wp_get_attachment_image($life_activity_image, $size);
        }
        ?>
    </div>
</section>



<section class="news_section">
    <h2 class="section_title">
        <?= get_field('title_news');?>
    </h2>
    <a href="<?= get_field('link_vie_to_news');?>" title="Aller vers la page 'Actualités'" class="link_to_page">Voir toutes les actualités</a>

    <div class="news">
        <?php
        $news = new WP_Query([
            'post_type' => 'news',
            'order' => 'ASC',
            'orderby' => 'date',
            'posts_per_page' => 3,
        ]);

        if($news->have_posts()): while($news->have_posts()): $news->the_post(); ?>
            <article class="news">
                <a href="<?= get_the_permalink(); ?>" class="news__link">
                    <span class="sro">Découvrir l'actualité<?= get_the_title(); ?></span>
                </a>
                <!-- <div class="project__card">
                    <div class="project__head">
                        <h3 class="project__title"><?php /*= get_the_title(); */?></h3>
                    </div>
                    <figure class="project__fig">
                        <?php /*= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'project__img']); */?>
                    </figure>
                </div>-->

                <div class="news__card">
                    <div class="news__head">
                        <h3 class="news__title"><?= get_the_title(); ?></h3>
                    </div>
                    <figure class="news__fig">
                        <?= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'news__img']); ?>
                    </figure>
                </div>


            </article>
        <?php endwhile; else: ?>
            <p>Je n'ai pas d'actualités récentes à montrer...</p>
        <?php endif; ?>
    </div>
</section>


<section class="testimonials_container ">
    <h2 class="section_title">
        <?= get_field('third_title'); ?>
    </h2>
    <div class="single_textimonial">
        <?= get_field('first_testimonial_text'); ?>
        <?= get_field('name_age_first_testimonial'); ?>
    </div>
    <div class="single_textimonial">
        <?= get_field('second_testimonial_text'); ?>
        <?= get_field('name_age_second_testimonial'); ?>
    </div>
    <div class="single_textimonial">
        <?= get_field('third_testimonial_text'); ?>
        <?= get_field('name_age_third_testimonial'); ?>
    </div>
</section>

<section class="life_gallery_container title_gallery">
<?= get_field('gallery_title');?>

    <div class="foyer_gallery_container">
        <?php $images = get_field('foyer_gallery'); ?>
        <?php if (!empty($images)): foreach ($images as $image): ?>
            <?= responsive_image($image, ['classes' => 'life_foyer_gallery__img']) ?>
        <?php endforeach; else: ?>
        <?php endif; ?>
    </div>

</section>


<section class="faq_life_container">
    <h2 class="section_title">
        <?= get_field('title_faq_life'); ?>
    </h2>

    <!--RECUPERER LES QUESTIONS CLONE-->


    <a href="<?= get_field('link_guide');?>" title="Aller vers la page 'Ressources'" class="link_to_page">Guide pratique</a>

</section>


<?php get_footer(); ?>