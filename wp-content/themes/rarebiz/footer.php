<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 *
 * @package RareBiz WordPress theme
 */
?>
	<section class="site-footer footer-area">

		<?php do_action( RareBiz_Helper::fn_prefix( 'footer' ) ); ?>

	    <!-- footer divider line -->
	    <div class="footer-divider w-100"></div>
	    <?php if( rarebiz_get( 'footer-copyright-text' ) || rarebiz_get( 'footer-social-menu' ) ): ?>
		    <footer <?php RareBiz_Helper::schema_body( 'footer' ); ?> class="footer-bottom-section py-3 <?php echo esc_attr( RareBiz_Helper::get_footer_class() ); ?>">
		        <div class="container-fluid">
		             <!-- footer bottom section -->
		             <div class="row justify-content-between">
		             	<?php do_action( RareBiz_Helper::fn_prefix( 'copyright' ) ); ?>
		            </div> <!-- footer-bottom -->
		        </div><!-- container -->
		    </footer><!-- footer- copyright -->
		<?php endif; ?>
	</section><!-- section -->
	
	<?php do_action( RareBiz_Helper::fn_prefix( 'after_footer' ) ); ?>
 	<?php wp_footer(); ?>
 </body>
 </html>