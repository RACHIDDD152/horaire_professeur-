
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




if(isset($_POST["submit"])) {
if(!empty($_POST["uname"]) && !empty($_POST["upass"])){
	$name = $_POST['uname'];
    $upass = $_POST['upass'];  

 $stmt = $connect->prepare("INSERT INTO admin  (username,password) VALUES ( '$name', '$upass');"); 
  
         $stmt->execute();
         redirect_to("index.php");
        
}else{

	echo "pleas enterr data";
}
}
?>
<section style="background-color: #888" class="container py-2 mb-4">
	<div class="container">

<form class="" action="ajouteradmin.php" method="post">
	<div  style="margin: 0px;" class="card bg-secondary text-light mb-3" >
		<div class="card-header">
			<h1>Ajouter admin </h1>
		</div>
		<div class="card-body bg-dark">
			<div class="form-group">
				<label for="username"> <span class="Field-info">nom admin </span></label>
				<input type="text" id="username" class="form-control" name="uname">
				
			</div>
			<div class="form-group">
				<label for="title"> <span class="Field-info">mot de passe </span></label>
				<input type="text"  id="password" class="form-control" name="upass">
				
			</div>
			
			<div class="row">
				
				<div class="col-lg-4 mb-2">
					<input type="submit" name="submit" class="btn btn-info btn-block" value="submit">
					
					
				</div>
				
			</div>

		</div>
		
	</div>
	
</form>
	</div>
	
</section>