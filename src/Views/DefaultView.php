<?php

namespace tb\src\views;

use tb\core\interfaces\ViewInterface;

/**
 * Description of DefaultView
 *
 * @author imac
 */

class DefaultView implements ViewInterface {
    
    private $model;
    
    public function __construct(\tb\src\models\PacienteIndexModel $model) {

        $this->model = $model;
        
    }

    public function render() {
        
        return "<h1>Esta es la Defult View.</h1>";

    }

}
