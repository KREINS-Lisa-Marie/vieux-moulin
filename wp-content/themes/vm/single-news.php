<?php get_header(); ?>

<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>

<article>
    <h2 class="news__title">
<?= get_the_title(); ?>
    </h2>

    <?php
    $single_news_image = get_field('news_image');
    $size = 'medium'; // (thumbnail, medium, large, full or custom size)
    if( $single_news_image ) {
        echo wp_get_attachment_image( $single_news_image, $size );
    }
    ?>

    <?php
    $date = get_field('news_date');
    ?>


    <div class="news_date">
        <time datetime="<?= date('c', $date); ?>"><?= date_i18n('d.m.Y', $date); ?></time>
    </div>


    <div class="news_text">
<?= get_field('news_text');?>
    </div>

</article>



    <section class="latest_news_section">
        <h2>Nos dernières actualités</h2>
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
                <p>Il n'y a pas d'actualités récentes à montrer pour le moment...</p>
            <?php endif; ?>
        </div>
    </section>




















<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p>Cette actualité n'existe pas.</p>
<?php endif; ?>




                            <!--HELP-->
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


<?php get_footer(); ?>