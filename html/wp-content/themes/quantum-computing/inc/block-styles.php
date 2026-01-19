<?php
/**
 * Block Styles
 *
 * @package quantum_computing
 * @since 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	function quantum_computing_register_block_styles() {

		//Wp Block Padding Zero
		register_block_style(
			'core/group',
			array(
				'name'  => 'quantum-computing-padding-0',
				'label' => esc_html__( 'No Padding', 'quantum-computing' ),
			)
		);

		//Wp Block Post Author Style
		register_block_style(
			'core/post-author',
			array(
				'name'  => 'quantum-computing-post-author-card',
				'label' => esc_html__( 'Theme Style', 'quantum-computing' ),
			)
		);

		//Wp Block Button Style
		register_block_style(
			'core/button',
			array(
				'name'         => 'quantum-computing-button',
				'label'        => esc_html__( 'Plain', 'quantum-computing' ),
			)
		);

		//Post Comments Style
		register_block_style(
			'core/post-comments',
			array(
				'name'         => 'quantum-computing-post-comments',
				'label'        => esc_html__( 'Theme Style', 'quantum-computing' ),
			)
		);

		//Latest Comments Style
		register_block_style(
			'core/latest-comments',
			array(
				'name'         => 'quantum-computing-latest-comments',
				'label'        => esc_html__( 'Theme Style', 'quantum-computing' ),
			)
		);


		//Wp Block Table Style
		register_block_style(
			'core/table',
			array(
				'name'         => 'quantum-computing-wp-table',
				'label'        => esc_html__( 'Theme Style', 'quantum-computing' ),
			)
		);


		//Wp Block Pre Style
		register_block_style(
			'core/preformatted',
			array(
				'name'         => 'quantum-computing-wp-preformatted',
				'label'        => esc_html__( 'Theme Style', 'quantum-computing' ),
			)
		);

		//Wp Block Verse Style
		register_block_style(
			'core/verse',
			array(
				'name'         => 'quantum-computing-wp-verse',
				'label'        => esc_html__( 'Theme Style', 'quantum-computing' ),
			)
		);
	}
	add_action( 'init', 'quantum_computing_register_block_styles' );
}
