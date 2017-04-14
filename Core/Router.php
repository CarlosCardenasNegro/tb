<?php

namespace tb\core;

/**
 * Convert $route into a Route object as defined below.
 * 
 * Rule based Router
 * 
 * @author imac
 * @param string $route El nombre <<formal>> de la ruta que buscamos
 * @return \Route
 */
class Router {

    private $rules = array();
 
    public function addRule(\tb\core\interfaces\RuleInterface $rule) {

        $this->rules[] = $rule;

    }

    public function find(array $route) {

        foreach ($this->rules as $rule) {
            if ($found = $rule->find($route)) return $found;
        }

        /**
         * Aqui creo que debería poner un response header 404 ...
         */
        throw new \Exception('No matching route found');

    }
    
}
