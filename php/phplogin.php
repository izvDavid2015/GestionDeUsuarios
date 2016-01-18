<?php
require '../clases/AutoCarga.php';
$bd = new DB();
$gestor = new ManagerUsuario($bd);
$usuario = new Usuario();

$correo = Request::req("email");
$usuario = $gestor->get($correo);
$password = Request::post("password");

if(Request::req("alta") != ""){
    $sesion = new Session();
    $sesion->setUser($usuario);
    $bd->close();
    if($usuario->getAdministrador() == 1 || $usuario->getPersonal() == 1){
        header("Location:entorno.php");
    }else{
        header("Location:portalUS.php");
    }
    exit();
}

if(sha1($password) === $usuario->getClave()){
    if($usuario->getActivo() == 0){
        header("Location:../indexAfirm.php?activate=true&email=$correo");
        exit();
    }
    $sesion = new Session();
    $sesion->setUser($usuario);
    if($usuario->getAdministrador() == 1 || $usuario->getPersonal() == 1){
        header("Location:entorno.php");
    }else{
        header("Location:portalUS.php");
    }
}else{
    header("Location:../indexAfirm.php?error=true&email=$correo");
}


$bd->close();
exit();