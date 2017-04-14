<?php

namespace tb\src\models;

use tb\core\interfaces\ModelInterface;

/**
 * Description of PacienteSaveModel
 *
 * @author imac
 */
class PacienteSaveModel implements ModelInterface {

    private $pdo;
    public $data;
    
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function save() {
         try {
            $sql = "SELECT * from paciente where id = " . $this->id;
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
            return $data[0];
        }
        catch(\PDOException $e) {
            print "Error!: " . $e->getMessage();
	}
   }
}
