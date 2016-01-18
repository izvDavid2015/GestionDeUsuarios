<?php
require '../clases/AutoCarga.php';
$bd = new DB();
$gestor = new ManagerUsuario($bd);
$usuario = new Usuario();
$correo = Request::get("correo");
$secret = sha1($correo . Constant::SEMILLA);
if($secret === Request::get("secreto")){
    $usuario = $gestor->get($correo);
    $usuario->setActivo(1);
    $gestor->set($usuario,$usuario->getEmail());
}

$bd->close();