<?php

namespace tb\core;

use \tb\core\Route;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response;

/**
 * Description of Dispatch
 *
 * @author imac
 */
class Dispatcher implements interfaces\DispatcherInterface {

    public function dispatch(Route $route, ServerRequest $request, Response $response) {

        if (isset($route->controller)) {
            
            // ejecuta las acciones del controller
            // en mi implementación el controller
            // solamente establece el Estado de la
            // View,... es decir la carga de datos...
            // se supone que los datos que espera claro...
            // y por tanto solo tiene un método Execute
            // dado que mis controllers son muy atómicos...
            // solo hacen una cosa edit, save, delete,.. etc..            
            $route->controller->execute();
        }

        $response->getBody()->write($route->view->render());

        /**
         * emit the response (headers, status, body)
         */
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }
        echo $response->getBody();
    }

}
