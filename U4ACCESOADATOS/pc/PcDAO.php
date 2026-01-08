<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/pc/CoreDB.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/pc/Component.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/pc/ComponentDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/pc/Pc.php";
class PcDAO{
    /**
     * Create / insert.
     * Guarda en la bd un ordenador, y también guarda todos sus componentes
     * @param Pc $pc
     * @return bool true si lo ha insertado, false si no lo ha insertado.
     */
    private static function create($pc):bool{
        //todo
        $conn = CoreDB::getConnection();
        $sql = "INSERT into pcs (id, owner, brand, price)
            values(?, ?, ?, ?)";



        $ps = $conn->prepare($sql); /*prepared statement - sentencia preparada */
        /*operación de binding: asignar valores a cada ?  ( es decir, asignar valores donde faltan)*/
            //1º se define el tipo de cada interrogante
            // s = si es string
            // d = si es float
            // i = si es int
        $id = $pc->getId();
        $owner = $pc->getOwner();
        $brand = $pc->getBrand();
        $price = $pc->getPrice();
        $ps->bind_param("sssd", $id, $owner, $brand, $price);

        /*Ahora es importante EJECUTAR la sentencia anterior*/
        $ret = $ps->execute(); // aqui se guarda en la bd el ordenador

        //Guardo los componentes en la bd:
        foreach($pc->getComponents() as $component){
            //como la tenemos la funcion en component. php la llamamos
            ComponentDAO::create($component);
        }

        $conn->close();
        return $ret;
    }

    /**
     * Read / select
     * Lee un pc de la bd con todos sus componentes
     * @param string $id
     * @return Pc Pc leído de la bd o null si no existe el id.
     */
    private static function read($id): ?Pc{
        //todo
        return null;
    }

    private static function update($pc): bool{
        //todo
        return false;
    }

    private static function delete($id): ?Pc{
        //todo
        return null;
    }

    private static function readAll(){
        //todo
    }

    /**
     * Lee de la bd los ordenadores con un precio entre un rango
     * @param mixed $min precio mínimo
     * @param mixed $max precio máximo
     * @return array Array con los pcs 
     */
    private static function readBetweenPrice($min, $max){
        //todo
    }

}