
/*
Template Name: Single Photo
*/
<?php get_header(); ?>



<?php get_footer(); ?>
<!-- déclaration des variables pour la récupération des éléments dans ACF + les éléments des taxonomies -->
<?php
$photo_url = get_field('photo');
$reference = get_field('reference');
$type = get_field('type');
$year = get_field('annee');
$categories = get_the_terms(get_the_ID(), 'categorie');
$formats = get_the_terms(get_the_ID(), 'format');
// /création du tableau des categories
$category_name = $categories[0]->name;
?>
