<?php

namespace tb\src\viewmodels;

/**
 * Description of newPHPClass
 *
 * @author imac
 */
class PacienteEditViewModel implements \tb\core\interfaces\ViewModelInterface {

    private $model;
    
    public function __construct(\tb\core\interfaces\ModelInterface $model) {

        $this->model = $model;

    }

    
    
}
