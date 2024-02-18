<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Déclaration de l'encodage et de la vue initiale -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Titre de la page -->
  <title> Site NATHALIE MOTA</title>
  <!-- bibliothèque jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Inclusion des scripts et des styles de WordPress -->
  <?php wp_head()?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="logo-nav">
        <div class="logo">
            <?php the_custom_logo(); ?>
        </div>

        <div class="menu-container">
        <div class="menu">
            <?php
            if (has_nav_menu('header-menu')):
            ?>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'header-menu',
                        'menu_class' => 'my-header-menu',
                    )
                );
         endif; ?>
        </div>
    </div>
</header>