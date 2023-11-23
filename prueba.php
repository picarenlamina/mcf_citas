<?php

class Prueba
{
	public $valor;
	
	public function _construct()
	{
		$this->valor = 0;
	}

}

$a = new Prueba();
$a->valor = 5;
$b = clone( $a );
$b->valor = 6;

echo $a->valor;
echo $b->valor;

$a = $b;
$a->valor = 5;
$b->valor = 6;
echo $a->valor;
echo $b->valor;
echo "</br>";
echo 5==5?"selected":"";



