<?php

include 'controlador/plantilla.controlador.php';
include 'controlador/usuarios.controlador.php';
include 'controlador/roles.controlador.php';
include 'controlador/clientes.controlador.php';

include 'modelo/usuarios.modelo.php';
include 'modelo/roles.modelo.php';
include 'modelo/clientes.modelo.php';

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
