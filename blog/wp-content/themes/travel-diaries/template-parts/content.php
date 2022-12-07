<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Diaries
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			
        the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php travel_diaries_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
    
    <div class="content-holder">
        <?php if( has_post_thumbnail() ){ ?>
            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                <?php the_post_thumbnail( 'travel-diaries-blog-archive', array( 'itemprop' => 'image' ) );?>
            </a>
    	<?php } ?>
        <div class="entry-content" itemprop="text">
    		<?php
                $format = get_post_format();
                if( false === $format ){
                    the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Continue reading ', 'travel-diaries' ); ?><span class="fa fa-angle-right"></span></a>
                <?php
                }else{
                    the_content();
                }
    		?>
    	</div><!-- .entry-content -->
    </div><!-- .content-holder -->

	<footer class="entry-footer">
		<?php travel_diaries_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
