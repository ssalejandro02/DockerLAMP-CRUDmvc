<?php

class ctrRoles
{
    /**
     * Eliminar roles, llamada al modelo
     *
     * @param $valor
     *
     * @return string|void
     */
    static public function ctrEliminarRoles($valor)
    {
        $respuesta = mdlRoles::mdlEliminarRoles($valor);

        return $respuesta;
    }

    /**
     * Mostrar roles, llamada al modelo
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function ctrMostrarRoles($item, $valor)
    {
        $respuesta = mdlRoles::mdlMostrarRoles($item, $valor);

        return $respuesta;
    }

    /**
     * Mostrar roles 2, llamada al modelo
     *
     * @return array|false
     */
    static public function ctrMostrarRoles2()
    {
        $respuesta = mdlRoles::mdlMostrarRoles2();

        return $respuesta;
    }

    /**
     * Guardar rol, llamada al modelo
     *
     * @return void
     */
    static public function ctrGuardarRol()
    {
        if (isset($_POST['nom_rol'])) {

            $nomRol = $_POST['nom_rol'];

            $respuesta = mdlRoles::mdlGuardarRoles($nomRol);

            if ($respuesta == 'ok') {

                echo '<script>

						swal({
								type:\'success\',
							  	title: \'¡CORRECTO!\',
							  	text: \'El rol ha sido guardado correctamente\',
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
     * Ver rol, llamada al modelo
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function ctrVerRoles($item, $valor)
    {
        $respuesta = mdlRoles::mdlVerRoles($item, $valor);

        return $respuesta;
    }

    /**
     * Editar rol, llamada al modelo
     *
     * @return void
     */
    static public function ctrEditarRol()
    {
        if (isset($_POST['nom_rolE'])) {

            $nomRolE = $_POST['nom_rolE'];
            $idrol = $_POST['id_rolE'];

            $respuesta = mdlRoles::mdlEditarRoles($nomRolE, $idrol);

            if ($respuesta == 'ok') {

                echo '<script>

						swal({
								type:\'success\',
							  	title: \'¡CORRECTO!\',
							  	text: \'El rol ha sido actualizado correctamente\',
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
