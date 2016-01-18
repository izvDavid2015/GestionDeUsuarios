<?php
    require '../clases/AutoCarga.php';
    $bd = new DB();
    $gestor = new ManagerUsuario($bd);
    $usuario = new Usuario();
    $correo = Request::get("correo");
    if($correo != ""){
        $actualizar = true;
        $usuario = $gestor->get($correo);
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
        <h1 class="titleForm" >Formulario de alta para administrador</h1>
        <form method="post" action="<?php if($actualizar){    echo 'phpactualizar.php'; }else{ echo 'phpalta.php '; } ?>" style="width: 30%; margin: auto; text-align: center; padding: 5% 0 0 0;">
            <input type="email" name="email" placeholder="Email" value="<?php if($actualizar){ echo $usuario->getEmail(); } ?>" required />
            <hr/>
            <input type="password" name="clave" placeholder="Clave" value="<?php if($actualizar){ echo $usuario->getClave(); } ?>" required />
            <hr/>
            <input type="text" name="alias" placeholder="Alias" value="<?php if($actualizar){ echo $usuario->getAlias(); } ?>" />
            <hr/>
            <input type="date" name="fechaAlta" placeholder="Fecha de alta" value="<?php if($actualizar){ echo $usuario->getFechaAlta(); } ?>" />
            <hr/>
            <label for="activo2">Activo</label>
            <input id="activo2" type="checkbox" name="activo" placeholder="Activo" <?php if($actualizar && $usuario->getActivo() == 1){ echo "checked"; } ?> />
            <label for="administrador2">Administrador</label>
            <input id="administrador2" type="checkbox" name="administrador" placeholder="Administrador" <?php if($actualizar && $usuario->getAdministrador()==1){ echo "checked"; } ?> />
            <label for="personal2">Personal</label>
            <input id="personal2" type="checkbox" name="personal" placeholder="Personal" <?php if($actualizar && $usuario->getPersonal()==1){ echo "checked"; } ?> />
            <hr/>
            <input type="submit" value="Update" />
        </form>
        
        <a class="volver" href="entorno.php" >
            <img alt="Foto" src="../img/return.png" />
        </a>
    </body>
</html>
<?php $bd->close(); ?>