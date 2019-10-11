<?php

partial('global/header', [
    'site_title' => get_bloginfo('name'),

    'nav' => wp_menu([
        'theme_location' => 'header_primary',
        'container' => false,
        'menu_class' => 'navbar-nav mr-auto'
    ])
]);



