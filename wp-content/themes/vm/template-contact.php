<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>

    <section class="contact">
        <h2 class="form_title section_title">
            <span class="underline back">
                Contactez-nous
            </span>
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
                    <div class="field">
                        <label for="firstname" class="field__label">Prénom</label>
                        <input type="text" name="firstname" id="firstname" class="field__input" placeholder="par exemple: Amandine">
                        <?php if(isset($errors['firstname'])): ?>
                            <p class="field__error"><?= $errors['firstname']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="lastname" class="field__label">Nom</label>
                        <input type="text" name="lastname" id="lastname" class="field__input" placeholder="par exemple: Briol">
                        <?php if(isset($errors['lastname'])): ?>
                            <p class="field__error"><?= $errors['lastname']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="email" class="field__label">Adresse mail</label>
                        <input type="email" name="email" id="email" class="field__input" placeholder="par exemple: amandine@briol.be">
                        <?php if(isset($errors['email'])): ?>
                            <p class="field__error"><?= $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="message" class="field__label">Message</label>
                        <textarea name="message" id="message" class="field__input" placeholder="par exemple:
Bonjour,

Je voudrais bien vous faire un don de vêtements. Quand est-ce que je peux venir les déposer?

Bonne journée

Jenny Drion
"></textarea>
                        <?php if(isset($errors['message'])): ?>
                            <p class="field__error"><?= $errors['message']; ?></p>
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

    <!-- Façon qui marche aussi, mais ≠ customisable
   <section class="contact">
        <div class="contact__left">
            <?php /*= get_the_content();*/?>
        </div>
        <div class="contact__right">
            <?php /*= do_shortcode('[contact-form-7 id="63e1cf9" title="Formulaire page contact"]');*/?>
        </div>
    </section>-->

<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p>La page est vide.</p>
<?php endif; ?>

<div class="location_section">
    <div class="adress_container">
        <h2 class="location_title">
            Le Vieux Moulin
        </h2>

        <p><?= get_field('street'); ?></p>
        <p><?= get_field('town'); ?></p>
        <p><?= get_field('postal_code_municipality'); ?></p>
        <p><?= get_field('phone_number'); ?></p></div>

    <?php
$map_image = get_field('map_image');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
if( $map_image ) {
    echo wp_get_attachment_image( $map_image, $size );
}
 ?>


</div>

<?php get_footer(); ?>








