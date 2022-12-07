<?php
/**
 * Template Name: Home Page
 *
 * @package Travel_Diaries
 */

get_header(); 

    $enabled_sections = travel_diaries_get_sections();
    
    foreach( $enabled_sections as $section ){
        
        if( $section['id'] == 'banner' ){
            while ( have_posts() ) : the_post();
                if( has_post_thumbnail() ){
                    $banner_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'travel-diaries-banner' );
            ?>
                <section class="<?php echo esc_attr( $section['class'] ); ?>" id="<?php echo esc_attr( $section['id'] ); ?>" style="background: url('<?php echo esc_url( $banner_image[0] ); ?> '); background-size: cover; background-position: center;">
                    <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                </section>
			<?php
                }	
			endwhile; // End of the loop.
        }else{
        ?>
            <section class="<?php echo esc_attr( $section['class'] ); ?>" id="<?php echo esc_attr( $section['id'] ); ?>">
                <div class="container">
                    <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                </div>    
            </section>
        <?php            
        }
        
    }
get_footer();