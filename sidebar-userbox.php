<?php
/**
 * Users sidebar
 * @package WordPress
 * @subpackage direitoacidade
 */
if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
<div class="widget-area">
	<?php dynamic_sidebar( 'sidebar-9' ); ?>
</div><!-- .widget-area -->
<?php endif; ?>