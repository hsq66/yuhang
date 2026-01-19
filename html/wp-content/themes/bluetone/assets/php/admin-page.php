<?php
if (! defined('ABSPATH')) {
    exit;
}

function realtime_themes_helper_register_menu()
{
    add_menu_page(
        __('Real Time Themes Helper', 'bluetone'),
        __('Real Time Themes Helper', 'bluetone'),
        'manage_options',
        'realtime-themes-helper',
        'realtime_themes_helper_render_admin_page',
        'dashicons-block-default',
        59
    );
}
add_action('admin_menu', 'realtime_themes_helper_register_menu');

function realtime_themes_helper_admin_assets($hook)
{
    if ($hook !== 'toplevel_page_realtime-themes-helper') {
        return;
    }

    wp_enqueue_style(
        'bluetone-style',
        REALTIME_THEMES_HELPER_URL . 'assets/css/style.css'
    );

    wp_enqueue_script(
        'bluetone-script',
        REALTIME_THEMES_HELPER_URL . 'assets/js/script.js',
        array('jquery', 'wp-hooks', 'wp-element'),
        null,
        true
    );

    $theme = wp_get_theme();

    $settings = get_option('realtime_themes_helper_settings', array(
        'allowed_blocks' => array(),
        'theme_uri' => $theme->get('Theme URI') ?: admin_url('themes.php'),
    ));

    wp_localize_script('bluetone-script', 'RealtimeThemesHelper', array(
        'allowedBlocks' => $settings['allowed_blocks'],
        'themeUri' => $theme->get('Theme URI') ?: admin_url('themes.php'),
    ));
}
add_action('admin_enqueue_scripts', 'realtime_themes_helper_admin_assets');


add_action('admin_enqueue_scripts', 'realtime_themes_helper_admin_assets');

