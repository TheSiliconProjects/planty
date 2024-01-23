<?php 
/** Child theme generated with WPS Child Theme Generator */
            
if ( ! function_exists( 'b7ectg_theme_enqueue_styles' ) ) {            
    add_action( 'wp_enqueue_scripts', 'b7ectg_theme_enqueue_styles' );
    
    function b7ectg_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
    }
}

/** Load css theme customizer */

wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));

/** Hook and hide admin menu for non logged in user
* Not WORKING with WP TwentyTwentyFour. Use built in class logged-in in CSS

* function wpdocs_unset_menu_items( $menu_objects, $args ) {

  *   if ( 'nav_top_menu' !== $args->theme_location ) {
   *     return $menu_objects;
   * }

   * if ( is_user_logged_in() ) {
   *     return $menu_objects;
   * }

   * $menu_items = array(
   *     'Admin',
   *     'Nous rencontrer',
   *     'Commander',
   * );

   * foreach ( $menu_objects as $key => $menu_object ) {
   *   if ( ! in_array( $menu_object->title, $menu_items ) ) {
   *      continue;
   *  }
   *     unset( $menu_objects[ $key ] );
   * }

   * return $menu_objects;
*}
* add_filter( 'wp_nav_menu_objects', 'wpdocs_unset_menu_items', 10, 2 );

*/