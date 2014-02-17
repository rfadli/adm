<!DOCTYPE html>
<html>
	<head>
		<title>Biodata</title>
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
  </div><!-- /.navbar-collapse -->
</nav>

	<form action="<?php echo $link; ?>" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
		
	<fieldset>
		<div class="container">	
			 <div class="blog-header">
			 	<center>
		        <h1 class="blog-title">Identitas Diri</h1>
		        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		        </center>
		     </div>
		    </br>
		    
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Karyawan</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nama" class="form-control" value="'.$nama.'"/>';
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
	    <label for="inputPassword3" class="col-sm-5 control-label">NO NPWP</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="no_npwp" class="form-control" value="'.$no_npwp.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">NO</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nik" class="form-control" value="'.$no.'"/>';
		?>
		</div>
		</div>
	</p>
	<br />
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Alamat</label>
	    <div class="col-sm-3">
		<?php
		echo '<span class="field"><textarea name="alamat" class="form-control" rows="3">'.$alamat.'</textarea></span>';
		if(isset($error_alamat))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_alamat;
			echo '</div>';
			echo '</span>';
		}
		echo '</br>';
        ?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Kota / Kabupaten</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="kota" class="form-control" value="'.$kota.'"/>';
		if(isset($error_kota))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_kota;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Provinsi</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="prov" class="form-control" value="'.$prov.'"/>';
		if(isset($error_prov))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_prov;
			echo '</div>';
			echo '</span>';
		}	
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Kode Pos</label>
	    <div class="col-sm-2">
		<?php
		echo '<input type="text" name="kd_pos" class="form-control" value="'.$kd_pos.'"/>';
		if(isset($error_kdpos))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_kdpos;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Kewarganegaraan</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="negara" class="form-control" value="'.$negara.'"/>';
		if(isset($error_negara))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_negara;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<br />
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pendidikan Terakhir</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="pendidikan_terakhir" class="form-control" value="'.$pendidikan_terakhir.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Tempat Lahir</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="tlahir" class="form-control" value="'.$tlahir.'"/>';
		if(isset($error_tlahir))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_tlahir;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Tanggal Lahir</label>
	    <div class="col-sm-2">
		<?php
		$local = new MongoClient();
		$db = $local->karyawan;
		
		$bul = $db->bulan;
		$datbul = $bul->find();
		
			// tanggal
		echo '<span class="field">';
		echo '<select name="tanggal" class="form-control input-sm">';
		echo '<option value="">-- Pilih Tanggal --</option>';
		for($t=1;$t<32;$t++)
		{
			if(trim($tanggal) == trim($t))
				echo '<option value="'.$t.'" selected>'.$t.'</option>';
			else
				echo '<option value="'.$t.'">'.$t.'</option>';
		}
		echo '</select>';
		echo '</span>';
			// bulan
		echo '<span class="field">';
		echo '<select name="bulan" class="form-control input-sm">';
		echo '<option value="">-- Pilih Bulan --</option>';	
		foreach($datbul as $dt)
		{							
			echo '<option class ="select" value="'.$dt['_id'].'" select>'.$dt['bulan'].'</option>';
		}
		foreach($datbul as $dt)
		{
			if($bulan == $dt['_id'])
			{
				echo '<option value="'.$dt['_id'].'" selected>'.$dt['bulan'].'</option>';
			}
		}
		echo '</select>';
		echo '</span>';
			
		// tahun
		echo '<span class="field">';
		echo '<select name="birthday" class="form-control input-sm">';
		echo '<option value="">-- Pilih Tahun --</option>';
		for($y=1950;$y<2015;$y++)
		{
			if(trim($birthday) == trim($y))
				echo '<option value="'.$y.'" selected>'.$y.'</option>';
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
	    <label for="inputPassword3" class="col-sm-5 control-label">Golongan Darah</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="golongan_darah" class="form-control" value="'.$golongan_darah.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Agama</label>
	    <div class="col-sm-2">
		<?php
		$local = new MongoClient();
		$db = $local->karyawan;
		$ag = $db->agama;
		$datag = $ag->find();
		
		echo '<select name = "agama" class="form-control input-sm">';
		echo '<span class="field">';
		echo '<option value="">-- Pilih Agama --</option>';
		foreach($datag as $dt)
		{							
			echo '<option class ="select" value="'.$dt['_id'].'" select>'.$dt['agama'].'</option>';
		}
		foreach($datag as $dt)
		{
			if($agama == $dt['_id'])
			{
				echo '<option value="'.$dt['_id'].'" selected>'.$dt['agama'].'</option>';
			}
		}
		echo '</span>';
		echo '</select>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Jenis Kelamin</label>
	    <div class="col-sm-2">
		<?php
		if($jenis_kelamin == '')
		{
			echo '<span class="field">';
		    echo '<input type="radio" name="jenis_kelamin" class="radio" value="Pria" /> Pria';
			echo '<input type="radio" name="jenis_kelamin" class="radio" value="Wanita"/> Wanita';
		    echo '</span>';
		}
		else
		{
			if($jenis_kelamin == 'Pria')
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin" class="radio" value="Pria" checked/> Pria';
				echo '<input type="radio" name="jenis_kelamin" class="radio" value="Wanita"/> Wanita';
			    echo '</span>';
			}
			else 
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin" class="radio" value="Pria"/> Pria ';
				echo '<input type="radio" name="jenis_kelamin" class="radio" value="Wanita" checked/> Wanita';
				echo '</span>';
			}
		}
			if(isset($error_gender))
			{
				echo '<span class="error">';
				echo '<div style = color:red>';
				echo $error_gender;
				echo '</div>';
				echo '</span>';
			}
		?>
		<!--<input type = "radio" name = "jenis_kelamin" value = "Pria" checked/> Pria
        <input type = "radio" name = "jenis_kelamin" value = "Wanita" /> Wanita-->
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Departement</label>
	    <div class="col-sm-2">
		<?php
		$local = new MongoClient();
		$db = $local->karyawan;
		$dept = $db->departement;
		$datdept = $dept->find();
		
		echo '<select name = "departement" class="form-control input-sm">';
		echo '<span class="field" >';
		echo '<option value="">-- Pilih Departement --</option>';
		foreach($datdept as $dt)
		{							
			echo '<option class ="select" value="'.$dt['_id'].'" select>'.$dt['departement'].'</option>';
		}
		foreach($datdept as $dt)
		{
			if($departement == $dt['_id'])
			{
				echo '<option value ="'.$dt['_id'].'" selected>'.$dt['departement'].'</option>';
			}
		}
		echo '</span>';
		echo '</select>';	
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Jabatan</label>
	    <div class="col-sm-2">
		<?php
		$local = new MongoClient();
		$db = $local->karyawan;
		$collection = $db->jabatan;
		$datbio = $collection->find();
		
		echo '<select name = "jabatan" class="form-control input-sm">';
		echo '<span class="field">';
		echo '<option value="">-- Pilih Jabatan --</option>';
		foreach($datbio as $dt)
		{							
			echo '<option class ="select" value="'.$dt['_id'].'" select>'.$dt['jabatan'].'</option>';
		}
		foreach($datbio as $dt)
		{
			if($jabatan == $dt['_id'])
			{
				echo '<option value="'.$dt['_id'].'" selected>'.$dt['jabatan'].'</option>';
			}
		}
		echo '</span>';
		echo '</select>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Status Pegawi</label>
	    <div class="col-sm-2">
		<?php
		$local = new MongoClient();
		$db = $local->karyawan;
		$mstatpeg = $db->status_pegawai;
		$mstatpeg = $mstatpeg->find();
		
		echo '<select name ="status_pegawai" class="form-control input-sm">';
		echo '<span class="field">';
		echo '<option value="">-- Pilih Status Pegawai --</option>';
		foreach($mstatpeg as $dt)
		{							
			echo '<option class ="select" value="'.$dt['_id'].'" select>'.$dt['status_pegawai'].'</option>';
		}
		foreach($mstatpeg as $dt)
		{
			if($status_pegawai == $dt['_id'])
			{
				echo '<option value="'.$dt['_id'].'" selected>'.$dt['status_pegawai'].'</option>';
			}
		}
		echo '</span>';
		echo '</select>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">No Surat Kontrak</label>
	    <div class="col-sm-3">
		<?php
		echo '<div class="input-group">';
		echo '<span class="field"><input type="text" name="surat_kontrak" class="form-control" value="'.$surat_kontrak.'" /></span>';
		echo '</div>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Gaji Pokok</label>
	    <div class="col-sm-3">
		<?php
		echo '<div class="input-group">';
		echo '<span class="input-group-addon">'."Rp".'</span>';
		echo '<span class="field"><input type="text" name="gaji_pokok" class="form-control" placeholder="example: 2000000" value="'.$gaji_pokok.'" /></span>';
		if(isset($error_gaji_pokok))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_gaji_pokok;
			echo '</div>';
			echo '</span>';
		}
		echo '</div>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Email</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="email" class="form-control" value="'.$email.'"/>';
		if(isset($error_mail))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_mail;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Phone</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="telp" class="form-control" value="'.$telp.'"/>';
		if(isset($error_telp))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_telp;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">No. Rekening</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="norek" class="form-control" value="'.$norek.'"/>';
		if(isset($error_norek))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_norek;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Bank</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="bank" class="form-control" value="'.$bank.'"/>';
		if(isset($error_bank))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_bank;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Cabang Bank</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="cabang" class="form-control" value="'.$cabang.'"/>';
		if(isset($error_cabang))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_cabang;
			echo '</div>';
			echo '</span>';
		}	
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Status Perkawinan</label>
	    <div class="col-sm-2">
		<?php
		if($kawin == '')
		{
			echo '<span class="field">';
		    echo '<input type="radio" name="kawin" class="radio" value="Belum Menikah" /> Belum Menikah';
			echo '<input type="radio" name="kawin" class="radio" value="Menikah"/> Menikah';
			echo '<input type="radio" name="kawin" class="radio" value="Duda / Janda"/> Duda/Janda';
		    echo '</span>';
		}
		else
		{
			if($kawin == 'Belum Menikah')
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="kawin" class="radio" value="Belum Menikah" checked/> Belum Menikah';
				echo '<input type="radio" name="kawin" class="radio" value="Menikah"/> Menikah';
				echo '<input type="radio" name="kawin" class="radio" value="Duda / Janda"/> Duda/Janda';
			    echo '</span>';
			}
			if($kawin == 'Menikah')
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="kawin" class="radio" value="Belum Menikah" /> Belum Menikah';
				echo '<input type="radio" name="kawin" class="radio" value="Menikah" checked/> Menikah';
				echo '<input type="radio" name="kawin" class="radio" value="Duda / Janda"/> Duda/Janda';
			    echo '</span>';
			}
			if($kawin == 'Duda / Janda')
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="kawin" class="radio" value="Belum Menikah" /> Belum Menikah';
				echo '<input type="radio" name="kawin" class="radio" value="Menikah" /> Menikah';
				echo '<input type="radio" name="kawin" class="radio" value="Duda / Janda" checked/> Duda/Janda';
			    echo '</span>';
			}
		}
		?>
		<!--<input type = "radio" name = "jenis_kelamin" value = "Pria" checked/> Pria
        <input type = "radio" name = "jenis_kelamin" value = "Wanita" /> Wanita-->
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Mulai Kerja</label>
	    <div class="col-sm-2">
		<?php
		echo '<span class="field">';
		echo '<select name="work_in" class="form-control input-sm">';
		echo '<option value="">-- Pilih Tanggal --</option>';
		for($tt=1;$tt<32;$tt++)
		{
			if(trim($work_in) == trim($tt))
				echo '<option value="'.$tt.'" selected>'.$tt.'</option>';
			else
				echo '<option value="'.$tt.'">'.$tt.'</option>';
		}
		echo '</select>';
		echo '</span>';
		//bulan
		echo '<select name ="bulan_kerja" class="form-control input-sm">';
		echo '<span class="field">';
		echo '<option value="">-- Pilih Bulan --</option>';
		if(isset($bulan_kerja))
		{							
			echo '<option value="Januari" >'.'Januari'.'</option>';
			echo '<option value="February" >'.'February'.'</option>';
			echo '<option value="Maret" >'.'Maret'.'</option>';
			echo '<option value="April" >'.'April'.'</option>';
			echo '<option value="Mei" >'.'Mei'.'</option>';
			echo '<option value="Juni" >'.'Juni'.'</option>';
			echo '<option value="Juli" >'.'Juli'.'</option>';
			echo '<option value="Agustus" >'.'Agustus'.'</option>';
			echo '<option value="September" >'.'September'.'</option>';
			echo '<option value="Oktober" >'.'Oktober'.'</option>';
			echo '<option value="November" >'.'November'.'</option>';
			echo '<option value="Desember" >'.'Desember'.'</option>';
		}
		else
		{
			echo '<option value="Januari" selected>'.'Januari'.'</option>';
			echo '<option value="February" selected>'.'February'.'</option>';
			echo '<option value="Maret" selected>'.'Maret'.'</option>';
			echo '<option value="April" selected>'.'April'.'</option>';
			echo '<option value="Mei" selected>'.'Mei'.'</option>';
			echo '<option value="Juni" selected>'.'Juni'.'</option>';
			echo '<option value="Juli" selected>'.'Juli'.'</option>';
			echo '<option value="Agustus" selected>'.'Agustus'.'</option>';
			echo '<option value="September" selected>'.'September'.'</option>';
			echo '<option value="Oktober" selected>'.'Oktober'.'</option>';
			echo '<option value="November" selected>'.'November'.'</option>';
			echo '<option value="Desember" selected>'.'Desember'.'</option>';
		}
		echo '</span>';
		echo '</select>';
		//tahun
		echo '<span class="field">';
		echo '<select name="tahun_kerja" class="form-control input-sm">';
		echo '<option value="">-- Pilih Tahun --</option>';
		for($yy=1950;$yy<2015;$yy++)
		{
			if(trim($tahun_kerja) == trim($yy))
				echo '<option value="'.$yy.'" selected>'.$yy.'</option>';
			else
				echo '<option value="'.$yy.'">'.$yy.'</option>';
		}
		echo '</select>';
		echo '</span>';	
		?>
		</div>
		</div>
	</p>
	
	<!--p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Foto</label>
	    <div class="col-sm-5">
        <?php
        if(isset($error_foto['foto']) )
		{
			echo '<span class="field"><input type="file" name="foto" class="error" /></span>';
        	echo '<small class="desc">';
			foreach ($error_foto['foto'] as $image)
			{
				echo '<label class="error">'.$image.'</label>';
			}
        	echo '</small>';
		}
		else 
		{
			echo '<span class="field"><input type="file" name="foto" /></span>';
		}
        ?>
		</div>
		</div>
	</p-->
	
	 <p>
   		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Foto</label>
	    <div class="col-sm-2">
        <?php	
			if(isset($foto))
			{
				//$path = '/get/upload?tipe='.Config::ALBUM_KECIL.'&namafile='.$cover_back;
				//print_r($foto);exit;
			   	if(strlen(trim($foto)) > 0)
				{
					echo '<img src="/upload/foto/'.$foto.'" width="240" height="240" class="img-thumbnail"/>';
				}
			}
		?>                      	
        </span>
        <?php
        if(isset($error['foto']) )
		{
			echo '<span class="field"><input type="file" name="foto" class="error" /></span>';
        	echo '<small class="desc">';
			foreach ($error['foto'] as $message)
            {
                echo '<label class="error">'.$message.'</label>';
            }
         	echo '</small>';
		}
		else {
		
			echo '<span class="field"><input type="file" name="foto" /></span>';
		}
        ?>
       </div>
      </div>
   </p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Status</label>
	    <div class="col-sm-5">
		<?php
		if($status == 'active')
		{
			echo '<span class="field">';
			echo '<input type="checkbox" name="status"  checked/> Active';
			echo '</span>';
		}
		else 
		{
			echo '<span class="field">';
			echo '<input type="checkbox" name="status" /> Active';
			echo '</span>';
		}            
        ?>
		</div>
		</div>
	</p>

