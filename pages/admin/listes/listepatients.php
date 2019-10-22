<?php
require_once "../../../classes/connexionbd.php";require_once "../../../classes/tables.php";
$db = new Mabase();
$mdc = new Table ;
$Nomtable = 'Patients';
$tabres = $mdc->select($Nomtable);
//die(var_dump($tabres));
?>
<!DOCTYPE html>
<html>
<head>
  <title>liste des Patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="cssA/table.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class=".col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h1>Liste des Patients</h1>
            <input class="form-control"  id="myInput" type="text" placeholder="Search.."></div>
            <br><br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
			            <th>Actions </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach ($tabres as $values){
                    //die(var_dump($post));
                    ?>
                    <tr>
                        <td><?= $values['Id_Patient']; ?></td>
                        <td><?= $values['Prenom_Patient']; ?></td>
                        <td><?= $values['Nom_Patient']; ?></td>
                        <td><?= $values['Datedenaiss_Patient']; ?></td>
                        <td><?= $values['Adresse_Patient']; ?></td>
                        <td><?= $values['Telephone_Patient']; ?></td>
                        
 			<td><a href='modifemployer.php?ok=$tab[0]'class="btn btn-primary">
             <i class="fas fa-edit"></i></a></a> &nbsp;
                            <a href='tsupemployer.php?ok=$tab[0]'class="btn btn-danger" onclick='return confirmation();'>
                            <i class="fas fa-trash-alt"></i></a>                   
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>      
</body>
</html>
