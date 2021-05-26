<?php

require_once "conexion.php";

// SE CREA LA CLASE MODELO VACUNAS
class ModeloCitas{

    // SE CREA EL METODO MOSTRAR VACUNA
    static public function mdlMostrarCitas($tabla,$item,$valor){

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
    static public function mdlCrearVacuna($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (vacuna_idvacuna, hospital_idhospital, paciente_idpaciente, cantidad, ultima_cita) VALUES (:vacuna_idvacuna, :hospital_idhospital, :paciente_idpaciente, :cantidad, :ultima_cita)");

        $stmt->bindParam(":vacuna_idvacuna",$datos["vacuna_idvacuna"],PDO::PARAM_STR);
        $stmt->bindParam(":hospital_idhospital",$datos["hospital_idhospital"],PDO::PARAM_STR);
        $stmt->bindParam(":paciente_idpaciente",$datos["paciente_idpaciente"],PDO::PARAM_STR);
        $stmt->bindParam(":cantidad",$datos["cantidad"],PDO::PARAM_STR);
        $stmt->bindParam(":ultima_cita",$datos["ultima_cita"],PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

    // SE CREA EL METODO PARA ELIMINAR VACUNA
    static public function mdlEliminarVacuna($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idcita = :idcita");

        $stmt->bindParam(":idcita", $datos, PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
        
    }
}