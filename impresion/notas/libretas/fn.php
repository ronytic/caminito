<?php
class fn{
	function mayuscula($texto,$pdf=1){
		if($pdf===1)
			return utf8_decode(mb_strtoupper($texto,"utf8"));
		else
			return mb_strtoupper($texto,"utf8");
	}
	function minuscula($texto,$pdf=1){
		if($pdf===1)
			return utf8_decode(mb_strtolower($texto,"utf8"));
		else
			return mb_strtolower($texto,"utf8");
	}
	function cuadro($x,$y,$w,$h=5,$txt,$align="C",$tam=12,$borde=1){
		global $pdf;
		$pdf->SetFont("Arial","",$tam);
		$pdf->SetXY($x,$y);
		$pdf->Cell($w,$h,$this->mayuscula($txt),$borde,0,$align);
	}
}
?>