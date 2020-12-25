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
<html style="margin-bottom: 5px;">
<head>
	<title>profil</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="margin-bottom: 40px;background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #3f87a6);">
	<div style="height: 10px; background-color:#27aae1 "></div>
	<nav class="navbar navbar-expand-lg bg-dark">

		<div class="container">
			<a href="#" class="navbar-brand">HORAIRE.com</a>
			<ul class="navbar-nav mr-auto">
			
				<li class="nav-item">
					<a href="#" class="nav-link">liste matiere</a>
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

		 <?php
   
       
        $sql = "SELECT * FROM addprof WHERE idprof=$k ";
        $stmt=$connect->prepare($sql);
       
        $stmt->execute();
        while ($Data= $stmt->fetch()) {

         
        $name = $Data['nom'];
        $ssn = $Data['pass'];   
        $depart = $Data['age']; 
        $slary = $Data['email']; 
        $home = $Data['specialite'];

    }
    ?>

<div class="col-md-3">
<div class="row">
	<div class="card-header bg-dark text-light">
		<h3><?php  echo "welcome $name "; ?></h3>
	</div>
	<div class="card-body">
		<img src="" class="block img-fluid mb-3">

		
	</div>
	
</div></div>
</header>

<section style="background-color: #888" class="container py-2 mb-4">
	<div class="container">
	<div class="row mt-2"> 
		<div class="col-sm-8" style="min-height: 40px; " >
			             
			   
               <h2> <?php echo $slary  ; ?> </h2>
               <h2> <?php echo "departement $home"  ; ?> </h2>
			
		</div>
		
	</div>
	
</div>
	<div class="container">
		<form method="GET" action="monprofil.php">
				<div  class="row">
			
			<div class="col-lg-3 mb-2 "> 
				<input type="submit" name="submitt" class="btn btn-info btn-block" value="consulter horaire ">
			 </div>
			 <div class="col-lg-3 mb-2"> 
				<input type="submit" name="submittt" class="btn btn-info btn-block" value="choisire matierre">
			 </div>
			
			
		</div>
		</form>

	</div>



					 <?php

					 echo $msg;
    if(isset($_GET["submitt"])){ ?>

			<table class="table table-striped table-hover">
				<thead class="thead-dark">
				<tr>
					<th>matiere  </th>
					<th> charge horaire</th>
					<th> disponible</th>
					
				</tr>
				</thead>
			
			<tr>

				<tbody>
       <?php
        $sql = "SELECT * FROM matiere WHERE idprof='$k' ";
        $stmt=$connect->prepare($sql);
       
         $stmt->execute();
         $kk=0;
        while ($Data= $stmt->fetch()) {

         
        $name = $Data['nommatiere'];
        $horr = $Data['chargehoraire'];

        $kk=$kk+$horr;

         $_SESSION["horaire"]=$kk ;


         ?> 
					<td class="table-danger"><?php  echo $name; ?> </td>
					<td>  <?php echo $kk; ?> </td>
					
					<td>></td>
				</tr>
			<?php }  }?>
				</tbody>
				</table>
	
					 <?php
    if(isset($_GET["submittt"])){  ?>
    	<table class="table table-striped table-hover">
				<thead class="thead-dark">
				<tr>
					<th>matiere  </th>
					<th> charge horaire</th>
					<th> choisire</th>
					
				</tr>
				</thead>
			
			<tr>

				<tbody>
		<?php
       
        $sql = "SELECT * FROM matiere WHERE idprof=0  ";
        $stmt=$connect->prepare($sql);
       
        $stmt->execute();
        while ($Data= $stmt->fetch()) {

         $ide = $Data['idmat'];
        $name = $Data['nommatiere'];
        $horr = $Data['chargehoraire']; ?> 

   
     
					<td class="table-danger"><?php  echo $name; ?> </td>
					<td>  <?php echo $horr; ?> </td>
					
					<td><a href="updatemat.php?id=<?php echo $ide; ?>">update</a></td>
              

					
				</tr>
			<?php }  }?>
				</tbody>
				</table>
	
    
		</div>
	</div>
	
</section>
</body>
  
		<div style="position: fixed;
  left: 0;
  bottom: 0;
  height: 20px;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;" class="bg-dark text-white">
 <div class="container">
				<div class="row">
					<div class="col"></div>
					<p class="lead text-center"> <span id="year"></span>   theme</p>
				</div>
				</div>
			</div>
</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script >
	$('#year').text(new Date().getFullYear());
</script>

</html>

