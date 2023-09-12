<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'twenty-twenty-one-style','twenty-twenty-one-style','twenty-twenty-one-print-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

//Enregistrer un menu, son nom, ce qu'il affiche
if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
	function mytheme_register_nav_menu(){
		register_nav_menus( array(
	    	'header' => __( 'Header', 'text_domain' ),
	    	'footer2'  => __( 'Footer2', 'text_domain' ),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}



// Hook : ajouter menu admin
function ajouter_menu_admin( $items, $args ) {
    // si l'utilisateur est connecté et si je suis sur le menu header
    if ( is_user_logged_in() && $args->theme_location == 'header' ) {
        // Ajoutez menu "Admin"
        $items .= '<li class="adminmenu"><a href="' . admin_url() . '">Admin</a></li>';
    }
    return $items;
}

// Ajoutez le filtre pour le hook wp_nav_menu_items
add_filter( 'wp_nav_menu_items', 'ajouter_menu_admin', 10, 2 );


// supression des P inutiles de Contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');