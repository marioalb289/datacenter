<?php
// require_once __DIR__ . '/../../../vendor/autoload.php';
require('rotation.php');

class PDF extends PDF_Rotate
{
	var $titulo = '';
	var $titulo2 = '';
	var $filtros = '';
	var $array_width = array();
	var $header_table = array();

	var $widths;
	var $aligns;

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
	//Escribir fila con alto automatico
	function Row($data,$fill = false,$htemp = 0)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb+$htemp;
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

			// print_r($x);
			// print_r("<br>");			
			// print_r($y);
			// exit;
			//Draw the border
			$this->Rect($x,$y,$w,$h,($fill) ? 'DF': 'D');
			//Print the text
			$this->MultiCell($w,5+$htemp,$data[$i],0,$a,false);
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



	function Header()
	{
		// Logo
		// print_r(__DIR__);exit;
		$this->Image(__DIR__.'/iepc.png',10,8,40);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Movernos a la derecha
		// $this->Cell(80);
		// Título
		$this->Cell(0,10,$this->titulo,0,0,'C');
		// Salto de línea
		$this->Ln();
		// Título 2
		$this->Cell(0,10,$this->titulo2,0,0,'C');
		// Salto de línea
		$this->Ln();
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,$this->filtros,0,0,'R');

		// Salto de línea
		$this->Ln();

		// Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.1);
		$this->SetFont('Arial','B',10);
		

		$this->SetWidths($this->array_width);


		//Array de aliniacion para columnas
		$this->aligns= array('C','C','C','C','C','C');
		//Encabezados Tabla
		//param 1, fila de datos
		//param 2, color relleno de fila
		//param 3, alto de la fila
		$this->Row(array($this->header_table[0],$this->header_table[1],$this->header_table[2],$this->header_table[3],$this->header_table[4],$this->header_table[5]),true,0);
		$this->aligns = array();
		//$this->SetY(20);
		// Salto de línea
		//$this->Ln(20);

		//Marca de Agua
		$this->RotatedText(-30,100,__DIR__.'/logo.png',0);
	}

	function RotatedText($x, $y, $img, $angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		// $this->Text($x,$y,$txt);
		$this->Image($img,$x,$y,100);
		$this->Rotate(0);
	}

	// Tabla coloreada
	function FancyTable($data,$tipo_reporte,$array_width)
	{
	    //Fila Datos
	    // Restauración de colores y fuentes
	    $this->SetFillColor(245);
	    $this->SetTextColor(0);
	    $this->SetFont('Arial','',10);
	    $fill = false;
	    foreach($data['data'] as $row) {
	    	$nombre_origen = '';
	    	if($tipo_reporte == 'externo')
	    	  $nombre_origen = $row['nombre_emisor'].' de '.$row['institucion_emisor'];
	    	if($tipo_reporte == 'interno')
	    	  $nombre_origen = ucwords($row['usuario']).' de '.$row['area'];
	    	if($tipo_reporte == 'des_externo')
	    	  $nombre_origen = ucwords($row['usuario']).' de '.$row['area'];
	    	if($tipo_reporte == 'sol_entrantes')
	    	  $nombre_origen = $row['emisor'];
	    	if($tipo_reporte == 'sol_salientes')
	    	  $nombre_origen = $row['receptor'];

	    	//param 1, fila de datos
	    	//param 2, color relleno de fila
	    	//param 3, alto de la fila

	    	//Array de aliniacion para columnas
	    	$this->aligns= array('C','L','L','L','L','L');
	    	$this->Row(array(
	    		$row['folio_institucion'],
	    		$row['fecha_recibido'] != '' ? date("d/m/Y H:i",strtotime($row['fecha_recibido'])) : '',
	    		$row['fecha_respuesta'] != '' ? date("d/m/Y H:i",strtotime($row['fecha_respuesta'])) : '',
	    		$nombre_origen,
	    		ucwords($row['respondio']),
	    		$row['tiempo_respuesta']),
	    		$fill
	    	);

	    	// $fill = !$fill;
	    }
	}
}
// print_r($data);exit;


$pdf=new PDF();

$array_width = array(40, 30, 30, 75, 50, 50);
$pdf->array_width = $array_width;
foreach ($data['data'] as $key => $data_oficio) {
	// print_r($data_oficio);exit;

	$pdf->titulo = 'Lista de Solicitudes Registradas';
	if($key == 'sol_entrantes'){
	  $pdf->titulo2 = 'Solicitudes Entrantes';
	  $pdf->header_table = array('No. Oficio','Fecha de Registro', 'Fecha de Respuesta', 'Emisor','Responde','Tiempo de Respuesta');
	}
	if($key == 'sol_salientes'){
	  $pdf->titulo2 = 'Solicitudes Salientes';
	  $pdf->header_table = array('No. Oficio','Fecha de Registro', 'Fecha de Respuesta', 'Receptor','Responde','Tiempo de Respuesta');
	}
	$pdf->filtros = 'Filtros';
	if(!empty($data_oficio['data'])){
		$pdf->AddPage('L');
		$pdf->FancyTable($data_oficio,$key,$array_width);		
	}
}
$rep_name =  date('Y-m-d H:i:s')."_reporte.pdf";
$pdf->Output('I',$rep_name);

?>
