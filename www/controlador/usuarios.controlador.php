<?php

class ctrUsuarios
{
    /**
     * Ingreso usuarios, llamada al modelo
     *
     * @return void
     */
    static public function ctrIngresoUsuarios()
    {
        if (isset($_POST['log_user'])) {

            $encriptarPass = crypt($_POST['log_pass'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $item = 'usuario';
            $valor = $_POST['log_user'];

            $respuesta = mdlUsuarios::mdlMostrarUsuariosl($item, $valor);

            if (is_array($respuesta)) {
                if ($respuesta['usuario'] == $_POST['log_user'] && $respuesta['password'] == $encriptarPass) {

                    $_SESSION['validarSession'] = 'ok';
                    $_SESSION['idBackend'] = $respuesta['id'];

                    echo '<script>window.location = "usuarios";</script>';
                } else {
                    echo '<div class=\'alert alert-danger mt-3 small\'>ERROR: Usuario y/o contraseña incorrectos</div>';
                }
            } else {
                echo '<div class=\'alert alert-danger mt-3 small\'>ERROR: Usuario y/o contraseña incorrectos</div>';
            }
        }
    }

    /**
     * Eliminar usuarios, llamada al modelo
     *
     * @param $id
     * @param $rutafoto
     *
     * @return string|void
     */
    static public function ctrEliminarUsuarios($id, $rutafoto)
    {
        unlink('../' . $rutafoto);

        $respuesta = mdlUsuarios::mdlEliminarUsuarios($id);

        return $respuesta;
    }

    /**
     * Mostar usuarios 1, llamada al modelo
     *
     * @param $item
     * @param $valor
     *
     * @return mixed
     */
    static public function ctrMostrarUsuarios1($item, $valor)
    {
        $respuesta = mdlUsuarios::MdlMostrarUsuarios1($item, $valor);

        return $respuesta;
    }

    /**
     * Mostar usuarios, llamada al modelo
     *
     * @return array|false
     */
    static public function ctrMostrarUsuarios()
    {


        $respuesta = mdlUsuarios::mdlMostrarUsuarios();

        return $respuesta;
    }

    /**
     * Editar usuarios, llamada al modelo
     *
     * @return void
     */
    static public function ctrEditarusuarios()
    {
        if (isset($_POST['idPerfilE'])) {

            if (isset($_FILES['subirImgusuariosE']['tmp_name']) && !empty($_FILES['subirImgusuariosE']['tmp_name'])) {

                list($ancho, $alto) = getimagesize($_FILES['subirImgusuariosE']['tmp_name']);

                $nuevoAncho = 480;
                $nuevoAlto = 382;

                // Creo el directorio donde se guardará la foto

                $directorio = 'vistas/imagenes/usuarios';

                // Compruebo si existe otra imagen en la bd

                if (isset($_POST['fotoActualE'])) {

                    unlink($_POST['fotoActualE']);
                }

                // De acuero al tipo, aplico las funciones por defecto de php

                if ($_FILES['subirImgusuariosE']['type'] == 'image/jpeg') {

                    $aleatorio = mt_rand(100, 999);

                    $nomFoto = explode('.', $_FILES['subirImgusuariosE']['name']);

                    $rutas = $directorio . '/' . $nomFoto[0] . $aleatorio . '.jpg';

                    $origen = imagecreatefromjpeg($_FILES['subirImgusuariosE']['tmp_name']);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutas);
                } else {
                    if ($_FILES['subirImgusuariosE']['type'] == 'image/png') {

                        $aleatorio = mt_rand(100, 999);

                        $nomFoto = explode('.', $_FILES['subirImgusuariosE']['name']);

                        $rutas = $directorio . '/' . $nomFoto[0] . $aleatorio . '.png';

                        $origen = imagecreatefrompng($_FILES['subirImgusuariosE']['tmp_name']);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, false);

                        imagesavealpha($destino, true);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $rutas);
                    } else {

                        echo '<script>

                                swal({
                                        type:\'error\',
                                        title: \'¡CORREGIR!\',
                                        text: \'¡No se permiten formatos diferentes a JPG y/o PNG!\',
                                        showConfirmButton: true,
                                        confirmButtonText: \'Cerrar\',
                                        allowOutsideClick: false,
                                      
                                }).then(function(result){
                                        if(result.value){   
                                            history.back();
                                          } 
                                });
        
                            </script>';

                        return;
                    }
                }
            }

            if ($rutas != '') {
                $r = $rutas;
            } else {
                $r = $_POST['fotoActualE'];
            }

            if ($_POST['pass_userE'] !== $_POST['pass_userActualE']) {
                $password = crypt($_POST['pass_userE'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            } else {
                $password = $_POST['pass_userActualE'];
            }

            $datos = [
                'idE'          => $_POST['idPerfilE'],
                'nom_usuarioE' => $_POST['nom_usuariosE'],
                'nom_userE'    => $_POST['nom_userE'],
                'passE'        => $password,
                'rol_userE'    => $_POST['rol_userE'],
                'img'          => $r,
            ];

            $respuesta = mdlUsuarios::mdlEditarUsuarios($datos);

            if ($respuesta == 'ok') {

                echo '<script>

						swal({
								type:\'success\',
							  	title: \'¡CORRECTO!\',
							  	text: \'El usuario ha sido editado correctamente\',
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
     * Guardar usuarios, llamada al modelo
     *
     * @return void
     */
    static public function ctrGuardarusuarios()
    {
        if (isset($_POST['nom_usuarios'])) {

            if (isset($_FILES['subirImgusuarios']['tmp_name']) && !empty($_FILES['subirImgusuarios']['tmp_name'])) {

                list($ancho, $alto) = getimagesize($_FILES['subirImgusuarios']['tmp_name']);

                $nuevoAncho = 480;
                $nuevoAlto = 382;

                // Creo el directorio donde se guardará la foto del usuario

                $directorio = 'vistas/imagenes/usuarios';

                // De acuero al tipo, aplico las funciones por defecto de php

                if ($_FILES['subirImgusuarios']['type'] == 'image/jpeg') {

                    $aleatorio = mt_rand(100, 999);

                    $nomFoto = explode('.', $_FILES['subirImgusuarios']['name']);

                    $ruta = $directorio . '/' . $nomFoto[0] . $aleatorio . '.jpg';

                    $origen = imagecreatefromjpeg($_FILES['subirImgusuarios']['tmp_name']);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                } else {
                    if ($_FILES['subirImgusuarios']['type'] == 'image/png') {

                        $aleatorio = mt_rand(100, 999);

                        $nomFoto = explode('.', $_FILES['subirImgusuarios']['name']);

                        $ruta = $directorio . '/' . $nomFoto[0] . $aleatorio . '.png';

                        $origen = imagecreatefrompng($_FILES['subirImgusuarios']['tmp_name']);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, false);

                        imagesavealpha($destino, true);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    } else {

                        echo '<script>

                                swal({
                                        type:\'error\',
                                        title: \'¡CORREGIR!\',
                                        text: \'¡No se permiten formatos diferentes a JPG y/o PNG!\',
                                        showConfirmButton: true,
                                        confirmButtonText: \'Cerrar\',
                                        allowOutsideClick: false,
                                      
                                }).then(function(result){
                                        if(result.value){   
                                            history.back();
                                          } 
                                });
        
                            </script>';

                        return;
                    }
                }
            }

            if ($ruta != '') {
                $r = $ruta;
            } else {
                $r = 'vistas/imagenes/usuarios/default/anonymous.png';
            }

            if ($_POST['pass_user'] !== $_POST['pass_userConfirm']) {
                echo '<script>

						swal({
								type:\'error\',
							  	title: \'¡CORREGIR!\',
							  	text: \'¡Las contraseñas no coinciden!\',
							  	showConfirmButton: true,
								confirmButtonText: \'Cerrar\',
								allowOutsideClick: false,
							  
						}).then(function(result){
								if(result.value){   
								    history.back();
								  } 
						});

					</script>';

                return;
            } else {
                $password = crypt($_POST['pass_user'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            }

            $datos = [
                'nom_usuario' => $_POST['nom_usuarios'],
                'nom_user'    => $_POST['nom_user'],
                'pass'        => $password,
                'rol_user'    => $_POST['rol_user'],
                'img'         => $r,
            ];

            $respuesta = mdlUsuarios::mdlGuardarUsuarios($datos);

            if ($respuesta == 'ok') {

                echo '<script>

						swal({
								type:\'success\',
							  	title: \'¡CORRECTO!\',
							  	text: \'El usuario ha sido guardado correctamente\',
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