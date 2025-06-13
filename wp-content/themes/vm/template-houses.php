<?php /* Template Name: Page "Houses" */ ?>

<?php get_header(); ?>

<div class="houses_links">

    <a href="#vm_content" title="Aller vers la maison 'Vieux Moulin'" class="link_to_page link">Vieux Moulin
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
        </svg>
    </a>

    <a href="#e_content" title="Aller vers la maison 'Edelweiss'" class="link_to_page link">Edelweiss
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z" fill="#F19595"/>
        </svg>
    </a>
</div>


<div class="vieux-moulin_container" id="vm_content">
    <h2 class="sro" aria-level="2" role="heading">
        Maison Vieux Moulin
    </h2>

    <section class="houses_vm_introduction_container img_title_text">
        <div class="text_content">
            <h3 class="section_title" aria-level="3" role="heading">
                <?php $houses_vm_title = get_field('title_vieux_moulin'); ?>
                <?php $houses_vm_title = str_replace(['<p>', '</p>'], '', $houses_vm_title);          // enlever les p car je veux avoir un h2
                $houses_vm_title = str_replace('<strong>', '<strong class="underline">', $houses_vm_title) //ajoute la classe "underline à la balise ?>
                <?= $houses_vm_title ?>
            </h3>
            <?= get_field('text_vieux_moulin'); ?></div>

        <div class="image_vm" itemprop="image">
            <?php
            $vm_image = get_field('image_vm');
            //$size = 'section_image'; // (thumbnail, medium, large, full or custom size)
            if ($vm_image):?>
                <figure>
                   <!-- --><?php /*= wp_get_attachment_image($vm_image, $size);;*/?>
                    <?= responsive_image(get_field('image_vm'), ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
                </figure>
<?php endif;?>
            
            <?php
/* /*                      $vm_image = get_field('image_vm');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        if ($vm_image) {
                            echo
                            responsive_image($vm_image, ['classes' => 'gallery__img']);
                        }
            var_dump(wp_get_attachment_image_srcset($vm_image, 'large'));*/
            $vm_image = get_field('image_vm');
   /*         echo wp_get_attachment_image($vm_image, 'large', false, [
                'class' => 'responsive-img',
                'sizes' => '(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 594px'
            ]);*/
            /*wp_get_attachment_image(get_field('image_vm'), 'news', attr: ['class' => 'actu__img']);
            */?><!--
            <figure class="actu__fig-one">
                <?php /*= wp_get_attachment_image(get_field('image_vm'), 'news', attr: ['class' => 'actu__img']); */?>
            </figure>
-->
        </div>
    </section>

    <section class="houses_vm_team_container img_title_text">
        <div class="text_content">
            <h3 class="section_title" aria-level="3" role="heading">
                <?php $houses_vm_team_title = get_field('team_title_vm'); ?>
                <?php $houses_vm_team_title = str_replace(['<p>', '</p>'], '', $houses_vm_team_title);          // enlever les p car je veux avoir un h2
                $houses_vm_team_title = str_replace('<strong>', '<strong class="underline">', $houses_vm_team_title) //ajoute la classe "underline à la balise ?>
                <?= $houses_vm_team_title ?>
            </h3>
            <?= get_field('text_team_vieux_moulin'); ?></div>

        <div class="image_vm">
            <?php
            $team_vm_image = get_field('image_team_vm');
            //$size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($team_vm_image) {
                //echo wp_get_attachment_image($team_vm_image, $size);
                echo responsive_image($team_vm_image, ['classes' => 'attachment-large size-large']);
            }
            ?>
        </div>
    </section>


    <section class="houses_vm_gallery_container title_gallery">
        <h3 class="section_title title_middle" aria-level="3" role="heading">
            <?php $houses_vm_gallery_title = get_field('title_gallery_vm'); ?>
            <?php $houses_vm_gallery_title = str_replace(['<p>', '</p>'], '', $houses_vm_gallery_title);          // enlever les p car je veux avoir un h2
            $houses_vm_gallery_title = str_replace('<strong>', '<strong class="underline back">', $houses_vm_gallery_title) //ajoute la classe "underline à la balise ?>
            <?= $houses_vm_gallery_title ?>

        </h3>

        <div class="houses_vm_gallery" itemprop="image">
            <?php $images = get_field('vieux_moulin_gallery'); ?>
            <?php if (!empty($images)): foreach ($images as $image): ?>
                <?= responsive_image($image, ['classes' => 'houses_vm_gallery__img']) ?>
            <?php endforeach; else: ?>
            <?php endif; ?>
        </div>

        <h3 class="section_title title_middle" aria-level="3" role="heading">
            <?php $houses_vm_adress_title = get_field('title_adress_vm'); ?>
            <?php $houses_vm_adress_title = str_replace(['<p>', '</p>'], '', $houses_vm_adress_title);          // enlever les p car je veux avoir un h2
            $houses_vm_adress_title = str_replace('<strong>', '<strong class="underline back">', $houses_vm_adress_title) //ajoute la classe "underline à la balise ?>
            <?= $houses_vm_adress_title ?>
        </h3>
        <div class="vm_adress title_middle">
            <p><?= get_field('street_vm'); ?></p>
            <p><?= get_field('locality_vm'); ?></p>
            <p><?= get_field('municipality_vm'); ?></p>
            <p><?= get_field('tel_vm'); ?></p>
        </div>
    </section>
