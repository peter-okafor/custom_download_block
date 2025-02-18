<?php
/**
 * Plugin Name: Custom Download Block
 * Description: A Gutenberg block for a Download PDF button with an SVG icon.
 * Version: 1.0
 * Author: Peter Okafor
 */

if (!defined('ABSPATH')) {
    exit;
}

// Register block
function register_custom_download_block() {
    wp_register_script(
        'custom-download-block-editor',
        plugins_url('block.js', __FILE__),
        array('wp-blocks', 'wp-editor', 'wp-element'),
        filemtime(plugin_dir_path(__FILE__) . 'block.js')
    );

    register_block_type('custom/download-button', array(
        'editor_script' => 'custom-download-block-editor',
        'render_callback' => 'render_custom_download_block'
    ));
}

add_action('init', 'register_custom_download_block');

function render_custom_download_block($attributes) {
    $url = esc_url($attributes['url'] ?? '#');
    return '<a href="' . $url . '" class="btn-text">
                <p>Download PDF</p>
                <img src="' . plugin_dir_url(__FILE__) . 'arrow-right.svg" alt="Go" />
            </a>';
}
