<?php
require '../clases/AutoCarga.php';
$bd = new DB();
$sesion = new Session();
$gestor = new ManagerUsuario($bd);
$usuario = new Usuario();
$usuario->read2();
$cambio = "";
if($gestor->set($usuario, $usuario->getEmail())){
    if($usuario->getEmail() == $sesion->getUser()->getEmail()){
        $sesion->setUser($usuario);
    }
    $cambio = "Cambios realizados con exito";
}else{
    $cambio = "Alguno de los cambios que intento no se pudieron realizar en la base de datos.";
}

var_dump($usuario);
$bd->close();
if($usuario->getAdministrador() == 1 || $usuario->getPersonal() == 1){
    $sesion->sendRedirect("portal.php?cambio=$cambio");
}else{
    $sesion->sendRedirect("portalUS.php?cambio=$cambio");
}