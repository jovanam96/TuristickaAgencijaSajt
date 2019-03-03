<?php

class Rezervacija{
  public $rezervacijaID;
  public $klijent;
  public $destinacija;
  public $datumOdr;
  public $datumDo;

  public function __construct ( $rezervacijaID, $klijent, $destinacija,$datumOd,$datumDo ) {
    $this->rezervacijaID = $rezervacijaID;
    $this->klijent = $klijent;  
    $this->destinacija = $destinacija;
    $this->datumOd = $datumOd;
    $this->datumDo = $datumDo;

  }

  public static function vratiSve($konekcija){

    $upit = "SELECT * FROM rezervacija r join destinacija d on r.destinacijaid = d.destinacijaid join klijent k on r.klijentid=k.klijentid";
    $rez = $konekcija->query($upit);
    $niz = [];

    while($r = $rez->fetch_assoc()){
        $klijent = new Klijent($r['klijentid'],$r['ime'],$r['prezime']);
        $destinacija = new Destinacija($r['destinacijaid'],$r['drzava'],$r['grad']);
        $rezervacija = new Rezervacija($r['rezervacijaid'],$klijent,$destinacija,$r['datumOd'],$r['datumDo']);
        array_push($niz,$rezervacija);
    }

    return $niz;

  }

  public function sacuvaj($konekcija){
    $upit ="INSERT INTO rezervacija VALUES (null, $this->klijent , $this->destinacija ,'$this->datumOd','$this->datumDo')";

    return $konekcija->query($upit);
  }

  public function izmeni($konekcija){
    $upit ="UPDATE rezervacija SET klijentid = $this->klijent , destinacijaid = $this->destinacija, datumOd = '$this->datumOd', datumDo = '$this->datumDo'  WHERE rezervacijaid = $this->rezervacijaID ";

    return $konekcija->query($upit);
  }
  public function obrisi($konekcija){
    $upit ="DELETE FROM rezervacija  WHERE rezervacijaID = $this->rezervacijaID ";

    return $konekcija->query($upit);
  }

}

 ?>
