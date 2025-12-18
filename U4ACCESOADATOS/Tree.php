<?php

class Tree
{
    function __construct(
        private float $price,
        private float $height,
        private string $material,
        private int $id = -1,
    ) {}

    public function __toString()
    {
        return "$this->id:
            $this->price - 
            $this->height - 
            $this->material";
    }

    /**
     * Inserta en la base de datos el árbol
     * @param Tree $tree árbol a insertar en la bd
     * @param mysqli $conn conexión con la bd
     * @return int id con el que se ha insertado en la BD
     */
    public static function insert(Tree $tree, mysqli $conn): int
    {
        $sql = "INSERT INTO trees (price, height, material)
            VALUES (\"$tree->price\", \"$tree->height\", \"$tree->material\")";
        $conn->query($sql);
        $id = $conn->insert_id;
        $tree->id = $id; // esto lo que hace es que cuando se muestra la información del árbol en lugar de salir el id -1 del árbol poe defecto, salga el id que se le ha asignado
        return $id;
    }

    public static function select($id, $conn): ?Tree{
        $sql = "SELECT * FROM trees WHERE id = $id";
        $row = $conn->query($sql); //devuelve un mysqli_result
        if ($row->num_rows > 0){
            $arr = $row->fetch_assoc();   //para coger la primera fila
            $t = new Tree(
                $arr["price"], 
                $arr["height"], 
                $arr["material"]
            );
            return $t;
        }else{
            return null;
        }

    }

    public static function delete($id, $conn): bool{
        $sql = "DELETE FROM trees WHERE id = $id";
        $conn->query($sql); //aqui se lanza la consulta
        $rows = $conn->affected_rows; //filas afectadas por esa consulta
        if ( $rows > 0){
            return true;
        }
        return false;
    }

    static function selectAll($conn) : array{
        $sql = "SELECT * FROM trees";
        $rows = $conn->query($sql);
        while(($row = $rows->fetch_assoc()) != null){
            $t = new Tree(
                $row["price"], 
                $row["height"], 
                $row["material"],
                $row["id"]
            );
            $trees[] = $t;
        }
        return $trees;

    }

}