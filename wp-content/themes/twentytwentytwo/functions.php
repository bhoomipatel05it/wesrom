<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentytwo' ),
				'footer'  => esc_html__( 'Secondary menu', 'twentytwentytwo' ),
			)
		);


		/**
 * Register widget area.
 *
 * @since Twenty Twenty-Two 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_two_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentytwo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentytwo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_two_widgets_init' );


// Our custom post type function
function create_posttype() {
  
    register_post_type( 'slider',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Slider' ),
                'singular_name' => __( 'Slider' )
            ),
            'rewrite' => array('slug' => 'slider'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );



add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	// Slick CSS & JS files
	wp_register_style('slick-css', get_template_directory_uri() .'/css/slick.css');
	wp_register_style('slick-theme-css', get_template_directory_uri() .'/css/slick-theme.css');
	wp_enqueue_script('jquery-min-js', get_template_directory_uri().'/js/jquery-1.11.0.min.js', array(), '1.11.0');		
	wp_enqueue_script('slick-min-js', get_template_directory_uri().'/js/slick.min.js');		

	// Our Custom JS (we'll initialize slick here)
	wp_enqueue_script('custom-js', get_template_directory_uri().'/js/custom-js.js', array(), '1.0.0');

	// Enqueue all CSS & JS files
	wp_enqueue_style('slick-css');
	wp_enqueue_style('slick-theme-css');
	wp_enqueue_script('jquery-min-js');
	wp_enqueue_script('slick-min-js');
	wp_enqueue_script('custom-js');
}

/**
 * Register all shortcodes here
 */
add_action( 'init', 'register_shortcodes' );
function register_shortcodes() {
	add_shortcode( 'simple_slick_slider', 'sc_simple_slick_slider' );
	add_shortcode( 'post_slick_carousel_slider', 'sc_post_slick_carousel_slider' );
}

/**
 * "post_slick_carousel_slider" shortcode callback function - responsible for outputting the HTML markup of your posts/custom posts in a carousel slider.
 */
function sc_post_slick_carousel_slider ( $atts ) {

  global $wp_query, $post;

  $posts = new WP_Query( array(
    'post_type' => 'slider', 
    'post_status' => 'publish',  
    'orderby' => 'date', 
    'order' => 'ASC'
	) );

  if( ! $posts->have_posts() ) {
		return false;
  }

  $output = '<div class="post-slick-carousel-slider">';

  while( $posts->have_posts() ) {
		$posts->the_post();
		$post_ID = get_the_ID();
		$post_title = get_field('name');
		$post_author = get_field('author');
		$post_exerpt = get_the_content();
		$post_featured_image = wp_get_attachment_image( get_post_thumbnail_id( $post_ID ), 'single-post-thumbnail', $icon, $attr );
		//$post_link = get_post_permalink();

		$output .= 		'<div>';
		$output .= 			$post_featured_image;
		$output .= 			'<div>';
		$output .= 				'<p>'.$post_exerpt.'</p>';
		$output .= 				'<p><b>'.$post_title.'</b>';
		$output .= 				', '.$post_author.'</p>';
		$output .= 				'<div class="quote-img"></div>';
		$output .= 				'<div class="quote-bg-shape"></div>';					
		$output .= 			'</div>';
		$output .= 		'</div>';
	}

	$output .= '</div>';

  return $output;
}