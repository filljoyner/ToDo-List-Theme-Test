<?php

/**
 * Queue and register scripts.
 */
wpm('wp.action')->add('wp_enqueue_scripts', function () {
    // scripts
    wp_enqueue_script('bootstrap', theme_url() . '/assets/js/vendor/bootstrap.min.js', ['jquery'], '', true);
    wp_enqueue_script('site', theme_url() . '/assets/js/site.js', ['jquery'], '', true);

    // styles
    wp_enqueue_style('site', theme_url() . '/assets/css/site.css', '', '', 'all');
});


/**
 * Navigation menus
 */
wpm('wp.action')->add('after_setup_theme', function () {
    // Add primary WordPress menu.
    register_nav_menu('header_primary', __('Header - Primary', 'wpm'));
    register_nav_menu('footer_primary', __('Footer - Primary', 'wpm'));
});


/**
 * Theme support features
 */
wpm('wp.action')->add('after_setup_theme', function () {
    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);

    // Add support for post formats.
    //add_theme_support('post-formats', ['aside', 'audio', 'gallery', 'image', 'link', 'quote', 'video']);

    // Add post thumbnails support.
    //add_theme_support('post-thumbnails');
});
