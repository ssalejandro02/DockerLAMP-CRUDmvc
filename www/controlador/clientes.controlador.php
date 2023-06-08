<?php

class ctrClientes
{
    /**
     * Mostrar clientes, llamada al modelo
     *
     * @return array|false
     */
    static public function ctrMostrarClientes()
    {
        $respuesta = mdlClientes::mdlMostrarClientes();

        return $respuesta;
    }

    /**
     * Mostrar clientes 2, llamada al modelo
     *
     * @return array|false
     */
    static public function ctrMostrarClientes2()
    {
        $respuesta = mdlClientes::mdlMostrarClientes2();

        return $respuesta;
    }

    /**
     * Eliminar clientes, llamada al modelo
     *
     * @param $valor
     *
     * @return string|void
     */
    static public function ctrEliminarClientes($valor)
    {
        $respuesta = mdlClientes::mdlEliminarClientes($valor);

        return $respuesta;
    }

    /**
     * Guardar clientes, llamada al modelo
     *
     * @return void
     */
    static public function ctrGuardarClientes()
    {
        if (isset($_POST['nom_cliente']) || isset($_POST['ap1_cliente']) || isset($_POST['loc_cliiente'])
            || isset($_POST['prov_cliiente'])
            || isset($_POST['cp_cliiente'])) {

            $datos = [
                'nombre'    => $_POST['nom_cliente'],
                'ap1'       => $_POST['ap1_cliente'],
                'ap2'       => $_POST['ap2_cliente'],
                'localidad' => $_POST['loc_cliente'],
                'provincia' => $_POST['prov_cliente'],
                'cp'        => $_POST['cp_cliente'],
            ];

            $respuesta = mdlClientes::mdlGuardarClientes($datos);

            if ($respuesta == 'ok') {

                echo '<script>

						swal({
								type:\'success\',
							  	title: \'¡CORRECTO!\',
							  	text: \'El cliente ha sido guardado correctamente\',
							  	showConfirmButton: true,
								confirmButtonText: \'Cerrar\',
								allowOutsideClick: false,
							  
						}).then(function(result){
								if(result.value){   
								    history.back();
								  } 
						});

					</script>';
            } else {
                echo '<div class=\'alert alert-danger mt-3 small\'>Fallida</div>';
            }
        }
    }

    /**
     * Ver clientes, llamada al modelo
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function ctrVerClientes($item, $valor)
    {
        $respuesta = mdlClientes::mdlVerClientes($item, $valor);

        return $respuesta;
    }

    /**
     * Editar clientes, llamada al modelo
     *
     * @return void
     */
    static public function ctrEditarCliente()
    {
        if (isset($_POST['id_clienteE']) || isset($_POST['nom_clienteE']) || isset($_POST['ap1_clienteE'])
            || isset($_POST['loc_cliienteE'])
            || isset($_POST['prov_cliienteE'])
            || isset($_POST['cp_cliienteE'])) {

            $datos = [
                'id'        => $_POST['id_clienteE'],
                'nombre'    => $_POST['nom_clienteE'],
                'ap1'       => $_POST['ap1_clienteE'],
                'ap2'       => $_POST['ap2_clienteE'],
                'localidad' => $_POST['loc_clienteE'],
                'provincia' => $_POST['prov_clienteE'],
                'cp'        => $_POST['cp_clienteE'],
            ];

            $respuesta = mdlClientes::mdlEditarClientes($datos);

            if ($respuesta == 'ok') {

                echo '<script>

						swal({
								type:\'success\',
							  	title: \'¡CORRECTO!\',
							  	text: \'El cliente ha sido actualizado correctamente\',
							  	showConfirmButton: true,
								confirmButtonText: \'Cerrar\',
								allowOutsideClick: false,
							    
						}).then(function(result){
								if(result.value){   
								    history.back();
								  } 
						});

					</script>';
            } else {
                echo '<div class=\'alert alert-danger mt-3 small\'>Fallida</div>';
            }
        }
    }
}
