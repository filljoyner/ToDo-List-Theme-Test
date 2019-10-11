<?php

namespace Repositories;


class Render
{
    private $base_path;
    private $post;


    public function __construct($base_path, $post=null)
    {
        $this->base_path = $base_path;
        $this->post = $post;
    }
    
    
    public function view($post, $layout, $view, $data)
    {
        $this->generateLayout($layout, [
            'data' => $data,
            'content' => function() use ($post, $view, $data) {
                $this->post($post);
                $this->generateView($view, $data);
            }
        ]);
    }


    public function partial($post, $view, $data)
    {
        $this->post($post);
        $this->generatePartial($view, $data);
    }


    private function post($post=null)
    {
        if (!$post) {
            global $post;
        }
        setup_postdata($post);
    }


    private function generateLayout($layout, $data)
    {
        $this->extractor('layouts/' . $layout, $data);
    }


    private function generateView($view, $data)
    {
        $this->extractor($view, $data);
    }


    private function generatePartial($path, $data=[])
    {
        $this->extractor('partials/' . $path, $data);
    }


    private function extractor($path, $data=[])
    {
        extract($data);
        include $this->base_path . '/' . $path . '.php';
    }
}