<?php

namespace tb\controllers;

use dice\Dice;
use tb\core\Router;
        
/**
 * Description of FrontController
 *
 * @author imac
 */
class FrontController {

    const NAMESPACE_CONTROLLERS = "tb\\controllers\\";
    const NAMESPACE_MODELS = "tb\\models\\";
    const NAMESPACE_VIEWS = "tb\\views\\";
    
    private $controller;
    private $view;
    
    public function __construct(Router $router, $routeName, $action = null) {

        
        $route = $router->getRoute($routeName);

       //Fetch the names of each component from the router

        $modelName = self::NAMESPACE_MODELS . $route->model;
        $viewName = self::NAMESPACE_VIEWS .  $route->view;
        $controllerName = self::NAMESPACE_CONTROLLERS . $route->controller;

        //Instantiate each component

        $model = new $modelName("Hello World");
        $this->controller = new $controllerName($model);
        $this->view = new $viewName($routeName, $model);

        //Run the controller action

        if (!empty($action)) $this->controller->{$action}();        

    }

    public function output() {

        //Finally a method for outputting the data from the view 
        //This allows for some consistent layout generation code such as a page header/footer

        $header = '<h1>Hello world example</h1>';

        return $header . '<div>' . $this->view->output() . '</div>';

    }

}
