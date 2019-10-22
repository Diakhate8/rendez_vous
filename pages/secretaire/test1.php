<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
$db = new Mabase();
if(isset($_SESSION['id'])){
  //  echo $_SESSION['id'] .'<br>'.  $_SESSION['pseudo'] .'<br>'. $_SESSION['statut'].'<br>'.
        $mdc = new Table() ;
        $table1='Patients';$table2='RDV';
        $champ='Id_Patient';
        $table=$mdc->jointN($table1,$table2,$champ)  ;
?>
<!DOCTYPE html>
<html>
<head>
  <title>emploie du temps medecins</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../table.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
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
            <a class="navbar-brand" href="#">Patients-RDV</a>
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
    <h1>Liste des Patients ayant un RDV</h1>
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6 bg-warning ">
        <h1><span class="acceuil">Formulaire D'inscription Des Secretaires</span></h1> 
    </div> 
    <div class="col-sm-6 col-md-6 col-lg-6 bg-danger">    
      <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
        <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id_Patient</th> 
                        <th>Prenom_Patient</th>
                        <th>Nom_Patient</th>
                        <th>Datedenaiss_Patient</th>
                        <th>Adresse_Patient</th>
                        <th>Telephone_Patient</th>
                        <th>Id_RDV</th>
                        <th>Date_RDV</th>
                        <th>Heure_RDV</th>
                        <th>Duree_RDV</th>
                        <th>Id_Secretaire</th>
                        <th>Id_Medecin</th> 
			            <th>Actions </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach ($table as $values){
                   // die(var_dump($values));}
                   ?>
                   
                     <tr>
                        <td><?=$values["Id_Patient"]?></td> 
                        <td><?=$values["Prenom_Patient"]?></td>
                        <td><?=$values["Nom_Patient"]?></td>
                        <td><?=$values["Datedenaiss_Patient"]?></td>
                        <td><?=$values["Adresse_Patient"]?></td>
                        <td><?=$values["Telephone_Patient"]?></td>
                        <td><?=$values["Id_RDV"]?></td>
                        <td><?=$values["Date_RDV"]?></td>
                        <td><?=$values["Heure_RDV"]?></td>
                        <td><?=$values["Duree_RDV"]?></td>
                        <td><?=$values["Id_Secretaire"]?></td>
                        <td><?=$values["Id_Medecin"]?></td> 
 			            <td><a href='modifemployer.php?ok=$tab[0]'>
                           <button class="btn btn-warning">Modifer</a> &nbsp;
                            <a href='tsupemployer.php?ok=$tab[0]' onclick='return confirmation();'>
                           <button class="btn btn-danger ">Supprimer</a>                   
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
              <div id="erreur"><?php  if (isset($erreur)){echo $erreur ;}?></div>
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
    
    </div>
  </div>  
</div>
</body>
</html>


<?php
}
?>