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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, tipdoc, numdoc, numcel, mail, enfermedad) VALUES (:nombre, :apellido, :tipdoc, :numdoc, :numcel, :mail, :enfermedad)");

        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
        $stmt->bindParam(":tipdoc",$datos["tipdoc"],PDO::PARAM_STR);
        $stmt->bindParam(":numdoc",$datos["numdoc"],PDO::PARAM_STR);
        $stmt->bindParam(":numcel",$datos["numcel"],PDO::PARAM_STR);
        $stmt->bindParam(":mail",$datos["mail"],PDO::PARAM_STR);
        $stmt->bindParam(":enfermedad",$datos["enfermedad"],PDO::PARAM_STR);

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

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, tipdoc=:tipdoc, numdoc=:numdoc, numcel=:numcel, mail=:mail, enfermedad=:enfermedad  WHERE id=:id");

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
        $stmt->bindParam(":tipdoc",$datos["tipdoc"],PDO::PARAM_STR);
        $stmt->bindParam(":numdoc",$datos["numdoc"],PDO::PARAM_STR);
        $stmt->bindParam(":numcel",$datos["numcel"],PDO::PARAM_STR);
        $stmt->bindParam(":mail",$datos["mail"],PDO::PARAM_STR);
        $stmt->bindParam(":enfermedad",$datos["enfermedad"],PDO::PARAM_STR);

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

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
        
    }
}