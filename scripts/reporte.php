<?php
require 'conexion.php';
require 'vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;

$sql = "SELECT nombreCliente, clienteId, contacto, telefono, correo, id_cliente, id_dispositivos, id_vehiculos, id_tickets, id_contenedores, id_usuarios FROM clientes";

$resultado_reporte = $mysqli->($sql);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Clientes");


$hojaActiva->SetCellValue('A1', 'CLIENTE');
$hojaActiva->SetCellValue('B1', 'NO. DE CLIENTE');
$hojaActiva->SetCellValue('C1', 'CONTACTO');
$hojaActiva->SetCellValue('D1', 'TELÉFONO');
$hojaActiva->SetCellValue('E1', 'CORREO');
$hojaActiva->SetCellValue('F1', 'DISPOSITIVOS');
$hojaActiva->SetCellValue('G1', 'VEHÍCULOS');
$hojaActiva->SetCellValue('H1', 'TICKETS');
$hojaActiva->SetCellValue('I1', 'CONTENEDORES');
$hojaActiva->SetCellValue('J1', 'USUARIOS');

$fila = 2;

while($rows = $resultado_reporte->fetch_assoc()){
    $hojaActiva->SetCellValue('A'.$fila, $rows['nombreCliente']);
    $hojaActiva->SetCellValue('B'.$fila, $rows['clienteId']);
    $hojaActiva->SetCellValue('C'.$fila, $rows['contacto']);
    $hojaActiva->SetCellValue('D'.$fila, $rows['telefono']);
    $hojaActiva->SetCellValue('E'.$fila, $rows['correo']);
    $hojaActiva->SetCellValue('G'.$fila, $rows['id_dispositivos']);
    $hojaActiva->SetCellValue('H'.$fila, $rows['id_tickets']);
    $hojaActiva->SetCellValue('I'.$fila, $rows['id_contenedores']);
    $hojaActiva->SetCellValue('J'.$fila, $rows['id_usuarios']);

    $fila++;

}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="clientes.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>