<?php

require_once 'conexion.php';

class mdlUsuarios
{
    /**
     * Mostrar usuarios, consulta SQL
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function mdlMostrarUsuariosl($item, $valor)
    {
        $stmt = Conexion::conectar()->prepare('SELECT * FROM usuarios WHERE ' . $item . ' = :' . $item);

        $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;
    }

    /**
     * Eliminar usuarios, consulta SQL
     *
     * @param $id
     *
     * @return string|void
     */
    static public function mdlEliminarUsuarios($id)
    {
        $stmt = Conexion::conectar()->prepare('DELETE FROM usuarios WHERE id = :id');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $result = 'ok';
        } else {
            $result = 'error';
        }

        $stmt->close();
        $stmt = null;

        return $result;
    }

    /**
     * Editar usuarios, consulta SQL
     *
     * @param $datos
     *
     * @return string|void
     */
    static public function mdlEditarUsuarios($datos)
    {
        $stmt = Conexion::conectar()->prepare('UPDATE usuarios SET usuario=:NOMUSER_E , password=:PASSSER_E , 
                    nombre=:NOM_E , foto=:IMG_E , rol=:ROL_E WHERE id=:IDE');

        $stmt->bindParam(':IDE', $datos['idE'], PDO::PARAM_INT);
        $stmt->bindParam(':NOM_E', $datos['nom_usuarioE'], PDO::PARAM_STR);
        $stmt->bindParam(':NOMUSER_E', $datos['nom_userE'], PDO::PARAM_STR);
        $stmt->bindParam(':PASSSER_E', $datos['passE'], PDO::PARAM_STR);
        $stmt->bindParam(':ROL_E', $datos['rol_userE'], PDO::PARAM_STR);
        $stmt->bindParam(':IMG_E', $datos['img'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = 'ok';
        } else {
            $result = 'error';
        }

        $stmt->close();
        $stmt = null;

        return $result;
    }

    /**
     * Mostrar usuarios 1, consulta SQL
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function MdlMostrarUsuarios1($item, $valor)
    {
        $stmt = Conexion::conectar()->prepare('SELECT * FROM usuarios WHERE ' . $item . ' = :' . $item);

        $stmt->bindParam(':' . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;
    }

    /**
     * Mostrar usuarios, consulta SQL
     *
     * @return array|false
     */
    static public function mdlMostrarUsuarios()
    {
        $stmt = Conexion::conectar()->prepare('SELECT * FROM usuarios');

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }

    /**
     * Guardar usuarios, consulta SQL
     *
     * @param $datos
     *
     * @return string|void
     */
    static public function mdlguardarUsuarios($datos)
    {
        $stmt = Conexion::conectar()->prepare('INSERT INTO usuarios(usuario, password ,nombre ,foto ,rol) VALUES 
                                                                  (:USUARIO_u, :PASS_u, :NOMBRE_u, :FOTO_u, :ROL_u)');

        $stmt->bindParam(':NOMBRE_u', $datos['nom_usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':USUARIO_u', $datos['nom_user'], PDO::PARAM_STR);
        $stmt->bindParam(':PASS_u', $datos['pass'], PDO::PARAM_STR);
        $stmt->bindParam(':ROL_u', $datos['rol_user'], PDO::PARAM_INT);
        $stmt->bindParam(':FOTO_u', $datos['img'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = 'ok';
        } else {
            $result = 'error';
        }

        $stmt->close();
        $stmt = null;

        return $result;
    }
}
