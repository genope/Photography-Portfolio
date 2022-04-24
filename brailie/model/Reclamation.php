<?php

class Reclamation
{
    var $reclamation_id;
    var $nom;
    var $email;
    var $phone;
    var $subject;
    var $desc;

    function __construct( $nom,$email,$phone,$subject,$desc)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->desc = $desc;
    }

    function add($cnx)
    {
        $sql = "insert into reclamation (nom,mail,phone,subject,desc) values('$this->nom','$this->email','$this->phone','$this->subject','$this->desc')";
        $cnx->query($sql);
    }



} // fin class

?>

