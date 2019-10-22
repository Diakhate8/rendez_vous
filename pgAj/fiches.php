<?php
/**session_start();
$db=new PDO('mysql:host=localhost;dbname=RDV_HOPITAL','root','root') or die('error');

if(isset($_GET['id']) AND $_GET['id'] > 0){
    $getid = intval($_GET['id']);
    $req = $db->prepare("SELECT * FROM espace_membres WHERE id=?");
    $req->execute(array($getid));
    $userinfos = $req->fetch();
    */
?>

<!DOCTYPE html>
<html>
<head>
  <title>Page admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../pages/pages.css">
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
            <a class="navbar-brand" href="#">Fichier</a>
            </div>
           
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <li><a href="listes/listeservices.php">Liste services</a></li>
                <li><a href="listes/listedomaines.php">Liste Domaines</a></li>
                <li><a href="listes/listemedecins.php">Liste Medecins</a></li>
                <li><a href="listes/listesecretaires.php">Liste secretaires</a></li>
                <li><a href="listes/listerendezvous.php">Liste rendez-vous</a></li>
                <li><a href="listes/listepatients.php">Liste patients</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                 <li><a href="../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                </ul>    
            </div>
        </div>
    </nav>     
<div class="container">
    <h1>PAGE D'ACCEUIL D'AFFICHAGE DES FICHIERS  
</div>    
</body>
</html>
<?php
//}
?>