<?php 



add_theme_support( 'post-thumbnails' ); 

function the_post_thumbnail_caption() {

  global $post;



  $thumbnail_id    = get_post_thumbnail_id($post->ID);

  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));



  if ($thumbnail_image && isset($thumbnail_image[0])) {

    echo '<p>'.$thumbnail_image[0]->post_excerpt.'</p>';

  }

}

if ( function_exists('register_sidebar') ) {

  register_sidebar(array(

        'name' => 'Home Top Sidebar',

        'id' => 'home_top_sidebar',

        'before_widget' => '<div class="sidebarTopWidgets">',

        'after_widget' => '</div>',

        'before_title' => '<h4>',

        'after_title' => '</h4>',

    ));

    register_sidebar(array(

        'name' => 'Home Bottom Sidebar',

        'id' => 'home_bottom_sidebar',

        'before_widget' => '<div class="sidebarBottomWidgets">',

        'after_widget' => '</div>',

        'before_title' => '<h4>',

        'after_title' => '</h4>',

    ));

}

function register_my_menus() {

  register_nav_menus(

    array(

      'header-menu' => __( 'Header' ),

      'about-menu' => __( 'About' ),

      'alumni-menu' => __( 'Alumni' ),

      'gfi-menu' => __( 'GFI' ),

      'kti-menu' => __( 'KTI' ),

      'kuna-menu' => __( 'KUNA Sidebar 1' ),

      'kuna-menu-2' => __( 'KUNA Sidebar 2' ),

      'kuna-menu-3' => __( 'KUNA Sidebar 3' ),

      'kuna-menu-4' => __( 'KUNA Sidebar 4' ),

      'kuna-menu-5' => __( 'KUNA Sidebar 5' ),

      'kuna-hs-1-menu' => __( 'KUNA HS 1' ),

      'kuna-hs-2-menu' => __( 'KUNA HS 2' ),

      'kuna-ms-1-menu' => __( 'KUNA MS 1' ),

      'kuna-ms-2-menu' => __( 'KUNA MS 2' ),

      'kuna-ms-3-menu' => __( 'KUNA MS 3' ),

      'kya-menu' => __( 'KYA Sidebar 1' ),

      'kya-menu-2' => __( 'KYA Sidebar 2' ),

      'kya-menu-3' => __( 'KYA Sidebar 3' ),

      'kya-menu-4' => __( 'KYA Sidebar 4' ),

      'kya-hs-1-menu' => __( 'KYA HS 1' ),

      'kya-hs-2-menu' => __( 'KYA HS 2' ),

      'kya-hs-3-menu' => __( 'KYA HS 3' ),

      'kya-ms-1-menu' => __( 'KYA MS 1' ),

      'kya-ms-2-menu' => __( 'KYA MS 2' ),

      'kya-ms-3-menu' => __( 'KYA MS 3' ),

      'kya-ms-4-menu' => __( 'KYA MS 4' ),

      'ltc-menu' => __( 'LTC' ),

      'mya-menu' => __( 'MYA' ),

      'sgfi-menu' => __( 'SGFI' ),

      'student-y-menu' => __( 'Student Y' ),

      'volunteers-menu' => __( 'Volunteers' ),

      'y-corps-menu' => __( 'Y Corps' ),

      'calendar-menu' => __( 'Calendar' ),

      'alliance-menu' => __( 'KY YMCA State Alliance' )

    )

  );

}

add_action( 'init', 'register_my_menus' );







function searchfilter($query) {

 

    if ($query->is_search && !is_admin() ) {

        $query->set('post_type',array('page'));

    }

 

return $query;

}

 

add_filter('pre_get_posts','searchfilter');









//changing the logo

function my_custom_login_logo() {

    echo '<style type="text/css">

    h1 a { background-image:url('.get_bloginfo('template_directory').'/img/kyymcaLogo.png) !important; background-position: 30% 50% !important; width:320px !important; height:82px !important; background-size: 320px 80px !important;}

    </style>';

    }

    add_action('login_head', 'my_custom_login_logo');



    // changing the login page URL

    function put_my_url(){

    return ('http://www.kyymca.org/'); // putting my URL in place of the WordPress one

    }

    add_filter('login_headerurl', 'put_my_url');



