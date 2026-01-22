<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/core/CoreDB.php";


class UsuarioDAO{

    /**
     * Inserta en la base de datos un usuario.
     * El método hashea la contraseña antes de almacenarla.
     *
     * @param Usuario $usuario Usuario con la contraseña en texto plano
     * @return int ID del usuario insertado, o 0 si no se insertó
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


    /**
     * Comprueba si existe un usuario con el email indicado.
     *
     * @param string $email Email a comprobar
     * @return bool True si existe un usuario con ese email, false en caso contrario
     */
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

    /**
     * Busca un usuario por su email y devuelve el objeto Usuario con toda su información.
     *
     * @param string $email Email del usuario a buscar
     * @return Usuario|null Objeto Usuario si existe, o null si no se encuentra
     */
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

}