<?php
/**
 * Get site brnading for site
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */ ?>
 <div class="site-branding">
 	<div>
 		<?php the_custom_logo(); ?>
 		<div>
 			<?php if ( is_front_page() ) :
 				?>
 				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
 				<?php
 			else :
 				?>
 				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
 				<?php
 			endif;
 			$description = get_bloginfo( 'description', 'display' );
 			if ( $description || is_customize_preview() ) :
 				?>
 				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
 			<?php endif; ?>
 		</div>
 	</div>
 </div>