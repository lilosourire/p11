
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php get_header(); ?>    
<body>
  <!-- //section hero header image + titre -->
<section class="hero" style="background-image: url('<?php echo get_random_photo_url(); ?>');">
    <div class="titre-hero"> 
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/imagewebp/titreheader.png" alt="logo du titre">
    </div>
</section>
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










