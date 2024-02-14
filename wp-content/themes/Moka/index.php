
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php get_header(); ?>    
<!-- //section hero header image + titre -->
<body>


<section class="hero" style="background-image: url('<?php echo get_random_photo_url(); ?>');">
    <div class="titre-hero"> 
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/imagewebp/titreheader.png" alt="logo du titre">
    </div>
</section>



hello tout le monde?!
<?php wp_footer(); ?>
</body>
<?php get_footer(); ?>










