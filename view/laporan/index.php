<!DOCTYPE HTML>
<!--html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Laporan</title>
		
		<link href="/ui/css/bootstrap.min.css" rel="stylesheet">
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
  <!--div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">HOME</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <!--div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="/type/index">AKUN</a></li>
      <li><a href="/cabang/index">CABANG</a></li>
      <li><a href="/welcome/index">JURNAL</a></li>
      <li><a href="/biodata/index">BIODATA</a></li>
      <li><a href="/jabatan/index">JABATAN</a></li>
      <li><a href="/departement/index">DEPARTEMENT</a></li>
      <!--li><a href="/agama/index">AGAMA</a></li-->
    <!--/ul>
    
    <!--form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name = "search" value="" >
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form-->
  <!--/div><!-- /.navbar-collapse -->
<!--/nav>
		
		<form action="<?php echo $link; ?>" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
		<center>
		<table border="1" style="width: 40%">
		
		<div class="page-header">
		  <center><h1>Tabel Laporan</h1></center>
		</div>
			
		 	<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-5 control-label">Pilih Bulan</label>
		    <div class="col-sm-2">
			<?php
			if(isset($bulan))
			{
				echo '<span class="field">';
				echo '<select name="bulan" class="form-control input-sm">';
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
				echo '<select name="bulan" class="form-control input-sm">';
				echo '<option value="01" select>'.'Januari'.'</option>';
				echo '<option value="02" select>'.'February'.'</option>';
				echo '<option value="03" select>'.'Maret'.'</option>';
				echo '<option value="04" select>'.'April'.'</option>';
				echo '<option value="05" select>'.'Mei'.'</option>';
				echo '<option value="06" select>'.'Juni'.'</option>';
				echo '<option value="07" select>'.'Juli'.'</option>';
				echo '<option value="08" select>'.'Agustus'.'</option>';
				echo '<option value="09" select>'.'September'.'</option>';
				echo '<option value="10" select>'.'Oktober'.'</option>';
				echo '<option value="11" select>'.'November'.'</option>';
				echo '<option value="12" select>'.'Desember'.'</option>';
				echo '</select>';
				echo '</span>';
			}
			?>
			</div>
			</div>
		</p>
		
		<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-5 control-label">Pilih Tahun</label>
		    <div class="col-sm-2">
			<?php
			echo '<span class="field">';
			echo '<select name="tahun" class="form-control input-sm">';
			for($t=2013;$t<2018;$t++)
			{
				if(trim($tahun) == trim($t))
					echo '<option value="'.$t.'" selected>'.$t.'</option>';
				else
					echo '<option value="'.$t.'">'.$t.'</option>';
			}
			echo '</select>';
			echo '</span>';
			?>
			</div>
			</div>
		</p>
		
		<p>
		  <input type="submit" name="save" value="Submit" class="btn btn-primary" />
	    </p>
	
			<thead>
				<tr>
					<th><center><b> TANGGAL </b></center></th>
				</tr>
			</thead>
			<?php
			foreach (range(1, 31) as $number) 
			{
				echo '<tr>';
			    echo '<td>'.'<center>'.$number.'</center>'.'</td>';
				echo '<tr>';
			}
			
		   ?>
		</table>
		<br /><br />
		</center>
		</form>
	</body>
</html-->