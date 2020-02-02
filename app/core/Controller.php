<?php
class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    //function model
    public function model($model)
    {
        //panggil model yg ada di file model
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
