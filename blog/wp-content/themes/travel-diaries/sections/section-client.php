<?php
/**
 * Clients Section
 *
 * @package Travel_Diaries
 */

$client_title          = get_theme_mod( 'travel_diaries_client_title' );
$client_link_text      = get_theme_mod( 'travel_diaries_client_link_text' );
$client_link_url       = get_theme_mod( 'travel_diaries_client_link_url' );

$logo_links = array(
    'logo_one' => array(
        'logo' => get_theme_mod( 'travel_diaries_client_logo_one' ), 
        'link' => get_theme_mod( 'travel_diaries_client_logo_one_url' )
    ),
    'logo_two' => array(
        'logo' => get_theme_mod( 'travel_diaries_client_logo_two' ),
        'link' => get_theme_mod( 'travel_diaries_client_logo_two_url' )
    ),
    'logo_three' => array(
        'logo' => get_theme_mod( 'travel_diaries_client_logo_three' ),
        'link' => get_theme_mod( 'travel_diaries_client_logo_three_url' )
    ),
    'logo_four' => array(
        'logo' => get_theme_mod( 'travel_diaries_client_logo_four' ),
        'link' => get_theme_mod( 'travel_diaries_client_logo_four_url' )
    ),
    'logo_five' => array(
        'logo' => get_theme_mod( 'travel_diaries_client_logo_five' ),
        'link' => get_theme_mod( 'travel_diaries_client_logo_five_url' )
    ),
    'logo_six' => array(
        'logo' => get_theme_mod( 'travel_diaries_client_logo_six' ),
        'link' => get_theme_mod( 'travel_diaries_client_logo_six_url' )
    ),
);

if( $client_title ){ ?>
<header class="heading">
    <h2 class="title"><?php echo esc_html( $client_title ); ?></h2>
</header>
<?php } ?>

<div class="row">
    <?php 
        foreach( $logo_links as $lnk ){
            travel_diaries_logo_listing( $lnk['logo'], $lnk['link'], true );
        }
    ?>
</div>

<?php if( $client_link_url ){ ?>
    <div class="btn-holder">
        <a href="<?php echo esc_url( $client_link_url ); ?>" target="_blank"><?php echo esc_html( $client_link_text ); ?></a>
    </div>
<?php } 