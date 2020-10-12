<?php
/**
 * Content for header layout 2
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */ ?>
<div class="rarebiz-header-style-2">
	<div class="rarebiz-top-bar-content">
		<div class="container">
			<div class="rarebiz-top-bar-inner">
				<?php get_template_part( 'templates/header/header-site', 'branding' );
				do_action( RareBiz_Helper::fn_prefix( 'before_primary_menu' ) ); ?>
			</div>
		</div>
	</div>
	<!-- top bar -->	
	<div class="rarebiz-navigation-n-options">
		<div class="container">
			<div class="rarebiz-header-style-2-menu"> 	
				<?php RareBiz_Helper::get_menu( 'primary', true ); ?>
				<?php do_action( RareBiz_Helper::fn_prefix( 'after_primary_menu' ) ); ?>
			</div>
		</div>
	</div>	
</div>	
