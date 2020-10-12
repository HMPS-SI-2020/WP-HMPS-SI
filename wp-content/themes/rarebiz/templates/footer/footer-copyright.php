<?php
/**
 * Theme copyright template
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */ ?>
 <div class="col-xs-12 col-sm-4">
  	<span id="<?php echo esc_attr( RareBiz_Helper::with_prefix( 'copyright' ) ); ?>">
         	<?php
         		$footer_text = rarebiz_get( 'footer-copyright-text' );
         		// $footer_text is not escapped because it get editor content,
         		// so escapping will show the html tag
         		echo $footer_text;
         	?>
  	</span>	                 	
 </div>