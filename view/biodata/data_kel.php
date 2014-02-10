<html>
	<head>
		<title>Biodata</title>
		<link href="/ui/css/bootstrap.min.css" rel="stylesheet">
		<script src="/ui/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
	</head>
<nav class="navbar navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Home</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="/biodata/index">Biodata</a></li>
      <li><a href="/jabatan/index">Jabatan</a></li>
      <li><a href="/departement/index">Departement</a></li>
      <li><a href="/agama/index">Agama</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
	<body>
	<form action="<?php echo $link; ?>" class="form-horizontal" role="form" method="post" enctype ="multipart/form-data">
	<fieldset>
		<div class="page-header">
			<center><h1>Biodata Orang Tua</h1></center>
		</div>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Nama Ayah :</label>
	    <div class="col-sm-1">
		<?php
			echo $nm_ayah;
		?>
		</div>
		</div>
	</p>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Nama Ibu :</label>
	    <div class="col-sm-1">
		<?php
			echo $nm_ibu;
		?>
		</div>
		</div>
	</p>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Alamat Orang Tua :</label>
	    <div class="col-sm-1">
		<?php
			echo $alamat_ortu;
		?>
		</div>
		</div>
	</p>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Pekerjaan Ayah :</label>
	    <div class="col-sm-1">
		<?php
			echo $work_ayah;
		?>
		</div>
		</div>
	</p>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Pekerjaan Ibu :</label>
	    <div class="col-sm-1">
		<?php
			echo $work_ibu;
		?>
		</div>
		</div>
	</p>
	
	<div class="page-header">
		<center><h1>Biodata Keluarga</h1></center>
	</div>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Nama Istri :</label>
	    <div class="col-sm-1">
		<?php
			echo $nm_istri;
		?>
		</div>
		</div>
	</p>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Umur :</label>
	    <div class="col-sm-1">
		<?php
			echo $umur;
		?>
		</div>
		</div>
	</p>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Pendidikan :</label>
	    <div class="col-sm-1">
		<?php
			echo $pendidikan;
		?>
		</div>
		</div>
	</p>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Pekerjaan :</label>
	    <div class="col-sm-1">
		<?php
			echo $jobs;
		?>
		</div>
		</div>
	</p>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Anak :</label>
	    <div class="col-sm-1">
		<?php
				echo $jml_anak;
		?>
		</div>
		</div>
	</p>
              
	<br /><br />
	
		<!--input type="submit" name="save" value="Submit" />
		<input type="reset" name="reset" value="Reset" /-->
	</fieldset>
</form>
</body>
</html>