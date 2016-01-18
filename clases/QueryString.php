<?php

class QueryString { 

    private $params;

    function __construct() {
        $this->params = $_GET;
    }

    function get($nombre) {
        return $this->params[$nombre];
    }

    function getParamsWithout($parametrosDelete = array()){/**/
        return $this->getParams(array(), $parametrosDelete);
    }

    function getParams($parametrosAdd = array(), $parametrosDelete = array()) {/**/
        $copia = $this->params;
        foreach ($parametrosDelete as $key => $value) {
            unset($copia[$key]);
        }
        foreach ($parametrosAdd as $key => $value) {
            $copia[$key] = $value;
        }
        $cad = "";
        foreach ($copia as $key => $value) {
            $cad .= $key . "=" . urlencode($value) . "&";
        }
        return substr($cad, 0, -1);
    }

    function set($nombre, $valor) {
        $this->params[$nombre] = $valor;
    }

    function delete($nombre) {
        unset($this->params[$nombre]);
    }
/*
    function toStringInterno($array) {
        $cad = "";
        foreach ($array as $key => $value) {
            $cad .= $key . "=" . urlencode($value) . "&";
        }
        return substr($cad, 0 , -1);
    }
*/
    function __toString() {
        $cad = "";
        $cad = $this->params;
        foreach ($this->params as $key => $value) {
            $cad .= $key . "=" . $value . "&";
        }
        $cad = substr($cad, 0 , -1);
        return $cad;
    }
    
}
