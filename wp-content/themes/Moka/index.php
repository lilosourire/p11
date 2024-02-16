
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php get_header(); ?>    
<body>

  <div class="banner">
  <img src="<?php echo esc_url(get_template_directory_uri()) . '/image/imagewebp/titreheader.png'; ?>" alt="logo du titre">
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










