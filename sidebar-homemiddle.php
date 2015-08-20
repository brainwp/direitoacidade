<?php
/**
 * Home Middle sidebar
 * @package WordPress
 * @subpackage direitoacidade
 */
if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>
