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


?>
 
<!DOCTYPE html>
<html>
<head>
	<title>insetr data to data base </title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<body>
    <h2><?php echo @$_GET["id"]; ?></h2> 
    <div>
        <fieldset>
            <form action="afficher.php" method="GET">
                <input type="text" name="search" placeholder="search by id or ssn">
                <input type="submit" name="serchbutton" value="searchrecord">
            </form>

        </fieldset>

    </div>
    <?php
    if(isset($_GET["serchbutton"])){
        $searche = $_GET["search"];
        $sql = "SELECT * FROM record WHERE ename=:searchh or ssn=:searchh ";
        $stmt=$connect->prepare($sql);
        $stmt->bindValue(':searchh',$searche);
        $stmt->execute();
        while ($Data= $stmt->fetch()) {

         
        $name = $Data['ename'];
        $ssn = $Data['ssn'];   
        $depart = $Data['dept']; 
        $slary = $Data['salary']; 
        $home = $Data['homeaddress'];
        ?>
         <table border="2">
            <tr>
           
            <th>ename</th>
            <th>ssn</th>
            <th>dept</th>
            <th>slary</th>
            <th>home</th>
     </tr>
     <tr>
        
            <td> <?php echo $name ;?></td>
            <td> <?php echo $ssn ; ?></td>
            <td> <?php echo $depart  ;?></td>
            <td> <?php echo $slary  ;?></td>
            <td> <?php echo $home ; ?></td>
            </tr>
</table>

        <?php

        }

    }
    ?>

    <div>
        <table border="2">
            <tr>
            <th>id</th>
            <th>ename</th>
            <th>ssn</th>
            <th>dept</th>
            <th>slary</th>
            <th>home</th>
     </tr>
    <?php 
 
    

      $stmt = $connect->query("SELECT * FROM record ");
 
    
    while ( $DataROWS=$stmt->fetch()) {
        $ide = $DataROWS['id']; 
        $name = $DataROWS['ename'];
        $ssn = $DataROWS['ssn'];   
        $depart = $DataROWS['dept']; 
        $slary = $DataROWS['salary']; 
        $home = $DataROWS['homeaddress']; ?>
        <tr>
            <td> <?php echo $ide ; ?></td>
            <td> <?php echo $name ;?></td>
            <td> <?php echo $ssn ; ?></td>
            <td> <?php echo $depart  ;?></td>
            <td> <?php echo $slary  ;?></td>
            <td> <?php echo $home ; ?></td>
             <td><a href="update.php?id=<?php echo $ide; ?>">update</a></td>
               <td><a href="supprimer.php?id=<?php echo $ide; ?>">delete</a></td>
           


        </tr>

              

     
  <?php   }   ?>
    </table>
     <a href="simple.php"> ajouter</a>

      
    </div>

	
</body>
</html> 