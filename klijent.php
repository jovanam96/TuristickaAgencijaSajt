<?php

class Klijent{
  public $klijentID;
  public $ime;
  public $prezime;

  public function __construct ( $klijentID, $ime,$prezime ) {
    $this->klijentID = $klijentID;
    $this->ime = $ime;
    $this->prezime = $prezime;
  }

  public static function vratiSve($konekcija){

    $upit = "SELECT * FROM klijent";
    $rez = $konekcija->query($upit);
    $nizKlijenata = [];

    while($r = $rez->fetch_assoc()){
        $klijent = new Klijent($r['klijentid'],$r['ime'],$r['prezime']);
        array_push($nizKlijenata,$klijent);
    }

    return $nizKlijenata;

  }
}
 ?>
