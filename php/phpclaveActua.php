<?php
require '../clases/AutoCarga.php';
$bd = new DB();
$gestor = new ManagerUsuario($bd);
$usuario = new Usuario();
$correo = Request::post("correo");
$secret = sha1($correo . Constant::SEMILLA);
if($secret === Request::get("secreto") && Request::post("clave") == Request::post("claveR")){
    $usuario = $gestor->get($correo);
    $usuario->setClave(sha1(Request::post("clave")));
    $gestor->set($usuario,$usuario->getEmail());
}

$bd->close();
header("Location:../index.php");
exit();