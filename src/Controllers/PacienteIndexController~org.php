<?php

namespace tb\controllers;

/**
 * Description of Controller
 *
 * @author imac
 */
class PacienteIndexController {
    
    private $model;
    
    function __construct($model) {
        $this->model = $model;
    }

    // puedo devolver el Model si quiero
    public function __get($param) {
        if(isset($this->{$param})) return $this->{$param};
    }
    
}
