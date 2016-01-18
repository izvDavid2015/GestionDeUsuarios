<?php

class DB {
    private $conexion, $consulta;
    
    function __construct() {
        try {
            $this->conexion = new PDO('mysql:host=' . Constant::SERVER . ';dbname=' . Constant::DATABASE, Constant::DBUSER, Constant::DBPASSWORD, array(
                PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
            ));
        } catch (PDOException $e) {
            var_dump($e);
            exit();
        }
    }

    function close(){
        $this->conexion = null;
    }
    
    function getCount(){
        return $this->consulta->rowCount();
    }
    
    function getID(){
        return $this->conexion->lastInsertId();
    }
    
    function getErrorConection(){
        return $this->conexion->errorInfo();
    }
    
    function getError(){
        return $this->consulta->errorInfo();
    }
    
    function send($sql, $parametros = array()){
        $this->consulta = $this->conexion->prepare($sql);
        foreach ($parametros as $nombreParametro => $valorParametro) {
            $this->consulta->bindValue($nombreParametro, $valorParametro);
        }
        return $this->consulta->execute();
    }
    
    function getRow(){
        $r = $this->consulta->fetch();
        if($r === null){
            $this->consulta->closeCursor();
        }
        return $r;
    }
    
    function count($tabla, $condicion = "1=1", $parametros = array()){
        $sql = "select count(*) from $tabla where $condicion";
        $this->send($sql,$parametros);
        $fila = $this->getRow();
        return $fila[0];
    }
    
    function eraseDelete($tabla,$condicion,$parametros = array()){
        $sql = "delete from $tabla where $condicion";
        if($this->send($sql,$parametros))
            return $this->getCount();
        return false;
    }
    
    function delete($tabla,$parametros = array()){
        $camposWhere = "";
        foreach ($parametros as $nombreParametro => $valorParametro) {
            $camposWhere .= $nombreParametro . " = :" . $nombreParametro . " and ";
        }
        $camposWhere = substr($camposWhere, 0, -4);
        $sql = "delete from $tabla where $camposWhere";
        if($this->send($sql,$parametros))
            return $this->getCount();
        return false;
    }
    
    function insert($tabla,$parametros = array(),$auto = true){
        $sql = "insert into $tabla ";
        $campos = "";
        $valores = "";
        foreach ($parametros as $nombreParametro => $valorParametro) {
            $campos .= $nombreParametro . ",";
            $valores .= ":" . $nombreParametro . ",";
        }
        $campos = substr($campos, 0, -1);
        $valores = substr($valores, 0, -1);
        $sql = "insert into $tabla ($campos) values ($valores)";
        if($this->send($sql,$parametros)){
            if($auto){
                return $this->getID();
            }
            return $this->getCount();
        }
        return false;
    }
    
    function update($tabla,$parametrosSet = array(),$parametrosWhere = array()){
        $camposSet = "";
        $camposWhere = "";
        $parametros = array();
        foreach ($parametrosSet as $nombreParametro => $valorParametro) {
            $camposSet .= $nombreParametro . " = :" . $nombreParametro . ",";
            $parametros[$nombreParametro] = $valorParametro;
        }
        $camposSet = substr($camposSet, 0, -1);
        foreach ($parametrosWhere as $nombreParametro => $valorParametro) {
            $camposWhere .= $nombreParametro . " = :_" . $nombreParametro . " and ";
            $parametros["_" . $nombreParametro] = $valorParametro;
        }
        //$camposWhere .= "1=1";
        $camposWhere = substr($camposWhere, 0, -4);
        $sql = "update $tabla set $camposSet where $camposWhere";
        if($this->send($sql,$parametros))
            return $this->getCount();
        return -1;
    }
    
    function query($tabla,$proyeccion = "*",$parametros = array(),$orden = "1",$limite = ""){
        $campos = "";
        foreach ($parametros as $nombreParametro => $valorParametro) {
            $campos .= $nombreParametro . " = :" . $nombreParametro . " and ";
        }
        $campos .= "1=1";
        //$campos = substr($campos, 0, -4);
        $limit = "";
        if($limite !== ""){
            $limit = "limit $limite";
        }
        $sql = "select $proyeccion from $tabla"
                . " where $campos order by $orden $limit";
        return $this->send($sql, $parametros);
    }
    
    function select($tabla, $proyeccion = "*", $condicion = "1=1", $parametros = array(), $orden = "1", $limite = ""){
        $limit = "";
        if($limite !== ""){
            $limit = "limit $limite";
        }
        $sql = "select $proyeccion from $tabla where $condicion order by $orden $limit";
        return $this->send($sql, $parametros);
    }
    
}
