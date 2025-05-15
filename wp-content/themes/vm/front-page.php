<?php /* include ('templates/content/stage/stage.php') */ ?>
<?php get_header(); ?>


    <!--        Contenu Principal       -->
<section class="what_is_it title_text ">
    <h2 class="sro">Le Vieux Moulin page d'accueil</h2>

    <div class="image_accueil">
        <?php
        $image_accueil = get_field('head_image');
        $e_size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($image_accueil) {
            echo wp_get_attachment_image($image_accueil, $e_size);
        }
        ?>
    </div>

    <h2 class="section_title title_middle">
        Le <span class="underline">Vieux </span>
        <span class="underline">Moulin</span>
        c'est quoi?
    </h2>
    <?= get_field('first_text'); ?>

    <a href="<?php the_field('link_homepage_to_discover '); ?>" title="Aller vers la page du Vieux Moulin" class="link title_middle">Découvrir le Vieux Moulin
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
        </svg>
    </a>




</section>



    <!--    Pour afficher les 3 dernières actualités    -->

    <section class="news">
        <h2 class="section_title title_middle back">
            Nos <span class="underline">actualités</span>
        </h2>
        <a href="<?= get_field('link_homepage_to_news'); ?>" title="Aller vers la page 'Actualités'" class="link">Voir toutes les actualités
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
            </svg>
        </a>
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
                <article class="single_news">
                    <h3 class="news__title">
                        <?= get_the_title(); ?>
                    </h3>
                    <a href="<?= get_the_permalink(); ?>" class="news__link">
                        <span class="sro">Découvrir l'actualité <?= get_the_title(); ?></span>
                    </a>
                    <div class="news__card">

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
                        <figure class="news__fig">
                            <span class="gradient">
                            <?= responsive_image(get_field('news_image'), ['classes' => 'news__img']); ?>
                            </span>
                        </figure>
                        <!--<figure class="news__fig">
                            <?php /*= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'news__img']); */?>
                        </figure>-->
                    </div>
                </article>
                <?php
                wp_reset_postdata();
            endwhile; else: ?>
                <p>Je n'ai pas d'actualités récentes à montrer pour le moment...</p>
            <?php endif; ?>
        </div>
    </section>




    <section class="testimonials_container ">
        <h2 class="section_title title_middle">
            <span class="underline">Témoignages</span> de nos enfants
        </h2>
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
    </section>


    <section class="donations_container img_title_text">
        <h2 class="donations_title section_title">
            <span class="underline back">
            <?= get_field('fourth_title'); ?>
                </span>
        </h2>

        <div class="qr_image">
            <?php
            $qr_code_img = get_field('qr_code');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($qr_code_img) {
                echo wp_get_attachment_image($qr_code_img, $size);
            }
            ?>
        </div>

        <h3 class="subtitle">
            <?= get_field('secondary_title'); ?>
        </h3>
        <?= get_field('fourth_text'); ?>

        <a href="<?php the_field('subline'); ?>" title="Aller vers la page du Vieux Moulin" class="link link_to_donations">Découvrir comment nous  soutenir
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
            </svg>
        </a>
        <a href="<?php the_field('link_to_page'); ?>" title="Aller vers la page du Vieux Moulin" class="link link_to_projects">Découvrir nos projets
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
            </svg>
        </a>

    </section>


    <section class="family_container img_title_text">
        <h2 class="section_title title_middle">
<span class="underline">Autre façon</span>
            de soutenir
        </h2>
        <h3 class="subtitle">
            <?= get_field('fifth_subtitle'); ?>
        </h3>
        <?= get_field('fifth_text'); ?>

        <?php
        $link = get_field('external_link');
        if ($link): ?>
            <a href="<?php echo esc_url($link); ?>" title="Aller vers le site de '<?= get_field('fifth_subtitle'); ?>'" class="extern_link link ">Plus d'informations
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
                </svg>
            </a>



        <?php endif; ?>

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