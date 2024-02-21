
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
<!-- <!-- Section pour afficher des photos similaires -->
<?php get_template_part('templates-part/boxphotos'); ?> 
<div id="blockPlusImage">
    <div id="imagesContainer">
        <!-- Conteneur pour afficher les images -->
    </div>
    <button id="plusDImage" data-page="1">Charger plus</button>
</div>




<?php wp_footer(); ?>
</body>
<?php get_footer(); ?>










