<?php
/**
 * Register Post Slider section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'dynamicnews_customize_register_slider_settings' );

function dynamicnews_customize_register_slider_settings( $wp_customize ) {

	// Add Sections for Slider Settings
	$wp_customize->add_section( 'dynamicnews_section_slider', array(
        'title'    => __( 'Post Slider', 'dynamic-news-lite' ),
        'priority' => 50,
		'panel' => 'dynamicnews_options_panel' 
		)
	);

	// Add settings and controls for Post Slider
	$wp_customize->add_setting( 'dynamicnews_theme_options[slider_activated]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Dynamic_News_Customize_Header_Control(
        $wp_customize, 'dynamicnews_control_slider_activated', array(
            'label' => __( 'Activate Post Slider', 'dynamic-news-lite' ),
            'section' => 'dynamicnews_section_slider',
            'settings' => 'dynamicnews_theme_options[slider_activated]',
            'priority' => 1
            )
        )
    );
	$wp_customize->add_setting( 'dynamicnews_theme_options[slider_activated_front_page]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'dynamicnews_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'dynamicnews_control_slider_activated_frontpage', array(
        'label'    => __( 'Show Slider on Magazine Homepage', 'dynamic-news-lite' ),
        'section'  => 'dynamicnews_section_slider',
        'settings' => 'dynamicnews_theme_options[slider_activated_front_page]',
        'type'     => 'checkbox',
		'priority' => 2
		)
	);
	$wp_customize->add_setting( 'dynamicnews_theme_options[slider_activated_blog]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'dynamicnews_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'dynamicnews_control_slider_activated_blog', array(
        'label'    => __( 'Show Slider on posts page', 'dynamic-news-lite' ),
        'section'  => 'dynamicnews_section_slider',
        'settings' => 'dynamicnews_theme_options[slider_activated_blog]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);

	// Select Featured Posts
	$wp_customize->add_setting( 'dynamicnews_theme_options[featured_posts_header]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Dynamic_News_Customize_Header_Control(
        $wp_customize, 'dynamicnews_control_featured_posts_header', array(
            'label' => __( 'Select Featured Posts', 'dynamic-news-lite' ),
            'section' => 'dynamicnews_section_slider',
            'settings' => 'dynamicnews_theme_options[featured_posts_header]',
            'priority' => 3,
			'active_callback' => 'dynamicnews_slider_activated_callback'
            )
        )
    );
	$wp_customize->add_setting( 'dynamicnews_theme_options[featured_posts_description]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Dynamic_News_Customize_Description_Control(
        $wp_customize, 'dynamicnews_control_featured_posts_description', array(
			'label'    => __( 'The slideshow displays all your featured posts. You can easily feature posts by a tag of your choice.', 'dynamic-news-lite' ),
            'section' => 'dynamicnews_section_slider',
            'settings' => 'dynamicnews_theme_options[featured_posts_description]',
            'priority' => 4,
			'active_callback' => 'dynamicnews_slider_activated_callback'
            )
        )
    );
	
	// Add Slider Animation Setting
	$wp_customize->add_setting( 'dynamicnews_theme_options[slider_animation]', array(
        'default'           => 'horizontal',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'dynamicnews_sanitize_slider_animation'
		)
	);
    $wp_customize->add_control( 'dynamicnews_control_slider_animation', array(
        'label'    => __( 'Slider Animation', 'dynamic-news-lite' ),
        'section'  => 'dynamicnews_section_slider',
        'settings' => 'dynamicnews_theme_options[slider_animation]',
        'type'     => 'radio',
		'priority' => 8,
		'active_callback' => 'dynamicnews_slider_activated_callback',
        'choices'  => array(
            'horizontal' => __( 'Slide Effect', 'dynamic-news-lite' ),
            'fade' => __( 'Fade Effect', 'dynamic-news-lite' )
			)
		)
	);
	
}

?>