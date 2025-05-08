<?php /* Template Name: Page "FAQ" */ ?>

<?php get_header(); ?>


<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>


    <!--TITRE du FAQ FAMILLE-->
<h2 class="section_title">
    <?= get_field('faq_family_title');?>
</h2>


<!--Boucle sur le repeater "faq_famille" pour afficher les questions et réponses-->
    <?php
    if( have_rows('faq_family') ): ?>
            <ul class="faq_family_list">
            <?php while( have_rows('faq_family') ): the_row();

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
    <a href="<?php the_field('link_faq_to_page'); ?>" title="Aller vers la page 'La vie au foyer'" class="link_to_page">Comment se passe la vie ches nous?</a>


<!--TITRE du FAQ GENERAl-->
<h2 class="section_title">
    <?= get_field('faq_general_title');?>
</h2>


    <!--Boucle sur le repeater "faq_général" pour afficher les questions et réponses-->
    <?php
    if( have_rows('faq_general') ): ?>
        <ul class="faq_general_list">
            <?php while( have_rows('faq_general') ): the_row();

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
