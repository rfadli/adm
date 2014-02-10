<!DOCTYPE html>
<html>
	<head>
		<title>Departement</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="/ui/images/logo2.png">
		
		<!--link href="/ui/css/form.css" rel="stylesheet"-->
		<link href="/ui/css/bootstrap.min.css" rel="stylesheet">
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
      <!--li><a href="/agama/index">AGAMA</a></li-->
    </ul>
    <!--form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form-->
  </div><!-- /.navbar-collapse -->
</nav>
		
		<form action="<?php echo $link; ?>" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" > 
		<center>
		<fieldset>
		<div class="container">	
			 <div class="blog-header">
		        <h1 class="blog-title">Departement</h1>
		        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		     </div>
		</br>
		
		<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Nama</label>
	    <div class="col-sm-4">
		<?php
		echo '<span class="field"><input type="text" name="nama" class="form-control" value="'.$nama.'"/></span>';
		if(isset($error_nama))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_nama;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
		
		<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Departement</label>
	    <div class="col-sm-4">
		<?php
		echo '<input type="text" name="departement" class="form-control" value="'.$departement.'"/>';
		if(isset($error_dept))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_dept;
			echo '</div>';
			echo '</span>';
		}
        ?>
		</div>
		</div>
	</p>
	
		<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Deskripsi</label>
	    <div class="col-sm-4">
		<?php
			echo '<span class="field"><textarea name="deskripsi" class="form-control" rows="3">'.$deskripsi.'</textarea></span>';
		?>
		</div>
		</div>
	</p>
		</div>
		</fieldset>
		
		<p>
		  <input type="submit" name="save" value="Submit" class="btn btn-primary" />
		  <input type="reset" name="reset" value="Reset" class="btn btn-default" />
	   </p>
		
		</center>
		</form>
		<br /> <br/><br /> <br/><br /> <br/><br /> <br/><br /> <br/><br /> <br/>
		<div id="footer">
	      <div class="container">
	        <p class="text-muted">Copyright 2013. Digibeat - Departement. All Rights Reserved.</p>
	      </div>
	    </div>
	</body>
</html>
