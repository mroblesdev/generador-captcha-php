<?php

/**
 * Este archivo contiene funciones auxiliares utilizadas en diversas partes
 * del sistema para la manipulación de sesiones y redirección de páginas.
 *
 * @link https://github.com/mroblesdev
 * @author mroblesdev
 */

if (!function_exists('setFlashData')) {
    /**
     * Establecer un mensaje flash en la sesión.
     *
     * @param string $indice Nombre de la clave de sesión.
     * @param strign $valor Valor del mensaje
     *
     * @return string|null
     */
    function setFlashData($indice, $valor)
    {
        $_SESSION[$indice] = $valor;
    }
}

if (!function_exists('getFlashData')) {
    /**
     * Obtener y eliminar un mensaje flash de la sesión.
     *
     * @param string $indice Nombre de la clave de sesión.
     *
     * @return string|null
     */
    function getFlashData($indice)
    {
        if (isset($_SESSION[$indice])) {
            $valor = $_SESSION[$indice];
            unset($_SESSION[$indice]);
            return $valor;
        }
        return null;
    }
}

if (!function_exists('redirect')) {
    /**
     * Redirecciona a una URL
     *
     * @param string $url URL de destino
     *
     * @return void
     */
    function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}
