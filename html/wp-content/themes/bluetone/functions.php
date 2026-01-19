<?php

function bluetone_theme_script() {
	wp_enqueue_script('file-js1', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'bluetone_theme_script');

require get_stylesheet_directory() . '/inc/block-patterns.php';
require get_stylesheet_directory() . '/inc/customizer.php';

if (class_exists('WP_Customize_Section')) {
	class Bluetone_Upsell_Section extends WP_Customize_Section {
		public $type = 'bluetone-upsell';
		public $button_text = '';
		public $url = '';
		public $background = '';
		public $text_color = '';

		protected function render() {
			$background = !empty($this->background) ? esc_attr($this->background) : 'linear-gradient(90deg,rgb(0,0,0) 0%,rgb(0,0,0) 35%,rgb(0,0,0) 70%,rgb(0,0,0) 100%)';
			$text_color = !empty($this->text_color) ? esc_attr($this->text_color) : '#fff';
			?>
			<li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="bluetone_upsell_section accordion-section control-section control-section-<?php echo esc_attr($this->id); ?> cannot-expand">
				<h3 class="accordion-section-title" style="border:0;color:#fff;background:<?php echo esc_attr($background); ?>;">
					<?php echo esc_html($this->title); ?>
					<a href="<?php echo esc_url($this->url); ?>" class="button button-secondary alignright" target="_blank" style="margin-top:-4px;"><?php echo esc_html($this->button_text); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}

function bluetone_theme_setup() {
	register_nav_menus(array(
		'primary_menu' => __('Primary Menu', 'bluetone'),
	));
}
add_action('after_setup_theme', 'bluetone_theme_setup');

function bluetone_create_page_if_not_exists($title, $slug) {
	if ($slug === '404') return null;
	$page = get_page_by_path($slug);
	if (!$page) {
		$page_id = wp_insert_post(array(
			'post_title' => $title,
			'post_name' => $slug,
			'post_status' => 'publish',
			'post_type' => 'page',
		));
		return $page_id;
	} else {
		return $page->ID;
	}
}

function bluetone_create_or_update_menus() {
	$menu_exists = wp_get_nav_menu_object('Primary Menu');
	if ($menu_exists) wp_delete_nav_menu($menu_exists->term_id);

	$menu_id = wp_create_nav_menu('Primary Menu');
	$pages_to_create = array(
		array('Home', '/home', 'home'),
		array('Blog', '/blog', 'blog'),
		array('About', '/about', 'about'),
		array('Reviews', '/reviews', 'reviews'),
		array('FAQ', '/faq', 'faq'),
		array('Contact', '/contact', 'contact'),
	);

	foreach ($pages_to_create as $item) {
		$page_id = bluetone_create_page_if_not_exists($item[0], $item[2]);
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title' => esc_html($item[0]),
			'menu-item-url' => get_permalink($page_id),
			'menu-item-status' => 'publish',
		));
	}

	$locations = get_theme_mod('nav_menu_locations');
	$locations['primary_menu'] = $menu_id;
	set_theme_mod('nav_menu_locations', $locations);
}
add_action('after_setup_theme', 'bluetone_create_or_update_menus');

define('bluetone_BUY_NOW', 'https://realtimethemes.com/theme/bluetone');
define('bluetone_PRO_DEMO', 'https://preview.realtimethemes.com/bluetone/');
define('bluetone_REVIEW', 'https://realtimethemes.com/theme/bluetone');
define('bluetone_SUPPORT', 'https://realtimethemes.com/');

function bluetone_admin_notice() {
	if (get_option('bluetone_notice_dismissed')) return;
	?>
	<div class="notice notice-success is-dismissible bluetone-notice">
		<p style="color: #000;"><strong><?php esc_html_e( 'Bluetone Theme:', 'bluetone' ); ?></strong> <?php esc_html_e( 'Discover the Pro version with exclusive features!', 'bluetone' ); ?></p>
	</div>
	<script>
		jQuery(document).on('click', '.bluetone-notice .notice-dismiss', function() {
			jQuery.post(ajaxurl, { action: 'bluetone_dismiss_notice' });
		});
	</script>
	<?php
}
add_action('admin_notices', 'bluetone_admin_notice');

function bluetone_dismiss_notice() {
	update_option('bluetone_notice_dismissed', true);
	wp_die();
}
add_action('wp_ajax_bluetone_dismiss_notice', 'bluetone_dismiss_notice');



// AD

if (! defined('REALTIME_THEMES_HELPER_PATH')) {
    define(
        'REALTIME_THEMES_HELPER_PATH',
        get_stylesheet_directory() . '/'
    );
}
if (! defined('REALTIME_THEMES_HELPER_URL')) {
    define('REALTIME_THEMES_HELPER_URL', get_stylesheet_directory_uri() .
        '/');
}
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style(
        'my-font',
        'https://fonts.googleapis.com/css2?
family=Bai+Jamjuree:wght@400;600;700&display=swap',
        [],
        null
    );
});
/**
 * Theme button admin bar
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
    if (! current_user_can('manage_options')) {
        return;
    }
    $wp_admin_bar->add_node([
        'id' => 'real_time_themes_helper_button2',
        'title' => '<span style="
color:#fff;
background:#000;
padding:0px 8px;
height: 100%;
font-weight: 700;
display: flex;
align-items: center;
gap: 5px;
width: 100%;
justify-content: center
">
<img src="http://realtimethemes.com/img/realtimethemes_logo.png"
alt="Real Time Themes Logo"
style="height: 15px; width: auto; object-fit: cover;" />
Real Time Themes Helper
</span>',
        'href' => admin_url('admin.php?page=realtime-themes-helper'),
        'meta' => [
            'class' => 'realtime-themes-helper-button',
            'title' => 'Open Real Time Themes Helper',
            'target' => '_blank',
        ]
    ]);
}, 100);
/**
 * Scripts
 */
add_action('enqueue_block_editor_assets', function () {
    $theme = wp_get_theme();
    if ($theme->parent()) {
        $theme = $theme->parent();
    }
    $theme_uri = $theme->get('ThemeURI');
    $settings = get_option('realtime_themes_helper_settings', [
        'allowed_blocks' => [],
    ]);
    wp_enqueue_script(
        'realtime-themes-helper-editor',
        get_stylesheet_directory_uri() . '/assets/js/script.js',
        ['wp-hooks', 'wp-element', 'wp-edit-post'],
        filemtime(get_stylesheet_directory() . '/assets/js/script.js'),
        true
    );
    error_log('Theme URI detectado: ' . $theme_uri);
    wp_localize_script(
        'realtime-themes-helper-editor',
        'RealtimeThemesHelper',
        ['allowedBlocks' => $settings['allowed_blocks'], 'themeUri' =>
        $theme_uri]
    );
}, 20);
$files = [
    'settings.php',
    'admin-page.php',
];
foreach ($files as $file) {
    $path = REALTIME_THEMES_HELPER_PATH . 'assets/php/' . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}
// remover notice
if (
    isset($_GET['page']) && $_GET['page'] === 'realtime-themes-helper'
) {
    return;
}
