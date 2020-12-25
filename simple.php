<?php
 $DB_SERVER = "localhost"; 
     $DB_USER = "root"; 
     $DB_PASS = ""; 
     $DB_DATABASE = "test1"; 

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




if(isset($_POST["submit"])) {
if(!empty($_POST["ename"])&& !empty($_POST["ssn"])){
	$enamee = $_POST['ename'];
    $ssne = $_POST['ssn'];
    $depte = $_POST['dept'];
   $salarye= $_POST['salary'];
   $homee = $_POST['home'];
    

  

 $stmt = $connect->prepare("INSERT INTO record  (ename,ssn,dept,salary,homeaddress) VALUES ( '$enamee', '$ssne','$depte','$salarye','$homee');"); 


   
  
         $stmt->execute();
        
}else{

	echo "pleas enterr data";
}
}
?>
 
<!DOCTYPE html>
<html>
<head>
	<title>insetr data to data base </title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<body>


	<form class="" action="simple.php" method="post">
		<fieldset>
			<span class="fieldinfo">emploiyee name:</span>
		<br>
            <input type="text" name="ename"  value="">
        <br>
        	<span class="fieldinfo">social sucurity:</span>
		<br>
            <input type="text" name="ssn"  value="">
        <br>
        	<span class="fieldinfo">departement:</span>
	   	<br>
            <input type="text" name="dept"  value="">
        <br>
        	<span class="fieldinfo">salary:</span>
		<br>
            <input type="text" name="salary"  value="">
        <br>
        	<span class="fieldinfo">home add:</span>
		<br>
            <input type="text" name="home"  value="">
        <br>
        <input type="submit" name="submit" value="submitrecord">
        <a href="afficher.php">afficher</a>
</fieldset>
	</form>
</body>
</html> 