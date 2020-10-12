<?php 
/**
 * Template part for displaying inner banner in pages
 *
 * @since 1.0.0
 * 
 * @package Smile Charities
 */

$pst = Smile_Charities::get_posts_by_type( rarebiz_get( 'slider-type' ), rarebiz_get( 'cat-post' ) );
if( !empty( $pst ) ):?>
	<div class="rarebiz-banner-slider-wrapper"> 
		<div class="rarebiz-banner-slider-init">
			<?php 
			foreach( $pst as $p ):
				$slider_excerpt = apply_filters( 'smile_slider_excerpt_length', 20 ); ?>
				<div class="rarebiz-banner-slider-inner" style="background-image: url( <?php echo esc_url( get_the_post_thumbnail_url( $p, 'full' ) ) ?> )">
					<div class="banner-slider-content">
						<h2>
							<a href="<?php echo esc_url( get_the_permalink( $p ) ); ?>">								
								<?php echo esc_html( get_the_title( $p ) ); ?>
							</a>
						</h2>
						<p class="feature-news-content"><?php echo esc_html( smile_charities_excerpt( $slider_excerpt, false, '...', $p ) ); ?></p>
						<?php if( '' != rarebiz_get( 'smile-primary-btn-txt' ) || '' != rarebiz_get( 'smile-secondary-btn-txt' ) ): ?>
							<div class="inner-banner-btn">
								<?php if( '' != rarebiz_get( 'smile-primary-btn-txt' ) ): ?>
		 				 			<a href="<?php echo esc_url( get_the_permalink( $p ) ); ?>" class="inner-banner-btn btn-1">
		 				 				<?php echo esc_html( rarebiz_get( 'smile-primary-btn-txt' ) ); ?>
		 				 			</a>
	 				 			<?php endif; ?>
								<?php if( '' != rarebiz_get( 'smile-secondary-btn-txt' ) ): ?>
				 		 			<a class="inner-banner-btn btn-2" href="<?php echo esc_url( rarebiz_get( 'smile-secondary-btn-url' ) ) ?>">
				 		 				<?php echo esc_html( rarebiz_get( 'smile-secondary-btn-txt' ) ); ?>
				 		 			</a>
			 		 			<?php endif; ?>
	 			 			</div>
 			 			<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
