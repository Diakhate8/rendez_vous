<?php
session_start();
require_once "../../../classes/connexionbd.php";require_once "../../../classes/tables.php";
    if(isset($_GET['id'])){
       $id=$_GET['id'] ; 
       $req=new Table();      
       
       $result = $req->delete('Patients','Id_Patient');          //contenue du variable matricule d'url affecter dans une nouvvel variable
       if($result){
       if(isset($_SESSION['id'])){
       header("location:../ajoutpatients.php?id=".$_SESSION['id']);}
    }else{echo "pas de session";}
    }

?>