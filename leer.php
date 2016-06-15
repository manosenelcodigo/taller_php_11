<?php
require_once('PHPExcel.php');
require_once('PHPExcel/Reader/Excel2007.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utyf-8" />
        <title>Mi página</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    </head>
    <body>
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Leer</li>
    </ol>
       <h1>Reporte en Excel</h1>
       
       <?php
    
         $objReader = new PHPExcel_Reader_Excel2007();
         $objPHPExcel = $objReader->load("usuarios.xlsx");
         $objFecha = new PHPExcel_Shared_Date();       
                                
         // Asignar hoja de excel activa
         $objPHPExcel->setActiveSheetIndex(0);
         $filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
         ?>
         <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>E-Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     for ($i=1;$i<=$filas;$i++)
                     {
                        ?>
                        <tr>
                            <td><?php echo $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()?></td>
                            <td><?php echo $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue()?></td>
                            <td><?php echo $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue()?></td>
                        </tr>
                        <?php
                     }
                      ?>
            </tbody>
         </table>
         
       
    </body>
</html>
