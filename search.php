<?php
/**
 * Template for Search Results 
 * @package WordPress
 * @subpackage direitoacidade
 */
get_header(); ?>
<div id="primary" class="content-area">
<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( '<!--:pt-->Resultados para<!--:--><!--:es-->Resultados para<!--:--><!--:en-->Results for<!--:-->: %s', 'direitoacidade' ), get_search_query() ); ?></h1>
			</header>

			<?php while ( have_posts() ) : the_post(); ?>

			<hr align="center" width="100%" size="1" noshade="noshade" />
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
					<?php the_excerpt(); ?>
				</div>

			</article><!-- #post -->

			<?php endwhile; ?>

			<?php direitoacidade_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar('single'); ?>
<div style="clear: both;"></div>
<?php get_footer(); ?>