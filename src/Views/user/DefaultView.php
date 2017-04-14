<?php

namespace tb\src\views;

use \tb\core\interfaces\ViewInterface;

/**
 * Description of PacienteEditView
 *
 * @author imac
 */
class DefaultView implements ViewInterface {

    private $model;
    
    public function __construct(\tb\src\models\PacienteEditModel $model =  null) {

        $this->model = $model;
        
    }

    public function render() {
        
    }
}
