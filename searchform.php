<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e("<!--:pt-->Busca...<!--:--><!--:es-->Busqueda...<!--:--><!--:en-->Search...<!--:-->:"); ?></span>
		<input type="search" class="search-field" placeholder="<?php _e("<!--:pt-->Busca...<!--:--><!--:es-->Busqueda...<!--:--><!--:en-->Search...<!--:-->"); ?>" value="" name="s" title="busca:" />
	</label>
	<input type="submit" class="search-submit" value="buscar" />
</form>