</div>


<div class="edelweiss_container" id="e_content">
    <h2 class="sro" aria-level="2" role="heading">
        Maison Edelweiss
    </h2>

    <section class="houses_e_introduction_container img_title_text">
        <div class="text_content">
            <h3 class="section_title" aria-level="3" role="heading">
                <?php $houses_e_title = get_field('title_edelweiss'); ?>
                <?php $houses_e_title = str_replace(['<p>', '</p>'], '', $houses_e_title);          // enlever les p car je veux avoir un h2
                $houses_e_title = str_replace('<strong>', '<strong class="underline">', $houses_e_title) //ajoute la classe "underline à la balise ?>
                <?= $houses_e_title ?>
            </h3>
            <?= get_field('text_edelweiss'); ?></div>

        <div class="image_e">
            <?php
            $e_image = get_field('image_e');
            //$e_size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($e_image) {
                //echo wp_get_attachment_image($e_image, $e_size);
                echo responsive_image($e_image, ['classes' => 'attachment-large size-large']);
            }
            ?>
        </div>
    </section>

    <section class="houses_e_team_container img_title_text">
        <div class="text_content">
            <h3 class="section_title" aria-level="3" role="heading">
                <?php $houses_e_team_title = get_field('team_title_e'); ?>
                <?php $houses_e_team_title = str_replace(['<p>', '</p>'], '', $houses_e_team_title);          // enlever les p car je veux avoir un h2
                $houses_e_team_title = str_replace('<strong>', '<strong class="underline">', $houses_e_team_title) //ajoute la classe "underline à la balise ?>
                <?= $houses_e_team_title ?>
            </h3>
            <?= get_field('text_team_edelweiss'); ?></div>

        <div class="image_e">
            <?php
            $team_e_image = get_field('image_team_e');
            //$size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($team_e_image) {
                //echo wp_get_attachment_image($team_e_image, $size);
                echo responsive_image($team_e_image, ['classes' => 'attachment-large size-large']);
            }
            ?>
        </div>
    </section>


    <section class="houses_e_gallery_container title_gallery">
        <h3 class="section_title title_middle" aria-level="3" role="heading">
            <?php $houses_e_gallery_title = get_field('title_gallery_e'); ?>
            <?php $houses_e_gallery_title = str_replace(['<p>', '</p>'], '', $houses_e_gallery_title);          // enlever les p car je veux avoir un h2
            $houses_e_gallery_title = str_replace('<strong>', '<strong class="underline back">', $houses_e_gallery_title) //ajoute la classe "underline à la balise ?>
            <?= $houses_e_gallery_title ?>
        </h3>

        <div class="houses_e_gallery">
            <?php $images = get_field('edelweiss_gallery'); ?>
            <?php if (!empty($images)): foreach ($images as $image): ?>
                <?= responsive_image($image, ['classes' => 'houses_e_gallery__img']) ?>
            <?php endforeach; else: ?>
            <?php endif; ?>
        </div>

        <h3 class="section_title title_middle" aria-level="3" role="heading">
            <?php $houses_e_adress_title = get_field('title_adress_e'); ?>
            <?php $houses_e_adress_title = str_replace(['<p>', '</p>'], '', $houses_e_adress_title);          // enlever les p car je veux avoir un h2
            $houses_e_adress_title = str_replace('<strong>', '<strong class="underline back">', $houses_e_adress_title) //ajoute la classe "underline à la balise ?>
            <?= $houses_e_adress_title ?>
        </h3>
        <div class="vm_adress title_middle" id="projects">
            <p><?= get_field('street_e'); ?></p>
            <p><?= get_field('locality_e'); ?></p>
            <p><?= get_field('municipality_e'); ?></p>
            <p><?= get_field('tel_e'); ?></p>
        </div>
    </section>
