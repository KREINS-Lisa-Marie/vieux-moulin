<?php /* include ('templates/content/stage/stage.php') */ ?>
<?php get_header(); ?>

    <div class="image_accueil" itemprop="image">
        <?php
        $image_accueil = get_field('head_image');
        $e_size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($image_accueil) {
            echo wp_get_attachment_image($image_accueil, $e_size);
        }
        ?>
    </div>

    <!--        Contenu Principal       -->
    <section class="what_is_it title_text ">
        <h2 class="section_title title_middle" itemprop="legalName" aria-level="2" role="heading">
            <?php $home_first_title = get_field('first_title'); ?>
            <?php $home_first_title = str_replace(['<p>', '</p>'], '', $home_first_title);          // enlever les p car je veux avoir un h2
            $home_first_title = str_replace('<strong>', '<strong class="underline">', $home_first_title) //ajoute la classe "underline à la balise ?>
            <?= $home_first_title ?>
        </h2>
        <div itemprop="description">
            <?= get_field('first_text'); ?>
        </div>

        <a href="<?= get_field('link_homepage_to_discover'); ?>" title="Aller vers la page du Vieux Moulin"
           class="link title_middle">Découvrir le Vieux Moulin
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                      fill="#F19595"/>
            </svg>
        </a>


    </section>


    <!--    Pour afficher les 3 dernières actualités    -->

    <section class="news_section">
        <div class="news_header">
            <h2 class="section_title back" aria-level="2" role="heading">
                <?php $home_news_title = get_field('second_title'); ?>
                <?php $home_news_title = str_replace(['<p>', '</p>'], '', $home_news_title);          // enlever les p car je veux avoir un h2
                $home_news_title = str_replace('<strong>', '<strong class="underline">', $home_news_title) //ajoute la classe "underline à la balise ?>
                <?= $home_news_title ?>
            </h2>
            <a href="<?= get_field('link_to_news'); ?>" title="Aller vers la page 'Actualités'" class="link show_all_news">Voir
                toutes les actualités
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

    <section class="testimonials_container ">
        <h2 class="section_title title_middle" aria-level="2" role="heading">
            <?php $home_testimonials_title = get_field('third_title'); ?>
            <?php $home_testimonials_title = str_replace(['<p>', '</p>'], '', $home_testimonials_title);          // enlever les p car je veux avoir un h2
            $home_testimonials_title = str_replace('<strong>', '<strong class="underline">', $home_testimonials_title) //ajoute la classe "underline à la balise ?>
            <?= $home_testimonials_title ?>
        </h2>
        <div class="testimonials_flex_container">
            <div class="single_textimonial">
                <span>“</span>
                <?= get_field('first_testimonial_text'); ?>
                <span class="end_quote">”</span>

                <p class="name_age">
                    <?= get_field('name_age_first_testimonial'); ?>
                </p>
            </div>
            <div class="single_textimonial">
                <span>“</span>
                <?= get_field('second_testimonial_text'); ?>
                <span class="end_quote">”</span>
                <p class="name_age">
                    <?= get_field('name_age_second_testimonial'); ?>
                </p>
            </div>
            <div class="single_textimonial">
                <span>“</span>
                <?= get_field('third_testimonial_text'); ?>
                <span class="end_quote">”</span>
                <p class="name_age">
                    <?= get_field('name_age_third_testimonial'); ?>
                </p>
            </div>
        </div>
    </section>

<!--
    <section class="donations_container img_title_text">
        <h2 class="donations_title section_title">
            <span class="underline back">
            <?php /*= get_field('fourth_title'); */?>
                </span>
        </h2>

        <div class="qr_image">
            <?php
/*            $qr_code_img = get_field('qr_code');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($qr_code_img) {
                echo wp_get_attachment_image($qr_code_img, $size);
            }
            */?>
        </div>

        <h3 class="subtitle">
            <?php /*= get_field('secondary_title'); */?>
        </h3>
        <?php /*= get_field('fourth_text'); */?>

        <a href="<?php /*the_field('subline'); */?>" title="Aller vers la page du Vieux Moulin"
           class="link link_to_donations">Découvrir comment nous soutenir
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                      fill="#F19595"/>
            </svg>
        </a>
        <a href="<?php /*the_field('link_to_page'); */?>" title="Aller vers la page du Vieux Moulin"
           class="link link_to_projects">Découvrir nos projets
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                      fill="#F19595"/>
            </svg>
        </a>

    </section>
-->

    <section class="donations_container img_title_text">
        <h2 class=" donations_title section_title" aria-level="2" role="heading">

            <?php $home_donations_title = get_field('fourth_title'); ?>
            <?php $home_donations_title = str_replace(['<p>', '</p>'], '', $home_donations_title);          // enlever les p car je veux avoir un h2
            $home_donations_title = str_replace('<strong>', '<strong class="underline back">', $home_donations_title) //ajoute la classe "underline à la balise ?>
            <?= $home_donations_title ?>


        </h2>
        <h3 class="donations_subtitle subtitle" aria-level="3">
            <?= get_field('secondary_title'); ?>
        </h3>
        <div class="donations_text">
            <?= get_field('fourth_text'); ?>
        </div>
        <div class="donations_subline">
            <a href="<?= get_field('subline'); ?>" title="Aller vers la page du Vieux Moulin"
               class="link">Découvrir comment nous soutenir
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
                    <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                          fill="#F19595"/>
                </svg>
            </a>
        </div>
        <a href="<?= get_field('link_to_page'); ?>" title="Aller vers la page du Vieux Moulin"
           class="link_to_page link link_to_donation_contact">Découvrir nos projets
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                      fill="#F19595"/>
            </svg>
        </a>

        <div class="qr_code qr_image">
            <?php
            $qr_code_image = get_field('qr_code');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($qr_code_image) {
                echo wp_get_attachment_image($qr_code_image, $size);
            }
            ?>
        </div>
    </section>










    <section class="family_container img_title_text">
        <div class="text_content">
            <h2 class="section_title title_middle" aria-level="2" role="heading">
                <?php $home_families_title = get_field('fifth_title'); ?>
                <?php $home_families_title = str_replace(['<p>', '</p>'], '', $home_families_title);          // enlever les p car je veux avoir un h2
                $home_families_title = str_replace('<strong>', '<strong class="underline">', $home_families_title) //ajoute la classe "underline à la balise ?>
                <?= $home_families_title ?>
            </h2>
            <h3 class="subtitle" aria-level="3" role="heading">
                <?= get_field('fifth_subtitle'); ?>
            </h3>
            <?= get_field('fifth_text'); ?>

            <?php
            $link = get_field('external_link');
            if ($link): ?>
                <a href="<?php echo esc_url($link); ?>"
                   title="Aller vers le site de '<?= get_field('fifth_subtitle'); ?>'"
                   class="extern_link link ">Plus d'informations
                    <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
                        <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                              fill="#F19595"/>
                    </svg>
                </a>


            <?php endif; ?></div>

        <div class="image_f_accueil">
            <?php
            $image_f_accueil = get_field('fifth_image');
            $e_size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($image_f_accueil) {
                echo wp_get_attachment_image($image_f_accueil, $e_size);
            }
            ?>
        </div>
    </section>


    <!--mettre au début de nouveau!-->


<?php get_footer(); ?>