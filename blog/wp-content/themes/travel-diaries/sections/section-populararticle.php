<?php
/**
 * Popular Articles Section
 *
 * @package Travel_Diaries
 */

$populararticle_title      = get_theme_mod( 'travel_diaries_populararticle_title' );
$populararticle_content    = get_theme_mod( 'travel_diaries_populararticle_content' );
$populararticle_post_one   = get_theme_mod( 'travel_diaries_populararticle_post_one' );
$populararticle_post_two   = get_theme_mod( 'travel_diaries_populararticle_post_two' );
$populararticle_post_three = get_theme_mod( 'travel_diaries_populararticle_post_three' );
$populararticle_post_four  = get_theme_mod( 'travel_diaries_populararticle_post_four' );
$populararticle_post_five  = get_theme_mod( 'travel_diaries_populararticle_post_five' );
$populararticle_post_six   = get_theme_mod( 'travel_diaries_populararticle_post_six' );

if( $populararticle_title || $populararticle_content ){ ?>
    <header class="heading">
        <?php if( $populararticle_title ){ ?>
            <h2 class="title"><?php echo esc_html( $populararticle_title ); ?></h2>    
        <?php }if( $populararticle_content ) echo wpautop( esc_html( $populararticle_content ) ); ?>
    </header>
<?php 
}

if( $populararticle_post_one || $populararticle_post_two || $populararticle_post_three || $populararticle_post_four || $populararticle_post_five || $populararticle_post_six ){
?>
<div class="row">
	<?php
    $article_posts = array( $populararticle_post_one, $populararticle_post_two, $populararticle_post_three, $populararticle_post_four, $populararticle_post_five, $populararticle_post_six );
    $article_posts = array_diff( array_unique( $article_posts ), array('') );
    
    $article_qry = new WP_Query( array(
        'post__in'              => $article_posts,
        'posts_per_page'        => -1, 
        'orderby'               => 'post__in',
        'ignore_sticky_posts'   => true
    ));
    if( $article_qry->have_posts() ){
        while( $article_qry->have_posts() ){
            $article_qry->the_post();
        ?>
        <div class="columns-3">
    		<div class="post">
    			<?php if( has_post_thumbnail() ){ ?>
                <a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( 'travel-diaries-articles', array( 'itemprop' => 'image' ) ); ?></a>
    			<?php } ?>
                <header class="entry-header">
    				<h3 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
    			</header>
    		</div>
    	</div>
        <?php
        }
    }
    wp_reset_postdata();
    ?>
</div>
<?php      
}