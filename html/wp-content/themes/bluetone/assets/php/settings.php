<?php
function realtime_themes_helper_get_settings() {
    $defaults = array(
        'allowed_blocks' => array(),
    );

    $stored = get_option( 'realtime_themes_helper_settings', array() );

    if ( ! is_array( $stored ) ) {
        $stored = array();
    }

    return wp_parse_args( $stored, $defaults );
}
