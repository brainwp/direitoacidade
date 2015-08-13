<?php
/**
 * FOOT2 sidebar
 * @package WordPress
 * @subpackage direitoacidade
 */
if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
<div style="clear: both;"></div>
<div class="widget-area">
	<?php dynamic_sidebar( 'sidebar-7' ); ?>
</div><!-- .widget-area -->
<?php endif; ?>