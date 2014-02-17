<!DOCTYPE HTML>
<html>
	<head>
		<title>Detail</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="/ui/images/logo2.png">
		
		<link href="/ui/css/bootstrap.min.css" rel="stylesheet">
		<link href="/ui/css/theme.css" rel="stylesheet">
		<!--link href="/ui/css/base.css" rel="stylesheet"-->
		<link href="/ui/css/bootstrap.css" rel="stylesheet">
		<link href="/ui/css/bootstrap-theme.css" rel="stylesheet">
		<link href="/ui/css/bootstrap-theme.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="/ui/js/bootstrap.js"></script>
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
      <!--li><a href="/agama/index">AGAMA</a></li-->
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
	
	<form action="<?php echo $link; ?>" class="form-horizontal" role="form" method="post" enctype ="multipart/form-data">
	<fieldset>
		<div class="container">	
			 <div class="blog-header">
		        <h1 class="blog-title">Biodata Detail</h1>
		        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		     </div>
		    </br>
	
	<div class="span9">
    <div class="tabbable"> <!-- Only required for left/right tabs -->
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Identitas</a></li>
        <li><a href="#tab2" data-toggle="tab">Kepegawaian</a></li>
        <li><a href="#tab3" data-toggle="tab">Data Orang Tua</a></li>
         <li><a href="#tab4" data-toggle="tab">Data Keluarga</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1"> <!--tab 1-->
          <div class="col-xs-4 col-sm-3">
         
	        <p>
			<?php
			echo '<center>';
			echo '<img src="/upload/foto/'.$foto.'" width="210" height="210" class="img-thumbnail"/>';
			echo '</center>';
			?>
			</p>
         
        </div>
       <div class="container">
       <div class="row">
       <div class="col-xs-5 col-sm-6">
        <h2>Identitas <?php echo $nama; ?></h2>
       <br />
	    <p>
		    <label>Nama Karyawan :</label>
			<?php
				echo $nama;
			?>
		</p>
		
		<p>
		    <label>NO NPWP :</label>
			<?php
				echo $no_npwp;
			?>
		</p>
		
		<p>
		    <label>NO :</label>
			<?php
				echo $no;
			?>
		</p>

		<p>
		    <label>Alamat :</label>
			<?php
				echo $alamat;
			?>
		</p>

		<p>
		    <label>Kota / Kabupaten :</label>
			<?php
				echo $kota;
			?>
		</p>

		<p>
		    <label>Provinsi :</label>
			<?php
				echo $prov;
			?>
		</p>

		<p>
		    <label>Kode Pos :</label>
			<?php
				echo $kd_pos;
			?>
		</p>

		<p>
		    <label>Kewarganegaraan :</label>
			<?php
				echo $negara;
			?>
		</p>

		<p>
		    <label>Tempat, Tanggal Lahir :</label>
			<?php
			$local = new MongoClient();
			$db = $local->karyawan;
			$buls = $db->bulan;
			$mbuls = $buls->findOne(array('_id' => new MongoId($bulan)));
			
			//echo $magam['agama'];
			echo $tlahir.", ".$tanggal." ".$mbuls['bulan']." ".$birthday;
			?>
		</p>

		<p>
			<label>Golongan Darah :</label>
			<?php
				echo $golongan_darah;
			?>
		</p>
	
		<p>
		    <label>Agama :</label>
			<?php
			$local = new MongoClient();
			$db = $local->karyawan;
			$agam = $db->agama;
			$magam = $agam->findOne(array('_id' => new MongoId($agama)));
			
			echo $magam['agama'];
			?>
		</p>

		<p>
		    <label>Jenis Kelamin :</label>
			<?php
				echo $jenis_kelamin;
			?>
		</p>
        </div>
       </div>
       </div>
       </div>
        <div class="tab-pane" id="tab2"> <!--tab 2-->
    	 <div class="container">
	       <div class="row">
	       <div class="col-xs-5 col-sm-6">
	        <h2>Kepegawaian</h2>
	        <br />
          <p>
		    <label>Departement :</label>
			<?php
			$local = new MongoClient();
			$db = $local->karyawan;
			$dept = $db->departement;
			$mdept = $dept->findOne(array('_id' => new MongoId($departement)));
			
			echo $mdept['departement'];
			?>
		</p>

		<p>
		    <label>Jabatan :</label>
			<?php
			$local = new MongoClient();
			$db = $local->karyawan;
			$jabat = $db->jabatan;
			$mjabat = $jabat->findOne(array('_id' => new MongoId($jabatan)));
			
			echo $mjabat['jabatan'];
			?>
		</p>
	
		<p>
		    <label>Status Pegawai :</label>
			<?php
			$local = new MongoClient();
			$db = $local->karyawan;
			$statpegg = $db->status_pegawai;
			$mstatpegg = $statpegg->findOne(array('_id' => new MongoId($status_pegawai)));
			
			echo $mstatpegg['status_pegawai'];
			?>
		</p>
		
		<p>
		    <label>No Surat Kontrak :</label>
			<?php
				echo $surat_kontrak;
			?>
		</p>
	
		<p>
		    <label>Pendidikan Terakhir :</label>
			<?php
				echo $pendidikan_terakhir;
			?>
		</p>
		
		<p>
		    <label>Gaji Pokok :</label>
			<?php
				echo "Rp.".$gaji_pokok;
			?>
		</p>
		
		<p>
		    <label>Mulai Kerja :</label>
			<?php
				echo $work_in." ".$bulan_kerja." ".$tahun_kerja;
			?>
		</p>

		<p>
		    <label>Email :</label>
			<?php
				echo $email;
			?>
		</p>
	
		<p>
		    <label>No. Rekening :</label>
			<?php
				echo $norek;
			?>
		</p>
	
		<p>
		    <label>Nama Bank :</label>
			<?php
				echo $bank;
			?>
		</p>
	
		<p>
		    <label>Cabang Bank :</label>
			<?php
				echo $cabang;
			?>
		</p>

		<p>
		    <label>Status Perkawinan :</label>
			<?php
				echo $kawin;
			?>
		</p>

		<p>
		    <label>Phone :</label>
			<?php
				echo $telp;
			?>
		</p>

		<p>
		    <label>Status :</label>
			<?php
				echo $status;
			?>
		</p>
        </div>
      </div>
    </div>
