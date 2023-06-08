<?php

require_once '../controlador/usuarios.controlador.php';
require_once '../modelo/usuarios.modelo.php';

class AjaxUsuarios
{
    /**
     * Editar usuario, llamada al controlador
     *
     * @return void
     */
    public function ajaxEditarUsuarios()
    {
        $item = 'id';
        $valor = $this->idUsuario;

        $respuesta = ctrUsuarios::ctrMostrarUsuarios1($item, $valor);

        echo json_encode($respuesta);
    }

    /**
     * Eliminar usuario, llamada al controlador
     *
     * @return void
     */
    public function ajaxEliminarUsuarios()
    {
        $respuesta = ctrUsuarios::ctrEliminarUsuarios($this->idEliminar, $this->rutaFoto);

        echo $respuesta;
    }
}

/*
 * Editar usuario
 */
if (isset($_POST['idUsuario'])) {

    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST['idUsuario'];
    $editar->ajaxEditarUsuarios();
}

/*
 * Eliminar usuario
 */
if (isset($_POST['idUsuarioE'])) {

    $eliminar = new AjaxUsuarios();
    $eliminar->idEliminar = $_POST['idUsuarioE'];
    $eliminar->rutaFoto = $_POST['rutaFoto'];
    $eliminar->ajaxEliminarUsuarios();
}
