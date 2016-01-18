<?php
    /* gettoken.php */
    $id_token = $_POST["id_token"];
    $url = 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$id_token;
    $conexion = curl_init();
    curl_setopt($conexion, CURLOPT_URL, $url);
    curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);
    $r = curl_exec($conexion);
    curl_close($conexion);
    echo($r);//aquí vienen todos los datos
    $correo = json_decode($r,true);
    
    header("Location:phpalta.php?email=" . $correo["email"]);
    exit();