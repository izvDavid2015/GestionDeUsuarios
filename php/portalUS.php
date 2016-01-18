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
        <meta name="google-signin-client_id" content="607981450462-3beamqrqqch1cncspkehoecgu31u3rb4.apps.googleusercontent.com">
        <meta name="author" content="David Rodriguez Garcia">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </head>
    <body>
        <h1 class="titleForm" >Mis datos</h1>
        <form method="post" action="phpactualizar.php" style="width: 30%; margin: auto; text-align: center; padding: 5% 0 0 0;"/>
            <hr/>
            <input type="email" name="email2" placeholder="Email" value="<?php echo $usuario->getEmail(); ?>" required disabled />
            <input type="email" name="email" placeholder="Email" value="<?php echo $usuario->getEmail(); ?>" required hidden />
            <hr/>
            <input type="text" name="alias" placeholder="Alias" value="<?php echo $usuario->getAlias(); ?>" required />
            <hr/>
            <input type="password" name="clave2" placeholder="Clave" value="<?php echo $usuario->getClave(); ?>" required disabled />
            <input type="password" name="clave" placeholder="Clave" value="<?php echo $usuario->getClave(); ?>" required hidden />
            <hr/>
            <input type="date" name="fechaAlta2" placeholder="Fecha" value="<?php echo $usuario->getFechaAlta(); ?>" required disabled />
            <input type="date" name="fechaAlta" placeholder="Fecha" value="<?php echo $usuario->getFechaAlta(); ?>" required hidden />
            <hr/>
            <label for="activo2">Activo</label>
            <input id="activo2" type="checkbox" name="activo" placeholder="Activo" <?php if($usuario->getActivo() == 1){ echo "checked"; } ?> />
            <input type="submit" value="Update" />
        </form>
        <?php if(Request::get("cambio") != "" || Request::get("cambio") != null){ ?>
            <h1 class="titleForm" ><?php echo Request::get("cambio"); ?></h1>
        <?php } ?>
        <a class="volver titleForm" href="phpcerrarsesion.php" >Cerrar sesion</a>
        
        <a href="#" onclick="signOut();">Sign out</a>
        </br>
        <a href="sendMailClave.php">Change password</a>
        
        <a href="sendMailClave.php">Change email</a>
        
        <script>
        "use strict";
          function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
              console.log('User signed out.');
            });
          }
        </script>
    </body>
</html>
<?php $bd->close(); ?>
