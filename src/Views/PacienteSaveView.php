<?php

namespace tb\src\views;

use tb\core\interfaces\ViewInterface;

/**
 * Description of PacienteSaveView
 *
 * @author imac
 */
class PacienteSaveView implements ViewInterface {

    private $model;
    
    public function __construct(\tb\src\models\PacienteSaveModel $model) {

        $this->model = $model;
        
    }

    public function render() {
        $this->model->Save();
        $html = '<h1>Hemos salvado al paciente numero ' . $this->model->data['id'] . '-- </h1>';
        return $html;
    }
}
