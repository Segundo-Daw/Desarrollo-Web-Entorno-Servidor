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
    public static function create($pc):bool{
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
        try{
            $ret = $ps->execute(); // aqui se guarda en la bd el ordenador

            //Guardo los componentes en la bd:
            foreach($pc->getComponents() as $component){
                //como la tenemos la funcion en component. php la llamamos
                ComponentDAO::create($component, $id);
            }
        }catch(mysqli_sql_exception $e){  //alternativa a catch(Exception $e){}
            // return $e->getMessage(); //aqui devolveria el mensaje asociado a la excepción
            return false;


        }

        $conn->close();
        return $ret;
        //esto hay que meterlo en un try-catch
    }

    /**
     * Read / select
     * Lee un pc de la bd con todos sus componentes
     * @param string $id
     * @return Pc Pc leído de la bd o null si no existe el id.
     */
    public static function read($id): ?Pc{
        $conn = CoreDB::getConnection();
        $sql = "SELECT * from pcs where id = ?";
        $ps = $conn->prepare($sql);
        $ps->bind_param("s", $id);
        $ps->execute();
        $result = $ps->get_result(); 
        //En result tengo el mysqli_result con la información leída de la bd
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();  //el fetch_assoc convierte el primer resultado del mysqli_result en un array asociativo
            $pc = new PC($id, $row["owner"], $row["brand"], $row["price"]);
            //Ahora tengo que leer los componentes donde su pc_id sea el de este pc
            $pc-> setComponents(ComponentDAO::readByPcId($id));

        }else{
            $pc = null;
        }



        $conn->close();
        return $pc;
    }

    public static function update($pc): bool{
        //todo
        return false;
    }

    public static function delete($id): ?Pc{
        //todo
        return null;
    }

    public static function readAll(){
        //todo
    }

    /**
     * Lee de la bd los ordenadores con un precio entre un rango
     * @param mixed $min precio mínimo
     * @param mixed $max precio máximo
     * @return array Array con los pcs 
     */
    public static function readBetweenPrice($min, $max){
        //todo
    }

}