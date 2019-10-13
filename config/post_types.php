<?php

/*
 * Create custom Post Types
 */
wpm('wp.post_type')->create([
    'name' => 'To Do List',
    'icon' => 'dashicons-yes-alt'
]);