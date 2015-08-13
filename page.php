<?php
/**
 * Template for pages
 * @package WordPress
 * @subpackage direitoacidade
 */
get_header(); ?>
<div id="content" class="site-content pagina" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php endif; ?>

				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
                
			<div style="clear: both;"></div>
				
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'direitoacidade' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</div><!-- .entry-content -->

			<footer class="entry-meta">
			</footer><!-- .entry-meta -->
		</article><!-- #post -->

	<?php endwhile; ?>
</div><!-- #content -->
<?php get_footer(); ?>