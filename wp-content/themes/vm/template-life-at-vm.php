<?php /* Template Name: Page "Life" */ ?>

<?php get_header(); ?>


<section class="what_is_life_like_container title_text">    <!--TITRE du de la section d'introduction-->
    <h2 class="section_title">
        Comment se passe <span class="underline">la</span><span class="underline"> vie</span><span class="underline"> sur</span><span class="underline"> place</span>
    </h2>
    <?= get_field('introduction_texte'); ?>
    <a href="<?php the_field('link_lif_to_houses '); ?>" title="Aller vers la page 'Nos maisons'" class="link_to_page link">Découvrez nos maisons
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
        </svg>
    </a>

</section>

<section class="activities_container img_title_text">
    <div class="text_content">
        <h2 class="section_title">
            <span class="underline">Activités</span> des enfants
        </h2>
        <?= get_field('activities_text'); ?>
    </div>
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


<!--HEEEELP -->
<!--    <section class="news_section">
        <h2 class="section_title title_middle">
        <span class="underline">
            <?php /*= get_field('title_news');*/?>
        </span>
        </h2>
        <a href="<?php /*= get_field('link_vie_to_news');*/?>" title="Aller vers la page 'Actualités'"
           class="link_to_page. link">Voir toutes les actualités
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                        fill="#F19595" />
            </svg>
        </a>

        <div class="news">
            <?php
/*            $news = new WP_Query([
                'post_type' => 'news',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 3,
            ]);

            if($news->have_posts()): while($news->have_posts()): $news->the_post(); */?>
                <article class="news__card">
                    <h3 class="news__title">
                        <?php /*= get_the_title(); */?>
                    </h3>
                    <a href="<?php /*= get_the_permalink(); */?>" class="news__link link">
                <span class="sro">Découvrir l'actualité
                    <?php /*= get_the_title(); */?>
                </span>
                    </a>
                    <div class="news__dates">
                        <?php
/*                        $date = get_field('news_date');
                        if ($date):
                            */?>
                            <p class="single_news_date">
                                <time datetime="<?php /*= $date; */?>">
                                    <?php /*= $date; */?>
                                </time>
                            </p>
                        <?php /*else: */?>
                            <p> Sans date </p>
                        <?php /*endif; */?>
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
                    <figure class="news__fig">
                        <?php /*= responsive_image(get_field('news_image'), ['classes' => 'news__img']);*/?>
                    </figure>
                    <a href="<?php /*= the_permalink() */?>">Lien</a>
                </article>
                <?php
/*                wp_reset_postdata();
            endwhile; else: */?>
                <p>Je n'ai pas d'actualités récentes à montrer...</p>
            <?php /*endif; */?>
        </div>
    </section>-->
    <section class="news_section">
        <div class="news_header">
            <h2 class="section_title back">Nos <span class="underline back">actualités</span>
            </h2>
            <a href="<?= get_field('link_homepage_to_news'); ?>" title="Aller vers la page 'Actualités'"
               class="link show_all_news">Voir
                toutes les actualités
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                            fill="#F19595"/>
                </svg>
            </a></div>
<!--        <h2 class="section_title title_middle back">
            Nos <span class="underline">actualités</span>
        </h2>
        <a href="<?php /*= get_field('link_homepage_to_news'); */?>" title="Aller vers la page 'Actualités'" class="link show_all_news">Voir
            toutes les actualités
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                        fill="#F19595" />
            </svg>
        </a>-->
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
                <article class="single_news news__card">
                    <h3 class="news__title">
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
        <h2 class="section_title title_middle">
            <span class="underline">Témoignages</span> de nos enfants
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













<section class="life_gallery_container title_gallery">
<h2 class="section_title title_middle">
    <span class="underline back">Galerie</span>
</h2>

    <div class="foyer_gallery_container">
        <?php $images = get_field('foyer_gallery'); ?>
        <?php if (!empty($images)): foreach ($images as $image): ?>
            <?= responsive_image($image, ['classes' => 'life_foyer_gallery__img']) ?>
        <?php endforeach; else: ?>
        <?php endif; ?>
    </div>

</section>












<section class="faq_life_container">
    <h2 class="section_title title_middle">
        <span class="underline">FAQ</span>
    </h2>

    <!--RECUPERER LES QUESTIONS CLONE-->

    <!--Boucle sur le repeater "faq_life" pour afficher les questions et réponses-->
    <?php
    if (have_rows('faq_family')): ?>
        <ul class="faq_life_list faq_family_list">
            <?php while (have_rows('faq_family')): the_row();

                // Récupère les sous-champs
                $question = get_sub_field('question_family');
                $answer = get_sub_field('answer_family');

                if ($question && $answer): ?>
                    <li>
                        <p class="family_question"><?php echo esc_html($question); ?></p>
                    </li>
                    <li>
                        <p class="family_answer"><?php echo esc_html($answer); ?></p>
                    </li>
                <?php endif;
            endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Aucune question trouvée.</p>
    <?php endif; ?>

    <a href="<?php the_field('link_guide '); ?>" title="Aller vers la page 'Ressources'" class="link_to_page link">Guide pratique
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
        </svg>
    </a>


</section>












<?php get_footer(); ?>