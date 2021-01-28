<?php
	namespace App\Helper;

   	class Util{
   		public static $codigos = array(
   			"EXITO" => array(
   				"codigo" => 0,
   				"descripcion" => ""
				 ),
				"ERROR_DE_INSERCION" => array(
					"codigo" => 1,
					"descripcion" => "Error al insertar"
				),
				"ERROR_ELIMINANDO" => array(
					"codigo" => 3,
					"descripcion" => "Error al eliminar"
				),
				"ERROR_DE_SERVIDOR" => array(
					"codigo" => 500,
					"descripcion" => "Error en el servidor"
				),
   			"NO_ENCONTRADO" => array(
   				"codigo" => 404,
   				"descripcion" => "Recurso no encontrado"
   			),
   		);
   }
?>