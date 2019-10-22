<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=RDV_HOPITAL','root','root') or die('error');

if(isset($_GET['id']) AND $_GET['id'] > 0){
    $getid = intval($_GET['id']);
   
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
            <a class="navbar-brand" href="#"><?php echo $userinfos['Pseudo'] ;?></a>
            </div>
           
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <li><a href="ajoutpatients.php">Ajouter patient</a></li>
                <li><a href="listepatients.php">Liste patients</a></li>
                <li><a href="ajoutrdv.php">Ajouter rendez-vous</a></li>
                <li><a href="listerdv.php">Liste rendez-vous</a></li>  
                <li><a href="emploie.php">Planing Medecins</a></li>
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

</div>    
</body>
</html>
<?php
}
?>
