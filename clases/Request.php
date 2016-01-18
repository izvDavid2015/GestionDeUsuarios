<?php

class Request {
    
    static function get($nombre,$filter = true,$indice = null){
        if(isset($_GET[$nombre])){
            return self::readCarmelo($_GET[$nombre],$filter,$indice);
        }
        return null;
    }
    
    static function post($nombre,$filter = true,$indice = null){
        if(isset($_POST[$nombre])){
            return self::readCarmelo($_POST[$nombre],$filter,$indice);
        }
        return null;
    }
    
    static function req($nombre,$indice = null){
        $valor = self::post($nombre);
        if($valor !== null){
            return $valor;
        }
        return self::get($nombre,$indice);
    }
    
    private static function clean($valor,$filter){//para filtrar y limpiar valores
        if($filter===true)
            return htmlspecialchars($valor);
        return trim($valor);
    }
    
    private static function readCarmelo($parametro,$filter = true,$indice=null){
        if(is_array($parametro)){
            if($indice === null){
                $array = array();
                foreach ($parametro as $value) {
                    $r = self::clean($value,$filter);
                    if($r = ""){
                        $r = null;
                    }
                    $array[] = $r;
                }
                return $array;
            }else{
                if(isset($parametro[$indice])){
                    $r = self::clean($value,$filter);
                    if($r === ""){
                        $r = null;
                    }
                }
                return $r;
            }
        }else{
            $r = self::clean($parametro,$filter);
            if($r === ""){
                $r = null;
            }
            return $r;
        }
    }
    
}