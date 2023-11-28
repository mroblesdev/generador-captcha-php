<?php

/**
 * Este script PHP maneja la verificación de un código ingresado en un formulario.
 * Requiere el uso de sesiones y funciones auxiliares definidas en 'funcs/funcs.php'.
 *
 * @link https://github.com/mroblesdev
 * @author mroblesdev
 */

session_start();

include_once 'funcs/funcs.php';

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';

if (empty($nombre) || empty($codigo)) {
    setFlashData('error', 'Debe llenar todos los datos');
    redirect('index.php');
}

$codigoVerificacion = isset($_SESSION['codigo_verificacion']) ? $_SESSION['codigo_verificacion'] : '';
$captcha = sha1($codigo);

if ($codigoVerificacion !== $captcha) {
    $_SESSION['codigo_verificacion'] = '';
    setFlashData('error', 'El código de verificación es incorrecto');
    redirect('index.php');
}
