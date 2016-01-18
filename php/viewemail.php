<?php
    require '../clases/AutoCarga.php';
    $correo = Request::get("correo");
    $secret = sha1($correo . Constant::SEMILLA);
    if($secret === Request::get("secreto")){
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
        <form method="post" action="phpemailActua.php?secreto=<?php echo Request::get("secreto") ?>" style="width: 30%; margin: auto; text-align: center; padding: 5% 0 0 0;">
            <input type="email" name="correo3" placeholder="Email" required disabled value="<?php echo $correo; ?>" />
            <input type="email" name="correo" placeholder="Email" required hidden value="<?php echo $correo; ?>" />
            <hr/>
            <input type="email" name="correoA" placeholder="Email" required value="<?php echo $correo; ?>" />
            <hr/>
            <input type="email" name="correoB" placeholder="Email" required value="<?php echo $correo; ?>" />
            <hr/>
            <input type="submit" value="Update" />
        </form>
        
        <a class="volver" href="entorno.php" >
            <img alt="Foto" src="../img/return.png" />
        </a>
    </body>
</html>
<?php }else{ echo "<h1>Error en su activacion vuelva a intentarlo.</h1>"; } ?>