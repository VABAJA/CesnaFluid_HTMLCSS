<?php 
require_once "../models/Cliente.php";

$cliente=new Cliente();

$id_cli=isset($_POST["id_cli"])? limpiarCadena($_POST["id_cli"]):"";
$nombreCliente=isset($_POST["nombrecliente"])? limpiarCadena($_POST["nombrecliente"]):"";
$contacto=isset($_POST["contacto"])? limpiarCadena($_POST["contacto"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";
$razonSocial=isset($_POST["razonSocial"])? limpiarCadena($_POST["razonSocial"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono2=isset($_POST["telefono2"])? limpiarCadena($_POST["telefono2"]):"";
$correo2=isset($_POST["correo2"])? limpiarCadena($_POST["correo2"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id_cli)){
			$rspta=$clientes->insertar($nombreCliente,$contacto, $telefono, $correo, $razonSocial, $direccion, $telefono2, $correo2);
			echo $rspta ? "Cliente registrado con éxito" : "El cliente no se pudo registrar";
		}
		else {
			$rspta=$clientes->editar($id_cli,$nombreCliente,$contacto, $telefono, $correo, $razonSocial, $direccion, $telefono2, $correo2);
			echo $rspta ? "Cliente actualizado con éxito" : "El cliente no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$clientes->desactivar($id_cli);
 		echo $rspta ? "Cliente desactivado con éxito" : "El cliente no se pudo desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$categoria->activar($id_cli);
 		echo $rspta ? "Cliente activado con éxito" : "El cliente no se pudo activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$clientes->mostrar($id_cli);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$clientes->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_cli.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->id_cli.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->id_cli.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->id_cli.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombreCliente,
 				"2"=>$reg->contacto,
 				"3"=>$reg->telefono,
 				"4"=>$reg->correo,
 				"5"=>$reg->razonSocial,
 				"6"=>$reg->direccion,
 				"7"=>$reg->telefono2,
 				"8"=>$reg->correo2,
 				"9"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>