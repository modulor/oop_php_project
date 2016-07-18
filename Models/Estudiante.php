<?php
	namespace Models;

	class Estudiante
	{
		private $id;
		private $nombre;
		private $edad;
		private $promedio;
		private $imagen;
		private $fecha;
		private $id_seccion;
		private $con;

		public function __construct()
		{
			$this->con = new Conexion();
		}

		public function listar()
		{
			$sql = 'select e.*, s.nombre as nombre_seccion
				from estudiantes e
				inner join secciones s 
				on s.id = e.id_seccion
			';

			$datos = $this->con->consultaRetorno($sql);

			return $datos;
		}

		public function add()
		{
			$sql = "insert into estudiantes (id, nombre, edad, promedio,imagen, fecha, id_seccion)
				values (".null.", '{$this->nombre}', '{$this->edad}', '{$this->promedio}', ".NOW().", '{$this->fecha}', '{$this->id_seccion}')
			";

			$this->con->consultaSimple($sql);
		}

		public function delete()
		{
			$sql = "delete from estudiantes where id = '{$this->id}'";
			$this->con->consultaSimple($sql);
		}

		public function edit()
		{
			$sql = "update from estudiantes set 
				nombre = '{$this->nombre}',
				edad = '{$this->edad}',
				promedio = '{$this->promedio}',
				id_seccion = '{$this->id_seccion}'
			";

			$this->con->consultaSimple($sql);
		}

		public function view()
		{
			$sql = "select e.*, s.nombre as nombre_seccion
				from estudiantes e
				inner join secciones s
				on s.id = e.id_seccion 
				where e.id = '{$this->id}'
			";

			$datos = $this->con->consultaRetorno($sql);

			return $datos;
		}
	}