
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
// taxonomy
$annee = get_the_terms(get_the_ID(), 'annee');
$categories = get_the_terms(get_the_ID(), 'categorie');
$formats = get_the_terms(get_the_ID(), 'format');
// /création du tableau des categories
$category_name = $categories[0]->name;
// mise en place des posts précédents et suivant pour la navigation entre les photos
// Définissez les URLs des vignettes pour le post précédent et suivant
$nextPost = get_next_post();
$previousPost = get_previous_post();
$previousThumbnailURL = $previousPost ? get_the_post_thumbnail_url($previousPost->ID, 'thumbnail') : '';
$nextThumbnailURL = $nextPost ? get_the_post_thumbnail_url($nextPost->ID, 'thumbnail') : '';
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
      <p>ANNÉE : <?php echo isset($annee[0]->name) ? strtoupper($annee[0]->name) : ''; ?> </p>

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
            <img src="<?php echo get_template_directory_uri() . '/image/imagewebp/fullscreen.png'; ?>" alt="Icone fullscreen">
            </div>
            
            <!-- Icône du centre de l'overlay -->
            <div class="center-icon">
            <img src="<?php echo get_template_directory_uri() . '/image/imagewebp/icon_eye.png'; ?>" alt="Icone oeil">

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

    <!-- // Récupération des posts précédent et suivant -->
    <div class="naviguationPhotos">
<!-- Conteneur pour la miniature -->
        <div class="miniPicture" id="miniPicture">
  <!-- La miniature sera chargée ici par JavaScript -->
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





<!-- </section> -->

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
                // Boucle à travers les photos apparentées
                while ($query->have_posts()) : 
                  $query->the_post();
                  $photo_url = get_field('photo');
                  $reference = get_field('reference');
                  get_template_part('/templates-part/boxphotos');
                endwhile;  
                // Vérifie si des photos apparentées ont été trouvées
                if (!$query->have_posts()) :
                  echo '<p class="photoNotFound">Pas de photo trouvée.</p>';
                endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>
<?php get_footer(); ?>