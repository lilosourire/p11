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

// Ajout du support pour les miniatures (post-thumbnails)
// function theme_support_post_thumbnails()
// {
//     add_theme_support('post-thumbnails');
// }
// add_action('after_setup_theme', 'theme_support_post_thumbnails');


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
        wp_enqueue_script('section-vous-script', get_stylesheet_directory_uri() . '/javascript/vousaimerez.js', array('jquery'), '1.0', true);
        // Aappel de la modale photo
        wp_enqueue_script('modalePhoto-script', get_stylesheet_directory_uri() . '/javascript/modalePhoto.js', array('jquery'), '1.0', true);
        // appel de la section photo de l'index.php
        wp_enqueue_script('section-index-script', get_stylesheet_directory_uri() . '/javascript/sectionphotoindex.js', array('jquery'), '1.0', true);

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
    // création de la function get_random_photo qui récupère une image aléatoire 

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




// navigation

// Ajouter la prise en charge d'Ajax
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
wp_enqueue_script('jquery'); // Assurez-vous que jQuery est chargé
wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'), '1.0', true);
wp_localize_script('custom-scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));


function theme_enqueue_scripts() {
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

// Gestionnaire d'action pour récupérer les informations de la miniature via Ajax
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

