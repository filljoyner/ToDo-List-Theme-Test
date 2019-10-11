<?php

partial('global/footer', [
    'nav' => wp_nav_menu([
        'theme_location' => 'footer_primary',
        'container' => false,
        'menu_class' => 'menu',
        'echo' => false
    ])
]);

