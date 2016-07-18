<?php

require_once "Config/Autoload.php";

Config\Autoload::run();

$estudiante = new Models\Estudiante();

$estudiante->set("id",1);

$datos = $estudiante->view();

echo $datos['nombre'];

?>