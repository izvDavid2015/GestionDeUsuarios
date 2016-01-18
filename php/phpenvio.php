<?php
require '../clases/AutoCarga.php';

MailGoogle::sendMailActivacion(Request::post("correo"));
header("Location:../index.php");
exit();