<?php

/**
 * Este script PHP genera una imagen con un texto
 * para usar como código de seguridad.
 *
 * @link https://github.com/mroblesdev
 * @author mroblesdev
 */

session_start();

// Genera un código aleatorio de 5 caracteres
$codigo = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 5);
$ancho = 150;
$alto = 50;
$fuente = realpath('../font/Consolas.ttf');
$tamanioFuente = 30;

// Guarda el código en la sesión
$_SESSION['codigo_verificacion'] = sha1($codigo);

// Crear una imagen
$imagen = imagecreatetruecolor($ancho, $alto);
$colorFondo = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $colorFondo);

// Colores para texto, líneas y puntos
$colorText = imagecolorallocate($imagen, 50, 50, 50);
$colorSecundario = imagecolorallocate($imagen, 0, 0, 128);

// Agrega líneas
for ($i = 0; $i < 6; $i++) {
    imageline($imagen, 0, rand(0, $alto), $ancho, rand(0, $alto), $colorSecundario);
}

// Agrega punto aleatorios
for ($i = 0; $i < 500; $i++) {
    imagesetpixel($imagen, rand(0, $ancho), rand(0, $alto), $colorSecundario);
}

// Escribe texto en la imagen
imagettftext($imagen, $tamanioFuente, -5, 10, 35, $colorText, $fuente, $codigo);

// Mostrar la imagen y leverar memoria
header('Content-Type: image/png');
imagepng($imagen);
imagedestroy($imagen);
