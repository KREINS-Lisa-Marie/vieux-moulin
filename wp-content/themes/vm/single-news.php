<?php get_header(); ?>

<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>

    <article class="single_news_article" itemprop="event">
        <h2 class="single_news__title title_middle" aria-level="2" role="heading">
            <?= get_the_title(); ?>
        </h2>
        <div class="single_news_main_content">
            <div class="single_news_image">
                <?php
                $single_news_image = get_field('news_image');
                if ($single_news_image) {
                    echo responsive_image($single_news_image, ['classes' => 'attachment-large size-large']);
                }
                ?>
                <?php
                $date = get_field('news_date');
                ?></div>
            <div class="text_content">
                <p class="date_of_single_news">
                    <time datetime="<?= date('c', $date); ?>">
                        <?=  date_i18n('d/m/Y', $date); ?>
                    </time>
                </p>
                <div class="news_text">
                    <?= get_field('news_text'); ?>
                </div>
            </div>
        </div>

    </article>
<?php
    // On ferme "la boucle" (The Loop):
endwhile;
    wp_reset_postdata();
else: ?>
    <p>Cette actualité n'existe pas.</p>
<?php endif;
?>

    <section class="news_section">
        <div class="news_header">
            <h2 class="section_title back" aria-level="2" role="heading">Nos <span class="underline back">actualités</span>
            </h2>
            <a href="https://vieux-moulin.lisa-marie-kreins.com/nos-actualites/" title="Aller vers la page 'Actualités'" class="link show_all_news">Voir toutes les actualités
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
                    <path
                            d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                            fill="#F19595"/>
                </svg>
            </a></div>
        <div class="news">
            <?php
            $news = new WP_Query([
                'post_type' => 'news',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 3,
            ]);

            // On ajoute les actualités sur la page
            // On ouvre "la boucle" (The Loop), la structure de contrôle
            // de contenu propre à Wordpress:


            if ($news->have_posts()): while ($news->have_posts()): $news->the_post(); ?>
                <article class="single_news news__card" itemprop="event">
                    <h3 class="news__title" aria-level="3" role="heading">
                        <?= get_the_title(); ?>
                    </h3>

                    <a href="<?= get_the_permalink(); ?>" class="news__link" title="Aller vers le projet">
                        <span class="sro">Découvrir l'actualité <?= get_the_title(); ?></span>
                    </a>
                    <div class="news__dates">

                        <?php
                        $date = get_field('news_date');
                        if ($date):
                            ?>
                            <p class="single_news_date">
                                <time datetime="<?= date('c', $date); ?>">
                                    <?=  date_i18n('d/m/Y', $date); ?>
                                </time>
                            </p>
                        <?php else: ?>
                            <p> Sans date </p>
                        <?php endif; ?>
                    </div>
                    <div class="news_button">
                    <span>
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="news_button_circle">
                            <rect width="48" height="48" rx="24" fill="#F19595" />
                        </svg>
                        <svg width="14" height="22" viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="news_button_arrow">
                            <path d="M1.5 1.5L11 11L1.5 20.5" stroke="white" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </span>
                    </div>

                    <div class="news__fig">

                        <?= responsive_image(get_field('news_image'), ['classes' => 'news__img']); ?>

                    </div>
                </article>
                <?php
                wp_reset_postdata();
            endwhile;
            else: ?>
                <p>Je n'ai pas d'actualités récentes à montrer pour le moment...</p>
            <?php endif; ?>
        </div>
    </section>

<?php get_footer(); ?>