<div class="page-header">
	<center><h1>Data Orangtua</h1></center>
</div>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Ayah</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nm_ayah" class="form-control" value="'.$nm_ayah.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pendidikan</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="education_ayah" class="form-control" value="'.$education_ayah.'"/>';
		
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pekerjaan</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="work_ayah" class="form-control" value="'.$work_ayah.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}	
		?>
		</div>
		</div>
	</p>
	<br />
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Ibu</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nm_ibu" class="form-control" value="'.$nm_ibu.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pendidikan</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="education_ibu" class="form-control" value="'.$education_ibu.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pekerjaan</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="work_ibu" class="form-control" value="'.$work_ibu.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	<br />
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Alamat Orangtua</label>
	    <div class="col-sm-3">
		<?php
		echo '<span class="field"><textarea name="alamat_ortu" class="form-control" rows="3">'.$alamat_ortu.'</textarea></span>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		echo '</br>';
        ?>
		</div>
		</div>
	</p>
		
<div class="page-header">
	<center><h1>Data Keluarga</h1></center>
</div>

	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Istri/Suami</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nm_istri" class="form-control" value="'.$nm_istri.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Umur</label>
	    <div class="col-sm-1">
		<?php
		echo '<input type="text" name="umur" class="form-control" value="'.$umur.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pendidikan</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="pendidikan" class="form-control" value="'.$pendidikan.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pekerjaan</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="jobs" class="form-control" value="'.$jobs.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Jumlah Anak</label>
	    <div class="col-sm-1">
		<?php
		echo '<input type="text" name="jml_anak" class="form-control" value="'.$jml_anak.'"/>';
		if(isset($error))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
		<br />
		<!--anak1-->
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Anak 1</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nm_anak_1" class="form-control" value="'.$nm_anak_1.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Umur Anak 1</label>
	    <div class="col-sm-1">
		<?php
		echo '<input type="text" name="umur_anak_1" class="form-control" value="'.$umur_anak_1.'"/>';
		if(isset($error_anak_1))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_anak_1;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pendidikan Anak 1</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="pendidikan_anak_1" class="form-control" value="'.$pendidikan_anak_1.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Jenis Kelamin Anak 1</label>
	    <div class="col-sm-2">
		<?php
		if($jenis_kelamin_anak_1 == '')
		{
			echo '<span class="field">';
		    echo '<input type="radio" name="jenis_kelamin_anak_1" class="radio" value="Pria" /> Pria';
			echo '<input type="radio" name="jenis_kelamin_anak_1" class="radio" value="Wanita"/> Wanita';
		    echo '</span>';
		}
		else
		{
			if($jenis_kelamin_anak_1 == 'Pria')
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin_anak_1" class="radio" value="Pria" checked/> Pria';
				echo '<input type="radio" name="jenis_kelamin_anak_1" class="radio" value="Wanita"/> Wanita';
			    echo '</span>';
			}
			else 
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin_anak_1" class="radio" value="Pria"/> Pria ';
				echo '<input type="radio" name="jenis_kelamin_anak_1" class="radio" value="Wanita" checked/> Wanita';
				echo '</span>';
			}
		}
		?>
		</div>
		</div>
	</p>
		<br />
		<!--anak2-->
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Anak 2</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nm_anak_2" class="form-control" value="'.$nm_anak_2.'"/>';
		?>
		</div>
		</div>
	</p>
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Umur Anak 2</label>
	    <div class="col-sm-1">
		<?php
		echo '<input type="text" name="umur_anak_2" class="form-control" value="'.$umur_anak_2.'"/>';
		if(isset($error_anak_2))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_anak_2;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pendidikan Anak 2</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="pendidikan_anak_2" class="form-control" value="'.$pendidikan_anak_2.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Jenis Kelamin Anak 2</label>
	    <div class="col-sm-2">
		<?php
		if($jenis_kelamin_anak_2 == '')
		{
			echo '<span class="field">';
		    echo '<input type="radio" name="jenis_kelamin_anak_2" class="radio" value="Pria" /> Pria';
			echo '<input type="radio" name="jenis_kelamin_anak_2" class="radio" value="Wanita"/> Wanita';
		    echo '</span>';
		}
		else
		{
			if($jenis_kelamin_anak_2 == 'Pria')
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin_anak_2" class="radio" value="Pria" checked/> Pria';
				echo '<input type="radio" name="jenis_kelamin_anak_2" class="radio" value="Wanita"/> Wanita';
			    echo '</span>';
			}
			else 
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin_anak_2" class="radio" value="Pria"/> Pria ';
				echo '<input type="radio" name="jenis_kelamin_anak_2" class="radio" value="Wanita" checked/> Wanita';
				echo '</span>';
			}
		}
		?>
		</div>
		</div>
	</p>
		<br />
		<!--anak3-->
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Anak 3</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nm_anak_3" class="form-control" value="'.$nm_anak_3.'"/>';
		?>
		</div>
		</div>
	</p>
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Umur Anak 3</label>
	    <div class="col-sm-1">
		<?php
		echo '<input type="text" name="umur_anak_3" class="form-control" value="'.$umur_anak_3.'"/>';
		if(isset($error_anak_3))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_anak_3;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pendidikan Anak 3</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="pendidikan_anak_3" class="form-control" value="'.$pendidikan_anak_3.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Jenis Kelamin Anak 3</label>
	    <div class="col-sm-2">
		<?php
		if($jenis_kelamin_anak_3 == '')
		{
			echo '<span class="field">';
		    echo '<input type="radio" name="jenis_kelamin_anak_3" class="radio" value="Pria" /> Pria';
			echo '<input type="radio" name="jenis_kelamin_anak_3" class="radio" value="Wanita"/> Wanita';
		    echo '</span>';
		}
		else
		{
			if($jenis_kelamin_anak_3 == 'Pria')
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin_anak_3" class="radio" value="Pria" checked/> Pria';
				echo '<input type="radio" name="jenis_kelamin_anak_3" class="radio" value="Wanita"/> Wanita';
			    echo '</span>';
			}
			else 
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin_anak_3" class="radio" value="Pria"/> Pria ';
				echo '<input type="radio" name="jenis_kelamin_anak_3" class="radio" value="Wanita" checked/> Wanita';
				echo '</span>';
			}
		}
		?>
		</div>
		</div>
	</p>
		<br />
		<!--anak4-->
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Nama Anak 4</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="nm_anak_4" class="form-control" value="'.$nm_anak_4.'"/>';
		?>
		</div>
		</div>
	</p>
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Umur Anak 4</label>
	    <div class="col-sm-1">
		<?php
		echo '<input type="text" name="umur_anak_4" class="form-control" value="'.$umur_anak_4.'"/>';
		if(isset($error_anak_4))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_anak_4;
			echo '</div>';
			echo '</span>';
		}
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Pendidikan Anak 4</label>
	    <div class="col-sm-3">
		<?php
		echo '<input type="text" name="pendidikan_anak_3" class="form-control" value="'.$pendidikan_anak_4.'"/>';
		?>
		</div>
		</div>
	</p>
	
	<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-5 control-label">Jenis Kelamin Anak 4</label>
	    <div class="col-sm-2">
		<?php
		if($jenis_kelamin_anak_4 == '')
		{
			echo '<span class="field">';
		    echo '<input type="radio" name="jenis_kelamin_anak_4" class="radio" value="Pria" /> Pria';
			echo '<input type="radio" name="jenis_kelamin_anak_4" class="radio" value="Wanita"/> Wanita';
		    echo '</span>';
		}
		else
		{
			if($jenis_kelamin_anak_4 == 'Pria')
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin_anak_4" class="radio" value="Pria" checked/> Pria';
				echo '<input type="radio" name="jenis_kelamin_anak_4" class="radio" value="Wanita"/> Wanita';
			    echo '</span>';
			}
			else 
			{
				echo '<span class="field">';
			    echo '<input type="radio" name="jenis_kelamin_anak_4" class="radio" value="Pria"/> Pria ';
				echo '<input type="radio" name="jenis_kelamin_anak_4" class="radio" value="Wanita" checked/> Wanita';
				echo '</span>';
			}
		}
		?>
		</div>
		</div>
	</p>
	
	</fieldset>
	</div>
	<br /><br />
	<center>
		<p>
		  <input type="submit" name="save" value="Submit" class="btn btn-primary" />
		  <input type="reset" name="reset" value="Reset" class="btn btn-default" />
	   </p>
	</center>
		</form>
		<br /><br /><br /><br /><br /><br /><br />
		<div id="footer">
	      <div class="container">
	        <p class="text-muted">Copyright 2013. Digibeat - Data Keryawan. All Rights Reserved.</p>
	      </div>
	    </div>
	</body>
</html>