<?php
/**
 * The Header
 * @package WordPress
 * @subpackage direitoacidade
 * @since Twenty Thirteen
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" >
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
<header id="masthead" class="site-header" role="banner">
    
    <div id="userbox">
		Login
		<div id="slideouttop_inner">
		<?php get_sidebar( 'userbox' ); ?>
		</div>
	</div>
    
	<div class="topper">
	<?php get_sidebar( 'top' ); ?>
	</div>
    
    <a class="home-link" href="<?php echo home_url();?>" rel="home">
	<img src="<?php echo get_template_directory_uri(); ?>/images/logo-eidc.png" width="644" height="184" alt="logotipo do encontro">
	</a>
    
</header> 	
    
    <div id="navbar" class="navbar">
		<nav id="site-navigation" class="navigation main-navigation" role="navigation">
            	
			<h3 class="menu-toggle"><?php _e( 'Menu', 'direitoacidade' ); ?><!-- -->
			<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'direitoacidade' ); ?>"><?php _e( 'Skip to content', 'direitoacidade' ); ?>
                <span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
            </h3>
            <?php wp_nav_menu( array( 'theme_location' => 'paginas-menu', 'menu_class' => 'nav-menu' ) ); ?>  					
		</nav>
	</div><!-- #navbar -->


<div id="main" class="site-main">