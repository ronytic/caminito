<?php
include_once("db2.php");
class mensajes extends db{
		var $tabla="mensajes";
		function listarmensajes($CodUsuario,$Tipo){
			$this->campos=array("*");
			return $this->getRecords("Usuarios LIKE '%$CodUsuario%' and Tipo=$Tipo and Activo=1","Tipo");
		}
}
?>