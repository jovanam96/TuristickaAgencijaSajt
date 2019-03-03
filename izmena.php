

<?php
include 'rezervacija.php';
include 'klijent.php';
include 'destinacija.php';
include 'konekcija.php';

$uspesnoPoruka ='';
$rezervacijaid=0;


if(isset($_POST['izmena'])){
	$rezervacijaid=trim($_POST['id']);
	$klijent = trim($_POST['klijent']);
	$destinacija = trim($_POST['destinacija']);
	$datumOd = trim($_POST['datumOd']);
	$datumDo = trim($_POST['datumDo']);

	$rezervacija = new Rezervacija($rezervacijaid,$klijent,$destinacija,$datumOd,$datumDo);
	if($rezervacija->izmeni($konekcija)){
		$uspesnoPoruka = 'Uspesno izmenjeno';
	}else{
		$uspesnoPoruka = 'Neuspesno izmenjeno';
	}
}


$nizKlijenata = Klijent::vratiSve($konekcija);
$nizDestinacija = Destinacija::vratiSve($konekcija);
$nizRezervacija = Rezervacija::vratiSve($konekcija);
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
	
	   <style>
 
            table.gridtable {
                margin:0 auto;
                width:95%;
                overflow:auto;
                font-family: helvetica,arial,sans-serif;
                font-size:14px;
                color:#333333;
                border-width: 1px;
                border-color: #666666;
                border-collapse: collapse;
                text-align: center;
            } 
            table.gridtable th {
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #666666;
                background-color: #F6B4A5;
            }
            table.gridtable td {
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #666666;
            }
            tr:hover {background-color: #D8DA5C}
        </style>
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
				<li><a href="unos.php">Unos</a></li>
				<li class="active"><a href="izmena.php">Izmena</a></li>
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
						<h2>Izmena rezervacije</h2>
						<br>
						<form action="" method="post">
							
                                <table class="gridtable" id="tableMain">

                                    <th> Klijent </th>
                                    <th> Destinacija </th>
                                    <th> Datum od</th>
                                    <th> Datum do</th>
									<th></th>
									<?php foreach($nizRezervacija as $r) {                                   
                                    $id=$r->rezervacijaID; ?>
                                        <tr> 
                                            <td><?php echo $r->klijent->ime.(" ").$r->klijent->prezime ?> </td>
                                            <td><?php echo $r->destinacija->drzava.(", ").$r->destinacija->grad ?></td>
                                            <td><?php echo $r->datumOd ?></td>
                                            <td><?php echo $r->datumDo ?></td>
                                            <td>
                                                <input type="hidden" name="id" value="<?php echo $id ?>" /><input type="button" value="Promeni"  class=" form-control" onclick="ShowDiv()">
                                            </td>                                           
                                    </tr>
										<?php } ?>
                                </table>

								<div id="izmena" style="display:none;" class="answer_list">
									<br>
									
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

									
							<input type="submit" value="Promeni rezervaciju" name="izmena" class="btn-dark form-control">

						
						<div id="rezultat">
								<?php echo $uspesnoPoruka; ?>
						</div>
							</div>
								
							<hr>
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br><br>
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
	<script>
		
		function ShowDiv() {
    document.getElementById("izmena").style.display = "block";

		}
		


	</script>
	
    </body>
</html>
