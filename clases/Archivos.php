<?php
/**
 * Description of Archivos
 *
 * @author DAVID
 */
class Archivos {
    private $archivo, $datosClientes, $ruta;
    
    function __construct($ruta) {
        $this->ruta = $ruta;
        $this->archivo = fopen($ruta, "r");
    }
    
    function getDatos(){
        return $this->datosClientes;
    }
    
    static function leerFormat1(){
        $this->datosClientes = Array();
        $i = 0;
        while(!feof($this->archivo)){
            $this->datosClientes[$i] = fgets($this->archivo);
            $i++;
        }
        return $this->datosClientes;
    }
    
    function leerFormat2(){
        $myArray = array();
        while(!feof($this->archivo)){
            $myArray[rtrim(fgets($this->archivo))] = rtrim(fgets($this->archivo));
        }
        return $myArray;
    }
    
    function leerFormat3(){
        $this->datosClientes = Array();
        $i = 0;
        while(!feof($this->archivo)){
            $this->datosClientes[$i] = explode(';', fgets($this->archivo));
            $i++;
        }
    }
    
    function leerFormat4(){
        $this->datosClientes = Array();
        $i = 0;
        while(!feof($this->archivo)){
            $this->datosClientes[fgets($this->archivo)];
            $i++;
        }
    }
    
    function writeLine($user, $password, $clientes){
        $clients = "";
        foreach ($clientes as $key => $value) {
            $clients = $clients . $key . "\n" . $value . "\n";
        }
        $clients = $clients . $user . "\n" . $password;
        $myFile = fopen($this->ruta, "w");
        fwrite($myFile, $clients);
    }
    
    function validarContraseña($user,$password){
        $i = 0;
        while(isset($this->datosClientes[$i])){
            if($this->datosClientes[$i][0] == $user){
                return true;
            }
            $i++;
        }
        return false;
    }
    
}