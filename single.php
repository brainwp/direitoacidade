<?php
/**
 * For single posts
 * @package WordPress
 * @subpackage direitoacidade
 */
get_header(); ?>
<div id="primary" class="content-area">
<div id="content" class="site-content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>
		<?php direitoacidade_post_nav(); ?>
		<?php comments_template(); ?>

	<?php endwhile; ?>

</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar('single'); ?>
<div style="clear: both;"></div>
<?php get_footer(); ?>