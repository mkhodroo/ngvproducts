<?php
/**
 * Guide Section
 *
 * @package Travel_Diaries
 */

$guide_title      = get_theme_mod( 'travel_diaries_guide_title' );
$guide_content    = get_theme_mod( 'travel_diaries_guide_content' );
$guide_post_one   = get_theme_mod( 'travel_diaries_guide_post_one' );
$guide_post_two   = get_theme_mod( 'travel_diaries_guide_post_two' );
$guide_post_three = get_theme_mod( 'travel_diaries_guide_post_three' );
$guide_post_four  = get_theme_mod( 'travel_diaries_guide_post_four' );
$guide_post_five  = get_theme_mod( 'travel_diaries_guide_post_five' );
$guide_post_six   = get_theme_mod( 'travel_diaries_guide_post_six' );
    
if( $guide_title || $guide_content ){ ?>
    <header class="heading">
        <?php if( $guide_title ){ ?>
            <h2 class="title"><?php echo esc_html( $guide_title ); ?></h2>    
        <?php }if( $guide_content ) echo wpautop( esc_html( $guide_content ) ); ?>
    </header>
<?php 
}

if( $guide_post_one || $guide_post_two || $guide_post_three || $guide_post_four || $guide_post_five || $guide_post_six ){
?>
<div class="row">
	<?php
    $guide_posts = array( $guide_post_one, $guide_post_two, $guide_post_three, $guide_post_four, $guide_post_five, $guide_post_six );
    $guide_posts = array_diff( array_unique( $guide_posts ), array('') );
    
    $guide_qry = new WP_Query( array(
        'post__in'              => $guide_posts,
        'posts_per_page'        => -1, 
        'orderby'               => 'post__in',
        'ignore_sticky_posts'   => true
    ));
    
    if( $guide_qry->have_posts() ){
        while( $guide_qry->have_posts() ){
            $guide_qry->the_post();
            if( has_post_thumbnail() ){
            ?>
            <div class="columns-3">
    			<div class="img-holder">
    				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'travel-diaries-guide', array( 'itemprop' => 'image' ) ); ?></a>
    				<div class="text"><?php the_title(); ?></div>
    			</div>
    		</div>
            <?php
            }
        }
    }
    wp_reset_postdata();
    ?>
</div>
<?php
}		