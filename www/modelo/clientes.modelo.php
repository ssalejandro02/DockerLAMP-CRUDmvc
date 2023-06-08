<?php

require_once 'conexion.php';

class mdlClientes
{
    /**
     * Mostrar clientes, consulta SQL
     *
     * @return array|false
     */
    static public function mdlMostrarClientes()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Mostrar clientes 2, consulta SQL
     *
     * @return array|false
     */
    static public function mdlMostrarClientes2()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM clienetes");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Eliminar clientes, consulta SQL
     *
     * @param $valor
     *
     * @return string|void
     */
    static public function mdlEliminarClientes($valor)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM clientes WHERE id = :idE");

        $stmt->bindParam(':idE', $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return 'ok';
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->close();
        $stmt = null;
    }

    /**
     * Guardar clientes, consulta SQL
     *
     * @param $datos
     *
     * @return string|void
     */
    static public function mdlGuardarClientes($datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO clientes(nombre, apellido1, apellido2, localidad, provincia, cp) 
                  VALUES(:nombre, :ap1, :ap2, :localidad, :provincia, :cp)");

        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':ap1', $datos['ap1'], PDO::PARAM_STR);
        $stmt->bindParam(':ap2', $datos['ap2'], PDO::PARAM_STR);
        $stmt->bindParam(':localidad', $datos['localidad'], PDO::PARAM_STR);
        $stmt->bindParam(':provincia', $datos['provincia'], PDO::PARAM_STR);
        $stmt->bindParam(':cp', $datos['cp'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 'ok';
        } else {
            echo 'error';
        }

        $stmt->close();
        $stmt = null;
    }

    /**
     * Ver clientes, consulta SQL
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function mdlVerClientes($item, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM clientes WHERE $item = :IDE");

        $stmt->bindParam(':IDE', $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * Editar clientes, consulta SQL
     *
     * @param $datos
     *
     * @return string|void
     */
    static public function mdlEditarClientes($datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE clientes SET nombre = :nombre, apellido1 = :ap1, apellido2 = :ap2, 
                 localidad = :localidad, provincia = :provincia, cp = :cp WHERE id = :id");

        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':ap1', $datos['ap1'], PDO::PARAM_STR);
        $stmt->bindParam(':ap2', $datos['ap2'], PDO::PARAM_STR);
        $stmt->bindParam(':localidad', $datos['localidad'], PDO::PARAM_STR);
        $stmt->bindParam(':provincia', $datos['provincia'], PDO::PARAM_STR);
        $stmt->bindParam(':cp', $datos['cp'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 'ok';
        } else {
            echo 'error';
        }

        $stmt->close();
        $stmt = null;
    }
}
