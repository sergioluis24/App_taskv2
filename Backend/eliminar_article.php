<?php
include("conexion.php");

if($_GET){

    $id_article = $_GET["id_article"];
    $user_id = $_GET["user_id"];

    eliminar_article($id_article,$user_id,$mbd);
}


function eliminar_article($id_article,$user_id,$mbd){
    $sql_eliminar = "DELETE FROM articles WHERE id = ? AND user_id = ?";
    $sentencia_eliminar = $mbd->prepare($sql_eliminar);
    $sentencia_eliminar->execute(array($id_article,$user_id));
    // header("location:../index.php?presupuesto=Mensual");

}

