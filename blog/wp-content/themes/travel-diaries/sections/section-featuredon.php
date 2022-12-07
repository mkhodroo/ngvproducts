<?php
/**
 * Featured On Section
 *
 * @package Travel_Diaries
 */

$featuredon_link_text = get_theme_mod( 'travel_diaries_featuredon_link_text' );
$featuredon_link_url  = get_theme_mod( 'travel_diaries_featuredon_link_url' );

$logo_links = array(
    'logo_one' => array(
        'logo' => get_theme_mod( 'travel_diaries_logo_one' ), 
        'link' => get_theme_mod( 'travel_diaries_logo_one_url' )
    ),
    'logo_two' => array(
        'logo' => get_theme_mod( 'travel_diaries_logo_two' ),
        'link' => get_theme_mod( 'travel_diaries_logo_two_url' )
    ),
    'logo_three' => array(
        'logo' => get_theme_mod( 'travel_diaries_logo_three' ),
        'link' => get_theme_mod( 'travel_diaries_logo_three_url' )
    ),
    'logo_four' => array(
        'logo' => get_theme_mod( 'travel_diaries_logo_four' ),
        'link' => get_theme_mod( 'travel_diaries_logo_four_url' )
    ),
    'logo_five' => array(
        'logo' => get_theme_mod( 'travel_diaries_logo_five' ),
        'link' => get_theme_mod( 'travel_diaries_logo_five_url' )
    )    
);

?>
<span><?php esc_html_e( 'Featured on', 'travel-diaries' ); ?></span>
<ul class="featured-on-lists">
    <?php 
        foreach( $logo_links as $lnk ){
            travel_diaries_logo_listing( $lnk['logo'], $lnk['link'] );
        }
    ?>
</ul>

<?php if( $featuredon_link_url && $featuredon_link_text ){ ?>
    <a href="<?php echo esc_url( $featuredon_link_url ); ?>" class="ad-with-us" target="_blank"><?php echo esc_html( $featuredon_link_text ); ?> <i class="fa fa-caret-right"></i></a>
<?php }