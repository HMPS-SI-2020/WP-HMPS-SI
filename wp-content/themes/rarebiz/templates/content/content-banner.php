<?php
/**
 * Template part for displaying inner banner in pages
 *
 * @since 1.0.0
 * 
 * @package RareBiz WordPress Theme
 */
?>
<div class="<?php echo esc_attr( RareBiz_Helper::get_inner_banner_class() ); ?>" <?php RareBiz_Helper::the_header_image(); ?>> 
	<div class="container">
		<?php
			RareBiz_Helper::the_inner_banner();
			RareBiz_Helper::the_breadcrumb();
		?>
	</div>
</div>
