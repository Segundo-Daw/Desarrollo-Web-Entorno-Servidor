<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";


class UsuarioDAO{

    /**
     * Inserta en la bc un usuario. el método hashea la contraseña antes de meterla en la bd
     * @param Usuario $user usuario con la contraseña clara
     * @return bool true si se ha insertado bien, false si no se ha insertado (xej, ya existe un usuario con ese email)
     */
    public static function  create($usuario) {
        
        //conexión
        $conn = CoreDB::getConnection(); 
        //sentencia preparada
        $sql = "INSERT into users (name, email, pass) values (?,?,?)";
        $ps = $conn->prepare($sql);
        
        //bind(con pass hasheada(lo tenemos que hacer))
        $name = $usuario->getName();
        $email = $usuario->getEmail();
        $pass = $usuario->getPass();  //$pass tiene la contraseña clara
        $passHash = password_hash($pass, PASSWORD_DEFAULT);  //$passHash tiene la contraseña hasheada
        $ps->bind_param("sss", $name, $email, $passHash);

        //lanza
        $ps->execute();
        //recupera id
        $id = $ps->insert_id;
        $usuario->setId($id);
        //cierra conexion
        $conn->close();
        return $id;


    }




    public static function read($id):?Usuario{
        return null;
    }

}