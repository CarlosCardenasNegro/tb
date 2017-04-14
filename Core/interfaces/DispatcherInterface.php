<?php

namespace tb\core\interfaces;

use \tb\core\Route;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response;

/**
 *
 * @author imac
 */
interface DispatcherInterface {
    public function dispatch(Route $route, ServerRequest $request, Response $response);
}
