<?php
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




if(isset($_POST["usubmit"])) {
if(!empty($_POST["uname"])&& !empty($_POST["upass"])){
	$name = $_POST['uname'];
    $pass = $_POST['upass'];
    $agee = $_POST['uage'];
    $mail = $_POST['uemail'];
   $spes= $_POST['uspes'];
   
    

  

 $stmt = $connect->prepare("INSERT INTO addprof  (nom,mot-pass,age,email,specialite) VALUES ( '$name', '$pass','$agee','$mail','spes');"); 


   
  
         $stmt->execute();
        
}else{

	echo "pleas enterr data";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<div style="height: 10px; background-color:#27aae1 "></div>
	<nav class="navbar navbar-expand-lg bg-dark">

		<div class="container">
			<a href="#" class="navbar-brand">rachid.com</a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="login.html" class="nav-link" >Admin</a>
				</li>
				<li class="nav-item">
					<a href="afficher.php" class="nav-link">my profile</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">depart</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">matiere</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">university</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">othrs</a>
				</li>

			</ul  >
			<ul  class="navbar-nav" >
				<li class="nav-item"><a href="logout.php" class="nav-link">log out </a></li>
				 
			</ul>
			<ul  class="navbar-nav ml-auto" >
				<form class="form-inline" action="">
					<div class="form-group">
						<input class="form-control mr-2" type="text" name="search">
						<button class="btn btn-primary" name="searchbutton" type="button"> search</button>
						
					</div>
				</form>
				 
			</ul>

		</div>
	</nav>
		<div style="height: 10px; background-color:#27aae1 "></div>
<header class="bg-dark text-white py-3">
	<div class="container">
		 <div class="col-md-12">
		  </div>
	</div>
</header>



<form class="" action="ajouterprof.php" method="post">
	<div class="card bg-secondary text-light mb-3" >
		<div class="card-header">
			<h1>Ajouter professeur </h1>
		</div>

		<div class="card-body bg-dark">
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
				<div class="col-lg-6 mb-2">
					<a href="" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>back</a>
					
				</div>
				<div class="col-lg-6 mb-2">
					<input type="submit" name="usabmit"> 
						<i class="fas fa-check"></i>
				
				</div>
				
			</div>

		</div>
		
	</div>
	
</form>


		<footer class="bg-dark text-white">
			<div class="container">
				<div class="row">
					<div class="col"></div>
					<p class="lead text-center"> <span id="year"></span>   theme</p>
				</div>
				</div>
			</div>
		</footer>
	<div style="height: 10px; background-color:#27aae1 "></div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script >
	$('#year').text(new Date().getFullYear());
</script>
<div style="height: 10px; background-color:#27aae1 "></div>
</body>
</html>