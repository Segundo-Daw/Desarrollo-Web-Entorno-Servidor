<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";


class PerroDAO{

    /**
     * Inserta en la bc un perro
     */
    public static function  create($perro) {
        
        //conexión
        $conn = CoreDB::getConnection(); 
        //sentencia preparada
        $sql = "INSERT INTO perros (name, age, numberDays, type, raza, muerde) VALUES (?, ?, ?, ?, ?, ?)";
        $ps = $conn->prepare($sql);
        
        //bind
        $name = $perro->getName();
        $age = $perro->getAge();
        $numberDays = $perro->getNumberDays();
        $type = $perro->getType();
        $raza = $perro->getRaza();
        $muerde = $perro->getMuerde();

        $ps->bind_param("siissi", $name, $age, $numberDays, $type, $raza, $muerde);

        //lanza
        $ps->execute();
        $id = $ps->insert_id;
        $perro->setId($id);
        //cierro sesión
        $conn->close();
        return $id;
        
    }

        //conexión
        public static function deleteById($id): bool {
            $conn = CoreDB::getConnection();
            $sql = "DELETE FROM perros WHERE id = ?";
            $ps = $conn->prepare($sql);
            $ps->bind_param("i", $id);
            $ps->execute();
            $id = $ps->insert_id;

            $conn->close();
            return $id;
        }

    public static function findAll(): array {
        $conn = CoreDB::getConnection();
        $sql = "SELECT * FROM perros";
        $result = $conn->query($sql);

        $perros = [];
        while ($row = $result->fetch_assoc()) {
            $perros[] = new Perro(
                $row["raza"],
                $row["muerde"],
                $row["name"],
                $row["age"],
                $row["numberDays"],
                $row["type"],[],
                $row["id"]
            );
        }

        $conn->close();
        return $perros;
    }







    
}