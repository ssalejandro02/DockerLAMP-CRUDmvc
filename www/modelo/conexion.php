<?php

class Conexion
{
    /**
     * Conexión con la base de datos
     *
     * @return PDO|null
     */
    public static function conectar()
    {
        $dsn = 'mysql:host=db;dbname=crudmvc';
        $usuario = 'root';
        $contrasena = 'test';

        try {
            $conexion = new PDO($dsn, $usuario, $contrasena);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec('SET NAMES utf8mb4');

            return $conexion;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();

            return null;
        }
    }
}
