<?php 

/**
 * Customizer
 * 
 * @package WordPress
 * @subpackage bluetone
 * @since bluetone1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bluetone_customize_register( $wp_customize ) {
	$wp_customize->add_section( new Bluetone_Upsell_Section($wp_customize,'upsell_section',array(
		'title'            => __( 'Bluetone', 'bluetone' ),
		'button_text'      => __( 'Upgrade Pro', 'bluetone' ),
		'url'              => esc_url( bluetone_BUY_NOW ),
		'priority'         => 0,
	)));
}
add_action( 'customize_register', 'bluetone_customize_register' );

/**
 * Enqueue script for custom customize control.
 */
function bluetone_custom_control_scripts() {
	wp_enqueue_script( 'bluetone-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'bluetone_custom_control_scripts' );
?>