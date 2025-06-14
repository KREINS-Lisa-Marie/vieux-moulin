<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>
    <section class="contact">
        <h2 class="form_title section_title" aria-level="2" role="heading">
            <?php $form_title = get_field('title_form'); ?>
            <?php $form_title = str_replace(['<p>', '</p>'], '', $form_title);          // enlever les p car je veux avoir un h2
            $form_title = str_replace('<strong>', '<strong class="underline back">', $form_title) //ajoute la classe "underline à la balise ?>
            <?= $form_title ?>
        </h2>

        <?php
        $errors = $_SESSION['contact_form_errors'] ?? [];
        unset($_SESSION['contact_form_errors']);
        $success = $_SESSION['contact_form_success'] ?? false;
        unset($_SESSION['contact_form_success']);

        if($success): ?>
            <div class="contact__success">
                <p><?= $success; ?></p>
            </div>
        <?php else: ?>
            <form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="form">
                <fieldset class="form__fields">
                    <p class="obligations">* Champs obligatoires
                    </p>
                    <div class="field">
                        <label for="firstname" class="field__label">Prénom*</label>
                        <input type="text" name="firstname" id="firstname" class="field__input" placeholder="par exemple: Amandine" aria-required="true">
                        <?php if(isset($errors['firstname'])): ?>
                            <p class="field__error" role="alert"><?= $errors['firstname']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="lastname" class="field__label">Nom*</label>
                        <input type="text" name="lastname" id="lastname" class="field__input" placeholder="par exemple: Briol" aria-required="true">
                        <?php if(isset($errors['lastname'])): ?>
                            <p class="field__error" role="alert"><?= $errors['lastname']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="email" class="field__label">Adresse mail*</label>
                        <input type="email" name="email" id="email" class="field__input" placeholder="par exemple: amandine@briol.be" aria-required="true">
                        <?php if(isset($errors['email'])): ?>
                            <p class="field__error" role="alert"><?= $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="message" class="field__label">Message*</label>
                        <textarea name="message" id="message" class="field__input" placeholder="par exemple:
Bonjour,

Je voudrais bien vous faire un don de vêtements. Quand est-ce que je peux venir les déposer?

Bonne journée,
Jenny Drion
" aria-required="true"></textarea>
                        <?php if(isset($errors['message'])): ?>
                            <p class="field__error" role="alert"><?= $errors['message']; ?></p>
                        <?php endif; ?>
                    </div>
                </fieldset>
                <div class="form__submit">
                    <?php
                    // ce champ "hidden" permet à WP d'identifier la requête et de la transmettre à notre fonction définie dans functions.php via "add_action('admin_post_[nom-action]')"
                    ?>
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <button type="submit" class="btn">Envoyer</button>
                </div>
            </form>
        <?php endif; ?>
    </section>

<div class="location_section">
    <div class="adress_container" itemprop="address">
        <h2 class="location_title" aria-level="2" role="heading">
            Le Vieux Moulin <span class="sro">coordonnées</span>
        </h2>

        <p><?= get_field('street'); ?></p>
        <p><?= get_field('town'); ?></p>
        <p><?= get_field('postal_code_municipality'); ?></p>
        <p><?= get_field('phone_number'); ?></p></div>

    <?php
$map_image = get_field('map_image');
//$size = 'large'; // (thumbnail, medium, large, full or custom size)
if( $map_image ) {
    //echo wp_get_attachment_image( $map_image, $size );
    echo responsive_image($map_image, ['classes' => 'attachment-large size-large']);
}
 ?>

</div>

<?php get_footer(); ?>








