<?php

namespace Repositories;


class Visual
{
    private $base_path;
    private $render;
    private $layout = 'master';
    private $post;
    private $view;
    private $partial;
    private $data;


    public function __construct($base_path)
    {
        $this->base_path = $base_path;
        $this->render = new Render($this->base_path);
    }


    public function post($post)
    {
        $this->post = $post;
        return $this;
    }


    public function layout($layout)
    {
        $this->layout = $layout;
        return $this;
    }


    public function view($view, $data=[])
    {
        $this->view = $view;
        $this->data = $data;
        return $this;
    }


    public function partial($partial, $data=[])
    {
        $this->partial = $partial;
        $this->data = $data;
        return $this;
    }


    public function render()
    {
        if($this->view) {
            $this->render->view($this->post, $this->layout, $this->view, $this->data);
        } else {
            $this->render->partial($this->post, $this->partial, $this->data);
        }
    }
}
