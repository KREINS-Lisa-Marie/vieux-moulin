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
    <h2 class="section_title">
        <span class="underline">Activités</span> des enfants
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


<!--HEEEELP -->


    <section class="news_section">
        <h2 class="section_title title_middle">
            <span class="underline"><?= get_field('title_news');?></span>
        </h2>
        <a href="<?= get_field('link_vie_to_news');?>" title="Aller vers la page 'Actualités'" class="link_to_page. link">Voir toutes les actualités
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

            if($news->have_posts()): while($news->have_posts()): $news->the_post(); ?>
                <article class="news">
                    <a href="<?= get_the_permalink(); ?>" class="news__link link">
                        <span class="sro">Découvrir l'actualité<?= get_the_title(); ?></span>
                    </a>


                    <!--                 <div class="project__card">
                    <div class="project__head">
                        <h3 class="project__title"><?php /*= get_the_title(); */?></h3>
                    </div>



                    <figure class="project__fig">
                        <?php /*= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'project__img']);
                        */?>
                    </figure>
                </div>-->

                    <div class="news__card">
                        <div class="news__head">
                            <h3 class="news__title"><?= get_the_title(); ?></h3>
                        </div>
                        <figure class="news__fig">
                            <?= responsive_image(get_field('news_image'), ['classes' => 'news__img']);?>

                            <!--        --><?php /*= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'news__img']); */?>
                        </figure>
                        <?php
                        $date = get_field('news_date');
                        ?>
                        <p class="single_news_date">
                            <time datetime="<?= $date; ?>">
                                <?= $date; ?>
                            </time>
                        </p>
                    </div>


                </article>
                <?php
                wp_reset_postdata();
            endwhile; else: ?>
                <p>Je n'ai pas d'actualités récentes à montrer...</p>
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
        <ul class="faq_life_list">
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