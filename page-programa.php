<?php
/**
 * Template Name: Programação
 * @package WordPress
 * @subpackage direitoacidade
 */
get_header(); ?>
<div id="content" class="site-contenpr" role="main">
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header-->
        
		<div class="prog">
			<?php echo apply_filters('the_title', get_the_field('1o_dia'));?>
		</div>
		<div class="prog">
			<?php echo apply_filters('the_title', get_the_field('2o_dia'));?>
		</div>
		<div class="prog">
			<?php echo apply_filters('the_title', get_the_field('3o_dia'));?>
		</div>
				
		<footer class="entry-meta">
		</footer><!-- .entry-meta -->
	</article><!-- #post -->

<?php endwhile; ?>
</div><!-- #content -->
<?php get_footer(); ?>