<?php
require_once get_template_directory() . '/includes/welcome/welcome-page.php';

function topscene_show_welcome_notice() {

    if (!is_admin()) {
        return;
    }
    /**
     * Dismiss notice
     */
    if (get_user_meta(get_current_user_id(), 'topscene_notice_dismissed', true)) {
        return;
    }

    global $pagenow;
    if ($pagenow === 'themes.php' && isset($_GET['activated'])) {

        $theme = wp_get_theme();
        $theme_name = esc_html($theme->get('Name'));
        $welcome_url = esc_url(admin_url('themes.php?page=topscene-welcome'));
        $theme_url = esc_url('https://themesmachine.com/index.php/product/topscene/');

        echo '<div class="notice notice-success is-dismissible topscene-notice">
            <p><strong>' . sprintf(__('Thanks for activating %s!', 'topscene'), $theme_name) . '</strong></p>
            <p>' . esc_html__('Check the Welcome Page to learn how to get started with the theme.', 'topscene') . '</p>
            <p>
                <a href="' . $welcome_url . '" class="button button-primary">' . esc_html__('Welcome Page', 'topscene') . '</a>
                <a href="' . $theme_url . '" class="button" target="_blank" rel="noopener">' . esc_html__('Theme Page', 'topscene') . '</a>
            </p>
        </div>';
    }
}
add_action('admin_notices', 'topscene_show_welcome_notice');


/**
 * Save dismiss
 */
function topscene_dismiss_notice()
{
    update_user_meta(get_current_user_id(), 'topscene_notice_dismissed', true);
    wp_send_json_success();
}
add_action('wp_ajax_topscene_dismiss_notice', 'topscene_dismiss_notice');


/**
 * Dismiss js
 */
function topscene_show_welcome_notice_script($hook)
{
    if ($hook !== 'themes.php') {
        return;
    }
    ?>
    <script>
    jQuery(document).on('click', '.topscene-notice .notice-dismiss', function () {
        jQuery.post(ajaxurl, { action: 'topscene_dismiss_notice' });
    });
    </script>
    <?php
}
add_action('admin_footer', 'topscene_show_welcome_notice_script');

