<?php

collect([
    'Render',
    'Visual',
    'ToDoListRequest',
    'ToDoList'
])->each(function($repository) {
    repository($repository);
});


/*
 * Visual Repository shorthand functions
 * ----------------------------------------------------------------------
 */
/**
 * Initialize and return new instance of the Visual Repository
 *
 * @return \Repositories\Visual
 */
function visual()
{
    return new \Repositories\Visual(resources_dir() . '/views');
}


/**
 * Shorthand function for rendering a view
 *
 * @param $view
 * @param array $data
 * @param string $layout
 */
function view($view, $data=[], $layout='master')
{
    visual()->layout($layout)->view($view, $data)->render();
}


/**
 * Shorthand function for rendering a partial
 *
 * @param $partial
 * @param $data
 */
function partial($partial, $data=[])
{
    visual()->partial($partial, $data)->render();
}


function todo_list_requests($post)
{
    return new \Repositories\ToDoListRequest($post);
}

function todo_list($todo_list=null)
{
    return new \Repositories\ToDoList($todo_list);
}
