/* global theFourCustomizer */

/**
 * Script for customizer controls.
 */
jQuery( function ( $ )
{
	// View documentation
	$( '<a href="http://gretathemes.com/docs/" target="_blank"></a>' )
		.text( theFourCustomizer.docs )
		.css( {
			'display'       : 'inline-block',
			'border-radius' : '2px',
			'background'    : '#ea6f60',
			'color'         : '#fff',
			'text-transform': 'uppercase',
			'margin'        : '6px 10px 0 0',
			'padding'       : '3px 6px',
			'font-size'     : '9px',
			'letter-spacing': '1px',
			'line-height'   : 1.5
		} )
		.appendTo( '.preview-notice' );

	// Upgrade to pro notice
	$( '<a href="http://gretathemes.com/wordpress-themes/thefour/" target="_blank"></a>' )
		.text( theFourCustomizer.pro )
		.css( {
			'display'       : 'inline-block',
			'border-radius' : '2px',
			'background'    : '#4cae4c',
			'color'         : '#fff',
			'text-transform': 'uppercase',
			'margin'        : '6px 10px 0 0',
			'padding'       : '3px 6px',
			'font-size'     : '9px',
			'letter-spacing': '1px',
			'line-height'   : 1.5
		} )
		.appendTo( '.preview-notice' );
} );
