<?php
/**
 * Single sidebar
 * @package WordPress
 * @subpackage direitoacidade
 */
if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
<div id="secondary" class="sidebar-container" role="complementary">
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- .widget-area -->
</div><!-- #secondary -->
<?php endif; ?>
