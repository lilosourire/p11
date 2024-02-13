<?php
add_theme_support( 'title-tag' );
// Ajout des styles personnalisés

function enqueue_custom_styles()
{
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/scss/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
// appel de mes menus
function mota_setup() {
    register_nav_menus(
        array(
            'header-menu' => ('Menu En-tête'),
            'footer-menu' => ('Menu Pied-de-page'),
        )
    );
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'mota_setup');

// appel des différents éléments en js:
    function script_JS_Custo()
    {
        // appel de la page de la modale:
        wp_enqueue_script('modale-script', get_stylesheet_directory_uri() . '/javascript/modale.js', array('jquery'), '1.0', true);
        // appel de la page du menu burger:
        wp_enqueue_script('menu-burger-script', get_stylesheet_directory_uri() . '/javascript/menuBurger.js', array('jquery'), '1.0', true);
        // appel de la navigation
        wp_enqueue_script('navigation-script', get_stylesheet_directory_uri() . '/javascript/nav-photo.js', array('jquery'), '1.0', true);
        // appel de la navigation de la section "vous aimerez aussi"
        wp_enqueue_script('section-vous-script', get_stylesheet_directory_uri() . '/javascript/vousaimerez.js', array('jquery'), '1.0', true);
        // Aappel de la modale photo
        wp_enqueue_script('modalePhoto-script', get_stylesheet_directory_uri() . '/javascript/modalePhoto.js', array('jquery'), '1.0', true);
    }
    add_action('wp_enqueue_scripts', 'script_JS_Custo');

    function get_related_photos($categories) {
        if ($categories && !is_wp_error($categories)) {
            $category_ids = wp_list_pluck($categories, 'term_id');
            $args = array(
                'post_type' => 'photos',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'post__not_in' => array(get_the_ID()),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'term_id',
                        'terms' => $category_ids,
                    ),
                ),
            );
    
            return new WP_Query($args);
        }
    
        return false;
    }
    