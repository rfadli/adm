<!DOCTYPE html>
<html>
	<head>
		<title>Jurnal</title>
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
		        <h1 class="blog-title">Jurnal</h1>
		        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		     </div>
		    </br>
		
		<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Cabang</label>
		    <div class="col-sm-4">
			<?php
			$m = new MongoClient();
			$db = $m->karyawan;	
			$collection = $db->cabang;
			$datcab = $collection->find();
			
			echo '<select name="cabang" class="form-control input-sm">';
			echo '<span class="field">';
			//echo '<option value="">-- Pilih Cabang --</option>';
			foreach($datcab as $dta)
			{
				echo '<option class="select" value="'.$dta['_id'].'" select>'.$dta['name'].'</option>';
			}
			foreach($datcab as $dt)
			{
				if(trim($cabang) == trim($dt['_id']))
					echo '<option value="'.$dt['_id'].'" selected>'.$dt['name'].'</option>';																	
			}
			echo '</span>';
			echo '</select>';
			?>
			</div>
			</div>
		</p>
		
		<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Nomor</label>
		    <div class="col-sm-4">
			<?php
			echo '<span class="field"><input type="text" name="nomer" class="form-control input-sm" value="'.$nomer.'" /></span>';
			if(isset($error_nomer))
			{
				echo '<span class="error">';
				echo '<div style="color:red">';
				echo $error_nomer;
				echo '</div>';
				echo '</span>';
			}
			if(isset($error_nomer_numeric))
			{
				echo '<span class="error">';
				echo '<div style="color:red">';
				echo $error_nomer_numeric;
				echo '</div>';
				echo '</span>';
			}
			?>
			</div>
			</div>
		</p>
		
		<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Nomor Bukti</label>
		    <div class="col-sm-4">
			<?php
			echo '<span class="field"><input type="text" name="nomor_bukti" class="form-control input-sm" value="'.$nomor_bukti.'" /></span>';
			if(isset($error_no_buk))
			{
				echo '<span class="error">';
				echo '<div style="color:red">';
				echo $error_no_buk;
				echo '</div>';
				echo '</span>';
			}
			?>
			</div>
			</div>
		</p>
		
		<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Tanggal</label>
		    <div class="col-sm-4">
			<?php
			echo '<span class="field"><input type="text" name="tgl" class="form-control input-sm" placeholder="example: 27-04-2013" value="'.$tgl.'" /></span>';
			if(isset($error_tgl))
			{
				echo '<span class="error">';
				echo '<div style="color:red">';
				echo $error_tgl;
				echo '</div>';
				echo '</span>';
			}
			?>
			</div>
			</div>
		</p>
		
		<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Jam</label>
		    <div class="col-sm-4">
			<?php
			echo '<span class="field"><input type="text" name="jam" class="form-control input-sm" placeholder="example: 15:23:44" value="'.$jam.'" /></span>';
			if(isset($error_jam))
			{
				echo '<span class="error">';
				echo '<div style="color:red">';
				echo $error_jam;
				echo '</div>';
				echo '</span>';
			}
			?>
			</div>
			</div>
		</p>
		
		<p>
			<div class="form-group">
		    <label for="inputPassword3" class="col-sm-4 control-label">Akun</label>
		    <div class="col-sm-4">
			<?php
			$m = new MongoClient();
			$db = $m->karyawan;	
			$collection = $db->type;
			$mmtype = $collection->find();
			
			echo '<select name="type" class="form-control input-sm">';
			echo '<span class="field">';
			//echo '<option value="">-- Pilih Akun --</option>';
			foreach($mmtype as $dta)
			{
				echo '<option class="select" value="'.$dta['_id'].'" select>'.'('.$dta['type'].') '.$dta['nama'].'</option>';
			}
			foreach($mmtype as $dt)
			{
				if(trim($type) == trim($dt['_id']))
					echo '<option value="'.$dt['_id'].'" selected>'.'('.$dt['type'].') '.$dta['nama'].'</option>';																	
			}
			echo '</span>';
			echo '</select>';
			?>
			</div>
			</div>
		</p>
		
		<p>
		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Debit</label>
	    <div class="col-sm-4">
		<?php
			echo '<div class="input-group">';
			echo '<span class="input-group-addon">'."Rp".'</span>';
			echo '<span class="field"><input type="text" name="debit" class="form-control" placeholder="example: 2000000" value="'.$debit.'" /></span>';
			if(isset($error_debit_numeric))
			{
				echo '<span class="error">';
				echo '<div style = color:red>';
				echo $error_debit_numeric;
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
	    <label for="inputPassword3" class="col-sm-4 control-label">Kredit</label>
	    <div class="col-sm-4">
		<?php
		echo '<div class="input-group">';
		echo '<span class="input-group-addon">'."Rp".'</span>';
		echo '<span class="field"><input type="text" name="kredit" class="form-control" placeholder="example: 2000000" value="'.$kredit.'" /></span>';
		if(isset($error_kredit_numeric))
		{
			echo '<span class="error">';
			echo '<div style = color:red>';
			echo $error_kredit_numeric;
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
		    <label for="inputPassword3" class="col-sm-4 control-label">Keterangan</label>
		    <div class="col-sm-4">
			<?php
			echo '<span class="field"><textarea name="ket" class="form-control" rows="3">'.$ket.'</textarea></span>';
			if(isset($error_ket))
			{
				echo '<span class="error">';
				echo '<div style="color:red">';
				echo $error_ket;
				echo '</div>';
				echo '</span>';
			}
			?>
			</div>
			</div>
		</p>
		
		<p>
   		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Document</label>
	    <div class="col-sm-4"> 
        <?php
        if(isset($document))
		{
			echo '<span class="field"><input type="file" name="document[]"/>';
			foreach($document as $ft)
			{
	            $target_path = "/upload/document/";
				if(strlen(trim($ft[0])) > 0)
				{
					echo $ft[0];
				}
	            
			}
			echo '</span>';
		}
		?>
       </div>
      </div>
   </p>
	
	<p>
   		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Document</label>
	    <div class="col-sm-4"> 
        <?php
        if(isset($document))
		{
			echo '<span class="field"><input type="file" name="document[]"/>';
			foreach($document as $ft)
			{
	            $target_path = "/upload/document/";
				if(strlen(trim($ft[1])) > 0)
				{
					echo $ft[1];
				}
	            
			}
			echo '</span>';
		}
        ?>
       </div>
      </div>
   </p>
   
   <p>
   		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Document</label>
	    <div class="col-sm-4"> 
        <?php
        if(isset($document))
		{
			echo '<span class="field"><input type="file" name="document[]"/>';
			foreach($document as $ft)
			{
	            $target_path = "/upload/document/";
				if(strlen(trim($ft[2])) > 0)
				{
					echo $ft[2];
				}
	            
			}
			echo '</span>';
		}
        ?>
       </div>
      </div>
   </p>
   
   <p>
   		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Document</label>
	    <div class="col-sm-4"> 
        <?php
        if(isset($document))
		{
			echo '<span class="field"><input type="file" name="document[]"/>';
			foreach($document as $ft)
			{
	            $target_path = "/upload/document/";
				if(strlen(trim($ft[3])) > 0)
				{
					echo $ft[3];
				}
	            
			}
			echo '</span>';
		}
        ?>
       </div>
      </div>
   </p>
   
   <p>
   		<div class="form-group">
	    <label for="inputPassword3" class="col-sm-4 control-label">Document</label>
	    <div class="col-sm-4"> 
        <?php
        if(isset($document))
		{
			echo '<span class="field"><input type="file" name="document[]"/>';
			foreach($document as $ft)
			{
	            $target_path = "/upload/document/";
				if(strlen(trim($ft[4])) > 0)
				{
					echo $ft[4];
				}
	            
			}
			echo '</span>';
		}
        ?>
       </div>
      </div>
   </p>	
		
	</fieldset>
		<br>
		<p>
		  <input type="submit" name="save" value="Submit" class="btn btn-primary" />
		  <input type="reset" name="reset" value="Reset" class="btn btn-default" />
	   </p>
	  </br>
	  <br />
		</center>
	</div>
		</form>
		<br /><br/><br /> 
		<div id="footer">
	      <div class="container">
	        <p class="text-muted">Copyright 2013. Digibeat - Jurnal. All Rights Reserved.</p>
	      </div>
	    </div>
	</body>
</html>
