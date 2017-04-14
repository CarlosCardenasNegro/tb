<?php

namespace tb\core;

use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;

/**
 * Description of Bootstrap
 *
 * @author imac
 */
class Bootstrap {

    private $dice;
    
    private $router;
    private $route;
    private $request;
    private $response;
    private $uri;
    private $dispatcher;
    
    
    public function __construct(\Dice\Dice $dice) {

        $this->dice = $dice;

        /**
         * Creo un "Tom Butler Router" y sus reglas
         * (1) un static router (configuration). Las rutas deben estar previamente definidas
         * (2) un dinamic router (convención). Las rutas se construyen a partir del http request
         * (3) un default route, la ruta por defecto o inicial
         */
        $this->router = $this->dice->create(Router::class);

        $this->router->addRule(new \tb\core\Configuration($this->dice));
        $this->router->addRule(new \tb\core\Convention($this->dice));
        $this->router->addRule(new \tb\core\Defecto($this->dice));

        /**
         * Creo un Request objeto con toda la información del http request...
         */
        $this->request = ServerRequestFactory::fromGlobals(
                        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );

        /**
         * Recupero la URI pasada... que puede ser:
         * (1) empty ... home --> default
         * (2) absolute (trailing slash) ... se lo debo quitar será el elemento [0] array_shift()
         * (3) rootless (sin slash) ... lo dejo asi
         */
        $this->uri = $this->request->getUri();
        $this->uri = explode('/', $this->uri->getPath());

        /**
         * Ojo, debido a mis hackeos con el httpd.conf se pasa el dominio '/tb',
         * en un entorno de producción no ocurriría así pues sería: www.nuimsa.es/paciente/index
         * y el path sería solo 'paciente/index' lo debo tener en cuenta...¡¡¡¡
         * Por ahora se lo quito
         */
        $serverParams = $this->request->getServerParams();
        if ($serverParams['CONTEXT_PREFIX'] !== "") {
            array_shift($this->uri);
            array_shift($this->uri);
        }

        $this->route = $this->router->find($this->uri);

        /**
         * De acuerdo a la técnica de Aura/Router los atributos 
         * pasados a la ruta como hash ($key => $value) se 
         * pasan al request...??
         * No lo tengo aun muy claro.... para que tanto trasiego
         * En mi caso los he inyectado directamente en el controller...
         * como [constructParams] del dice.
         * 
         * El codigo sería:
          foreach ($route->attributes as $key => $val) {
          $request = $request->withAttribute($key, $val);
          }
         */

        /**
         * Preparo la respuesta
         */
        $this->response = new Response();
        
        /**
         * Preparo el dispatcher...
         */
        $this->dispatcher = new Dispatcher();
        
    }
    
    public function run() {
        
        /**
         * lo ejecuto todo
         */
        $this->dispatcher->dispatch($this->route, $this->request, $this->response);
        
        
    }

}
