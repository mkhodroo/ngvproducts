jQuery(document).ready(function($) {
	/* Move widgets to their respective sections */
	wp.customize.section( 'sidebar-widgets-banner-widget' ).panel( 'travel_diaries_home_page_settings' );
	wp.customize.section( 'sidebar-widgets-banner-widget' ).priority( '21' );
});