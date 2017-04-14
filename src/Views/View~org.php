<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tb\views;

use tb\models\Model;
/**
 * Description of View
 *
 * @author imac
 */
class View {
    
    private $model;
    
    function __construct(Model $model) {

        $this->model = $model;

    }
    
    public function output() {
        return '<h1><a href="index.php?action=textclicked">' . $this->model->text . '</h1>';
    }

    public function __get($param) {
        return $this->{$param};        
    }
}
