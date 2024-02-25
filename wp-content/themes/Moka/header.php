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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-hTyRptQ+KmUugz9jMjz5+Ux//k+9OZJ1kOhGaLQIFf2LG/Mb2MWRg+dVl4+MNNEE8aDjn7iwzQeLbu1ys2f4dA==" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha512-XNm12mca9SHH6R1r9UJ+BPLB4zoogQGGO8BZ7qGq1VUCIP5fGmYTVZBq3RE4Ctawld9O1hXf/cZqkx53YeRfCQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-GhyXXcxcWi9r+l5As+Kab09C66u9fCp5J3AMtff6AdbxrJ/xHeK2J6eVNcXt6fQ8Blk2c2GCnftwYkS1XyfTbA==" crossorigin="anonymous"></script>

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