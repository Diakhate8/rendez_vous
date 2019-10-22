<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
//$db = new Mabase();
if(isset($_SESSION['id']) AND isset($_GET['id']) AND $_SESSION['id'] == $_GET['id']){
    $idS=intval($_GET['id']);
   //echo $_SESSION['id'] .'<br>'.  $_SESSION['pseudo'] .'<br>'. $_SESSION['statut'].'<br>';
    $mdc = new Table() ;
    $table='RDV';
    $champ='Id_Medecin';
    $id=$idS;
    $rdv=$mdc->select1($table,$champ,$id);   
?>
<!DOCTYPE html>
<html>
<head>
  <title>liste des patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../table.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--navbar-->
    <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
            <div class="container-fluid">
                <div class="navbar-header">
                    
                <a class="navbar-brand" href="?pagemedecin?id=<?=$userinfos['Id_Medecin'] ;?>">Home</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar"> 
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    </ul>    
                </div>
            </div>
        </nav>
        <!--contenue de la page-->
        <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
        <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#Id_RDV</th>
                        <th>Date_RDV</th>
                        <th>Heure_RDV </th>
                        <th>Duree_RDV</th>
                        <th>Id_Secretaire</th>
                        <th>Id_Patient</th>
                        <th>Id_Medecin</th>
                        <th>Actions  </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach ($rdv as $rdvs){
                    //die(var_dump($post));
                    ?>  	 		 	 	 	 
                    <tr>
                        <td><?= $rdvs['Id_RDV']; ?></td>
                        <td><?= $rdvs['Date_RDV']; ?></td>
                        <td><?= $rdvs['Heure_RDV']; ?></td>
                        <td><?= $rdvs['Duree_RDV']; ?></td>
                        <td><?= $rdvs['Id_Secretaire']; ?></td>
                        <td><?= $rdvs['Id_Patient']; ?></td>
                        <td><?= $rdvs['Id_Medecin']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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
}else{header('location:../../index.php');}
?>