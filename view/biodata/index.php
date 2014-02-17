<!DOCTYPE HTML>
<html>
	<head>
		<title>Biodata</title>
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

		<form action="<?php echo $link; ?>" class="stdform" method="post" enctype="multipart/form-data">
			
			<div class="container">	
			 <div class="blog-header">
		        <h1 class="blog-title">Data Karyawan</h1>
		        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		     </div>
		    </br>
		    
		<table class="table table-bordered">
		<div class="col-md-12">
        <!--a href="/biodata/add" class="btn btn-primary btn-lg default" role="button"><span>New Data</span></a-->
        <a class="btn btn-success" href="/biodata/add" role="button">+Add New</a>
       	
       	<thead>
			<tr>
				<th><center><b>NO</b></center></th>
				<th><center><b>NAMA</b></center></th>
				<!--th><center><b>ALAMAT</b></center></th-->
				<!--th><center><b>TEMPAT LAHIR</b></center></th>
				<th><center><b>TANGGAL LAHIR</b></center></th-->
				<!--th><center><b>AGAMA</b></center></th>
				<th><center><b>JENIS KELAMIN</b></center></th!-->
				<th><center><b>JABATAN</b></center></th>
				<!--th><center><b>DEPARTEMENT</b></center></th-->
				<th><center><b>MULAI KERJA</b></center></th>
				<th><center><b>STATUS PEGAWAI</b></center></th>
				<th><center><b>NO SURAT KONTRAK</b></center></th>
				<!--td><center>Mulai Kerja</center></td>
				<!--<td><center>Foto</center></td>-->
				<th><center>&nbsp;</center></th>
			</tr>
		</thead>
		<?php
		$local = new MongoClient();
		$db = $local->karyawan;
		$col = $db->jabatan;
		$ddep = $db->departement;
		$ag = $db->agama;
		$bul = $db->bulan;
		$statpegg = $db->status_pegawai;
		
		foreach ($data as $dat)
		{
			echo '<tr>';
			echo '<td>'.'<center>'.$dat['no'].'</center>'.'</td>';
			echo '<td>'.'<center>'.$dat['nama'].'</center>'.'</td>';
			//echo '<td>'.'<center>'.$dat['alamat'].'</center>'.'</td>';
			//echo '<td>'.'<center>'.$dat['tlahir'].'<center>'.'</td>';
			//echo '<td>'.'<center>'.$dat['tanggal']." ".$dat['bulan']." ".$dat['birthday'].'</center>','</td>';
			//echo '<td>'.'<center>'.$dat['tlahir'].","." ".$dat['birthday'].'</center>'.'</td>';
			//echo '<td>'.$dat['birthday'].'</td>';
			/*if(isset($dat['bulan']))
			{
				$tes = $bul->findOne(array('_id' => new MongoId($dat['bulan'])));
				echo '<td>'.'<center>'.$dat['tanggal']." ".$tes['bulan'].' '.$dat['birthday'].'</center>'.'</td>';
			}
			else {
				echo '<td></td>';
			}*/
			//echo '<td>'.$dat['birthday'].'</td>';
			/*if(isset($dat['agama']))
			{
				$cek = $ag->findOne(array('_id' => new MongoId($dat['agama'])));
				echo '<td>'.'<center>'.$cek['agama'].'</center>'.'</td>';
			}
			else {
				echo '<td></td>';
			}
			
			echo '<td>'.'<center>'.$dat['jenis_kelamin'].'</center>'.'</td>';*/
			
			if(isset($dat['jabatan']))
			{
				$aa = $col->findOne(array('_id' => new MongoId($dat['jabatan'])));
				echo '<td>'.'<center>'.$aa['jabatan'].'</center>'.'</td>';
			}
			else {
				echo '<td></td>';
			}
			/*if (isset($dat['departement']))
			{
				$bb = $ddep->findOne(array('_id' => new MongoId($dat['departement'])));
				echo '<td>'.'<center>'.$bb['departement'].'</center>'.'</td>';
			}
			else {
				echo '<td></td>';
			}*/
			echo '<td>'.'<center>'.$dat['work_in'].' '.$dat['bulan_kerja'].' '.$dat['tahun_kerja'].'</center>'.'</td>';
			if(isset($dat['status_pegawai']))
			{
				$statpeggs = $statpegg->findOne(array('_id' => new MongoId($dat['status_pegawai'])));
				echo '<td>'.'<center>'.$statpeggs['status_pegawai'].'</center>'.'</td>';
			}
			else {
				echo '<td></td>';
			}
			echo '<td>'.'<center>'.$dat['surat_kontrak'].'</center>'.'</td>';
			//echo '<td>'.$dat['work_in'].'</td>';
			//echo '<td>'.$dat['foto'].'</td>';
			echo '<td>';
			echo '<center>';
			echo '<a href="/biodata/edit?id='.$dat['_id'].'" class="label label-primary"> edit </a>'.'</br>';
			echo '<a href="/biodata/detail?id='.$dat['_id'].'" class="label label-info"> detail </a>'.'</br>';
			echo '<a href="/biodata/delete?id='.$dat['_id'].'" onclick="return confirm(\' Anda Yakin?\')" class="label label-danger">delete</a>';
			echo '</td>';
			echo '</center>';
			echo '</tr>';
		}
		
		?>
		</td>
		</div>
		</table>
		<!--ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul-->
		<?php
		echo '<ul class="pagination">';
		if($page > 1)
		{
		echo '<a href="?page=' . $prev . '" ><input style="cursor:pointer;border:1px black solid;border-radius:5px;width:120px;height:30px;font-size:15px;" type="button" value=" Previous "></a>';
		}
	
		for($i=1;$i<$limit_doc;$i++)
		{
			if($page == $i)
			{
				echo ' <input style="border:2px black solid;border-radius:5px;width:30px;height:30px;color:black;font-size:15px;" type="button" value="'.$i.'"> ';
			}
			else
			{
			echo '<a href="?page=' . $i . '"> <input style="cursor:pointer;border:1px black solid;border-radius:5px;width:30px;height:30px;font-size:15px;" type="button" value="'.$i.'"></a>';
			}
		}
		
		if($page * $limit_doc)
		{
			echo '<a href="?page=' . $next . '""><input style="cursor:pointer;border:1px black solid;border-radius:5px;width:90px;height:30px;font-size:15px;" type="button" value="  Next "></a>';
		}
		else
		{
		 echo '<input style="border:1px black solid;border-radius:5px;width:90px;height:30px;color:black;font-size:15px;" type="button" value="   Next ">';
		}
		/*if($page > 1)
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
		}*/
		echo '</ul>';
		?>
		<?php
		echo 'Page ';
		echo Base::instance()->raw($page); 
		?>
		</div>
		</form>
		
		<br /><br /><br /><br /><br /><br />
		
		<div id="footer">
	      <div class="container">
	        <p class="text-muted">Copyright 2013. Digibeat - Data Keryawan. All Rights Reserved.</p>
	      </div>
	    </div>
	</body>
</html>
