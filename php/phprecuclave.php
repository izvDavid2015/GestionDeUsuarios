<?php
require '../clases/AutoCarga.php';
$correo = Request::req("correo");
MailGoogle::sendMailRecuperaciondeclave($correo);
header("Location:https://mail.google.com/mail/");
exit();