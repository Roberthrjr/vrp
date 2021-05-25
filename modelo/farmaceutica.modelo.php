<?php

require_once "conexion.php";

// SE CREA LA CLASE MODELO FARMACEUTICAS
class ModeloFarmaceuticas{

    // SE CREA EL METODO MOSTRAR FARMACEUTICAS
    static public function mdlMostrarFarmaceutica($tabla,$item,$valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        
        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;
    }

    // SE CREA EL METODO PARA CREAR FARMACEUTICAS
    static public function mdlCrearFarmaceutica($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, pais, direccion, telefono, email) VALUES (:nombre, :pais, :direccion, :telefono, :email)");

        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":pais",$datos["pais"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

    // SE CREA EL METODO PARA EDITAR FARMACEUTICAS
    static public function mdlEditarFarmaceutica($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, pais=:pais, direccion=:direccion, telefono=:telefono, email=:email WHERE idfarmaceutica=:idfarmaceutica");

        $stmt->bindParam(":idfarmaceutica",$datos["idfarmaceutica"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":pais",$datos["pais"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

    // SE CREA EL METODO PARA ELIMINAR FARMACEUTICAS
    static public function mdlEliminarFarmaceutica($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idfarmaceutica = :idfarmaceutica");

        $stmt->bindParam(":idfarmaceutica", $datos, PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
        
    }
}