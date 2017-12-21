<?php
/**
 * Milestar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Milestar
 */

if ( ! function_exists( 'milestar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function milestar_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Milestar, use a find and replace
	 * to change 'milestar' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'milestar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two (2) location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'milestar' ),
		'footer-col-01' => esc_html__( 'Footer Menu: Column 01: Passenger Tires', 'Footer Menu: Column 01: Passenger Tires' ),
		'footer-col-02' => esc_html__( 'Footer Menu: Column 02: Light Truck Tires', 'Footer Menu: Column 02: Light Truck Tires' ),
		'footer-col-03' => esc_html__( 'Footer Menu: Column 03: Commercial LT Tires', 'Footer Menu: Column 03: Commercial LT Tires' ),
		'footer-col-04' => esc_html__( 'Footer Menu: Column 04: Commercial Tires', 'Footer Menu: Column 04: Commercial Tires' ),
		'footer-col-05' => esc_html__( 'Footer Menu: Column 05: Life Style', 'Footer Menu: Column 05: Life Style' ),
		'footer-col-06' => esc_html__( 'Footer Menu: Column 06: About Us', 'Footer Menu: Column 06: About Us' ),
		'footer-col-07' => esc_html__( 'Footer Menu: Column 07: Customer Care', 'Footer Menu: Column 07: Customer Care' ),
		'footer-col-08' => esc_html__( 'Footer Menu: Column 08: Social', 'Footer Menu: Column 08: Social' ),

	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'milestar_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'milestar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function milestar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'milestar_content_width', 640 );
}
add_action( 'after_setup_theme', 'milestar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function milestar_widgets_init() {
	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Sidebar', 'milestar' ),
	// 	'id'            => 'sidebar-1',
	// 	'description'   => esc_html__( 'Add widgets here.', 'milestar' ),
	// 	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</section>',
	// 	'before_title'  => '<h2 class="widget-title">',
	// 	'after_title'   => '</h2>',
	// ) );
	register_sidebar( array(
		'name' => 'Footer Upper Menu Section Col 01',
		'id' => 'footer-upper-menu01',
		'description' => 'Appears in the footer area',
	) );
	register_sidebar( array(
		'name' => 'Footer Upper Menu Section Col 02',
		'id' => 'footer-upper-menu02',
		'description' => 'Appears in the footer area',
	) );
	register_sidebar( array(
		'name' => 'Footer Upper Menu Section Col 03',
		'id' => 'footer-upper-menu03',
		'description' => 'Appears in the footer area',
	) );
	register_sidebar( array(
		'name' => 'Footer Upper Menu Section Col 04',
		'id' => 'footer-upper-menu04',
		'description' => 'Appears in the footer area',
	) );
	register_sidebar( array(
		'name' => 'Footer Upper Menu Section Col 05',
		'id' => 'footer-upper-menu05',
		'description' => 'Appears in the footer area',
	) );	
	register_sidebar( array(
		'name' => 'Footer Upper Menu Section Col 06',
		'id' => 'footer-upper-menu06',
		'description' => 'Appears in the footer area',
	) );	
	register_sidebar( array(
		'name' => 'Footer Upper Menu Section Col 07',
		'id' => 'footer-upper-menu07',
		'description' => 'Appears in the footer area',
	) );	
	register_sidebar( array(
		'name' => 'Footer Upper Menu Section Col 08',
		'id' => 'footer-upper-menu08',
		'description' => 'Appears in the footer area',
	) );
	register_sidebar( array(
		'name' => 'Search Box',
		'id' => 'search-box',
		'description' => 'Appears in the footer area',
	) );	
}
add_action( 'widgets_init', 'milestar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function milestar_scripts() {
	wp_enqueue_style( 'milestar-style', get_stylesheet_uri() );

	wp_enqueue_script( 'milestar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'milestar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'milestar_scripts' );

function clean_custom_menus() {
//	$menu_name = 'menu-1'; // specify custom menu slug
//	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
//		$menu = wp_get_nav_menu_object($locations[$menu_name]);
//		$menu_items = wp_get_nav_menu_items($menu->term_id);
//
//		$menu_list = '<nav>' ."\n";
//		$menu_list .= "\t\t\t\t". '<ul>' ."\n";
//        
//        $submenu = false;
//        $count = 0;
//		foreach ((array) $menu_items as $key => $menu_item) {
//			$title = $menu_item->title;
//			$url = $menu_item->url;
//			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
//		}
//        foreach( $menu_items as $menu_item ){
//            $link = $menu_item->url;
//            $title = $menu_item->title;
//            
//            if ( !$menu_item->menu_item_parent ) {
//                $parent_id = $menu_item->ID;
//                 
//                $menu_list .= '<li class="item">' ."\n";
//                $menu_list .= '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";
//            }
//            if ( $parent_id == $menu_item->menu_item_parent ) {
// 
//                if ( !$submenu ) {
//                    $submenu = true;
//                    $menu_list .= '<ul class="sub-menu">' ."\n";
//                }
// 
//                $menu_list .= '<li class="item">' ."\n";
//                $menu_list .= '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";
//                $menu_list .= '</li>' ."\n";
//                     
// 
//                if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
//                    $menu_list .= '</li>' ."\n";      
//                    $submenu = false;
//                }
// 
//                $count++;
// 
//            }
//            $menu_list .= '</ul>' ."\n";
//            $menu_list .= '</nav>' ."\n";
//        }
//		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
//		$menu_list .= "\t\t\t". '</nav>' ."\n";
//	} else {
//		// $menu_list = '<!-- no list defined -->';
//	}
//	echo $menu_list;
}

add_filter( 'wpsl_templates', 'custom_templates' );

function custom_templates( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'Hello',
        'name' => 'custom',
        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/custom.php',
    );

    return $templates;
}

add_filter( 'wpsl_admin_marker_dir', 'custom_admin_marker_dir' );

function custom_admin_marker_dir() {

    $admin_marker_dir = get_stylesheet_directory() . '/wpsl-custom-marker/';
    
    return $admin_marker_dir;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// //Function to seperate product details pages out
// function is_parent($parentId) {
// 	global $post;

// 	if(is_page()&&($post->post_parent==$parentId||is_page($parentId)))
// 		return true;
// 	else
// 		return false;
// };

// add_action( 'after_setup_theme', 'is_parent');


// add_action( 'after_setup_theme', 'has_parent');

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="admin.php?action=rd_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2); /* for pages */
add_filter( 'portfolio_row_actions', 'rd_duplicate_post_link', 10, 2); /* a custom post called portfolio */