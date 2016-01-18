<?php

class Util {
    
    static function getSelect($name, $parametros, $valorSeleccionado = null, $blanco = true, $atributos = "", $id = null){
        if($id !== null){
            $id = "id = '$id'";
        }else{
            $id = "";
        }
        $r = "<select name='$name' $id $atributos >\n";
        if($blanco === true){
            $r .= "<option value=''>&nbsp;</option>\n";
        }
        foreach ($parametros as $indice => $valor) {
            $selected = "";
            if($valorSeleccionado !== null && $valorSeleccionado === $indice){
                $selected = "selected";
            }
            $r .= "<option $selected value='$indice'>$valor</option>\n";
        }
        $r .= "</select>";
        return $r;
    }
    
    static function getUl($name, $registros, $paginaActual = 0, $paginaAnterior = 0, $paginaSiguient = 0){
        $r = "<ul name='$name' >\n";
        $r .= "<li value='0'>Primera</li>";
        $r .= "<li value='$paginaAnterior'>Anterior</li>";
        for ($i=0;$i<$registros;$i++) {
            $r .= "<li value='$i'><a href='#paginaActual$i' >$valor</li>";
        }
        $r .= "<li value='$paginaSiguient'>Anterior</li>";
        $r .= "<li value='" . $registros . "'>Ultima</li>";
        $r .= "</ul>";
        return $r;
    }
    
}