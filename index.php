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
					<?php // direitoacidade_entry_meta(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

			<footer class="entry-meta">
				<?php if ( comments_open()) : ?>
					<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Deixe um comentário', 'direitoacidade' ) . '</span>', __( 'Um comentário até agora', 'direitoacidade' ), __( 'Ver todos os % comentários', 'direitoacidade' ) ); ?>
					</div> <!--.comments-link -->
				<?php endif; ?>
			</footer><!-- .entry-meta -->
		</article><!-- #post -->
	
	<?php endwhile; ?>
    <div style="clear: both;"></div>
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php global $wp_query;  
	$total_pages = $wp_query->max_num_pages;  
	if ($total_pages > 1){  
	  $current_page = max(1, get_query_var('paged'));  
	  echo '<div class="page_nav">';  
	  echo paginate_links(array(  
		  'base' => get_pagenum_link(1) . '%_%',  
		  'format' => '/page/%#%',  
		  'current' => $current_page,  
		  'total' => $total_pages,  
		  'prev_text' => '<< Anteriores',  
		  'next_text' => 'Pr&oacute;ximos >>'  
		));  
	  echo '</div>';  
	} 
	?>
</div><!-- #content -->
<?php get_footer(); ?>
