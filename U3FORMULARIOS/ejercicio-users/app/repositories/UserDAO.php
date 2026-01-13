<?php

class UserDAO{

    /**
     * Inserta en la bc un usuario. el método hashea la contraseña antes de meterla en la bd
     * @param User $user usuario con la contraseña clara
     * @return bool true si se ha insertado bien, false si no se ha insertado (xej, ya existe un usuario con ese email)
     */
    public static function  create(User $user) : bool{
        $conn = CoreDB::getConnection();
        $sql = "INSERT into users (name, email, password) values (?,?,?)";
        $ps = $conn->prepare($sql);
        $name = $user->getName();
        $email =$user->getEmail();
        $pass = $user->getPass();

        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $ps->bind_param("sss", $name, $email, $passHash);

        try{
            $ps->execute();
            $id = $ps->insert_id;
            $user->setId($id);
        }catch(Exception $e){
             $conn->close();
            return false;
        }

        $conn->close();
        return true;
    }


    /**
     * Dado un email y una ocntraseña comprueba que correspondan en la bd
     * @param mixed $email
     * @param mixed $pass contraseña clara
     * @return int 1 si coinciden, -1 si el email está pero la contraseña no coincide, -2 si el mail no está en la bd
     */
    public static function checkPassword($email, $pass) : int{
        return 0;
    }
}