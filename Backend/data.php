<?php
include ("conexion.php");
// functions
function data_tasks($mbd){
        $query_read = "SELECT * FROM tasks";
        $gsent = $mbd->prepare($query_read);
        $gsent->execute();
        $data = $gsent->fetchall();
    
        $data = json_encode ($data);
    
        echo $data;
        return;
}
// function data_tasks(){

// }
data_tasks($mbd);
