<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
if(isset($_SESSION['id'])){
$select=new Table();
$Nomtable='Patients';
$table = $select->select($Nomtable);

if(isset($_POST['enregistrer'])){

    if( !empty($_POST['prenom']) AND !empty($_POST['nom'])AND !empty($_POST['datenaiss'])
        AND !empty($_POST['adresse']) AND !empty($_POST['telephone'])){

        $prenom = trim(htmlspecialchars($_POST['prenom'])); 
        $nom = trim(htmlspecialchars($_POST['nom']));  
        $datenaiss = trim($_POST['datenaiss']);
        $adresse = trim(htmlspecialchars($_POST['prenom'])); 
        $telephone  = trim(htmlspecialchars($_POST['telephone']));   

        if(preg_match('#^(78||77||76||70)[0-9]{7}$#',$telephone)){
            $donnes = ['Prenom_Patient'=>$prenom,'Nom_Patient'=>$nom,
            'Datedenaiss_Patient'=>$datenaiss,'Adresse_Patient'=>$adresse,'Telephone_Patient'=>$telephone ];
            $req = $select->insert($Nomtable,$donnes);
        }else{$erreur="Entrez un numero valide"; }
    }else{$erreur = "Veuillez saisire toutes les champs";   }            
} 
?>
<!DOCTYPE html>
<html>
<head>
  <title>emploie du temps medecins</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    body {
        position: relative; 
    }
    ul,li{
        margin-left:30px;
    }
    
    .affix {
        top:0;
        width: 100%;
        z-index: 9999 !important;
    }
    .navbar {
        margin-bottom: 0px;
    }

    .affix ~ .container-fluid {
    position: relative;
    top: 50px;
    }
    #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
    #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
    #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
    #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
    #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!--barnav-->
    <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
            <a class="navbar-brand" href="#">Medecins</a>
            </div>
            <div>
            <div class="collapse navbar-collapse" id="myNavbar">
             <!--   <ul class="nav navbar-nav">
                <li><a href="#section1">Section 1</a></li>
                <li><a href="#section2">Section 2</a></li>
                <li><a href="#section3">Section 3</a></li>
                </ul>-->
            </div>
            </div>
        </div>
    </nav>   
    <br><br><br>  
    
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-8 col-lg-9 "> <h1>Liste de Patients</h1>           
            <div>     <!--Tableau d'affichage-->
                <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
            <br>
            <table class="table table_responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
			            <th>Actions  </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                <?php foreach($table as $value1){;?>  
                    <tr>
                        <td><?=$value1['Id_Patient'];?></td>
                        <td><?=$value1['Prenom_Patient'];?></td>
                        <td><?=$value1['Nom_Patient'];?></td>
                        <td><?=$value1['Datedenaiss_Patient'];?></td>
                        <td><?=$value1['Adresse_Patient'];?></td>
                        <td><?=$value1['Telephone_Patient'];?></td>
 			            <td><a href='modifierer/tmodifpatient.php?id=<?= $value1['Id_Patient'] ;?>'>
                           <button class="btn btn-warning">Modifer</a> &nbsp;
                            <a href='supprimer/tsuppatient.php?id=<?= $value1['Id_Patient'] ;?>'>
                          <button class="btn btn-danger ">Supprimer</a>                   
                        </td>
                    </tr>
                <?php }?> 
                </tbody>
            </table>
        </div> 
        <div class="col-sm-6 col-md-4 col-lg-3 ">    
            <form method="POST"  action="">
                <table class="table-center">
                    <tr><th colspan="2"><legend>Inscription</legend></th></tr>
                    
                    <div class="form-group">
                        <tr>
                            <td><label for="prenom">Prenom: </label></td>
                            <td><input type="text" name="prenom" class="form-control"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="nom">Nom: </label></td>
                            <td><input type="text" name="nom" class="form-control"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="datenaiss">Date de naissance: </label></td>
                            <td><input type="date" name="datenaiss" class="form-control"></td>
                        </tr>
                    </div>
                    
                    <div class="form-group">
                        <tr>
                            <td><label for="adresse">Adresse: </label></td>
                            <td><input type="text" name="adresse" class="form-control"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="telephone">Telephone: </label></td>
                            <td><input type="text" name="telephone" class="form-control"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr><td></td>
                            <td style="text-align:center">
                            <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
                            </td>
                        </tr>
                    </div>
                    
                </table>
                    <div id="erreur"><?php  if (isset($erreur)){echo $erreur ;}?></div>
            </form>  
        </div>
    </div> 

</div>
             

    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
     
        

</body>
</html>

<?php    
}
?>