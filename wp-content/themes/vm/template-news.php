<?php /* Template Name: Page "News" */ ?>

<?php get_header(); ?>


<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>

<section class="news_section">
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
            <p>Je n'ai pas d'actualités récentes à montrer...</p>
        <?php endif; ?>
    </div>
</section>

<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p>La page est vide.</p>
<?php endif; ?>

    <?php get_footer(); ?>