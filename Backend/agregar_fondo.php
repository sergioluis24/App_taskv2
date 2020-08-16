<?php
include('conexion.php');
if($_POST["agregar_input"]){
    echo "entra1";

    if(isset($_GET["id"])){
        echo "entra";
    $id = $_GET["id"];
    $value_add = $_POST["agregar_input"];
        $sql = "UPDATE articles SET ahorrado = ($value_add+ahorrado) WHERE id = $id+1";
        
        $sentencia_agregar = $mbd->prepare($sql);
        $sentencia_agregar->execute();
        header("location:../index.php?presupuesto=Mensual&agregado=1&id_agregado=$id");
    }
}