jQuery( function ( $ )
{
	'use strict';

	// Portfolio filtering: only when images are loaded
	$( window ).load( function ()
	{
		var $portfolio = $( '.portfolio-items' );

		$portfolio.isotope( {
			filter          : '*',
			itemSelector    : 'article',
			resizable       : true,
			resizesContainer: true
		} );

		// Filter items when filter link is clicked
		$( '.portfolio-filter' ).on( 'click', 'li', function ( e )
		{
			e.preventDefault();

			var $this = $( this ),
				selector = $this.attr( 'data-filter' );

			$( '.portfolio-filter li' ).removeClass( 'active' );
			$this.addClass( 'active' );

			$portfolio.isotope( {
				filter: selector
			} );
		} );
	} );
} );
