<?php
/**
 * Content for footer widget
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */
 if( !apply_filters( RareBiz_Helper::fn_prefix( 'disable_footer_widget' ), false ) ): ?>
    <footer <?php RareBiz_Helper::schema_body( 'footer' ); ?> class="footer-top-section" <?php RareBiz_Helper::the_footer_bg_img(); ?> >
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                 	<?php
                 		$num_footer = rarebiz_get( 'layout-footer' );
                 		for( $i = 1; $i <= $num_footer ; $i++ ){ ?>
                 			<?php if ( is_active_sidebar( RareBiz_Helper::fn_prefix( 'footer_sidebar' ) . '_' . $i ) ) : ?>
		                 		<aside class="col footer-widget-wrapper py-5">
		                 	    	<?php dynamic_sidebar( RareBiz_Helper::fn_prefix( 'footer_sidebar' ) . '_' . $i ); ?>
		                 		</aside>
	                 		<?php endif; ?>
                 	<?php } ?>
                </div>
            </div>
        </div>
    </footer>
<?php endif;
