<?php

$photoUrl = get_field('photo');
$photo_titre = get_the_title();
$post_url = get_the_permalink();
$reference = get_field('reference');
$categories = get_the_terms(get_the_ID(), 'categories');
$categorie_name = get_the_terms(get_the_ID(), 'categorie')[0]->name;

?>
<div class="photo-gallery-container">
<div class="blockPhotoRelative">
    <!-- Afficher l'image avec son URL et un texte alternatif -->
    <img src="<?php echo esc_url($photoUrl); ?>" alt="<?php the_title_attribute(); ?>">

    <div class="overlay">
        <!-- Afficher le titre de la photo -->
        <h2><?php echo esc_html($photo_titre); ?></h2>

        <!-- Afficher le nom de la catégorie -->
        <h3><?php echo esc_html($categorie_name); ?></h3>

        <!-- Icône pour voir la photo en détail -->
        <div class="eye-icon">
            <a href="<?php echo $post_url; ?>">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>../image/imagewebp/icon_eye.png" alt="voir la photo">
            </a>
        </div>

        <!-- Vérifier si la référence est définie avant d'afficher l'icône fullscreen -->
        <?php if ($reference) : ?>
            <div class="fullscreen-icon" data-full="<?php echo esc_attr($photoUrl); ?>" data-category="<?php echo esc_attr($categorie_name); ?>" data-reference="<?php echo esc_attr($reference); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>../image/imagewebp/fullscreen.png" alt="Icone fullscreen">
            </div>
        <?php else :
            // Affiche un message si aucune photo apparentée n'est trouvée
            echo '<p class="photoNotFound">Pas de photo trouvée.</p>';
        endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>
</div>