// changing the login page URL hover text

    function put_my_title(){

    return ('Kentucky YMCA Youth Association'); // changing the title from "Powered by WordPress" to whatever you wish

    }

    add_filter('login_headertitle', 'put_my_title');





class CSS_Menu_Maker_Walker extends Walker {



  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  

  function start_lvl( &$output, $depth = 0, $args = array() ) {

    $indent = str_repeat("\t", $depth);

    $output .= "\n$indent<ul>\n";

  }

  

  function end_lvl( &$output, $depth = 0, $args = array() ) {

    $indent = str_repeat("\t", $depth);

    $output .= "$indent</ul>\n";

  }

  

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

  

    global $wp_query;

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = ''; 

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    

    /* Add active class */

    if(in_array('current-menu-item', $classes)) {

      $classes[] = 'active';

      unset($classes['current-menu-item']);

    }

    

    /* Check for children */

    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));

    if (!empty($children)) {

      $classes[] = 'has-sub';

    }

    

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    

    $item_output = $args->before;

    $item_output .= '<a'. $attributes .'>';

    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

    $item_output .= '</a>';

    $item_output .= $args->after;

    

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

  }

  

  function end_el( &$output, $item, $depth = 0, $args = array() ) {

    $output .= "</li>\n";

  }

}



add_filter('acf/options_page/settings', 'my_options_page_settings');



function my_options_page_settings( $options )

{

  $options['title'] = __('Theme Options');

  $options['pages'] = array(

      __('Header'),

      __('Footer'),

      __('Staff'),

      __('KUNA Officers'),

      __('KYA Officers')

    );



  return $options;

}

function wpt_admin_color_schemes() {
  $theme_color = get_field('theme_color', 'option');
  $theme_dir = get_stylesheet_directory_uri(); 

  if ($theme_color == 'purple')
    $array = array('#fff', '#5c2e91', '#92278f', '#c6168d');

  if ($theme_color == 'blue')
    $array = array('#fff', '#0060af', '#0089d0', '#00aeef');

  if ($theme_color == 'green')
    $array = array('#fff', '#006b6b', '#01a490', '#20bdbe');

  if ($theme_color == 'red')
    $array = array('#fff', '#a92b31', '#ed1c24', '#f15922');

  if ($theme_color == 'orange')
    $array = array('#fff', '#dd5828', '#f47920', '#fcaf17');
  
  wp_admin_css_color(
    'ymca', __( 'YMCA' ),
    $theme_dir . '/admin-styles/'.$theme_color.'/colors.css',
    $array
  );

  remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
}
add_action('admin_init', 'wpt_admin_color_schemes');

function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'ymca'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');


function add_favicon() {
    $theme_color = get_field('theme_color', 'option');
    $favicon_url = get_stylesheet_directory_uri() . '/img/'. $theme_color .'/yLogoIcon.png';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
  
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');


/**
 * customize the admin logo that appears in the header
 * http://www.wpbeginner.com/wp-themes/adding-a-custom-dashboard-logo-in-wordpress-for-branding/
 * @author Paul Bredenberg
 */
 
function htx_custom_logo() {
$theme_color = get_field('theme_color', 'option');

echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon {
  height: 50px !important;
  width: 50px !important;
}
#wpadminbar>#wp-toolbar>#wp-admin-bar-root-default #wp-admin-bar-wp-logo > .ab-item .ab-icon { 
  background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/'.$theme_color.'/yLogoIcon.png) !important; 
  background-position: 4px 7px;
  background-repeat: no-repeat;
}
#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
  content: \' \' !important;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
  background-position: 0 0;
} 
@media (max-width: 768px) {
  #wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon {
    height: 46px !important;
    width: 46px !important;
    background-size: 38px 38px;
  }
  #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default #wp-admin-bar-wp-logo > .ab-item .ab-icon { 
    background-position: 4px 4px;
  }
}
</style>
';
}
 
//hook into the administrative header output
add_action('admin_head', 'htx_custom_logo');

// Hide admin bar on front-end
add_action('show_admin_bar', '__return_false');



?>