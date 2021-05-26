<?php

require_once "conexion.php";

// SE CREA LA CLASE MODELO VACUNAS
class ModeloVacunas{

    // SE CREA EL METODO MOSTRAR VACUNA
    static public function mdlMostrarVacunas($tabla,$item,$valor){

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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, efectividad, stock, farmaceutica_idfarmaceutica) VALUES (:nombre, :efectividad, :stock, :farmaceutica_idfarmaceutica)");

        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":efectividad",$datos["efectividad"],PDO::PARAM_STR);
        $stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_STR);
        $stmt->bindParam(":farmaceutica_idfarmaceutica",$datos["farmaceutica_idfarmaceutica"],PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

    // SE CREA EL METODO PARA EDITAR VACUNA
    static public function mdlEditarVacuna($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, efectividad=:efectividad, stock=:stock, farmaceutica_idfarmaceutica=:farmaceutica_idfarmaceutica WHERE idvacuna=:idvacuna");

        $stmt->bindParam(":idvacuna",$datos["idvacuna"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":efectividad",$datos["efectividad"],PDO::PARAM_STR);
        $stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_STR);
        $stmt->bindParam(":farmaceutica_idfarmaceutica",$datos["farmaceutica_idfarmaceutica"],PDO::PARAM_STR);

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

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idvacuna = :idvacuna");

        $stmt->bindParam(":idvacuna", $datos, PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
        
    }
}