<?php

namespace tb\core;

/**
 * Description of Convention basede Router
 *
 * @author imac
 */
class Convention implements \tb\core\interfaces\RuleInterface {

    private $dice;
    /**
     * OJO, quitar tb en producción..¡¡
     */
    const BASE_PATH = "tb\\src\\";
    const VIEW_PATH = self::BASE_PATH . "views\\";
    const CONTROLLER_PATH = self::BASE_PATH . "controllers\\";
    const MODEL_PATH = self::BASE_PATH . "models\\";
    
    public function __construct(\Dice\Dice $dice) {
        $this->dice = $dice;
    }

    public function find(array $route) {

        //The name of the class
        // asumo que la URI será algo así
        // site.com/paciente/index
        // y $route será $route[0] = 'paciente'
        // $route[1] = 'index'
        // los nombres se construiran como
        // '\\views' . '\\' . array_shift($route) . array_shift($route)

        $count = count($route);
        
        $className = ucfirst(array_shift($route)) . ucfirst(array_shift($route));

        //primero la View
        $viewName = self::VIEW_PATH . $className . 'View';

        //If the view doesn't exist, the convention rule can't continue
        if (!class_exists($viewName)) return false;

        // luego el controller.. no imprescindible...
        $controllerName = self::CONTROLLER_PATH . $className . 'Controller';
        
        // si hemos pasado más parámetros son para el controller,...OJO
        if ($count > 2) {
            $this->dice->addRule($controllerName, ['constructParams' => $route]);
        }

        // y por último el modelo
        $modelName = self::MODEL_PATH . $className . 'Model';

        //Dice will be creating a Route object and pass it a specific view and optional controller
        
        // la frase que viene ahora no la entiendo....??
        //Auto-generate a rule for a route if it's not already been generated
        if ($this->dice->getRule($className) == $this->dice->getRule('*')) {

            /**
             * Si el modelo existe preparo sus reglas
             */
            if (class_exists($modelName)) {

                // primero para el PDO
                $config = parse_ini_file('./config/config.ini');
                $dbName = $config['database'];
                $dbHost = $config["host"];
                $dbUser = $config["user"];
                $dbPassword = $config["password"];

                $rule = ['shared' => true, 
                        'constructParams' => ['mysql:host=' . $dbHost . '; dbname=' .$dbName, $dbUser, $dbPassword] 
                    ];
                $this->dice->addRule('PDO', $rule);
                
                // segundo para el Model
                $rule = ['shared' => true]; 
                $this->dice->addRule($modelName, $rule);
            }

            // add rules to Route (View and Controller)
            unset($rule);
            $rule = ["constructParams" => [$this->dice->create($viewName),
            (class_exists($controllerName)) ? $this->dice->create($controllerName) : null]];
            $this->dice->addRule('tb\core\Route', $rule);
            
        }
        
        //Finally create the route object
        return $this->dice->create('tb\core\Route');

    }

}
