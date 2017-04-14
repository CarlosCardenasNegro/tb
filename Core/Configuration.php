<?php

namespace tb\core;

/**
 * Description of Configuration based Router
 *
 * @author imac
 */
class Configuration implements \tb\core\interfaces\RuleInterface {

    private $dice;
    
    public function __construct(\Dice\Dice $dice) {
        $this->dice = $dice;
    }

    public function find(array $route) {

        /**
         * en la implementaión original se añade el prefijo $route_
         * no se porque,.. tal vez por convención..?
         * yo se lo quito..¡¡
         * org.: $name = '$route_' . $route[0] . '/' . $route[1];
         */
        $name = $route[0] . '/' . $route[1];

        //If there is no special rule set up for this $name, revert to the default
        if ($this->dice->getRule($name) == $this->dice->getRule('*')) {

            return false;

        }

        else return $this->dice->create($name);

    }
}
