<?php
require('../fpdf/fpdf.php');
require_once "../../Conexion/Sentencias_sql.php";
require_once "../Factura/Class_Factura.php";
class PDF extends FPDF
{
var $widths;
var $aligns;
function Header()
{
$titulo='INTERCEL';
$this->Image('../../images/logo umg.png',175,8,33);
$this->SetFont('Arial','',20);
$this->Text(95,15,$titulo,0,'C', 0);
$this->Text(20,35,"Factura",0,'C', 0);
$this->Text(20,45,"Direccino            7762 0539        NIT",0,'C', 0);
$this->SetFont('Arial','',16);
$this->Text(20,55,"Resolucion",0,'C', 0);
$this->Ln(30);

        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        $operacion = new Class_Factura();
        $factura = $operacion->ultima_factura();
        
        $total=$operacion->total_factura($factura);
        $no_factura= "Factura No. ".$operacion->ultima_factura();
                        $articulos= $operacion->articulos_factura($factura);
                        $total="Total en factura: Q".$total;
                        $articulos="No. de articulos: ".$articulos;
                        $this->Text(20,95,$articulos,0,'C', 0);
                        $this->Text(90,95,$total,0,'C', 0);
                        $this->Text(168,95,$no_factura,0,'C', 0);
                        //datos del cliente
        $factura = $operacion->ultima_factura();
        $datos->abrir_bd();
        $resultado = $datos->consultar("select c.c_nombre,c.c_apellido,c.c_nit,f.f_id, c.c_direccion, m.m_nombre, d.d_nombre
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
                    $cadena="Cliente: ".$row['c_nombre']." ".$row['c_apellido']." NIT: ".$row['c_nit'];
                    $cadena_1 ="Direccion: ".$row['c_direccion'].", ".$row['m_nombre'].", ".$row['d_nombre'];
                   $this->Text(20,65,$cadena,0,'C', 0);
                    //echo "Cliente: ".$row['c_nombre']." ".$row['c_apellido']." NIT: ".$row['c_nit'];
                    
                    $this->Text(20,75,$cadena_1,0,'C', 0);
                    //echo "Direccion: ".$row['c_direccion'].", ".$row['m_nombre'].", ".$row['d_nombre'];
                    break;
         }
}
 
function Footer()
{
$titulo='INTERCEL';
$this->SetY(-15);
$this->SetFont('Arial','B',8);
$this->Cell(100,10,$titulo,0,0,'L');
// Número de página
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

   
function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}