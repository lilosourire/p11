
<!-- /**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */ -->

<?php

get_header();
?>

<!-- déclaration des variables pour la récupération des éléments dans ACF + les éléments des taxonomies -->
<?php
$photo_url = get_field('photo');
$reference = get_field('reference');
$type = get_field('type');
$annee = get_field('annee');
$categories = get_the_terms(get_the_ID(), 'categorie');
$formats = get_the_terms(get_the_ID(), 'format');
// /création du tableau des categories
$category_name = $categories[0]->name;
?>
<section class="cataloguePhotos">
  <div class="infos">
    <h2><?php echo get_the_title(); ?></h2>
    <!-- Affichage des informations sur la photo (Référence, Catégorie, Format, Type, Année) -->
    <div class="taxonomies">
      <p>RÉFÉRENCE : <span id="single-reference"><?php echo strtoupper($reference) ?></span></p>
      <p>CATÉGORIE : <?php foreach ($categories as $key => $cat) { $categoryNameSingle = $cat->name; echo strtoupper($categoryNameSingle); } ?></p>
      <p>FORMAT : <?php foreach ($formats as $key => $format) { $formatName = isset($format->name) ? $format->name : ''; echo strtoupper($formatName); } ?></p>
      <p>TYPE : <?php echo strtoupper($type) ?> </p>
      <p>ANNÉE : <?php echo $annee ?> </p>
    </div>
  </div>

  <!-- Container pour l'image principale -->
  <div class="detailPhoto">
    <div class="containerPhoto">
        <!-- Affichage de l'image principale -->
        <img src="<?php echo $photo_url; ?>" alt="<?php the_title_attribute(); ?>">
        
        <!-- Overlay pour l'effet de survol -->
        <div class="singlePhotoOverlay">
            <!-- Bouton plein écran en haut à droite -->
            <div class="fullscreen-icon" data-reference="<?php echo esc_attr($reference); ?>" data-full="<?php echo esc_url($photo_url); ?>" data-category="<?php echo esc_attr($category_name); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/imagewebp/fullscreen.png" alt="Icone fullscreen">
            </div>
            
            <!-- Icône du centre de l'overlay -->
            <div class="center-icon">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/imagewebp/icon_eye.png" alt="Icone oeil">

            </div>
        </div>
    </div>
    <!-- Conteneur pour la modal plein écran -->
<div class="fullscreen-modal">
  <!-- Contenu de la modal (image) -->
  <div class="fullscreen-content">
    <img src="" alt="Image en plein écran">
  </div>
</div>

</div>

</section>


<!-- Section pour le bouton de contact -->
<section class="contenairContact">
  <div class="contactContent">
    <p>Cette photo vous intéresse?</p>
    <button id="contact-modale" data-reference="<?php echo $reference; ?>">Contact</button>
  </div>
</section>


    <!-- Section de contact et navigation entre les photos -->

<!-- Conteneur pour la navigation entre les photos -->
<div class="naviguationPhotos">
    <!-- Miniatures des photos (chargées dynamiquement par JavaScript) -->
    <div class="miniPicture" id="miniPicture">
        <!-- Les miniatures seront chargées dynamiquement par JavaScript -->
    </div>


<!-- Flèches de navigation entre les photos -->
<div class="naviguationArrow">
    <?php if (!empty($previousPost)) : ?>
        <img class="arrow arrow-left" src="<?php echo get_theme_file_uri() . '/image/imagewebp/gauche.png'; ?>" alt="Photo précédente" data-target-url="<?php echo esc_url(get_permalink($previousPost->ID)); ?>">
    <?php endif; ?>

    <?php if (!empty($nextPost)) : ?>
        <img class="arrow arrow-right" src="<?php echo get_theme_file_uri() . '/image/imagewebp/droite.png'; ?>" alt="Photo suivante" data-target-url="<?php echo esc_url(get_permalink($nextPost->ID)); ?>">
    <?php endif; ?>
</div>
<div class="naviguationArrow">
                <?php if (!empty($previousPost)) : ?>
                    <img class="arrow arrow-left" src="<?php echo get_theme_file_uri() . '/image/imagewebp/gauche.png'; ?>" alt="Photo précédente" data-thumbnail-url="<?php echo $previousThumbnailURL; ?>" data-target-url="<?php echo esc_url(get_permalink($previousPost->ID)); ?>">
                <?php endif; ?>

                <?php if (!empty($nextPost)) : ?>
                    <img class="arrow arrow-right" src="<?php echo get_theme_file_uri() . '/image/imagewebp/droite.png'; ?>" alt="Photo suivante" data-thumbnail-url="<?php echo $nextThumbnailURL; ?>" data-target-url="<?php echo esc_url(get_permalink($nextPost->ID)); ?>">
                <?php endif; ?>
            </div>
 
</div>

</section>

 <!-- Section pour afficher des photos similaires -->
 <section>
    <div class="titreVousAimerezAussi">
        <h3>VOUS AIMEREZ AUSSI</h3>
    </div>
    <section class="related-photos">
    <div class="related-photo-container">
        <?php
        // Récupération des catégories de la photo principale
        $categories = get_the_terms(get_the_ID(), 'categorie');

        // Arguments de la requête pour récupérer les photos apparentées
        $args = array(
            'post_type' => 'photos',
            'posts_per_page' => 2, // Vous pouvez ajuster le nombre de photos à afficher
            'post__not_in' => array(get_the_ID()),
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'id',
                    'terms' => $categories ? wp_list_pluck($categories, 'term_id') : array(),
                ),
            ),
        );
        $query = new WP_Query($args);

        // Vérifie si des photos apparentées ont été trouvées
        if ($query->have_posts()) :
            // Boucle à travers les photos apparentées
            while ($query->have_posts()) : $query->the_post();
            // Récupération de l'URL de la photo et de la référence
            $photo_url = get_field('photo');
            $reference = get_field('reference');
            $photo_link = esc_url(get_permalink());
        
            // Conteneur pour chaque photo apparentée avec un lien vers la page de la photo
            echo '<a href="' . $photo_link . '" class="related-photo">';
            echo '  <!-- Image de la photo apparentée -->';
            echo '  <img src="' . esc_url($photo_url) . '" alt="' . esc_attr(get_the_title()) . '">';
            echo '  <!-- Référence de la photo apparentée -->';
            echo '  <p>RÉF. PHOTO: ' . strtoupper($reference) . '</p>';
            echo '</a>';
        endwhile;
        
            // Réinitialise les données de la requête
            wp_reset_postdata();
        else :
            // Affiche un message si aucune photo apparentée n'est trouvée
            echo '<p class="photoNotFound">Pas de photo apparentée trouvée pour la catégorie.</p>';
        endif;
        ?>
    </div>
</section>


<?php get_footer(); ?>
