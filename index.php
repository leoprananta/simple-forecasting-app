<!DOCTYPE html>
<html>
<head>
	<title>Data Mining</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-info">
		<div class="container">
			<a class="navbar-brand mr-5" href="#">Forecasting App</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          		<span class="navbar-toggler-icon"></span>
        	</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="input.php">Input</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="data.php">Data</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="peramalan.php">Peramalan</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row mt-5 justify-content-center">
            <div class="col-md-7 text-center">
				<h2 class="text-center display-3">Aplikasi Forecasting</h2><br>
				<h5 class="text-center">Anggota Kelompok</h5><br>
				<h5 class="text-center">1.</h5>
				<h5 class="text-center">2.</h5>
				<h5 class="text-center">3.</h5>
				<h5 class="text-center">4.</h5>
				<h5 class="text-center">5.</h5>
				
            </div>
        </div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="datatables/jquery.dataTables.min.js"></script>
	<script src="datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#tabel1').DataTable()
		})
	</script>
</body>
</html>