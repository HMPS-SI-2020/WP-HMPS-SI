<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Secure
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="header">
  <div class="container">
	<!--HEADER INFO AREA STARTS-->
<?php 
$email_add = get_theme_mod('email_add');
$contact_no = get_theme_mod('contact_no');
$fb_link = get_theme_mod('fb_link'); 
$twitt_link = get_theme_mod('twitt_link');
$gplus_link = get_theme_mod('gplus_link');
$youtube_link = get_theme_mod('youtube_link');
$instagram_link = get_theme_mod('instagram_link');
$linked_link = get_theme_mod('linked_link');
$hidetopbarinfo = get_theme_mod('hide_top_bar_info', 1);
if( $hidetopbarinfo == '') { ?>
<div class="head-info-area">
<div class="center">
<div class="left">
<div class="emltp"><?php if(!empty($email_add)){ ?><span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-mail.png" alt="" /><?php echo esc_html( antispambot( $email_add ) ); ?></span><?php } ?><?php if(!empty($contact_no)){?><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-call.png" alt="" /><strong><?php echo esc_html($contact_no); ?></strong><?php } ?></div> 
</div> 
<div class="right">
<div class="social-icons">
<?php 
if (!empty($fb_link)) { ?>
<a title="<?php echo esc_attr__('facebook','skt-secure'); ?>" class="fb" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a> 
<?php } 		
if (!empty($twitt_link)) { ?>
<a title="<?php echo esc_attr__('twitter','skt-secure'); ?>" class="tw" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
<?php } 
if (!empty($gplus_link)) { ?>
<a title="<?php echo esc_attr__('google-plus','skt-secure'); ?>" class="gp" target="_blank" href="<?php echo esc_url($gplus_link); ?>"></a>
<?php } 
if (!empty($youtube_link)) { ?>
<a title="<?php echo esc_attr__('youtube-link','skt-secure'); ?>" class="tube" target="_blank" href="<?php echo esc_url($youtube_link); ?>"></a>
<?php }  
if (!empty($instagram_link)) { ?>
<a title="<?php echo esc_attr__('instagram-link','skt-secure'); ?>" class="insta" target="_blank" href="<?php echo esc_url($instagram_link); ?>"></a>
<?php } 
if (!empty($linked_link)) { ?> 
<a title="<?php echo esc_attr__('linkedin','skt-secure'); ?>" class="in" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
<?php } ?>                   
</div>
</div>
<div class="clear"></div>                
</div>
</div>
<?php } ?>
<!--HEADER INFO AREA ENDS-->
	<div class="clear"></div> 
    <div class="logo">
		<?php skt_secure_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php	
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo esc_html($description); ?></p>                          
        <?php endif; ?>
        </a>
    </div> 
    <div id="topmenu">
    	         <div class="toggle"><a class="toggleMenu" href="#" style="display:none;"><?php esc_html_e('Menu','skt-secure'); ?></a></div> 
        <div class="sitenav">
          <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>         
        </div><!-- .sitenav--> 
    </div>
  </div> <!-- container -->
  <div class="clear"></div>
</div><!--.header -->
<div class="clear"></div>