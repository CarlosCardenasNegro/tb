<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tb\controllers;

/**
 * Description of Controller
 *
 * @author imac
 */
class Controller {
    
    private $model;
    
    function __construct($model) {
        $this->model = $model;
    }

    public function textClicked() {
        
        $this->model->text = 'Text Updated';
    }

    public function __get($param) {
        return $this->{$param};        
    }
    
}
