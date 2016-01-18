<?php
/*la ubicacion desde donde tenemos que hacer la ruta es la del archivo donde se implementa la autocarga*/
class AutoCarga {
    static function cargar($clase){
        $clase = str_replace("\\", "/", $clase);
        $archivo = "../clases/" .$clase . ".php";
         if (file_exists($archivo)) {
              require $archivo;
         }else{
             
         }
   }
}
spl_autoload_register('AutoCarga::cargar');
