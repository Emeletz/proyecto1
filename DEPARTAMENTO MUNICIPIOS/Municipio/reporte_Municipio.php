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
require('../Reportes/PDF.php');
require_once "../../Conexion/Sentencias_sql.php"; 
class reporte_municipio {
    
   function Header()
{
$titulo='Municipios';
$this->SetFont('Arial','',10);
$this->Text(65,14,$titulo,0,'C', 0);
$this->Ln(30);
}
 
function Footer()
{
$titulo='Municipios';
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
$pdf->Ln(10); // dejamos un pequeño espacio de 10 milimetros
 
 //header
$titulo='Municipios';
// Logo
$pdf->Image('../../images/logo umg.png',140,15,50);
$pdf->SetFont('Arial','',30);
$pdf->Text(20,30,$titulo,0,'C', 0);
$pdf->Ln(25);  

    
// tipo y tamaño de letra
$pdf->SetFont('Arial','',10);
$pdf->SetWidths(array(10, 35, 35, 26,30,30,20,25,30));

$pdf->Row(array('ID','Nombre' , 'Description','Departamento'));
                                       
    $datos = new Sentencias_sql(); 
    $datos->conexion();
    $datos->abrir_bd();
    $resultado = $datos->consultar("select m.*,d.d_nombre from municipio m join departamento d on (m.m_departamento = d.d_id) order by m.m_nombre"); 
    
     if ($resultado)
         while($row = mysqli_fetch_array($resultado))
            { 
             $pdf->Row(array($row['m_id'],
                             $row['m_nombre'], 
                             $row['m_descripcion'],
                             $row['d_nombre']
                            ));  
                
            }
            
    $pdf->Output();
            
            
                              