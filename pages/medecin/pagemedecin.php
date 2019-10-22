<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=RDV_HOPITAL','root','root') or die('error');

if(isset($_GET['id']) AND $_GET['id'] > 0){
    $getid = intval($_GET['id']);
    $req = $db->prepare("SELECT * FROM Medecins WHERE Id_Medecin=?");
    $req->execute(array($getid));
    $userinfos = $req->fetch();
    if(isset($_SESSION['id']) AND $userinfos[0]  == $_SESSION['id']){
?>
<!DOCTYPE html>
<html>
<head>
  <title>Page des medecins</title>
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
                <a class="navbar-brand" href="#"><?php echo $userinfos['Prenom_Medecin']  ;?></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="listerdv.php?id=<?=$userinfos['Id_Medecin'] ;?>">Liste rendez-vous</a></li>
                        <li><a href="emploie.php">Emploie du temps</a></li>                   
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                
                    <li><a href="../../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    
                    </ul>    
                </div>
            </div>
        </nav>
            <!--Contenu de la page-->
<div class="container">
    <div class="row">
        <div class="col-sm-8">     
            <h1>Profil</h1>
            #ID = <?php echo $userinfos['Id_Medecin'] ;?>
            <br>
            Nom = <?php echo $userinfos['Nom_Medecin'] ;?>
            <br>
            Prenom = <?php echo $userinfos['Prenom_Medecin'] ;?>
            <br>
            E Mail = <?php  echo $userinfos['Email_Medecin'] ;?>
            <br>
            Numero Service = <?php  echo $userinfos['Id_Service'] ;?>    
            <br>
            Numero Domaine = <?php  echo $userinfos['Id_Domaine'] ;?>    
 
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>    
</body>
</html>
<?php }
}
?>
