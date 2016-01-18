<?php
    require '../clases/AutoCarga.php';
    $sesion = new Session();
    $correo = "";
    if($sesion->getUser()->getEmail() != null){
        $correo = $sesion->getUser()->getEmail();
    }
?>
<!DOCTYPE html>
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
        <h1 class="titleForm" >Formulario de recuperacionde clave</h1>
        <form method="post" action="phprecuemail.php" style="width: 30%; margin: auto; text-align: center; padding: 5% 0 0 0;">
            <input type="email" name="correo" placeholder="Email" value="<?php echo $correo; ?>" required />
            <hr/>
            <input type="submit" value="Update" />
        </form>
        
        <a class="volver" href="portalUS.php" >
            <img alt="Foto" src="../img/return.png" />
        </a>
    </body>
</html>