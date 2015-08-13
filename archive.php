<?php
/**
 * The Archive pages
 * @package WordPress
 * @subpackage direitoacidade
 */
get_header(); ?>
<div id="primary" class="content-area">
<div id="content" class="site-content" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h1 class="archive-title"><?php
				if ( is_day() ) :
					printf( __( '<!--:pt-->Arquivos diários<!--:--><!--:es-->Archivos diarios<!--:--><!--:en-->Daily Archives<!--:-->: %s', 'direitoacidade' ), get_the_date() );
				elseif ( is_month() ) :
					printf( __( '<!--:pt-->Arquivos mensais<!--:--><!--:es-->Archivos mensuales<!--:--><!--:en-->Monthly Archives<!--:-->: %s', 'direitoacidade' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'direitoacidade' ) ) );
				elseif ( is_year() ) :
					printf( __( '<!--:pt-->Arquivos anuais<!--:--><!--:es-->Archivos anuales<!--:--><!--:en-->Yearly Archives<!--:-->: %s', 'direitoacidade' ), get_the_date( _x( 'Y', 'yearly archives date format', 'direitoacidade' ) ) );
				else :
					_e( '<!--:pt-->Arquivos<!--:--><!--:es-->Archivos<!--:--><!--:en-->Archives<!--:-->', 'direitoacidade' );
				endif;
			?></h1>
		</header><!-- .archive-header -->

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

				<footer class="entry-meta">
				</footer><!-- .entry-meta -->
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