<?php
/**
 * direitoacidade functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage direitoacidade
 * @since Twenty Thirteen 1.0
 */

/* Set up the content width value based on the theme's design.
 * @see direitoacidade_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/** Add support for a custom header image */
//require get_template_directory() . '/inc/custom-header.php';

/** Twenty Thirteen setup.
 *
 * Sets up theme defaults and registers the various WordPress features that Twenty Thirteen supports.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 */
function direitoacidade_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'direitoacidade' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'direitoacidade', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', direitoacidade_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	//add_theme_support( 'post-formats', array(
		//'aside','gallery', 'status'/*,'audio', 'chat',  'image', 'link', 'quote',  'video'*/
	//) );

	// This theme uses wp_nav_menu() in one location.
	//register_nav_menu( 'primary', __( 'Navigation Menu', 'direitoacidade' ) );
	// Support for Menus
	add_action( 'init', 'register_menus' );
	function register_menus() {
	  register_nav_menus(
	    array( 
		'paginas-menu' => __( 'paginas menu' ))
	  );
	}
	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 160, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'direitoacidade_setup' );

/** Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 * @return string Font stylesheet or empty string if disabled.
 */
function direitoacidade_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'direitoacidade' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'direitoacidade' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/* Enqueue scripts and styles for the front end*/
function direitoacidade_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'direitoacidade-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2014-03-18', true );

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'direitoacidade-fonts', direitoacidade_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'direitoacidade-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'direitoacidade-ie', get_template_directory_uri() . '/css/ie.css', array( 'direitoacidade-style' ), '2013-07-18' );
	wp_style_add_data( 'direitoacidade-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'direitoacidade_scripts_styles' );

/** Filter the page title.
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function direitoacidade_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'direitoacidade' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'direitoacidade_wp_title', 10, 2 );

/** Register widget areas */
function direitoacidade_widgets_init() {	
	register_sidebar( array(
		'name'          => __( 'Top Widget Area', 'direitoacidade' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Em Header', 'direitoacidade' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Widget Area', 'direitoacidade' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'sidebar nos posts and pages', 'direitoacidade' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
	register_sidebar( array(
		'name'          => __( 'Home Left', 'direitoacidade' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Em Homepage Esquerda', 'direitoacidade' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Right', 'direitoacidade' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Em Homepage Direita', 'direitoacidade' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'FOOT 1', 'direitoacidade' ),
		'id'            => 'sidebar-6',
		'description'   => __( 'Em FOOT esq', 'direitoacidade' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		register_sidebar( array(
		'name'          => __( 'FOOT 2', 'direitoacidade' ),
		'id'            => 'sidebar-7',
		'description'   => __( 'Em FOOT mid', 'direitoacidade' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		register_sidebar( array(
		'name'          => __( 'FOOT 3', 'direitoacidade' ),
		'id'            => 'sidebar-8',
		'description'   => __( 'Em FOOT dir', 'direitoacidade' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		register_sidebar( array(
		'name'          => __( 'Userboxer', 'direitoacidade' ),
		'id'            => 'sidebar-9',
		'description'   => __( 'Before Header', 'direitoacidade' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'direitoacidade_widgets_init' );

/** Display navigation to next/previous set of posts when applicable. */
if ( ! function_exists( 'direitoacidade_paging_nav' ) ) :

function direitoacidade_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'direitoacidade' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'direitoacidade' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'direitoacidade' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/** Display navigation to next/previous post when applicable.*/
if ( ! function_exists( 'direitoacidade_post_nav' ) ) :

function direitoacidade_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'direitoacidade' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'direitoacidade' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'direitoacidade' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/** Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 * Create your own direitoacidade_entry_meta() to override in a child theme.
 */
 if ( ! function_exists( 'direitoacidade_entry_meta' ) ) :

function direitoacidade_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'direitoacidade' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		direitoacidade_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'direitoacidade' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'direitoacidade' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'direitoacidade' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'direitoacidade_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own direitoacidade_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function direitoacidade_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'direitoacidade' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'direitoacidade' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'direitoacidade_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 */
function direitoacidade_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Twenty thirteen 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'direitoacidade_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 * Falls back to the post permalink if no URL is found in the post.
 * @since Twenty Thirteen 1.0
 * @return string The Link format URL.
 */
function direitoacidade_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extend the default WordPress body classes.
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 * @since Twenty Thirteen 1.0
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function direitoacidade_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'direitoacidade_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 * @since Twenty Thirteen 1.0
 */
function direitoacidade_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'direitoacidade_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 * @since Twenty Thirteen 1.0
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function direitoacidade_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'direitoacidade_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 * @since Twenty Thirteen 1.0
 */
function direitoacidade_customize_preview_js() {
	wp_enqueue_script( 'direitoacidade-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'direitoacidade_customize_preview_js' );

/****** extras ******/
add_filter('widget_text', 'do_shortcode');
remove_action('wp_head', 'wp_generator');
add_theme_support( 'custom-background' );

/******** email correction and sender *****/
class email_return_path {
  	function __construct() {
		add_action( 'phpmailer_init', array( $this, 'fix' ) );    
  	}
	function fix( $phpmailer ) {
	  	$phpmailer->Sender = $phpmailer->From;
	}
}
new email_return_path();

/* email from this site */
function use_my_name(){
  return 'Site Encontro Direito a Cidade';
}
add_filter( 'wp_mail_from_name', 'use_my_name' );


/********* ADMIN MENU ORDER *********/
//if ( current_user_can( 'editor' ) ) {
/**/	function custom_menu_order($menu_ord) {
    	if (!$menu_ord) return true;
     
    	return array(
        'index.php', // Dashboard
        'users.php', // Users
        'profile.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'themes.php', // Appearance
        //'plugins.php', // Plugins
		'separator1', // First separator
		'separator2', // Second separator
		'edit.php?post_type=page', // Pages
        'edit.php', // Posts		
        'edit-comments.php', // Comments
        'upload.php', // Media
        'separator-last', // Last separator
    	);
	}
add_filter('custom_menu_order', 'custom_menu_order'); 
add_filter('menu_order', 'custom_menu_order');
//}
	
/***** change the menu items label  ****/
if ( current_user_can( 'editor' ) ) {
	add_filter( 'gettext', 'change_labels' );
	add_filter( 'ngettext', 'change_labels' );
	function change_labels( $novos ) 
		{  
    	$novos = str_replace( 'Meet My Team', 'Participantes', $novos );
    	$novos = str_replace( 'Contact Form DB', 'As Inscrições', $novos );
    	$novos = str_replace( 'Posts', 'Notícias', $novos );
    	$novos = str_replace( 'Aparência', 'Menu', $novos );
    	$novos = str_replace( 'Appearance', 'Menu', $novos );
    	return $novos;
	}
}

/***** add caps for editor ****/
function add_theme_caps() {
    $role = get_role( 'editor' );

    $role->add_cap( 'manage_options' );

	$role->add_cap( 'edit_users');
    $role->add_cap( 'add_users');
    $role->add_cap( 'create_users');
    $role->add_cap( 'delete_users');
    $role->add_cap( 'remove_users');
    $role->add_cap( 'promote_users');
    $role->add_cap( 'list_users');/**/
	
}
add_action( 'admin_init', 'add_theme_caps');

/***** remove items from editor ****/
function my_remove_menu_pages() {
    global $user_ID;
    if ( current_user_can( 'editor' ) ) {
		
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'edit.php?post_type=acf' );
	
		remove_submenu_page( 'themes.php', 'themes.php' );
		remove_submenu_page( 'themes.php', 'widgets.php' );
		remove_submenu_page( 'themes.php', 'customize.php' );
		remove_submenu_page( 'themes.php', 'widgets.php' );
		remove_submenu_page( 'themes.php', 'custom-background' );
		
		remove_submenu_page( 'options-general.php', 'options-general.php' );
		remove_submenu_page( 'options-general.php', 'options-writing.php' );
		remove_submenu_page( 'options-general.php', 'options-discussion.php' );
		remove_submenu_page( 'options-general.php', 'options-media.php' );
 		remove_submenu_page( 'options-general.php', 'options-permalink.php' );
 		remove_submenu_page( 'options-general.php', 'qtranslate' );
		
		remove_menu_page( 'theme_my_login' );
		remove_menu_page( 'WP-Optimize' );
		remove_menu_page( 'plugins.php' );	
		remove_menu_page( 'admin.php?page=si-contact-form/si-contact-form.php' );	
   }
}
add_action( 'admin_init', 'my_remove_menu_pages' );

/**** BBpress ******/

/** breadcrumbs function bm_bbp_no_breadcrumb ($param) {
	return true;
}
add_filter ('bbp_no_breadcrumb', 'bm_bbp_no_breadcrumb');*/

function custom_breadcrumb_options() {
	// Home - default = true
	$args['include_home']    = false;
	// Forum root - default = true
	$args['include_root']    = false;
	// Current - default = true
	$args['include_current'] = true;

	return $args;
}

add_filter('bbp_before_get_breadcrumb_parse_args', 'mycustom_breadcrumb_options' );

/**  Notification info  **/
function ja_return_blank() {
    return '';
}
add_filter( 'bbp_get_single_forum_description', 'ja_return_blank' );
add_filter( 'bbp_get_single_topic_description', 'ja_return_blank' );


?>