<?php

class ManagerUsuario {
    private $bd = null;
    private $tabla = "usuario";
    
    function __construct(DB $bd) {
        $this->bd = $bd;
    }
    
    public function get($id){
        $parametros = array();
        $parametros['email'] = $id;
        $this->bd->select($this->tabla, "*", "email=:email",$parametros);
        $fila = $this->bd->getRow();
        $usuario = new Usuario();
        $usuario->set($fila);
        return $usuario;
    }
    
    public function delete($email){
        $parametros = array();
        $parametros['email'] = $email;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    public function erase(Usuario $usuario){
        return $this->delete($country->getCode());
    }
    
    public function set(Usuario $usuario, $emailOld){
        $parametros = $usuario->getArray();
        $parametrosWhere = array();
        $parametrosWhere["email"] = $emailOld;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    
    public function insert(Usuario $usuario){
        $usuario2 = new Usuario();
        $usuario2 = $usuario;
        $usuario2->setClave(sha1($usuario2->getClave()));
        $parametros = $usuario2->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    public function getList(){
        $this->bd->select($this->tabla, "*", "1=1", Array(), "email, alias");
        $r =  array();
        while ($fila = $this->bd->getRow()){
            $usuario = new Usuario();
            $usuario->set($fila);
            $r[] = $usuario;
        }
        return $r;
    }
    
    public function getCount(){
        $this->bd->select($this->tabla, "email");
        $r = $this->bd->getCount();
        return $r;
    }
    
    public function getListPage($paginaActual = 0, $nrpp = Constant::NRPP){
        $this->bd->select($this->tabla, "*", "1=1", Array(), "email, alias", "$paginaActual,$nrpp");
        $r =  array();
        while ($fila = $this->bd->getRow()){
            $usuario = new Usuario();
            $usuario->set($fila);
            $r[] = $usuario;
        }
        return $r;
    }
    
    public function getValuesSelect(){
        $this->bd->query($this->tabla, "email, alias", array(), "alias");
        $array = array();
        while($fila = $this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
}