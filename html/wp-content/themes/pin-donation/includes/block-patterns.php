<?php
/**
 * Pin Donation : Block Patterns
 *
 * @since Pin Donation 1.0
 */

function pin_donation_patterns_register_block_patterns() {
	$block_pattern_categories = array(
		'pin-donation' => array( 'label' => __( 'Pin Donation', 'pin-donation' ) ),
		'pin-donation-other-patterns' => array( 'label' => __( 'Pin Donation Theme Other Patterns', 'pin-donation' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Pin Donation 1.0
	 *
	 */
	$block_pattern_categories = apply_filters( 'pin_donation_patterns_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties ); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern_category
		}
	}

	$block_patterns = array(
		'pin-donation-header',	
		'pin-donation-hero-banner',
		'pin-donation-section1',
		'pin-donation-section2',
		'pin-donation-section3',
		'pin-donation-section4',
		'pin-donation-footer',	
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Pin Donation 1.0
	 * 
	 * @param array $block_patterns List of block patterns by name.
	 *
	 */
	$block_patterns = apply_filters( 'pin_donation_patterns_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/includes/patterns/' . $block_pattern . '.php' );

		register_block_pattern( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern
			'pin-donation/' . $block_pattern,
			require $pattern_file // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		);
	}
}
add_action( 'init', 'pin_donation_patterns_register_block_patterns', 9 );
