<?php

/**
 * Helper Functions
 * -----------------------------------------------------------
 */

/**
 * Checks if a given string is json
 * @param $string
 * @return bool
 */
function is_json($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}


/**
 * Useful if swapping out all nav calls. If bootstrap 3 or 4 is in
 * use, use the bootstrap nav menu call. If not, use wordpress
 * wp_nav_menu function.
 *
 * @param $options
 *
 * @return false|string|void
 */
function wp_menu($options)
{
    $options['echo'] = false;

    if(function_exists('bootstrap_nav_menu')) {
        return bootstrap_nav_menu($options);
    }

    return wp_nav_menu($options);
}


/**
 * Redirect to a given URL
 *
 * @param String $url
 * @return void
 */
function redirect($url)
{
    header('Location: ' . $url);
    exit;
}


/**
 * Return the theme's img directory
 *
 * @return String
 */
function img_src($file)
{
    return theme_url() . '/assets/img/' . $file;
}


/**
 * Return the theme url
 *
 * @return String
 */
function theme_url()
{
    return get_template_directory_uri();
}


/**
 * Return the theme directory
 *
 * @return String
 */
function theme_dir()
{
    return get_template_directory();
}


/**
 * Return resources directory path
 *
 * @return string
 */
function resources_dir()
{
    return theme_dir() . '/resources';
}


/**
 * Return packages directory path
 *
 * @return string
 */
function packages_dir()
{
    return theme_dir() . '/resources/packages';
}


/**
 * Load a package
 *
 * @param $package_name
 */
function package($package_name)
{
    include packages_dir() . '/' . $package_name . '/' . $package_name . '.php';
}


/**
 * Get repository directory
 *
 * @return string
 */
function repository_dir()
{
    return theme_dir() . '/resources/repositories';
}


/**
 * Load repository
 *
 * @param $repository
 */
function repository($repository)
{
    require_once repository_dir() . '/' . $repository . '.php';
}
