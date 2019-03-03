<?php
include 'destinacija.php';
include 'konekcija.php';
$nizDestinacija = Destinacija::vratiSve($konekcija);
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
				<li class="active"><a href="pretraga.php">Pretraga</a></li>
				<li><a href="sortiranje.php">Sortiranje</a></li>
				<li><a href="unos.php">Unos</a></li>
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
						<br>
						<h4>Izaberite grad po kome pretrazujete</h4>
						<br>

						<select id="grad" name="grad" class="form-control" onchange="pretrazi(this.value)" >
                            <?php
                                foreach($nizDestinacija as $destinacija){
                                    ?>
                                <option value="<?php echo $destinacija->grad ?>"><?php echo $destinacija->grad ?></option>
									<?php
                                }   
							
								 ?>
							</select>
						<br>
						<h3> Rezervacije</h3>
						<hr>
						<div id="rezultat">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div>
	<br><br><br><br>
	<footer class="footer-section set-bg" >
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

	<script>
			function pretrazi(grad){
					$.ajax({
						url: 'pretragaPoDestinaciji.php',
						data: {grad : grad},
						success: function(data){
							$("#rezultat").html(data);
						}
					})
			}

			pretrazi('Berlin');
	</script>

    </body>
</html>