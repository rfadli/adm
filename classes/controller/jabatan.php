<?php

class jabatan
{

	public function index()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$collection = $db->jabatan;
		
		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$limit_doc = 5;
		$skip  = (int)(($page - 1) * $limit_doc);
		$next  = ($page + 1);
		$prev  = ($page - 1);
		
		$data = $collection->find()->skip($skip)->limit($limit_doc)->sort(array("nama" => -1));
		
		$fw->set('data', $data);	
		$fw->set('page', $page);
		$fw->set('limit_doc', $limit_doc);
		$fw->set('skip', $skip);
		$fw->set('next', $next);
		$fw->set('prev', $prev);
		
		$fw->set('link', "jabatan/index?page=".$page);
		
		$view = View::instance()->render("jabatan/index.php"); 
		echo $view;
	}

	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{
			$nama = $fw->get("POST.nama");
			$jabatan = $fw->get("POST.jabatan");
			$deskripsi = $fw->get("POST.deskripsi");
				
			//---------blok pemeriksaan-------------//
			$datakaryawan = TRUE;
			
			if($nama == '')
			{
				$datakaryawan = FALSE;
				
				$error_nama = " *Nama harus di isi";
				$fw->set('error_nama', $error_nama);
			}
			
			if($jabatan == '')
			{
				$datakaryawan = FALSE;
				
				$error_jabatan = " *Jabatan harus di isi";
				$fw->set('error_jabatan', $error_jabatan);
			}
			
			//----------blok pemilihan--------------//
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('nama', $nama);
				$fw->set('jabatan', $jabatan);
				$fw->set('deskripsi', $deskripsi);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$collection = $db->jabatan;
				$data = array (
					'nama' => $nama,
					'jabatan' => $jabatan,
					'deskripsi' => $deskripsi,
				);
				$collection->insert($data);
				$fw->reroute("/jabatan/index");
			}
		}
		else
		{
			$fw->set('nama', '');
			$fw->set('jabatan', '');
			$fw->set('deskripsi', '');
		}
		
		$fw->set('link', '/jabatan/add');
		
		$view = View::instance()->render("jabatan/add.php"); 
		echo $view;
		
	}

	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$collection = $db->jabatan;
		$mcoll = $collection->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{
			$nama = $fw->get("POST.nama");
			$jabatan = $fw->get("POST.jabatan");
			$deskripsi = $fw->get("POST.deskripsi");
				
			//---------blok pemeriksaan-------------//
			$datakaryawan = TRUE;
			
			if($nama == '')
			{
				$datakaryawan = FALSE;
				
				$error_nama = " *Nama harus di isi";
				$fw->set('error_nama', $error_nama);
			}
			
			if($jabatan == '')
			{
				$datakaryawan = FALSE;
				
				$error_jabatan = " *Jabatan harus di isi";
				$fw->set('error_jabatan', $error_jabatan);
			}
			
			//----------blok pemilihan--------------//
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('nama', $nama);
				$fw->set('jabatan', $jabatan);
				$fw->set('deskripsi', $deskripsi);
			}
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$collection = $db->jabatan;
				$data = array (
					'nama' => $nama,
					'jabatan' => $jabatan,
					'deskripsi' => $deskripsi,
				);
				
				$newdata = array('$set' => $data);
				$collection->update(array("_id" => new MongoId($id)), $newdata);
				$fw->reroute("/jabatan/index");
			}
			
		}
		else
		{
			$fw->set('nama', $mcoll['nama']);
			$fw->set('jabatan', $mcoll['jabatan']);
			$fw->set('deskripsi', $mcoll['deskripsi']);
		}
		
		$fw->set('link', '/jabatan/edit?id='.$id);
		$view = View::instance()->render("jabatan/add.php"); 
		echo $view;
	}
	
	public function delete()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$id = $fw->get('GET["id"]');
		$db = $local->karyawan;
		$collection = $db->jabatan;
		
		$collection->remove(array('_id' => new MongoId($id)));
		$fw->reroute('/jabatan/index');
	}
}
