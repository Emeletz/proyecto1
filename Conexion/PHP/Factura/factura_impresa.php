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
require('../Reportes/PDF_factura.php');
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
$pdf->Ln(60); // dejamos un pequeño espacio de 10 milimetros
 
 
// tipo y tamaño de letra
$pdf->SetFont('Arial','',16);
$tamaño=37;
$pdf->SetWidths(array($tamaño,$tamaño,$tamaño,$tamaño,$tamaño));

$pdf->Row(array('Nombre', 'Descripcion', 'Cantidad','Precio','Total'));
$pdf->SetFont('Arial','',12);                                      
    $datos = new Sentencias_sql(); 
    $datos->conexion();
    $datos->abrir_bd();
    $operacion = new Class_Factura();
    $factura = $operacion->ultima_factura();
    
        $resultado = $datos->consultar("select df.*, p.p_nombre, p.p_descripcion, c.c_nombre,c.c_apellido,c.c_nit,f.f_id, c.c_direccion, m.m_nombre, d.d_nombre
,(df.df_cantidad * df.df_monto) as total
from detalle_factura df
join factura f on (df.df_factura = f.f_id)
join producto p on (p.p_id = df.df_producto)
join cliente c on (f.f_cliente = c.c_id)
join municipio m on (m.m_id = c.c_municipio)
join departamento d on (d.d_id= m.m_departamento)
                    where f.f_id =".$factura); 
     if ($resultado)
         while($row = mysqli_fetch_array($resultado))
            { 
            $pdf->Row(array($row['p_nombre'],
                            $row['p_descripcion'], 
                            $row['df_cantidad'], 
                            $row['df_monto'],
                            $row['total']
                            )); 
                
            }
            
    $pdf->Output();
            
            
                              