<?php

class Event
{
    var $produit_id;
    var $titre;
    var $prix;
    var $image;
    var $categorie_id;

    function __construct($categorie_id,$produit_id,$titre, $prix, $image)
    {
        $this->produit_id = $produit_id;
        $this->titre = $titre;
        $this->prix = $prix;
        $this->image = $image;
        $this->categorie_id = $categorie_id;
    }

    function add($cnx)
    {
        $sql = "insert into Events(categorie_id,titre,prix,image) values('$this->categorie_id','$this->titre','$this->prix','$this->image')";
        $cnx->query($sql);
    }

    function edit($cnx)
    {
        $sql = "update Events set titre='$this->titre',prix='$this->prix',image='$this->image',categorie_id='$this->categorie_id' where produit_id='$this->produit_id'";
        $cnx->query($sql);
    }

    function index($cnx)
    {
        $sql = "select p.*, c.libelle from Events p, categories c where p.categorie_id = c.categorie_id";

        if(!empty($this->categorie_id))
            $sql.=" and p.categorie_id = '".$this->categorie_id."'";

        if(!empty($this->titre))
            $sql.=" and p.titre like '%".$this->titre."%'";

        $req = $cnx->query($sql);
        $Events = array();
        while ($res = $req->fetch()) {
            $Events[$res['produit_id']]['produit_id'] = $res['produit_id'];

            $Events[$res['produit_id']]['prix'] = $res['prix'];
            $Events[$res['produit_id']]['image'] = $res['image'];
            $Events[$res['produit_id']]['categorie_id'] = $res['categorie_id'];
            $Events[$res['produit_id']]['categorie'] = $res['libelle'];
            $Events[$res['produit_id']]['titre'] = $res['titre'];
        }
        return $Events;
    }

    function view($cnx)
    {
        $sql = "select * from Events where produit_id='$this->produit_id'";
        $req = $cnx->query($sql);
        $Events = $req->fetch();
        return $Events;

    }

    function delete($cnx)
    {
        $sql = "delete from Events where produit_id='$this->produit_id'";
        $cnx->query($sql);
    }

}

?>

