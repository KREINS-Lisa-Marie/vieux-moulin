<?php /* Template Name: Page "News" */ ?>
<!--commentaire pour dire à WP que c'est un fichier template -->

<?php get_header(); ?>

<!--La classe "sro" est une classe pour "screenreader-only"-->


<section class="news_section">
    <h2 class="section_title title_middle">
        Nos dernières <span class="underline">actualités</span>
    </h2>


    <div class="news_div">


        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = [
            'post_type' => 'news',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged,
        ];

        $news = new WP_Query($args);


        // On ajoute les projets sur la page
        // On ouvre "la boucle" (The Loop), la structure de contrôle
        // de contenu propre à Wordpress:


        if ($news->have_posts()): while ($news->have_posts()):
        $news->the_post(); ?>
        <article class="news">
            <a href="<?= get_the_permalink(); ?>" class="news__link link">
                <span class="sro">Découvrir l'actualité<?= get_the_title(); ?></span>
            </a>


            <!--                 <div class="project__card">
                    <div class="project__head">
                        <h3 class="project__title"><?php /*= get_the_title(); */ ?></h3>
                    </div>



                    <figure class="project__fig">
                        <?php /*= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'project__img']);
                        */ ?>
                    </figure>
                </div>-->

            <!--               <article class="news__card">
                    <div class="news__head">
                        <h3 class="news__title">
                            <?php /*= get_the_title(); */ ?>
                        </h3>
                    </div>
                    <figure class="news__fig">
                        <?php /*= responsive_image(get_field('news_image'), ['classes' => 'news__img']);*/ ?>

                        <?php /*/*= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'news__img']); /?>
                    </figure>
                    <?php
/*                    $date = get_field('news_date');
                    /?>
                    <p class="single_news_date">
                        <time datetime="<?php /*= $date; */ ?>">
                            <?php /*= $date; */ ?>
                        </time>
                    </p>
                </article>


            </article>
        <?php /*endwhile; else: */ ?>
            <p>Je n'ai pas d'actualités récentes à montrer...</p>
        <?php /*endif; */ ?>
    </div>-->


            <article class="news__card">
                <h3 class="news__title">
                    <?= get_the_title(); ?>
                </h3>
                <div class="news__dates">


                    <!--            <?php
                    /*            $date = get_field('news_date');
                                if($date): */ ?>
                <p class="single_news_date">
                    <time datetime="<?php /*= date('d/m/Y', $date); */ ?>"><?php /*= date_i18n('d/m/Y', $date); */ ?></time>
                </p>
            <?php /*else: */ ?>
                <p> Sans date </p>
            --><?php /*endif; */ ?>


                    <?php
                    $date = get_field('news_date');
                    if ($date):
                        ?>
                        <p class="single_news_date">
                            <time datetime="<?= $date; ?>">
                                <?= $date; ?>
                            </time>
                        </p>
                    <?php else: ?>
                        <p> Sans date </p>
                    <?php endif; ?>
                </div>


                <figure class="news__fig">
                    <?= responsive_image(get_field('news_image'), ['classes' => 'news__img']); ?>
                </figure>
            </article>
            <?php
            endwhile;
            echo '<div class="pagination">';
            echo paginate_links(array(
                'total' => $news->max_num_pages,
                'current' => $paged,
                'prev_text' => '&laquo; Précédent',
                'next_text' => 'Suivant &raquo;',
            ));
            echo '</div>';
            wp_reset_postdata();
            else :?>
                <p>Je n'ai pas de projets récents à montrer pour le moment...</p>
            <?php endif; ?>
    </div>


</section>


<!--


    <section class="news_section">
        <h2 class="section_title title_middle">
            Nos dernières <span class="underline">actualités</span>
        </h2>






        <div class="news_div">


            <?php
/*            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
                'post_type' => 'news',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'ASC',
                'paged' => $paged,
            ];

            $query = new WP_Query($args);


            // On ajoute les projets sur la page
            // On ouvre "la boucle" (The Loop), la structure de contrôle
            // de contenu propre à Wordpress:
*/ ?>


                        <article class="news__card">
                            <h3 class="news__title">
                                <?php /*= get_the_title(); */ ?>
                            </h3>
                            <div class="news__dates">
                                <?php
/*                                $date = get_field('news_date');
                                if($date): */ ?>
                                    <p>
                                        <time datetime="<?php /*= date('d/m/Y', $date); */ ?>"><?php /*= date_i18n('d/m/Y', $date); */ ?></time>
                                    </p>
                                <?php /*else: */ ?>
                                <p> Sans date </p>
                                <?php /*endif; */ ?>
                            </div>


                            <figure class="news__fig">
                                <?php /*= responsive_image(get_field('news_image'), ['classes' => 'news__img']);*/ ?>
                            </figure>
                        </article>
                <?php
/*                endwhile;
                echo '<div class="pagination">';
                    echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '&laquo; Précédent',
                    'next_text' => 'Suivant &raquo;',
                    ));
                    echo '</div>';
                                wp_reset_postdata();
                                else :*/ ?>
                <p>Je n'ai pas de projets récents à montrer pour le moment...</p>
            <?php /*endif; */ ?>
        </div>
    </section>

-->
<?php get_footer(); ?>



