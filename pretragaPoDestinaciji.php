<?php
include 'destinacija.php';
include 'klijent.php';
include 'rezervacija.php';
include 'konekcija.php';

$grad = $_GET['grad'];

$upit = "SELECT * FROM rezervacija r join klijent k on r.klijentid = k.klijentid join destinacija d on r.destinacijaid=d.destinacijaid WHERE d.grad='$grad'";

$rez = $konekcija->query($upit);

?>
<table class="table">
  <thead>
    <tr>
      <th>Klijent</th>
      <th>Grad</th>
    </tr>
  </thead>
  <tbody>


    <?php

    while($r = $rez->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $r['ime'].(" ").$r['prezime'] ?></td>
        <td><?php echo $r['grad'] ?></td>
      
      </tr>


      <?php
    }
     ?>

  </tbody>
</table>
