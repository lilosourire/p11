<!-- La div principale qui couvre toute la page et sert de fond obscurci -->
<div class="popup-overlay">
    <!-- La div interne qui contient le contenu de la modale -->
    <div class="popup-contact">
        <!-- Appel de l'image du formulaire de contact  -->
        <img id="image-modale" src="<?php echo get_template_directory_uri(  ) . '/image/imagewebp/Contact-header'; ?>" alt="bandeau contact">
        
        <!-- Appel au formulaire de contact via l'extension Contact Form 7 avec l'ID du formulaire -->
        <?php
        echo do_shortcode('[contact-form-7 id="57026e4" title="contactez-nous"]');
        ?>
    </div>
</div>