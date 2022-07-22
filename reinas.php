<?php
//para ejecutar la clase solo es necesario ejecutarlo con el servicio xampp o similares
class Reinas
{
	private $mesa = array();
	private $numReinas = 8;
	
	public function __construct($n = 8)
	{
		$this->numReinas = $n;
		
		// Fill the mesa with 0s
		for($i = 0; $i < $n; $i++)
		{
			$this->mesa[$i] = array_fill(0, $n, 0);
		}
	}
	
	function resuelve($numeroReina, $fila)
	{
		for($columna = 0; $columna < $this->numReinas; $columna++)
		{
			if($this->permite($fila, $columna))
			{
				
				$this->mesa[$fila][$columna] = 1;
				
				
				if(($numeroReina === $this->numReinas - 1) || $this->resuelve($numeroReina + 1, $fila + 1) === true) return true;
				
				
				$this->mesa[$fila][$columna] = 0;
			}
		}
		
		return false;
	}
	
	function permite($x, $y)
	{
		$n = $this->numReinas;
		

		for($i = 0; $i < $x; $i++)
		{
			if($this->mesa[$i][$y] === 1) return false;
			$tx = $x - 1 - $i;
			$ty = $y - 1 - $i;
			if(($ty >= 0) && ($this->mesa[$tx][$ty] === 1)) return false;
			$ty = $y + 1 + $i;
			if(($ty < $n) && ($this->mesa[$tx][$ty] === 1)) return false;
		}
		
		return true;
	}
	
	//Imprimimos
	function printmesa()
	{
		for($fila=0; $fila<$this->numReinas; $fila++)
		{
			$sep = '-';
			for($columna=0; $columna<$this->numReinas; $columna++)
			{
				$sep .= '--';
				echo '|';

				$celda = $this->mesa[$fila][$columna];
				if($celda === 1)
				{
					echo 'Q';
				}
				else
				{
					echo ' ';
				}
			}
			
			echo "|\n";
			echo $sep . "\n";	
		}
	}
}


$Reinas = new Reinas(8);
$Reinas->resuelve(0, 0);

$Reinas->printmesa();

?>
