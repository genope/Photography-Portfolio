<?php
try{
    $host="mysql:host=localhost;dbname=photography";
    $user="root";
    $password="";
    $cnx=new PDO ($host,$user,$password);
}

catch(Exception $e){
    die ("Imposible de se connecter à MySQL: ". $e->getMessage());
}