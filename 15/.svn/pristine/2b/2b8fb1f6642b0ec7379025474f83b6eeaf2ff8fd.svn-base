jQuery( function ( $ )
{
	var $window = $( window ),
		$body = $( 'body' ),
		$navBar = $( '.navbar' );

	/**
	 * Get top offset for navbar with consideration of admin bar
	 * @param status 'open' or 'close'
	 * @returns int
	 */
	function getNavBarTop( status )
	{
		/**
		 * Calculate 'top' for nav bar
		 * Note: when screen width <= 600px, admin bar does not display
		 */
		var $adminBar = $( '#wpadminbar' ),
			sticky = $adminBar.length && ($window.width() > 600 || $adminBar.height() > $window.scrollTop()),
			close = sticky ? $adminBar.height() : 0,
			open = sticky ? $window.scrollTop() : $window.scrollTop() - $adminBar.height();

		return 'open' == status ? open : close;
	}

	/**
	 * Toggle mobile menu
	 */
	function toggleMobileMenu()
	{
		var mobileClass = 'mobile-menu-open',
		// Cross browser support for CSS "transition end" event
			transitionEnd = 'transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd';

		// Click to show mobile menu
		$( '.menu-toggle' ).on( 'click', function ( e )
		{
			if ( $body.hasClass( mobileClass ) )
			{
				return;
			}
			e.stopPropagation(); // Do not trigger click event on '.wrapper' below
			$body.addClass( mobileClass );
			$navBar.hasClass( 'fixed' ) && $navBar.css( 'top', getNavBarTop( 'open' ) );
		} );

		$( '.wrapper' )
		// When mobile menu is open, click on page content will close it
			.on( 'click', function ( e )
			{
				if ( !$body.hasClass( mobileClass ) )
				{
					return;
				}
				e.preventDefault();
				$body.removeClass( mobileClass );
			} )
			// Change sticky header 'top' when transition finishes (when clicking mobile menu toggle icon)
			.on( transitionEnd, function ( e )
			{
				if ( !$( e.target ).is( '.wrapper' ) )
				{
					return;
				}
				$body.css( 'overflow', $body.hasClass( mobileClass ) ? 'hidden' : 'auto' );
				if ( $body.hasClass( mobileClass ) || !$navBar.hasClass( 'fixed' ) )
				{
					return;
				}
				$navBar.css( 'top', getNavBarTop( 'close' ) );
			} );
	}

	/**
	 * Header image scroll effect
	 */
	function headerScrollEffect()
	{
		if ( $window.width() <= 800 )
		{
			return;
		}
		var $header = $( '.header' ),
			height = $header.outerHeight();
		$window.scroll( function ()
		{
			$( '.header-inner' ).css( 'opacity', 1 - $window.scrollTop() / height );
		} );
	}

	/**
	 * Navbar fixed when scrolling.
	 */
	function navbarFixed()
	{
		if ( !$body.hasClass( 'navbar-fixed' ) )
		{
			return;
		}

		var $adminBar = $( '#wpadminbar' ),
			top = $adminBar.length && $window.width() >= 600 ? $adminBar.height() : 0,
			offset = $navBar.offset().top - top,
			setAlternativeClass = !$body.hasClass( 'navbar-collapse' );

		$window.on( 'scroll', function ()
		{
			if ( $window.scrollTop() > offset )
			{
				$navBar.css( {
					top   : top + 'px',
					bottom: 'auto'
				} ).addClass( 'fixed' );
				if ( setAlternativeClass )
				{
					$body.addClass( 'navbar-collapse' );
				}
			}
			else
			{
				$navBar.attr( 'style', '' ).removeClass( 'fixed' );
				if ( setAlternativeClass )
				{
					$body.removeClass( 'navbar-collapse' );
				}
			}
		} );
	}

	/**
	 * Resize videos to fit the container
	 */
	function resizeVideo()
	{
		$( '.hentry iframe, .hentry object, .hentry video, .widget-content iframe, .widget-content object, .widget-content iframe' ).each( function ()
		{
			var $video = $( this ),
				$container = $video.parent(),
				containerWidth = $container.width(),
				$post = $video.closest( 'article' );

			if ( !$video.data( 'origwidth' ) )
			{
				$video.data( 'origwidth', $video.attr( 'width' ) );
				$video.data( 'origheight', $video.attr( 'height' ) );
			}
			var ratio = containerWidth / $video.data( 'origwidth' );
			$video.css( 'width', containerWidth + 'px' );

			// Only resize height for non-audio post format
			if ( !$post.hasClass( 'format-audio' ) )
			{
				$video.css( 'height', $video.data( 'origheight' ) * ratio + 'px' );
			}
		} );
	}

	/**
	 * Skip link to content
	 *
	 * @link : https://github.com/Automattic/_s/blob/master/js/skip-link-focus-fix.js
	 */
	function skipLinkFocusFix()
	{
		var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
			is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
			is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

		if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
			window.addEventListener( 'hashchange', function() {
				var id = location.hash.substring( 1 ),
					element;

				if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
					return;
				}

				element = document.getElementById( id );

				if ( element ) {
					if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
						element.tabIndex = -1;
					}

					element.focus();
				}
			}, false );
		}
	}

	headerScrollEffect();
	toggleMobileMenu();
	navbarFixed();
	resizeVideo();
	skipLinkFocusFix();
	$window.resize( resizeVideo );
} );

/**
 * Social button script.
 * Get count for social buttons.
 *
 * @package TheFour
 */
var TheFourSocialButtons = {
	facebook  : document.querySelector( '.social-buttons .facebook' ),
	googleplus: document.querySelector( '.social-buttons .googleplus' ),

	init             : function ()
	{
		if ( this.facebook )
		{
			// 'https://api.facebook.com/method/fql.query?format=json&query=SELECT%20total_count%20FROM%20link_stat%20WHERE%20url=%22' + location.href + '%22'
			this.injectScript( 'https://graph.facebook.com/?id=' + location.href + '&callback=TheFourSocialButtons.processFacebook' );
		}
		if ( this.googleplus )
		{
			this.injectScript( 'https://share.yandex.net/counter/gpp/?url=' + location.href + '&callback=TheFourSocialButtons.processGooglePlus' );
		}
	},
	injectScript     : function ( url )
	{
		var script = document.createElement( 'script' );
		script.async = true;
		script.src = url;
		document.body.appendChild( script );
	},
	processFacebook  : function ( data )
	{
		if ( data.shares != undefined && data.shares != 0 )
		{
			this.facebook.querySelector( '.count' ).innerHTML = data.shares;
		}
	},
	processGooglePlus: function ( data )
	{
		if ( data != 0 )
		{
			this.googleplus.querySelector( '.count' ).innerHTML = data;
		}
	}
};
TheFourSocialButtons.init();
