<?php
/**
 * Travel Diaries Theme Customizer.
 *
 * @package Travel_Diaries
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function travel_diaries_customize_register( $wp_customize ) {
    
	if ( version_compare( get_bloginfo('version'),'4.9', '>=') ) {
          $wp_customize->get_section( 'static_front_page' )->title = __( 'Static Front Page', 'travel-diaries' );
    }
    /* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts( 'posts_per_page=-1' );
    $options_posts[''] = __( 'Choose Post', 'travel-diaries' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }
    
    /** Default Settings */    
    $wp_customize->add_panel( 
        'wp_default_panel',
         array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Default Settings', 'travel-diaries' ),
            'description' => __( 'Default section provided by WordPress customizer.', 'travel-diaries' ),
        ) 
    );
    
    $wp_customize->get_section( 'title_tagline' )->panel     = 'wp_default_panel';
    $wp_customize->get_section( 'colors' )->panel            = 'wp_default_panel';
    $wp_customize->get_section( 'background_image' )->panel  = 'wp_default_panel';
    $wp_customize->get_section( 'static_front_page' )->panel = 'wp_default_panel'; 
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
    $wp_customize->get_setting( 'background_image' )->transport = 'refresh';
    /** Default Settings Ends */ 
    
    /** Header Info Settings */
    $wp_customize->add_section(
        'travel_diaries_header_info_settings',
        array(
            'title' => __( 'Header Info Settings', 'travel-diaries' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Header Info */
    $wp_customize->add_setting(
        'travel_diaries_ed_header_info',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_header_info',
        array(
            'label' => __( 'Enable Header Info', 'travel-diaries' ),
            'section' => 'travel_diaries_header_info_settings',
            'type' => 'checkbox',
        )
    );
    
    /** First Label */
    $wp_customize->add_setting(
        'travel_diaries_first_label',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_first_label',
        array(
            'label' => __( 'First Label', 'travel-diaries' ),
            'section' => 'travel_diaries_header_info_settings',
            'type' => 'text',
        )
    );
    
    /** First Content */
    $wp_customize->add_setting(
        'travel_diaries_first_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_first_content',
        array(
            'label' => __( 'First Content', 'travel-diaries' ),
            'section' => 'travel_diaries_header_info_settings',
            'type' => 'text',
        )
    );
    
    /** Second Label */
    $wp_customize->add_setting(
        'travel_diaries_second_label',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_second_label',
        array(
            'label' => __( 'Second Label', 'travel-diaries' ),
            'section' => 'travel_diaries_header_info_settings',
            'type' => 'text',
        )
    );
    
    /** Second Content */
    $wp_customize->add_setting(
        'travel_diaries_second_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_second_content',
        array(
            'label' => __( 'Second Content', 'travel-diaries' ),
            'section' => 'travel_diaries_header_info_settings',
            'type' => 'text',
        )
    );
    
    /** Third Label */
    $wp_customize->add_setting(
        'travel_diaries_third_label',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_third_label',
        array(
            'label' => __( 'Third Label', 'travel-diaries' ),
            'section' => 'travel_diaries_header_info_settings',
            'type' => 'text',
        )
    );
    
    /** Third Content */
    $wp_customize->add_setting(
        'travel_diaries_third_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_third_content',
        array(
            'label' => __( 'Third Content', 'travel-diaries' ),
            'section' => 'travel_diaries_header_info_settings',
            'type' => 'text',
        )
    );
    /** Header Info Settings Ends */
    
    /** Home Page Settings */
    $wp_customize->add_panel( 
        'travel_diaries_home_page_settings',
         array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'title' => __( 'Home Page Settings', 'travel-diaries' ),
            'description' => __( 'Customize Home Page Settings', 'travel-diaries' ),
        ) 
    );
    
    /** Banner Setting */
    $wp_customize->add_section(
        'travel_diaries_banner_settings',
        array(
            'title' => __( 'Banner Settings', 'travel-diaries' ),
            'priority' => 20,
            'panel' => 'travel_diaries_home_page_settings',
        )
    );
    
    /** Enable/Disable Banner Section */
    $wp_customize->add_setting(
        'travel_diaries_ed_banner_section',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_banner_section',
        array(
            'label'       => __( 'Enable featured image as Banner', 'travel-diaries' ),
            'description' => __( '(The featured image of the page with homepage template will be shown.)', 'travel-diaries' ),
            'section'     => 'travel_diaries_banner_settings',
            'type'        => 'checkbox',
        )
    );
    
    /** Enable/Disable Banner Form */
    $wp_customize->add_setting(
        'travel_diaries_ed_banner_form',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_banner_form',
        array(
            'label' => __( 'Enable Banner Form', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'checkbox',
            'active_callback' => 'is_newsletter_activated',
        )
    );
    
    /** Enable/Disable Featured On Section */
    $wp_customize->add_setting(
        'travel_diaries_ed_featuredon_section',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_featuredon_section',
        array(
            'label' => __( 'Enable Featured On Section', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Upload a Logo One */
    $wp_customize->add_setting(
        'travel_diaries_logo_one',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_logo_one',
           array(
               'label'      => __( 'Upload a logo (One)', 'travel-diaries' ),
               'section'    => 'travel_diaries_banner_settings',
               'settings'   => 'travel_diaries_logo_one',
           )
       )
    );
    
    /** Upload a Logo Url One */
    $wp_customize->add_setting(
        'travel_diaries_logo_one_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_logo_one_url',
        array(
            'label' => __( 'Logo Url (One)', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Two */
    $wp_customize->add_setting(
        'travel_diaries_logo_two',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_logo_two',
           array(
               'label'      => __( 'Upload a logo (Two)', 'travel-diaries' ),
               'section'    => 'travel_diaries_banner_settings',
               'settings'   => 'travel_diaries_logo_two',
           )
       )
    );
    
    /** Upload a Logo Url Two */
    $wp_customize->add_setting(
        'travel_diaries_logo_two_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_logo_two_url',
        array(
            'label' => __( 'Logo Url (Two)', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Three */
    $wp_customize->add_setting(
        'travel_diaries_logo_three',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_logo_three',
           array(
               'label'      => __( 'Upload a logo (Three)', 'travel-diaries' ),
               'section'    => 'travel_diaries_banner_settings',
               'settings'   => 'travel_diaries_logo_three',
           )
       )
    );
    
    /** Upload a Logo Url Three */
    $wp_customize->add_setting(
        'travel_diaries_logo_three_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_logo_three_url',
        array(
            'label' => __( 'Logo Url (Three)', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Four */
    $wp_customize->add_setting(
        'travel_diaries_logo_four',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_logo_four',
           array(
               'label'      => __( 'Upload a logo (Four)', 'travel-diaries' ),
               'section'    => 'travel_diaries_banner_settings',
               'settings'   => 'travel_diaries_logo_four',
           )
       )
    );
    
    /** Upload a Logo Url Four */
    $wp_customize->add_setting(
        'travel_diaries_logo_four_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_logo_four_url',
        array(
            'label' => __( 'Logo Url (Four)', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Five */
    $wp_customize->add_setting(
        'travel_diaries_logo_five',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_logo_five',
           array(
               'label'      => __( 'Upload a logo (Five)', 'travel-diaries' ),
               'section'    => 'travel_diaries_banner_settings',
               'settings'   => 'travel_diaries_logo_five',
           )
       )
    );
    
    /** Upload a Logo Url Five */
    $wp_customize->add_setting(
        'travel_diaries_logo_five_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_logo_five_url',
        array(
            'label' => __( 'Logo Url (Five)', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Link Text */
    $wp_customize->add_setting(
        'travel_diaries_featuredon_link_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_featuredon_link_text',
        array(
            'label' => __( 'Featured On Link Text', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Link Url */
    $wp_customize->add_setting(
        'travel_diaries_featuredon_link_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_featuredon_link_url',
        array(
            'label' => __( 'Featured On Link Url', 'travel-diaries' ),
            'section' => 'travel_diaries_banner_settings',
            'type' => 'text',
        )
    );
    /** Banner Setting Ends */
    
    /** Recent Post Setting */    
    $wp_customize->add_section(
        'travel_diaries_recent_post_settings',
        array(
            'title' => __( 'Recent Post Settings', 'travel-diaries' ),
            'priority' => 30,
            'panel' => 'travel_diaries_home_page_settings',
        )
    );
    
    /** Enable/Disable Recent Post Section */
    $wp_customize->add_setting(
        'travel_diaries_ed_recentpost_section',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_recentpost_section',
        array(
            'label' => __( 'Enable Recent Post Section', 'travel-diaries' ),
            'section' => 'travel_diaries_recent_post_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Recent Post Title */
    $wp_customize->add_setting(
        'travel_diaries_recentpost_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_recentpost_title',
        array(
            'label' => __( 'Recent Post Title', 'travel-diaries' ),
            'section' => 'travel_diaries_recent_post_settings',
            'type' => 'text',
        )
    );
    
    /** Recent Post Content */
    $wp_customize->add_setting(
        'travel_diaries_recentpost_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_recentpost_content',
        array(
            'label' => __( 'Recent Post Content', 'travel-diaries' ),
            'section' => 'travel_diaries_recent_post_settings',
            'type' => 'textarea',
        )
    );
    
    /** Recent Post View All Text */
    $wp_customize->add_setting(
        'travel_diaries_recentpost_view_all',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_recentpost_view_all',
        array(
            'label' => __( 'Recent Post View All Text', 'travel-diaries' ),
            'section' => 'travel_diaries_recent_post_settings',
            'type' => 'text',
        )
    );
    /** Recent Post Setting Ends */
    
    /** Popular Article Setting */
    $wp_customize->add_section(
        'travel_diaries_popular_article_settings',
        array(
            'title' => __( 'Popular Article Settings', 'travel-diaries' ),
            'priority' => 40,
            'panel' => 'travel_diaries_home_page_settings',
        )
    );
    
    /** Enable/Disable Popular Article Section */
    $wp_customize->add_setting(
        'travel_diaries_ed_populararticle_section',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_populararticle_section',
        array(
            'label' => __( 'Enable Popular Article Section', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Popular Article Title */
    $wp_customize->add_setting(
        'travel_diaries_populararticle_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_populararticle_title',
        array(
            'label' => __( 'Popular Article Title', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'text',
        )
    );
    
    /** Popular Article Content */
    $wp_customize->add_setting(
        'travel_diaries_populararticle_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_populararticle_content',
        array(
            'label' => __( 'Popular Article Content', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'textarea',
        )
    );
    
    /** Select Post One */
    $wp_customize->add_setting(
        'travel_diaries_populararticle_post_one',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_populararticle_post_one',
        array(
            'label' => __( 'Select Post One', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Two */
    $wp_customize->add_setting(
        'travel_diaries_populararticle_post_two',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_populararticle_post_two',
        array(
            'label' => __( 'Select Post Two', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Three */
    $wp_customize->add_setting(
        'travel_diaries_populararticle_post_three',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_populararticle_post_three',
        array(
            'label' => __( 'Select Post Three', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Four */
    $wp_customize->add_setting(
        'travel_diaries_populararticle_post_four',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_populararticle_post_four',
        array(
            'label' => __( 'Select Post Four', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Five */
    $wp_customize->add_setting(
        'travel_diaries_populararticle_post_five',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_populararticle_post_five',
        array(
            'label' => __( 'Select Post Five', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Six */
    $wp_customize->add_setting(
        'travel_diaries_populararticle_post_six',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_populararticle_post_six',
        array(
            'label' => __( 'Select Post Six', 'travel-diaries' ),
            'section' => 'travel_diaries_popular_article_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    /** Popular Article Setting Ends */
    
    /** Clients Setting */
    $wp_customize->add_section(
        'travel_diaries_client_settings',
        array(
            'title' => __( 'Clients Settings', 'travel-diaries' ),
            'priority' => 50,
            'panel' => 'travel_diaries_home_page_settings',
        )
    );
    
    /** Enable/Disable Popular Article Section */
    $wp_customize->add_setting(
        'travel_diaries_ed_client_section',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_client_section',
        array(
            'label' => __( 'Enable Clients Section', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Clients Section Title */
    $wp_customize->add_setting(
        'travel_diaries_client_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_title',
        array(
            'label' => __( 'Clients Section Title', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo One */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_one',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_client_logo_one',
           array(
               'label'      => __( 'Upload a logo (One)', 'travel-diaries' ),
               'section'    => 'travel_diaries_client_settings',
               'settings'   => 'travel_diaries_client_logo_one',
           )
       )
    );
    
    /** Upload a Logo Url One */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_one_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_logo_one_url',
        array(
            'label' => __( 'Logo Url (One)', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Two */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_two',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_client_logo_two',
           array(
               'label'      => __( 'Upload a logo (Two)', 'travel-diaries' ),
               'section'    => 'travel_diaries_client_settings',
               'settings'   => 'travel_diaries_client_logo_two',
           )
       )
    );
    
    /** Upload a Logo Url Two */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_two_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_logo_two_url',
        array(
            'label' => __( 'Logo Url (Two)', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Three */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_three',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_client_logo_three',
           array(
               'label'      => __( 'Upload a logo (Three)', 'travel-diaries' ),
               'section'    => 'travel_diaries_client_settings',
               'settings'   => 'travel_diaries_client_logo_three',
           )
       )
    );
    
    /** Upload a Logo Url Three */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_three_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_logo_three_url',
        array(
            'label' => __( 'Logo Url (Three)', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Four */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_four',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_client_logo_four',
           array(
               'label'      => __( 'Upload a logo (Four)', 'travel-diaries' ),
               'section'    => 'travel_diaries_client_settings',
               'settings'   => 'travel_diaries_client_logo_four',
           )
       )
    );
    
    /** Upload a Logo Url Four */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_four_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_logo_four_url',
        array(
            'label' => __( 'Logo Url (Four)', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Five */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_five',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_client_logo_five',
           array(
               'label'      => __( 'Upload a logo (Five)', 'travel-diaries' ),
               'section'    => 'travel_diaries_client_settings',
               'settings'   => 'travel_diaries_client_logo_five',
           )
       )
    );
    
    /** Upload a Logo Url Five */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_five_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_logo_five_url',
        array(
            'label' => __( 'Logo Url (Five)', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    
    /** Upload a Logo Six */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_six',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'travel_diaries_client_logo_six',
           array(
               'label'      => __( 'Upload a logo (Six)', 'travel-diaries' ),
               'section'    => 'travel_diaries_client_settings',
               'settings'   => 'travel_diaries_client_logo_six',
           )
       )
    );
    
    /** Upload a Logo Url Six */
    $wp_customize->add_setting(
        'travel_diaries_client_logo_six_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_logo_six_url',
        array(
            'label' => __( 'Logo Url (Six)', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    
    /** Link Text */
    $wp_customize->add_setting(
        'travel_diaries_client_link_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_link_text',
        array(
            'label' => __( 'Link Text', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    
    /** Link Url */
    $wp_customize->add_setting(
        'travel_diaries_client_link_url',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_client_link_url',
        array(
            'label' => __( 'Link Url', 'travel-diaries' ),
            'section' => 'travel_diaries_client_settings',
            'type' => 'text',
        )
    );
    /** Clients Setting Ends */
    
    /** My Guide Setting */
    $wp_customize->add_section(
        'travel_diaries_guide_settings',
        array(
            'title' => __( 'My Guide Settings', 'travel-diaries' ),
            'priority' => 60,
            'panel' => 'travel_diaries_home_page_settings',
        )
    );
    
    /** Enable/Disable Popular Article Section */
    $wp_customize->add_setting(
        'travel_diaries_ed_guide_section',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_guide_section',
        array(
            'label' => __( 'Enable My Guide Section', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'checkbox',
        )
    );
    
    /** My Guide Title */
    $wp_customize->add_setting(
        'travel_diaries_guide_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_guide_title',
        array(
            'label' => __( 'My Guide Title', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'text',
        )
    );
    
    /** My Guide Content */
    $wp_customize->add_setting(
        'travel_diaries_guide_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_guide_content',
        array(
            'label' => __( 'My Guide Content', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'textarea',
        )
    );
    
    /** Select Post One */
    $wp_customize->add_setting(
        'travel_diaries_guide_post_one',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_guide_post_one',
        array(
            'label' => __( 'Select Post One', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Two */
    $wp_customize->add_setting(
        'travel_diaries_guide_post_two',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_guide_post_two',
        array(
            'label' => __( 'Select Post Two', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Three */
    $wp_customize->add_setting(
        'travel_diaries_guide_post_three',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_guide_post_three',
        array(
            'label' => __( 'Select Post Three', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Four */
    $wp_customize->add_setting(
        'travel_diaries_guide_post_four',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_guide_post_four',
        array(
            'label' => __( 'Select Post Four', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Five */
    $wp_customize->add_setting(
        'travel_diaries_guide_post_five',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_guide_post_five',
        array(
            'label' => __( 'Select Post Five', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Select Post Six */
    $wp_customize->add_setting(
        'travel_diaries_guide_post_six',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_guide_post_six',
        array(
            'label' => __( 'Select Post Six', 'travel-diaries' ),
            'section' => 'travel_diaries_guide_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    /** Guide Setting Ends */    
    /** Home Page Settings Ends */
    
    /** Social Settings */
    $wp_customize->add_section(
        'travel_diaries_social_settings',
        array(
            'title' => __( 'Social Settings', 'travel-diaries' ),
            'description' => __( 'Leave blank if you do not want to show the social link.', 'travel-diaries' ),
            'priority' => 40,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social in Header */
    $wp_customize->add_setting(
        'travel_diaries_ed_social',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_ed_social',
        array(
            'label' => __( 'Enable Social Links', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'travel_diaries_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_facebook',
        array(
            'label' => __( 'Facebook', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    
    /** Google Plus */
    $wp_customize->add_setting(
        'travel_diaries_google_plus',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_google_plus',
        array(
            'label' => __( 'Google Plus', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    
    /** Instagram */
    $wp_customize->add_setting(
        'travel_diaries_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_instagram',
        array(
            'label' => __( 'Instagram', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    
    /** LinkedIn */
    $wp_customize->add_setting(
        'travel_diaries_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_linkedin',
        array(
            'label' => __( 'LinkedIn', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    
    /** Twitter */
    $wp_customize->add_setting(
        'travel_diaries_twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_twitter',
        array(
            'label' => __( 'Twitter', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    
    /** Youtube */
    $wp_customize->add_setting(
        'travel_diaries_youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_youtube',
        array(
            'label' => __( 'YouTube', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    
    /** OK */
    $wp_customize->add_setting(
        'travel_diaries_odnoklassniki',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_odnoklassniki',
        array(
            'label' => __( 'OK', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    
    /** VK */
    $wp_customize->add_setting(
        'travel_diaries_vk',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_vk',
        array(
            'label' => __( 'VK', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    
    /** Xing */
    $wp_customize->add_setting(
        'travel_diaries_xing',
        array(
            'default' => '',
            'sanitize_callback' => 'travel_diaries_sanitize_url',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_xing',
        array(
            'label' => __( 'Xing', 'travel-diaries' ),
            'section' => 'travel_diaries_social_settings',
            'type' => 'text',
        )
    );
    /** Social Settings Ends */
    
    if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
        /** Custom CSS*/
        $wp_customize->add_section(
            'travel_diaries_custom_settings',
            array(
                'title' => __( 'Custom CSS Settings', 'travel-diaries' ),
                'priority' => 50,
                'capability' => 'edit_theme_options',
            )
        );
        
        $wp_customize->add_setting(
            'travel_diaries_custom_css',
            array(
                'default' => '',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'travel_diaries_sanitize_css'
                )
        );
        
        $wp_customize->add_control(
            'travel_diaries_custom_css',
            array(
                'label' => __( 'Custom Css', 'travel-diaries' ),
                'section' => 'travel_diaries_custom_settings',
                'description' => __( 'Put your custom CSS', 'travel-diaries' ),
                'type' => 'textarea',
            )
        );
        /** Custom CSS Ends */
    }

     /** Footer Section */
    $wp_customize->add_section(
        'travel_diaries_footer_section',
        array(
            'title' => __( 'Footer Settings', 'travel-diaries' ),
            'priority' => 70,
        )
    );
    
    /** Copyright Text */
    $wp_customize->add_setting(
        'travel_diaries_footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'travel_diaries_footer_copyright_text',
        array(
            'label' => __( 'Copyright Info', 'travel-diaries' ),
            'section' => 'travel_diaries_footer_section',
            'type' => 'textarea',
        )
    );
 
    
    /**
     * Sanitization Functions
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
     */ 
    function travel_diaries_sanitize_url( $url ){
        return esc_url_raw( $url );
    }
    
    function travel_diaries_sanitize_checkbox( $checked ){
        // Boolean check.
	   return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
    
    function travel_diaries_sanitize_image( $image, $setting ) {
    	/*
    	 * Array of valid image file types.
    	 *
    	 * The array includes image mime types that are included in wp_get_mime_types()
    	 */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
    	// Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );
    	// If $travel_diaries_image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );
    }
    
    function travel_diaries_sanitize_select( $input, $setting ) {	
    	// Ensure input is a slug.
    	$input = sanitize_key( $input );    	
    	// Get list of choices from the control associated with the setting.
    	$choices = $setting->manager->get_control( $setting->id )->choices;    	
    	// If the input is a valid key, return it; otherwise, return the default.
    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
    
    function travel_diaries_sanitize_css( $css ) {
    	return wp_strip_all_tags( $css );
    }
}
add_action( 'customize_register', 'travel_diaries_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travel_diaries_customize_preview_js() {
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'travel_diaries_customizer', get_template_directory_uri() . '/js' . $build . '/customizer' . $suffix . '.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'travel_diaries_customize_preview_js' );
