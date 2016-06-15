<?php
require_once("PHPExcel.php");
$excel=new PHPExcel();
$excel->getProperties()
                ->setTitle("Excel")
                ->setDescription("Descripción");
$sheet=$excel->getActiveSheet();
$sheet->setTitle("Reporte");
$sheet->getColumnDimension('A')->setWidth(20);
$sheet->setCellValue("A1",'ID');
$sheet->setCellValue("B1",'Nombre');
$sheet->setCellValue("C1",'E-Mail');
$sheet->setCellValue("D1",'Teléfono');
for($i=2;$i<10;$i++)
{
    $sheet->setCellValue("A".$i,$i);
    $sheet->setCellValue("B".$i,'Ñandú_'.$i);
    $sheet->setCellValue("C".$i,'E-Mail_'.$i);
    $sheet->setCellValue("D".$i,'Teléfono_'.$i);
}
header("Content-Type: application/vnd.ms-excel");
$nombre="Reporte ".date("Y-m-d H:i:s");
header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
header("Cache-Control: max-age=0");
$writer=PHPExcel_IOFactory::createWriter($excel,"Excel5");
$writer->save("php://output");	