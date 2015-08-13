<?php
/**
 * Default for content, used for both single and index/archive/search.
 * @package WordPress
 * @subpackage direitoacidade
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
		<div class="entry-thumbnail">
		  <?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<div class="entry-meta">
			<?php // direitoacidade_entry_meta(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
    
	<div class="entry-content">
		<?php the_content( __( 'Continuar lendo <span class="meta-nav">&rarr;</span>', 'direitoacidade' ) ); ?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'direitoacidade' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	<hr align="center" width="100%" size="1" noshade="noshade">
	
	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
<div class="comments-link">
                <?php comments_popup_link( '<span class="leave-reply">' . _e( 'Deixe um comentário', 'direitoacidade' ) . '</span>', _e( 'Um comentário até agora', 'direitoacidade' ), _e( 'Ver todos os % comentários', 'direitoacidade' ) ); ?>
                
			</div><!-- .comments-link -->
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
