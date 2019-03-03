<?php
include 'klijent.php';
include 'destinacija.php';
include 'rezervacija.php';
include 'konekcija.php';

$sort = $_GET['sort'];

$upit = "SELECT k.ime,k.prezime,d.drzava,d.grad FROM rezervacija r join klijent k on r.klijentid = k.klijentid join destinacija d on r.destinacijaid = d.destinacijaid order by k.prezime $sort";

$rez = $konekcija->query($upit);
?>
<table class="table">
  <thead>
    <tr>
      <th>Klijent</th>
      <th>Destinacija</th>
    </tr>
  </thead>
  <tbody>


    <?php

    while($r = $rez->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $r['prezime'].(" ").$r['ime'] ?></td>
        <td><?php echo $r['drzava'].(", ").$r['grad'] ?></td>
      </tr>
      <?php
    }
     ?>

  </tbody>
</table>
<br><br>