<?php

namespace tb\src\controllers;

use tb\core\interfaces\ControllerInterface;

/**
 * Description of PacienteEditController
 *
 * @author imac
 */
class PacienteEditController implements ControllerInterface {

    private $model;
    private $id;

    public function __construct(\tb\src\models\PacienteEditModel $model, $params) {
        $this->model = $model;
        $this->id = $params;
    }

    public function execute() {

        $this->model->id = $this->id;
    }

}
