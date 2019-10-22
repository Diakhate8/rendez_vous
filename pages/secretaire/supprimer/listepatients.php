<?php
session_start();
require_once "../../classes/connexionbd.php";require_once "../../classes/tables.php";
//$db = new Mabase();
if(isset($_SESSION['id']) AND isset($_GET['id']) AND $_SESSION['id'] == $_GET['id']){
    $idS=$_GET['id'];
   //echo $_SESSION['id'] .'<br>'.  $_SESSION['pseudo'] .'<br>'. $_SESSION['statut'].'<br>';
    $mdc = new Table() ;
    $Nomtable='Patient';
    $champ = 'Id_Secretaire';
    $id = $idS; 
    $table=$mdc->select1($Nomtable,$champ,$id);
?>
<!DOCTYPE html>
<html>
<head>
  <title>liste des patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../table.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php foreach ($table as $values){
                    die(var_dump($values));}
                   ?>
    <!--barnav-->
    Vous etes connecter
             

    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
     
        

</body>
</html>

<?php
}else{header('location:../../index.php');}
?>