<?php /* Template Name: Page "News" */ ?>
<!--commentaire pour dire à WP que c'est un fichier template -->

<?php get_header(); ?>

<!--La classe "sro" est une classe pour "screenreader-only"-->


<section class="news_section news_page">
    <h2 class="section_title title_middle">
        <?php $newspage_title = get_field('newspage_news_title'); ?>
        <?php $newspage_title = str_replace(['<p>', '</p>'], '', $newspage_title);          // enlever les p car je veux avoir un h2
        $newspage_title = str_replace('<strong>', '<strong class="underline back">', $newspage_title) //ajoute la classe "underline à la balise ?>
        <?= $newspage_title ?>
    </h2>


    <div class="news_div news">
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


            <article class="news__card" itemprop="event">
                <h3 class="news__title">
                    <?= get_the_title(); ?>
                </h3>

                <div class="card_content_relative">
                    <a href="<?= get_the_permalink(); ?>" class="news__link" title="Aller vers le projet">
                        <span class="sro">Découvrir l'actualité <?= get_the_title(); ?></span>
                    </a>
                    <div class="news__dates">
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
                    <div class="news_button">
                    <span>
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="news_button_circle">
<rect width="48" height="48" rx="24" fill="#F19595"/>
</svg>
                        <svg width="14" height="22" viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="news_button_arrow">
<path d="M1.5 1.5L11 11L1.5 20.5" stroke="white" stroke-width="3" stroke-linecap="round"/>
</svg>
                    </span>
                    </div>


                    <div class="news__fig">
                        <?= responsive_image(get_field('news_image'), ['classes' => 'news__img']); ?>
                    </div>

                </div>

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



<!-- ancien code
<section class="donations_container img_title_text">
    <h2 class="donations_title section_title">
            <span class="underline back">
            <?php /*= get_field('donations_title'); */?>
                </span>
    </h2>

    <div class="qr_image">
        <?php
/*        $qr_code_img = get_field('image_qr_code');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($qr_code_img) {
            echo wp_get_attachment_image($qr_code_img, $size);
        }
        */?>
    </div>

    <h3 class="subtitle">
        <?php /*= get_field('subline'); */?>
    </h3>
    <?php /*= get_field('text_donations'); */?>

    <a href="<?php /*the_field('first_link'); */?>" title="Aller vers la page du Vieux Moulin"
       class="link link_to_donations">Découvrir comment nous soutenir
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                  fill="#F19595"/>
        </svg>
    </a>
    <a href="<?php /*the_field('second_link'); */?>" title="Aller vers la page du Vieux Moulin"
       class="link link_to_projects">Découvrir nos projets
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                  fill="#F19595"/>
        </svg>
    </a>

</section>
-->




<section class="donations_container img_title_text">
    <h2 class="section_title">
        <?php $newspage_donations_title = get_field('donations_title'); ?>
        <?php $newspage_donations_title = str_replace(['<p>', '</p>'], '', $newspage_donations_title);          // enlever les p car je veux avoir un h2
        $newspage_donations_title = str_replace('<strong>', '<strong class="underline back">', $newspage_donations_title) //ajoute la classe "underline à la balise ?>
        <?= $newspage_donations_title ?>
    </h2>
    <h3 class="donations_subtitle subtitle">
        <?= get_field('subline'); ?>
    </h3>
    <div class="donations_text">
        <?= get_field('text_donations'); ?>
    </div>
    <div class="donations_subline">
        <?= get_field('supline'); ?>
    </div>
    <a href="<?= get_field('second_link');?>" title="Aller vers la page 'Contact'" class="link_to_page link link_to_donation_contact">Dites nous comment
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                  fill="#F19595"/>
        </svg>
    </a>

    <div class="qr_code qr_image">
        <?php
        $qr_code_image = get_field('image_qr_code');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($qr_code_image) {
            echo wp_get_attachment_image($qr_code_image, $size);
        }
        ?>
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



