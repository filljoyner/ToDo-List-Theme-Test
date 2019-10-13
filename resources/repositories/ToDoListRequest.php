<?php

namespace Repositories;

class ToDoListRequest
{
    private $data;

    public function __construct($data)
    {
        $this->data = dot($data);
    }


    public function action($action)
    {
        if($action == 'store') {
            $this->store($this->data);
        }

        if($action == 'delete') {
            $this->delete($this->data);
        }

        if($action == 'store_item') {
            $this->storeItem($this->data);
        }

        if($action == 'update_item_status') {
            $this->updateItemStatus($this->data);
        }
    }


    private function store($data)
    {
        return todo_list()->store([
            'post_title' => sanitize_text_field($data->get('title', false)),
            'post_author' => get_current_user_id()
        ]);
    }


    private function delete($data)
    {
        $todo_list = $this->findForUser(get_current_user_id(), $data->get('id'));

        if(!$todo_list) {
            return null;
        }

        return todo_list()->delete($todo_list->ID);
    }


    private function storeItem($data)
    {
        $todo_list = $this->findForUser(get_current_user_id(), $data->get('todo_list_id'));

        if(!$todo_list) {
            return null;
        }

        $items = todo_list($todo_list)->storeItem(
            sanitize_text_field($data->get('item_title', null))
        );

        partial('to_do/list_items', [
            'todo_list' => $todo_list,
            'list_items' => $items
        ]);
        die();
    }


    private function updateItemStatus($data)
    {
        $todo_list = $this->findForUser(get_current_user_id(), $data->get('todo_list_id'));

        if(!$todo_list) {
            return null;
        }

        todo_list($todo_list)->updateItemStatus($data->get('item_key'), $data->get('checked'));
    }


    private function findForUser($user_id, $list_id)
    {
        $todo_list = todo_list()->find($list_id);

        if(empty($todo_list->post->ID)) {
            return null;
        }

        if($todo_list->post->post_author != $user_id) {
            return null;
        }

        return $todo_list;
    }
}