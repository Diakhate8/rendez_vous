<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
$db = new Mabase();
$mdc = new Table();
if(isset($_SESSION['id'])){
    if (isset($_GET['id'])){
        $nbr=$_GET['id'];
    }
    
  //  echo $_SESSION['id'] .'<br>'.  $_SESSION['pseudo'] .'<br>'. $_SESSION['statut'].'<br>'.
  $nomtable = 'RDV';
  $champ = 'Id_Secretaire';
  $id =$nbr;/* $_SESSION['id']*/;
  $table=$mdc->select1($nomtable,$champ,$id);
  //die(var_dump($table));
?>
<!DOCTYPE html>
<html>
<head>
  <title>liste des Rendez-vous</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/liste.css">
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
            <a class="navbar-brand" href="#">Medecins</a>
            </div>
            <div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <li><a href="#section1">Section 1</a></li>
                <li><a href="#section2">Section 2</a></li>
                <li><a href="#section3">Section 3</a></li>
                </ul>
            </div>
            </div>
        </div>
    </nav>   
    <br><br><br>  
       
    <div class="container">      <!--Tableau d'affichage-->
    <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
    <br>
        <table class="table table-bordered table-striped">
            <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Date</th>
                        <th>Heur</th>
                        <th>Duree</th>
                        <th>Id Secretaire</th>
                        <th>Id Patient</th>
                        <th>Id Medecin</th>
			            <th>Actions  </th>
                    </tr>
            </thead>
            <tbody id="myTable">
            <?php foreach($table as $values){
                   // die(var_dump($values));}
            ?>
                    <tr> 	 	 	 	 	 	
                        <td> <?= $values['Id_RDV']; ?></td>
                        <td><?= $values['Date_RDV']; ?></td>
                        <td><?= $values['Heure_RDV']; ?></td>
                        <td><?= $values['Duree_RDV']; ?></td>
                        <td><?= $values['Id_Secretaire']; ?></td>
                        <td><?= $values['Id_Patient']; ?></td>
                        <td><?= $values['Id_Medecin']; ?></td>
                        <td><a href='modifemployer.php?ok=$tab[0]'class="btn btn-primary">
                        <i class="fas fa-edit"></i></a></a> &nbsp;
                            <a href='tsupemployer.php?ok=$tab[0]'class="btn btn-danger" onclick='return confirmation();'>
                            <i class="fas fa-trash-alt"></i></a>                   
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
            
                    
             
    <div>
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