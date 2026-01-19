<?php
/**
 * Customize Section 
 *
 * @package WordPress
 * @subpackage 
 * @since topscene 1.0
 */

function topscene_register_upsell_section( $wp_customize ) {
	if ( class_exists( 'WP_Customize_Section' ) ) {
		$wp_customize->add_section( new Topscene_Upsell_Section( $wp_customize, 'get_pro_section', array(
			'title'       => __( 'Unlock Topscene Full Features', 'topscene' ),
			'button_text' => __( 'Go Pro', 'topscene' ),
			'url'         => esc_url( 'https://q8labs.shop/theme/topscene/' ),
			'priority'    => 1,
		) ) );
	}
}
add_action( 'customize_register', 'topscene_register_upsell_section' );

if ( class_exists( 'WP_Customize_Section' ) ) {
	class Topscene_Upsell_Section extends WP_Customize_Section {
		public $type = 'topscene-upsell';
		public $button_text = '';
		public $url = '';
		public $background = '';
		public $text_color = '';

		protected function render() {
			$background = $this->background ? esc_attr( $this->background ) : '#FCFCFC';
			$text_color = $this->text_color ? esc_attr( $this->text_color ) : '#1a1a1a';
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="topscene_upsell_section accordion-section control-section cannot-expand">
				<div style="padding: 20px; background: <?php echo $background; ?>;">
					<p style="margin: 0; text-transform: uppercase; font-weight: 700; color: <?php echo $text_color; ?>;"><?php echo esc_html( $this->title ); ?></p>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button-link" target="_blank" style="display: inline-block; margin: 8px auto; padding: 12px 16px; text-transform: uppercase; background: #1a1a1a; color: #EAF2EF; text-decoration: none;"><?php echo esc_html( $this->button_text ); ?></a>
				</div>
			</li>
			<?php
		}
	}
}

function topscene_enqueue_upsell_script() {
	wp_enqueue_script(
		'topscene-upsell',
		get_template_directory_uri() . '/includes/upgrade-upsell.js',
		array( 'jquery', 'customize-controls' ),
		'1.1',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'topscene_enqueue_upsell_script' );
