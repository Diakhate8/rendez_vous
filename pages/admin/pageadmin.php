<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=RDV_HOPITAL','root','root') or die('error');

if(isset($_GET['id']) AND $_GET['id'] > 0){
    $getid = intval($_GET['id']);
    $req = $db->prepare("SELECT * FROM espace_membres WHERE id=?");
    $req->execute(array($getid));
    $userinfos = $req->fetch();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Page admin</title>
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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
            <a class="navbar-brand" href="#"><?php echo $userinfos['Pseudo'] ;?></a>
            </div>
           
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="ajoutservices.php">Ajouter service</a></li>
                    <li><a href="ajoutdomaines.php">Ajouter Domaine</a></li>
                    <li><a href="ajoutmedecins.php">Ajouter Medecins</a></li>
                    <li><a href="ajoutsecretaires.php">Ajouter secretaire</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php
                    if(isset($_SESSION['id']) AND $userinfos['Id'] == $_SESSION['id']){
                ?>
                   <li><a href="../../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <?php
                    }
                ?>
                </ul>    
            </div>
        </div>
    </nav>     
<div class="container">
    <div class="row">
        <div class="col-sm-4 bg-primary">
            <h1>Administrateur</h1><br>
            Identification = <?php echo $userinfos['Id'] ;?>
            <br><br>
            Pseudo  =<?php echo $userinfos['Pseudo'] ;?>
            <br><br>
            Mail  = <?php  echo $userinfos['Email'] ;?>
            <br><br>
            Statut  = <?php  echo $userinfos['Statut'] ;?>
            <br><br>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>    
</body>
</html>
<?php
}
?>
