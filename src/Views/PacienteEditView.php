<?php

namespace tb\src\views;

use \tb\core\interfaces\ViewInterface;

/**
 * Description of PacienteEditView
 *
 * @author imac
 */
class PacienteEditView implements ViewInterface {

    private $model;
    
    public function __construct(\tb\src\models\PacienteEditModel $model) {

        $this->model = $model;
        
    }

    public function render() {
    
        $data = $this->model->find();
        $html = '<div class="w3-container w3-padding-large" style="width:60%;margin:auto">';
        $html .= '<form class="w3-padding" method="post" action="/tb/paciente/save">';
        $html .= '<label class="w3-label">Id</label><br />';
        $html .= '<input class="w3-input" type="text" name="id" value="' . $data['id'] . '" readonly="readonly" /><br />';
        $html .= '<label class="w3-label">Nombre</label><br />';
        $html .= '<input class="w3-input" type="text" name="nombre" value="' . $data['nombre'] . '" /><br />';
        $html .= '<label class="w3-label">Apellidos</label><br />';
        $html .= '<input class="w3-input" type="text" name="apellidos" value="' . $data['apellidos'] . '" /><br />';
        $html .= '<label class="w3-label">F. de nacimiento</label><br />';
        $html .= '<input class="w3-input" type="date" name="fecha_nacimiento" value="' . $data['fecha_nacimiento'] . '" /><br />';
        $html .= '<input class="w3-btn" type="submit" value="Actualizar datos" />';
        $html .= '<input class="w3-btn" type="reset" value="Resetea" />';
        $html .= '</form></div>';
        
        return $html;
    }
}
