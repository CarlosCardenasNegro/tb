<?php
namespace tb\src\models;

/**
 * Description of Paciente
 *
 * @author imac
 */
class PacienteIndexModel {
    
    private $pdo;
    
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll()
    {
        try {
            $sql = "SELECT * from paciente";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
        catch(\PDOException $e) {
            print "Error!: " . $e->getMessage();
	}
    }
}
