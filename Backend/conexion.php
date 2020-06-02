<?php
$user_db = "root";
$pass_db = "";
$link = "mysql:host=localhost;dbname=apptask";

try {
    $mbd = new PDO($link, $user_db, $pass_db);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

// $conexion = mysqli_connect("localhost","root", "", "phpmysql");