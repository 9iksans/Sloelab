
<?php

$koneksi = mysqli_connect("localhost", "root", "");
mysqli_select_db($koneksi, "sloelab");
?>
<!doctype html>

<html lang="en">
<link type="text/css" rel="stylesheet" href="stye1.css">
<link type="text/css" rel="stylesheet" href="stye12.css">
<link type="text/css" rel="stylesheet" href="stye.css">
<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					
		

					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">PANEL ADMIN SLOELAB</h3>
							<p class="panel-subtitle">Smart Lock EEPIS Laboratory</p>
						</div>
								<div class="panel-body">
									<?php 

					 $query = mysqli_query($koneksi, "SELECT * FROM kelas") or die(mysql_error());
					 $data = mysqli_fetch_assoc($query);
						if($data['pir']==0 && $data['status'] == 0 ) {
   							
							echo '<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><p>Notification</p></h3>
									<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Warning, Laboratory HI-202 has been empty, please press  lock for securing Laboratory!
									</div>
												</div>
											</div>';
										}
						//} 
					?>
									<table class="table table-striped" style="">
										<thead>
											<tr>
												<th>No.</th>
     											 <th>Ruangan Kelas</th>
											     <th>Status kelas</th>
											     <th>Action Kelas</th>
											</tr>
											</thead>

								 <?php 

							  
							    $query = mysqli_query($koneksi, "SELECT * FROM kelas") or die(mysql_error());
							    
							    if(mysqli_num_rows($query)==0 ){
							    echo '<tr><td colspan="11">Tidak ada data!</td></tr>';
							    }else{
							      $no = 1;
							      while($data = mysqli_fetch_assoc($query)){
							        
							        echo '<tr>';

							          echo '<td>'.$no.'</td>';  
							          echo '<td>'.$data['ruangan'].'</td>'; 
							         	if($data['status'] == 1){
							          echo '<td><span class="label label-danger">LOCKED</span></td>'; 
							           echo '<td><p><a href="dinamis/updating.php?id='.$data['id'].'"><class="btn btn-default" style=" padding: 10px;"><i class="fa fa-unlock" ></i> Unlock </a>'; 
							          }else{
							          	echo '<td><span class="label label-success">UNLOCKED</span></td>';
							          	 echo '<td><p><a href="dinamis/updating.php?id='.$data['id'].'"><class="btn btn-default" style=" padding: 10px;"><i class="fa fa-lock" ></i> Lock </a>'; 
							          				}
							         
							          			

							  
							       

							       
							        $no++;  
							      }
							      
							    }
							    ?>
								</table>

						<!--
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number">1,252</span>
											<span class="title">Downloads</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class= 	"metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">203</span>
											<span class="title">Sales</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">274,678</span>
											<span class="title">Visits</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">35%</span>
											<span class="title">Conversions</span>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<div id="headline-chart" class="ct-chart"></div>
								</div>
								<div class="col-md-3">
									<div class="weekly-summary text-right">
										<span class="number">2,315</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
										<span class="info-label">Total Sales</span>
									</div>
									<div class="weekly-summary text-right">
										<span class="number">$5,758</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
										<span class="info-label">Monthly Income</span>
									</div>
									<div class="weekly-summary text-right">
										<span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
										<span class="info-label">Total Income</span>
									</div>
								</div>-->
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<!-- TASKS -->
					
					<		 
								
							
							<!-- END TASKS -->
					
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	</script>
</div>
</div>
</body>

</html>
