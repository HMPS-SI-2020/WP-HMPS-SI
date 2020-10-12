<?php
/**
 * Get default banner content for home page
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */ ?>
 <div class="banner-section">
 	<h2 class="entry-title"><?php echo esc_html( rarebiz_get( 'banner-title' ) ) ?></h2>
 	<?php
 		// this is not escapped because it display editor content.
 		// Escapping will print html tags
 		echo rarebiz_get( 'banner-description' );
 	?>
 	<?php
 	$primary_btn_text = rarebiz_get( 'primary-btn-text' );
 	$secondary_btn_text = rarebiz_get( 'secondary-btn-text' ); ?>
 		<div class="inner-banner-btn">
 			<?php if( '' != $primary_btn_text ): ?>
	 			<a class="inner-banner-btn btn-1" href="<?php echo esc_url( rarebiz_get( 'primary-btn-url' ) ); ?>"><?php echo esc_html( $primary_btn_text ); ?></a>
		 	<?php endif;
		 	if( '' != $secondary_btn_text ): ?>
	 			<a class="inner-banner-btn btn-2" href="<?php echo esc_url( rarebiz_get( 'secondary-btn-url' ) ); ?>"><?php echo esc_html( $secondary_btn_text ); ?></a>
 			<?php endif; ?>
 		</div>
 </div>