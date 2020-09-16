<?php
include("conexion.php");

function get_table_articles ($mbd,$user_id){
    $query_read_articles = "SELECT * FROM articles WHERE user_id = $user_id AND estado = 0";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    return $data_article;
}
function difference_date($mbd,$user_id){
    $query_read_date = "SELECT  COUNT(id) AS 'notifications_tasks' FROM tasks WHERE DATEDIFF(date_expected,CURDATE()) < 10 AND user_id = $user_id;";
    $sentencia_leer_date = $mbd->prepare($query_read_date);
    $sentencia_leer_date->execute();
    $data_date = $sentencia_leer_date->fetchall();
    return $data_date;
}
function date_expected_anual ($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    for($i = 0 ; $i < count($data_article) ; $i++){
        $data_article[$i]['date_expected'] = $data_article[$i]['date_expected'] / 365;
        $data_article[$i]['date_expected'] = round($data_article[$i]['date_expected'],0);
    }
    return $data_article;


}
function date_expected_mounth ($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    // $i=0;
    // foreach ($data_article as $data_article_aux) {
    //     $data_article[$i]['date_expected'] = $data_article_aux['date_expected'] / 30;
    //     $data_article[$i]['date_expected'] = round($data_article_aux['date_expected'],0);
    //     $i++;
    // }
    for($i = 0 ; $i < count($data_article) ; $i++){
        $data_article[$i]['date_expected'] = $data_article[$i]['date_expected'] / 30;
        $data_article[$i]['date_expected'] = round($data_article[$i]['date_expected'],0);
    }
    return $data_article;


}
function date_expected_quincena ($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    for($i = 0 ; $i < count($data_article) ; $i++){
        $data_article[$i]['date_expected'] = $data_article[$i]['date_expected'] / 15;
        $data_article[$i]['date_expected'] = round($data_article[$i]['date_expected'],0);
    }
    return $data_article;
}
function date_expected_semanal ($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    for($i = 0 ; $i < count($data_article) ; $i++){
        $data_article[$i]['date_expected'] = $data_article[$i]['date_expected'] / 7;
        $data_article[$i]['date_expected'] = round($data_article[$i]['date_expected'],0);
    }
    return $data_article;
}
function date_expected_days($mbd,$user_id){
    $query_read_articles = "SELECT DATEDIFF(date_expected,CURDATE()) AS 'date_expected' FROM articles WHERE user_id = $user_id;
    ";
    $sentencia_leer_articles = $mbd->prepare($query_read_articles);
    $sentencia_leer_articles->execute();
    $data_article = $sentencia_leer_articles->fetchall();
    return $data_article;
}

function calculated_anual($mbd,$user_id){
    $data_expected = date_expected_anual ($mbd,$user_id);
    $data_article = get_table_articles ($mbd,$user_id);
    
    $presupuesto = array();
    foreach ($data_article as $i => $data) {
        # code...
        if($data_expected[$i]["date_expected"] == 0){
            array_push($presupuesto,0);
        }else{

            $data["price"] = $data["price"] - $data["ahorrado"];
            $data = round($data["price"]/$data_expected[$i]["date_expected"],0);
            array_push($presupuesto,$data);
        }
    }
    return $presupuesto;
}
function calculated_mounth($mbd,$user_id){
    $data_expected = date_expected_mounth ($mbd,$user_id);
    $data_article = get_table_articles ($mbd,$user_id);
    
    $presupuesto = array();
    foreach ($data_article as $i => $data) {
        # code...
        if($data_expected[$i]["date_expected"] == 0){
            array_push($presupuesto,0);
        }else{
            $data["price"] = $data["price"] - $data["ahorrado"];
            $data = round($data["price"]/$data_expected[$i]["date_expected"],0);
            array_push($presupuesto,$data);
        }
    }
    return $presupuesto;
}
function calculated_quincenal($mbd,$user_id){
    $data_expected = date_expected_quincena ($mbd,$user_id);
    $data_article = get_table_articles ($mbd,$user_id);
    $presupuesto = array();
    foreach ($data_article as $i => $data) {
        # code...
        if($data_expected[$i]["date_expected"] == 0){
            array_push($presupuesto,0);
        }else{
            $data["price"] = $data["price"] - $data["ahorrado"];
            $data = round($data["price"]/$data_expected[$i]["date_expected"],0);
            array_push($presupuesto,$data);
        }
    }
    return $presupuesto;
}
function calculated_semanal($mbd,$user_id){
    $data_expected = date_expected_semanal ($mbd,$user_id);
    $data_article = get_table_articles ($mbd,$user_id);
    $presupuesto = array();
    foreach ($data_article as $i => $data) {
        # code...
        if($data_expected[$i]["date_expected"] == 0){
            array_push($presupuesto,0);
        }else{
            $data["price"] = $data["price"] - $data["ahorrado"];
            $data = round($data["price"]/$data_expected[$i]["date_expected"],0);
            array_push($presupuesto,$data);
        }
    }
    return $presupuesto;
}


function valid_dropdown($mbd,$user_id){
    if($_GET["presupuesto"]){
        if($_GET["presupuesto"] == "Mensual"){
            $data = date_expected_mounth($mbd,$user_id);
            return $data;
        }else if($_GET["presupuesto"] == "Quincenal"){
            $data = date_expected_quincena($mbd,$user_id);
            return $data;
        }else if($_GET["presupuesto"] == "Anual"){
            $data = date_expected_anual ($mbd,$user_id);
            return $data;
        }else if($_GET["presupuesto"] == "Semanal"){
            $data = date_expected_semanal ($mbd,$user_id);
            return $data;
        }
    }
}
function valid_dropdown_echo(){
    if($_GET["presupuesto"]){
        if($_GET["presupuesto"] == "Mensual"){
            $data = 'Presupuesto Mensual';
            return $data;
        }else if($_GET["presupuesto"] == "Quincenal"){
            $data = 'Presupuesto Quincenal';
            return $data;
        }else if($_GET["presupuesto"] == "Anual"){
            $data = 'Presupuesto Anual';
            return $data;
        }else if($_GET["presupuesto"] == "Semanal"){
            $data = 'Presupuesto Semanal';
            return $data;
        }
    }

}
function calculated_presupuesto($mbd,$user_id){
    if($_GET["presupuesto"]){
        if($_GET["presupuesto"] == "Mensual"){
            $data = calculated_mounth($mbd,$user_id);
            return $data;
        }else if($_GET["presupuesto"] == "Quincenal"){
            $data = calculated_quincenal($mbd,$user_id);
            return $data;
        }else if($_GET["presupuesto"] == "Anual"){
            $data = calculated_anual($mbd,$user_id);
            return $data;
        }else if($_GET["presupuesto"] == "Semanal"){
            $data = calculated_semanal($mbd,$user_id);
            return $data;
        }
    }

}
function can_buy($mbd,$user_id,$i){
    $query_read_date = "SELECT  *  FROM articles WHERE user_id = $user_id AND estado = 0";
    $sentencia_leer_date = $mbd->prepare($query_read_date);
    $sentencia_leer_date->execute();
    $data_date = $sentencia_leer_date->fetchall();
    $bool=true;
    if($data_date[$i]["price"] > $data_date[$i]["ahorrado"]){
        $bool = true;
    }else {
        $bool = false;
    }
    return $bool;

}
function found($mbd,$user_id){
    $query_read_date = "SELECT SUM(ahorrado) AS 'fondos' FROM articles";
    $sentencia_leer_date = $mbd->prepare($query_read_date);
    $sentencia_leer_date->execute();
    $data_date = $sentencia_leer_date->fetchall();
    return $data_date;
}
