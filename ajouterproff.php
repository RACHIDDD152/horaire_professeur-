




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
    $pass = $_POST['upass'];
    $agee = $_POST['uage'];
    $mail = $_POST['uemail'];
   $spes = $_POST['uspes'];
   
    

  

 $stmt = $connect->prepare("INSERT INTO addprof  (nom,pass,age,email,specialite) VALUES ( '$name', '$pass','$agee','$mail','$spes');"); 


   
  
         $stmt->execute();
         $_SESSION["errormessage"]= "donner entrer avec succes "; ?>
         <script>
        alert('errormessage()') ; alert('successmessage()'); 
          </script>
          <?php
         redirect_to("index.php");
        
}else{

	$_SESSION["errormessage"]= "remlire formulaire ";

	redirect_to("ajouterproff.php");
}
?>

<?php

}


?>




<section style="background-color: #888" class="container py-2 mb-4">
	<div class="container">


<form class="" action="ajouterproff.php" method="post">
	<div class="card bg-secondary row form-group text-light mb-3" >
		<div class="card-header">
			<h1>Ajouter professeur </h1>
		</div>

		<div class="card-body  bg-dark">
			<div class="form-group">
				<label for="username" > <span class="Field-info">user name </span></label>
				<input type="text" id="username" class="form-control" name="uname">
				
			</div>
			<div class="form-group">
				<label for="title"> <span class="Field-info">password </span></label>
				<input type="text"  id="password" class="form-control" name="upass">
				
			</div>
			<div class="form-group">
				<label for="username" > <span class="Field-info">age </span></label>
				<input type="text" id="username" class="form-control" name="uage">
				
			</div>
			<div class="form-group">
				<label for="username"> <span class="Field-info">email </span></label>
				<input type="text" id="email" class="form-control" name="uemail">
				
			</div>
			<div class="form-group">
				<label for="username"> <span class="Field-info">la spécialité </span></label>
				<input type="text" id="username" class="form-control" name="uspes">
				
			</div>
			
			<div class="row">
				<div style=" text-align: center;"  class="col-lg-6 mb-2">
					<a href="" class="btn btn-warning "><i class="fas fa-arrow-left"></i>back</a>
					
				</div>
				<div class="col-lg-6 mb-2">
					<button style="width:150px; text-align: center;" type="submit" class="btn btn-success " name="submit" value="" >
						<i class="fas fa-check"></i> valider
						</button>
					
				</div>
				
			</div>

		</div>
		
	</div>
	
</form>
			</div>
	
</section>
