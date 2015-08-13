<?php
/**
 * Home Direita sidebar
 * @package WordPress
 * @subpackage direitoacidade
 */
if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>