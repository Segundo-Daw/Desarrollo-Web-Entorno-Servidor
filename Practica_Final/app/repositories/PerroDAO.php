<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";


class PerroDAO{

    /**
     * Inserta un perro en la base de datos y asigna el ID generado al objeto.
     *
     * @param Perro $perro Objeto Perro con los datos a almacenar
     * @return int ID del perro insertado en la base de datos
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

    /**
     * Elimina un perro de la base de datos a partir de su identificador.
     *
     * @param int $id Identificador del perro a eliminar
     * @return bool Devuelve true si la operación se realizó correctamente, false en caso contrario
    */
    public static function deleteById($id): bool {
        $conn = CoreDB::getConnection();
        $sql = "DELETE FROM perros WHERE id = ?";
        $ps = $conn->prepare($sql);
        $ps->bind_param("i", $id);
        $ps->execute();

        $result = $ps->affected_rows > 0;
        $conn->close();
        return $result;
    }

    /**
     * Obtiene todos los perros almacenados en la base de datos mostrando su información.
     *
     * @return Perro[] Array de objetos Perro
     */
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