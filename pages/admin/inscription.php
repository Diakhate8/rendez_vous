<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
$db = new Mabase();

if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Page user Inscription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/inscription.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
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
            <a class="navbar-brand" href="#">menu</a>
            </div>
           
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
               <!-- <li><a href="pages/admin1.php">Page Admin</a></li>-->
                 </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php
                   // if(isset($_SESSION['id']) AND $userinfos['Id'] == $_SESSION['id']){
                ?>
                   <li><a href="../../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <?php
                  //  }
                ?>
                </ul>    
            </div>
        </div>
    </nav>  
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6 bg-warning ">
        <h1><span class="acceuil">Formulaire D'Inscription espace membres</span></h1> 
    </div> 
    <div class="col-sm-6 col-md-6 col-lg-6 bg-danger">    
      <form method="POST"  action="">
          <table class="table-center">
                <tr><th colspan="2"><legend>Inscription</legend></th></tr>
                
                <div class="form-group">
                    <tr>
                        <td><label for="pseudo">Pseudo: </label></td>
                        <td><input type="text" name="pseudo"class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="email">Email: </label></td>
                        <td><input type="text" name="email" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="email2">confirmer Email: </label></td>
                        <td><input type="text" name="email2" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="mdp">Mot de passe: </label></td>
                        <td><input type="text" name="mdp" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="mdp2">Confirmer Mot de passe: </label></td>
                        <td><input type="text" name="mdp2" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="statut">Statut: </label></td>
                        <td><input type="text" name="statut" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr><td></td>
                        <td style="text-align:center">
                        <button type="submit" name="inscrire" class="btn btn-primary">Inscription</button>
                        </td>
                    </tr>
                </div>
                
        </table>
              <div id="erreur"><?php  if (isset($erreur)){echo $erreur ;}?></div>
      </form>  
    </div>
  </div>  
</div>
</body>
</html>
<?php
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
$db = new Mabase();
$Ins = new Table ;
$Nomtable = 'espace_membres';
if(isset($_POST['inscrire'])){
  $pseudo = trim(htmlspecialchars($_POST['pseudo'])); 
  $email = trim(htmlspecialchars($_POST['email']));  
  $email2 = trim(htmlspecialchars($_POST['email2']));  
  $mdp = sha1($_POST['mdp']) ;
  $mdp2 = sha1($_POST['mdp2']) ;
  $statut = trim(htmlspecialchars($_POST['statut'])); 
  if(!empty($pseudo) AND !empty($email) AND !empty($email2) AND !empty($mdp) AND !empty($mdp2) AND !empty($statut)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
      if($email == $email2){
        if($mdp == $mdp2){
        // echo $mdp;
        $donnes = ['Pseudo'=>$pseudo,'Email'=>$email,'Email2'=>$email2,'Mdp'=>$mdp,'Mdp2'=>$mdp2 ,'Statut'=> $statut];
        $req = $Ins->insert($Nomtable,$donnes);
        }else{ $erreur = "Les mots de passe ne sont pa identiques" ;}
      }else{ $erreur = "Les emails de passe ne sont pa identiques" ;}
    }else{  $erreur = "Format email invalide";  }  
  }else{ $erreur = "Tous les champs doivent etre remplis" ;}  
}
?>

<?php    
}
?>