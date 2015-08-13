<?php
/**
 * 404
 * @package WordPress
 * @subpackage direitoacidade
 */
get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<header class="page-header">
			<h1 class="page-title"><?php _e( 'hmmmm...', 'direitoacidade' ); ?></h1>
		</header>

		<div class="page-wrapper">
			<div class="page-content">
				<h2><?php _e( 'hmmmm...', 'direitoacidade' ); ?></h2>
				<p><?php _e("<!--:pt-->Faça uma busca<!--:--><!--:es-->Hace una busqueda<!--:--><!--:en-->Search for something...<!--:-->"); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>