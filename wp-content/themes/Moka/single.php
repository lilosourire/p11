
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
<!-- Structure principale pour afficher la photo et les détails -->
<section class="cataloguePhotos">
    <div class="galleryPhotos">
        <div class="detailPhoto">
            <!-- Affichage de l'image principale -->
            <div class="containerPhoto">
                <img src="<?php echo $photo_url; ?>" alt="<?php the_title_attribute(); ?>">
                <!-- Overlay pour l'effet de survol -->
                <div class="singlePhotoOverlay">
                    <!-- Bouton plein écran avec des données personnalisées pour la popup -->
                    <div class="fullscreen-icon" data-reference="<?php echo esc_attr($reference); ?>" data-full="<?php echo esc_url($photo_url); ?>" data-category="<?php echo esc_attr($category_name); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/fullscreen.svg" alt="Icone fullscreen">
                    </div>
                </div>
            </div>

            <!-- Informations détaillées sur la photo -->
            <div class="selecteurK">
                <h2><?php echo get_the_title(); ?></h2>
                <!-- Affichage des informations sur la photo (Référence, Catégorie, Format, Type, Année) -->
                <div class="taxonomies">
                    <p>RÉFÉRENCE : <span id="single-reference"><?php echo strtoupper($reference) ?></span></p>
                    <p>CATÉGORIE : <?php foreach ($categories as $key => $cat) {$categoryNameSingle = $cat->name; echo strtoupper($categoryNameSingle);}  ?></p>
                    <p>FORMAT : <?php foreach ($formats as $key => $format) {    $formatName = isset($format->name) ? $format->name : '';    echo strtoupper($formatName);} ?></p>
                    <p>TYPE : <?php echo strtoupper($type) ?> </p>
                    <p>ANNÉE : <?php echo $annee ?> </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section de contact et navigation entre les photos -->
    <div class="contenairContact">
        <div class="contact">
            <!-- Bouton pour ouvrir la popup de contact -->
            <button id="boutonContact" data-reference="<?php echo esc_attr($reference); ?>">Contact</button>
        </div>
        <div class="naviguationPhotos">
            <!-- Conteneur pour la navigation entre les photos -->
            <div class="miniPicture" id="miniPicture">
                <!-- Les miniatures seront chargées dynamiquement par JavaScript -->
            </div>
            <!-- Flèches de navigation entre les photos -->
            <div class="naviguationArrow">
                <!-- Flèche gauche pour la photo précédente -->
                <?php if (!empty($previousPost)) : ?>
                    <img class="arrow arrow-left" src="<?php echo get_theme_file_uri() . '/assets/images/left.png'; ?>" alt="Photo précédente" data-thumbnail-url="<?php echo $previousThumbnailURL; ?>" data-target-url="<?php echo esc_url(get_permalink($previousPost->ID)); ?>">
                <?php endif; ?>
                <!-- Flèche droite pour la photo suivante -->
                <?php if (!empty($nextPost)) : ?>
                    <img class="arrow arrow-right" src="<?php echo get_theme_file_uri() . '/assets/images/right.png'; ?>" alt="Photo suivante" data-thumbnail-url="<?php echo $nextThumbnailURL; ?>" data-target-url="<?php echo esc_url(get_permalink($nextPost->ID)); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section pour afficher des photos similaires -->
<!-- <section>
    <div class="titreVousAimerezAussi">
        <h3>VOUS AIMEREZ AUSSI</h3>
    </div>

    <div class="PhotoSimilaire">
        <?php
        // Requête pour obtenir des photos similaires
        // $related_photos = get_related_photos();
        // if ($related_photos->have_posts()) {
        //     while ($related_photos->have_posts()) {
        //         $related_photos->the_post();
        //         get_template_part('template-parts/photo_block');
        //     }
            // Réinitialisation des données de la requête principale
            // wp_reset_postdata();
        // } else {
            // Aucune photo similaire trouvée
        //     echo "<p class='photoNotFound'> Pas de photo similaire trouvée pour la catégorie ''" . $category_name . "'' </p>";
        // }
        // ?>
    </div>

    <!-- Bouton pour afficher toutes les photos -->
    <!-- <button id="toutesLesPhotos" class="bouton">
        <a href="<?php echo home_url(); ?>#containerPhoto">Toutes les photos</a>
    </button>
</section>  -->

<?php get_footer(); ?>
