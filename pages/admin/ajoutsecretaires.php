<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
$db = new Mabase();
if(isset($_SESSION['id'])){
$select=new Table();
$Nomtable='Services';
$table = $select->select($Nomtable);
$select1=new Table();
$Nomtable1='Secretaires';
$table1 = $select1->select($Nomtable1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inscriptionsecretaires</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="../css/secretaire.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!--barnav-->
    <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197" >
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="pageadmin.php?id=<?=$_SESSION['id']?>">HOME</a>
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
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 col-md-6 col-lg-9 ">
        <h1><span class="acceuil">Formulaire D'inscription Des Secretaires</span></h1> 
        <table>
            <tr> <th>#ID</th><th>Prenom Secretaire</th><th>Nom Secretaire</th>
            <th>Datedenaiss</th><th>Adresse</th><th>Telephone</th>
            <th>Email  Secretaire</th><th>Id Service</th><th>Actions</th><tr>
            <?php  foreach($table1 as $value1){ //die(var_dump($post)); ?>
            <tr> 	
                <td> <?= $value1[0]; ?></td> <td><?= $value1[1]; ?></td>
                <td><?= $value1[2]; ?></td>  <td><?= $value1[3]; ?></td>
                <td> <?= $value1[4]; ?></td> <td><?= $value1[5]; ?></td>
                <td><?= $value1[7]; ?></td>  <td><?= $value1[10]; ?></td>
                <td><a href='modifemployer.php?id=<?= $value1[0]; ?>'class="btn btn-primary"><i class="fas fa-edit"></i></a></a> &nbsp; 
                <a href='tsupemployer.php?id=<?= $value1[0]; ?>'class="btn btn-danger" onclick='return confirmation();'> <i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php } ?>
        </table>
        
    </div> 
    <div class="col-sm-6 col-md-6 col-lg-3 ">    
      <form method="POST"  action="">
          <table class="table-center">
                <tr><th colspan="2"><legend>Inscription</legend></th></tr>
                
                <div class="form-group">
                    <tr>
                        <td><label for="prenom">Prenom: </label></td>
                        <td><input type="text" name="prenom" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="nom">Nom: </label></td>
                        <td><input type="text" name="nom" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="datenaiss">Date de naissance: </label></td>
                        <td><input type="date" name="datenaiss" class="form-control"></td>
                    </tr>
                </div>
                
                <div class="form-group">
                    <tr>
                        <td><label for="adresse">Adresse: </label></td>
                        <td><input type="text" name="adresse" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="telephone">Telephone: </label></td>
                        <td><input type="text" name="telephone" class="form-control"></td>
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
                        <td><label for="idservice">Id Service: </label></td>
                        <td>
                            <select name="idservice" class="form-control">
                        <?php  foreach ($table as $value){
                    //die(var_dump($post));
                        ?>
                            <option value="<?= $value[0] ;?>"><?= $value[1] ;?>  </option>
                        <?php } ?>
                            </select>
                        </td>
                    </tr>
                </div>
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
</body>
</html>
<?php
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
//insertion de donneess
$db = new Mabase();
$Ins = new Table ;
$Nomtable = 'Secretaires';

if(isset($_POST['enregistrer'])){

    if( !empty($_POST['prenom']) AND !empty($_POST['nom'])AND !empty($_POST['datenaiss'])
        AND !empty($_POST['adresse']) AND !empty($_POST['telephone']) 
        AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])
        AND !empty($_POST['idservice'])){

        $prenom = trim(htmlspecialchars($_POST['prenom'])); 
        $nom = trim(htmlspecialchars($_POST['nom']));  
        $datenaiss = trim($_POST['datenaiss']);
        $adresse = trim(htmlspecialchars($_POST['prenom'])); 
        $telephone  = trim(htmlspecialchars($_POST['telephone']));  
        $email = trim(htmlspecialchars($_POST['email']));  
        $email2 = trim(htmlspecialchars($_POST['email2']));
        $idservice = trim(htmlspecialchars($_POST['idservice']));  
        $mdp = sha1($_POST['mdp']) ;
        $mdp2 = sha1($_POST['mdp2']) ;
        
        if(preg_match('#^(78||77||76||70)[0-9]{7}$#',$telephone)){
            $donnes = ['Prenom_Secretaire'=>$prenom,'Nom_Secretaire'=>$nom,
            'Datedenaiss_Secretaire'=>$datenaiss,
            'Adresse_Secretaire'=>$adresse,'Telephone_Secretaire'=>$telephone ,
            'Id_Service'=> $idservice,'Email_Secretaire'=>$email,
            'Email2_Secretaire'=>$email2,'Mdp_Secretaire'=>$mdp,'Mdp2_Secretaire'=>$mdp2];
            $req = $Ins->insert($Nomtable,$donnes);
        }else{$erreur="Entrez un numero valide"; }

    }else{$erreur = "Veuillez saisire toutes les champs";   }
            
} 
?>

<?php    
}
?>