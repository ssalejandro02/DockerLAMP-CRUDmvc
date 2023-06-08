<?php

require_once '../controlador/roles.controlador.php';
require_once '../modelo/roles.modelo.php';

class ajaxRoles
{
    /**
     * Editar rol, llamada al controlador
     *
     * @return void
     */
    public function ajaxEditarRoles()
    {
        $item = 'id_roles';
        $valor = $this->idRoles;

        $respuesta = ctrRoles::ctrVerRoles($item, $valor);

        echo json_encode($respuesta);
    }

    /**
     * Eliminar rol, llamada al controlador
     *
     * @return void
     */
    public function ajaxEliminarRoles()
    {
        $valor = $this->idRolesE;

        $respuesta = ctrRoles::ctrEliminarRoles($valor);

        echo $respuesta;
    }
}

/*
 * Editar rol
 */
if (isset($_POST['idRoles'])) {
    $editar = new ajaxRoles();
    $editar->idRoles = $_POST['idRoles'];
    $editar->ajaxEditarRoles();
}

/*
 * Eliminar rol
 */
if (isset($_POST['idRolE'])) {
    $eliminar = new ajaxRoles();
    $eliminar->idRolesE = $_POST['idRolE'];
    $eliminar->ajaxEliminarRoles();
}
