<!DOCTYPE HTML>
<html>
	<head>
		<title>Laporan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="/ui/images/logo2.png">
		
		<link href="/ui/css/bootstrap.min.css" rel="stylesheet">
		<link href="/ui/css/fiddle.css" rel="stylesheet">
		<script src="/ui/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
	</head>
	<body>
		
	<nav class="navbar navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <img class="navbar-brand" src="/ui/images/logo2.png" width="60" height="60" class="img-thumbnail"/>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="/type/index">AKUN</a></li>
      <li><a href="/cabang/index">CABANG</a></li>
      <li><a href="/welcome/index">JURNAL</a></li>
      <li><a href="/biodata/index">BIODATA</a></li>
      <li><a href="/jabatan/index">JABATAN</a></li>
      <li><a href="/departement/index">DEPARTEMENT</a></li>
      <li><a href="/absensi/index">ABSENSI</a></li>
      <!--li><a href="/agama/index">AGAMA</a></li-->
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div><!-- /.navbar-collapse -->
</nav>
			
		<form action="<?php echo $link ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
		
		<div class="container">	
			 <div class="blog-header">
		        <h1 class="blog-title">Laporan</h1>
		        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		     </div>
		    </br>
		
		<table class="table table-bordered">
		<div class="col-md-12">	
        <p>
		 	<div class="form-group">
		    <label for="inputPassword3" class="col-sm-5 control-label"></label>
		    <div class="col-sm-2">
		 	<?php
		 	if(isset($blncari))
			{
				echo '<span class="field">';
				echo '<select name="blncari" class="form-control input-sm">';
				echo '<option value="">-- Pilih Bulan --</option>';
				echo '<option value="01" >'.'Januari'.'</option>';
				echo '<option value="02" >'.'February'.'</option>';
				echo '<option value="03" >'.'Maret'.'</option>';
				echo '<option value="04" >'.'April'.'</option>';
				echo '<option value="05" >'.'Mei'.'</option>';
				echo '<option value="06" >'.'Juni'.'</option>';
				echo '<option value="07" >'.'Juli'.'</option>';
				echo '<option value="08" >'.'Agustus'.'</option>';
				echo '<option value="09" >'.'September'.'</option>';
				echo '<option value="10" >'.'Oktober'.'</option>';
				echo '<option value="11" >'.'November'.'</option>';
				echo '<option value="12" >'.'Desember'.'</option>';
				echo '</select>';
				echo '</span>';
			}
			else
			{
				echo '<span class="field">';
				echo '<option value="01" selected>'.'Januari'.'</option>';
				echo '<option value="02" selected>'.'February'.'</option>';
				echo '<option value="03" selected>'.'Maret'.'</option>';
				echo '<option value="04" selected>'.'April'.'</option>';
				echo '<option value="05" selected>'.'Mei'.'</option>';
				echo '<option value="06" selected>'.'Juni'.'</option>';
				echo '<option value="07" selected>'.'Juli'.'</option>';
				echo '<option value="08" selected>'.'Agustus'.'</option>';
				echo '<option value="09" selected>'.'September'.'</option>';
				echo '<option value="10" selected>'.'Oktober'.'</option>';
				echo '<option value="11" selected>'.'November'.'</option>';
				echo '<option value="12" selected>'.'Desember'.'</option>';
				echo '</select>';
				echo '</span>';
			}
			?>
			</div>
			</div>
		</p>
		
		<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-5 control-label"></label>
		    <div class="col-sm-2">
			<?php
			echo '<span class="field">';
			echo '<select name="thncari" class="form-control input-sm">';
			echo '<option value="">-- Pilih Tahun --</option>';
			for($y=2013;$y<2018;$y++)
			{
				if(trim($thncari) == trim($y))
					echo '<option value="'.$y.'">'.$y.'</option>';
				else
					echo '<option value="'.$y.'">'.$y.'</option>';
			}
			echo '</select>';
			echo '</span>';
			?>
			</div>
			</div>
		</p>
		
    	<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-5 control-label"></label>
		    <div class="col-sm-2">
			<input type="submit" name="save" value="Search" class="btn btn-primary" />
			</div>
			</div>
	    </p>
	
       <thead>		
			<tr>
				<th><center><b>WAKTU</b></center></th>
				<th><center><b>NO BUKTI</b></center></th>
				<th><center><b>KODE</b></center></th>
				<th><center><b>TYPE AKUN</b></center></th>
				<th><center><b>AKUN</b></center></th>
				<th><center><b>DEBIT</b></center></th>
				<th><center><b>KREDIT</b></center></th>
				<th><center><b>KETERANGAN</b></center></th>
				<th><center><b>CABANG</b></center></th>
			</tr>
	  </thead>
			
			<?php
			$m = new MongoClient();
			$db = $m->karyawan;	
			$mm = $db->cabang;
			$vv = $db->type;
			
			foreach ($data as $dat) 
			{
				/*for($y=1;$y<32;$y++)
				{
					echo $y.'</br>';	
				}
				break;*/
				
				echo '<tr>';		
				echo '<td>'.'<center>'.date('d/M/Y',$dat['tanggal']).', ';
				echo date('h:i:s A',$dat['jam']).'</center>'.'</td>';
				echo '<td>'.'<center>'.$dat['nomor_bukti'].'</center>'.'</td>';
				if(isset($dat['type']))
				{
					$ak = $vv->findOne(array('_id'=> new MongoId($dat['type'])));
					echo '<td>'.'<center>'.$ak['kode'].'</center>'.'</td>'; //manggil data base type
				}else{
					echo '<td></td>';
				}
				
				if(isset($dat['type']))
				{
					$ak = $vv->findOne(array('_id'=> new MongoId($dat['type'])));
					echo '<td>'.'<center>'.$ak['type'].'</center>'.'</td>'; //manggil data base type
				}else{
					echo '<td></td>';
				}
				
				if(isset($dat['type']))
				{
					$ak = $vv->findOne(array('_id'=> new MongoId($dat['type'])));
					echo '<td>'.'<center>'.$ak['nama'].'</center>'.'</td>'; //manggil data base type
				}else{
					echo '<td></td>';
				}
				
				echo '<td>'.'<center>'.'Rp.'.$dat['debit'].'</center>'.'</td>';
				echo '<td>'.'<center>'.'Rp.'.$dat['kredit'].'</center>'.'</td>';
				echo '<td>'.'<center>'.$dat['keterangan'].'</center>'.'</td>';
				//echo '<td>'.'<center>'.$dat['nilai'].'</center>'.'</td>';
				if(isset($dat['cabang']))
				{
					$bb = $mm->findOne(array('_id'=> new MongoId($dat['cabang'])));
					echo '<td>'.'<center>'.$bb['name'].'</center>'.'</td>'; //manggil data base cabang
				}else{
					echo '<td></td>';
				}
				echo '</tr>';
			}
			?>
			</div>
		</table>
		<?php
			$deb = 0;
			$kre = 0;
			
			foreach($data as $dd)
			{
				$deb += intval($dd['debit']);
				$kre += intval($dd['kredit']);
			}
			
			if(isset($dat['tanggal']))
			{
				$bulanz = date('M/Y',$dat['tanggal']); 
				
			}
			echo 'Total Debit Bulan '.$bulanz." : Rp.".$deb.'</br>';
			echo 'Total Kredit Bulan '.$bulanz." : Rp.".$kre.'</br>';
			
			$total = $deb - $kre;
			echo 'Total Penghasilan Bulan '.$bulanz." : "."Rp.".$deb." - Rp.".$kre." = Rp.".$total;
		?>
		</div>
		</form>	
</br>

<br />
<br>
</br>
<br>
</br>
<!--ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul-->
	  <br /><br/><br /> 
		<div id="footer">
	      <div class="container">
	        <p class="text-muted">Copyright 2013. Digibeat - Jurnal-Laporan. All Rights Reserved.</p>
	      </div>
	    </div>
	</body>
</html>