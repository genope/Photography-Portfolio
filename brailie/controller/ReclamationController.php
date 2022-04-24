<?php

include 'model/Reclamation.php';
include 'model/categorie.php';



isset($_REQUEST['nom'])? $nom=$_REQUEST['nom']:$nom=null;

isset($_REQUEST['email'])? $email=$_REQUEST['email']:$email=null;

isset($_REQUEST['phone'])? $phone=$_REQUEST['phone']:$phone=null;

isset($_REQUEST['subject'])? $subject=$_REQUEST['subject']:$subject=null;
isset($_REQUEST['desc'])? $desc=$_REQUEST['desc']:$desc=null;


$p=new Reclamation($nom, $email, $phone, $subject,$desc);


switch($action){
    case 'add':
        if(isset($_REQUEST['add']))
        {
            $p->add($cnx);
            echo "<script>window.location.href='index.php?controller=Reclamation&page=reclamation';</script>";
        }
        include 'brailie/view/produit/accueil.php';
        break;

}
?>


