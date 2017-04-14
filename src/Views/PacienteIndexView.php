<?php

namespace tb\src\views;

use tb\core\interfaces\ViewInterface;

class PacienteIndexView implements ViewInterface {
    
    private $model;
    
    public function __construct(\tb\src\models\PacienteIndexModel $model) {

        $this->model = $model;
        
    }

    public function render() {
        
        $html =
            '<div class="w3-text-black">
                <p class="w3-xxlarge w3-center w3-text-white">Tabla de Pacientes</p>
                <table id="cTable" class="w3-table-all w3-hoverable w3-card-4" style="width:80%; margin:auto">
                    <thead>
                        <tr class="w3-orange">
                            <th>id</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Apellidos</th>
                            <th style="text-align:center">F. de nacimiento</th>
                            <th colspan="3" style="text-align:center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';

            foreach ($this->model->findAll() as $i => $elem) {
                $html .= '<tr id="' . $elem['id'] . '" style="cursor:pointer">';
                $html .= '<td>' . $elem['id'] . '</td>';
                $html .= '<td>' . ucfirst($elem['nombre']) . '</td>';
                $html .= '<td>' . ucfirst($elem['apellidos']) . '</td>';
                $html .= '<td class="w3-center">' . $elem['fecha_nacimiento'] . '</td>';
                $html .= '<td><a href="edit/' . $elem['id'] . '">Editar</a></td>';
                $html .= '<td><a href="delete/' . $elem['id'] . '">Borrar</a></td>';
                $html .= '<td><a href="visitas/' . $elem['id'] . '">Visitas</a></td>';
                $html .= '</tr>';
            }
            $html .= '</tbody></table></div>';

            return $html;
    }

}
