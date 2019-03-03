<?php

class Destinacija{
  public $destinacijaID;
  public $drzava;
  public $grad;

  public function __construct ( $destinacijaID, $drzava,$grad ) {
    $this->destinacijaID = $destinacijaID;
    $this->drzava = $drzava;
    $this->grad = $grad;
  }

  public static function vratiSve($konekcija){

    $upit = "SELECT * FROM destinacija";
    $rez = $konekcija->query($upit);
    $nizDestinacija = [];

    while($r = $rez->fetch_assoc()){
        $destinacija = new Destinacija($r['destinacijaid'],$r['drzava'],$r['grad']);
        array_push($nizDestinacija,$destinacija);
    }

    return $nizDestinacija;

  }
}

 ?>
