<?php
include 'klijent.php';
include 'destinacija.php';
include 'rezervacija.php';
include 'konekcija.php';

$uspesnoPoruka ='';
$nizKlijenata = Klijent::vratiSve($konekcija);
$nizDestinacija = Destinacija::vratiSve($konekcija);

if(isset($_POST['unesi'])){
	$klijent = trim($_POST['klijent']);
	$destinacija = trim($_POST['destinacija']);
	$datumOd = trim($_POST['datumOd'] );
    $datumDo = trim($_POST['datumDo']);

	$rezervacija = new Rezervacija(null,$klijent,$destinacija,$datumOd, $datumDo);
	if($rezervacija->sacuvaj($konekcija)){
		$uspesnoPoruka = 'Uspesno sacuvano';
	}else{
		$uspesnoPoruka = 'Neuspesno sacuvano';
	}
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Turisticka agencija</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

</head>
<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<header class="header-section">
		<div class="header-warp">
			<a href="index.php" class="site-logo">
				<img src="img/travel-logo.jpg" href = "index.php" alt="" class="header_logo">
			</a>

			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>

			<ul class="main-menu">
				<li><a href="pretraga.php">Pretraga</a></li>
				<li><a href="sortiranje.php">Sortiranje</a></li>
				<li class="active"><a href="unos.php">Unos</a></li>
				<li><a href="izmena.php">Izmena</a></li>
				<li><a href="brisanje.php">Brisanje</a></li>
			</ul>
		</div>
	</header>

	<section class="intro-section spad ">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="intro-content">
						<h2>Unos rezervacije</h2>

						<form action="" method="POST">

							<label for="klijent">Klijent </label>
							<select id="klijent" name="klijent" class="form-control" >

								<?php
										foreach($nizKlijenata as $klijent){
											?>
											<option value="<?php echo $klijent->klijentID ?>"><?php echo $klijent->ime.(" ").$klijent->prezime ?></option>
											<?php
										}

								 ?>

							</select>

							<label for="destinacija">Destinacija</label>
							<select id="destinacija" name="destinacija" class="form-control" >

								<?php
										foreach($nizDestinacija as $destinacija){
											?>
											<option value="<?php echo $destinacija->destinacijaID ?>"><?php echo $destinacija->drzava.(", ").$destinacija->grad ?></option>
											<?php
										}

								 ?>

							</select>

                            
                            <label for="datumOd">Datum od </label>
							<input type="date" name="datumOd" class="form-control">
                            
                            <label for="datumDo">Datum do </label>
							<input type="date" name="datumDo" class="form-control">

							<hr>
							<input type="submit" value="Unesi rezervaciju" name="unesi" class="btn-dark form-control">

						</form>


						<div id="rezultat">
								<?php echo $uspesnoPoruka; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div>
	
	<footer class="footer-section set-bg">
			<p class="text-right">
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by Jovana Mitrovic
			</p>
	</footer>
</div>


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

    </body>
</html>
