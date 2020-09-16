<?php
session_start();
include("data_articles.php");


if($_POST){

    $id_article = $_GET["id_article"];
    $user_id = $_GET["user_id"];
    $data_articles = get_table_articles ($mbd,$user_id);
    // Title
    if(isset($_POST["title"]) && $_POST["title"]!==""){
        $title = $_POST["title"];
    }else{
        $title = $data_articles[$id_article-1]['title'];
    }
    // date_expected
    if(isset($_POST["date_expected"]) && $_POST["date_expected"]!==""){
        $date_expected = $_POST["date_expected"];
    }else{
        $date_expected = $data_articles[$id_article-1]['date_expected'];
    }
    // Priority
    if(isset($_POST["id_priority"]) && $_POST["id_priority"]!==""){
        $priority = $_POST["id_priority"];
    }else{
        $priority = $data_articles[$id_article-1]['id_priority'];
    }

    // Price
    if(isset($_POST["price"]) && $_POST["price"]!==""){
        $price = $_POST["price"];
    }else{
        $price = $data_articles[$id_article-1]['price'];
    }
    //Ahorrado
    if(isset($_POST["ahorrado"]) && $_POST["ahorrado"]!==""){
        $ahorrado = $_POST["ahorrado"];
    }else{
        $ahorrado = $data_articles[$id_article-1]['ahorrado'];
    }
    // descripcion
    if(isset($_POST["descripcion"]) && $_POST["descripcion"]!==""){
        $descripcion = $_POST["descripcion"];
    }else{
        $descripcion = $data_articles[$id_article-1]['descripcion'];
    }
    edit_articles($title,$date_expected,$priority,$price,$ahorrado,$descripcion,$id_article,$user_id,$mbd);
}


function edit_articles($title,$date_expected,$priority,$price,$ahorrado,$descripcion,$id_article,$user_id,$mbd){
    $sql_editar = "UPDATE articles SET title=?,date_expected=?,id_priority=?,price=?,ahorrado=?,descripcion=? WHERE id = $id_article AND user_id = $user_id";
    $sentencia_editar = $mbd->prepare($sql_editar);
    $sentencia_editar->execute(array($title,$date_expected,$priority,$price,$ahorrado,$descripcion));
    header("location:../index.php?presupuesto=Mensual");

}
