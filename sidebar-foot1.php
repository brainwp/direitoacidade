<?php
/**
 * FOOT1 sidebar
 * @package WordPress
 * @subpackage direitoacidade
 */
if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
<div style="clear: both;"></div>
<div class="widget-area">
	<?php dynamic_sidebar( 'sidebar-6' ); ?>
</div><!-- .widget-area -->
<?php endif; ?>