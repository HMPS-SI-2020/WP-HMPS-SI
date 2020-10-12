wp.customize.controlConstructor[ 'rarebiz-repeater' ] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

		var getValue = function(){

			var value = control.setting.get();
			if( '' == value ){
				return [];
			}

			try{
				value = JSON.parse( value );
			}catch(err){
				value = [];
			}

			return value;
		}

		var getIndex = function(){
			return control.container.find('select').length;
		}

		var getIndexText = function(){
			return control.container.find('.repeat-text-box').length;
		}

		this.container.on( 'change', 'select', function() {
			if( getIndexText() ){
				var value = getValue();
				var text = jQuery( this ).parent().find( 'input' ).val();
				var page = jQuery( this ).val();
				var btnIndex = jQuery( this ).parent().find( 'button.page-repeater-remove' ).data( 'index' );

				if(  value.length > 0 && typeof value[ btnIndex ] != 'undefined' ){
					value[ btnIndex ].splice( 1, 1, page );
				}else{
					value.push( [ text,page ] );
				}

				control.setting.set( JSON.stringify( value ) );
			}else{			
				var value = getValue();
				var index = jQuery( this ).next().data( 'index' );
				value.splice( index, 1, jQuery( this ).val() );
				control.setting.set( JSON.stringify( value ) );
			}
		});

		this.container.on( 'keyup', '.repeat-text-box', function(){
			if( getIndex() ){
				var value = getValue();
				var text = jQuery( this ).val();
				var page = jQuery( this ).parent().find( 'select' ).val();
				var btnIndex = jQuery( this ).parent().find( 'button.page-repeater-remove' ).data( 'index' );

				if(  value.length > 0 && typeof value[ btnIndex ] != 'undefined' ){
					value[ btnIndex ].splice( 0, 1, text );
				}else{
					value.push( [ text,page ] );
				}

				control.setting.set( JSON.stringify( value ) );
			}else{
				var value = getValue();
				var index = jQuery( this ).next().data( 'index' );
				value.splice( index, 1, jQuery( this ).val() );
				control.setting.set( JSON.stringify( value ) );
			}

		} )

		this.container.on( 'click', '.page-repeater-add', function( e ){
			e.preventDefault();
			var pageIndex = getIndex(),
				textIndex = getIndexText(),
				limit = jQuery( this ).data( 'limit' ),
				pro_text = jQuery( this ).data( 'pro-text' ),
				pro_link = jQuery( this ).data( 'pro-link' );

			if( pageIndex <= limit || textIndex <= limit ){
				var count = pageIndex && textIndex ? 2 : 1;
				var index = (pageIndex + textIndex)/count;
				var h = control.container.find( '.page-repeater-template' ).html();
				h = h.replace( '{#index}', index-1 );
				control.container.find( '.page-repeater-selectors' ).append(h);
			}
			if( index >= limit ) {
				jQuery( this ).hide();
			}

		});

		this.container.on( 'click', '.page-repeater-remove', function( e ){
			e.preventDefault();
			var index = jQuery(this).data('index'),
				limit = jQuery( this ).data( 'limit' );

			jQuery( this ).parent().remove();

			control.container.find( '.page-repeater-selectors .page-repeater-remove' ).each(function(i){
				jQuery(this).data( 'index', i );
			});

			var value = getValue();
			value.splice( index, 1);
			control.setting.set( JSON.stringify( value ) );

			if( index <= limit ){
				jQuery( '.page-repeater-add' ).show();
			}
		});
	}
});