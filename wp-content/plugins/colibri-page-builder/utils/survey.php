<?php

if(!function_exists('extendthemes_switch_theme')){
	add_action('after_switch_theme', 'extendthemes_switch_theme' , 10, 2);

	function extendthemes_switch_theme ($new_name, $old_theme ) {
		
		if ( in_array( $old_theme->template, array( 'colibri-wp', 'colibri', 'one-page-express' ) ) &&
			! in_array( get_template(), array( 'colibri-wp', 'colibri', 'one-page-express' ) ) ) {
				
			extendthemes_show_survey($old_theme->stylesheet);
		}
	}
}

if(!function_exists('extendthemes_show_survey')){
	function extendthemes_show_survey($theme) {
		
		add_action('admin_footer', function () use ($theme) { 
			add_thickbox();	
		?>
		<div id="colibri-survey-modal" style="display:none;">
			<div class="colibri-survey">
				<div class="header">
					<img src="https://colibriwp.com/assets/colibri-logo.svg" class="logo">
					<div class="title">
						<h1><?php _e('Quick feedback', 'colibri-page-builder');?></h1>
						<p><?php _e('If you have a moment, can you please give us a feedback?', 'colibri-page-builder');?></p>
					</div>
				</div>
				
				<div class="content">
					
					<iframe id="survey_iframe" src="" width="100%" height="100%" outline=0">
						
					</iframe>
					
				</div>
				
				<div class="footer">
					<a href="#" class="skip-link" onclick="colibri_survey_close()"><?php _e('Skip', 'colibri-page-builder');?></a>
					<button class="button button-primary" onclick="colibri_survey_submit(this)"><?php _e('Submit', 'colibri-page-builder');?></button>
				</div>
			</div>
		</div>

		<style>
		#TB_ajaxContent.TB_modal {
			padding:0px;
		}	
			
		.colibri-survey {
			position:relative;
			width:100%;
			height:100%;
			//font-family:'Open Sans';
		}	
			
		.colibri-survey .logo{
			float:left;
			filter: invert();
		}

		.colibri-survey .title h1 {
			color:#17252A;
			font-weight:500;
			font-size:24px;
			margin:0;
		}

		#TB_ajaxContent .colibri-survey .title p {
			font-size:14px;
			margin:2px;
			color:#46707F;
		}	
		.colibri-survey .title{
			float:left;
			margin:10px;
		}

		.colibri-survey .header{
			padding:30px 40px;
		}

		.colibri-survey .content{
			padding:0px 20px;
			height: 250px;
			clear:both;
		}

		.colibri-survey .content h3 {
			font-weight:500;
			
		}

		.colibri-survey .content label{
			display:block;
			margin:5px;
		}

		.colibri-survey .content label input[type="radio"]{
			margin-right:10px;
		}
			
		.colibri-survey .footer{
			bottom:0px;
			height:74px;
			width:100%;
			background:#F5FAFD;
			position:absolute;
			box-sizing: border-box;
			padding:10px;
			vertical-align:middle;
			text-align:right;
		}

			
		.colibri-survey .footer .skip-link{
			margin:17px;
			display:inline-block;
		}

		.colibri-survey .footer .button{
			margin:10px;
			padding:3px 35px;
			background-color:#03A9F4;
			text-transform:uppercase;
			font-weight:600;
			border:none;
		}
		</style>

		<script>
					
		function extendthemes_adjust_thick_box_size() {
			
			var TB_WIDTH = 550,
				TB_HEIGHT = 420;
			jQuery("#TB_window").css({
				marginLeft: '-' + parseInt((TB_WIDTH / 2), 10) + 'px',
				width: TB_WIDTH + 'px',
				height: TB_HEIGHT + 'px',
				top: '50%',
				marginTop:  '-' + parseInt((TB_HEIGHT / 2), 10) + 'px'
			});	
		}	

		var survey_iframe = jQuery("#survey_iframe");
		var survey_submitted = false;
		
		survey_iframe.on("load", function () {
			
			if (survey_submitted) {
				setTimeout(function () {
					colibri_survey_close();
					survey_submitted = false;
				}, 2000);
			}
		
		});
		jQuery(window).load(function () {
			tb_show('', '#TB_inline?KeepThis=true&width=550&height=420&inlineId=colibri-survey-modal&modal=true', false);
			jQuery("#TB_ajaxContent #survey_iframe").attr("src","https://colibriwp.com/survey/exit/?theme=<?php echo $theme;?>");				   
			
			extendthemes_adjust_thick_box_size();
			jQuery(window).resize(extendthemes_adjust_thick_box_size);
		});
				
		function colibri_survey_close() {
			jQuery("#survey_iframe").attr("src","");
			tb_remove();
		}

		function colibri_survey_submit(element) {
			var message = {'action' : 'submit'};
			survey_iframe[0].contentWindow.postMessage(message, "*");
			survey_submitted = true;
			element.disabled = true;
			//tb_remove();
		}
		</script>

		<?php
		});
	}
}
