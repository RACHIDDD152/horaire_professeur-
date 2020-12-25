<?php
require_once("session.php");

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
<body style="margin-bottom: 5px;">

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

	

</header>

	
 


<section style="background-color: #888" class="container py-2 mb-4">
	<div class="container">


			
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
       
        $sql = "SELECT * FROM matiere   ";
        $stmt=$connect->prepare($sql);
       
        $stmt->execute();
        while ($Data= $stmt->fetch()) {

          $ide = $Data['idmat'];
        $name = $Data['nommatiere'];
    $charge = $Data['chargehoraire'];
    $ide1 = $Data['idprof'];

   ?>

     
					<td class="table-danger"><?php  echo $name; ?> </td>
					<td>  <?php echo $charge; ?> </td>
					
					<td><a href="updatematire1.php?id=<?php echo $ide; ?>">update</a></td>
              

					
				</tr>
			<?php }  }?>
				</tbody>
				</table>
	
    
		</div>
	</div>
	
</section>
 </div>
	<div class="container">
		<form method="GET" action="listematiere.php">
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

  


		<footer style="margin-bottom: : 5px;" class="bg-dark text-white">
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
</body>
</html>