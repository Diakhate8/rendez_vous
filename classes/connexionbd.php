<?php
class Mabase{
    protected function connect(){
        //connection a la bd
        try {            
            $conn = new PDO("mysql:host=localhost;dbname=RDV_HOPITAL",'root','root');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        return $conn;
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }

        }

}



?>