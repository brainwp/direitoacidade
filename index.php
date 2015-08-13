<?php
/**
 * Main template 
 * Used to display a page when nothing more specific matches a query.
 *
 * @package WordPress
 * @subpackage direitoacidade
 * @since Twenty Thirteen 1.0
 */
get_header(); ?>
<div id="content" class="site-contenn" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="homen">
			<header class="entry-header">
			<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
				<div class="entry-thumbnail">
				<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>

				<div class="entry-meta">
					<?php direitoacidade_entry_meta(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php echo substr(get_the_excerpt(), 0,240); ?> [...]
			</div>

			<footer class="entry-meta">
				<?php if ( comments_open()) : ?>
					<div class="comments-link">
					<?php //comments_popup_link( '<span class="leave-reply">' . __( 'Deixe um comentário', 'direitoacidade' ) . '</span>', __( 'Um comentário até agora', 'direitoacidade' ), __( 'Ver todos os % comentários', 'direitoacidade' ) ); ?>
					</div> <!--.comments-link -->
				<?php endif; ?>
			</footer><!-- .entry-meta -->
		</article><!-- #post -->
	
	<?php endwhile; ?>
    <div style="clear: both;"></div>

</div><!-- #content -->
<?php get_footer(); ?>