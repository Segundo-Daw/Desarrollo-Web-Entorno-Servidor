<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/pc/CoreDB.php";
require_once $_SERVER["DOCUMENT_ROOT"]. "/pc/Component.php";

class ComponentDAO{
    //create en como el otro que hemos hecho pero llamado insert
    public static function create(Component $c): int{
       
        $conn = CoreDB::getConnection();
        $sql = "INSERT INTO components (name, brand, model) VALUES (
            \"{$c->getName()}\",
            \"{$c->getBrand()}\",
            \"{$c->getModel()}\"
            )";
        $conn->query($sql);
        $id = $conn->insert_id;
        $c->setId($id);
        $conn->close();
        return $id;

        
    }

    /**
     * Leo(sleect) de la bd por id
     * @param int $id
     * @return Component devuelve el componente leído primero 
     */
    public static function read (int $id) :?Component{
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from components where id = $id";
        $result = $conn->query($sql);
        $conn->close();
        if(($row = $result->fetch_assoc()) != null){
            return new Component(
                $row["name"],
                $row["brand"],
                $row["model"],
                $row["id"]
            );
        }
        return null;
       
    }

    /**
     * Actualiza el componente que le paso como parámetro (todos los atributos menos el id)
     * @param Component $c
     * @param mysqli $conn
     * @return bool
     */
    public static function update(Component $c) : bool{
        $conn = CoreDB::getConnection();
        $sql = "UPDATE components set
                    name = \"{$c->getName()}\",
                    brand = \"{$c->getBrand()}\",
                    model = \"{$c->getModel()}\",
                    WHERE id= {$c->getId()}
                ";
        $conn->query($sql);
        $num = $conn->affected_rows;   
        $conn->close(); 
        //si he actualizado alguna (el número de filas afectadas es > 0) devuelvo true    
        if($num > 0){
            return true;
        }
        return false;

    }

    public static function delete(int $id) : Component{
        $c = ComponentDAO::read($id);
        $conn = CoreDB::getConnection();
        $sql = "DELETE from components where id = $id";
        $conn->query($sql);
        $conn->close();
        return $c;

    }

    public static function readAll(mysqli $conn):array{

    }
}