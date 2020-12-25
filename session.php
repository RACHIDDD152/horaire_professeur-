<?php
session_start();
function errormessage(){
	if(isset($_SESSION["errormessage"])){
		$output = "<div class=\"alert alert-danger\">";
		$output .=htmlentities($_SESSION["errormessage"]);
		#pour ne pas casser les balise html
		$output .="</div>";
		$_SESSION["errormessage"] = null ;
		return $output;
	}
}
function successmessage(){
	if(isset($_SESSION["successmessage"])){
		$output = "<div class=\"alert alert-success \">";
		$output .=htmlentities($_SESSION["successmessage"]);
		#pour ne pas casser les balise html
		$output .="</div>";
		$_SESSION["successmessage"] = null ;
		return $output;
	}
}
if(isset($_SESSION["id"])){
	$k=$_SESSION["id"];
}

if(isset($_SESSION["horaire"])){
	$hor=$_SESSION["horaire"];
}
if(isset($_SESSION["msg"])){
	$msg=$_SESSION["msg"];
}
?>