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
 $SearchQueryParameter= $_GET["id"];



if(isset($_POST["submit"])) {

	$enamee = $_POST['ename'];
    $ssne = $_POST['ssn'];
    $depte = $_POST['dept'];
   $salarye= $_POST['salary'];
   $homee = $_POST['home'];
    

  $sql="  DELETE FROM  record    WHERE id='$SearchQueryParameter'";

 $stmt = $connect->query($sql); 


  
  
        if ( $stmt )
        {

         echo '<script> window.open("afficher.php?id=DELETE sucsessfly","_self")</script>';
        
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

    <?php 
    $connect ;
    $sql = "SELECT * FROM record WHERE id='$SearchQueryParameter' " ;
    $stmt=$connect->query($sql);
    while ($Data = $stmt->fetch()){
          $ide = $Data['id']; 
        $name = $Data['ename'];
        $ssn = $Data['ssn'];   
        $depart = $Data['dept']; 
        $slary = $Data['salary']; 
        $home = $Data['homeaddress']; 
    }



        ?>


	<form class="" action="supprimer.php?id=<?php echo $SearchQueryParameter ; ?>" method="post">
		<fieldset>
			<span class="fieldinfo">emploiyee name:</span>
		<br>
            <input type="text" name="ename"  value="<?php echo $name; ?>">
        <br>
        	<span class="fieldinfo">social sucurity:</span>
		<br>
            <input type="text" name="ssn"  value=" <?php echo $ssn; ?>">
        <br>
        	<span class="fieldinfo">departement:</span>
	   	<br>
            <input type="text" name="dept"  value="<?php echo $depart ; ?>">
        <br>
        	<span class="fieldinfo">salary:</span>
		<br>
            <input type="text" name="salary"  value="<?php echo $slary ; ?>">
        <br>
        	<span class="fieldinfo">home add:</span>
		<br>
            <input type="text" name="home"  value="<?php echo $home ; ?>">
        <br>
        <input type="submit" name="submit" value="deleterecord">
</fieldset>
	</form>
</body>
</html> 