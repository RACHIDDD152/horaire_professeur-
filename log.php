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
<?php 
 if(isset($_POST["submit"]))
 {
$motdepass = $_POST["pass"];
$user = $_POST["nomuser"];


 $stmt_find = $connect->prepare("SELECT * FROM `admin` " );
  $stmt_find->execute();

  while ($find_row = $stmt_find->fetch()) {
      $nomp = $find_row ['username'];
      $password = $find_row ['password'];
	 


if (  $motdepass == $password  &&  $user == $nomp){
        $_SESSION["successmessage"]= "Vous avez accès au contenu protégé de cette page.";
         $i=1;
         redirect_to("index.php");
        break ;
        
       ;
 
}
 
        else
        {   $i=0;
        	        
        }
}
if($i==0)
{
 $_SESSION["errormessage"]= "Le mot de passe entré n'est pas le bon. Réessayez...";
}

}


?>

<section style="margin-top: 04%;" class="container py-2 mb-4">

		 <?php  echo errormessage();echo successmessage(); ?>
	<div class="row">
		<div class="offset-sm-3 col-sm-6" style="min-height: 400px; ">
			<div class="card bg-secondary text-light">
				<div class="card-header">
					<H4>WELCOME BACK</H4>
					<div class="card-body bg-dark"></div>

                
					
					<form class="" action="log.php" method="post">
						<div class="form-group">
							<label for="username"><span class="FieldInfo">username</span>  </label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-white><i class=" fas fa-user"></i> </span>
								</div>
								<input type="text"  class="form-control" name="nomuser" id="usernam" value=""> </input>
								</div>
							</div>
							<div class="form-group">
							<label for="password"><span class="FieldInfo">password</span>  </label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-white><i class=" fas fa-user"></i> </span>
								</div>
								<input type="password"  class="form-control" name="pass" id="pass" value=""> </input>
								</div>
							</div>
							
						</div>
							
						</div>
						<link rel="" type="text/css" href="login1.php">
						<input type="submit" name="submit" class="btn btn-info btn-block" value="login">

						
					</form>


				</div>

			</div>
		</div>
		
		
	</div>
</section>





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