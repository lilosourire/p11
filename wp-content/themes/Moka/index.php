
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php get_header(); ?>    
<body>
  <?php
  // Récupérer les images depuis le champ ACF 'photo'
  $photos = get_field('photo');

  // Vérifier si des images existent
  if ($photos) {
    // Sélectionner une image aléatoire
    $random_index = array_rand($photos);
    $random_photo = $photos[$random_index];

    // Utiliser l'URL de l'image aléatoire comme fond d'écran
    ?>
    <section class="hero" style="background-image: url('<?php echo esc_url($random_photo['url']); ?>');">
      <div class="titre-hero">
        <img src="<?php echo esc_url(get_template_directory_uri()) . '/image/imagewebp/titreheader.png'; ?>" alt="logo du titre">
      </div>
    </section>
    <?php
  }
  ?>
<!-- Nouvelle section pour afficher les photos carrées -->
<section class="square-photos">
    <div class="square-photo-container">
        <!-- Les photos carrées seront ajoutées ici dynamiquement -->
    </div>
    <button class="load-more-button">Charger plus</button>
</section>




hello tout le monde?!
<?php wp_footer(); ?>
</body>
<?php get_footer(); ?>










