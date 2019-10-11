<?php

/**
 * Bootstrap 4 Nav Walker
 */
// bootstrap nav walker for bootstrap menus
require_once __DIR__ . '/libs/BootstrapNavWalker.php';

/**
 * Theme Features & Functions
 */
// create a wp_nav_menu with bootstrap walker
function bootstrap_nav_menu($options)
{
    return wp_nav_menu(array_merge([
        'container'   => false,
        'depth'       => 2,
        'menu_class'  => 'nav navbar-nav',
        'walker'      => new Bootstrap\BootstrapNavWalker(),
        'fallback_cb' => 'Bootstrap\BootstrapNavWalker::fallback',
        'echo'        => false
    ], $options));
}
