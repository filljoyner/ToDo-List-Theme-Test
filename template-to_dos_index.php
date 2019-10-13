<?php 
/*
Template Name: To Do - Index
*/

view('to_do-index',[
    'todo_lists' => todo_list()->byUser(get_current_user_id())->get()
]);
