<?php
include('TEST1.PHP');
$y=37;
function foo()
{
	static $x=3;
	global $y;
	$z="machin";
	echo "x=$x<br>";
	echo "y=".$GLOBALS["y"]."<br>";
	echo "z=$z<br>";
	$x+=2;
	$GLOBALS['y']+=2;
}
	saluer("bonj");
	echo $nl;
	foo();
	$y+=4;
	foo();
	$z=$temp++;
	saluer($temp);
	echo "z=$z".$nl;

foo();
?>
