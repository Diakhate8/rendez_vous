<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=RDV_HOPITAL','root','root') or die('error');

if(isset($_SESSION['id'])){
?>

<!DOCTYPE html>
<html>
<head>
  <title>emploie du temps medecins</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    body {
        position: relative; 
    }
    ul,li{
        margin-left:30px;
    }
    
    .affix {
        top:0;
        width: 100%;
        z-index: 9999 !important;
    }
    .navbar {
        margin-bottom: 0px;
    }

    .affix ~ .container-fluid {
    position: relative;
    top: 50px;
    }
    #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
    #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
    #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
    #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
    #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>
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
            <a class="navbar-brand" href="#">Medecins</a>
            </div>
            <div>
            <div class="collapse navbar-collapse" id="myNavbar">
             <!--   <ul class="nav navbar-nav">
                <li><a href="#section1">Section 1</a></li>
                <li><a href="#section2">Section 2</a></li>
                <li><a href="#section3">Section 3</a></li>
                </ul>-->
            </div>
            </div>
        </div>
    </nav>   
    <br><br><br>  
    <h1>Emploie du temps medecins</h1>
         <div>      <!--Tableau d'affichage-->
    <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
        <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Id Domaine</th>
                        <th>Id service</th>
			<th>Actions  </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                   
                    <tr>
                        <td>d_Medecin</td>
                        <td>Prenom_Medecin</td>
                        <td>Nom_Medecin</td>
                        <td>Datedenaiss_Medecin</td>
                        <td>Adresse_Medecin</td>
                        <td>Telephone_Medecin</td>
                        <td>d_Domaine</td>
                        <td>d_Service</td>
 			<td><a href='modifemployer.php?ok=$tab[0]'>
                           <button class="btn btn-warning">Modifer</a> &nbsp;
                            <a href='tsupemployer.php?ok=$tab[0]' onclick='return confirmation();'>
                          <button class="btn btn-danger ">Supprimer</a>                   
                        </td>
                    </tr>
                  
                </tbody>
            </table>
             

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
}
?>