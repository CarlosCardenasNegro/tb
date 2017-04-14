<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tb\core;

/**
 * Description of Route
 *
 * @author imac
 */
class Route {

    private $model;
    private $view;
    private $controller;
    private $baseDir;

    public function __construct($model = null, $view = null, $controller = null, $baseDir = null) {
        $this->model = $model;
        $this->view = $view;
        $this->controller = $controller;
        $this->baseDir = $baseDir;
    }

    public function getModel() {
        return $this->model;
    }

    public function getView() {
        return $this->view;
    }

    public function getController() {
        return $this->controller;
    }

    public function getBaseDir() {
        return $this->baseDir;
    }

}
