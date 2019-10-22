<?php
require_once "../../../classes/connexionbd.php";require_once "../../../classes/tables.php";
$db = new Mabase();
$mdc = new Table ;
$Nomtable = 'espace_membres';
$tabres = $mdc->select($Nomtable);
//die(var_dump($tabres));
?>
<!DOCTYPE html>
<html>
<head>
  <title>liste des medecins</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="cssA/table.css">
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
            <a class="navbar-brand" href="#">Admin</a>
            </div>
            <div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <li><a href="#section1">Section 1</a></li>
                <li><a href="#section2">Section 2</a></li>
                <li><a href="#section3">Section 3</a></li>
                </ul>
            </div>
            </div>
        </div>
    </nav>   
    <br><br><br>  
  <div class="containe">   
  <!--Tableau d'affichage-->
    <input class="form-control" id="myInput" type="text" placeholder="Search.."></div>
        <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>confirmation Email</th>
                        <th>Passeword</th>
                        <th>confirmation Passeword</th>
                        <th>Statut</th>
                        <th>Actions  </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach ($tabres as $values){
                    //die(var_dump($post));
                    ?>
                    <tr>
                        <td><?= $values['Id']; ?></td>
                        <td><?= $values['Pseudo']; ?></td>
                        <td><?= $values['Email']; ?></td>
                        <td><?= $values['Email2']; ?></td>
                        <td><?= $values['Mdp']; ?></td>
                        <td><?= $values['Mdp2']; ?></td>
                        <td><?= $values['Statut']; ?></td>
 			            <td><a href='modifemployer.php?id=$values[0]'class="btn btn-primary">
                         <i class="fas fa-edit"></i></a></a> &nbsp;&nbsp;&nbsp;
                            <a href='tsupemployer.php?id=$values[0]'class="btn btn-danger" onclick='return confirmation();'>
                            <i class="fas fa-trash-alt"></i></a>                   
                        </td>
                    </tr>
                    <?php } ?>
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
     
        
</div>
</body>
</html>