</div>
<div class="projects_container" >
    <h2 class="section_title title_middle" aria-level="2" role="heading">

        <?php $houses_projects_title = get_field('title_projects'); ?>
        <?php $houses_projects_title = str_replace(['<p>', '</p>'], '', $houses_projects_title);          // enlever les p car je veux avoir un h2
        $houses_projects_title = str_replace('<strong>', '<strong class="underline">', $houses_projects_title) //ajoute la classe "underline à la balise ?>
        <?= $houses_projects_title ?>
    </h2>


    <!--Boucle sur le repeater "projets" pour afficher les différents projets-->
    <?php
    if (have_rows('projects')): ?>
        <section class="houses_project_container">
            <?php while (have_rows('projects')): the_row();

                // Récupère les sous-champs
                $p_image = get_sub_field('image_project');
                $p_title = get_sub_field('project_title');
                $p_text = get_sub_field('project_text');


                if ($p_image && $p_title && $p_text): ?>
                <div class="single_project img_title_text">


                    <div class="text_content">
                        <h3 class="project_title" aria-level="3" role="heading">
                            <?= $p_title ?>
                        </h3>
                        <?= $p_text ?>
                    </div>
                    <div class="project_image">
                        <?php
                        //$size = 'full'; // (thumbnail, medium, large, full or custom size)
                        if ($p_image) {
                            //echo wp_get_attachment_image($p_image, $size);
                            echo responsive_image($p_image, ['classes' => 'attachment-large size-large']);
                        }
                        ?>
                    </div>
                </div>
                    <!--<li>
                    <p class="family_question"><?php /*echo esc_html($question); */ ?></p>
                </li>
                <li>
                    <p class="family_answer"><?php /*echo esc_html($answer); */ ?></p>
                </li>-->
                <?php endif;
            endwhile; ?>
        </section>
    <?php else: ?>
        <p>Aucun projet.</p>
    <?php endif; ?>
</div>


<section class="donations_container img_title_text">
    <h2 class="section_title" aria-level="2" role="heading">

        <?php $houses_donations_title = get_field('donations_title'); ?>
        <?php $houses_donations_title = str_replace(['<p>', '</p>'], '', $houses_donations_title);          // enlever les p car je veux avoir un h2
        $houses_donations_title = str_replace('<strong>', '<strong class="underline back">', $houses_donations_title) //ajoute la classe "underline à la balise ?>
        <?= $houses_donations_title ?>
    </h2>
    <h3 class="donations_subtitle subtitle" aria-level="3">
        <?= get_field('subtitle_donations'); ?>
    </h3>
    <div class="donations_text">
        <?= get_field('donations_text'); ?>
    </div>
    <div class="donations_subline">
        <?= get_field('subline'); ?>
    </div>
    <a href="<?= get_field('link_houses_to_contact');?>" title="Aller vers la page 'Contact'" class="link_to_page link link_to_donation_contact">Dites nous comment
        <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow">
            <path d="M12.1638 4.35355C12.3591 4.15829 12.3591 3.84171 12.1638 3.64645L8.98185 0.464467C8.78659 0.269204 8.47001 0.269204 8.27475 0.464467C8.07948 0.659729 8.07948 0.976311 8.27475 1.17157L11.1032 4L8.27475 6.82843C8.07948 7.02369 8.07948 7.34027 8.27475 7.53553C8.47001 7.7308 8.78659 7.7308 8.98185 7.53553L12.1638 4.35355ZM0.853516 4L0.853516 4.5L11.8103 4.5L11.8103 4L11.8103 3.5L0.853516 3.5L0.853516 4Z"
                  fill="#F19595"/>
        </svg>
    </a>

    <div class="qr_code qr_image">
        <?php
        $qr_code_image = get_field('image_qr_code');
        //$size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($qr_code_image) {
            //echo wp_get_attachment_image($qr_code_image, $size);
            echo responsive_image($qr_code_image, ['classes' => 'attachment-large size-large']);
        }
        ?>
    </div>
</section>







<?php get_footer(); ?>
