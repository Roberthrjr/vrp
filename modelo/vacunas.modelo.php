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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, fabricante, modAdministracion, refrigeracion, efectividad) VALUES (:nombre, :fabricante, :modAdministracion, :refrigeracion, :efectividad)");

        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":fabricante",$datos["fabricante"],PDO::PARAM_STR);
        $stmt->bindParam(":modAdministracion",$datos["modAdministracion"],PDO::PARAM_STR);
        $stmt->bindParam(":refrigeracion",$datos["refrigeracion"],PDO::PARAM_STR);
        $stmt->bindParam(":efectividad",$datos["efectividad"],PDO::PARAM_STR);

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

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, fabricante=:fabricante, modAdministracion=:modAdministracion, refrigeracion=:refrigeracion, efectividad=:efectividad WHERE id=:id");

        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":fabricante",$datos["fabricante"],PDO::PARAM_STR);
        $stmt->bindParam(":modAdministracion",$datos["modAdministracion"],PDO::PARAM_STR);
        $stmt->bindParam(":refrigeracion",$datos["refrigeracion"],PDO::PARAM_STR);
        $stmt->bindParam(":efectividad",$datos["efectividad"],PDO::PARAM_STR);

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