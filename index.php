<!DOCTYPE html>
<?php
    require 'clases/Request.php';
    $e = "";
    if(Request::get("e")){
        $e = "Error. No existe ese correo en nuestra base de datos.";
    }
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
        <link rel="stylesheet" type="text/css" href="css/estilo2.css" />
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </head>
    <body>
        <header>
            <form action="php/phpprelogin.php" method="post" class="login">
              <h1>Sign in</h1>
              <input type="email" name="email" class="login-input" placeholder="Email Address" autofocus>
              <input type="submit" value="Sign in" class="login-submit">
              <div class="g-signin2" data-onsuccess="onSignIn"></div>
              <p class="login-help"><a href="php/sendMailClave.php">Forgot password?</a></p>
            </form>
            <form action="php/phpalta.php" method="post" class="login">
              <h1>Sign up</h1>
              <input type="email" name="email" class="login-input" placeholder="Email Address" autofocus>
              <input type="password" name="clave" class="login-input" placeholder="Password">
              <input type="password" name="claveR" class="login-input" placeholder="Password repeat">
              <input type="submit" value="Sign up" class="login-submit">
            </form>
        </header>
        <h3><?php if($e){ echo $e; } ?></h3>
    </body>
    <script>
        var onSignIn = function (googleUser) {
             var profile = googleUser.getBasicProfile();
             console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
             console.log('Name: ' + profile.getName());
             console.log('Image URL: ' + profile.getImageUrl());
             console.log('Email: ' + profile.getEmail());
             var id_token = googleUser.getAuthResponse().id_token;
             var xhr = new XMLHttpRequest();
             xhr.open('POST', 'https://gestiondeusuarios-izvdavid2015.c9users.io/php/phpgettoken.php');
             xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
             xhr.onload = function() {
                console.log(xhr.responseText);
                if(window.location.href.indexOf("noGOO") == -1){
                    window.open('https://gestiondeusuarios-izvdavid2015.c9users.io/php/portalUS.php',"_parent");
                }
             };
             xhr.send('id_token=' + id_token);
        }
    </script>
</html>
