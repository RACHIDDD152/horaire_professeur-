<?php 
if(isset($_POST["nom"]) && isset($_POST["prenom"]))
{
	$nom =($_POST['nom']);
	$prenom = ($_POST['prenom']);
	echo "$nom";
	echo "</br>";
	echo "$prenom";

}
else
{
	echo "enrer donner valide ";

}
?>