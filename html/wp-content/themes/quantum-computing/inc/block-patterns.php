<?php
/**
 * Block Patterns
 *
 * @package quantum_computing
 * @since 1.0
 */

function quantum_computing_register_block_patterns() {
	$quantum_computing_block_pattern_categories = array(
		'quantum-computing' => array( 'label' => esc_html__( 'Quantum Computing', 'quantum-computing' ) ),
		'pages' => array( 'label' => esc_html__( 'Pages', 'quantum-computing' ) ),
	);

	$quantum_computing_block_pattern_categories = apply_filters( 'quantum_computing_quantum_computing_block_pattern_categories', $quantum_computing_block_pattern_categories );

	foreach ( $quantum_computing_block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'quantum_computing_register_block_patterns', 9 );