<!DOCTYPE html>
<?php
    require '../clases/AutoCarga.php';
    $sesion = new Session();
    if(!$sesion->isLogged()){
        $sesion->destroy();
        $sesion->sendRedirect();
    }
    $usuario = new Usuario();
    $usuario = $sesion->getUser();
    $ad = $usuario->getAdministrador();
    $pe = $usuario->getPersonal();
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
        <meta name="google-signin-client_id" content="607981450462-3beamqrqqch1cncspkehoecgu31u3rb4.apps.googleusercontent.com">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="phpobtenerToken.php" >Obtener token</a></li>
                    <li><a href="viewenvio.php" target="_blank" >Enviar mail de activacion</a></li>
                    <li><a href="portal.php" >Ver mis datos</a></li>
                    <li><a href="listar.php" >Ver base de datos</a></li>
                    <li><a href="phpcerrarsesion.php" >Cerrar sesion</a></li>
                </ul>
            </nav>
        </header>
        <div id="responsive" >
            <?php if($ad == 1){ ?>
            <a class="add" href="viewAltaAD.php" >
                <img alt="Foto" src="../img/jefe.png" />
                <p>Usuario Admin.</p>
            </a>
            <?php } ?>
            <?php if($pe == 1 || $ad == 1){ ?>
            <a class="add" href="viewAltaPE.php" >
                <img alt="Foto" src="../img/personal.png" />
                <p>Usuario Worker</p>
            </a>
            <?php } ?>
            <a class="add" href="viewAltaUS.php" >
                <img alt="Foto" src="../img/usuario.png" />
                <p>Usuario Normal</p>
            </a>
        </div>
        <a href="phpcerrarsesion.php" class="volver" >Cerrar sesion.</a>
        
        <a href="#" onclick="signOut();">Sign out</a>
        
        <script>
          function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });
          }
        </script>
    </body>
</html>