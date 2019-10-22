<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
$select=new Table();
$Ins = new Table ;
if(isset($_SESSION['id'])){    
$Nomtable='Medecins';
$table1 = $select->select($Nomtable);
$tableservice= ' Services';
$service = $select->select($tableservice);
$tabledomaine= 'Domaines';
$domaine = $select->select($tabledomaine);

//insertion de donneess
if(isset($_POST['enregistrer'])){

    if( !empty($_POST['prenom']) AND !empty($_POST['nom'])AND !empty($_POST['datenaiss'])
        AND !empty($_POST['adresse']) AND !empty($_POST['telephone']) 
        AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])
        AND !empty($_POST['iddomaine']) AND !empty($_POST['idservice'])){

        $prenom = trim(htmlspecialchars($_POST['prenom'])); 
        $nom = trim(htmlspecialchars($_POST['nom']));  
        $datenaiss = trim($_POST['datenaiss']);
        $adresse = trim(htmlspecialchars($_POST['adresse'])); 
        $telephone  = trim(htmlspecialchars($_POST['telephone']));  
        $email = trim(htmlspecialchars($_POST['email']));  
        $email2 = trim(htmlspecialchars($_POST['email2']));
        $iddomaine = trim(htmlspecialchars($_POST['iddomaine']));
        $idservice = trim(htmlspecialchars($_POST['idservice']));  
        $mdp = sha1($_POST['mdp']) ;
        $mdp2 = sha1($_POST['mdp2']) ;
        
        if(preg_match('#^(78||77||76||70)[0-9]{7}$#',$telephone)){
            $donnes = ['Prenom_Medecin'=>$prenom,'Nom_Medecin'=>$nom,
            'Datedenaiss_Medecin'=>$datenaiss,
            'Adresse_Medecin'=>$adresse,'Telephone_Medecin'=>$telephone ,
            'Id_Domaine'=> $iddomaine ,'Id_Service'=> $idservice,'Email_Medecin'=>$email,
            'Email2_Medecin'=>$email2,'Mdp_Medecin'=>$mdp,'Mdp2_Medecin'=>$mdp2];
            $req = $Ins->insert($Nomtable,$donnes);
            header('refraiche: 0');
        }else{$erreur="Entrez un numero valide"; }
    }else{$erreur = "Veuillez saisire toutes les champs";   } 
             
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inscriptionservices</title>
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
<body data-spy="scroll" data-target=".navbar" data-offset="50"id="body">

    <!--barnav-->
    <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
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
                   <li><a href="../../deconnexion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                </ul>    
            </div>
        </div>
    </nav>  
<div class="container-fluid" >
  <div class="row">
    <div class="col-sm-6 col-md-6 col-lg-9  ">
        <h1><span class="acceuil">Page D'inscription Des Medecins</span></h1> 
        <table id="table">
            <tr> <th>#ID &nbsp;</th><th>Prenom &nbsp;</th><th>Nom &nbsp; </th><th>DatedeNaiss &nbsp;</th> <th>Adresse&nbsp;</th><th>Telephone &nbsp;</th><th>Email</th><th>Domaines&nbsp;</th><th>Services&nbsp;</th><th>Actions&nbsp;</th><tr>
            <?php  foreach($table1 as $value1){ //die(var_dump($post)); ?>
            <tr> 	
                <td> <?= $value1['Id_Medecin']; ?></td><td><?= $value1['Prenom_Medecin']; ?><td><?= $value1['Nom_Medecin']; ?></td>
                <td><?= $value1['Datedenaiss_Medecin']; ?></td><td><?= $value1['Adresse_Medecin']; ?>
                </td><td><?= $value1['Telephone_Medecin']; ?></td><td><?= $value1['Email_Medecin']; ?>
                </td><td><?= $value1['Id_Domaine']; ?></td></td><td><?= $value1['Id_Service']; ?></td>
                <td><a href='modifemployer.php?id=<?= $value1['Id_Medecin']; ?>'class="btn btn-primary"><i class="fas fa-edit"></i></a>
                </a> &nbsp; <a href='tsupemployer.php?id=<?= $value1[0]; ?>'class="btn btn-danger" onclick='return confirmation();'> <i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php } ?>
        </table>    
    </div> 

    <div class="col-sm-6 col-md-6 col-lg-3">    
    <form method="POST"  action="">
    <table>
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
                        <td><input type="password" name="mdp" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="mdp2">Confirmer MDP: </label></td>
                        <td><input type="password" name="mdp2" class="form-control"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="iddomaine">Domaine: </label></td>
                        <td>
                            <select name="iddomaine" class="form-control">
                        <?php  foreach ($domaine as $domaines){
                    //die(var_dump($post));
                        ?>
                            <option value="<?= $domaines[0] ;?>"><?= $domaines[1] ;?>  </option>
                        <?php } ?>
                            </select>
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="idservice">Service: </label></td>
                        <td>
                            <select name="idservice" class="form-control">
                        <?php  foreach ($service as $services){
                    //die(var_dump($post));
                        ?>
                            <option value="<?= $services[0] ;?>"><?= $services[1] ;?>  </option>
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
}
?>