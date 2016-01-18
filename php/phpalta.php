<?php
require '../clases/AutoCarga.php';
$bd = new DB();
$gestor = new ManagerUsuario($bd);
$usuario = new Usuario();


if(Server::getOriginPageName() === "viewAltaUS.php"){
    if(Request::post("clave") === Request::post("claveR")){
        $usuario->read();
        $usuario->setAdministrador(0);
        $usuario->setPersonal(0);
        $gestor->insert($usuario);
        MailGoogle::sendMailActivacion($usuario->getEmail());
    }
}elseif(Server::getOriginPageName() === "viewAltaPE.php"){
    $usuario->read();
    $usuario->setAdministrador(0);
    $gestor->insert($usuario);
    MailGoogle::sendMailActivacion($usuario->getEmail());
}elseif(Server::getOriginPageName() === "viewAltaAD.php"){
    $usuario->read();
    $gestor->insert($usuario);
    MailGoogle::sendMailActivacion($usuario->getEmail());
}elseif(Server::getOriginPageName() === "index.php"){
    $usuario->read();
    if($gestor->get($usuario->getEmail())->getEmail() != null){
        header("Location:phplogin.php?alta=true&email=" . Request::get('email'));
    }else{
        $usuario->setActivo(1);
        $usuario->setAdministrador(0);
        $usuario->setPersonal(0);
        $gestor->insert($usuario);
        MailGoogle::sendMailActivacion($usuario->getEmail());
    }
}

$bd->close();
exit();