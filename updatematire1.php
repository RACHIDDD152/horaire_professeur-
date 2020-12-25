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

	$name = $_POST['uname'];
    $charge = $_POST['ucharge'];
   
    

  $sql="  UPDATE matiere  SET nommatiere='$name' , chargehoraire='$charge' WHERE idmat='$SearchQueryParameter' ";

 $stmt = $connect->query($sql); 
 $stmt->execute();

        if ( $stmt )
        {

         echo '<script> window.open("listeprof.php?id=update sucsessfly","_self")</script>';
        
          }
}
?>


 
<!DOCTYPE html>
<html>
<head>
	<title>insetr data to data base </title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

    <?php 
    $connect ;
    $sql = "SELECT * FROM matiere WHERE idprof='$SearchQueryParameter' " ;
    $stmt=$connect->query($sql);
    while ($Data = $stmt->fetch()){
          $ide = $Data['idmat'];
        $name = $Data['nommatiere'];
    $charge = $Data['chargehoraire'];
    $ide1 = $Data['idprof'];
   
   
    }
 ?>
	<form class="" action="updatematire1.php?id=<?php echo $SearchQueryParameter ; ?>" method="post">
	
    <div class="card bg-secondary row form-group text-light mb-3" >
        <div class="card-header">
            <h1>modifier matierre  </h1>
        </div>

        <div class="card-body  bg-dark">
             <div class="form-group">
                <label for="username" > <span class="Field-info">id matiere </span></label>
                <input type="text" id="username" class="form-control" name="" value="<?php echo $ide ; ?>">
                
            </div>
            <div class="form-group">
                <label for="username" > <span class="Field-info">nom matiere </span></label>
                <input type="text" id="username" class="form-control" name="uname" value="<?php echo $name; ?>">
                
            </div>
            <div class="form-group">
                <label for="title"> <span class="Field-info">charge horaire </span></label>
                <input type="text"  id="password" class="form-control" name="ucharge" value="<?php echo $charge; ?>">
                
            </div>

            <div class="form-group">
                <label for="title"> <span class="Field-info">charge horaire </span></label>
                <input type="text"  id="password" class="form-control" name="" value="<?php echo $ide1; ?>">
                
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