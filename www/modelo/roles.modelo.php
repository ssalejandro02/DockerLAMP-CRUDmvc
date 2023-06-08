<?php

require_once 'conexion.php';

class mdlRoles
{
    /**
     * Eliminar roles, consulta SQL
     *
     * @param $valor
     *
     * @return string|void
     */
    static public function mdlEliminarRoles($valor)
    {
        $stmt = Conexion::conectar()->prepare('DELETE FROM roles WHERE id_roles = :idE');

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
     * Mostrar roles, consulta SQL
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function mdlMostrarRoles($item, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM roles WHERE $item = :$item");

        $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * Mostrar roles 2, consulta SQL
     *
     * @return array|false
     */
    static public function mdlMostrarRoles2()
    {
        $stmt = Conexion::conectar()->prepare('SELECT * FROM roles');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Guardar roles, consulta SQL
     *
     * @param $nomRol
     *
     * @return string|void
     */
    static public function mdlGuardarRoles($nomRol)
    {
        $stmt = Conexion::conectar()->prepare('INSERT INTO roles(nom_rol) VALUES(:NOMBRE_ROL)');

        $stmt->bindParam(':NOMBRE_ROL', $nomRol, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 'ok';
        } else {
            echo 'error';
        }

        $stmt->close();
        $stmt = null;
    }

    /**
     * Ver roles, consulta SQL
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function mdlVerRoles($item, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM roles WHERE $item = :IDE");

        $stmt->bindParam(':IDE', $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * Editar roles, consulta SQL
     *
     * @param $nomRol
     * @param $idrol
     *
     * @return string|void
     */
    static public function mdlEditarRoles($nomRol, $idrol)
    {
        $stmt = Conexion::conectar()->prepare('UPDATE roles SET nom_rol = :rol_nom WHERE id_roles = :id');

        $stmt->bindParam(':id', $idrol, PDO::PARAM_STR);
        $stmt->bindParam(':rol_nom', $nomRol, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 'ok';
        } else {
            echo 'error';
        }

        $stmt->close();
        $stmt = null;
    }
}
