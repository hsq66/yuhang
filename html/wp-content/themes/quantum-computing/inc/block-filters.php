<?php
/**
 * Block Filters
 *
 * @package quantum_computing
 * @since 1.0
 */

function quantum_computing_block_wrapper( $quantum_computing_block_content, $quantum_computing_block ) {

	if ( 'core/button' === $quantum_computing_block['blockName'] ) {
		
		if( isset( $quantum_computing_block['attrs']['className'] ) && strpos( $quantum_computing_block['attrs']['className'], 'has-arrow' ) ) {
			$quantum_computing_block_content = str_replace( '</a>', quantum_computing_get_svg( array( 'icon' => esc_attr( 'caret-circle-right' ) ) ) . '</a>', $quantum_computing_block_content );
			return $quantum_computing_block_content;
		}
	}

	if( ! is_single() ) {
	
		if ( 'core/post-terms'  === $quantum_computing_block['blockName'] ) {
			if( 'post_tag' === $quantum_computing_block['attrs']['term'] ) {
				$quantum_computing_block_content = str_replace( '<div class="taxonomy-post_tag wp-block-post-terms">', '<div class="taxonomy-post_tag wp-block-post-terms flex">' . quantum_computing_get_svg( array( 'icon' => esc_attr( 'tags' ) ) ), $quantum_computing_block_content );
			}

			if( 'category' ===  $quantum_computing_block['attrs']['term'] ) {
				$quantum_computing_block_content = str_replace( '<div class="taxonomy-category wp-block-post-terms">', '<div class="taxonomy-category wp-block-post-terms flex">' . quantum_computing_get_svg( array( 'icon' => esc_attr( 'category' ) ) ), $quantum_computing_block_content );
			}
			return $quantum_computing_block_content;
		}
		if ( 'core/post-date' === $quantum_computing_block['blockName'] ) {
			$quantum_computing_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . quantum_computing_get_svg( array( 'icon' => esc_attr( 'calendar' ) ) ), $quantum_computing_block_content );
			return $quantum_computing_block_content;
		}
		if ( 'core/post-author' === $quantum_computing_block['blockName'] ) {
			$quantum_computing_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . quantum_computing_get_svg( array( 'icon' => esc_attr( 'user' ) ) ), $quantum_computing_block_content );
			return $quantum_computing_block_content;
		}
	}
	if( is_single() ){

		// Add chevron icon to the navigations
		if ( 'core/post-navigation-link' === $quantum_computing_block['blockName'] ) {
			if( isset( $quantum_computing_block['attrs']['type'] ) && 'previous' === $quantum_computing_block['attrs']['type'] ) {
				$quantum_computing_block_content = str_replace( '<span class="post-navigation-link__label">', '<span class="post-navigation-link__label">' . quantum_computing_get_svg( array( 'icon' => esc_attr( 'prev' ) ) ), $quantum_computing_block_content );
			}
			else {
				$quantum_computing_block_content = str_replace( '<span class="post-navigation-link__label">Next Post', '<span class="post-navigation-link__label">Next Post' . quantum_computing_get_svg( array( 'icon' => esc_attr( 'next' ) ) ), $quantum_computing_block_content );
			}
			return $quantum_computing_block_content;
		}
		if ( 'core/post-date' === $quantum_computing_block['blockName'] ) {
            $quantum_computing_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . quantum_computing_get_svg( array( 'icon' => 'calendar' ) ), $quantum_computing_block_content );
            return $quantum_computing_block_content;
        }
		if ( 'core/post-author' === $quantum_computing_block['blockName'] ) {
            $quantum_computing_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . quantum_computing_get_svg( array( 'icon' => 'user' ) ), $quantum_computing_block_content );
            return $quantum_computing_block_content;
        }

	}
    return $quantum_computing_block_content;
}
	
add_filter( 'render_block', 'quantum_computing_block_wrapper', 10, 2 );
