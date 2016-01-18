<?php
require '../clases/AutoCarga.php';
$bd = new DB();
$gestor = new ManagerUsuario($bd);
$usuario = new Usuario();
$correo = Request::post("correoA");
$correoB = Request::post("correoB");
$secret = sha1($correo . Constant::SEMILLA);
if($secret === Request::get("secreto") && $gestor->get($correo)->getEmail() != $correo && $correo == $correoB){
    $usuario = $gestor->get($correo);
    $old = $usuario->getEmail();
    $usuario->setEmail($correo);
    $gestor->set($usuario,$old);
}

$bd->close();
header("Location:../index.php");
exit();