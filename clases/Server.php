<?php

class Server {
    
    static function getServerName(){
        return $_SERVER["SERVER_NAME"];
    }
    
    static function getRootPath(){
        return $_SERVER["CONTEXT_DOCUMENT_ROOT"];
    }
    
    static function getPort(){
        return $_SERVER["SERVER_PORT"];
    }
    
    static function getUserAgent(){
        return $_SERVER["HTTP_USER_AGENT"];
    }
    
    static function getQueryString(){
        return $_SERVER["REQUEST_URI"];
    }
    
    static function getFile(){
        return $_SERVER["SCRIPT_FILENAME"];
    }
    
    static function getMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }
    
    static function getOriginPage(){
        if(isset($_SERVER["HTTP_REFERER"]))
            return $_SERVER["HTTP_REFERER"];
        return "";
    }
    
    static function getOriginPageName(){
        if(isset($_SERVER["HTTP_REFERER"]))
            return pathinfo ($_SERVER["HTTP_REFERER"])["basename"];
        return "";
    }
    
    static function getClientAddres(){
        return $_SERVER["REMOTE_ADDR"];
    }
    
    static function getClientLanguaje(){
        return $_SERVER["HTTP_ACCEPT_LANGUAGE"];
    }
    
    static function getRequestDate($campo=null){
        date_default_timezone_set("Europe/Madrid");
        switch ($campo){
            case "Y";
                return $fech = date("Y",$_SERVER["REQUEST_TIME"]);
            case "M";
                return $fech = date("m",$_SERVER["REQUEST_TIME"]);
            case "D";
                return $fech = date("d",$_SERVER["REQUEST_TIME"]);
            case "h";
                return $fech = date("H",$_SERVER["REQUEST_TIME"]);
            case "m";
                return $fech = date("i",$_SERVER["REQUEST_TIME"]);
            case "s";
                return $fech = date("s",$_SERVER["REQUEST_TIME"]);
        }
        return $_SERVER["REQUEST_TIME"];
    }
    
    
    
}