function realtime_themes_helper_render_admin_page()
{
    if (! current_user_can('manage_options')) {
        return;
    }
    $theme      = wp_get_theme();
    $settings   = realtime_themes_helper_get_settings();
    $all_blocks = class_exists('WP_Block_Type_Registry') ? WP_Block_Type_Registry::get_instance()->get_all_registered() : array();

    echo '<div class="wrap realtime-themes-helper-wrap">';

    // Intro with video
    echo '<div class="intro2">
        <video autoplay loop muted playsinline class="video-background">
            <source src="https://realtimethemes.com/img/video.mp4" type="video/mp4">
        </video>

        <div class="intro-text">
            <h1>Real Time Themes Helper</h1>
            <p>Manage blocks and patterns simplifying the customization process and even better, purchase this theme in the pro version to increase the styling standard with new patterns, styles and effects.</p>
            <a href="' . esc_url($theme->get('ThemeURI') ?: admin_url('themes.php')) . '" target="_blank">Upgrade to PRO Theme Version</a>
        </div>
    </div>';

    echo '<div class="wrapper-info">'; ?>

    <div class="intro row">
        <div class="col-lg-6">
            <h1 class="theme-title">
                <?php esc_html_e('Bluetone Pro Theme', 'bluetone'); ?>
            </h1>

            <div class="col">
                <p class="pt-3 text-light">Upgrade to the Pro Version and unlock exclusive features by purchasing this
                    theme at a discounted rate today!</p>

                <p></p>
                <p class="text-light">Here's what you'll receive:</p>
                <ul>
                    <li>Access to the Pro version, complete with advanced effects, pre-built pages, and an expanded
                        homepage layout</li>
                    <li>Removal of footer ads for a cleaner, professional look</li>
                    <li>A commercial license granting you full rights to use the Pro version</li>
                </ul>
            </div>

            <a class="bg-color-2" href="<?php echo esc_url(bluetone_PRO_DEMO); ?>" target="_blank">
                <?php esc_html_e('Preview Theme', 'bluetone'); ?>
            </a>
            <a class="bg-color" href="<?php echo esc_url(bluetone_BUY_NOW); ?>" target="_blank">
                <?php esc_html_e('Upgrade to Pro', 'bluetone'); ?>
            </a>
        </div>

        <div class="col-lg-6">
           <video autoplay loop muted playsinline class="video-theme">
                <source src="https://realtimethemes.com/img/produtos/detalhes/bluetone_video.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="features-theme">
        <div class="row">
            <div class="col">
                <h4><?php esc_html_e('Unlock Premium Features', 'bluetone'); ?></h4>
                <p><?php esc_html_e('Unlock the full potential of your website with our Pro theme upgrade.', 'bluetone'); ?></p>
                <a class="bg-color-3" href="<?php echo esc_url(bluetone_BUY_NOW); ?>" target="_blank"><?php esc_html_e('Upgrade Now', 'bluetone'); ?></a>
            </div>
            <div class="col">
                <h4><?php esc_html_e('Only Company with 24h Chat Support & Email', 'bluetone'); ?></h4>
                <p><?php esc_html_e('Enjoy the convenience of round-the-clock customer support with our 24-hour chat and email services. We\'re here for you whenever you need us.', 'bluetone'); ?></p>

            </div>
            <div class="col">
                <h4><?php esc_html_e('+ 30 Costumized Patterns', 'bluetone'); ?></h4>
                <p><?php esc_html_e('Explore our diverse range of over 30 unique patterns, designed to suit your style and preferences.', 'bluetone'); ?></p>

            </div>
            <div class="col">
                <h4><?php esc_html_e('+20 Personalized Pages and Effects', 'bluetone'); ?></h4>
                <p><?php esc_html_e('Transform your website with our selection of +20 personalized pages and effects, tailored to make your online presence truly stand out.', 'bluetone'); ?></p>

            </div>
        </div>

    </div>

<?php echo '</div>';


    echo '<form method="post" action="options.php">';
    settings_fields('realtime_themes_helper_settings_group');
    do_settings_sections('bluetone');

    // Tabs + save button aligned right but outside the border
    echo '<div class="tabs-container" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">';

    // Tabs
    echo '<div class="nav-tab-wrapper" style="border-bottom: 2px solid #dfdfdf; display: flex; gap: 5px;">';
    echo '<a href="#tab-move" class="nav-tab nav-tab-active">' . esc_html__('Block Movement', 'bluetone') . '</a>';

    echo '</div>';

    // Save button outside the tab wrapper
    echo '<div class="save-button-wrapper">';
    submit_button(__('Save Settings', 'bluetone'), 'primary', '', false);
    echo '<input type="submit" name="realtime_themes_helper_reset" value="' . esc_attr__('Reset to Default', 'bluetone') . '" class="button button-secondary" style="margin-left:10px;">';

    echo '</div>';

    echo '</div>';

    // Tab content
    echo '<div id="tab-move" class="tab-content active">';
    echo '<h2>' . esc_html__('Select the blocks you want to ALLOW moving in the editor (all others are blocked).', 'bluetone') . '</h2>';
    echo '<p class="description">' . esc_html__('By default, all blocks are locked. Check the ones you want to allow moving.', 'bluetone') . '</p>';
    echo '<div class="block-grid">';

    $index = 0;
    foreach ($all_blocks as $name => $obj) {
        $allowed = in_array($name, $settings['allowed_blocks'], true) ? 'checked' : '';
        $id      = 'allow-move-' . $index;

        echo '<input type="checkbox" id="' . esc_attr($id) . '" name="realtime_themes_helper_settings[allowed_blocks][]" value="' . esc_attr($name) . '" ' . $allowed . ' />';
        echo '<label class="block-card" for="' . esc_attr($id) . '">';
        echo '<span class="block-name">' . esc_html($name) . '</span>';
        echo '</label>';

        $index++;
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '</form>';
    echo '</div>';
}

function realtime_themes_helper_register_settings()
{
    register_setting(
        'realtime_themes_helper_settings_group',
        'realtime_themes_helper_settings',
        array(
            'sanitize_callback' => 'realtime_themes_helper_sanitize_settings',
        )
    );
}
add_action('admin_init', 'realtime_themes_helper_register_settings');

function realtime_themes_helper_sanitize_settings($input)
{
    if (isset($_POST['realtime_themes_helper_reset'])) {
        return array(
            'allowed_blocks' => array(),
        );
    }

    $output = array(
        'allowed_blocks'  => array(),
    );

    if (isset($input['allowed_blocks']) && is_array($input['allowed_blocks'])) {
        $output['allowed_blocks'] = array_map('sanitize_text_field', $input['allowed_blocks']);
    }

    return $output;
}
