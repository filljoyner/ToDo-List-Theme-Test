<?php

$includes = collect([
    'post_types',
    'helpers',
    'repositories',
    'actions',
    'filters'
])->each(function($include) {
    require_once __DIR__ . '/' . $include . '.php';
});
