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
class reporte_user {
    
   function Header()
{
$titulo='Producto';
$this->SetFont('Arial','',10);
$this->Text(65,14,$titulo,0,'C', 0);
$this->Ln(30);
}
 
function Footer()
{
$titulo='Producto';
$this->SetY(-15);
$this->SetFont('Arial','B',8);
$this->Cell(100,10,$titulo,0,0,'L');
// Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

// creamos el objeto FPDF
$pdf=new PDF('L','mm','Letter'); // vertical, milimetros y tamaño
//$pdf->Open();
$pdf->AddPage(); // agregamos la pagina
$pdf->SetMargins(20,20,20); // definimos los margenes en este caso estan en milimetros
$pdf->Ln(10); // dejamos un pequeño espacio de 10 milimetros
 
 //header
$titulo='Producto';
// Logo
$pdf->Image('../../images/logo umg.png',225,8,33);
$pdf->SetFont('Arial','',30);
$pdf->Text(20,30,$titulo,0,'C', 0);
$pdf->Ln(25);  

    
// tipo y tamaño de letra
$pdf->SetFont('Arial','',10);
$pdf->SetWidths(array(7, 20, 20, 20,20,20,20,20,20,20,20,25,20));

$pdf->Row(array('Id', 'Ubicacion', 'Proveedor', 'Categoria','Cantidad'
    ,'Precio Costo','Precio Base Venta','Fecha Compra','Precio Venta','Comprobante','Nombre','Descripcion','Cantidad Minima'));
 $datos = new Sentencias_sql(); 
    $datos->conexion();
    $datos->abrir_bd();
    $resultado = $datos->consultar("select p.*, c.ct_nombre, pv.pv_nombre, h.h_nombre,
(p.p_cantidad * p.p_precio_costo) as inversion, (p.p_precio_base_venta - p.p_precio_costo) as ganancia1,
(p.p_precio_venta - p.p_precio_costo)as ganancia2, ((p.p_precio_base_venta * p.p_cantidad)-(p.p_cantidad * p.p_precio_costo)) as gtotal1,
((p.p_precio_venta * p.p_cantidad)-(p.p_cantidad * p.p_precio_costo)) as gtotal2
from  producto p
join categoria c on (p.p_categoria = c.ct_id)
join proveedor pv on (p.p_proveedor= pv.pv_id)
join ubicacion h on (p.p_hubicacion = h.h_id)
order by p.p_nombre"); 
    
     if ($resultado)
         while($row = mysqli_fetch_array($resultado))
            { 
             $pdf->Row(array($row['p_id'],
                            $row['h_nombre'], 
                            $row['pv_nombre'], 
                            $row['ct_nombre'],
                            $row['p_cantidad'],
                            $row['p_precio_costo'],
                            $row['p_precio_base_venta'],
                            $row['p_fecha_comra'],
                            $row['p_precio_venta'],
                            $row['p_combrobante'],
                            $row['p_nombre'],
                            $row['p_descripcion'],
                            $row['p_cantidad_minima']
                            ));  
                
            }

                                          
    $pdf->Output();
            
            
                              