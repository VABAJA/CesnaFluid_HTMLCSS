<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Cliente
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombreCliente, $contacto, $telefono, $correo, $razonSocial, $direccion, $telefono2, $correo2)
	{
		$sql="INSERT INTO clientes (nombreCliente, contacto, telefono, correo, razonSocial, direccion, telefono2, correo2, condicion)
		VALUES ('$nombreCliente','$contacto','$telefono','$correo','$razonSocial','$direccion','$telefono2','$correo2', '1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_cli, $nombreCliente, $contacto, $telefono, $correo, $razonSocial, $direccion, $telefono2, $correo2)
	{
		$sql="UPDATE cliente SET nombreCliente='$nombreCliente', contacto='$contacto', telefono='$telefono', correo='$correo', razonSocial='$razonSocial', 'direccion=$direccion', telefono2='$telefono2', correo2='$correo2' WHERE id_cli='$id_cli'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar clientes
	public function desactivar($id_cli)
	{
		$sql="UPDATE clientes SET condicion='0' WHERE id_cli='$id_cli'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar clientes
	public function activar($id_cli)
	{
		$sql="UPDATE clientes SET condicion='1' WHERE id_cli='$id_cli'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_cli)
	{
		$sql="SELECT * FROM clientes WHERE id_cli='$id_cli'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM clientes";
		return ejecutarConsulta($sql);
	}
}

?>