<?php session_start();

include 'config/connexion.php';
include 'model/Events.php';
isset($_REQUEST['controller'])? $controller=$_REQUEST['controller']:$controller=null;
isset($_REQUEST['action'])? $action=$_REQUEST['action']:$action=null;
isset($_REQUEST['page'])? $page=$_REQUEST['page']:$page=null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="text" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="style/images/favicon.png">
    <title>Brailie</title>
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/css/plugins.css">
    <link rel="stylesheet" type="text/css" href="style/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="style/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="style/revolution/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="style/revolution/revolution-addons/filmstrip/css/revolution.addon.filmstrip.css">
    <link rel="stylesheet" type="text/css" href="style/revolution/revolution-addons/typewriter/css/typewriter.css">
    <link rel="stylesheet" type="text/css" href="style/type/icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style/css/color/aqua.css">
    <link rel="stylesheet" type="text/css" href="style/css/font/font6.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Condensed:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body class="onepage" data-spy="scroll" data-target=".navbar">
<div class="content-wrapper">
    <nav class="navbar transparent absolute nav-wrapper-dark inverse-text navbar-expand-lg text-uppercase">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand"><a href="index.html"><img src="#" srcset="style/images/logo-light.png 1x, style/images/logo-light@2x.png 2x" alt="" /></a></div>
                <div class="navbar-hamburger ml-auto d-lg-none d-xl-none"><button class="hamburger animate" data-toggle="collapse" data-target=".navbar-collapse"><span></span></button></div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link scroll" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link scroll" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link scroll" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link scroll" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link scroll" href="#contact">Contact</a></li>
                </ul>
                <div class="navbar-divider"></div>
            </div>
        </div>
    </nav>



    <?php
    switch($page){
        case 'contact':
            include 'view/page/contact.php';
            break;

        case 'inscription':
            if(isset($_REQUEST['action']))
            {
                include 'controller/client_controller.php';
            }
            include 'view/page/inscription.php';
            break;

        case 'reclamation':
            //die;

            isset($_REQUEST['nom'])? $nom=$_REQUEST['nom']:$nom=null;
            isset($_REQUEST['email'])? $email=$_REQUEST['email']:$email=null;
            isset($_REQUEST['phone'])? $phone=$_REQUEST['phone']:$phone=null;
            isset($_REQUEST['subject'])? $subject=$_REQUEST['subject']:$subject=null;
            isset($_REQUEST['desc'])? $desc=$_REQUEST['desc']:$desc=null;


            $R = new Reclamation($nom,$email, $phone, $subject,$desc);
            include 'view/produit/accueil.php';
            break;

        case 'apropos':
            include 'view/page/apropos.php';
            break;

        case 'panier':
            include 'view/page/panier.php';
            break;

        case 'profil':
            include 'controller/commande_controller.php';
            include 'view/page/profil.php';
            break;

        case 'produit':
            isset($_REQUEST['categorie_id'])? $categorie_id=$_REQUEST['categorie_id']:$categorie_id=null;
            isset($_REQUEST['titre'])? $titre=$_REQUEST['titre']:$titre=null;

            $p = new produit($categorie_id,'', $titre, '', '');
            include 'view/page/produit.php';
            break;

        case 'add_panier':
            isset($_REQUEST['produit_id'])? $produit_id=$_REQUEST['produit_id']:$produit_id=null;
            isset($_REQUEST['categorie_id'])? $categorie_id=$_REQUEST['categorie_id']:$categorie_id=null;
            $p = new produit($categorie_id,$produit_id, '', '', '');
            $produit=$p->view($cnx);
            $panier = $_SESSION['panier'];
            $panier[$produit_id] = $produit;
            $panier[$produit_id]['qte'] = 1;
            $_SESSION['panier'] = $panier;
            echo "<script>window.location.href='accueil.php?page=produit&categorie_id=".$categorie_id."';</script>";
            break;

        default:


            isset($_REQUEST['categorie_id'])? $categorie_id=$_REQUEST['categorie_id']:$categorie_id=null;
            isset($_REQUEST['titre'])? $titre=$_REQUEST['titre']:$titre=null;
            $p = new Event($categorie_id,'', $titre, '', '');
            include 'view/produit/accueil.php';
            break;
    }
    ?>



</div>
<script src="style/js/jquery.min.js"></script>
<script src="style/js/popper.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
<script src="style/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="style/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="style/revolution/revolution-addons/filmstrip/js/revolution.addon.filmstrip.min.js"></script>
<script src="style/revolution/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="style/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="style/js/plugins.js"></script>
<script src="style/js/scripts.js"></script>
<script>
    $.backstretch([
        "style/images/art/bg22.jpg"
    ], {duration: 5000, fade: 1000});
</script>
</body>
</html>