
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php get_header(); ?>    
<body>
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
if (is_array($categories) && !empty($categories)) {
    $category_name = $categories[0]->name;
    // ... votre code ici ...
} else {
    // Gérez le cas où $categories n'est pas défini ou est vide.
}?>

<div class="banner">
<?php
  $photo_args = array(
      'post_type' => 'photos',
      'posts_per_page' => 1,
      'orderby' => 'rand',
  );
  $photo_query = new WP_Query($photo_args);

  if ($photo_query->have_posts()) {
      while ($photo_query->have_posts()) {
          $photo_query->the_post();
          echo get_the_post_thumbnail(get_the_ID(), 'full'); 
      }
      wp_reset_postdata();
  }
  ?>
</div>
<!-- le logo-titre -->
<div id="logo-image" class="banner-logo">
        <img src="<?php echo esc_url(get_template_directory_uri()) . '/image/imagewebp/titreheader.png'; ?>" alt="logo du titre">
    </div>
<!--section pour les filtres  -->
<?php
// Affichage taxonomies
$taxonomy = [
    'categorie' => 'CATÉGORIES',
    'format' => 'FORMATS',
    'annee' => 'TRIER PAR',
];

foreach ($taxonomy as $taxonomy_slug => $label) {
    $terms = get_terms($taxonomy_slug);
    if ($terms && !is_wp_error($terms)) {

        echo "<select id='$taxonomy_slug' class='custom-select taxonomy-select'>";

        echo "<option value=''>$label</option>";
        foreach ($terms as $term) {
            echo "<option value='$term->slug'>$term->name</option>";
        }
        echo "</select>";
    }
}
?>
<!-- Nouvelle section pour afficher les photos carrées -->
<section class="all-photos">
<div class="all-photo-container">
    <?php
    // Arguments de la requête pour récupérer toutes les photos
    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => 8, // -1 pour récupérer tous les articles
    );
    $query = new WP_Query($args);

    // Vérifie si des photos ont été trouvées
    if ($query->have_posts()) :
        // Boucle à travers les photos
        while ($query->have_posts()) : $query->the_post();
            // Récupération de l'URL de la photo et de la référence
            $photo_url = get_field('photo');
            $reference = get_field('reference');
            $photo_link = esc_url(get_permalink());

            // Conteneur pour chaque photo avec un lien vers la page de la photo
            echo '<a href="' . $photo_link . '" class="all-photo">';
            echo '  <!-- Image de la photo -->';
            echo '  <img src="' . esc_url($photo_url) . '" alt="' . esc_attr(get_the_title()) . '">';
            echo '  <!-- Référence de la photo -->';
            echo '  <p>RÉF. PHOTO: ' . strtoupper($reference) . '</p>';
            echo '</a>';
        endwhile;

        // Réinitialise les données de la requête
        wp_reset_postdata();
    else :
        // Affiche un message si aucune photo n'est trouvée
        echo '<p class="photoNotFound">Aucune photo trouvée sur le site.</p>';
    endif;
    ?>
</div>
</section>

    <button class="load-more-button">Charger plus</button>
</section>




hello tout le monde?!
<?php wp_footer(); ?>
</body>
<?php get_footer(); ?>










