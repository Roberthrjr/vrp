<?php

require_once "conexion.php";

// SE CREA LA CLASE MODELO HOSPITAL
class ModeloHospitales{

    // SE CREA EL METODO MOSTRAR HOSPITAL
    static public function mdlMostrarHospitales($tabla,$item,$valor){

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

    // SE CREA EL METODO PARA CREAR HOSPITAL
    static public function mdlCrearHospital($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, direccion, telefono, email) VALUES (:nombre, :direccion, :telefono, :email)");

        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
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

    // SE CREA EL METODO PARA EDITAR HOSPITAL
    static public function mdlEditarHospital($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, direccion=:direccion, telefono=:telefono, email=:email WHERE idhospital=:idhospital");

        $stmt->bindParam(":idhospital",$datos["idhospital"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
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

    // SE CREA EL METODO PARA ELIMINAR HOSPITAL
    static public function mdlEliminarHospital($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idhospital = :idhospital");

        $stmt->bindParam(":idhospital", $datos, PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
        
    }
}