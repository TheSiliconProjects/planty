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


/** Customize the log-in page logo */

function wpm_login_style() { ?>

<style type="text/css">
#login h1 a, .login h1 a {
background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/silicon-logo.jpg);
}

/** Add other CSS styles here */
.login {background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/data-center.jpg);
}
#login h1 a, .login h1 img {border-radius: 50%;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'wpm_login_style' );

/** Change login logo url */

add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url($url) {
        return 'https://wp-development.thesiliconprojects.com';
} 


/** Hide admin menu for non logged in user

* Not WORKING with WP TwentyTwentyFour. Use built in class logged-in in CSS

function wpdocs_unset_menu_items( $menu_objects, $args ) {

    if ( is_user_logged_in() ) {
        return $menu_objects;
   }

   $menu_items = array(
        'Admin',
    );

    foreach ( $menu_objects as $key => $menu_object ) {
      if ( ! in_array( $menu_object->title, $menu_items ) ) {
         continue;
     }
        unset( $menu_objects[ $key ] );
 }

 return $menu_objects;}

 add_filter( 'wp_nav_menu_objects', 'wpdocs_unset_menu_items', 10, 2 );

*/