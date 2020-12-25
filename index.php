
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
<body  class="card  text-light mb-3" style="background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #3f87a6);" >
	<div style="height: 10px; background-color:#27aae1 "></div>
	<nav class="navbar navbar-expand-lg bg-dark">

		<div class="container">
			<a href="#" class="navbar-brand">Horaire.com</a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="login.php" class="nav-link" >Admin</a>
				</li>
				<li class="nav-item">
					<a href="LOGIN.php" name="profil" class="nav-link">Mon profile</a>
					<?php if (isset($_POST["profil"])) {
						echo "string";
						# code...
					}
					?>

				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Département</a>
				</li>
				
				

			</ul  >
			<ul  class="navbar-nav" >
				<li class="nav-item"><a href="logout.php" class="nav-link">log out </a></li>
				 
			</ul>
			<ul  class="navbar-nav ml-auto" >
				<form class="form-inline"  method="GET" action="index.php">
					<div class="form-group">
						<input class="form-control mr-2" type="text" name="search" value="prof or matiere">
						
						<input type="submit" name="submit1" class="btn btn-primary" value="rechercher">

						
					</div>
				</form>
				 
			</ul>

   

		</div>
	</nav>
		<div style="height: 10px; background-color:#27aae1 "></div>

<header class="bg-dark text white py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="fas fa-blog" style="color:#27aae1;"> <i></i></h1>
			</div>
			<div class="col-lg-2 mb-2 "> 
					<form method="post" action="index.php">
				
				<input type="submit" name="submit3" class="btn btn-info btn-block" value="ajouter matiere">
					
				</form>
			 </div>
			 <div class="col-lg-2 mb-2"> 
					<form method="post" action="index.php">
				
				<input type="submit" name="submit2" class="btn btn-info btn-block" value="ajouter professeur">
					
				</form>
			 </div>
			 <div class="col-lg-2 mb-2"> 
					<form method="post" action="index.php">
				
				<input type="submit" name="submit4" class="btn btn-info btn-block" value="ajouter admin">
					
				</form>
			 </div>
			  <div class="col-lg-2 mb-2"> 
			  	<form method="GET" action="index.php">
				
				<input type="submit" name="submittt" class="btn btn-info btn-block" value="les professeur">
					
				</form>
			 </div>
			  <div class="col-lg-2 mb-2"> 
				<form method="GET" action="index.php">
				
				<input type="submit" name="submitt" class="btn btn-info btn-block" value="les matiere">
					
				</form>
			 </div>
		</div>
	</div>
	
</header>
<?php 
if (isset($_POST["submit4"])) {
 include 'ajouteradmin.php'; 
 } 
?>	
<?php 
if (isset($_POST["submit2"])) {
 include 'ajouterproff.php'; 
 } 
?>		

<?php 
if (isset($_POST["submit3"])) {
 include 'ajoutermatiere.php'; 
 } 
?>		

					 <?php
    if(isset($_GET["submitt"])){  ?>
    	<section style="background-color: #888" class="container py-2 mb-4">
	<div class="container">
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
				</div>
	
</section>

					 <?php
    if(isset($_GET["submittt"])){  ?>
    	<section style="background-color: #888" class="container py-2 mb-4">
	<div class="container">
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
       
        $sql = "SELECT * FROM addprof   ";
        $stmt=$connect->prepare($sql);
       
        $stmt->execute();
        while ($Data= $stmt->fetch()) {

         $ide = $Data['idprof'];
        $name = $Data['nom'];
    $pass = $Data['pass'];
    $agee = $Data['age'];
    $mail = $Data['email'];
   $spes = $Data['specialite'];

   ?>

     
					<td class="table-danger"><?php  echo $name; ?> </td>
					<td>  <?php echo $mail; ?> </td>
					
					<td><a href="updateprof.php?id=<?php echo $ide; ?>">update</a></td>
                     <td><a href="supprimerprof.php?id=<?php echo $ide; ?>">supprimer</a></td>

					
				</tr>
			<?php }  }?>
				</tbody>
				</table>
	
    
		</div>
	</div>
				</div>
	
</section>

			<?php 
 if(isset($_GET["submit1"])){ ?>
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
 	echo "string";
        $searche = $_GET["search"];
        $sql = "SELECT * FROM addprof WHERE nom=:searchh or email=:searchh ";
        $stmt=$connect->prepare($sql);
        $stmt->bindValue(':searchh',$searche);
        $stmt->execute();
        echo "string";
        while ($Data = $stmt->fetch()) {

         
       $ide = $Data['idprof'];
        $name = $Data['nom'];
    $pass = $Data['pass'];
    $agee = $Data['age'];
    $mail = $Data['email'];
   $spes = $Data['specialite'];
   echo "string";
        ?>

      
				
			<tr>
   
					<td class="table-danger"><?php  echo $name; ?> </td>
					<td>  <?php echo $mail; ?> </td>
					
					<td><a href="updateprof.php?id=<?php echo $ide; ?>">update</a></td>
              

					
				</tr>
		
				
				</table>

        <?php

        }

    }
    ?>



<?php /*


<div class="container">
	<div class="row mt-4"> 
		<div class="col-sm-8" style="min-height: 40px; " >
			
		</div>
		<div class="col-sm-4" style="min-height: 40px; background-color: green "> </div>

	</div>
	
</div>
<section style="height: 100%;" class="container py-2 mb-4">

	<div class="row">
		<div class="col-lg-12">
	
    


			<table class="table table-striped table-hover">
				<thead class="thead-dark">
				<tr>
					<th>gjhkj </th>
					<th> depart</th>
					<th> horare</th>
					<th> hhh</th>
					<th>hohoho</th>
				</tr>
				</thead>
			
			<tr>

				<tbody>
					<td class="table-danger">rachid </td>
					<td> info</td>
					<td> <img src="#"> </td>
					<td class="table-primary"> hh</td>
					<td><a href="#"> <span class="btn btn-warning">edit </span></a></td>
				</tr>
				</tbody>
				</table>
	

			
		</div>
	</div>
	*/ ?>
	
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