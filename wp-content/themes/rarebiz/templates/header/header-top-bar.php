<?php
/**
 * Top bar for header
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */?>
  <div class="rarebiz-topbar-wrapper">
  	<div class="container">
  		<div class="row rarebiz-top-bar-info">
        <div class="rarebiz-contact-info">
    			<?php
    				// this is not escapped because it display editor content.
    				// Escapping will print html tags
    				echo rarebiz_get( 'top-bar-text' );
            if( '' != rarebiz_get( 'top-bar-contact' ) ): ?>
              <p><i class="fa fa-mobile"></i> <?php echo rarebiz_get( 'top-bar-contact' ); ?> </p>
            <?php endif; ?>     			
        </div>
  			<?php if( RareBiz_Helper::get_menu( 'top-bar', false ) ): ?>
  				<div class="rarebiz-social-menu">
  					<?php RareBiz_Helper::get_menu( 'top-bar', true ); ?>
  				</div>
  			<?php endif; ?>
 		</div>
 	 </div>
  </div>