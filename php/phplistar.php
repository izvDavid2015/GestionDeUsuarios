<?php

$sesion = new Session();
if(!$sesion->isLogged()){
    $sesion->destroy();
    $sesion->sendRedirect();
}

$bd = new DB();
$gestor = new ManagerUsuario($bd);

$page = new Page($gestor->getCount(), Constant::NRPP, Request::get("paginaActual"));
$queryString = new QueryString();

$users = array();
$users = $gestor->getListPage($page->getPaginaActual(), $page->getRpp());

$usuario = new Usuario();
$usuario = $sesion->getUser();

$ad = $usuario->getAdministrador();
$pe = $usuario->getPersonal();
