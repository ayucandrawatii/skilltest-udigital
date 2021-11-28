<?php
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'page', 'excerpt' );
add_image_size('home-slider', 2000, 598, ['left', 'top']);
add_image_size('home-slider-mobile', 767, 461, ['center', 'center']);
add_image_size('header-image', 2000, 350, ['left', 'top']);
add_image_size('header-image-mobile', 767, 270, ['left', 'top']);
add_image_size('small-thumbnail', 238, 168, ['left', 'top']);

/**
* Remove Stupid Things, Emoji Especially
*/
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

/**
* Hide Wordpress Admin Bar
*/
add_filter('show_admin_bar', '__return_false');
remove_action('personal_options','_admin_bar_preferences');

/**
* Security
*/
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','index_rel_link');
remove_action('wp_head','wp_generator');

/**
* Include all file requirement
*/
include_once('inc/tgm-plugin-activation/tgm-plugin-activation.php');
include_once('inc/redux.php');
include_once('inc/shortcodes.php');

register_nav_menus([
	'first-menu' => __('First Menu'),
	'top-menu' => __('Top Menu'),
	'first-menu-m' => __('First Menu on Mobile'),
]);

function premium_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'udigital' ),
			'id'            => 'footer',
			'description'   => __( 'Add widgets here to appear in your footer side.', 'udigital' ),
			'before_widget' => '<div id="%1$s" class="col-12 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'premium_widgets_init' );

if(!is_admin()){	
	wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', array(), null, 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.3.1', 'all');
	wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', array(), '4.7.0', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all');
	wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '3.0.0', 'all');

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), '2.8.3' );
	wp_enqueue_script('jquery-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.0.0', true);
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.14.7', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.3.1', true );	
	wp_enqueue_script('jquery-ui-min', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), '3.0.0', true);
	wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/script.js', array(), '3.0.0', true);
}



add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
});

add_action( 'after_setup_theme', 'bootstrap_setup' );
if ( ! function_exists( 'bootstrap_setup' ) ):
	function bootstrap_setup(){
		class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

			function start_lvl( &$output, $depth = 0, $args = array() ){
				$indent = str_repeat( "\t", $depth );
				$output	   .= "\n$indent<ul class=\"dropdown-menu allah-light\">\n";

			}
			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
				$li_attributes = '';
				$class_names = $value = '';
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = ($args->has_children) ? 'dropdown' : '';
				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
				$classes[] = 'nav-item menu-item-' . $item->ID;
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = ' class="' . esc_attr( $class_names ) . '"';
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
				$attributes .= ($args->has_children) 	    ? ' class="nav-link dropdown-toggle "' : 'class="nav-link"';
				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
				$item_output .= $args->after;
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

				if ( !$element )
					return;

				$id_field = $this->db_fields['id'];
				//display this element
				if ( is_array( $args[0] ) )
					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
				else if ( is_object( $args[0] ) )
					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'start_el'), $cb_args);
				$id = $element->$id_field;
				// descend only when the depth is right and there are childrens for this element
				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
					foreach( $children_elements[ $id ] as $child ){
						if ( !isset($newlevel) ) {
							$newlevel = true;
							//start the child delimiter
							$cb_args = array_merge( array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
						unset( $children_elements[ $id ] );
				}
				if ( isset($newlevel) && $newlevel ){
					//end the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
				}
				//end this element
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'end_el'), $cb_args);

			}

		}
	}
endif;
