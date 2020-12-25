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
 $SearchQueryParameter= $_GET["id"];



if(isset($_POST["submit"])) {

	 
    

  $sql="  DELETE FROM  addprof   WHERE idprof='$SearchQueryParameter'";

 $stmt = $connect->query($sql); 


  
  
        if ( $stmt )
        {

         echo '<script> window.open("listeprof.php?id=DELETE sucsessfly","_self")</script>';
        
          }
}
?>
 
<!DOCTYPE html>
<html>
<head>
	<title>insetr data to data base </title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

    <?php 
  
    $sql = "SELECT * FROM addprof WHERE idprof='$SearchQueryParameter' " ;
    $stmt=$connect->query($sql);

    
    while ($Data = $stmt->fetch()){
         $ide = $Data['idprof'];
        $name = $Data['nom'];
    $pass = $Data['pass'];
    $agee = $Data['age'];
    $mail = $Data['email'];
   $spes = $Data['specialite'];

    }



        ?>


	<form class="" action="supprimerprof.php?id=<?php echo $SearchQueryParameter ; ?>" method="post">
    <div class="card bg-secondary row form-group text-light mb-3" >
        <div class="card-header">
            <h1>Ajouter professeur </h1>
        </div>

        <div class="card-body  bg-dark">
            <div class="form-group">
                <label for="username" > <span class="Field-info">user name </span></label>
                <input type="text" id="username" class="form-control" name="uname" value=" <?php echo $name; ?>">
                
            </div>
            <div class="form-group">
                <label for="title"> <span class="Field-info">password </span></label>
                <input type="text"  id="password" class="form-control" name="upass" value=" <?php echo $pass; ?>">
                
            </div>
            <div class="form-group">
                <label for="username" > <span class="Field-info">age </span></label>
                <input type="text" id="username" class="form-control" name="uage" value=" <?php echo $agee; ?>">
                
            </div>
            <div class="form-group">
                <label for="username"> <span class="Field-info">email </span></label>
                <input type="text" id="email" class="form-control" name="uemail" value=" <?php echo $mail; ?>">
                
            </div>
            <div class="form-group">
                <label for="username"> <span class="Field-info">la spécialité </span></label>
                <input type="text" id="username" class="form-control" name="uspes" value=" <?php echo $spes; ?>">
                
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
</body>
</html> 