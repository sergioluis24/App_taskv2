<?php
session_start();
if($_SESSION['CC']){
    $_SESSION["errores"]=NULL;
    header("location:../index.php?presupuesto=Mensual");
} else if($_SESSION["errores"]){
    header("location:../login.php");
}