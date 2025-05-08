<?php /* include ('templates/content/stage/stage.php') */ ?>
<?php get_header(); ?>


    <!--        Contenu Principal       -->
<section class="what_is_it title_text">
    <h2 class="section_title">
        <?= get_field('first_title'); ?>
    </h2>
    <?= get_field('first_text'); ?>

    <a href="<?php the_field('link_homepage_to_discover'); ?>" title="Aller vers la page du Vieux Moulin">Découvrir le Vieux Moulin</a>

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


    <section class="donations_container img_title_text">
        <h2 class="section_title">
            <?= get_field('fourth_title'); ?>
        </h2>
        <h3 class="subtitle">
            <?= get_field('secondary_title'); ?>
        </h3>
        <?= get_field('fourth_text'); ?>
        <?= get_field('subline'); ?>
        <a href="<?php the_field('link_to_page'); ?>" class="link" title="Aller vers la page Contact">Dites nous comment</a>
    </section>


    <section class="family_container img_title_text">
        <h2 class="section_title">
            <?= get_field('fifth_title'); ?>
        </h2>
        <h3 class="subtitle">
            <?= get_field('fifth_subtitle'); ?>
        </h3>
        <?= get_field('fifth_text'); ?>

        <?php
        $link = get_field('external_link');
        if ($link): ?>
            <a class="extern_link link" title="Aller vers le site de '<?= get_field('fifth_subtitle'); ?>'"
               href="<?php echo esc_url($link); ?>">Plus d'informations</a>
        <?php endif; ?>
    </section>


    <!--    Pour afficher les 3 dernières actualités    -->

    <section class="news">
        <h2>Nos dernières actualités</h2>
        <a href="<?= get_field('link_homepage_to_news'); ?>" title="Aller vers la page 'Actualités'">Voir toutes les
            actualités</a>
        <div class="news">
            <?php
            $news = new WP_Query([
                'post_type' => 'news',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 3,
            ]);

            if ($news->have_posts()): while ($news->have_posts()): $news->the_post(); ?>
                <article class="news">
                    <h3 class="news__title">
                        <?= get_the_title(); ?>
                    </h3>
                    <a href="<?= get_the_permalink(); ?>" class="news__link">
                        <span class="sro">Découvrir l'actualité <?= get_the_title(); ?></span>
                    </a>
                    <div class="news__card">
                 <!--       <header class="news__head">
                            <h3 class="news__title"><?php /*= get_the_title(); */?></h3>
                        </header>-->
     <!--                   <?php
/*                        $date = get_field('news_date');
                        */?>
                        <div class="news_date">
                            <time datetime="<?php /*= date('c', $date); */?>"><?php /*= date_i18n('d.m.Y', $date); */?></time>
                        </div>-->
                        <figure class="news__fig">
                            <?= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'news__img']); ?>
                        </figure>
                    </div>
                </article>
            <?php endwhile; else: ?>
                <p>Je n'ai pas d'actualités récentes à montrer pour le moment...</p>
            <?php endif; ?>
        </div>
    </section>


<?php get_footer(); ?>