</div>
	<div class="tab-pane" id="tab3"> <!--tab 3-->
		<div class="container">
	       <div class="row">
	       <div class="col-xs-5 col-sm-6">
	        <h2>Biodata Orangtua</h2>
	        <br />
	         <p>
			    <label>Nama Ayah :</label>
				<?php
					echo $nm_ayah;
				?>
			</p>
		
			<p>
			    <label>Pendidikan :</label>
				<?php
					echo $education_ayah;
				?>
			</p>
		
			<p>
			    <label>Pekerjaan :</label>
				<?php
					echo $work_ayah;
				?>
			</p>
	<br />
			<p>
			    <label>Nama Ibu :</label>
				<?php
					echo $nm_ibu;
				?>
			</p>
		
			<p>
			    <label>Pendidikan :</label>
				<?php
					echo $education_ibu;
				?>
			</p>
		
			<p>
			    <label>Pekerjaan :</label>
				<?php
					echo $work_ibu;
				?>
			</p>
	<br />
			<p>
			    <label>Alamat Orang Tua :</label>
				<?php
					echo $alamat_ortu;
				?>
			</p>
	       </div>
	     </div>
	   </div>
	</div>
	<div class="tab-pane" id="tab4"> <!--tab 4-->
		<div class="container">
	       <div class="row">
	       <div class="col-xs-5 col-sm-6">
	       	<h2>Biodata Keluarga</h2>
          <br />
          <p>
		    <label>Nama Istri/Suami :</label>
			<?php
				echo $nm_istri;
			?>
		 </p>

		<p>
		    <label>Umur :</label>
			<?php
				echo $umur;
			?>
		</p>

		<p>
		    <label>Pendidikan :</label>
			<?php
				echo $pendidikan;
			?>
		</p>

		<p>
		    <label>Pekerjaan :</label>
			<?php
				echo $jobs;
			?>
		</p>

		<p>
		    <label>Jumlah Anak :</label>
			<?php
			    echo $jml_anak;
			?>
		</p>
		<br />
		<h5>Anak ke 1</h5>
		<p>
		    <label>Nama Anak :</label>
			<?php
			    echo $nm_anak_1;
			?>
		</p>
		<p>
		    <label>Umur Anak :</label>
			<?php
			    echo $umur_anak_1;
			?>
		</p>
		<p>
		    <label>Umur Anak :</label>
			<?php
			    echo $pendidikan_anak_1;
			?>
		</p>
		<p>
		    <label>Jenis Kelamin :</label>
			<?php
			    echo $jenis_kelamin_anak_1;
			?>
		</p>
		<br />
		<h5>Anak ke 2</h5>
		<p>
		    <label>Nama Anak :</label>
			<?php
			    echo $nm_anak_2;
			?>
		</p>
		<p>
		    <label>Umur Anak :</label>
			<?php
			    echo $umur_anak_2;
			?>
		</p>
		<p>
		    <label>Umur Anak :</label>
			<?php
			    echo $pendidikan_anak_2;
			?>
		</p>
		<p>
		    <label>Jenis Kelamin :</label>
			<?php
			    echo $jenis_kelamin_anak_2;
			?>
		</p>
		<br />
		<h5>Anak ke 3</h5>
		<p>
		    <label>Nama Anak :</label>
			<?php
			    echo $nm_anak_3;
			?>
		</p>
		<p>
		    <label>Umur Anak :</label>
			<?php
			    echo $umur_anak_3;
			?>
		</p>
		<p>
		    <label>Umur Anak :</label>
			<?php
			    echo $pendidikan_anak_3;
			?>
		</p>
		<p>
		    <label>Jenis Kelamin :</label>
			<?php
			    echo $jenis_kelamin_anak_3;
			?>
		</p>
		<br />
		<h5>Anak ke 4</h5>
		<p>
		    <label>Nama Anak :</label>
			<?php
			    echo $nm_anak_4;
			?>
		</p>
		<p>
		    <label>Umur Anak :</label>
			<?php
			    echo $umur_anak_4;
			?>
		</p>
		<p>
		    <label>Umur Anak :</label>
			<?php
			    echo $pendidikan_anak_4;
			?>
		</p>
		<p>
		    <label>Jenis Kelamin :</label>
			<?php
			    echo $jenis_kelamin_anak_4;
			?>
		</p>
		
       </div>
       </div>
    </div>
   </div>
 
  </div>
</div> 
</div>

	<br /><br />
	</fieldset>
</form>
</div>
<br /><br /><br /><br /><br /><br />
		<div id="footer">
	      <div class="container">
	        <p class="text-muted">Copyright 2013. Digibeat - Data Keryawan - Detail. All Rights Reserved.</p>
	      </div>
	    </div>
</body>
</html>