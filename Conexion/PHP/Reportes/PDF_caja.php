<?php
require('../fpdf/fpdf.php');
require_once "../../Conexion/Sentencias_sql.php";
require_once "../Caja/Class_Caja.php";
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
$this->Ln(30);

        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        $operacion = new Class_Caja();
        $caja = $operacion->ultima_caja();
        
        $resultado = $datos->consultar("select *from caja where cj_id=".$caja);
        if ($resultado)
            while($row = mysqli_fetch_array($resultado))
                {            
                    $fapertura= "Fecha de Apertura: ".$row['cj_fecha_apertura'];
                    $hapertura= "Hora de Apertura: ".$row['cj_hora_apertura'];
                    $this->Text(20,25,$fapertura,0,'C', 0);
                    $this->Text(20,35,$hapertura,0,'C', 0);
                    break;
                }
        
        
        $datos->abrir_bd();
       $resultado = $datos->consultar("select sum(dc_ingreso) as ingreso, sum(dc_egreso) as egreso, (sum(dc_ingreso) - sum(dc_egreso)) as total from  detalle_caja");
   
          if ($resultado)
         while($row = mysqli_fetch_array($resultado))
            { 
                    $ingresos="Ingresos: Q.".$row['ingreso'];
                    $egresos ="Egresos: Q.".$row['egreso'];
                    $total ="Total: Q.".$row['total'];
                    
                    $this->Text(20,45,$ingresos,0,'C', 0);
                    $this->Text(90,45,$egresos,0,'C', 0);
                    $this->Text(160,45,$total,0,'C', 0);
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