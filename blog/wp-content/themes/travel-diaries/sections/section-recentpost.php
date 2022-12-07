<?php
/**
 * Recent Post Section
 *
 * @package Travel_Diaries
 */

$recentpost_title    = get_theme_mod( 'travel_diaries_recentpost_title' );
$recentpost_content  = get_theme_mod( 'travel_diaries_recentpost_content' );
$recentpost_view_all = get_theme_mod( 'travel_diaries_recentpost_view_all' );
$blog_page           = get_option( 'page_for_posts' );

if( $recentpost_title || $recentpost_content ){ ?>
    <header class="heading">
        <?php if( $recentpost_title ){ ?>
            <h2 class="title"><?php echo esc_html( $recentpost_title ); ?></h2>    
        <?php }if( $recentpost_content ) echo wpautop( esc_html( $recentpost_content ) ); ?>
    </header>
<?php 
}

$qry = new WP_Query( array(
    'post_type'           => 'post',
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => true
));

if( $qry->have_posts() ){ ?>
    
	<div class="row">
	<?php 
    while( $qry->have_posts() ){
        $qry->the_post();    
	?>	
        <div class="columns-3">
			<div class="post">
				<?php if( has_post_thumbnail() ){ ?>
                <a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( 'travel-diaries-blog', array( 'itemprop' => 'image' ) ); ?></a>
                <?php } ?>
				<div class="text-holder">
					<header class="entry-header">
						<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="entry-meta">
							<?php travel_diaries_posted_on(); ?>
						</div>
					</header>
					<div class="entry-content">
                        <?php 
                        if( has_excerpt() ){
                            the_excerpt();
                        }else{
                            echo wpautop( wp_kses_post( force_balance_tags( travel_diaries_excerpt( get_the_content(), 250, '...', false, false ) ) ) );    
                        }
                        ?>							
					</div>
					<?php travel_diaries_entry_footer(); ?>
				</div>
			</div>
		</div>
	<?php } ?>	
	
	</div>
    
    <?php if( $blog_page && $recentpost_view_all ){ ?>
		<div class="btn-holder">
			<a href="<?php echo esc_url( get_the_permalink( $blog_page ) );?>"><?php echo esc_html( $recentpost_view_all ); ?></a>
		</div>
    <?php } ?>
            
<?php 
}
wp_reset_postdata();