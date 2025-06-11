<?php /* Template Name: Page "FAQ" */ ?>

<?php get_header(); ?>


<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>

    <section class="family_section_container">
        <!--TITRE du FAQ FAMILLE-->
        <h2 class="section_title title_middle" aria-level="2" role="heading">
            <?php $faq_family_title = get_field('faq_family_title'); ?>
            <?php $faq_family_title = str_replace(['<p>', '</p>'], '', $faq_family_title);          // enlever les p car je veux avoir un h2
            $faq_family_title = str_replace('<strong>', '<strong class="underline">', $faq_family_title) //ajoute la classe "underline à la balise ?>
            <?= $faq_family_title ?>
        </h2>


        <!--Boucle sur le repeater "faq_famille" pour afficher les questions et réponses-->
        <?php
        if (have_rows('faq_family')): ?>
            <ul class="faq_family_list">
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


        <!--Lien vers une page interne-->
        <a href="<?= get_field('link_faq_to_page'); ?>" title="Aller vers la page 'La vie au foyer'" class="link_to_page link title_middle">Comment se passe la vie ches nous?         <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
                <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
            </svg>
        </a>
    </section>
    <section class="general_section_container">
        <!--TITRE du FAQ GENERAl-->
        <h2 class="section_title title_middle" aria-level="2" role="heading">
            <?php $faq_general_title = get_field('faq_general_title'); ?>
            <?php $faq_general_title = str_replace(['<p>', '</p>'], '', $faq_general_title);          // enlever les p car je veux avoir un h2
            $faq_general_title = str_replace('<strong>', '<strong class="underline">', $faq_general_title) //ajoute la classe "underline à la balise ?>
            <?= $faq_general_title ?>
        </h2>


        <!--Boucle sur le repeater "faq_général" pour afficher les questions et réponses-->
        <?php
        if (have_rows('faq_general')): ?>
            <ul class="faq_general_list">
                <?php while (have_rows('faq_general')): the_row();

                    // Récupère les sous-champs
                    $question = get_sub_field('question_general');
                    $answer = get_sub_field('answer_general');

                    if ($question && $answer): ?>
                        <li>
                            <p class="general_question"><?php echo esc_html($question); ?></p>
                        </li>
                        <li>
                            <p class="general_answer"><?php echo esc_html($answer); ?></p>
                        </li>
                    <?php endif;
                endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Aucune question trouvée.</p>
        <?php endif; ?>
    </section>
<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p>La page est vide.</p>
<?php endif; ?>

<?php get_footer(); ?>




<?php /*= get_field('faq_general_title');*/?><!--
<?php /*= get_field('faq_family_title');*/?>

<?php /*= get_field('answer_family')*/?>

<?php /*$answers = get_field('faq_family');*/?>
<?php /*$questions = get_field('faq_general');*/?>
<?php /*foreach ($questions as $question)*/?>
        <?php /*= get_field($question);*/?>
<?php /*foreach ($answers as $answer)*/?>

--><?php /*= get_field($answer);*/?>
