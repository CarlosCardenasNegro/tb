<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tb\controllers;

/**
 * Description of App
 *
 * @author imac
 */
class App {
    
    private $uri;


    function __construct() {
        $this->uri = isset($_GET['url']) ? $_GET['url'] : "";        
    }

    
}
