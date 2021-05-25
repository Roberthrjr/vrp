<?php

require_once "conexion.php";

// SE CREA LA CLASE MODELO VACUNAS
class ModeloPacientes{

    // SE CREA EL METODO MOSTRAR VACUNA
    static public function mdlMostrarPacientes($tabla,$item,$valor){

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

    // SE CREA EL METODO PARA CREAR VACUNA
    static public function mdlCrearPaciente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (numdoc, nombre, apellido, telefono, email) VALUES (:numdoc, :nombre, :apellido, :telefono, :email)");

        $stmt->bindParam(":numdoc",$datos["numdoc"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
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

    // SE CREA EL METODO PARA EDITAR VACUNA
    static public function mdlEditarPaciente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numdoc=:numdoc, nombre=:nombre, apellido=:apellido, telefono=:telefono, email=:email WHERE idpaciente=:idpaciente");

        $stmt->bindParam(":idpaciente",$datos["idpaciente"],PDO::PARAM_STR);
        $stmt->bindParam(":numdoc",$datos["numdoc"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
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

    // SE CREA EL METODO PARA ELIMINAR VACUNA
    static public function mdlEliminarPaciente($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idpaciente = :idpaciente");

        $stmt->bindParam(":idpaciente", $datos, PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
        
    }
}