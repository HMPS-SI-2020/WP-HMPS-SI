<?php
/**
 * Content for header layout 1
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */ ?>
<div class="<?php echo RareBiz_Helper::with_prefix( 'bottom-header-wrapper' ); ?>">
	<div class="container">
		<section class="rarebiz-bottom-header">
			<div class="rarebiz-header-search">
				<button class="circular-focus screen-reader-text" data-goto=".rarebiz-header-search .rarebiz-toggle-search"><?php esc_html_e( 'Circular focus', 'rarebiz' ); ?></button>
				<?php get_search_form(); ?>
				<button type="button" class="close rarebiz-toggle-search">
					<i class="fa fa-times" aria-hidden="true"></i>
				</button>
				<button class="circular-focus screen-reader-text" data-goto=".rarebiz-header-search .search-field"><?php esc_html_e( 'Circular focus', 'rarebiz' ); ?></button>
			</div>
			
			<?php get_template_part( 'templates/header/header-site', 'branding' ); ?>

			<div class="rarebiz-navigation-n-options">
				<?php do_action( RareBiz_Helper::fn_prefix( 'before_primary_menu' ) ); ?>

					<?php RareBiz_Helper::get_menu( 'primary', true ); ?>
			
				<?php do_action( RareBiz_Helper::fn_prefix( 'after_primary_menu' ) ); ?>
			</div>				
		 
		</section>

	</div>
</div>
<!-- nav bar section end -->