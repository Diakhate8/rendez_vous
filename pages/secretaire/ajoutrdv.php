<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
if(isset($_SESSION['id'])){
$select=new Table();
$Nomtable='RDV';
$table = $select->select($Nomtable);

$Secretaires='Secretaires';
$tabs= $select->select($Secretaires);

$Medecins='Medecins';
$tabm = $select->select($Medecins);

$Patients='Patients';
$tabp = $select->select($Patients);

if(isset($_POST['enregistrer'])){

    if( !empty($_POST['date']) AND !empty($_POST['heure'])AND !empty($_POST['duree'])
        AND !empty($_POST['idsecretaire']) AND !empty($_POST['idpatient']) 
        AND !empty($_POST['idmedecin'])){

        $date = trim(htmlspecialchars($_POST['date'])); 
        $heure = trim(htmlspecialchars($_POST['heure']));  
        $duree = trim(htmlspecialchars($_POST['duree']));
        $idsecretaire = trim(htmlspecialchars($_POST['idsecretaire'])); 
        $idpatient = trim(htmlspecialchars($_POST['idpatient']));
        $idmedecin  = trim(htmlspecialchars($_POST['idmedecin']));   
 	 	 
            $donnes = ['Date_RDV'=>$date,'Heure_RDV'=>$heure,
            'Duree_RDV'=>$duree,'Id_Secretaire'=>$idsecretaire,
            'Id_Patient'=>$idpatient, 'Id_Medecin'=>$idmedecin ];
            $req = $select->insert($Nomtable,$donnes);
        
    }else{$erreur = "Veuillez saisire toutes les champs";   }            
} 
?>
<!DOCTYPE html>
<html>
<head>
  <title>ajout rendez-vous</title>
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
            <a class="navbar-brand" href="#">Secretaire</a>
            </div>
            
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
               
                   <li><a href="../../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                
                </ul> 
            </div>
            
        </div>
    </nav>   
    <br><br><br>  
    
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-8 col-lg-9 "> <h1>Liste de rendez-vous</h1>           
            <div>     <!--Tableau d'affichage-->
                <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
            <br>
            <table class="table table_responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#ID RDV</th>
                        <th>Date RDV</th>
                        <th>Heure RDV</th>
                        <th>Duree_RDV</th>
                        <th>Id Secretaire</th>
                        <th>Id Patient</th>
                        <th>Id_Medecin</th>
			            <th>Actions  </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                <?php foreach($table as $value1){;?>  
                    <tr> 	 	 	 	 
                        <td><?=$value1['Id_RDV'];?></td>
                        <td><?=$value1['Date_RDV'];?></td>
                        <td><?=$value1['Heure_RDV'];?></td>
                        <td><?=$value1['Duree_RDV'];?></td>
                        <td><?=$value1['Id_Secretaire'];?></td>
                        <td><?=$value1['Id_Patient'];?></td>
                        <td><?=$value1['Id_Medecin'];?></td>
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
                            <td><label for="date">Date: </label></td>
                            <td><input type="date" name="date" class="form-control"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="heure">Heure: </label></td>
                            <td><input type="time" min="07:00" max="13:00" name="heure" class="form-control"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="duree">Duree: </label></td>
                            <td><input type="time" max="00-15" name="duree" class="form-control"></td>
                        </tr>
                    </div>
                    
                    <div class="form-group">
                    <tr>
                        <td><label for="idsecretaire">Secretaire: </label></td>
                        <td>
                            <select name="idsecretaire" class="form-control">
                        <?php  foreach ($tabs as $secretaires){
                    //die(var_dump($post));
                        ?>
                            <option value="<?= $secretaires[0] ;?>"><?= $secretaires[1] ;?>  </option>
                        <?php } ?>
                            </select>
                        </td>
                    <div class="form-group">
                    <tr>
                        <td><label for="idpatient">Patient: </label></td>
                        <td>
                            <select name="idpatient" class="form-control">
                        <?php  foreach ($tabp as $patients){
                    //die(var_dump($post));
                        ?>
                            <option value="<?= $patients[0] ;?>"><?= $patients[1] ;?>  </option>
                        <?php } ?>
                            </select>
                        </td>
                    <div class="form-group">
                    <tr>
                        <td><label for="idmedecin">Medecin: </label></td>
                        <td>
                            <select name="idmedecin" class="form-control">
                        <?php  foreach ($tabm as $medecins){
                    //die(var_dump($post));
                        ?>
                            <option value="<?= $medecins[0] ;?>"><?= $medecins[1] ;?>  </option>
                        <?php } ?>
                            </select>
                    </td>
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