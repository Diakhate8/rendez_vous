<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
$db = new Table();
if(isset($_GET['id']) AND $_GET['id'] > 0){
    $getid = intval($_GET['id']);
    $table = 'Secretaires';
    $champ = 'Id_Secretaire';
    $id = $getid;
    $userinfos = $db->select1($table,$champ,$id);
    foreach($userinfos as $key=>$userinfos){
        
?>

<!DOCTYPE html>
<html>
<head>
  <title>Page secretaire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="pages.css">
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
            <a class="navbar-brand" href="#"><?php echo $userinfos['Nom_Secretaire'] ;?></a>
            </div>
           
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <li><a href="listepatientsavecrdv.php?id=<?=$getid;?>">Patients avec RDV</a></li>
                <li><a href="ajoutpatients.php?id=<?=$getid;?>">Ajouter patient</a></li>
                <li><a href="listepatients.php?id=<?=$getid;?>">Liste patients</a></li>
                <li><a href="ajoutrdv.php?id=<?=$getid;?>">Ajouter rendez-vous</a></li>
                <li><a href="listerdv.php?id=<?=$getid;?>">Liste rendez-vous</a></li>  
                <li><a href="emploie.php?id=<?=$getid;?>">Planing Medecins</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php
                    if(isset($_SESSION['id']) AND $userinfos['Id_Secretaire'] == $_SESSION['id']){
                ?>
                   <li><a href="../../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <?php
                    }
                ?>
                </ul>    
            </div>
        </div>
    </nav>     

<div class="container ">
    <div class="row">
        <div class="col-sm-4 bg-primary">
            <h1>profil</h1>
            Matricule = <?php echo $userinfos['Id_Secretaire'] ;?>
            <br><br>
            Pseudo= <?php echo $userinfos['Nom_Secretaire'] ;?><br><br>
            Email = <?php  echo $userinfos['Email_Secretaire'] ;?>
            <br><br>
            Numero service = <?php  echo $userinfos['Id_Service'] ;?><br><br>
                   
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>    
</body>
</html>
<?php
}}
?>
