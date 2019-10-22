<?php
class Table extends Mabase{

    //insertion de donnees dans un table
    public function insert($table,$valeurs){

        $cle = implode(', ',array_keys($valeurs));       
        $valeur = implode(', :', array_keys($valeurs));
        $sql = "INSERT INTO $table($cle) VALUES(:".$valeur.")";
        $req = $this->connect()->prepare($sql);

        foreach($valeurs as $key=>$valeur){
            $req->bindvalue(':'.$key,$valeur);
        }
        $resultat = $req->execute();
        return $resultat;
    }
    //suppression de donnees
    public function delete($Nomtable,$nomid){
        $sql =" DELETE FROM $Nomtable WHERE $nomid = 2";
        
        $result = $this->connect()->query($sql);
        return $result;
    }

    //select all data from the database
    public function select($table){
        $sql ="SELECT * FROM $table " ;

        $result = $this->connect()->query($sql);

        if($result->rowCount() > 0){

            while($row = $result->fetch()){

                $data[] = $row ;
            }
        }
        return $data ;
    }
    //select one data from the database
    public function select1($table,$champ,$id){
        $sql ="SELECT * FROM $table WHERE $champ=$id" ;

        $result = $this->connect()->query($sql);

        if($result->rowCount() > 0){

            while($row = $result->fetch()){

                $data[] = $row ;
            }
        }
        return $data ;
    }
    //select 2 controle
    public function select2($nomtable,$email_con,$mdp_con){
        
        $req = "SELECT * FROM $nomtable WHERE Email = $email_con AND Mdp = $mdp_con";

        $result = $this->connect()->query($req);

        if($result->rowCount() > o){

            while($row = $result->fetch()){

                $data[] = $row ;
            }
        }
        return $data ;
    }
    //jointure inner join
     public function jointN($table1,$table2,$champ){ 
        $sql = "SELECT * FROM $table1
        INNER JOIN $table2
        ON $table1.$champ = $table2.$champ";

        $result = $this->connect()->query($sql);
    
        if($result->rowcount() > 0){
            
            while($row = $result->fetch()){
                $data[] = $row;
            }
            return $data;
        }
    }
    public function jointure1($table1,$table2,$champ,$valeur){
        $sql ="SELECT * FROM $table1,$table2
        WHERE $table1.$champ = $table2.$champ
        AND $table1=$valeur" ;

        $result = $this->connect()->query($sql);

        if($result->rowCount() > 0){

            while($row = $result->fetch()){

                $data[] = $row ;
            }
        }
        return $data ;
    }
    //select one data from the database
    public function selectJ($table1,$table2,$champ,$id){
        $sql ="SELECT * FROM $table1,$table2 WHERE $table1.$champ=$id ORDER BY $table1 " ;

        $result = $this->connect()->query($sql);

        if($result->rowCount() > 0){

            while($row = $result->fetch()){

                $data[] = $row ;
            }
        }
        return $data ;
    }

















}
?>
