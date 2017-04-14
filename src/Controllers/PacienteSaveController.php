<?php

namespace tb\src\controllers;

use tb\core\interfaces\ControllerInterface;

/**
 * Description of PacienteSaveController
 *
 * @author imac
 */
class PacienteSaveController implements ControllerInterface {

    private $model;

    public function __construct(\tb\src\models\PacienteSaveModel $model) {

        $this->model = $model;
    }

    public function execute() {
        $this->model->data = $_POST;
        
    }
}
