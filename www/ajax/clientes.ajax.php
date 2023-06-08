<?php

require_once '../controlador/clientes.controlador.php';
require_once '../modelo/clientes.modelo.php';

class ajaxClientes
{
    /**
     * Editar cliente, llamada al controlado
     *
     * @return void
     */
    public function ajaxEditarClientes()
    {
        $item = 'id';
        $valor = $this->idClientes;

        $respuesta = ctrClientes::ctrVerClientes($item, $valor);

        echo json_encode($respuesta);
    }

    /**
     * Eliminar cliente, llamada al controlador
     *
     * @return void
     */
    public function ajaxEliminarClientes()
    {
        $valor = $this->idClientesE;

        $respuesta = ctrClientes::ctrEliminarClientes($valor);

        echo $respuesta;
    }
}

/*
 * Editar cliente
 */
if (isset($_POST['idCliente'])) {
    $editar = new ajaxClientes();
    $editar->idClientes = $_POST['idCliente'];
    $editar->ajaxEditarClientes();
}

/*
 * Eliminar cliente
 */
if (isset($_POST['idClienteE'])) {
    $eliminar = new ajaxClientes();
    $eliminar->idClientesE = $_POST['idClienteE'];
    $eliminar->ajaxEliminarClientes();
}
