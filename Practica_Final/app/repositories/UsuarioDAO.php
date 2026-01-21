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
        $sql = "INSERT into usuarios (name, email, pass) values (?,?,?)";
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


    public static function existsByEmail(string $email): bool {
        $conn = CoreDB::getConnection();
        $sql = "SELECT id FROM usuarios WHERE email = ? LIMIT 1";
        $ps = $conn->prepare($sql);
        $ps->bind_param("s", $email);
        $ps->execute();
        $ps->store_result();

        $exists = $ps->num_rows > 0;

        $ps->close();
        $conn->close();

        return $exists;
    }


    public static function findByEmail(string $email): ?Usuario {
    $conn = CoreDB::getConnection();
    $sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
    $ps = $conn->prepare($sql);
    $ps->bind_param("s", $email);
    $ps->execute();

    $result = $ps->get_result();

    if ($row = $result->fetch_assoc()) {
        return new Usuario(
            $row["name"],
            $row["email"],
            $row["pass"]
        );
    }

    return null;
}






    public static function read($id):?Usuario{
        return null;
    }

}