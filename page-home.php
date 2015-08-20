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

	<!-- COLUNA Esquerda-->
    	<div class="homer">            
		<?php get_sidebar( 'homeesq' ); ?>
	</div>
	<!-- COLUNA Meio -->
    	<div class="homecenter">
        	<?php get_sidebar( 'homemiddle' ); ?>	
        </div>
        
	<!-- COLUNA Direita -->
        <div class="homel">
		<?php get_sidebar( 'homedir' ); ?>
	</div>
        
    </div>
<!-- FIM 3 COLUNAS -->
    
</div><!-- #content -->

</div><!-- #primary -->
<div style="clear: both;"></div>
<?php get_footer(); ?>
