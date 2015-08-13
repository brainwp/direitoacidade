<?php
/**
 * Template Name: Capa
 * @package WordPress
 * @subpackage direitoacidade
 */
get_header(); ?>
<div id="primaryh" class="content-area"><!-- -->
<div id="content" class="site-contenh" role="main">
	<!-- SLIDER -->
	<div class="sliderh">
		<?php do_action('slideshow_deploy', '326'); ?>
	</div>
	<div style="clear: both;"></div>
    <!-- END SLIDER -->
    
    <!-- 3 COLUNAS -->
    <div class="homest">
    <!-- COLUNA Esquerda: pagina homeleft-->
    	<div class="homer">            
        	<?php $post = get_post(10);?>
            <h1 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php echo qtrans_use($q_config['language'], $post->post_title, true);?></a>
			</h1>      
            <?php $content = qtrans_use($q_config['language'], $post->post_content, true); 
 			$trimmed_content = wp_trim_words( $content, 144); ?>
  			<p><?php echo $trimmed_content.'...<a href="'. get_permalink() .'"> [ + ]</a>'; ?></p> <!-- max words -->   
		</div>
    
     <!-- COLUNA Meio: Noticia -->
    	<div class="homemiddle">
         	<?php query_posts('posts_per_page=1'); ?>
			<?php if ( have_posts() ) : the_post(); ?>      
			<article id="post-<?php the_ID(); ?>" class="homer">
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
				</div>

				<footer class="entry-meta">
					<?php if ( comments_open()) : ?>
					<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Deixe um comentário', 'direitoacidade' ) . '</span>', __( 'Um comentário até agora', 'direitoacidade' ), __( 'Ver todos os % comentários', 'direitoacidade' ) ); ?>
					</div><!-- .comments-link -->
					<?php endif; ?>
				</footer><!-- .entry-meta -->
			</article><!-- #post -->
			<?php endif; ?>  
        </div>
        
	<!-- COLUNA Direita: Calendario -->
        <div class="homecal">
			<?php get_sidebar( 'homedir' ); ?>
		</div>
        
    </div> <!-- FIM 3 COLUNAS -->
    
</div><!-- #content -->

</div><!-- #primary -->
<div style="clear: both;"></div>
<?php get_footer(); ?>