<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporte_user
 *
 * @author Jossué
 */
require('../Reportes/PDF_caja.php');
require_once "../../Conexion/Sentencias_sql.php"; 
class reporte_user {
    
   function Header()
{
$titulo='Usuarios';
$this->SetFont('Arial','',10);
$this->Text(65,14,$titulo,0,'C', 0);
$this->Ln(30);
}
 
function Footer()
{
$titulo='Usuarios';
$this->SetY(-15);
$this->SetFont('Arial','B',8);
$this->Cell(100,10,$titulo,0,0,'L');
// Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

// creamos el objeto FPDF
$pdf=new PDF('P','mm','Letter'); // vertical, milimetros y tamaño
//$pdf->Open();
$pdf->AddPage(); // agregamos la pagina
$pdf->SetMargins(20,20,20); // definimos los margenes en este caso estan en milimetros
$pdf->Ln(20); // dejamos un pequeño espacio de 10 milimetros
 
 
// tipo y tamaño de letra
$pdf->SetFont('Arial','',16);
$tamaño=37;
$pdf->SetWidths(array($tamaño,$tamaño,$tamaño,$tamaño,$tamaño));

$pdf->Row(array('Ingresos', 'Egresos', 'Hora','Motivo','Descripcion'));
$pdf->SetFont('Arial','',12);                                      
    $datos = new Sentencias_sql(); 
    $datos->conexion();
    $datos->abrir_bd();
    $operacion = new Class_Caja();
    $caja = $operacion->ultima_caja();
    
        $resultado = $datos->consultar("select * from  detalle_caja WHERE dc_caja =".$caja); 
     if ($resultado)
         while($row = mysqli_fetch_array($resultado))
            { 
            $pdf->Row(array($row['dc_ingreso'],
                            $row['dc_egreso'], 
                            $row['dc_hora'], 
                            $row['dc_motivo'],
                            $row['dc_descripcion']
                            )); 
                
            }
            
    $pdf->Output();
            
            
                              