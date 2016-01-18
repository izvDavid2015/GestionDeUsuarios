<!DOCTYPE html>
<?php
    require '../clases/AutoCarga.php';
    include './phplistar.php';
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Gestion de usuarios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="David Rodriguez Garcia">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    </head>
    <body>
        <div id="responsive" >
            <table>
                <tr>
                    <th>Email</th>
                    <th>Clave</th>
                    <th>Alias</th>
                    <th>Fecha alta</th>
                    <th>Activo</th>
                    <th>Administrador</th>
                    <th>Personal</th>
                    <th>Modificar</th>
                </tr>
                <?php foreach ($users as $key => $usu) { ?>
                    <tr>
                        <td><?php echo $usu->getEmail(); ?></td>
                        <td><?php echo $usu->getClave(); ?></td>
                        <td><?php echo $usu->getAlias(); ?></td>
                        <td><?php echo $usu->getFechaAlta(); ?></td>
                        <td><?php echo $usu->getActivo(); ?></td>
                        <td><?php echo $usu->getAdministrador(); ?></td>
                        <td><?php echo $usu->getPersonal(); ?></td>
                        <td><a href="viewAlta<?php if($ad==1){ echo "AD"; }else{ echo "PE"; } ?>.php?correo=<?php echo $usu->getEmail(); ?>" >Actualizar</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <form action="#" method="get" >
            <?php echo $page->getSelect("select", "nrpp"); ?>
            </br>
            <?php
                $array = array();
                for($i = 0; $i < $page->getPaginas(); $i++){
                    $array[$i] = $i;
                }
                echo Util::getSelect("paginaActual", $array, $gestor->getCount());
            ?>
            </br>
            <input type="submit" value="Filtrar" />
        </form>
        
        <a class="volver" href="entorno.php" >
            <img alt="Foto" src="../img/return.png" />
        </a>
        <a href="phpcerrarsesion.php" class="volver" >Cerrar sesion.</a>
    </body>
</html>
<?php $bd->close(); ?>