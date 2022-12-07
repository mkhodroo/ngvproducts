<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Diaries
 */

global $post;

$sidebar_layout = get_post_meta( $post->ID, 'travel_diaries_sidebar_layout', true ); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title" itemprop="headline">', '</h2>' ); ?>
	</header><!-- .entry-header -->
    
    <?php if( has_post_thumbnail() ){?>
    <div class="post-thumbnail">
        <?php ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'travel-diaries-image-with-sidebar', array( 'itemprop' => 'image' ) ) : the_post_thumbnail( 'travel-diaries-image-full-width', array( 'itemprop' => 'image' ) ) ; ?>
    </div>
    <?php } ?>
    
	<div class="entry-content" itemprop="text">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-diaries' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'travel-diaries' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
