<?php

include 'model/Event.php';

isset($_REQUEST['produit_id'])? $produit_id=$_REQUEST['produit_id']:$produit_id=null;

isset($_REQUEST['titre'])? $titre=$_REQUEST['titre']:$titre=null;

isset($_REQUEST['prix'])? $prix=$_REQUEST['prix']:$prix=null;

isset($_REQUEST['image'])? $image=$_REQUEST['image']:$image=null;

isset($_REQUEST['categorie_id'])? $categorie_id=$_REQUEST['categorie_id']:$categorie_id=null;


$p=new Event($categorie_id,$produit_id, $titre, $prix, $image);
$c=new categorie('', '');

switch($action){
    case 'add':
        $categories = $c->index($cnx);
        if(isset($_REQUEST['ad+-*8d']))
        {
            $p->add($cnx);
            echo "<script>window.location.href='admin.php?controller=produit&action=index';</script>";
        }
        include 'brailie/view/produit/add.php';
        break;
    case  'edit':
        $categories = $c->index($cnx);
        if(isset($_REQUEST['edit']))
        {
            $p->edit($cnx);
           echo "<script>window.location.href='admin.php?controller=produit&action=index';</script>";
        }
        $Event=$p->view($cnx);
        include 'brailie/index.php';
        break;
    case  'index':
        $Event=$p->index($cnx);
        include 'brailie/view/produit/accueil.php';
        break;
    case  'delete':
        $p->delete($cnx);

        echo "<script>window.location.href='admin.php?controller=produit&action=index';</script>";

        break;
}
?>


