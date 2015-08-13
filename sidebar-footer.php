<?php
/**
 * Footer sidebar
 * @package WordPress
 * @subpackage direitoacidade
 */
if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
<div class="widget-area">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- .widget-area -->
<?php endif; ?>