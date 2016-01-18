<?php

class Usuario {
    private $email, $clave, $alias, $fechaAlta, $activo, $administrador, $personal;
    
    function __construct($email = null, $clave = null, $alias = null, $activo = 0, $administrador = 0, $personal = 0) {
        $this->email = $email;
        $this->clave = $clave;
        $this->alias = $alias;
        date_default_timezone_set(Constant::TIMEZONEDEF);
        $f = date("Y-m-d");
        $this->fechaAlta = $f;
        $this->activo = $activo;
        $this->administrador = $administrador;
        $this->personal = $personal;
    }

    function getEmail() {
        return $this->email;
    }

    function getClave() {
        return $this->clave;
    }

    function getAlias() {
        return $this->alias;
    }

    function getFechaAlta() {
        return $this->fechaAlta;
    }

    function getActivo() {
        return $this->activo;
    }

    function getAdministrador() {
        return $this->administrador;
    }

    function getPersonal() {
        return $this->personal;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setAdministrador($administrador) {
        $this->administrador = $administrador;
    }

    function setPersonal($personal) {
        $this->personal = $personal;
    }

    public function getJson(){
        $resul = "{";
        foreach ($this as $indice => $valor) {
            $resul = $resul . '"' . $indice . '"' . ': "' . $valor . '",';
        }
        $resul = substr($resul,0,-1);
        $resul = $resul . "}";
        return $resul;
    }
    
    function set($valores, $inicio = 0){
        $i = 0;
        foreach ($this as $indice => $valor) {
            $this->$indice = $valores[$i + $indice];
            $i++;
        }
    }

    public function __toString() {
        $cad = "";
        foreach ($this as $key => $value) {
            $cad .= "$value ";
        }
        return $cad;
    }
    
    public function getArray($valores = true){
        $array = array();
        foreach ($this as $key => $value) {
            if($valores)
                $array[$key] = $value;
            else $array[$key] = null;
        }
        return $array;
    }
    
    public function read(){
        foreach ($this as $key => $value) {
            if($key === 'fechaAlta')
                continue;
            if($key === 'alias' && $key == 0){
                $num = strpos($this->email, '@');
                $this->$key = substr($this->email, 0, $num);
                continue;
            }
            if(Request::req($key) === null){
                $this->$key = 0;
            }else{
                if(Request::req($key) === "on"){
                    $this->$key = 1;
                }else{
                    $this->$key = Request::req($key);
                }
            }
        }
    }
    
    public function read2(){
        foreach ($this as $key => $value) {
            if(Request::req($key) === null){
                $this->$key = 0;
            }else{
                if(Request::req($key) === "on"){
                    $this->$key = 1;
                }else{
                    $this->$key = Request::req($key);
                }
            }
        }
    }
}
