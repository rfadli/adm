<!DOCTYPE HTML>
<html>
	<head>
		<title>Jurnal</title>
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
		        <h1 class="blog-title">Jurnal</h1>
		        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		     </div>
		    </br>
		
		<table class="table table-bordered">
		<div class="col-md-12">	
        <a class="btn btn-success" href="/welcome/add" role="button">+Add New</a>
        <a class="btn btn-info" href="/welcome/laporan" role="button">Laporan</a>
    	
       	<thead>
		<tr>
			<th><center><b>NO</b></center></th>
			<th><center><b>WAKTU</b></center></th>
			<th><center><b>NO BUKTI</b></center></th>
			<th><center><b>KODE</b></center></th>
			<th><center><b>TYPE AKUN</b></center></th>
			<th><center><b>AKUN</b></center></th>
			<th><center><b>DEBIT</b></center></th>
			<th><center><b>KREDIT</b></center></th>
			<th><center><b>KETERANGAN</b></center></th>
			<th><center><b>CABANG</b></center></th>
			<th><center>&nbsp;</center></th>
		</tr>
		</thead>
			
			<?php
			$m = new MongoClient();
			$db = $m->karyawan;	
			$mm = $db->cabang;
			$vv = $db->type;
			$jj = $db->jurnal;
			
			foreach ($data as $dat) 
			{
				echo '<tr>';
				echo '<td>'.'<center>'.$dat['nomer'].'</center>'.'</td>';		
				echo '<td>'.'<center>'.date('d/m/Y',$dat['tanggal']).', ';
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
				if(isset($dat['cabang']))
				{
					$bb = $mm->findOne(array('_id'=> new MongoId($dat['cabang'])));
					echo '<td>'.'<center>'.$bb['name'].'</center>'.'</td>'; //manggil data base cabang
				}else{
					echo '<td></td>';
				}
				//echo '<td>'.'<center>'.$dat['document'].'</center>'.'</td>';
				//echo '<td class="center"><a href="/welcome/laporan" class="edit btn btn5 btn_book">laporan</a>';
				echo '<td>'.'<center>';
				echo '<a href="/welcome/edit?page='.$page.'&id='.$dat['_id'].'" class="label label-primary">edit</a>&nbsp';
				echo '<a href="/welcome/delete?id='.$dat['_id'].'" page="'.$page.'" onclick="return confirm(\'Anda Yakin ?\')" class="label label-danger">delete</a>';
				echo '</td>'.'</center>';
				echo '</tr>';
			}
			?>
			</div>
		</table>
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
			</br>
			<?php
			$m = new MongoClient();
			$db = $m->karyawan;
			$ag = $db->jurnal;
			$cek = $ag->find();
			$deb = 0;
			$kre = 0;
			
			foreach($cek as $dd)
			{
				$deb += intval($dd['debit']);
				$kre += intval($dd['kredit']);
			}
			echo 'Total Debit : Rp.'.$deb.'</br>';
			echo 'Total Kredit : Rp.'.$kre.'</br>';
			$total = $deb - $kre;
			echo 'Total Penghasilan : Rp.'.$deb.' - Rp.'.$kre.' = Rp.'.$total;
			?>
			<br />
			<br>
			</br>
			<br>
			</br>
		</div>
		</form>
   <div id="footer">
      <div class="container">
        <p class="text-muted">Copyright 2013. Digibeat - Jurnal. All Rights Reserved.</p>
      </div>
    </div>
<!--ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul-->
	</body>
</html>