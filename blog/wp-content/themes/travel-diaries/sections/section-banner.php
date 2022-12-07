<?php
/**
 * Banner Section
 *
 * @package Travel_Diaries
 */

$travel_diaries_ed_banner_form = get_theme_mod( 'travel_diaries_ed_banner_form' );

if ( ! is_active_sidebar( 'banner-widget' ) || ! $travel_diaries_ed_banner_form || ! is_newsletter_activated() ) {
	return;
}
?>
<div class="banner-text">
    <div class="container">
        <div class="text">
            <?php dynamic_sidebar( 'banner-widget' );?>
        </div>
    </div>
</div> 