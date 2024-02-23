<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



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
        wp_enqueue_script('modale-script', get_stylesheet_directory_uri() . '/javascript/modalemenu.js', array('jquery'), '1.0', true);
        // appel de la modale du menu:
        wp_enqueue_script('modale-menu', get_stylesheet_directory_uri() . '/javascript/modale.js', array('jquery'), '1.0', true);

        // appel de la page du menu burger:
        wp_enqueue_script('menu-burger-script', get_stylesheet_directory_uri() . '/javascript/menuBurger.js', array('jquery'), '1.0', true);
        // appel de la navigation
        wp_enqueue_script('navigation-script', get_stylesheet_directory_uri() . '/javascript/nav-photo.js', array('jquery'), '1.0', true);
        // appel de la navigation de la section "vous aimerez aussi"
        // wp_enqueue_script('section-vous-script', get_stylesheet_directory_uri() . '/javascript/vousaimerez.js', array('jquery'), '1.0', true);
        // Aappel de la modale photo
        wp_enqueue_script('modalePhoto-script', get_stylesheet_directory_uri() . '/javascript/modalePhoto.js', array('jquery'), '1.0', true);
        // appel des filtres
        wp_enqueue_script('filtres-script', get_stylesheet_directory_uri() . '/javascript/Filtres.js', array('jquery'), '1.0', true);
            // Bibliotheque Select2 pour les selects de tri
    wp_enqueue_script('select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true);
    wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array());
        // appel des hoover des filtres
        // wp_enqueue_script('filtres-custom-script', get_stylesheet_directory_uri() . '/javascript/CustomJS.js', array('jquery'), '1.0', true);

    //     // Appel de l'ajax-js du bouton charger plus
    // wp_enqueue_script('load-more-photos', get_template_directory_uri() . '/javascript/load-more-photos.js', array('jquery'), null, true);

    // Passer des paramètres AJAX à votre script
    wp_localize_script('load-more-photos', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'script_JS_Custo');

// section de photo la page single
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

    // section de la header bar
function get_random_photo_url() {
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $photo_url = get_field('photo');
        wp_reset_postdata();
        return $photo_url;
    }

    // En cas d'erreur, renvoyer une image de remplacement par défaut
    return get_template_directory_uri() . '/image/imagewebp/nathalie-4.webp';
}

// Gestionnaire d'action pour récupérer les informations de la miniature via Ajax, navigation sur la single
add_action('wp_ajax_get_thumbnail_info', 'get_thumbnail_info');
add_action('wp_ajax_nopriv_get_thumbnail_info', 'get_thumbnail_info');

function get_thumbnail_info() {
    $page_id = $_POST['page_id'];
    $thumbnail_url = get_field('photo_thumbnail', $page_id);
    $thumbnail_alt = get_post_meta($page_id, '_wp_attachment_image_alt', true);

    if ($thumbnail_url) {
        wp_send_json_success(array('thumbnail_url' => $thumbnail_url, 'thumbnail_alt' => $thumbnail_alt));
    } else {
        wp_send_json_error('Erreur lors de la récupération des informations de la miniature.');
    }
}

//ajout des fonctionnalitées pour les filtres

function filter_photos_function(){

    $filter = $_POST['filter'];

    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
        )
    );

    // Ajoute chaque filtre a la tax query si elle est definie
    if(!empty($filter['categorie'])){
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $filter['categorie'],
        );
    }

    if(!empty($filter['format'])){
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $filter['format'],
        );
    }

    if(!empty($filter['annees'])){
        $args['tax_query'][] = array(
            'taxonomy' => 'annees',
            'field'    => 'slug',
            'terms'    => $filter['annees'],
        );
    }

    $query = new WP_Query($args);

    if($query->have_posts()){
        while($query->have_posts()){
            $query->the_post();

            get_template_part('template-parts/photo_block', null);
        }
        wp_reset_postdata();
    } else {
        echo '<p class="critereFiltrage">Aucune photo ne correspond aux criteres de filtrage</p>';
    }

    die();
}

add_action('wp_ajax_filter_photos', 'filter_photos_function');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos_function');


// ajout de fonctionnalité du bouton charger plus


function enqueue_load_more_photos_script() {
    wp_enqueue_script('ajaxchargeplus', get_template_directory_uri() . '/Javascript/ajaxchargeplus.js', array('jquery'), null, true);

    // Passer des paramètres AJAX à votre script
    wp_localize_script('ajaxchargeplus', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_photos_script');

function load_more_photos() {
    $page = $_POST['page'];
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'orderby'        => 'date',
        'order'          => 'ASC',
        'paged'          => $page,
    );

    error_log(print_r($args, true)); // Log de débogage

    $photo_block = new WP_Query($args);

    if ($photo_block->have_posts()) :
        while ($photo_block->have_posts()) :
            $photo_block->the_post();
            get_template_part('/templates-part/boxphotos');
        endwhile;
        wp_reset_postdata();
    else :
        echo 'Aucune photo trouvée.';
        // Logs de débogage
        error_log(print_r($args, true));
        error_log(print_r($photo_block->get('query'), true));
    endif;
    
    die();
    
    
}   

add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos'); // Pour les utilisateurs non connectés

