<?php
require '../clases/AutoCarga.php';
$bd = new DB();
$gestor = new ManagerUsuario($bd);
$usuario = new Usuario();

$correo = Request::post("email");
$usuario = $gestor->get($correo);

if($usuario->getEmail() != NULL){
    header("Location:../indexAfirm.php?email=$correo");
}else{
    header("Location:../index.php?e=false");
}


$bd->close();
exit();