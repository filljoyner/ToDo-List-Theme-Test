<?php

/**
 * Helper Functions
 * -----------------------------------------------------------
 */
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
 * Sets up post data so that the_* and get_* wordpress functions
 * will use the provided or global post outside of "the_loop"
 *
 * @params $post
 * @return void
 */
function set_post($post = null)
{
    if (!$post) {
        global $post;
    }
    setup_postdata($post);
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
 * Return the theme's img directory
 *
 * @return String
 */
function img_src($file)
{
    return theme_url() . '/assets/img/' . $file;
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
 * @param $path
 */
function package($package_name)
{
    include packages_dir() . '/' . $package_name . '/' . $package_name . '.php';
}


function render($view, $data=[], $layout='master')
{
    layout($layout, [
        'data' => $data,
        'content' => function() use ($view, $data) {
            set_post();
            view($view, $data);
        }
    ]);
}


function layout($layout, $data)
{
    extract($data);
    include resources_dir() . '/views/layouts/' . $layout . '.php';
}


/**
 * Call in a partial file with default directory routing
 *
 * @param $path
 * @param array $data
 */
function view($path, $data=[])
{
    extract($data);
    include resources_dir() . '/views/' . $path . '.php';
}


/**
 * Call in a partial file with default directory routing
 *
 * @param $path
 * @param null $file
 */
function partial($path, $data=[])
{
    extract($data);
    include resources_dir() . '/views/partials/' . $path . '.php';
}
