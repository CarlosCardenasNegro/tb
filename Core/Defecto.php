<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tb\core;

/**
 * Description of Default
 *
 * @author imac
 */
class Defecto implements \tb\core\interfaces\RuleInterface {
    
    private $dice;

    public function __construct(\Dice\Dice $dice) {
        $this->dice = $dice;
    }

    public function find(array $route) {

        return $this->dice->create('\tb\src\views\DefaultView');    

    }
    
}
