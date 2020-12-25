<?php
require_once("session.php");
require_once("function.php");
 $DB_SERVER = "localhost"; 
     $DB_USER = "root"; 
     $DB_PASS = ""; 
     $DB_DATABASE = "horaire"; 

/******************************************************************/
 
     try { 
     $connect =  new PDO("mysql:host=$DB_SERVER; dbname=$DB_DATABASE", $DB_USER,$DB_PASS); 
     } 
 
     catch (PDOException $e) { 

        if (empty($DB_DATABASE)) {
            die("<strong>Database Error..! </strong><a href='install'>Start installation</a>") ;
        } else {
            die("<strong>Database Error..! </strong>") ;
        }
         
     } 
 
     $connect->query("set charcter_set_server = 'utf8'"); 
     $connect->query("set names'utf8' "); 
 $SearchQueryParameter= $_GET["id"];




 if($hor <= 8){

  $sql="  UPDATE matiere  SET idprof='$k'  WHERE idmat='$SearchQueryParameter'";

 $stmt = $connect->query($sql); 


  
  
        if ( $stmt )
        {

         echo '<script> window.open("monprofil.php?id=$hor","_self")</script>';
        
          
         }
}
else{
    
 echo '<script> window.open("monprofil.php?id=update fieled","_self")</script>';
  $_SESSION["msg"]="vous ne pouvez avoir un horaire plus que 8 heurs par semaine";
  
}

?>
 
<!DOCTYPE html>
<html>
<head>
	<title>insetr data to data base </title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<body>



	
</body>
</html> 