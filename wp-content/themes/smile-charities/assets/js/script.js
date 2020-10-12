+(function ($) {
	var slickArrLeft =  `
    	<button class="slick-prev rare-arrow rare-arrow-prev">
    		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 511.991 511.991" style="enable-background:new 0 0 511.991 511.991;" xml:space="preserve" width="50px" height="50px"><g><g>
			<g>
				<path d="M153.433,255.991L381.037,18.033c4.063-4.26,3.917-11.01-0.333-15.083c-4.229-4.073-10.979-3.896-15.083,0.333    L130.954,248.616c-3.937,4.125-3.937,10.625,0,14.75L365.621,508.7c2.104,2.188,4.896,3.292,7.708,3.292    c2.646,0,5.313-0.979,7.375-2.958c4.25-4.073,4.396-10.823,0.333-15.083L153.433,255.991z" data-original="#000000" class="active-path" data-old_color="#000000" />
			</g>
			</g></g> </svg>
		</button>`;
	var slickArrRight =	`
		<button class="slick-prev rare-arrow rare-arrow-next">
		    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 511.995 511.995" style="enable-background:new 0 0 511.995 511.995;" xml:space="preserve" width="50px" height="50px"><g><g>
			<g>
				<path d="M381.039,248.62L146.373,3.287c-4.083-4.229-10.833-4.417-15.083-0.333c-4.25,4.073-4.396,10.823-0.333,15.083    L358.56,255.995L130.956,493.954c-4.063,4.26-3.917,11.01,0.333,15.083c2.063,1.979,4.729,2.958,7.375,2.958    c2.813,0,5.604-1.104,7.708-3.292L381.039,263.37C384.977,259.245,384.977,252.745,381.039,248.62z" data-original="#000000" class="active-path" data-old_color="#000000" />
			</g>
			</g></g> </svg>
		</button>`;
	function bannerSlider() {
		
		jQuery('.rarebiz-banner-slider-init').slick({
		  	dots: true,
		    infinite: true,
		    autoplay: true,
		    autoplaySpeed: 6000,
		    speed: 900,
		    slidesToScroll: 1,
		    arrows: true,
		    prevArrow: slickArrLeft,
		    nextArrow: slickArrRight
		});	
	}

	/* DOM ready event */
	$(document).ready( function(){
		bannerSlider();
	});
})(jQuery);