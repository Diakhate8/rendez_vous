<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=RDV_HOPITAL','root','root') or die('error');
if(isset($_POST['connecter'])){
    $email_con = trim(htmlspecialchars($_POST['email_con'])); 
    $mdp_con = trim(sha1($_POST['mdp_con'])) ;
    $statut =  trim(htmlspecialchars($_POST['statut'])); 
    if(!empty($email_con) AND !empty($mdp_con) AND !empty($statut)){
        //echo $email_con ; 
        if(filter_var($email_con,FILTER_VALIDATE_EMAIL)){
                   // die(var_dump($_SESSION['mail'])); 
                   //admin
            if($statut=="admin"){
                $req = $db->prepare("SELECT * FROM espace_membres WHERE Email = ? AND Mdp = ?");
                $req->execute(array($email_con, $mdp_con));
                $userexist = $req->rowCount();
            
                if($userexist == 1){
                    $userinfos = $req->fetch();
                    $_SESSION['id'] = $userinfos['Id'] ;
                    $_SESSION['pseudo'] = $userinfos['Pseudo'] ;
                    $_SESSION['mail'] = $userinfos['Email'] ;
                    $_SESSION['statut']=$userinfos['Statut'];
                    // die(var_dump($userinfos['Statut']));
                    header("location: pages/admin/pageadmin.php?id=".$_SESSION['id']);
                } 
                }else{ $erreur = "Mauvaise mail ou mdp" ;}
                
                    //Medecins
            if($statut=="medecin"){
                $req = $db->prepare("SELECT * FROM Medecins WHERE Email_Medecin = ? AND Mdp_Medecin = ?");
                $req->execute(array($email_con, $mdp_con));
                $userexist = $req->rowCount();
            
                if($userexist == 1){
                    $userinfos = $req->fetch();
                    $_SESSION['id'] = $userinfos['Id_Medecin'] ;
                    $_SESSION['pseudo'] = $userinfos['Nom_Medecin'] ;
                    $_SESSION['mail'] = $userinfos['Email_Medecin'] ;
                    $_SESSION['id_service']=$userinfos['Id_Service'];
                    $_SESSION['adresse']=$userinfos['Adresse_Medecin'];
                    // die(var_dump($userinfos['Statut']));
                    header("location: pages/medecin/pagemedecin.php?id=".$_SESSION['id']);
                }      
            }else{ $erreur = "Mauvaise mail ou mdp" ;}
                    //Secretaires
            if($statut=="secretaire"){	 	
                $req = $db->prepare("SELECT * FROM Secretaires WHERE Email_Secretaire = ? AND Mdp_Secretaire = ?");
                $req->execute(array($email_con, $mdp_con));
                $userexist = $req->rowCount();
                	               	 	 
                if($userexist == 1){ 
                    $userinfos = $req->fetch();
                    $_SESSION['statut']=$userinfos['statut'];
                    $_SESSION['id'] = $userinfos['Id_Secretaire'] ;
                    $_SESSION['pseudo'] = $userinfos['Nom_Secretaire'] ;
                    $_SESSION['mail'] = $userinfos['Email_Secretaire'] ;
                    $_SESSION['id_service']=$userinfos['Id_Service'];
                    $_SESSION['adresse']=$userinfos['Adresse_Secretaire'];
                    
                    // die(var_dump($userinfos['Statut']));
                    header("location: pages/secretaire/pagesecretaire.php?id=".$_SESSION['id']);
                }      
            }else{ $erreur = "Mauvaise mail ou mdp" ;}

        }else{  $erreur = "Format email non valide";   }
       
    }else{ $erreur = "Tous les champs doivent etre remplis" ;}

}
?>
<!doctype html>
<html>
<title>liste des medecins</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/connexion.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="jquery/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script> <script src="https://use.fontawesome.com/5c8bafeeb1.js"></script>   
</head>
<body>
<div class="container ">
    <div class="row"> 
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
            <h1><span class="acceuil">Acceuil</span></h1> 
        </div> 
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 left">
        </div> 
        <div class="col-sm-4 col-md-8 col-lg-4 col-xl-6 right">
            <form method="POST"  action="" class="box">

                <h1>Login</h1>   
                        <label for="email_con">email</label>
                    <input type="email" name="email_con"  placeholder="exemple@gmail.com" >
                    <label for="mdp_con">password</label>
                    <input type="password" name="mdp_con" placeholder="mot de passe" >
                    <label for="statut">statut</label>
                    <select name="statut" ><option>admin</option><option>secretaire</option><option>medecin</option>
                    </select>
                    <input type="submit" name="connecter">
                    <div id="erreur"> <?php  if (isset($erreur)){echo $erreur ;}?>  </div>
            </form>
        </div>     
    </div> 
</div>       
</body>
</html>                         
