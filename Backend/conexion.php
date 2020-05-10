<?php
$user_db = "root";
$pass_db = "";
$link = "mysql:host=localhost;dbname=apptask";

try {
    $mbd = new PDO($link, $user_db, $pass_db);
    // echo "Estoy dentro xD";
    // $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}