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
                    <li class="nav-item">
						<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link" href="input.php">Input</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Data</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="peramalan.php">Peramalan</a>
					</li>     
                </ul>
            </div>
		</div>
	</nav>

	<div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-7">
                <h2 class="text-center">Data Penjualan Sepeda Motor Kawasaki</h2>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
                <div class="col-md-10">
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:5%">No.</th>
                                <th style="width:20%">Tahun</th>
                                <th style="width:25%">Penjualan</th>
                                <th style="width:10%">X</th>
                                <th style="width:10%">Y</th>
                                <th style="width:15%">XX</th>
                                <th style="width:15%">XY</th>
                                <!-- <th colspan="2" style="width:15%">Option</th> -->
                            </tr>
                        </thead>
                            <?php
                            include "koneksi.php";
                            $query	    = mysqli_query($koneksi, "select * from penjualan");
                            $maxTahun   = mysqli_query($koneksi, "select max(tahun) as taun from penjualan");

                            $no = 0;
                            $x = -1;
                            $totalX = 0;
                            $totalY = 0;
                            $totalXX = 0;
                            $totalXY = 0;

                            while ($data = mysqli_fetch_array($query)) {

                                $no++;
                                $x++;
                                $tahun = $data['tahun'];
                                $jual = $data['jual'];
                                $xx = $x * $x;
                                $xy = $x * $jual;

                                $totalX = $totalX + $x;
                                $totalY = $totalY + $jual;
                                $totalXX = $totalXX + $xx;
                                $totalXY = $totalXY + $xy;
                            ?>

                        <tbody>
                            <tr>
                                <td><?=$no?>.</td>
                                <td>Tahun <?=$tahun?></td>
                                <td><?=$jual?> unit</td>
                                <td><?=$x?></td>
                                <td><?=$jual?></td>
                                <td><?=$xx?></td>
                                <td><?=$xy?></td>
                                <!-- <td><a href='update.php?Nama=".$data['id']."' class='btn btn-primary btn-sm'>Edit</a></td>
                                <td><a href='delete.php?Nama=".$data['id']."' class='btn btn-danger btn-sm'>Delete</a></td> -->
                            </tr>
                        </tbody>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="3">Jumlah</td>
                            <td><?=$totalX?></td>
                            <td><?=$totalY?></td>
                            <td><?=$totalXX?></td>
                            <td><?=$totalXY?></td>
                        </tr>
                        <tr>
                            <td colspan="3">Rata-rata</td>
                            <td><?=$totalX/$no?></td>
                            <td><?=$totalY/$no?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4 justify-content-center">
                <div class="col-md-8 text-center">
                    <?php
                    if(isset($_POST['btnPrediksi'])){
                        
                        $predVal = $_POST['prediksiValue'];

                        $b1 = ($totalXY - (($totalX * $totalY)/$no)) / ($totalXX - (($totalX * $totalX)/$no));
                        $b0 = ($totalY/$no) - $b1 * ($totalX/$no);
                        while ($nilai = mysqli_fetch_array($maxTahun)) {
                            $nilaiX = $predVal - $nilai['taun'] + $x;
                            //echo $nilai['taun'];
                        }
                        $y  = $b0 + $b1 * $nilaiX;
                        echo "<span class='h4'>Hasil</span><br><br>
                        <span>Beta 1 = $b1</span><br>
                        <span>Beta 0 = $b0</span><br>
                        <span>X = $nilaiX</span><br><br>
                        <span>Rumus Regresi Linear = Beta0 + Beta1 * X = $b0 + $b1 * $nilaiX</span><br><br>
                        <span class='h5'>Prediksi penjualan untuk tahun $predVal adalah sebanyak $y unit</span><br><br><br>
                        ";
                    }
                    ?>
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