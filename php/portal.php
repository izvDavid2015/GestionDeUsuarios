<!DOCTYPE html>
<?php
    require '../clases/AutoCarga.php';
    $sesion = new Session();
    if(!$sesion->isLogged()){
        $sesion->destroy();
        $sesion->sendRedirect();
    }
    $bd = new DB();
    $usuario = new Usuario();
    $usuario = $sesion->getUser();
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
        <h1 class="titleForm" >Mis datos</h1>
        <form method="post" action="phpactualizar.php" style="width: 30%; margin: auto; text-align: center; padding: 5% 0 0 0;"/>
            <hr/>
            <input type="email" name="email" placeholder="Email" value="<?php echo $usuario->getEmail(); ?>" required />
            <hr/>
            <input type="text" name="alias" placeholder="Alias" value="<?php echo $usuario->getAlias(); ?>" required />
            <hr/>
            <input type="password" name="clave2" placeholder="Clave" value="<?php echo $usuario->getClave(); ?>" required disabled />
            <input type="password" name="clave" placeholder="Clave" value="<?php echo $usuario->getClave(); ?>" required hidden />
            <hr/>
            <input type="date" name="fechaAlta" placeholder="Fecha" value="<?php echo $usuario->getFechaAlta(); ?>" required />
            <hr/>
            <label for="activo2">Activo</label>
            <input id="activo2" type="checkbox" name="activo" placeholder="Activo" <?php if($usuario->getActivo() == 1){ echo "checked"; } ?> />
            <label for="administrador2">Administrador</label>
            <input id="administrador2" type="checkbox" name="administrador" placeholder="Administrador" <?php if($usuario->getAdministrador() == 1){ echo "checked"; }else{ echo "disabled";} ?> />
            <label for="personal2">Personal</label>
            <input id="personal2" type="checkbox" name="personal" placeholder="Personal" <?php if($usuario->getPersonal() == 1){ echo "checked"; }else{ echo "disabled";} ?> />
            <hr/>
            <input type="submit" value="Update" />
        </form>
        <?php if(Request::get("cambio") != "" || Request::get("cambio") != null){ ?>
            <h1 class="titleForm" ><?php echo Request::get("cambio"); ?></h1>
        <?php } ?>
        <a class="volver titleForm" href="phpcerrarsesion.php" >Cerrar sesion</a>
        <a class="volver" href="entorno.php" >
            <img alt="Foto" src="../img/return.png" />
        </a>
    </body>
</html>
<?php $bd->close(); ?>
