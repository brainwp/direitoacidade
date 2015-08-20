<?php
/**
 * The footer
 * @package WordPress
 * @subpackage direitoacidade
 */
?>
</div><!-- #main -->
<div style="clear: both;"></div>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="inside">
		<div class="block first">
			<ul>
				<?php get_sidebar( 'foot1' ); ?>
            </ul>
		</div>
            
		<div class="block">
			<ul>
    			<?php get_sidebar( 'foot2' ); ?>
            </ul>
		</div>
			
        <div class="block">
			<ul>
    			<?php get_sidebar( 'foot3' ); ?>   
			</ul>
		</div>
	</div>

	<div class="site-info">
    	<?php bloginfo( 'name' ); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</div><!-- #wrapper -->
</body>
</html>
