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
				<li class="active"><a href="sortiranje.php">Sortiranje</a></li>
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
						<h2>Sortiranje</h2>
                        <br>
						<select id="sortiranje" class="form-control" onchange="sortiraj(this.value)">
							<option value="asc">Rastuce</option>
							<option value="desc">Opadajuce</option>
						</select>
						<hr>
						<div id="rezultat">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<div>
	<footer class="footer-section set-bg" >
			<p class="text-right">
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by Jovana Mitrovic
	</footer>
</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

	<script>
			function sortiraj(sort){
					$.ajax({
						url: 'sortiranjePodaci.php',
						data: {sort : sort},
						success: function(data){
							$("#rezultat").html(data);
						}
					})
			}

			sortiraj('asc');
	</script>

    </body>
</html>
