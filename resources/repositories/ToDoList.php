<?php

namespace Repositories;


class ToDoList
{
    private $todo_list;


    public function __construct($todo_list=[])
    {
        $this->todo_list = $todo_list;
        $this->q = wpm('q.todolist');
    }


    public function byUser($user_id)
    {
        $this->q->author($user_id);
        return $this;
    }


    public function get()
    {
        return $this->q->get();
    }


    public function find($id)
    {
        return $this->q->find($id);
    }


    public function store($vars)
    {
        return wp_insert_post(array_merge($vars, [
            'post_type' => 'todolist',
            'post_status' => 'publish'
        ]));
    }


    public function delete($id)
    {
        return wp_delete_post($id);
    }


    public function storeItem($title)
    {
        $items = $this->getItems();

        $items[] = [
            'title' => $title,
            'checked' => false
        ];

        return $this->storeItems($items);
    }


    public function updateItemStatus($item_key, $checked)
    {
        $items = $this->getItems();

        if(isset($items[$item_key])) {
            $items[$item_key]['checked'] = $checked;
        }

        $this->storeItems($items);
    }


    public function getItems()
    {
        $items = get_post_meta($this->todo_list->post->ID, 'list_items', true);

        if(!is_json($items)) {
            return [];
        }

        return json_decode($items, true);
    }


    public function storeItems($items)
    {
        $items = array_values($items);
        update_post_meta($this->todo_list->post->ID, 'list_items', json_encode($items));
        return $items;
    }
}