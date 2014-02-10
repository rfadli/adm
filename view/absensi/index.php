<!DOCTYPE HTML>
<html>
	<head>
		<title>Absensi</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="/ui/images/logo2.png">
		
		<link href="/ui/css/bootstrap.min.css" rel="stylesheet">
		<link href="/ui/css/fiddle.css" rel="stylesheet">
		<script src="/ui/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<style type="text/css">
		
        table tr {
		  font: normal 14px Tahoma, Geneva, sans-serif;
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
		        <h1 class="blog-title">Absensi</h1>
		        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		     </div>
		    </br>
		
		<table class="table table-bordered">
		<div class="col-md-12">
        <!--a href="/agama/add" class="btn btn-primary btn-lg default" role="button"><span>New Data</span></a-->
        <a class="btn btn-success" href="/absensi/add" role="button">+Add New</a>
       	<thead>
		<tr>
			<th><center><b>NAMA</b></center></th>
			<th><center><b>JAM MASUK</b></center></th>
			<th><center><b>JAM KELUAR</b></center></th>
			<th><center>&nbsp;</center></th>
		</tr>
		</thead>
		<?php
		foreach ($data as $dat)
		{
			echo '<tr>';
			echo '<td>'.'<center>'.$dat['nama'].'</center>'.'</td>';
			echo '<td>'.'<center>'.$dat['jam_masuk'].'</center>'.'</td>';
			echo '<td>'.'<center>'.$dat['jam_keluar'].'</center>'.'</td>';
			echo '<td>'.'<center>';
			echo '<a href="/absensi/edit?id='.$dat['_id'].'" class="label label-primary">edit</a>&nbsp';
			echo '</center>'.'</td>';
			echo '</tr>';
		}
		
		?>
		</table>
		</td>
		</div>
		<?php
		echo '<ul class="pagination">';
		if($page > 1)
		{
	    echo '<li>'.'<a href="?page=' . $prev . '">PREVIOUS</a>'.'</li>';
		    if($page * $limit_doc )
		    {
		        echo '<li>'.' <a href="?page=' . $next . '"> NEXT</a>'.'</li>';
		    }
		} 
		else 
		{
		    if($page * $limit_doc ) 
		    {
		        echo '<li>'.' <a href="?page=' . $next . '"> NEXT</a>'.'</li>';
		   }
		}
		echo 'page';
		echo '</ul>';
		?>
		
		<?php echo Base::instance()->raw($page); ?>
		</div>
		</form>
		
	<div id="footer">
      <div class="container">
        <p class="text-muted">Copyright 2013. Digibeat - Absensi. All Rights Reserved.</p>
      </div>
    </div>
	</body>
</html>
