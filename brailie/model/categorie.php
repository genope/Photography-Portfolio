<?php

class categorie
{
    var $categorie_id;
    var $libelle;

    function __construct($categorie_id, $libelle)
    {
        $this->categorie_id = $categorie_id;
        $this->libelle = $libelle;
    }

    function add($cnx)
    {
        $sql = "insert into categories(libelle) values('$this->libelle')";
        $cnx->query($sql);
    }

    function edit($cnx)
    {
        $sql = "update categories set libelle='$this->libelle' where categorie_id='$this->categorie_id'";
        $cnx->query($sql);
    }

    function index($cnx)
    {
        $sql = "select * from categories";
        $req = $cnx->query($sql);
        $categoriess = array();
        while ($res = $req->fetch()) {
            $categoriess[$res['categorie_id']]['libelle'] = $res['libelle'];
            $categoriess[$res['categorie_id']]['categorie_id'] = $res['categorie_id'];
        }
        return $categoriess;
    }

    function view($cnx)
    {
        $sql = "select * from categories where categorie_id='$this->categorie_id'";
        $req = $cnx->query($sql);
        $categories = $req->fetch();
        return $categories;

    }

    function delete($cnx)
    {
        $sql = "delete from categories where categorie_id='$this->categorie_id'";
        $cnx->query($sql);
    }

} // fin class

?>

