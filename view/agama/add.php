<!DOCTYPE html>
<html>
	<head>
		<title>Agama</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="/ui/images/logo2.png">
		
		<!--link href="/ui/css/form.css" rel="stylesheet"-->		
		<link href="/ui/css/bootstrap.min.css" rel="stylesheet">
		<script src="/ui/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<style type="text/css">
			
			float: left;
			width: 120px;
			font-weight: bold;
			}
			
			input, textarea{
			width: 250px;
			margin-bottom: 5px;
			}
			
			fieldset{
			width: 450px;
			height: 300px;
			}
		</style>		
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
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

	<form action="<?php echo $link; ?>" class="stdform" method="post">
		<center>
	<fieldset>
		<div class="page-header">
			<center><h1>Agama</h1></center>
		</div>
	</br>
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Agama</label>
	    <div class="col-sm-10">
		<?php
		echo '<span class="field"><input type="text" name="agama" class="form-control" value="'.$agama.'"/></span>';
		if(isset($error_agama))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_agama;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	<br /><br />
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
	    <div class="col-sm-10">
		<?php
			echo '<span class="field"><textarea name="deskripsi" class="form-control" rows="3">'.$deskripsi.'</textarea></span>';
		?>
		</div>
		</div>
	</p>
	<br /><br />
	
	</fieldset>
	</br>
	
	<p>
		<input type="submit" name="save" value="Submit" class="btn btn-primary" />
		<input type="reset" name="reset" value="Reset" class="btn btn-default" />
	</p>
	</center>
	</form>
</body>
</html>