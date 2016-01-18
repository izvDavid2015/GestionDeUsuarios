<?php
    require '../clases/AutoCarga.php';
    $bd = new DB();
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
        <h1 class="titleForm" >Formulario de alta para administrador</h1>
        <form method="post" action="phpenvio.php" style="width: 30%; margin: auto; text-align: center; padding: 5% 0 0 0;">
            <input type="email" name="correo" placeholder="Email" required />
            <hr/>
            <input type="submit" value="Update" />
        </form>
        
        <a class="volver" href="entorno.php" >
            <img alt="Foto" src="../img/return.png" />
        </a>
    </body>
</html>
<?php $bd->close(); ?>