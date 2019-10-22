<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
$select=new Table();
if(isset($_SESSION['id'])){    

$Nomtable='Domaines';
$table1 = $select->select($Nomtable);
//insertion de donneess
$Ins = new Table ;
if(isset($_POST['enregistrer'])){

    if(!empty($_POST['nomdomaine'])){

        $nomdomaine = trim(htmlspecialchars($_POST['nomdomaine'])); 
        $donnes = ['Nom_Domaine'=>$nomdomaine];
        $req = $Ins->insert($Nomtable,$donnes);

    }else{echo "Veuillez saisire toutes les champs";   }

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inscriptiondomaines</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="../css/services.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50"id="body">

    <!--barnav-->
    <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="pageadmin.php?id=<?=$_SESSION['id']?>">HOME</a>
            </div>
           
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
               <!-- <li><a href="pages/admin1.php">Page Admin</a></li>-->
                 </ul>
                <ul class="nav navbar-nav navbar-right">
                   <li><a href="../../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                </ul>    
            </div>
        </div>
    </nav>  
<div class="container-fluid" >
  <div class="row">
    <div class="col-sm-6 col-md-6 col-lg-8 ">
        <h1><span class="acceuil">Page D'inscription Des Domaines</span></h1> 
        <table class="liste">
            <tr> <th>#ID</th><th>Nom Domaines</th><th>Actions</th><tr>
            <?php  foreach($table1 as $value1){ //die(var_dump($post)); ?>
            <tr> 	
                <td> <?= $value1[0]; ?></td><td><?= $value1[1]; ?></td>
                <td><a href='modifemployer.php?id=<?= $value1[0]; ?>'class="btn btn-primary"><i class="fas fa-edit"></i></a>
            </a> &nbsp; <a href='tsupemployer.php?id=<?= $value1[0]; ?>'class="btn btn-danger" onclick='return confirmation();'> <i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php } ?>
        </table>    
    </div> 

    <div class="col-sm-6 col-md-6 col-lg-4">    
    <form method="POST"  action="">
          <table class="table-center">
                <tr><th colspan="2"><legend>Inscription</legend></th></tr>
                
                <div class="form-group">
                    <tr>
                        <td><label for="iddomaine">Id Domaine: </label></td>
                        <td><input type="text" name="iddomaine" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="nomdomaine">Nom Domaine: </label></td>
                        <td><input type="text" name="nomdomaine" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr><td></td>
                        <td style="text-align:center">
                        <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
                        </td>
                    </tr>
                </div>
                <div id="erreur"><?php  if (isset($erreur)){echo $erreur ;}?></div>  
        </table>    
      </form> 
    </div>
  </div>  
</div>
</body>
</html>
<?php    
}
?>